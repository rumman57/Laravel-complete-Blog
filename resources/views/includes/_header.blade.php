<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
   

    <title>Laravel Blog | @yield('title')</title>

    <!-- Bootstrap core CSS -->     
    <link rel="stylesheet" href="{{ URL::asset('css/bootstrap.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('css/normalize.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('css/component.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('css/custom-styles.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('css/font-awesome.min.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('css/demo.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('css/font-awesome-ie7.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('css/style.css') }}" />

    @yield('stylesheets')
    @include('../partials/_js_header')
    
  </head>
  <body>
    <div class="header-wrapper">
      <div class="site-name">
        @if(!empty($options->site_title_image))
        <img src="{{URL::asset('img/'.$options->site_title_image)}}">
        @else
        <h1>{{$options->site_title_text}}</h1>
        @endif
        <h2>{{$options->site_description}}</h2>
      </div>
    </div>