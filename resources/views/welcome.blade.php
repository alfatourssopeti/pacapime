@extends('layouts.frontend')

@section('content')


<div class="container">
  <div class="row cim">
  <h1>Hullámkartonunk mindent csomagol</h1>
  </div>
  <div class="hover">
  <div class="row">
  @foreach($menu as $menu)
  <div class="col-sm">
       <a href="{{$menu->url}}">
            <div class="box {{Request::is($menu->url) ? 'boxaktiv' : ''}} ">
            <div class="title">{{$menu->name}}</div>
            <img src="{{$menu->image}}">
            <div class="overlay">
                <div class="text">{{$menu->desc}}</div>
            </div>
        </a>
        </div>
    </div>
  @endforeach
  </div>
  </div>
</div>
@endsection
