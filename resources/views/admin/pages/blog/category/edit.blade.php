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
    @if(session()->has('error'))
      <section class="content-header">
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-sm-12">
            <div class="alert alert-danger alert-dismissible">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              {{session('error')}}
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
            <form method="POST" action="{{route('admin.categ.blog.update')}}" enctype="multipart/form-data">
              {{csrf_field()}}
              <input type="hidden" name="id" value="{{$categBlog->id}}">
              <div class="box-body">
                <div class="form-group row">
                  <div class="col-xs-12">
                    <label for="name">Nome</label>
                    <input type="text" name="name" placeholder="Nome" class="form-control" id="name" value="{{$categBlog->name}}">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-xs-12">
                    <label for="urn">URN</label>
                    <input type="text" name="urn" placeholder="URN" class="form-control input-urn" id="urn" value="{{$categBlog->urn}}">
                  </div>
                </div>
                <div class="form-group  row">
                  <div class="col-xs-12">
                    <label for="meta_title">Meta Title</label>
                    <input class="form-control" type="text" name="meta_title" placeholder="Definir Meta Title" value="{{$categBlog->meta_title }}">
                  </div>
                </div>
                <div class="form-group  row">
                <div class="col-xs-12">
                                    <label for="meta_description">Meta Description</label>
                                    <textarea name="meta_description" id="meta_description" rows="7"
                                        class="form-control">{{ $categBlog->meta_description }}</textarea>
                                </div>
                </div>
                <div class="form-group  row">
                  <div class="col-xs-12">
                    <label for="keyword">KeyWord</label>
                    <input class="form-control" type="text" name="keyword" placeholder="Definir KeyWord" value="{{$categBlog->keyword }}">
                  </div>
                </div>
              </div>
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Atualizar</button>
                <a href="{{route('admin.categ.blog.index')}}">
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