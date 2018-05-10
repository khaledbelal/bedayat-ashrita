 
<div class="headdown">
	<div class="row clearfix">
		<div class="logo bottomtip" title="Best and Most Popular Musics">
			<a href="{{ route('home') }}"><h1><span>إصلاح الجوارح الافئدة من</span><br>مقدمات الأشرطة</h1></a>
		</div><!-- end logo -->

		<nav>
			<ul class="sf-menu">
				<li class="{{(Route::currentRouteName() == 'home' ) ? 'current selectedLava' : ''}}"><a href="{{ route('home') }}">الرئيسية<span class="sub">استمتمع معنا</span></a></li>

				<li class="{{(Route::currentRouteName() == 'all-sheikhs' ) ? 'current selectedLava' : ''}}"><a href="{{ route('all-sheikhs') }}">الشيوخ<span class="sub">ترتيب ابجدي</span></a></li>

				<li class="{{(Route::currentRouteName() == 'all-moqdmat' or Route::currentRouteName() == 'moqdmat-filter') ? 'current selectedLava' : ''}}"><a href="{{ route('all-moqdmat') }}">المقدمات<span class="sub">ترتيب ابجدي</span></a></li>

				<li><a href="videos.html">من نحن<span class="sub">تعرف علينا</span></a></li>
				<li><a href="gallery4.html">اتصل بنا<span class="sub">يشرفنا محادثتك</span></a></li>  
			</ul><!-- end menu -->
		</nav><!-- end nav -->
	</div><!-- row -->
</div><!-- headdown -->
