@extends('common/layout')
@section('title', 'Thực hành 5 - Giỏ hàng')

@section('link-lib')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.0/css/bootstrap.min.css"
    integrity="sha512-XWTTruHZEYJsxV3W/lSXG1n3Q39YIWOstqvmFsdNEEQfHoZ6vm6E9GK2OrF6DSJSpIbRbi+Nn0WDPID9O7xB2Q=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection

@section('link')
    <link rel="stylesheet" href="../resources/css/app.css">
@endsection

@section('style')
<style>
    div.main-content .container-md {
        border: solid 1px black;
        background-color: rgb(185, 185, 185);
        padding: 20px 40px;
    }
    hr {
        border: solid 1px black;
        opacity: 1;
    }
    .add-item h3, .view-cart h3 {
        color: rgb(21, 128, 0);
    }
    th, td {
        border-spacing: 0;
        border: solid 1px;
        text-align: center;
        background-color: white;
    }
    td {
        padding: 20px;
    }

    .footer p:last-child {
        text-align: right;
        padding-right: 10px;
        font-size: 12px;
    }
    .view-cart {
        margin-bottom: 20px;
    }
    .menu div{
        font-weight: bolder;
        display: block;
        margin-bottom: 10px;
    }
</style>
@endsection

@section('main-content')
<div class="main-content">
    <div class="container-md">
        <div class="title">
            <h3>My Laptop Shop</h3>
            <hr>
        </div>
    
        @yield('middle-content')
    
        <div class="footer">
            <hr>
            <p>&copy 2020 My Laptop Shop</p>
        </div>
    </div>
</div>
@endsection