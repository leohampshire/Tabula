<?php
  $auth = Auth::guard('user')->user();
  if ($auth) {
    $count = count($auth->cart);
  } else {
    if(session('cart')){
      $count = count(session('cart'));
    } else {
      $count = 0;
    }
  }
?>
<header>
  <div class="container">
    <div class="row">
      <div class="col-xs-3">
        <a href="{{ url('/')}}"><img class="logo" src="{{ asset('images/logo.png')}}"></a>
      </div>
      <div class="col-xs-4">
        <form autocomplete="off" action="{{ route('search.single', ['id' => -1]) }}" method="get">
          <input type="text" name="search_string" placeholder="O que você quer aprender hoje?">
          <button class="btn-search" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
        </form>
       
      </div>

      <div class="col-xs-5">
        <ul>
          @if($auth)
          <li>
            <a href="{{route('user.panel')}}">
              <img src="{{ asset('images/profile/')}}/{{$auth->avatar}}" style="width: 35px; border-radius: 50%;" alt="Perfil">
            </a>
          </li>
            @if($auth->user_type_id == 3)
            <li><a href="{{route('teacher.be')}}">Torne-se professor</a></li>
            @endif
            <li><a href="{{route('user.logout')}}">Sair</a></li>
          @else
          
          <li><a href="{{url('user/login')}}" class="btn-login">Login</a></li>
          <li><a href="{{url('user/register')}}" class="btn-register">Cadastre-se</a></li>
          
          @endif
          <li class="menu-cart"><a href="{{route('cart')}}"><i class="fa fa-shopping-cart" aria-hidden="true"></i><span class="menu-cart-count">{{$count}}</span></a></li>
        </ul>
      </div>
    </div>
  </div>
</header>
@if(session()->has('success'))
  <section class="container" style="margin-top: 30px;">
    <!-- Main row --> 
    <div class="row">
      <!-- Left col -->
      <section class="col-sm-12">
        <div class="alert alert-success alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          {{session('success')}}
        </div>
      </section>
    </div>
  </section>
@endisset
@if(session()->has('info'))
  <section class="container" style="margin-top: 30px;">
    <!-- Main row --> 
    <div class="row">
      <!-- Left col -->
      <section class="col-sm-12">
        <div class="alert alert-info alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          {{session('info')}}
        </div>
      </section>
    </div>
  </section>
@endisset

@if(session()->has('warning'))
  <section class="container" style="margin-top: 30px;">
    <!-- Main row --> 
    <div class="row">
      <!-- Left col -->
      <section class="col-sm-12">
        <div class="alert alert-warning alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          {{session('warning')}}
        </div>
      </section>
    </div>
  </section>
@endisset

@if(session()->has('primary'))
  <section class="container" style="margin-top: 30px;">
    <!-- Main row --> 
    <div class="row">
      <!-- Left col -->
      <section class="col-sm-12">
        <div class="alert alert-primary alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          {{session('primary')}}
        </div>
      </section>
    </div>
  </section>
@endisset

@if(session()->has('danger'))
  <section class="container" style="margin-top: 30px;">
    <!-- Main row --> 
    <div class="row">
      <!-- Left col -->
      <section class="col-sm-12">
        <div class="alert alert-danger alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          {{session('danger')}}
        </div>
      </section>
    </div>
  </section>
@endisset

@if ($errors->any())
  <div class="container"  style="margin-top: 30px;">
    @foreach ($errors->all() as $error)
    <div class="row">
      <div class="col-sm-12">
        <div class="alert alert-danger alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            {{ $error }}
        </div>
      </div>
    </div>
    @endforeach
  </div>
@endif