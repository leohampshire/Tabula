@extends('admin.templates.default')

@section('title', 'Editar Curso')

@section('description', 'Descrição')

@section('content')

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="row">
        <div class="col-sm-6">
          <h1>Editar Curso</h1>
        </div>
        <div class="col-sm-6">
          <button class="btn-header" onclick="window.location.href='{{ route('admin.course.chapter.create')}}'">CRIAR NOVO CAPITULO</button>
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
            <form method="POST" action="{{route('admin.course.update')}}" enctype="multipart/form-data">
              {{csrf_field()}}
              <input type="hidden" name="id" value="{{$course->id}}">
              <div class="box-body">
                <div class="form-group row">
                  <div class="col-xs-12">
                    <label for="name">Nome</label>
                    <input type="text" name="name" placeholder="Nome" class="form-control" id="name" value="{{$course->name}}">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-xs-12">
                    <label for="urn">URN</label>
                    <input type="text" name="urn" placeholder="URN" class="form-control" id="urn" value="{{$course->urn}}">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-xs-12">
                    <label for="desc">Descrição</label>
                    <input type="text" name="desc" placeholder="Descrição" class="form-control" id="desc" value="{{$course->desc}}">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-xs-12" id="categ">
                    <label for="category_id">Categoria</label>
                    <select name="category_id" class="form-control" id="category_id">
                      <option selected disabled="">SELECIONE...</option>
                      @foreach($categories as $category)
                        @if($category->category_id === NULL)
                        <option value="{{$category->id}}" @if($category->id == $course->category_id) selected @endif>{{$category->name}}</option>
                        @endif
                      @endforeach
                    </select>
                  </div>
                  <div class="col-xs-6" id="sub_categ">
                    <label for="subcategory_id">SubCategoria</label>
                    <select name="subcategory_id" class="form-control" id="subcategory_id">
                      <option selected disabled="">SELECIONE...</option>
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-xs-12">
                    <label for="featured">Destaque?</label>
                    <select name="featured" class="form-control">
                      <option value="0" @if(0 == $course->featured) selected @endif>Não</option>
                      <option value="1" @if(1 == $course->featured) selected @endif>Sim</option>
                    </select>
                  </div>
                </div>
                <div class="form-group  row">
                  <div class="col-xs-12">
                    <label for="price">Preço</label>
                    <input class="form-control input-money" type="text" name="price" placeholder="Definir Preço do Curso" value="{{ $course->price }}">
                  </div>
                </div>
                <div class="form-group  row">
                  <div class="col-xs-12">
                    <label for="requirements">Requisitos para o curso</label>
                    <textarea name="requirements" placeholder="Requisitos para realizar o curso (opcional)" class="form-control" rows="4">{{$course->requirements}}</textarea>
                  </div>
                </div>
                <div class="form-group  row">
                  <div class="col-xs-12">
                    <label for="thumb_img">Imagem da Vitrine</label>
                    <input class="form-control" type="file" name="thumb_img">
                  </div>
                </div>
                <div class="form-group  row">
                  <div class="col-xs-12">
                    <label for="video">Vídeo de apresentação do Curso</label>
                    <input class="form-control" type="file" name="video">
                  </div>
                </div>
              </div>
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Atualizar</button>
                <a href="{{route('admin.course.index')}}">
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