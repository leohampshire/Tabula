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
            <form method="POST" action="{{route('admin.seo.update')}}" enctype="multipart/form-data">
              {{csrf_field()}}
              <input type="hidden" name="id" value="{{$seo->id}}">
              <div class="box-body">
               <div class="form-group row">
                  <div class="col-xs-12">
                    <label for="metaType">Tipo meta</label>
                    <select class="form-control" id="metaType" name="metaType">
                      <option selected disabled> SELECIONE...</option>
                      <option value="description" @if($seo->meta_type == 'description') selected @endif>Description</option>
                      <option value="title" @if($seo->meta_type == 'title') selected @endif>Title</option>
                      <option value="keyword" @if($seo->meta_type == 'keyword') selected @endif>Keyword</option>
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-xs-12">
                    <label for="pageType">Tipo de  página</label>
                    <select class="form-control" id="pageType" name="pageType">
                      <option selected disabled> SELECIONE...</option>
                      <option value="home" @if($seo->page_type == 'home') selected @endif>Página Inicial</option>
                      <option value="course" @if($seo->page_type == 'course') selected @endif>Curso</option>
                      <option value="category" @if($seo->page_type == 'category') selected @endif>Categoria</option>
                    </select>
                  </div>
                </div>
                <div class="form-group row pageCateg">
                <div class="col-xs-12">
                  <label for="pageCateg">Selecionar página</label>
                  <select class="form-control" id="page" name="pageCateg">
                    @foreach($categories as $category)
                    <option value="{{$category->id}}" <?php if ($category->id == $seo->page): echo "selected"; ?>
                    <?php endif ?>>{{$category->name}}</option>
                    @endforeach
                  </select>
                </div>
              </div>

              <div class="form-group row pageCourse">
                <div class="col-xs-12">
                  <label for="pageCourse">Selecionar página</label>
                  <select class="form-control" id="page" name="pageCourse">
                    @foreach($courses as $course)
                    <option value="{{$course->edit}}" <?php if ($course->name == $seo->page): echo "selected"; ?>
                    <?php endif ?>>{{$course->name}}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="form-group row">
                <div class="col-xs-12">
                  <label for="metaDescription">Descrição Meta</label>
                  <input class="form-control" name="metaDescription" type="text" placeholder="Descrição SEO" value="{{ $seo->meta_description}}">
                </div>
              </div>
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Atualizar</button>
                <a href="{{route('admin.seo.index')}}">
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