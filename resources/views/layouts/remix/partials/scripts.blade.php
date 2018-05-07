<script type="text/javascript" src="{{ URL('/templates/remix/js/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ URL('/templates/remix/js/theme20.js') }}"></script>
<script type="text/javascript" src="{{ URL('/templates/remix/bootstrap/js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ URL('/templates/remix/js/rs-plugin/pluginsources/jquery.themepunch.plugins.min.js') }}"></script>	
<script type="text/javascript" src="{{ URL('/templates/remix/js/rs-plugin/js/jquery.themepunch.revolution.min.js') }}"></script>
<script type="text/javascript" src="{{ URL('/templates/remix/js/jquery.prettyPhoto.js') }}"></script>
<script type="text/javascript" src="{{ URL('/templates/remix/js/jquery.flexslider-min.js') }}"></script>
<script type="text/javascript" src="{{ URL('/templates/remix/js/jquery.jplayer.js') }}"></script>
<script type="text/javascript" src="{{ URL('/templates/remix/js/ttw-music-player-min.js') }}"></script>
<!-- <script type="text/javascript" src="{{ URL('/templates/remix/music/myplaylist.js') }}"></script> -->
<script type="text/javascript" src="{{ URL('/templates/remix/js/countdown.js') }}"></script>
<script type="text/javascript" src="{{ URL('/templates/remix/js/jquery.nicescroll.min.js') }}"></script>
<script type="text/javascript" src="{{ URL('/templates/remix/js/twitter/jquery.tweet.js') }}"></script>
<script type="text/javascript" src="{{ URL('/templates/remix/js/custom.js') }}"></script>
@yield('page_level_js')
<script type="text/javascript">	
/* <![CDATA[ */
	var tpj=jQuery;
	tpj.noConflict();
	tpj(document).ready(function() {
	if (tpj.fn.cssOriginal!=undefined)
		tpj.fn.css = tpj.fn.cssOriginal;
		var api= tpj('.revolution').revolution({
			delay:9000,
			startheight:380,
			startwidth:960,
			hideThumbs:200,
			thumbWidth:80,
			thumbHeight:50,
			thumbAmount:5,
			navigationType:"none",
			navigationArrows:"verticalcentered",
			navigationStyle:"square",	
			touchenabled:"on", 
			onHoverStop:"on", 
			navOffsetHorizontal:0,
			navOffsetVertical:20,
			shadow:0
		});
		tpj("#event1").countdown({
			date: "31 December 2013 23:59:59",
			format: "on"
		},
		function() {
			// callback function
		});
	});
/* ]]> */

	function increaseTotalViews(index){   
        jQuery.ajax({
            url: "{{ route('increase_view') }}",
            data: { moqdma_id: myPlaylist[index].id },
            type: 'get',
            success: function(data){ 
            	//alert(data);
            }
        });   
	}
</script>
