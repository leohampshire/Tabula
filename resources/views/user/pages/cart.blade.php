@extends('user.templates.default')

@section('title', 'Cursos')

@section('description', 'Descrição')

@section('content')

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="row">
        @if(count($auth->cart) == 0)
        <div class="col-sm-3"></div>
        <div class="col-sm-6">
          <h1>Não possuem cursos</h1>
        </div>
        <div class="col-sm-3"></div>
        @else
        <div class="row">
          <div class="col-sm-6">
            @foreach(array_chunk($auth->cart->toArray() , 2) as $chunks)
            <div class="col-sm-2">
                @foreach($chunks as $cart)
                <div class="column col-xs-12 col-sm-12 col-6 col-lg-6 col-xl-6 two">
                    <div class="columns course-cart-item">
                        <div class="column col-4 check-img"></div>  
                        <div class="column col-5 three">
                            <p class="course-cart-title">{{ $cart['name'] }}</p><br/>
                            <p>{{ $cart['desc'] }}</p><br/>
                            <p>R$ {{ $cart['price'] }}</p>                                                
                        </div>
                        <div class="column col-1"></div>           
                    </div>
                </div>
                @endforeach
            </div>
            @endforeach                                    
          </div>
        </div>                                                        
        @endif
      </div>
    </section>
  </div>

@stop