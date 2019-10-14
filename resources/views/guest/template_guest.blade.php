@extends('template')

@section('css')
<link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('css/core-style.css') }}">
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
@endsection

@section('footer')
@include('guest.pages.footer')
@endsection

@section('javascript')
<script src="{{ asset('js/jquery/jquery-2.2.4.min.js') }}"></script>
<script src="{{ asset('js/popper.min.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/plugins.js') }}"></script>
<script src="{{ asset('js/jquery-lazy/jquery.lazy.min.js') }}"></script>
<script src="{{ asset('js/jquery-lazy/jquery.lazy.plugins.min.js') }}"></script>
<script src="{{ asset('js/active.js') }}"></script>
<script src="{{ asset('js/script.js') }}"></script>
<script>
    $(function() {
        $('.lazy').lazy();
    });
         
</script>
@endsection