<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Sheikh;
use App\User;
use App\Moqdma;
use App\View;
use Auth; 
use File;
use Route;

class MoqdmaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Route::currentRouteName() == 'cpanel-moqdmat'){
            $moqdmat = Moqdma::all(); 
            return view('cpanel.moqdmat.index',compact('moqdmat'));
        }
        else{
            $moqdmat_created = Moqdma::where('active',1)->orderBy('created_at','desc')->limit(14)->get(); 
            $moqdmat_total_views = Moqdma::where('active',1)->orderBy('total_views','desc')->limit(14)->get(); 
            $moqdmat_best = Moqdma::where('active',1)->orderBy('total_views','desc')->limit(5)->get();
            return view('frontend.moqdmat',compact('moqdmat_created','moqdmat_total_views','moqdmat_best')); 
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $sheikhs = Sheikh::all();
        return view('cpanel.moqdmat.create',compact('sheikhs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $files = File::allFiles('temp_uploads');  
        foreach ($request->server_name as  $key => $server_name){  
            foreach ($files as $key_file=>$file) {  
                if($server_name == $file->getFilename()){  
                    $new_path = 'moqdmat_files/'.$request->sheikh_id[$key];
                    File::makeDirectory($new_path, 0775, true, true);

                    $moqdma = Moqdma::create([
                        "name" => $request->name[$key], 
                        "description" => $request->description[$key],
                        "path" => 'temp_path',
                        "sheikh_id" => $request->sheikh_id[$key], 
                        "user_id" => Auth::id()
                    ]); 

                    if($moqdma){ 
                        $moqdma->path = $new_path.'/'.$moqdma->id.'.'.$file->getExtension();
                        if($moqdma->save())
                            File::move($file, $moqdma->path);  
                    } 
                } 
            }  
        }  
        return \Redirect::route('cpanel-moqdmat');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        $moqdma = Moqdma::where('active',1)->where('id',$id)->first();
        $sheikh_moqdmat = Moqdma::where('active',1)->where('sheikh_id',$moqdma->sheikh_id)->orderBy('total_views','desc')->limit(6)->get();
        return view('frontend.listen',compact('moqdma','sheikh_moqdmat')); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $city = City::findOrfail($id);
        return view('cities.edit',compact('city'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        City::where('id',$id)->create([
            "name" => $request->name,
            "code" => $request->code
        ]);
        return \Redirect::route('cities');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        City::destroy($id);
        return \Redirect::route('cities');
    }

    public function uploadFiles(Request $request)
    {     
        $file = $request->file('file');
        if ($request->file('file')->isValid()) {
            $file->move('temp_uploads',$file->getClientOriginalName()); 
        } 
        return 'done';   
    }


    public function active($id)
    { 
        $moqdma = Moqdma::where('id',$id)->first(); 
        $moqdma->active = ($moqdma->active) ? 0 : 1; 
        
        if($moqdma->save())
            return ($moqdma->active) ? 1 : 0;
    }

    public function increaseView(Request $request)
    { 
        $moqdma = Moqdma::where('id',$request->moqdma_id)->first();
        $view =  view::create([ 
            "moqdma_id" => $request->moqdma_id,
            "sheikh_id" => $moqdma->sheikh->id
        ]); 

        if(Auth::check()){
            $view->user_id = Auth::id();
            $view->save();
        } 

        if($view)
            $moqdma = Moqdma::where('id',$request->moqdma_id)->increment('total_views'); 
        
        if($moqdma)
            return 1;
    }

    public function filter($string)
    {  
        $moqdma = Moqdma::where('active',1);
        $arr_string = array();

        if($string == 'ا')
            $arr_string = array('ا','أ','إ','آ'); 
        elseif($string == 'ي')
            $arr_string = array('ي','ى','ئ'); 
        elseif($string == 'و')
            $arr_string = array('و','ؤ'); 
        elseif($string == '0-9')
            $arr_string = array('0','1','2','3','4','5','6','7','8','9'); 

        if(count($arr_string) > 0){
            $moqdma = $moqdma->Where(function ($query) use($arr_string) {
                for ($i = 0; $i < count($arr_string); $i++){
                    $query->orwhere('name', 'like',$arr_string[$i] .'%');
                }      
            });
        }
        else
            $moqdma = $moqdma->Where('name', 'like',$string .'%');

        $moqdmat_created = $moqdma->orderBy('created_at','desc')->get(); 
        $moqdmat_total_views = $moqdma->orderBy('total_views','desc')->get(); 
        $moqdmat_best = Moqdma::where('active',1)->orderBy('total_views','desc')->limit(5)->get();
        
        return view('frontend.moqdmat',compact('moqdmat_created','moqdmat_total_views','moqdmat_best')); 
    }

    public function sheikh($sheikh_id)
    {  
        $moqdma = Moqdma::where('active',1)->where('sheikh_id',$sheikh_id); 
        $moqdmat_created = $moqdma->orderBy('created_at','desc')->get(); 
        $moqdmat_total_views = $moqdma->orderBy('total_views','desc')->get(); 
        $moqdmat_best = Moqdma::where('active',1)->orderBy('total_views','desc')->limit(5)->get();
        
        return view('frontend.moqdmat',compact('moqdmat_created','moqdmat_total_views','moqdmat_best')); 
    }
}
