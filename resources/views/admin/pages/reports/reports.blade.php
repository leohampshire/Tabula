@extends('admin.templates.default')

@section('title', 'Relatórios')

@section('description', 'Descrição')

@section('content')

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="row">
        <div class="col-sm-6">
          <h1>Relatórios</h1>
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
              <form method="POST" action="{{route('admin.report.export')}}" autocomplete="off">
                {{csrf_field()}}
              <div class="box-header">
                <h3 class="box-title">Selecionar relatório</h3>
              </div>
              <div class="box-body">
                <div class="row">
                  <div class="col-sm-6">
                    <label for="type_report">Tipo de relatório</label>
                    <select name="type_report" class="form-control">
                      <option disabled selected>SELECIONE..</option>
                      @forelse($reports as $report)
                      <option value="{{$report->type}}" @if(old('type_report') == $report->type) selected @endif>{{$report->name}}</option>
                      @empty
                      @endforelse
                    </select>
                  </div>
                  <div class="col-sm-3">
                    <label for="inicial">Período Inicial</label>
                    <input type="text" name="initial" value="{{old('initial')}}" class="form-control input-date">
                  </div>
                  <div class="col-sm-3">
                    <label for="final">Período Final</label>
                    <input type="text" name="final" value="{{old('final')}}" class="form-control input-date">
                  </div>
                </div>
              </div>
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Gerar</button>
              </div>
            </form>
        </section>
      </div>

    </section>
    <!-- /.content -->
  </div>

@stop