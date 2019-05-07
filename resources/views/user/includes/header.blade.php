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
        <form autocomplete="off" action="{{ route('search.single', ['id' => -1]) }}" method="get">
          <input type="text" name="search_string" placeholder="O que você quer aprender hoje?">
          <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
        </form>
       
      </div>

      <div class="col-xs-5">
        <ul>
          @if($auth)
          <li><a href="{{route('user.panel')}}">
            <img src="{{ asset('images/profile/')}}/{{$auth->avatar}}" width="50px" alt="Perfil">
          </a>
          </li>
            @if($auth->user_type_id == 3)
            <li><a href="#">Torne-se professor</a></li>
            @else
            <li><a href="{{route('cart')}}">Carrinho</a></li>
            @endif
            <li><a href="{{route('user.logout')}}">Sair</a></li>
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
@if(session()->has('success'))
      <section class="content-header" style="margin-top: 30px;">
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

    @if ($errors->any())
      <div class="content-header"  style="margin-top: 30px;">
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