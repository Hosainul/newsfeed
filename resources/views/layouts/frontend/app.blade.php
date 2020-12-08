<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') {{ config('app.name', 'Laravel') }}</title>
    <link rel="stylesheet" type="text/css" href="{{asset('frontend/css/bootstrap.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('frontend/css/font-awesome.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('frontend/css/animate.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('frontend/css/font.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('frontend/css/li-scroller.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('frontend/css/slick.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('frontend/css/jquery.fancybox.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('frontend/css/theme.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('frontend/css/style.css')}}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

@stack('css')
</head>
<body>
    <div id="preloader">
        <div id="status">&nbsp;</div>
    </div>
      <a class="scrollToTop" href="#"><i class="fa fa-angle-up"></i></a>
<div class="container">

@include('layouts.frontend.partial.header')

{{-- @include('layouts.frontend.partial.sliderlatest') --}}


@yield('content')



@include('layouts.frontend.partial.footer')

</div>


      <script src="{{asset('frontend/js/jquery.min.js')}}"></script> 
      <script src="{{asset('frontend/js/wow.min.js')}}"></script> 
      <script src="{{asset('frontend/js/bootstrap.min.js')}}"></script> 
      <script src="{{asset('frontend/js/slick.min.js')}}"></script> 
      <script src="{{asset('frontend/js/jquery.li-scroller.1.0.js')}}"></script> 
      <script src="{{asset('frontend/js/jquery.newsTicker.min.js')}}"></script> 
      <script src="{{asset('frontend/js/jquery.fancybox.pack.js')}}"></script> 
      <script src="{{asset('frontend/js/custom.js')}}"></script>

      <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
      {!! Toastr::message() !!}
      
      <script>
        @if($errors)
            @foreach ($errors as $error)
                toastr.error('{{error}}','Error',{
                    closeButton:true,
                    progressBar:true,
                });
            @endforeach
        @endif
      </script>

@stack('js')

</body>
</html>
