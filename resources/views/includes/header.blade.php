<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" >
    <meta content="ie-edge">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/fontawesome-free-5.10.1-web/fontawesome-free-5.10.1-web/css/all.min.css')}}">


    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('css/style.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{asset('css/form.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{asset('css/appviews.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{asset('css/404.css') }}" rel="stylesheet" type="text/css" />


</head>
<body>