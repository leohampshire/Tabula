@extends('admin.templates.default')

@section('title', 'Editar Curso')

@section('description', 'Descrição')

@section('content')

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="row">
        <div class="col-sm-12">
          <button class="btn btn-header act-complement">MATERIAL COMPLEMENTAR</button>
          <button class="btn btn-header act-test">NOVA AVALIAÇÃO</button>
          <button class="btn btn-header act-class">NOVA AULA</button>
          <button class="btn-header-back" onclick="window.location.href='{{ route('admin.course.edit', ['id' => $course->id])}}'">VOLTAR</button>
        </div>
        <div class="col-sm-12">
          <h1>Capítulo: {{$chapter->name}}</h1>
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
              <h3 class="box-title">Itens do Capítulo</h3>
              <div class="box-tools">
              </div>
            </div>
            <div class="box-body table-responsive">
              <table class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Nome</th>
                    <th>Descrição</th>
                    <th>Tipo</th>
                    <th>Ações</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse($chapter->course_item as $item)
                    @if($item->course_item_type->id <= 6)
                    <tr>
                      <td>{{$item->name}}</td>
                      <td>{{substr($item->desc, 0, 100)}}</td>
                      <td>{{$item->course_item_type->value}}</td>
                      <td>
                        @if($item->course_item_type->id == 6)
                        <a href="{{ route('admin.course.item.test', ['id' => $item->id])}}" title="Incluir Perguntas" class="act-list">
                          <i class="fa fa-bars" aria-hidden="true"></i>
                        </a>
                        @endif
                        @if($item->course_item_type->id != 6)
                          @if($item->free_item === NULL)
                          <a href="{{ route('admin.course.item.free', ['id' => $item->id])}}" title="Aula Grátis" class="act-list">
                            <i class="fa fa-toggle-off" aria-hidden="true"></i>
                          </a>
                          @else
                          <a href="{{ route('admin.course.item.free', ['id' => $item->id])}}" title="Aula Grátis" class="act-list">
                            <i class="fa fa-toggle-on" aria-hidden="true"></i>
                          </a>
                          @endif
                        @endif
                        <a href="#" title="Editar" class="act-list act-edit-item" data-name="{{$item->name}}" data-desc="{{$item->desc}}" data-id="{{$item->id}}" data-file="{{$item->path}}" data-url="{{asset('uploads/archives/')}}" data-type="{{$item->course_item_types_id}}">
                          <i class="fa fa-pencil-square" aria-hidden="true"></i>
                        </a>
                        <a href="{{ route('admin.course.item.delete', ['id' => $item->id])}}" title="Excluir" class="act-list act-delete">
                          <i class="fa fa-trash" aria-hidden="true"></i>
                        </a>
                      </td>
                    </tr>
                    @endif
                  @empty
                    <tr>
                      <td colspan="7y">Nenhum resultado encontrado</td>
                    </tr>
                  @endforelse
                </tbody>
                <tfoot>
                  <tr>
                    <th>Nome</th>
                    <th>Descrição</th>
                    <th>Tipo</th>
                    <th>Ações</th>
                  </tr>
                </tfoot>   
              </table>
            </div>
            <!-- /.box-body -->
          </div>
        </section>
      </div>
      <!-- /.row (main row) -->
    </section>
  </div>
      <!-- /.row (main row) -->

@stop