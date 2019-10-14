@extends('admin.template_admin')

@section('content')
<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-6">
                            <h4 class="card-title">Edit Produk</h4>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    {!! Form::model($produk,
                    ['action'=>['ProdukController@update',$produk->id],'method'=>'PUT','files'=>true]) !!}
                    @include('admin.pages.produk.form_produk',['buttonLabel'=>"Update produk"])
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection