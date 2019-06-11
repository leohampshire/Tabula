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
<div class="aviso" style="position: fixed; text-align: center; padding: 10px 0 2px; background: rgba(255, 0, 0, 0.8); color: #fff; font-weight: bold; bottom: 0; left: 0; right: 0; z-index: 999999999;">
  <p>Este site ainda é uma versão de testes. Favor não realizar nenhum pedido.</p>
</div>
<header>
  <div class="container">
    <div class="row">
      <div class="col-xs-3">
        <a href="{{ url('/')}}"><img class="logo" src="{{ asset('images/logo.png')}}"></a>
      </div>
      <div class="col-xs-4">
       
      </div>
      <div class="col-xs-5">
        <ul>
          <li><a href="{{ route('admin.course.edit', ['id' => $course->id])}}" class="btn-login">Editar</a></li>
          <li><a href="{{route('admin.course.index')}}" class="btn-register">Voltar</a></li>
          
        </ul>
      </div>
    </div>
  </div>
</header>