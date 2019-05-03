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
          <li><a href="#">Torne-se professor</a></li>
          <li><a href="#" class="btn-login">Login</a></li>
          <li><a href="#" class="btn-register">Cadastre-se</a></li>
        </ul>
      </div>
    </div>
  </div>
</header>