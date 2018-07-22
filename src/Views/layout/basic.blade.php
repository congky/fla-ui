@extends('flaCommonUI::layout.abstract')

@section('abs-header')
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
    @yield('custom-meta')
    <title>FLA - @yield('title')</title>

    <link href="{{asset('app/fla-ui/style/admin/css/admin.main.min.css')}}" rel="stylesheet">
    @yield('custom-style')
    <link href="{{asset('app/fla-ui/style/admin/css/admin.custom.css')}}" rel="stylesheet">

    <script src="{{asset('app/fla-ui/core/js/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('app/fla-ui/core/js/angular.min.js')}}"></script>
    <script src="{{asset('app/fla-ui/core/js/angular-route.min.js')}}"></script>

    <script src="{{asset('app/fla-ui/core/js/app.route.js')}}"></script>
    <script src="{{asset('app/fla-ui/core/js/app.util.js')}}"></script>
    <script src="{{asset('app/fla-ui/core/js/app.basic.module.js')}}"></script>
    <script src="{{asset('app/fla-ui/core/js/app.service.js')}}"></script>
    @yield('custom-script')
@endsection

@section('abs-content')
    @yield('content')
@endsection

@section('abs-footer')
    @yield('footer')
@endsection