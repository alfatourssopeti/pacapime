@extends('layouts.site')

@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
<div class="carousel-item active">
      <img class="d-block w-100" src="http://www.pacapime.hu/wp-content/uploads/2015/02/DSC_0076.jpg" alt="header">
  </div>
  </div>
</div>

<div class="eloszo">

<div class="container">
<div class="row">
    <div class="col image">
    <img src="images/eloszo.jpg">
    </div>
    <div class="col text">
    <h1>Előszó</h1>
        <p>Az azonnali használatra kész csomagolási technika számos felhasználási lehetőséget nyújt, mely különösen az élelmiszeriparban népszerű. A ”Hullámkartonunk mindent csomagol” szlogennel a PACAPIME azt szeretné hangsúlyozni, hogy modern gyáraink segítségével az összes hullámkartont használó vállalkozás számára képesek vagyunk megoldást kínálni. Több mint nyolcvan év hullámkarton gyártásban szerzett tapasztalattal, minőségi termékeivel, versenyképes áraival, valamint a rugalmas kiszolgálással, a PACAPIME Belgiumban piacvezető és reményeink szerint hamarosan Magyarországon is azzá válik majd. A vezetőség ezúton is szeretne köszönetet 
        mondani minden munkatársa, vevője és beszállítója számára, akik hozzájárultak a PACAPIME sikereihez.</p>
        <span>Paul és Ludo Pissens</span>
    </div>

</div>
</div>

</div>

<div class="container">
  <div class="row">
    <div class="col-lg-12">
        <div class="container">
            <h1 class="rolunk">Történetünk</h1>
        <div class="tortenetek">
        @foreach($timeline as $timeline)
        <span class="tortenetspan" name="tortenet{{$timeline->id}}" id="tortenet{{$timeline->id}}">{{$timeline->name}}</span>
        @endforeach
        </div> 

        <div class="events">
        @foreach($timelinepost as $timelinepost)
        <div class="event clicktortenet{{$timelinepost->timeline_id}}"  >
       
        <div class="label"> @if($timelinepost->label_isactive==0){{$timelinepost->label}}@endif</div>
        
        <span>{{$timelinepost->year}}</span>
        <div class="csik"><div class="doboz"></div></div>
        <p>{{$timelinepost->desc}}</p>
        </div>
        @endforeach
        </div>   
        </div>
    </div>
  </div>
</div>

<script>
$(document).ready(function(){
  $(".tortenetspan").click(function(){
    $(this).addClass( "aktivtortenet" );
    $(this).siblings().removeClass( "aktivtortenet" );
    $(".event").hide('fast');
    $('.click'+this.id).show('fast');
  });
});
</script>

@endsection
