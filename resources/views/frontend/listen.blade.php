@extends('layouts.remix')

@section('title')
    {{ $moqdma->name }} للشيخ {{ $moqdma->sheikh->name }}
@endsection

@section('content') 
<div class="under_header">
	<!-- <img src="{{ URL('/templates/remix/images/assets/ramadan.jpg') }}" alt="#"> -->
</div><!-- under header -->

<div class="page-content back_to_up">
	<div class="row clearfix mb">
		<div class="breadcrumbIn">
			<ul>
				<li><a href="{{ route('home') }}" class="toptip" title="Homepage"> <i class="icon-home"></i> </a></li>
				<li><a href="{{ route('all-moqdmat') }}"> المقدمات </a></li>
				<li><a href="{{ route('sheikh-moqdmat',[$moqdma->sheikh->id]) }}"> {{$moqdma->sheikh->name}} </a></li>
				<li> {{$moqdma->name}} </li>
			</ul>
		</div><!-- breadcrumb -->
	</div><!-- row -->

	<div class="row row-fluid clearfix mbf">

		<div class="span4 sidebar">

			<!-- <div class="def-block widget">
				<h4> Ads </h4><span class="liner"></span>
				<div class="widget-content tac">
					<a href="#" title="Advertise"><img src="images/ads1.gif" alt="#"></a>
				</div> 
			</div>  -->
			
			<div class="def-block widget">
				<h5> الاكثر استماعا ل<span>{{ $moqdma->sheikh->name }}</span> </h5><span class="liner"></span>
				<div class="widget-content row-fluid">
					<div class="scroll-oneperson" style="height: auto;">
						<div class="content">
							<ul class="tab-content-items">
								@foreach($sheikh_moqdmat as $sheikh_moqdma)
								<li>
									<a class="m-thumbnail" href="{{route('moqdma-listen',[$sheikh_moqdma->id])}}"><img width="50" height="50" src="{{ URL('templates/remix/images/player/album-cover-bg.jpg') }}" alt="#"></a>
									<h3><a href="{{route('moqdma-listen',[$sheikh_moqdma->id])}}">{{$sheikh_moqdma->name}}</a></h3>
									<span> {{$sheikh_moqdma->sheikh->name}} </span>
									<span> استمعت {{$sheikh_moqdma->total_views}} مرة (ات) </span>
								</li>
								@endforeach
							</ul>
						</div>
					</div>
				</div><!-- widget content -->
			</div><!-- def block widget popular items -->

		</div><!-- span4 sidebar -->
		<div class="span8 posts">
			<div class="def-block">
				<div class="post row-fluid clearfix">
					<div class="music-single mbf clearfix"></div><!-- Player -->
					
					<p>{{ $moqdma->description }}</p>

					<p>
						<span> Tags: </span>
						<a href="#" class="#"> {{$moqdma->sheikh->name}} </a>,
						<a href="#" class="#"> {{ $moqdma->name }} </a>
					</p><!-- tags -->

					<div class="meta">
						<span> <i class="icon-time mi"></i>  {{ date('Y-m-d H:i',strtotime($moqdma->created_at))}} </span>
						<span><i class="icon-user mi"></i> {{$moqdma->user->name}}  </span>
					</div><!-- meta -->

 
				</div><!-- post -->

				<!-- Disqus Comment Form -->
					<!-- <div id="disqus_thread"></div>
					<script type="text/javascript">
					/* <![CDATA[ */
						var disqus_shortname = 'remixtemplate';
						(function() {
							var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
							dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
							(document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
						})();
					/* ]]> */
					</script><noscript>Please enable JavaScript to view the <a href="http://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript> -->
				<!-- Disqus Comment Form --> 
				<div class="sharethis-inline-share-buttons"></div>
			</div><!-- def block -->
		</div><!-- span8 posts -->

	</div><!-- row clearfix -->
</div><!-- end page content -->
@endsection


@section('page_level_js') 
    <script type="text/javascript">  
	var myPlaylist = [ 
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
	];
	jQuery(document).ready(function ($) {
		$('.music-single').ttwMusicPlayer(myPlaylist, {
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
