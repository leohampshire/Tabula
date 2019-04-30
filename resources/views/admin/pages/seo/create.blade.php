@extends('admin.templates.default')

@section('title', 'Adicionar SEO')

@section('description', 'Descrição')

@section('content')

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="row">
        <div class="col-sm-6">
          <h1>Adicionar SEO</h1>
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
            <form method="POST" action="{{route('admin.seo.store')}}" enctype="multipart/form-data">
              {{csrf_field()}}
              <div class="box-body">
                <div class="form-group row">
                  <div class="col-xs-12">
                    <label for="metaType">Tipo meta</label>
                    <select class="form-control" id="metaType" name="metaType">
                      <option selected disabled> SELECIONE...</option>
                      <option value="description">Description</option>
                      <option value="title">Title</option>
                      <option value="keyword">Keyword</option>
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-xs-12">
                    <label for="pageType">Tipo de  página</label>
                    <select class="form-control" id="pageType" name="pageType">
                      <option selected disabled> SELECIONE...</option>
                      <option value="home">Página Inicial</option>
                      <option value="course">Curso</option>
                      <option value="category">Categoria</option>
                    </select>
                  </div>
                </div>
                <div class="form-group row pageCateg">
                <div class="col-xs-12">
                  <label for="pageCateg">Selecionar página</label>
                  <select class="form-control" id="page" name="pageCateg">
                    
                    @foreach($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="form-group row pageCourse">
                <div class="col-xs-12">
                  <label for="pageCourse">Selecionar página</label>
                  <select class="form-control" id="page" name="pageCourse">
                    <option disabled selected>SELECIONE...</option>
                    @foreach($courses as $course)
                    <option value="{{$course->id}}">{{$course->name}}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-xs-12">
                  <label for="metaDescription">Descrição Meta</label>
                  <input class="form-control" name="metaDescription" type="text" placeholder="Descrição SEO" value="{{ old('metaDescription') }}">
                </div>
              </div>
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Adicionar</button>
                <a href="{{route('admin.seo.index')}}">
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