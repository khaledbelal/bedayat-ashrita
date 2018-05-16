@extends('layouts.stack')

@section('title')
    الرئيسية 
@endsection

 @section('vendor_css')
    <link rel="stylesheet" type="text/css" href="{{ URL('/templates/stack/app-assets/fonts/simple-line-icons/style.css') }}"> 
    <link rel="stylesheet" type="text/css" href="{{ URL('/templates/stack/app-assets/css-rtl/core/colors/palette-gradient.css') }}"> 
    <link rel="stylesheet" type="text/css" href="{{ URL('/templates/stack/app-assets/css-rtl/pages/timeline.css') }}"> 

    <link rel="stylesheet" type="text/css" href="{{ URL('/templates/stack/app-assets/vendors/css/charts/jquery-jvectormap-2.0.3.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL('/templates/stack/app-assets/vendors/css/charts/morris.css') }}">
@endsection

@section('content')
<div class="row">
    <div class="col-xl-3 col-lg-6 col-xs-12">
        <div class="card">
            <div class="card-body">
                <div class="media">
                    <div class="p-2 text-xs-center bg-primary bg-darken-2 media-left media-middle">
                        <i class="icon-camera font-large-2 white"></i>
                    </div>
                    <div class="p-2 bg-gradient-x-primary white media-body">
                        <h5>عدد المقدمات</h5>
                        <h5 class="text-bold-400"></i> {{ $total_moqdmat }}</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-xs-12">
        <div class="card">
            <div class="card-body">
                <div class="media">
                    <div class="p-2 text-xs-center bg-danger bg-darken-2 media-left media-middle">
                        <i class="icon-user font-large-2 white"></i>
                    </div>
                    <div class="p-2 bg-gradient-x-danger white media-body">
                        <h5>عدد الشيوخ</h5>
                        <h5 class="text-bold-400">{{ $total_sheikh }}</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-xs-12">
        <div class="card">
            <div class="card-body">
                <div class="media">
                    <div class="p-2 text-xs-center bg-warning bg-darken-2 media-left media-middle">
                        <i class="icon-basket-loaded font-large-2 white"></i>
                    </div>
                    <div class="p-2 bg-gradient-x-warning white media-body">
                        <h5>اجمالي الاستماع</h5>
                        <h5 class="text-bold-400">{{ $total_views }}</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-lg-6 col-xs-12">
        <div class="card">
            <div class="card-body">
                <div class="media">
                    <div class="p-2 text-xs-center bg-success bg-darken-2 media-left media-middle">
                        <i class="icon-wallet font-large-2 white"></i>
                    </div>
                    <div class="p-2 bg-gradient-x-success white media-body">
                        <h5>استماع اليوم</h5>
                        <h5 class="text-bold-400">{{ $views_today }}</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12 col-md-12 col-xs-12">
        <div class="card">
            <div class="card-header no-border-bottom">
                <h4 class="card-title">اجمالي الاستماع خلال ال 30 يوم الفائت</h4>
                <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                <div class="heading-elements">
                    <ul class="list-inline mb-0">
                        <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                        <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="card-body collapse in">
                <div class="card-block"> 
                    <div class="row">
                        <div class="col-xs-12 table-responsive"> 
                            <div id="area-chart" class="height-250"></div> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-6 col-md-12 col-xs-12">
        <div class="card">
            <div class="card-header no-border-bottom">
                <h4 class="card-title">اخر 10 مقدمات تم سماعهم</h4>
                <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                <div class="heading-elements">
                    <ul class="list-inline mb-0">
                        <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                        <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="card-body collapse in">
                <div class="card-block table-responsive height-250"> 
                	<table class="table table-striped table-bordered zero-configuration">
                        <thead>
                            <tr>
                              <th>المقدمة</th>
                              <th>التاريخ</th>
                            </tr>
                        </thead>
                        <tbody>  
		                	@foreach($last_10_views as $view)
		                   	<tr>
		                        <td> {{$view->moqdma->name}} - {{$view->sheikh->name}} </td> 
		                        <td>{{date('m-d h:i A',strtotime($view->created_at))}} </td>
		                    </tr>
		                    @endforeach 
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-6 col-md-12 col-xs-12">
        <div class="card">
            <div class="card-header no-border-bottom">
                <h4 class="card-title">اكثر 10 مقدمات استماعا</h4>
                <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                <div class="heading-elements">
                    <ul class="list-inline mb-0">
                        <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                        <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="card-body collapse in">
                <div class="card-block table-responsive height-250"> 
                	<table class="table table-striped table-bordered zero-configuration">
                        <thead>
                            <tr>
                              <th>المقدمة</th>
                              <th>مرات الاستماع</th>
                            </tr>
                        </thead>
                        <tbody>  
		                	@foreach($best_10_views as $moqdma)
		                   	<tr>
		                        <td> {{$moqdma->name}} - {{$moqdma->sheikh->name}} </td> 
		                        <td>{{$moqdma->total_views}} مرة (ات) </td>
		                    </tr>
		                    @endforeach 
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('page_vendor_js') 
    <script src="{{ URL('/templates/stack/app-assets/vendors/js/extensions/jquery.knob.min.js') }}" type="text/javascript"></script>
    <script src="{{ URL('/templates/stack/app-assets/js/scripts/extensions/knob.js') }}" type="text/javascript"></script>
    <script src="{{ URL('/templates/stack/app-assets/vendors/js/charts/chart.min.js') }}" type="text/javascript"></script>
    <script src="{{ URL('/templates/stack/app-assets/vendors/js/charts/jquery.sparkline.min.js') }}" type="text/javascript"></script>
    <script src="{{ URL('/templates/stack/app-assets/vendors/js/charts/jvector/jquery-jvectormap-world-mill.js') }}" type="text/javascript"></script>
    <script src="{{ URL('/templates/stack/app-assets/vendors/js/charts/raphael-min.js') }}" type="text/javascript"></script>
    <script src="{{ URL('/templates/stack/app-assets/vendors/js/charts/morris.min.js') }}" type="text/javascript"></script>
@endsection

@section('page_level_js') 
	<script src="{{ URL('/templates/stack/app-assets/js/scripts/pages/dashboard-ecommerce.js') }}" type="text/javascript"></script>  
    <script src="{{ URL('/templates/stack/app-assets/js/scripts/pages/dashboard-analytics.js') }}" type="text/javascript"></script>

    <script type="text/javascript">
 

	    var arr_days = [];
	    @for ($i=30; $i >= 0; $i--)
	   		arr_days.push('{{ date("Y-m-d", strtotime(date("Y-m-d"). " - $i days")) }}');
	    @endfor

	    var days = []; 
     	@foreach($arr_data as $day=>$count)
     		days['{{  $day  }}'] = '{{ $count }}';
	    @endforeach

	    var arr_data = [];
	    for (var i=arr_days.length-1; i > 0 ; i--){  
	    	arr_data.push({
	    		'day' : arr_days[i],
	    		'count' : days[arr_days[i]]
	    	}) 
	    } 
	    console.log(arr_data);

	    Morris.Area({
        element: 'area-chart',
        data: arr_data,
        xkey: 'day',
        xLabelAngle: 45,
        ykeys: ['count'],
 		xLabels: 'day',
        labels: ['استماع'], 
        lineColors: [ '#16D39A']
    });

 

    </script>
@endsection