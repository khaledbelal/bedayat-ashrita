<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Sheikh;
use App\User;
use App\Moqdma;
use Auth; 
use Route;

class SheikhController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {    
        if(Route::currentRouteName() == 'cpanel-sheikhs'){
            $sheikhs = Sheikh::withCount('moqdamt')->orderby('name','asc')->get();
            return view('cpanel.sheikhs.index',compact('sheikhs'));
        }
        else{ 
            $sheikhs = Sheikh::where('active',1)->withCount('moqdamt')->orderby('name','asc')->get();
            return view('frontend.sheikhs',compact('sheikhs')); 
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cpanel.sheikhs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Sheikh::create([
            "name" => $request->name,
            "user_id" => Auth::id(),
            "description" => $request->description
        ]);
        return \Redirect::route('cpanel-sheikhs');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $city = Sheikh::findOrfail($id);
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
        Sheikh::where('id',$id)->create([
            "name" => $request->name,
            "code" => $request->code
        ]);
        return \Redirect::route('cpanel-sheikhs');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Moqdma::where('sheikh_id',$id)->delete();
        Sheikh::destroy($id);
        return \Redirect::route('cpanel-sheikhs');
    }


    public function active($id)
    { 
        $sheikh = Sheikh::where('id',$id)->first(); 
        $sheikh->active = ($sheikh->active) ? 0 : 1; 
        
        if($sheikh->save())
            return ($sheikh->active) ? 1 : 0;
    }


    public function filter($string)
    {  
        $sheikh = Sheikh::where('active',1);
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
            $sheikh = $sheikh->Where(function ($query) use($arr_string) {
                for ($i = 0; $i < count($arr_string); $i++){
                    $query->orwhere('name', 'like',$arr_string[$i] .'%');
                }      
            });
        }
        else
            $sheikh = $sheikh->Where('name', 'like',$string .'%');

        $sheikhs = $sheikh->withCount('moqdamt')->orderby('name','asc')->get();
        
        return view('frontend.sheikhs',compact('sheikhs')); 
    }
}
