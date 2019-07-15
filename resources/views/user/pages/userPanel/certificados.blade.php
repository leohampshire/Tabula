<div class="box-w-shadow">
	<div class="box-title">
		<div class="row">
			<div class="col-xs-12">
				<h2>Meus Certificados</h2>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-xs-12">
			<div class="box">
				<div class="box-header with-border">
					<h3 class="box-title">Dados</h3>
				</div>
				<div class="box-body table-responsive">
					<table class="table table-bordered table-hover">
						<thead>
							<tr>
								<th>Curso</th>
								<th>Ações</th>
							</tr>
						</thead>
						<tbody>
							@forelse($certificates as $certificate)

							<tr>
								<td>{{$certificate->course->name}}</td>

								<td>
									<a href="{{asset('uploads/archives')}}/{{$certificate->path}}" download="{{$certificate->path}}" class="btn-class-item">
										<i class="fa fa-cloud-download" aria-hidden="true"></i>
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
								<th>Ações</th>
							</tr>
						</tfoot>   
					</table>
				</div>
			</div>
		</div>
	</div>
</div>