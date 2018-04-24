<!DOCTYPE html>
<html lang="ar" data-textdirection="rtl" class="loading">
@include('layouts.stack.partials.htmlheader')  
<body data-open="click" data-menu="vertical-menu" data-col="1-column" class="vertical-layout vertical-menu 1-column   menu-expanded blank-page blank-page"> 
    <div class="app-content content container-fluid">
      <div class="content-wrapper">
        <div class="content-header row"> </div>
        <div class="content-body">
        	@yield('content')   
        </div>
      </div>
    </div>
    @include('layouts.stack.partials.scripts')        
</body>
</html> 
 