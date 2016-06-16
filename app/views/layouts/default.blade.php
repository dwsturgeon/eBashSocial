<!doctype html>
<html class="no-js" lang="en">
  
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    @yield('header')
    <title>eBash Gaming Centers</title>
    <link rel="stylesheet" href="{{URL::to('/')}}/stylesheets/app.css" />
    <link rel="stylesheet" type="text/css" href="{{URL::to('/')}}/bower_components/slick-carousel/slick/slick.css"/>
    <script src="{{URL::to('/')}}/bower_components/modernizr/modernizr.js"></script>
  </head>
  
  <body>
    @yield('content')
    <script src="{{URL::to('/')}}/bower_components/jquery/dist/jquery.min.js"></script>
    <script src="{{URL::to('/')}}/bower_components/foundation/js/foundation.min.js"></script>
    <script src="{{URL::to('/')}}/bower_components/slick-carousel/slick/slick.min.js"></script>
    <script src="{{URL::to('/')}}/js/app.js"></script>
  </body>
</html>
