@extends('user.templates.default')

@section('title', 'Cursos')

@section('description', 'Descrição')

@section('content')
<section>
    <div class="container">
    	<div class="box-title">
			<div class="row">
				<div class="col-xs-12">
					<h1>Carrinho</h1>
				</div>
			</div>
		</div>
    	<?php
		//Columns must be a factor of 12 (1,2,3,4,6,12)
		$numOfCols = 3;
		$rowCount = 0;
		$bootstrapColWidth = 12 / $numOfCols;
		?>
        <div class="row">
       	@isset($auth->cart)
	        @if(count($auth->cart) > 0)
	            <div class="col-sm-9">
	            	<div class="box-wout-shadow">
	            		<div class="row">
		                @foreach(array_chunk($auth->cart->toArray() , 2) as $chunks)
		                
		                    @foreach($chunks as $cart)
		                    <div class="col-sm-4 col-xs-6">
		                    	<div class="course-box">
		                    		<a class="btn-cart-delete" href="{{route('cart.remove', ['id' => $cart['id']])}}">
		                    			<i class="fa fa-times" aria-hidden="true"></i>
		                    		</a>
					        		<a href="{{route('course.single', ['urn' => $cart['urn']])}}">
										<div class="course-thumb">
											<img src="{{ asset('images/course.jpg')}}" alt="Curso">
										</div>
										<div class="course-desc">
											<h3>{{ $cart['name'] }}</h3>
											<p>{{substr($cart['desc'], 0, 50)}}</p>
										</div>
										<div class="course-value">
											<span>R$ {{$cart['price']}}</span>
										</div>
									</a>
					        	</div>
					        </div>
					        <?php
							    $rowCount++;
							    if($rowCount % $numOfCols == 0) echo '</div><div class="row">';
							?>
		                    @endforeach
		                @endforeach  
		                </div>
		            </div>
	            </div>
	            <div class="col-sm-3">
	                <div class="box-wout-shadow cart-resume">
	                    <span class="subtotal">Subtotal</span>
	                    <span class="subtotal-value">R$ {{number_format($auth->cart->sum('price'), 2, ',', '.')}}</span>
	                    
	                    <span class="total">Total</span>
	                    <span class="total-value">R$ {{number_format($auth->cart->sum('price'), 2, ',', '.')}}</span>
	                    
	                    <form class="cupon-form">
	                    	<div class="row">
	                    		<div class="col-xs-12">
	                    			<span class="total">Cupom de desconto</span>
	                    		</div>
	                    	</div>
	                    	<div class="row">
	                    		<div class="col-xs-12">
			                        <input type="text" name="coupon" placeholder="Código">
			                        <button type="submit">Aplicar</button>
			                    </div>
			                </div>
	                    </form>
	                    <a href="{{route('cart.checkout')}}">
	                        <button class="btn-checkout">Finalizar Compra</button>
	                    </a>
	                </div>
	            </div>                                           
	        @endif
        @else
            <div class="col-sm-6">
              <p>Você ainda não adicionou nenhum curso ao seu carrinho.</p>
            </div>
        @endisset
        </div>
    </div>
</section>
@stop