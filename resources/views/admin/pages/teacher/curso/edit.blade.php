<!DOCTYPE html>
<html>
<head>
  <title>teste</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>

<section class="col-lg-12">
  <div class="box">
    <div class="box-header with-border">
      <h3 class="box-title">Dados</h3>
    </div>
    <form method="POST" action="{{route('teacher.course.update')}}" enctype="multipart/form-data">
      {{csrf_field()}}
      <input type="hidden" name="id" value="{{$course->id}}">
      <div class="box-body">
        <div class="form-group row">
          <div class="col-xs-12">
            <label for="name">Nome</label>
            <input type="text" name="name" placeholder="Nome" class="form-control" id="name" value="{{$course->name}}">
          </div>
        </div>
        <div class="form-group row">
          <div class="col-xs-12">
            <label for="desc">Descrição</label>
            <input type="text" name="desc" placeholder="Descrição" class="form-control" id="desc" value="{{$course->desc}}">
          </div>
        </div>
        <div class="form-group row">
          <div class="col-xs-12" id="categ">
            <label for="category_id">Categoria</label>
            <select name="category_id" class="form-control" id="category_id">
              <option selected disabled="">SELECIONE...</option>
              @foreach($categories as $category)
                @if($category->category_id === NULL)
                <option value="{{$category->id}}" @if($category->id == $course->category_id) selected @endif>{{$category->name}}</option>
                @endif
              @endforeach
            </select>
          </div>
          <div class="col-xs-6" id="sub_categ">
            <label for="subcategory_id">SubCategoria</label>
            <select name="subcategory_id" class="form-control" id="subcategory_id">
              <option selected disabled="">SELECIONE...</option>
            </select>
          </div>
        </div>
        <div class="form-group  row">
          <div class="col-xs-12">
            <label for="price">Preço</label>
            <input class="form-control input-money" type="text" name="price" placeholder="Definir Preço do Curso" value="{{ $course->price }}">
          </div>
        </div>
        <div class="form-group  row">
          <div class="col-xs-12">
            <label for="requirements">Requisitos para o curso</label>
            <textarea name="requirements" placeholder="Requisitos para realizar o curso (opcional)" class="form-control" rows="4">{{ $course->requirements }}</textarea>
          </div>
        </div>
        <div class="form-group  row">
          <div class="col-xs-12">
            <label for="thumb_img">Imagem da Vitrine</label>
            <input class="form-control" type="file" name="thumb_img">
          </div>
        </div>
        <div class="form-group  row">
          <div class="col-xs-12">
            <label for="video">Vídeo de apresentação do Curso</label>
            <input class="form-control" type="file" name="video">
          </div>
        </div>
      </div>
      <div class="box-footer">
        <button type="submit" class="btn btn-primary">Atualizar</button>
        <a href="{{route('painel')}}">
          <button type="button" class="btn btn-secondary">Voltar</button>
        </a>
      </div>
    </form>
  </div>
</section>

<!-- Main content -->
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
            <a href="{{route('teacher.course.chapter.create', ['id' =>$course->id])}}">
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
                        <a href="{{ route('teacher.course.chapter.item', ['id' => $chapter->id])}}" title="Incluir Aula" class="act-list">item
                          <i class="fa fa-bars" aria-hidden="true"></i>
                        </a>
                        <a href="{{route('teacher.course.chapter.edit', ['id' => $chapter->id])}}" title="Editar" class="act-list act-edit-chapter" data-name="{{$chapter->name}}" data-desc="{{$chapter->desc}}" data-id="{{$chapter->id}}">
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

</body>
</html>