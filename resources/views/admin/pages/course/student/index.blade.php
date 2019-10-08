@extends('admin.templates.default')

@section('title', 'Aluno')

@section('description', 'Descrição')

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="row">
            <div class="col-sm-6">
                <h1>Alunos</h1>
            </div>
            <div class="col-sm-6">
                <button class="btn-header act-student" data-id="{{$course->id}}">INCLUIR ALUNO</button>
                <a href="{{route('admin.course.index')}}">
                    <button class="btn-header-back">VOLTAR</button>
                </a>
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
    @if(session()->has('warning'))
    <section class="content-header">
        <!-- Main row -->
        <div class="row">
            <!-- Left col -->
            <section class="col-sm-12">
                <div class="alert alert-warning alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    {{session('warning')}}
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
                    <div class="box-body table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Nome</th>
                                    <th>Progesso</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($course->students as $student)
                                <?php
                                if($course->total_class != 0){
                                  $progress = ($student->pivot->progress / $course->total_class)*100;
                                }else{
                                  $progress = 0;
                                }
                                ?>
                                <tr>
                                    <td>{{$student->name}}</td>
                                    <td>
                                        <div class="progress">
                                            <div class="progress-bar bg-success" role="progressbar"
                                                style="width: {{$progress}}%;">{{$progress}}%
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                       
                                        <a href="{{ route('admin.course.student.restart', ['id' => $student->id, 'course_id' => $course->id])}}"
                                            title="Reiniciar" class="act-list act-delete">
                                            <i class="fa fa-refresh" aria-hidden="true"></i>
                                        </a>
                                        <a href="{{ route('admin.course.student.certificate', ['id' => $student->id, 'course_id' => $course->id])}}"
                                            title="Gerar Certificado" class="act-list">
                                            <i class="fa fa-certificate" aria-hidden="true"></i>
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
                                    <th>Progesso</th>
                                    <th>Ações</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </section>

    </section>
    <!-- /.content -->
</div>
<!-- /.row (main row) -->

@stop