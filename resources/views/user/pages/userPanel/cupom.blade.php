<div class="box-w-shadow">  
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="row">
          <div class="col-sm-6">
            <h1>Cupons</h1>
          </div>
          <div class="col-sm-6">
            <button class="btn-header new-coupon">Novo</button>
          </div>
        </div>
      </section>

      <!-- Main content -->
      <section class="content">
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-lg-12">
            <div class="box">
              <div class="box-body table-responsive">
                <table class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>Código do Cupom</th>
                      <th>Tipo Cupom</th>
                      <th>Tipo Desconto</th>
                      <th>Descrição Cupom</th>
                      <th>Ações</th>
                    </tr>
                  </thead>
                  <tbody>
                    @forelse($coupons as $coupon)
                      <tr>
                        <td>{{$coupon->cod_coupon}}</td>
                        <td>{{ucfirst ($coupon->type_coupon)}}</td>
                        <td>{{ucfirst ($coupon->type_discount)}}</td>
                        <td>{{$coupon->desc_coupon}}</td>
                        <td>
                          <a href="{{ route('admin.coupon.edit', ['id' => $coupon->id])}}" title="Editar" class="act-list">
                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                          </a>
                          <a href="{{ route('admin.coupon.delete', ['id' => $coupon->id])}}" title="Excluir" class="act-list act-delete">
                            <i class="fa fa-minus-square-o" aria-hidden="true"></i>
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
                      <th>Código do Cupom</th>
                      <th>Tipo Cupom</th>
                      <th>Tipo Desconto</th>
                      <th>Descrição Cupom</th>
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