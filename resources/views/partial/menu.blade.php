<div class="menu">
<div class="container">
  <div class="row align-middle ">
    <div class="col-2"><img class="logo" src="/images/logo-32.png"></div>
    <div class="col-7 menuitem">
      <ul class="ulmenu">
      @foreach($menu as $menu)
      <a href="{{$menu->url}}"><li class="{{Request::is($menu->url) ? 'aktiv' : ''}}" >{{$menu->name}}</li></a>
      @endforeach

      
    </ul>
    </div>
    <div class="col-1 menuitem">
          <a class="nav-link dropdown-toggle" href="http://example.com" id="dropdown09" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><span class="flag-icon flag-icon-us"> </span> HU</a>
      <div class="dropdown-menu" aria-labelledby="dropdown09">
          <a class="dropdown-item" href="#fr"><span class="flag-icon flag-icon-fr"> </span>  FR</a>
          <a class="dropdown-item" href="#it"><span class="flag-icon flag-icon-it"> </span>  EN</a>
          <a class="dropdown-item" href="#ru"><span class="flag-icon flag-icon-ru"> </span>  RU</a>
       </div>

    </div>

    <div class="col-2 menuitem">
          <div class="input-group">
      <span class="input-group-prepend">
        <div class="input-group-text bg-transparent border-right-0">
          <i class="fa fa-search"></i>
        </div>
      </span>
      <input class="form-control py-2 border-left-0 border" type="search" id="example-search-input" />
    </div>

    </div>
  </div>
</div>
</div>
<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>