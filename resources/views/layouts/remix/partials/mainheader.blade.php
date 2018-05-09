<div class="row clearfix">
	<div class="little-head">
		<div id="Login_PopUp_Link" class="sign-btn tbutton small"><span>Sign In</span></div>

		<div class="social social-head">
			<a href="http://twitter.com/behzadg1" class="bottomtip" title="Follow us on Twitter" target="_blank"><i class="icon-twitter"></i></a>
			<a href="http://fb.com/theme20" class="bottomtip" title="Like us on Facebook" target="_blank"><i class="icon-facebook"></i></a>
			<a href="https://plus.google.com/u/0/104807493509867599773" class="bottomtip" title="GooglePlus" target="_blank"><i class="icon-google-plus"></i></a>
			<a href="http://instagram.com/" class="bottomtip" title="instagram" target="_blank"><i class="icon-instagram"></i></a>
			<a href="http://dribbble.com/behzadg" class="bottomtip" title="Dribbble" target="_blank"><i class="icon-dribbble"></i></a>
			<a href="https://soundcloud.com/behzad-gh" class="bottomtip" title="Soundcloud" target="_blank"><i class="icon-cloud"></i></a>
			<a href="http://www.linkedin.com/" class="bottomtip" title="Linkedin" target="_blank"><i class="icon-linkedin"></i></a>
		</div><!-- end social -->

		<div class="search">
			<form action="search.html" id="search" method="get">
				<input id="inputhead" name="search" type="text" onfocus="if (this.value=='Start Searching...') this.value = '';" onblur="if (this.value=='') this.value = 'Start Searching...';" value="Start Searching..." placeholder="Start Searching ...">
				<button type="submit"><i class="icon-search"></i></button>
			</form><!-- end form -->
		</div><!-- search -->
	</div><!-- little head -->
</div><!-- row -->

<div class="headdown">
	<div class="row clearfix">
		<div class="logo bottomtip" title="Best and Most Popular Musics">
			<a href="#"><img src="{{ URL('/templates/remix/images/logo.png') }}" alt="Best and Most Popular Musics"></a>
		</div><!-- end logo -->

		<nav>
			<ul class="sf-menu">
				<li class="{{(Route::currentRouteName() == 'home') ? 'current selectedLava' : ''}}"><a href="{{ route('home') }}">الرئيسية<span class="sub">استمتمع معنا</span></a></li>

				<li><a href="index.html">الشيوخ<span class="sub">ترتيب ابجدي</span></a></li>

				<li class="{{(Route::currentRouteName() == 'all-moqdmat') ? 'current selectedLava' : ''}}"><a href="{{ route('all-moqdmat') }}">المقدمات<span class="sub">ترتيب ابجدي</span></a></li>

				<li><a href="videos.html">من نحن<span class="sub">تعرف علينا</span></a></li>
				<li><a href="gallery4.html">اتصل بنا<span class="sub">يشرفنا محادثتك</span></a></li>  
			</ul><!-- end menu -->
		</nav><!-- end nav -->
	</div><!-- row -->
</div><!-- headdown -->