@extends('template')


@section('css')
<link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/font-awesome.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/animate.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('vendor/css-hamburgers/hamburgers.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('vendor/animsition/css/animsition.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('vendor/select2/select2.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('vendor/daterangepicker/daterangepicker.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/util_login.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/main_login.css') }}">
@endsection


@section('main')
{{-- Main --}}
@if ($errors->has('username'))
@php
Alert::error('Oops!',$errors->first('username'));
@endphp
@endif
@if ($errors->has('password'))
@php
Alert::error('Oops!',$errors->first('password'));
@endphp
@endif
<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
            {!! Form::open(['url'=>'login','method'=>'post',
            'class'=>'login100-form validate-form p-l-55 p-r-55 p-t-178']) !!}
            <span class="login100-form-title">
                Login
            </span>
            <div class="wrap-input100 validate-input m-b-16" data-validate="Username wajib diisi">
                <input value="{{ isset($username) ? $username : old('username') }}" class="input100" type="text"
                    name="username" placeholder="Username">
                <span class="focus-input100"></span>
            </div>

            <div class="wrap-input100 validate-input" data-validate="Password wajib diisi">
                <input class="input100" type="password" name="password" placeholder="Password">
                <span class="focus-input100"></span>
            </div>

            <div class="text-right p-t-13 p-b-23"></div>

            <div class="container-login100-form-btn">
                <button type="submit" class="login100-form-btn">
                    Login
                </button>
            </div>

            <div class="flex-col-c p-t-170 p-b-40"></div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
{{-- Main End --}}
@endsection

@section('javascript')
<script src="{{ asset('js/jquery/jquery-3.2.1.min.js') }}"></script>
<script src="{{ asset('vendor/animsition/js/animsition.min.js') }}"></script>
<script src="{{ asset('js/popper.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('vendor/select2/select2.min.js') }}"></script>
<script src="{{ asset('vendor/daterangepicker/moment.min.js') }}"></script>
<script src="{{ asset('vendor/daterangepicker/daterangepicker.js') }}"></script>
<script src="{{ asset('vendor/countdowntime/countdowntime.js') }}"></script>
<script src="{{ asset('js/main_login.js') }}"></script>
@include('sweetalert::alert')
@endsection