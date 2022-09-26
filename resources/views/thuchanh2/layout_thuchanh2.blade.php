@extends('common/layout')

@section('title-page', 'Vo Chi Dung')

@section('link-lib')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.0/css/bootstrap.min.css"
        integrity="sha512-XWTTruHZEYJsxV3W/lSXG1n3Q39YIWOstqvmFsdNEEQfHoZ6vm6E9GK2OrF6DSJSpIbRbi+Nn0WDPID9O7xB2Q=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection

@section('link')
    <link rel="stylesheet" href="{{ URL::asset('css/app.css') }}">
@endsection

@section('main-content')
    @yield('main-content')
@endsection