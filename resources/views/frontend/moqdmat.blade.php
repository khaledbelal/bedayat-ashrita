@extends('layouts.remix')

@section('title')
    قائمة الشيوخ 
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
					<div class="def-block widget">
						<h4> Ads </h4><span class="liner"></span>
						<div class="widget-content tac">
							<a href="#" title="Advertise"><img src="images/ads1.gif" alt="#"></a>
						</div><!-- widget content -->
					</div><!-- def block widget ads -->

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
							<li><a href="#Albums"> New Albums</a></li>
							<li><a href="#Soon"> Comming Soon </a></li>
						</ul><!-- tabs -->

						<ul class="tabs-content">
							<li id="Latest" class="active">
								<div class="post no-border no-mp clearfix">
									<ul class="tab-content-items">
										@foreach($moqdmat_created as $moqdma)
										<li class="grid_6">
											<a class="m-thumbnail" href="mp3_single_half.html"><img width="50" height="50" src="{{ URL('/templates/remix/images/assets/thumb-mp3-1.jpg')}}" alt="#"></a>
											<h3><a href="mp3_single_half.html">{{$moqdma->name}}</a></h3>
											<span> للشيخ {{$moqdma->sheikh->name}} </span>
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
											<a class="m-thumbnail" href="mp3_single_half.html"><img width="50" height="50" src="{{ URL('/templates/remix/images/assets/thumb-mp3-1.jpg')}}" alt="#"></a>
											<h3><a href="mp3_single_half.html">{{$moqdma->name}}</a></h3>
											<span> للشيخ {{$moqdma->sheikh->name}} </span>
											<span> استمعت {{$moqdma->total_views}} مرة (ات)</span>
										</li>
										@endforeach 
									</ul>
								</div><!-- latest -->
							</li><!-- tab content -->

							<li id="Albums">
								<div class="mp3-albums">
										@foreach($moqdmat_total_views as $moqdma)
									<a href="mp3_play_list.html" class="grid_3">
										<img src="{{ URL('/templates/remix/images/assets/thumb-mp3-1.jpg')}}" alt="#">
										<span><strong>Michele Jordan</strong>New Day</span>
									</a>
										@endforeach 
									 
								</div><!-- mp3 albums -->
							</li><!-- tab content -->

							<li id="Soon">
								<p>Nulla id ligula arcu. Integer et tincidunt lectus. Duis id ligula diam, quis dapibus erat. Curabitur nec libero et est vulputate sollicitudin. Fusce sit amet turpis sed mauris volutpat posuere.</p>
								<div class="news row-fluid">
									<div class="span5"><img class="four-radius" src="images/assets/news1.jpg" alt="#"></div>
									<div class="span7">
										<h3 class="news-title"> Michele Jordan Release New Album in September 2014 </h3>
										<p>Nine Inch Nails aren't on the bill, and they won't play the fest anytime soon. Soundwave promoter AJ Maddah started a Twitter war-of-words with a few choice comments about NIN's Trent Reznor. mauris volutpat posuere. Morbi vulputate, odio eget adipiscing faucibus, lorem ipsum facilisis justo, gravida tempus orci nisi ac eros. Pellentesque metus dolor.</p>
									</div><!-- span7 -->
								</div><!-- news -->
								<div class="news row-fluid">
									<div class="span5"><img class="four-radius" src="images/assets/news3.jpg" alt="#"></div>
									<div class="span7">
										<h3 class="news-title"> New Track Named Without You (Remix) </h3>
										<p>Nine Inch Nails aren't on the bill, and they won't play the fest anytime soon. Soundwave promoter AJ Maddah started a Twitter war-of-words with a few choice comments about NIN's Trent Reznor. mauris volutpat posuere. Morbi vulputate, odio eget adipiscing faucibus, lorem ipsum facilisis justo, gravida tempus orci nisi ac eros. Pellentesque metus dolor.</p>
									</div><!-- span7 -->
								</div><!-- news -->
							</li><!-- tab content -->

						</ul><!-- end tabs -->

					</div><!-- def block -->
				</div><!-- span8 posts -->

			</div><!-- row clearfix -->
		</div><!-- end page content -->
@endsection


@section('page_level_js') 
    <script type="text/javascript">  
	var myPlaylist = [ 
		{
			id:'1',
			mp3:'http://3.s3.envato.com/files/10407161/preview.mp3',
			oga:'music/5.ogg',
			title:'Missing You',
			artist:'Dejans',
			rating:5,
			buy:'#',
			price:'17',
			duration:'5:25',
			cover:'music/180x180.jpg'	
		},
		{
			id:'2',
			mp3:'http://3.s3.envato.com/files/54178721/preview.mp3',
			oga:'music/4.ogg',
			title:'Midnight In Tokyo',
			artist:'BlueFoxMusic',
			rating:4,
			buy:'#',
			price:'17',
			duration:'2:51',
			cover:'music/180x180.jpg'	
		},		
		{
			id:'3',
			mp3:'http://1.s3.envato.com/files/54821639/preview.mp3',
			oga:'music/1.ogg',
			title:'Walking On Horizon',
			artist:'Dejans',
			rating:5,
			buy:'#',
			price:'17',
			duration:'4:29',
			cover:'music/180x180.jpg'
		},
		{
			id:'4',
			mp3:'http://2.s3.envato.com/files/62716273/preview.mp3',
			oga:'music/6.ogg',
			title:'A Happy Carefree Day',
			artist:'JoshKramerMusic',
			rating:5,
			buy:'#',
			price:'13',
			duration:'2:45',
			cover:'music/180x180.jpg'	
		},
		{
			id:'5',
			mp3:'http://3.s3.envato.com/files/41975807/preview.mp3',
			oga:'music/2.ogg',
			title:'Through the Clouds',
			artist:'Dejans',
			rating:4,
			buy:'#',
			price:'17',
			duration:'5:56',
			cover:'music/180x180.jpg'	
		},
		{
			id:'6',
			mp3:'http://3.s3.envato.com/files/2229255/preview.mp3',
			oga:'music/3.ogg',
			title:'Live My Life',
			artist:'Metrolightmusic',
			rating:5,
			buy:'#',
			price:'17',
			duration:'2:31',
			cover:'music/180x180.jpg'	
		}
	];
	jQuery(document).ready(function ($) {
		$('.music-player-list').ttwMusicPlayer(myPlaylist, {
			currencySymbol:'$',
			buyText:'BUY',
			tracksToShow:3,
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
