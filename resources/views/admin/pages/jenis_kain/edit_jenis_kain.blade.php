@extends('admin.template_admin')

@section('content')
<div class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-6">
                            <h4 class="card-title">Edit Jenis Kain</h4>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    {!! Form::model($jenisKain,
                    ['method'=>'PUT','action'=>['JenisKainController@update',$jenisKain->id]])
                    !!}
                    @include('admin.pages.jenis_kain.form_jenis_kain',['buttonLabel'=>"Update Jenis Kain"])
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection