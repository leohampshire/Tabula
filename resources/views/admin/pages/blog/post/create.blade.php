@extends('admin.templates.default')

@section('title', 'Adicionar Post')

@section('description', 'Descrição')

@section('content')

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="row">
        <div class="col-sm-6">
          <h1>Adicionar Post</h1>
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
            <form method="POST" action="{{route('admin.post.blog.store')}}" enctype="multipart/form-data">
              {{csrf_field()}}
              <div class="box-body">
                <div class="form-group  row">
                  <div class="col-xs-12">
                    <label for="cover">Capa</label>
                    <input type="file" name="cover">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-xs-12">
                    <label for="name">Titulo</label>
                    <input class="form-control" type="text" name="name" placeholder="Titulo do post" value="{{ old('name') }}">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-xs-12">
                    <label for="content">Conteúdo</label>
                    <textarea class="form-control tinyeditor" rows="10" name="content" placeholder="Escrever Conteúdo">{{ old('content') }}</textarea>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-xs-12">
                    <label for="meta_title">Meta Title</label>
                    <input class="form-control" type="text" name="meta_title" placeholder="Definir Meta Title" value="{{ old('meta_title') }}">
                  </div>
                </div>

                <div class="form-group row">
                  <div class="col-xs-12">
                    <label for="meta_description">Meta Description</label>
                    <textarea name="meta_description" id="meta_description" class="form-control" rows="6">{{ old('meta_description') }}</textarea>

                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-xs-6">
                    <label for="keywords">Keyword</label>
                    <input class="form-control" type="text" name="keywords" placeholder="Definir KeyWord" value="{{ old('keywords') }}">
                  </div>
                  <div class="col-xs-6">
                    <label for="urn ">URN</label>
                    <input class="form-control input-urn" type="text" name="urn" placeholder="Definir URN" value="{{ old('urn') }}">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-xs-12">
                    <label for="category_id">Categoria do Blog</label>
                    <select name="category_id" class="form-control">
                      <option selected disabled>SELECIONE...</option>
                      @forelse($categories as $category)
                      <option value="{{$category->id}}" @if($category->id == old('category_id')) selected @endif>{{$category->name}}</option>
                      @empty
                      @endforelse
                    </select>
                  </div>
                </div>
              </div>
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Adicionar</button>
                <a href="{{route('admin.post.blog.index')}}">
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