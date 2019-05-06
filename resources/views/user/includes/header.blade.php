<?php
  $auth = Auth::guard('user')->user();
?>
<header>
  <div class="container">
    <div class="row">
      <div class="col-xs-3">
        <a href="{{ url('/')}}"><img class="logo" src="{{ asset('images/logo.png')}}"></a>
      </div>
      <div class="col-xs-4">
        <form autocomplete="off">
          <input type="text" name="search" placeholder="O que você quer aprender hoje?">
          <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
        </form>
      </div>
      <div class="col-xs-5">
        <ul>
          @if($auth)
          <li><a href="{{route('user.panel')}}">
            <img src="{{ asset('images/profile/')}}/{{$auth->avatar}}" width="50px" alt="Perfil"></li>
          </a>
            @if($auth->user_type_id == 3)
            <li><a href="#">Torne-se professor</a></li>
            @else
            <li><a href="#">Carrinho</a></li>
            <li><a href="{{route('user.logout')}}">Sair</a></li>
            @endif
          @else
          <li><a href="#">Carrinho</a></li>
          <li><a href="{{url('user/login')}}" class="btn-login">Login</a></li>
          <li><a href="{{url('user/register')}}" class="btn-register">Cadastre-se</a></li>
          @endif
        </ul>
      </div>
    </div>
  </div>
</header>