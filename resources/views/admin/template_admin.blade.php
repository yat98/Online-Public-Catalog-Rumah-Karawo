@extends('template')

@section('css')
{{-- <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" /> --}}
<link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap_admin.min.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('css/font-awesome.min.css') }}">
<link href="{{ asset('css/paper-dashboard.min.css?v=2.0.0') }}" rel="stylesheet" />
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
@endsection

@section('main')
<div class="wrapper ">
    @include('admin.pages.navbar')
    @yield('content')
    @include('admin.pages.footer')
</div>
{{-- </div>
</div>
</div> --}}
@endsection

@section('javascript')
<script src="{{ asset('js/jquery/jquery-3.2.1.min.js') }}"></script>
<script src="{{ asset('js/popper.min.js') }}"></script>
<script src="{{ asset('js/bootstrap_admin.min.js') }}"></script>
<script src="{{ asset('js/perfect-scrollbar.jquery.min.js') }}"></script>
<script src="{{ asset('js/chartjs.min.js') }}"></script>
<script src="{{ asset('js/bootstrap-notify.js') }}"></script>
<script src="{{ asset('js/paper-dashboard.min.js?v=2.0.0') }}" type="text/javascript"></script>
@include('sweetalert::alert')
<script src="{{ asset('js/script.js') }}" type="text/javascript"></script>
@endsection