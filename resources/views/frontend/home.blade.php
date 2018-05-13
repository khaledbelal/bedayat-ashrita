@extends('layouts.remix')

@section('title')
    الرئيسية
@endsection

@section('content')
<!-- Start Revolution Slider -->
<div class="sliderr">
	<div class="fullwidthbanner-container">					
		<div class="revolution">
			<ul>
				<li data-transition="random" data-slotamount="7" data-masterspeed="300" > 
					<img src="{{ URL('/templates/remix/images/slides/1.jpg') }}" alt="slider" >
						<a href="{{route('moqdma-listen',[83])}}">		 

							<div class="tp-caption large_text randomrotate"  
								 data-x="559" 
								 data-y="253" 
								 data-speed="500" 
								 data-start="1000" 
								 data-easing="easeInOutExpo"  >أمن يجيب المضطر</div>
											
							<div class="tp-caption medium_text randomrotate"  
								 data-x="563" 
								 data-y="313" 
								 data-speed="500" 
								 data-start="1500" 
								 data-easing="easeInOutExpo"  >بدر المشاري</div>	 
 						</a>				
				</li>
				<li data-transition="random" data-slotamount="7" data-masterspeed="300" >
					<img src="{{ URL('/templates/remix/images/slides/2.jpg') }}" alt="slider2" >
						<a href="{{route('moqdma-listen',[142])}}">		 					
						<div class="tp-caption big_black randomrotate"  
							 data-x="603" 
							 data-y="284" 
							 data-speed="500" 
							 data-start="1200" 
							 data-easing="easeInOutExpo"  >خالد الراشد</div>
										
						<div class="tp-caption big_orange randomrotate"  
							 data-x="701" 
							 data-y="218" 
							 data-speed="500" 
							 data-start="1700" 
							 data-easing="easeInOutExpo"  >   أمي  </div>
						</a> 
				</li> 
				<li data-transition="random" data-slotamount="7" data-masterspeed="300" >
					<img src="{{ URL('/templates/remix/images/slides/3.jpg') }}" alt="slider3" >
						<a href="{{route('moqdma-listen',[366])}}">								
							<div class="tp-caption large_text randomrotate"  
								 data-x="559" 
								 data-y="253" 
								 data-speed="500" 
								 data-start="1000" 
								 data-easing="easeInOutExpo"  >اخطاؤنا في رمضان</div>
											
							<div class="tp-caption medium_text randomrotate"  
								 data-x="563" 
								 data-y="313" 
								 data-speed="500" 
								 data-start="1500" 
								 data-easing="easeInOutExpo"  >مسعد أنور</div>
					 	</a> 
					<!-- 
	<div class="tp-caption medium_text randomrotate"  
		 data-x="565" 
		 data-y="345" 
		 data-speed="500" 
		 data-start="2000" 
		 data-easing="easeInOutExpo"  >Wonderful Gallery</div>
					
	<div class="tp-caption medium_text randomrotate"  
		 data-x="567" 
		 data-y="377" 
		 data-speed="500" 
		 data-start="2500" 
		 data-easing="easeInOutExpo"  >Seo Optimized</div>
					
	<div class="tp-caption small_text randomrotate"  
		 data-x="566" 
		 data-y="407" 
		 data-speed="500" 
		 data-start="3000" 
		 data-easing="easeInOutExpo"  >and Much More ...</div> -->
									</li>


			</ul><!-- End Slides -->
			<div class="tp-bannertimer"></div><!-- Timer -->										
		</div>					
	</div>
</div>
<!-- End Revolution Slider -->

<div class="page-content">
<div class="row row-fluid mbf">
	<div class="def-block clearfix" style="padding-bottom: 20px;">
		<h4> مقدمات مختارة </h4><span class="liner"></span>
		<div class="music-player-list"></div>
	</div>
</div><!-- row music player -->

<div class="row row-fluid clearfix mbf"> 
	<div class="span8">
		<div class="def-block">
			<h4> اخر الاخبار </h4><span class="liner"></span>

			<div class="news row-fluid animtt" data-gen="fadeUp" style="opacity:0;">
				<div class="span5"><img class="four-radius" src="{{ URL('/templates/remix/images/assets/soon.jpg') }}" alt="#"></div>
				<div class="span7">
					<h3 class="news-title">قريبا .. انشئ قائمتك المفضلة</h3>
					<p>جاري العمل بفضل الله وبعونه على تطوير الموقع باكثر من اتجاه منها تسهيل الاستماع الى مقدماتك المفضلة وحفظها لتعود اليها في اي وقت.</p>
					<div class="meta">
						<span> <i class="icon-time mi"></i>11-05-2018 </span> 
					</div><!-- meta --> 
				</div><!-- span7 -->
			</div><!-- news --> 

			<div class="news row-fluid animtt" data-gen="fadeUp" style="opacity:0;">
				<div class="span5"><img class="four-radius" src="{{ URL('/templates/remix/images/assets/under_construction.jpg') }}" alt="#"></div>
				<div class="span7">
					<h3 class="news-title">الموقع تحت التطوير </h3>
					<p>جاري العمل على اعداد الموقع بشكل كامل حتى يلائم رغباتكم.</p>
					<div class="meta">
						<span> <i class="icon-time mi"></i>10-05-2018 </span> 
					</div><!-- meta --> 
				</div><!-- span7 -->
			</div><!-- news --> 
			<!-- <div class="load-news tac"><a href="#" class="tbutton small"><span>Load More</span></a></div> -->
		</div><!-- def block -->
	</div><!-- span8 news -->

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
								<span> {{$moqdma->sheikh->name}} </span>
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


@section('page_level_js')  
    <script type="text/javascript">  
	var myPlaylist = [ 
		@foreach($moqdmat as $moqdma)
		{
			id:'{{$moqdma->id}}',
			mp3:'{{URL($moqdma->path)}}',
			oga:'music/5.ogg',
			title:'{{$moqdma->name}}',
			artist:'{{$moqdma->sheikh->name}}',
			rating:5,
			buy:'#',
			price:'17',
			duration:'5:25',
			cover:'music/180x180.jpg'	
		}
		 @if(!$loop->last)
		 {{ ',' }}
		 @endif
		@endforeach
	];
	jQuery(document).ready(function ($) {
		$('.music-player-list').ttwMusicPlayer(myPlaylist, {
			currencySymbol:'$',
			buyText:'BUY',
			tracksToShow:4,
			autoplay:true,
			ratingCallback:function(index, playlistItem, rating){ 
				//
			},
			jPlayer:{
				swfPath:'http://www.jplayer.org/2.1.0/js'
			}
		});
	});

    </script>
@endsection
