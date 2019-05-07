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
                        <p><b>{{ $courses['name'] }}</b><p/>
                        <p>{{ $courses['desc'] }}</p><br/>
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
                    <form>
                        <div class="row form-group">
                            <div class="col-xs-12">
                                <label>Número do Cartão</label>
                                <input name="website" type="text" class="form-control" placeholder="Endereço">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-xs-4">
                                <label>MM</label>
                                <input name="facebook" type="text" class="form-control" placeholder="Número">
                            </div>
                            <div class="col-xs-4">
                                <label>YYYY</label>
                                <input name="facebook" type="text" class="form-control" placeholder="Número">
                            </div>
                            <div class="col-xs-4">
                                <label>Código de Segurançao</label>
                                <input name="facebook" type="text" class="form-control" placeholder="Número">
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-xs-8">
                                <label>Nome no Cartão</label>
                                <input name="facebook" type="text" class="form-control" placeholder="Número">
                            </div>
                            <div class="col-xs-4">
                                <label>CPF</label>
                                <input name="facebook" type="text" class="form-control" placeholder="Número">
                            </div>
                        </div>
                        
                        <div class="row form-group">
                            <div class="col-xs-4">
                                <button type="submit">Atualizar</button>
                            </div>
                        </div>
                    </form>

                    <button>Finalizar Compra</button>
                </div>
            </div>                                           
        @endif

        </div>
    </section>
  </div>

@stop