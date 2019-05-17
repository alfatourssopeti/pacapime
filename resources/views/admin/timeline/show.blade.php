@extends('layouts.backend')

@section('content')
    <div class="container">
        <div class="row">
            @include('admin.sidebar')

            <div class="col-md-9">
                <div class="card">
                    <div class="card-header">Timeline {{ $timeline->name }}</div>
                    <div class="card-body">

                        <a href="{{ url('/admin/timeline') }}" title="Back"><button class="btn btn-warning btn-sm"><i class="fa fa-arrow-left" aria-hidden="true"></i> Back</button></a>
                        <a href="{{ url('/admin/timelinepost/create/' . $timeline->id . '') }}" class="btn btn-success btn-sm" title="Add New User">
                            <i class="fa fa-plus" aria-hidden="true"></i> Add New post
                        </a>
                        <a href="{{ url('/admin/timeline/' . $timeline->id . '/edit') }}" title="timeline User"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                        {!! Form::open([
                            'method' => 'DELETE',
                            'url' => ['/admin/timeline', $timeline->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<i class="fa fa-trash-o" aria-hidden="true"></i> Delete', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-sm',
                                    'title' => 'Delete timeline',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            ))!!}
                        {!! Form::close() !!}
                        <br/>
                        <br/>

                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>ID.</th> <th>Name</th> <th>Year</th> <th>Label is Active</th> <th>Label</th>  <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach($timelinepost as $timelinepost)
                                    <tr>
                                        <td>{{ $timelinepost->id }}</td> <td> {{ $timelinepost->name }} </td> <td>{{$timelinepost->year}}</td><td>{{$timelinepost->label_isactive}}</td><td>{{$timelinepost->label}}</td>
                                        <td>
                                        <a href="{{ url('/admin/timeline/post/' . $timelinepost->id . '/edit') }}" title="timeline User"><button class="btn btn-primary btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</button></a>
                        {!! Form::open([
                            'method' => 'DELETE',
                            'url' => ['/admin/timelinepost', $timelinepost->id],
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
