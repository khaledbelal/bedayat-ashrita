<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User; 
use App\Moqdma;
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

    public function about(){ 
        return  view('frontend.about'); 
    } 

    public function contact(){ 
        return  view('frontend.contact'); 
    } 

    public function index()
    { 
        $moqdmat = Moqdma::where('active',1)->orderByRaw("RAND()")->limit(10)->get();  
        $moqdmat_best = Moqdma::where('active',1)->orderBy('total_views','desc')->limit(5)->get();
    	return view('frontend.home',compact('moqdmat','moqdmat_best')); 
    } 
}
