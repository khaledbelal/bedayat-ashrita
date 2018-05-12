<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta name="description" content="My Store">
    <meta name="author" content="khaledbelal">
    <meta name="keyword" content="My Store">
    <title>@yield('title') - CPanel - Moqdmat Ashrita</title>
    
    <link rel="apple-touch-icon" href="{{ url('/templates/stack/app-assets/images/ico/apple-icon-120.png') }} ">
    <link rel="shortcut icon" type="image/x-icon" href="{{ url('/templates/stack/app-assets/images/ico/favicon.ico') }}">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i%7COpen+Sans:300,300i,400,400i,600,600i,700,700i" rel="stylesheet">
    <!-- BEGIN VENDOR CSS-->
    <link rel="stylesheet" type="text/css" href="{{ URL('/templates/stack/app-assets/css-rtl/bootstrap.css') }}">
   

    <link rel="stylesheet" type="text/css" href="{{ URL('/templates/stack/app-assets/fonts/feather/style.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL('/templates/stack/app-assets/fonts/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL('/templates/stack/app-assets/fonts/flag-icon-css/css/flag-icon.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL('/templates/stack/app-assets/vendors/css/extensions/pace.css') }}"> 

    @yield('vendor_css')
    <!-- END VENDOR CSS-->  
    <!-- BEGIN STACK CSS-->
    <link rel="stylesheet" type="text/css" href="{{ URL('/templates/stack/app-assets/css-rtl/bootstrap-extended.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL('/templates/stack/app-assets/css-rtl/app.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL('/templates/stack/app-assets/css-rtl/colors.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL('/templates/stack/app-assets/css-rtl/custom-rtl.css') }}">
    
    <!-- END STACK CSS-->
    <!-- BEGIN Page Level CSS-->
    @yield('page_level_css') 
    <link rel="stylesheet" type="text/css" href="{{ URL('/templates/stack/app-assets/css-rtl/core/menu/menu-types/vertical-menu.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ URL('/templates/stack/app-assets/css-rtl/core/menu/menu-types/vertical-overlay-menu.css') }}">  
    <!-- END Page Level CSS-->
    <!-- BEGIN Custom CSS--> 
    <link rel="stylesheet" type="text/css" href="{{ URL('/templates/stack/assets/css/style-rtl.css') }}"> 
    @yield('custom_css') 
</head>