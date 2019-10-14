@extends('admin.template_admin')

@section('content')
<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-6">
                            <h4 class="card-title">Edit Kategori</h4>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    {!! Form::model($kategori, ['method'=>'PUT','action'=>['KategoriController@update',$kategori->id]])
                    !!}
                    @include('admin.pages.kategori.form_kategori',['buttonLabel'=>"Update Kategori"])
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection