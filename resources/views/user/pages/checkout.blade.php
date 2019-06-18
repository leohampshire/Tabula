@extends('user.templates.default')

@section('title', 'Cursos')

@section('description', 'Descrição')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="row">
            @if(count($auth->cart) == 0)
            <div class="col-sm-12">
                <h1>Não possuem cursos</h1>
            </div>
            @else
            <div class="col-sm-4">
                @foreach($auth->cart as $courses)
                <div class="row box-w-shadow">
                    <div class=" col-xs-12">
                        <p><b>{{ $courses['name'] }}</b>
                            <p />
                            <p>{{ $courses['desc'] }}</p><br />
                            <p>R$ {{ $courses['price'] }}</p>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="col-sm-8">
                <div class="box-w-shadow">
                    <h1>Total</h1>
                    <h1>R$ {{number_format($auth->cart->sum('price'), 2, ',', '.')}}</h1>
                    <div class="box-title">
                        <div class="row">
                            <div class="col-xs-12">
                                <h2>Dados de pagamento</h2>
                            </div>
                        </div>
                    </div>
                    <form action="{{route('transaction')}}" method="POST">
                        {{csrf_field()}}
                        <input type="hidden" name="{{$auth->cart->sum('price')}}">
                        <div class="row form-group">
                            <div class="col-xs-12">
                                <label for="card_number">Número do Cartão</label>
                                <input name="card_number" id="card_number" type="text" class="form-control"
                                    placeholder="Número do Cartão">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-xs-4">
                                <?php
                                $year = date("Y");
                                ?>
                                <label for="card_expiration_month">MM</label>
                                <select name="card_expiration_month" id="card_expiration_month" class="form-control">
                                    <option value="01">01</option>
                                    <option value="02">02</option>
                                    <option value="03">03</option>
                                    <option value="04">04</option>
                                    <option value="05">05</option>
                                    <option value="06">06</option>
                                    <option value="07">07</option>
                                    <option value="08">08</option>
                                    <option value="09">09</option>
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                    <option value="12">12</option>
                                </select>
                            </div>
                            <div class="col-xs-4">
                                <label for="card_expiration_year">MM</label>
                                <select name="card_expiration_year" id="card_expiration_year" class="form-control">
                                    @for($i = 0; $i < 20; $i++) <option value="{{$year+$i}}">{{$year+$i}}</option>
                                        @endfor
                                </select>
                            </div>
                            <div class="col-xs-4">
                                <label for="card_cvv">Código de Segurançao</label>
                                <input name="card_cvv" id="card_cvv" type="text" class="form-control"
                                    placeholder="Número">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-xs-8">
                                <label for="card_holder_name">Nome no Cartão</label>
                                <input name="card_holder_name" id="" type="text" class="form-control"
                                    placeholder="Número">
                            </div>
                            <div class="col-xs-4">
                                <label>CPF</label>
                                <input name="facebook" type="text" class="form-control" placeholder="Número">
                            </div>
                        </div>
                        <div id="field_errors">
                        </div>

                        <button type="submit">Finalizar Compra</button>
                    </form>

                </div>
            </div>
            @endif

        </div>
    </section>
</div>

@stop