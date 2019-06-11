@extends('admin.templates.default')

@section('title', 'Notificações')

@section('description', 'Descrição')

@section('content')

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="row">
        <div class="col-sm-6">
          <h1>Notificações</h1>
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
                    <th>Curso</th>
                    <th>Aluno</th>
                    <th>Data Expiração</th>
                    <th>Ações</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse($courses as $course)
                    @if(date('Y-m-d', strtotime('+1 month')) >= $course->user->expired($course->course_id))
                    <tr>
                      <td>{{$course->course->name}}</td>
                      <td>{{$course->user->name}}</td>
                        @if(date('Y-m-d') >= $course->user->expired($course->course_id))
                          <td>Expirado em {{$course->expired}} </td>
                        @else
                          <td>Expira em {{$course->expired}} </td>
                        @endif
                      <td>
                        <a href="#" title="Aumentar Prazo" data-id="{{$course->id}}" class="act-list act-increase">
                          <i class="fa fa-toggle-on" aria-hidden="true"></i>
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
                    <th>Curso</th>
                    <th>Aluno</th>
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