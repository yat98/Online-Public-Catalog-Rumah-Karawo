@extends('admin.template_admin')

@section('content')
<div class="content">
    @include('admin.pages.produk.content_produk')
</div>
@endsection

@section('javascript-internal')
<script>
    $(document).ready(function () {
        deleteAlert('Data produk akan di hapus?','{{url('admin/product/content')}}');
    });
</script>
@endsection