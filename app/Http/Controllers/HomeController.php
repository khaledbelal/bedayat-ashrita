<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Sitemap\Sitemap; 
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

        $last_10_views = View::select([DB::RAW('max(id),moqdma_id,max(created_at) created_at,max(sheikh_id) sheikh_id')])->orderBy('created_at','desc')->groupBy('moqdma_id')->limit(10)->get(); 

        $best_10_views = Moqdma::where('active',1)->orderBy('total_views','desc')->limit(10)->get(); 

    	return  view('cpanel.home',compact('total_moqdmat','total_sheikh','total_views','arr_data','views_today','last_10_views','best_10_views')); 
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

    public function sendMessage(Request $request)
    {   
        // Define some constants
        $my_name = "khaledbelal";
        $my_mail = "me@khaledbelal.net";
        $subject = "مقدمات الاشرطة - رسالة من ".$request->senderName;

        // Read the form values
        $success = false;
        $senderName = isset( $request->senderName ) ? preg_replace( "/[^\.\-\' a-zA-Z0-9]/", "", $request->senderName ) : "";
        $senderEmail = isset( $request->senderEmail ) ? preg_replace( "/[^\.\-\_\@a-zA-Z0-9]/", "", $request->senderEmail ) : "";
        $message = isset( $request->message ) ? preg_replace( "/(From:|To:|BCC:|CC:|Subject:|Content-Type:)/", "", $request->message ) : "";

        // If all values exist, send the email
        if ( $senderName && $senderEmail && $message ) {
            $recipient = $my_name . " <" . $my_mail . ">";
            $headers = "From: " . $senderName . " <" . $senderEmail . ">";
            $success = mail( $recipient, $subject, $message, $headers );
        }

        return ($success) ? "success" : "error";
    }

    public function index()
    { 
        $arr_specials = array(293,301,290,311,302,413,411,342,345,355);
        $moqdmat = Moqdma::where('active',1);
        //$ramadan = $moqdmat->where('name', 'like','%رمضان%');
        $specials = $moqdmat->whereIn('id',$arr_specials);
        $moqdmat = $specials->orderByRaw("RAND()")->limit(10)->get();  
        $moqdmat_best = Moqdma::where('active',1)->orderBy('total_views','desc')->limit(6)->get();
    	return view('frontend.home',compact('moqdmat','moqdmat_best')); 
    } 

    public function cpanelSitemap()
    { 
        $sitemap = Sitemap::create()
            ->add(Route('home'))
            ->add(Route('all-moqdmat'))
            ->add(Route('all-sheikhs'))
            ->add(Route('about'))
            ->add(Route('contact'));

        Moqdma::where('active',1)->get()->each(function (Moqdma $moqdma) use ($sitemap) {
            $sitemap->add(Route('moqdma-listen',[$moqdma->id]));
        });

        Sheikh::where('active',1)->get()->each(function (Sheikh $sheikh) use ($sitemap) { 
            $sitemap->add(Route('sheikh-moqdmat',[$sheikh->id]));
        });

        $sitemap->writeToFile(public_path('sitemap.xml'));

        return \Redirect::route('cpanel-home');
    }
}
