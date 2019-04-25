@extends('admin.templates.default')

@section('title', 'Adicionar Categoria')

@section('description', 'Descrição')

@section('content')

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="row">
        <div class="col-sm-6">
          <h1>Adicionar Categoria</h1>
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
        <section class="col-lg-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Dados</h3>
            </div>
            <form method="POST" action="{{route('admin.categ.blog.store')}}" enctype="multipart/form-data">
              {{csrf_field()}}
              <div class="box-body">
                <div class="form-group row">
                  <div class="col-xs-12">
                    <label for="name">Nome</label>
                    <input type="text" name="name" placeholder="Nome" class="form-control" id="name" value="{{old('name')}}">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-xs-12">
                    <label for="urn">URN</label>
                    <input type="text" name="urn" placeholder="URN" class="form-control" id="urn" value="{{old('urn')}}">
                  </div>
                </div>
                <div class="form-group  row">
                  <div class="col-xs-12">
                    <label for="meta_title">Meta Title</label>
                    <input class="form-control" type="text" name="meta_title" placeholder="Definir Meta Title" value="{{ old('meta_title') }}">
                  </div>
                </div>
                <div class="form-group  row">
                  <div class="col-xs-12">
                    <label for="meta_description">Meta Description</label>
                    <input class="form-control" type="text" name="meta_description" placeholder="Definir Description" value="{{ old('meta_description') }}">
                  </div>
                </div>
                <div class="form-group  row">
                  <div class="col-xs-12">
                    <label for="keyword">KeyWord</label>
                    <input class="form-control" type="text" name="keyword" placeholder="Definir KeyWord" value="{{ old('keyword') }}">
                  </div>
                </div>
              </div>
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Adicionar</button>
                <a href="{{route('admin.categ.blog.index')}}">
                  <button type="button" class="btn btn-secondary">Voltar</button>
                </a>
              </div>
            </form>
          </div>
        </section>
        
      </div>
      <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
  </div>

@stop