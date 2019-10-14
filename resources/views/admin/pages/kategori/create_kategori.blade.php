@extends('admin.template_admin')

@section('content')
<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-6">
                            <h4 class="card-title">Tambah Kategori</h4>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    {!! Form::open(['url'=>'admin/kategori','method'=>'POST']) !!}
                    @include('admin.pages.kategori.form_kategori',['buttonLabel'=>"Tambah Kategori"])
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection