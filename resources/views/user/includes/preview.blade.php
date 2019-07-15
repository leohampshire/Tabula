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

  <a href="{{ url('/')}}" style="margin-left: 12px;"><img class="logo" src="{{ asset('images/logo.png')}}"></a>
  <button class="btn" type="button" style="width: auto; float: right; margin-left: 8px; margin-right: 12px;">Voltar</button>
  <button href="#course-edit" class="btn btn-default" data-url="{{route('user.course.edit', ['id' => $course->id])}}" style="width: auto; float: right;">Editar</button> 

</header>