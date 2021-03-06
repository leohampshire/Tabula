@extends('admin.templates.default')

@section('title', 'Editar Categoria')

@section('description', 'Descrição')

@section('content')

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="row">
        <div class="col-sm-6">
          <h1>Editar Categoria</h1>
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
        <section class="col-lg-6">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Dados</h3>
            </div>
            <form method="POST" action="{{route('admin.category.update')}}" enctype="multipart/form-data">
              {{csrf_field()}}
              <input type="hidden" name="id" value="{{$category->id}}">
              <div class="box-body">
                <div class="form-group row">
                  <div class="col-xs-12">
                    <label for="name">Nome</label>
                    <input type="text" name="name" placeholder="Ex.: Informatica" class="form-control" id="name" value="{{$category->name}}">
                  </div>
                </div>
                <div class="form-group row box-nome" >
                  <div class="col-xs-12">
                    <label for="urn">URN</label>
                    <input type="text" name="urn" class="form-control input-urn" placeholder="EX.:informatica" id="urn" value="{{$category->urn}}">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-6">
                    <label for="desktop_index">Índice Desktop</label>
                    <input type="text" name="desktop_index" placeholder="Sugerido 17" class="form-control" value="{{$category->desktop_index}}">
                  </div>
                  <div class="col-sm-6">
                    <label for="mobile_index">Índice Mobile</label>
                    <input type="text" name="mobile_index" placeholder="Sugerido 17" class="form-control" value="{{$category->mobile_index}}">
                  </div>
                </div>
                <div class="form-group  row">
                  <div class="col-xs-12">
                    <label for="meta_title">Meta Title</label>
                    <input class="form-control" id="meta_title" type="text" name="meta_title" placeholder="Meta Title" value="{{ $category->meta_title }}">
                  </div>
                </div>
                <div class="form-group  row">
                  <div class="col-xs-12">
                    <label for="meta_description">Meta Description</label>
                    <textarea name="meta_description" id="meta_description" rows="6" class="form-control">{{$category->meta_description}}</textarea>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-xs-12">
                    <label for="desktop_hex_bg">Hexágono Desktop</label>
                    <input class="form-control" type="file" name="desktop_hex_bg">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-xs-12">
                    <label for="mobile_hex_bg">Hexágono Mobile</label>
                    <input class="form-control" type="file" name="mobile_hex_bg">
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-xs-12"></div>
                  <label for="hex_icon">Ícone Hexágono</label>
                  <input class="form-control" type="file" name="hex_icon">
                </div>
              </div>
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Atualizar</button>
                <a href="{{route('admin.category.index')}}">
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