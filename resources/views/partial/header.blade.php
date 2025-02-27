
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
@foreach($inc as $inc)
@if ($loop->first)
<li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
@else
<li data-target="#carouselExampleIndicators" data-slide-to="{{$inc->id-1}}"></li>
@endif
@endforeach



  </ol>
  <div class="carousel-inner">
@foreach($header as $header)
@if ($loop->first)
<div class="carousel-item active">
      <img class="d-block w-100" src="{{$header->image}}" alt="{{$header->name}}">
      @if($header->iscontent==0)
  <div class="carousel-caption d-top d-lg-block">
    <h5>{{$header->name}}</h5>
    <p>{{$header->desc}}</p>
  </div>
      @endif
  </div>
@else
<div class="carousel-item">
    <img class="d-block w-100" src="{{$header->image}}" alt="{{$header->name}}">
      @if($header->iscontent==0)
      <div class="carousel-caption d-top d-lg-block">
      <h5>{{$header->name}}</h5>
    <p>{{$header->desc}}</p>
      </div>
      @endif
    </div>
@endif
@endforeach
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
<hr class="header-after">