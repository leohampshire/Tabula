@extends('user.templates.default')

@section('title', 'Cursos')

@section('description', 'Descrição')

@section('content')

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="row">
       	@isset($auth->cart)
	        @if(count($auth->cart) > 0)
	            <div class="col-sm-6">
	                @foreach(array_chunk($auth->cart->toArray() , 2) as $chunks)
	                <div class="row">
	                    @foreach($chunks as $cart)
	                    <div class=" col-xs-3">
	                    	<a href="{{route('cart.remove', ['id' => $cart['id']])}}">X</a>
	                        <p><b>{{ $cart['name'] }}</b><p/>
	                        <p>{{ $cart['desc'] }}</p><br/>
	                        <p>R$ {{ $cart['price'] }}</p>                                                
	                    </div>
	                    @endforeach
	                </div>
	                @endforeach  
	            </div>
	            <div class="col-sm-6">
	                <div class="box-w-shadow">
	                    <h1>Subtotal</h1>
	                    <h1>R$ {{number_format($auth->cart->sum('price'), 2, ',', '.')}}</h1>
	                    <form>
	                        <input type="text" name="coupon">
	                    </form>
	                    <h3>Total</h3>
	                    <h3>R$ {{number_format($auth->cart->sum('price'), 2, ',', '.')}}</h3>
	                    <a href="{{route('cart.checkout')}}">
	                        <button>Finalizar Compra</button>
	                    </a>
	                </div>
	            </div>                                           
	        @endif
        @else
            <div class="col-sm-6">
              <h1>Não possuem cursos</h1>
            </div>
        @endisset
        </div>
    </section>
  </div>

@stop