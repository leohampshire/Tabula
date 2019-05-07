<div class="box-title">
	<div class="row">
		<div class="col-xs-12">
			<h2>Editar curso</h2>
		</div>
	</div>
</div>
<form method="POST" action="{{route('teacher.course.update')}}" enctype="multipart/form-data">
	{{csrf_field()}}
	<div class="row form-group">
		<div class="col-xs-6">
			<label for="name">Nome</label>
			<input name="name" value="{{ $course->name }}" type="text" class="form-control" placeholder="Nome">
		</div>
	</div>
	<div class="row form-group">
		<div class="col-xs-6">
			<label for="desc">Descrição</label>
			<input name="desc" type="text" value="{{ $course->desc }}" class="form-control" placeholder="Descrição">
		</div>
	</div>
	<div class="row form-group" id="categ">
		<div class="col-sm-4">
			<label for="category_id">Categoria</label>
			<select name="category_id" class="form-control">
				<option value="" selected disabled hidden>Escolha</option>
				@foreach($categories as $category)
	                @if($category->category_id === NULL)
	                <option value="{{$category->id}}" @if($category->id == $course->category_id) selected @endif>{{$category->name}}</option>
	                @endif
              	@endforeach
			</select>
		</div>
	</div>
	<div class="row form-group" id="sub_categ">
		<div class="col-sm-4">
			<label for="subcategory_id">SubCategoria</label>
			<select name="subcategory_id" class="form-control" id="subcategory_id">
				<option value="" selected disabled hidden>Escolha</option>
				
			</select>
		</div>
	</div>
	<div class="row form-group">
		<div class="col-xs-4">
			<label for="price">Preço</label>
			<input  name="price" value="{{ $course->price }}" type="text" class="form-control input-money" placeholder="Preço">
		</div>
	</div>
	<div class="row form-group">
		<div class="col-xs-6">
			<label for="requirements">Requisitos</label>
			<textarea name="requirements" class="form-control" placeholder="Requisitos para o curso" rows="4">{{ $course->requirements }}</textarea>
		</div>
	</div>
	<div class="row form-group">
		<div class="col-xs-4">
			<label for="thumb_img">Imagem da vitrine</label>
			<input type="file" name="thumb_img">
		</div>
	</div>
	<div class="row form-group">
		<div class="col-xs-4">
			<label for="video">Vídeo de apresentação</label>
			<input type="file" name="video">
		</div>
	</div>
	<div class="row form-group">
		<div class="col-xs-4">
			<button type="submit">Editar</button>
		</div>
	</div>
</form>
<section class="content">
   <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <section class="col-lg-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Lista de Capítulos</h3>
              <div class="box-tools">
              </div>
            </div>
            <a href="#" class="act-chapter">
          <button type="button" class="btn btn-secondary">Novo capitulo</button>
        </a>
            <div class="box-body table-responsive">
              <table class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Nome</th>
                    <th>Descrição</th>
                    <th>Ações</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse($chapters as $chapter)
                    <tr>
                      <td>{{$chapter->name}}</td>
                      <td>{{$chapter->desc}}</td>
                      <td>
                        <a href="#" data-url="{{ route('teacher.course.chapter.item', ['id' => $chapter->id])}}" title="Incluir Aula" class="act-list course-item">item
                          <i class="fa fa-bars" aria-hidden="true"></i>
                        </a>
                        <a href="#" title="Editar" class="act-list act-edit-chapter" data-name="{{$chapter->name}}" data-desc="{{$chapter->desc}}" data-id="{{$chapter->id}}">
                          editar
                        </a>
                        <a href="{{ route('teacher.course.chapter.delete', ['id' => $chapter->id])}}" title="Excluir" class="act-list act-delete">
                          deletar
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
                    <th>Descrição</th>
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