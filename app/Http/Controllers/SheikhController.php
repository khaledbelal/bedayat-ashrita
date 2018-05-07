<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use App\Sheikh;
use App\User;
use App\Moqdma;
use Auth; 

class SheikhController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sheikhs = Sheikh::withCount('moqdamt')->get();
        return view('cpanel.sheikhs.index',compact('sheikhs'));
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
}
