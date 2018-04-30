<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User; 
use Auth; 
use DB; 

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
 
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */ 
    public function cpanelHome(){ 
    	return  view('cpanel.home'); 
    } 

    public function cpanelSheikhs(){ 
    	return  view('cpanel.home'); 
    } 

    public function index()
    { 
    	return view('home'); 
    } 
}
