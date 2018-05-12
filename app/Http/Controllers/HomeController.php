<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User; 
use App\Moqdma;
use App\Sheikh;
use App\View;
use Auth; 
use DB; 
use Carbon\Carbon;

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
        $total_moqdmat = Moqdma::where('active',1)->count(); 
        $total_sheikh = Sheikh::where('active',1)->count(); 
        $total_views = View::count(); 
        $views_day =   View::select([DB::raw('count(id) as `count`'),DB::raw('DATE(created_at) as day')])->groupBy('day')->where('created_at', '>=', Carbon::now()->subMonths(1))->get(); 
        $views_today =   View::where('created_at','>=',date("Y-m-d")." 00:00:00")->count();

        $days = array();
        foreach ($views_day as $key => $day) {
            $days[date("Y-m-d",strtotime($day->day))] = $day->count;
        }

        $arr_data = array();
        for ($i=0; $i <= 31; $i++) {  
            $arr_data[date("Y-m-d", strtotime(date("Y-m-d"). " - $i days"))] =  (isset($days[date("Y-m-d", strtotime(date("Y-m-d"). " - $i days"))])) ? $days[date("Y-m-d", strtotime(date("Y-m-d"). " - $i days"))] : 0;
        }
 
    	return  view('cpanel.home',compact('total_moqdmat','total_sheikh','total_views','arr_data','views_today')); 
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
