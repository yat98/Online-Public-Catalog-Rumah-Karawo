@extends('admin.template_admin')

@section('content')
<div class="content">
    @include('admin.pages.kategori.content_kategori')
</div>
@endsection

@section('javascript-internal')
<script>
    $(document).ready(function () {
        deleteAlert('Data kategori akan di hapus?','{{url('admin/kategori/content')}}');
    });
</script>
@endsection