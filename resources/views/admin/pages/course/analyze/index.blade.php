@extends('admin.templates.default')

@section('title', 'Cursos')

@section('description', 'Descrição')

@section('content')

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="row">
        <div class="col-sm-6">
          <h1>Cursos</h1>
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
      <div class="row">
        <section class="col-lg-12">
          <div class="box">
              <form id="filterForm" method="GET" autocomplete="off">
              <div class="box-header">
                <h3 class="box-title">Filtrar resultados</h3>
              </div>
              <div class="box-body">
                <div class="row">
                  <div class="col-sm-12">
                    <label for="name">Nome do Curso</label>
                    <input type="text" name="name" value="{{request('name')}}" class="form-control">
                  </div>
                </div>
              </div>
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Filtrar</button>
                <button type="submit" class="btn btn-default clear-filters">Limpar</button>
              </div>
            </form>
        </section>
      </div>

      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <section class="col-lg-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Lista de Cursos</h3>
              <div class="box-tools">
                <?php

                $paginate = $courses;

                $link_limit = 7;

                $filters = '&name='.request('name');
                ?>
              </div>
            </div>
            <div class="box-body table-responsive">
              <table class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Nome</th>
                    <th>URN</th>
                    <th>Disponibilidade</th>
                    <th>Ações</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse($courses as $course)
                    <tr>
                      <td>{{$course->name}}</td>
                      <td>{{$course->urn}}</td>
                      @if($course->avaliable == 1)
                      <td>Aguardando Liberação</td>
                      @else
                      <td>Liberado</td>
                      @endif
                      <td>
                        @if($course->avaliable == 1)
                          <a href="{{ route('admin.course.avaliable', ['id' => $course->id])}}" title="Disponibilizar" class="act-list">
                            <i class="fa fa-toggle-off" aria-hidden="true"></i>
                          </a>
                          @else
                          <a href="{{ route('admin.course.avaliable', ['id' => $course->id])}}" title="Remover" class="act-list">
                            <i class="fa fa-toggle-on" aria-hidden="true"></i>
                          </a>
                        @endif
                        <a href="{{ route('admin.course.show', ['id' => $course->id])}}" title="Editar" class="act-list">
                          <i class="fa fa-eye" aria-hidden="true"></i>
                        </a>
                      </td>
                    </tr>
                  @empty
                    <tr>
                      <td colspan="7y">Nenhum resultado encontrado</td>
                    </tr>
                  @endforelse
                </tbody>
                <tfoot>
                  <tr>
                    <th>Nome</th>
                    <th>URN</th>
                    <th>Disponibilidade</th>
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
    <!-- /.content -->
  </div>

@stop