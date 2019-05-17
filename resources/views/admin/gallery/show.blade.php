@extends('layouts.backend')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Album {{ $album->name }}</div>
                    <div class="card-body">

                        <a href="{{ url('/admin/gallery') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/admin/gallery/photo/create/' . $album->id . '') }}" class="btn btn-success btn-sm" title="Add New Photo">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New photo
                        </a>
                        <a href="{{ url('/admin/gallery/' . $album->id . '/edit') }}" title="timeline User"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                        {!! Form::open([
                            'method' => 'DELETE',
                            'url' => ['/admin/gallery', $album->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-sm',
                                    'title' => 'Delete gallery',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            ))!!}
                        {!! Form::close() !!}
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>ID.</th> <th>Name</th>  <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($photo as $photo)
                                    <tr>
                                        <td>{{ $photo->id }}</td> <td> {{ $photo->name }} </td> <td><a href="/{{$photo->url}}" target="_blank"><img  style="width:200px;height:200px;" class="img-thumbnail" src="/{{$photo->url}}"></a></td>
                                        <td>
                   {!! Form::open([
                            'method' => 'DELETE',
                            'url' => ['/admin/gallery/photo', $photo->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-sm',
                                    'title' => 'Delete timelinepost',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            ))!!}
                        {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach    
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
