@extends('layouts.remix')

@section('title')
    قائمة الشيوخ 
@endsection

@section('content')
<div class="under_header">
	<!-- <img src="{{ URL('/templates/remix/images/assets/ramadan.jpg') }}" alt="#"> -->
</div><!-- under header -->

<div class="page-content back_to_up">
	<div class="row clearfix mb">
		<div class="Alphabet">
			<ul>
				<li><a href="{{route('all-sheikhs')}}"> مشاهدة الكل </a></li>
				<li><a href="{{route('sheikh-filter',['ا'])}}"> ا </a></li>
				<li><a href="{{route('sheikh-filter',['ب'])}}"> ب </a></li>
				<li><a href="{{route('sheikh-filter',['ت'])}}"> ت </a></li>
				<li><a href="{{route('sheikh-filter',['ث'])}}"> ث </a></li>
				<li><a href="{{route('sheikh-filter',['ج'])}}"> ج </a></li>
				<li><a href="{{route('sheikh-filter',['ح'])}}"> ح </a></li>
				<li><a href="{{route('sheikh-filter',['خ'])}}"> خ </a></li>
				<li><a href="{{route('sheikh-filter',['د'])}}"> د </a></li>
				<li><a href="{{route('sheikh-filter',['ذ'])}}"> ذ </a></li>
				<li><a href="{{route('sheikh-filter',['ر'])}}"> ر </a></li>
				<li><a href="{{route('sheikh-filter',['ز'])}}"> ز </a></li>
				<li><a href="{{route('sheikh-filter',['س'])}}"> س </a></li>
				<li><a href="{{route('sheikh-filter',['ش'])}}"> ش </a></li>
				<li><a href="{{route('sheikh-filter',['ص'])}}"> ص </a></li>
				<li><a href="{{route('sheikh-filter',['ض'])}}"> ض </a></li>
				<li><a href="{{route('sheikh-filter',['ط'])}}"> ط </a></li>
				<li><a href="{{route('sheikh-filter',['ظ'])}}"> ظ </a></li>
				<li><a href="{{route('sheikh-filter',['ع'])}}"> ع </a></li>
				<li><a href="{{route('sheikh-filter',['غ'])}}"> غ </a></li>
				<li><a href="{{route('sheikh-filter',['ف'])}}"> ف </a></li>
				<li><a href="{{route('sheikh-filter',['ق'])}}"> ق </a></li>
				<li><a href="{{route('sheikh-filter',['ك'])}}"> ك </a></li>
				<li><a href="{{route('sheikh-filter',['ل'])}}"> ل </a></li>
				<li><a href="{{route('sheikh-filter',['م'])}}"> م </a></li>
				<li><a href="{{route('sheikh-filter',['ن'])}}"> ن </a></li>
				<li><a href="{{route('sheikh-filter',['ه'])}}"> ه </a></li>
				<li><a href="{{route('sheikh-filter',['و'])}}"> و </a></li>
				<li><a href="{{route('sheikh-filter',['ي'])}}"> ي </a></li> 
				<li><a href="{{route('sheikh-filter',['0-9'])}}"> 0-9 </a></li> 
			</ul>
		</div><!-- breadcrumb -->
	</div><!-- row -->

	<div class="row row-fluid clearfix mbf">
		<div class="span8 posts">
			<div class="def-block">
				<ul class="tabs"> 
					<li><a href="#"  class="active"> قائمة الشيوخ</a></li> 
				</ul><!-- tabs -->

				<ul class="tabs-content">  
					<li id="Albums"  class="active">
						<div class="mp3-albums">
							@foreach($sheikhs as $sheikh)
							<a href="{{ route('sheikh-moqdmat',[$sheikh->id]) }}" class="grid_3">
								<img src="{{ URL('/templates/remix/images/assets/no_image.png')}}" alt="#">
								<span><strong>{{ $sheikh->name }}</strong>{{ $sheikh->moqdmat_count }} مقدمة (ات)</span>
							</a>
							@endforeach  
						</div><!-- mp3 albums -->
					</li><!-- tab content --> 

				</ul><!-- end tabs -->

			</div><!-- def block -->
		</div><!-- span8 posts -->


		<div class="span4 sidebar">
			<!-- <div class="def-block widget">
				<h4> Ads </h4><span class="liner"></span>
				<div class="widget-content tac">
					<a href="#" title="Advertise"><img src="images/ads1.gif" alt="#"></a>
				</div> 
			</div>  -->

			<div class="def-block widget">
				<h5> اكثر المقدمات استماعا </h5><span class="liner"></span>
				<div class="widget-content row-fluid">
					<div class="scroll-oneperson" style="height: auto;">
						<div class="content">
							<ul class="tab-content-items">
								@foreach($moqdmat_best as $moqdma)
								<li>
									<a class="m-thumbnail" href="{{route('moqdma-listen',[$moqdma->id])}}"><img width="50" height="50" src="{{ URL('templates/remix/images/player/album-cover-bg.jpg') }}" alt="#"></a>
									<h3><a href="{{route('moqdma-listen',[$moqdma->id])}}">{{$moqdma->name}}</a></h3>
									<span><a href="{{route('sheikh-moqdmat',[$moqdma->sheikh->id])}}">{{$moqdma->sheikh->name}}</a> </span>
									<span> استمعت {{$moqdma->total_views}} مرة (ات) </span>
								</li>
								@endforeach
							</ul>
						</div>
					</div>
				</div><!-- widget content -->
			</div><!-- def block widget popular items -->
		</div><!-- span4 sidebar -->
	</div><!-- row clearfix -->
</div><!-- end page content -->
@endsection 