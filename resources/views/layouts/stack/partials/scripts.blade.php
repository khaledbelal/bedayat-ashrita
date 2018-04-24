 <!-- BEGIN VENDOR JS-->
<script src="{{ URL('/templates/stack/app-assets/vendors/js/vendors.min.js') }}" type="text/javascript"></script>
<!-- BEGIN VENDOR JS-->
<!-- BEGIN PAGE VENDOR JS-->
@yield('page_vendor_js')
<!-- END PAGE VENDOR JS-->
<!-- BEGIN STACK JS-->
<script src="{{ URL('/templates/stack/app-assets/js/core/app-menu.js') }}" type="text/javascript"></script>
<script src="{{ URL('/templates/stack/app-assets/js/core/app.js') }}" type="text/javascript"></script>
<!-- END STACK JS-->
<!-- BEGIN PAGE LEVEL JS-->
@yield('page_level_js')
<!-- END PAGE LEVEL JS-->

@stack('scripts')