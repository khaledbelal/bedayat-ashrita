<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Moqdma;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;



    private $moqdmat_best;  

    public function __construct()  { 
    	$this->middleware(function ($request, $next) { 
    		$this->moqdmat_best =  Moqdma::where('active',1)->orderBy('total_views','desc')->limit(10)->get();

            view()->share('moqdmat_best', $this->moqdmat_best);
            return $next($request);
        });
    } 

}
