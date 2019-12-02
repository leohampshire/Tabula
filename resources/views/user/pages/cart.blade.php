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
                                        <img src="{{ asset('images/aulas')}}/{{$cart['thumb_img']}}" alt="Curso">
                                    </div>
                                    <div class="course-desc">
                                        <h3>{{ $cart['name'] }}</h3>
                                        <p><?php echo substr($cart['desc'], 0, 48); ?></p>
                                    </div>
                                    <div class="course-value">
                                        <span>@if($cart['price'] == 0) Grátis @else R$
                                            {{number_format($cart['price'],2,',','.')}}@endif</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                        <?php
                        $rowCount++;
                        if ($rowCount % $numOfCols == 0) echo '</div><div class="row">';
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
                    @auth('user')
                    @php($discount = $auth->cartTotalDiscount())
                    <span class="total-value">R$ {{number_format($discount, 2, ',', '.')}}</span>
                    @else
                    <span class="total-value">R$ {{number_format($auth->cart->sum('price'), 2, ',', '.')}}</span>
                    @endauth
                    <form class="cupon-form" action="{{route('coupon')}}" method="POST">
                        {{csrf_field()}}
                        <div class="row">
                            <div class="col-xs-12">
                                <span class="total">Cupom de desconto</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12">
                                <input type="text" name="coupon" placeholder="Código" value="{{session('coupon')}}">
                                <button type="submit">Aplicar</button>
                            </div>
                        </div>
                    </form>
                    @if(Auth::guard('user')->check())
                    @if(($auth->cart->sum('price') - $auth->discount) <= 0) <form method="post"
                        action="{{route('free.course.cart')}}">
                        {{csrf_field()}}
                        <button>Finalizar Compra</button>
                        </form>
                        @else
                        <form method="POST" action="{{url('transaction/pagarme/')}}">
                            {{csrf_field()}}
                            <script type="text/javascript" src="https://assets.pagar.me/checkout/checkout.js"
                                data-encryption-key="{{config('services.pagarme.encryption_key')}}" data-max-installments="12"
                                data-customer-data="true" data-create-token="false" data-button-text="Finalizar Compra"
                                data-amount="{{number_format(($auth->cart->sum('price') - $auth->discount), 2, '','')}}">
                            </script>
                        </form>
                        @endif
                        @else
                        <form action="{{url('transaction/pagarme/')}}" method="POST">
                            {{csrf_field()}}
                            <button>Finalizar Compra</button>
                        </form>
                        @endif
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