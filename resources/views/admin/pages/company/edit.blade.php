@extends('admin.templates.default')

@section('title', 'Editar Empresa')

@section('description', 'Descrição')

@section('content')

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="row">
        <div class="col-sm-6">
          <h1>Editar Empresa</h1>
        </div>
      </div>
    </section>

    @if(session()->has('success'))
      <section class="content-header">
        <!-- Main row --> 
        <div class="row">
          <!-- Left col -->
          <section class="col-sm-12">
            <div class="alert alert-success alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              {{session('success')}}
            </div>
          </section>
        </div>
      </section>
    @endisset

    @if ($errors->any())
      <div class="content-header">
        @foreach ($errors->all() as $error)
        <div class="row">
          <div class="col-sm-12">
            <div class="alert alert-danger alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                {{ $error }}
            </div>
          </div>
        </div>
        @endforeach
      </div>
    @endif


    <!-- Main content -->
    <section class="content">
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <section class="col-lg-8">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Dados</h3>
            </div>
            <form method="POST" action="{{route('admin.company.update', ['id' => $company->id])}}" enctype="multipart/form-data">
              {{csrf_field()}}
              <input type="hidden" name="id" value="{{$company->id}}">
              <div class="box-body">
                <div class="form-group row">
             
                  <div class="col-xs-6">
                    <label for="country">País</label>
                    <select id="country" name="country_id" class="form-control">
                      <option value="" selected disabled hidden>Escolha um...</option>
                      @foreach ($countries as $country)
                        <option @if($company->country_id == $country->id) selected @endif value="{{ $country->id }}"> {{ $country->name }} </option>
                      @endforeach
                    </select>
                  </div>

                  <div class="col-xs-6">
                    <div class="state">
                      <label for="state">Estado</label>
                      <select id="state" name="state_id" class="form-control">
                        <option selected disabled hidden>Escolha um...</option>
                        @foreach ($states as $state)
                          <option @if($company->state_id == $state->id) selected @endif value="{{ $state->id }}"> {{ $state->name }} </option>
                        @endforeach
                      </select>
                    </div>
                  </div>

                </div>


                <div class="form-group row">
                  <div class="col-xs-6">
                      <label for="name">Nome Empresa</label>
                      <input class="form-control" name="name" type="text" placeholder="Seu nome" value="{{ $company->name }}">
                   </div>
                  <div class="col-xs-6">
                    <label for="email">E-mail</label>
                    <input class="form-control" type="email" name="email" placeholder="exemplo@email.com" value="{{ $company->email }}">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-xs-6">
                    <label for="occupation">Ramo</label>
                    <input class="form-control" type="text" name="occupation" placeholder="Seu ramo" value="{{ $company->occupation }}">
                  </div>

                  <div class="col-xs-6">
                    <label for="website">Website</label>
                    <input class="form-control" type="text" name="website" placeholder="https://..." value="{{ $company->website }}">
                  </div>
                </div>

                <div class="form-group row">
                  <div class="col-xs-6">
                    <label for="google_plus">Google +</label>
                    <input class="form-control" type="text" name="google_plus" placeholder="https://..." value="{{ $company->google_plus }}">
                  </div>

                  <div class="col-xs-6">
                    <label for="twitter">Twitter</label>
                    <input class="form-control" type="text" name="twitter" placeholder="https://..." value="{{ $company->twitter }}">
                  </div>
                </div>

                <div class="form-group row">
                  <div class="col-xs-6">
                    <label for="facebook">Facebook</label>
                    <input class="form-control" type="text" name="facebook" placeholder="https://..." value="{{ $company->facebook }}">
                  </div>

                  <div class="col-xs-6">
                    <label for="youtube">Youtube</label>
                    <input class="form-control" type="text" name="youtube" placeholder="https://..." value="{{ $company->youtube }}">
                  </div>
                </div>
                <div class="form-group">
                    <label for="bio">Conte-nos um pouco sobre você:</label>
                    <textarea class="form-control" rows="5" id="bio" name="bio" placeholder="Escreva aqui...">{{ $company->bio }}</textarea>
                </div>
              </div>
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Atualizar</button>
                <a href="{{route('admin.company.index')}}">
                  <button type="button" class="btn btn-secondary">Voltar</button>
                </a>
              </div>
            </form>
          </div>
        </section>
        
      </section>
      <!-- /.content -->
      </div>
      <!-- /.row (main row) -->

  </div>

@stop