<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Sheikh;
use App\User;
use App\Moqdma;
use Auth; 
use File;

class MoqdmaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $moqdmat = Moqdma::all(); 
        return view('cpanel.moqdmat.index',compact('moqdmat'));
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
            foreach ($files as $file) {   
                $file_path_parts = pathinfo($file);   
                if($server_name == $file_path_parts['filename'].'.'.$file_path_parts['extension']){  
                    $new_path = 'moqdmat/'.$request->sheikh_id[$key];
                    File::makeDirectory($new_path, 0775, true, true);

                    $moqdma = Moqdma::create([
                        "name" => $request->name[$key], 
                        "description" => $request->description[$key],
                        "path" => 'temp_path',
                        "sheikh_id" => $request->sheikh_id[$key], 
                        "user_id" => Auth::id()
                    ]); 

                    if($moqdma){ 
                        $moqdma->path = $new_path.'/'.$moqdma->id.'.'.$file_path_parts['extension'];
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
}
