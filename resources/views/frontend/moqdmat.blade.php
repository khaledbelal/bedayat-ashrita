@extends('layouts.remix')

@section('title')
    قائمة المقدمات 
@endsection

@section('content')
<div class="under_header">
	<img src="images/assets/breadcrumbs10.png" alt="#">
</div><!-- under header -->

<div class="page-content back_to_up">
	<div class="row clearfix mb">
		<div class="Alphabet">
			<ul>
				<li><a href="{{route('all-moqdmat')}}"> مشاهدة الكل </a></li>
				<li><a href="{{route('moqdmat-filter',['ا'])}}"> ا </a></li>
				<li><a href="{{route('moqdmat-filter',['ب'])}}"> ب </a></li>
				<li><a href="{{route('moqdmat-filter',['ت'])}}"> ت </a></li>
				<li><a href="{{route('moqdmat-filter',['ث'])}}"> ث </a></li>
				<li><a href="{{route('moqdmat-filter',['ج'])}}"> ج </a></li>
				<li><a href="{{route('moqdmat-filter',['ح'])}}"> ح </a></li>
				<li><a href="{{route('moqdmat-filter',['خ'])}}"> خ </a></li>
				<li><a href="{{route('moqdmat-filter',['د'])}}"> د </a></li>
				<li><a href="{{route('moqdmat-filter',['ذ'])}}"> ذ </a></li>
				<li><a href="{{route('moqdmat-filter',['ر'])}}"> ر </a></li>
				<li><a href="{{route('moqdmat-filter',['ز'])}}"> ز </a></li>
				<li><a href="{{route('moqdmat-filter',['س'])}}"> س </a></li>
				<li><a href="{{route('moqdmat-filter',['ش'])}}"> ش </a></li>
				<li><a href="{{route('moqdmat-filter',['ص'])}}"> ص </a></li>
				<li><a href="{{route('moqdmat-filter',['ض'])}}"> ض </a></li>
				<li><a href="{{route('moqdmat-filter',['ط'])}}"> ط </a></li>
				<li><a href="{{route('moqdmat-filter',['ظ'])}}"> ظ </a></li>
				<li><a href="{{route('moqdmat-filter',['ع'])}}"> ع </a></li>
				<li><a href="{{route('moqdmat-filter',['غ'])}}"> غ </a></li>
				<li><a href="{{route('moqdmat-filter',['ف'])}}"> ف </a></li>
				<li><a href="{{route('moqdmat-filter',['ق'])}}"> ق </a></li>
				<li><a href="{{route('moqdmat-filter',['ك'])}}"> ك </a></li>
				<li><a href="{{route('moqdmat-filter',['ل'])}}"> ل </a></li>
				<li><a href="{{route('moqdmat-filter',['م'])}}"> م </a></li>
				<li><a href="{{route('moqdmat-filter',['ن'])}}"> ن </a></li>
				<li><a href="{{route('moqdmat-filter',['ه'])}}"> ه </a></li>
				<li><a href="{{route('moqdmat-filter',['و'])}}"> و </a></li>
				<li><a href="{{route('moqdmat-filter',['ي'])}}"> ي </a></li> 
				<li><a href="{{route('moqdmat-filter',['0-9'])}}"> 0-9 </a></li> 
			</ul>
		</div><!-- breadcrumb -->
	</div><!-- row -->

	<div class="row row-fluid clearfix mbf">

		<div class="span4 sidebar">
			<!--<div class="def-block widget">
				<h4> Ads </h4><span class="liner"></span>
				<div class="widget-content tac">
					<a href="#" title="Advertise"><img src="images/ads1.gif" alt="#"></a>
				</div> 
			</div>--> 

			<div class="def-block widget">
				<h4> Featured Videos </h4><span class="liner"></span>
				<div class="widget-content row-fluid">
					<div class="videos clearfix flexslider">
						<ul class="slides">
							<li class="featured-video">
								<a href="video_single_wide.html">
									<img src="images/assets/video1.jpg" alt="#">
									<i class="icon-play-sign"></i>
									<h3>I Know You Want Me</h3>
									<span>Fitbull</span>
								</a>
							</li><!-- slide -->
							<li class="featured-video">
								<a href="video_single_wide.html">
									<img src="images/assets/video2.jpg" alt="#">
									<i class="icon-play-sign"></i>
									<h3>I Like It</h3>
									<span>Enrique</span>
								</a>
							</li><!-- slide -->
							<li class="featured-video">
								<a href="video_single_wide.html">
									<img src="images/assets/video3.jpg" alt="#">
									<i class="icon-play-sign"></i>
									<h3>Tommorow</h3>
									<span>Dj Michele</span>
								</a>
							</li><!-- slide -->
						</ul>
					</div>
				</div><!-- widget content -->
			</div><!-- def block widget videos -->

		</div><!-- span4 sidebar -->
		<div class="span8 posts">
			<div class="def-block">
				<ul class="tabs">
					<li><a href="#Latest" class="active"> الأحدث اضافة</a></li>
					<li><a href="#Featured"> الأكثر استماعا </a></li> 
				</ul><!-- tabs -->

				<ul class="tabs-content">
					<li id="Latest" class="active">
						<div class="post no-border no-mp clearfix">
							<ul class="tab-content-items">
								@foreach($moqdmat_created as $moqdma)
								<li class="grid_6">
									<a class="m-thumbnail" href="{{route('moqdma-listen',[$moqdma->id])}}"><img width="50" height="50" src="{{ URL('/templates/remix/images/assets/thumb-mp3-1.jpg')}}" alt="#"></a>
									<h3><a href="{{route('moqdma-listen',[$moqdma->id])}}">{{$moqdma->name}}</a></h3>
									<span><a href="{{route('sheikh-moqdmat',[$moqdma->sheikh->id])}}"> الشيخ {{$moqdma->sheikh->name}}</a> </span>
									<span> استمعت {{$moqdma->total_views}} مرة (ات)</span>
								</li>
								@endforeach 
							</ul>
						</div><!-- latest -->
					</li><!-- tab content -->

					<li id="Featured">
						<div class="post no-border no-mp clearfix">
							<ul class="tab-content-items">
								@foreach($moqdmat_total_views as $moqdma)
								<li class="grid_6">
									<a class="m-thumbnail" href="{{route('moqdma-listen',[$moqdma->id])}}"><img width="50" height="50" src="{{ URL('/templates/remix/images/assets/thumb-mp3-1.jpg')}}" alt="#"></a>
									<h3><a href="{{route('moqdma-listen',[$moqdma->id])}}">{{$moqdma->name}}</a></h3>
									<span><a href="{{route('sheikh-moqdmat',[$moqdma->sheikh->id])}}"> الشيخ {{$moqdma->sheikh->name}}</a> </span>
									<span> استمعت {{$moqdma->total_views}} مرة (ات)</span>
								</li>
								@endforeach 
							</ul>
						</div><!-- latest -->
					</li><!-- tab content --> 
				</ul><!-- end tabs -->

			</div><!-- def block -->
		</div><!-- span8 posts -->

	</div><!-- row clearfix -->
</div><!-- end page content -->
@endsection 