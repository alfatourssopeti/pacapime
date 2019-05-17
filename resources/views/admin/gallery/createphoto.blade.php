@extends('layouts.backend')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Create New Gallery Photo</div>
                    <div class="card-body">
                        <a href="{{  url()->previous()  }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <br />
                        <br />

                        @if ($errors->any())
                            <ul class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach    protected $fillable = [
        'name', 'desc','url','image'
    ];
                            </ul>
                        @endif

                        {!! Form::open(['method' => 'POST', 'url' => '/admin/gallery/photo', 'class' => 'form-horizontal' , 'files' => true]) !!}
                        {{ Form::hidden('album_id', $id) }}

                        @include ('admin.gallery.formphoto', ['formMode' => 'create'])

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
