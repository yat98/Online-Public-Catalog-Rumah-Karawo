@extends('admin.template_admin')

@section('content')
<div class="content">
    @include('admin.pages.jenis_kain.content_jenis_kain')
</div>
@endsection

@section('javascript-internal')
<script>
    $(document).ready(function () {
        deleteAlert('Data jenis kain akan di hapus?','{{url('admin/jenis-kain/content')}}');
    });
</script>
@endsection