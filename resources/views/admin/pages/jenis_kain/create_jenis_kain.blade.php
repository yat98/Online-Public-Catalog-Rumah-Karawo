@extends('admin.template_admin')

@section('content')
<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-6">
                            <h4 class="card-title">Tambah Jenis Kain</h4>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    {!! Form::open(['url'=>'admin/jenis-kain','method'=>'POST']) !!}
                    @include('admin.pages.jenis_kain.form_jenis_kain',['buttonLabel'=>"Tambah Jenis Kain"])
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection