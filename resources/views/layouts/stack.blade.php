<!DOCTYPE html>
<html lang="ar" data-textdirection="rtl" class="loading">
    @include('layouts.stack.partials.htmlheader') 
	<body data-open="click" data-menu="vertical-menu" data-col="2-columns" class="vertical-layout vertical-menu 2-columns   menu-expanded fixed-navbar">
   
    @include('layouts.stack.partials.mainheader')  
    @include('layouts.stack.partials.sidebar')  

	<div class="app-content content container-fluid">
	  <div class="content-wrapper">
	      	<div class="content-header row">
	          <div class="content-header-left col-md-6 col-xs-12 mb-1">
	            <h3 class="content-header-title">@yield('title')</h3>
	          </div>
	          <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-xs-12">
	            <div class="breadcrumb-wrapper col-xs-12">
	              <!-- <ol class="breadcrumb">
	                <li class="breadcrumb-item"><a href="index.html">Home</a>
	                </li>
	                <li class="breadcrumb-item"><a href="#">Tables</a>
	                </li>
	                <li class="breadcrumb-item active">Basic Tables
	                </li>
	              </ol> -->
	            </div>
	          </div>
	        </div>
	        <div class="content-body">
		        @yield('content')  
	        </div>
	    </div>
	</div>
 
    @include('layouts.stack.partials.footer') 
    @include('layouts.stack.partials.scripts') 

</body>
</html>
 

