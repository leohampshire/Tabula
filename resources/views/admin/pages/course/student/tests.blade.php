@extends('admin.templates.default')

@section('title', 'Provas')

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
            <section class="col-lg-6">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Dados</h3>
                    </div>
                    <div class="box-body table-responsive">
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Perguntas</th>
                                    <th>Respostas corretas</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($tests as $test)
                                <tr>
                                    <td>{{$test->answers}}</td>
                                    <td>{{$test->correct}}</td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="7y">Nenhum resultado encontrado</td>
                                </tr>
                                @endforelse
                            </tbody>
                           
                        </table>
                    </div>
                </div>
            </section>

    </section>
    <!-- /.content -->
</div>
<!-- /.row (main row) -->

@stop
@section('modals')
<!--Editar Complemento-->
<div class="modal fade" id="dissertatives">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Editar Material Complementar</h4>
            </div>
            <form method="POST" action="{{route('admin.course.item.update')}}" enctype="multipart/form-data">
                <div class="modal-body">
                    {{csrf_field()}}
                    <input type="hidden" name="id">
                    @isset($chapter)
                    <input type="hidden" name="chapter_id" value="{{$chapter->id}}">
                    @endisset
                    @isset($course)
                    <input type="hidden" name="course_id" value="{{$course->id}}">
                    @endisset
                    <input type="hidden" name="item_type_id" value="5">
                    <div class="box-body">
                        <div class="form-group row">
                            <div class="col-xs-12">
                                <label for="name">Nome</label>
                                <input type="text" name="name" placeholder="Nome" class="form-control" id="name"
                                    value="{{old('name')}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-xs-12">
                                <label for="desc">Descrição</label>
                                <textarea class="form-control" rows="4" placeholder="Descrição" id="desc"
                                    name="desc">{{old('desc')}}</textarea>

                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-xs-12">
                                <label for="file">Arquivo</label>
                                <input type="file" name="file">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Confirmar</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!--/.Editar Complemento-->
@endsection