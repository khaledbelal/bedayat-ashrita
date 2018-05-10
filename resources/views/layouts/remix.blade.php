<!DOCTYPE html>
<!--[if IE 7 ]><html class="ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie8" lang="en"> <![endif]-->
<!--[if IE 9 ]><html class="ie9" xmlns="http://www.w3.org/1999/xhtml" lang="en-US"> <![endif]-->
<!--[if (gte IE 10)|!(IE)]><!-->
<html xmlns="http://www.w3.org/1999/xhtml" lang="en-US">
<!--<![endif]-->
<head>
	@include('layouts.remix.partials.htmlheader')
</head>

<body id="fluidGridSystem">
	<div id="layout" class="full">
		<!-- popup login -->
		@include('layouts.remix.partials.login')
		<!-- popup login -->

		<header id="header" class="glue">
			@include('layouts.remix.partials.mainheader') 
		</header><!-- end header -->
		
		@yield('content')

		<footer id="footer"> 
			@include('layouts.remix.partials.footer')
		</footer><!-- end footer -->

	</div><!-- end layout -->
<!-- Scripts -->

	@include('layouts.remix.partials.scripts')
	
</body>
</html>