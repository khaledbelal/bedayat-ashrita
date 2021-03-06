 
<div class="headdown">
	<div class="row clearfix">
		<div class="logo bottomtip" title="اكثر من 400 مقدمة لاكثر من 20 شيخ وعالم">
			<a href="{{ route('home') }}"><h1><span>إصلاح الجوارح والافئدة من</span><br>مقدمات الأشرطة</h1></a>
		</div><!-- end logo -->

		<nav>
			<ul class="sf-menu">
				<li class="{{(Route::currentRouteName() == 'home' ) ? 'current selectedLava' : ''}}"><a href="{{ route('home') }}">الرئيسية<span class="sub">استمتمع معنا</span></a></li>

				<li class="{{(Route::currentRouteName() == 'all-sheikhs' ) ? 'current selectedLava' : ''}}"><a href="{{ route('all-sheikhs') }}">الشيوخ<span class="sub">ترتيب ابجدي</span></a></li>

				<li class="{{(Route::currentRouteName() == 'all-moqdmat' or Route::currentRouteName() == 'moqdmat-filter') ? 'current selectedLava' : ''}}"><a href="{{ route('all-moqdmat') }}">المقدمات<span class="sub">ترتيب ابجدي</span></a></li>

				<li class="{{(Route::currentRouteName() == 'about') ? 'current selectedLava' : ''}}"><a href="{{ route('about') }}">عن الموقع<span class="sub">تعرف علينا</span></a></li>
				<li class="{{(Route::currentRouteName() == 'contact') ? 'current selectedLava' : ''}}"><a href="{{ route('contact') }}">اتصل بنا<span class="sub">يشرفنا محادثتك</span></a></li>  
			</ul><!-- end menu -->
		</nav><!-- end nav -->
		<div class="little-head">
		<!-- <div id="Login_PopUp_Link" class="sign-btn tbutton small"><span>Sign In</span></div> -->
 
		<div class="search">
			<form action="{{route('moqdmat-search')}}" id="search" method="post">
				<input id="inputhead" name="search" type="text" onfocus="if (this.value=='ابحث الان ...') this.value = '';" onblur="if (this.value=='') this.value = 'ابحث الان ...';" value="ابحث الان ..." placeholder="ابحث الان ...">
				<button type="submit"><i class="icon-search"></i></button>
                {{ csrf_field() }} 
			</form><!-- end form -->
		</div><!-- search -->
	</div><!-- little head -->
	</div><!-- row -->
</div><!-- headdown -->
