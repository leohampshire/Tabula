
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="row">
      <div class="col-sm-6">
        <h1>Saldo</h1>
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

  <!-- Main content -->
  <section class="content">
    <!-- Main row -->
    <div class="row">
      <!-- Left col -->
      <section class="col-lg-6">
        <div class="box">
          <div class="box-header with-border">
            <h3 class="box-title">Dados da conta</h3>
          </div>
          <div class="box-body">
            <div class="row">
              <div class="col-sm-12">
                <h3 for="name">Saldo <span style="float: right;">R$ {{$amounts['balance']}}</span></h3>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12">
                <h3 for="name">À receber <span style="float: right;">R$ {{$amounts['waiting']}}</span></h3>
              </div>
            </div> 
            <div class="row">
              <div class="col-sm-12">
                <h3 for="name">Transferido <span style="float: right;">R$ {{$amounts['transfer']}}</span></h3>
              </div>
            </div>
          </div>
          <div class="box-footer">
            <button type="submit" data-balance="{{$amounts['balance']}}" class="btn btn-primary act-loot">Sacar</button>
          </div>
        </div>
      </section>
    </div>

    <!-- /.row (main row) -->

  </section>
  <!-- /.content -->

</div>
