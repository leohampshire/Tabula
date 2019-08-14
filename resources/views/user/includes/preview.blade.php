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

  <a href="{{ url('/')}}" style="margin-left: 12px;"><img class="logo" src="{{ asset('images/logo.png')}}"></a>
  <button class="btn" type="button" style="width: auto; float: right; margin-left: 8px; margin-right: 12px;"><a style="color:#FFF;" href="{{route('user.panel')}}#teach"> Voltar</a></button>
  <button href="#course-edit" class="btn btn-default" onclick='window.location.href="{{route('user.panel')}}#teach"'' style="width: auto; float: right;">Editar</button> 

</header>