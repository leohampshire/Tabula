@extends('admin.templates.default')

@section('title', 'Editar Curso')

@section('description', 'Descrição')

@section('content')

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="row">
        <div class="col-sm-6">
          <h1>Editar Curso</h1>
        </div>
        <div class="col-sm-6">
            <button class="btn-header act-chapter">NOVO CAPITULO</button>
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
              <h3 class="box-title">Lista de Capítulos</h3>
              <div class="box-tools">
              </div>
            </div>
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
                        <a href="{{ route('admin.course.chapter.item', ['id' => $chapter->id])}}" title="Incluir Aula" class="act-list">
                          <i class="fa fa-list-ul" aria-hidden="true"></i>
                        </a>
                        <a href="#" title="Editar" class="act-list act-edit-chapter" data-name="{{$chapter->name}}" data-desc="{{$chapter->desc}}" data-id="{{$chapter->id}}">
                          <i class="fa fa-pencil-square" aria-hidden="true"></i>
                        </a>
                        <a href="{{ route('admin.course.chapter.delete', ['id' => $chapter->id])}}" title="Excluir" class="act-list act-delete">
                          <i class="fa fa-times" aria-hidden="true"></i>
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
      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <section class="col-lg-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Dados</h3>
            </div>
            <form method="POST" action="{{route('admin.course.update')}}" enctype="multipart/form-data">
              {{csrf_field()}}
              <input type="hidden" name="id" value="{{$course->id}}">
              <div class="box-body">
                <div class="form-group row">
                  <div class="col-xs-12 col-sm-8">
                    <label for="name">Nome</label>
                    <input type="text" name="name" placeholder="Nome" class="form-control" id="name" value="{{$course->name}}">
                  </div>
                  <div class="col-xs-6 col-sm-2">
                  <label>Tempo em horas</label>
                    <input name="timeH" value="{{ $course->timeH }}" type="number" class="form-control" placeholder="Horas">
                  </div>

                  <div class="col-xs-6 col-sm-2">
                  <label>Tempo em minutos</label>
                    <input name="timeM" value="{{ $course->timeM }}" type="number" class="form-control" placeholder="Minutos">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-xs-12">
                    <label for="urn">URN</label>
                    <input type="text" name="urn" placeholder="URN" class="form-control input-urn" id="urn" value="{{$course->urn}}">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-xs-12">
                    <label for="desc">Descrição</label>
                    <textarea name="desc" class="form-control tinyeditor" rows="4">{{$course->desc}}</textarea>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-xs-6" id="categ">
                    <label for="category_id">Categoria</label>
                    <select name="category_id" class="form-control" id="category_id">
                      <option selected disabled="">Selecione...</option>
                      @foreach($categories as $category)
                        @if($category->category_id === NULL)
                        <option value="{{$category->id}}" @if($category->id == $course->category_id) selected @endif>{{$category->name}}</option>
                        @endif
                      @endforeach
                    </select>
                  </div>
                  <div class="col-xs-6" id="sub_categ">
                    <label for="subcategory_id">Subcategoria</label>
                    <select name="subcategory_id" class="form-control" id="subcategory_id">
                      <option selected disabled="">Selecione...</option>
                      @foreach($subcategories as $subcategory)
                        <option value="{{$subcategory->id}}" @if($subcategory->id == $course->subcategory_id) selected @endif>{{$subcategory->name}}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="form-group row" id="featured">
                  <div class="col-xs-12">
                    <label for="featured">Destaque?</label>
                    <select name="featured" class="form-control">
                      <option value="0" @if(0 == $course->featured) selected @endif>Não</option>
                      <option value="1" @if(1 == $course->featured) selected @endif>Sim</option>
                    </select>
                  </div>
                </div>
                <div class="row">
                  <div class="col-xs-12">
                    <label class="form-check" style="font-weight: 400; margin: 8px 0 18px;">
                      <input type="checkbox" class="form-check-input input-check-private" @if($course->price == '0,00') checked @endif value="1">
                      Curso privado e não disponível para venda no site
                    </label>
                  </div>
                </div>
                @php($classPrice = '')

                @if($course->price == '0,00')
                  @php($classPrice = 'd-none')
                @endif
                <div class="form-group  row {{$classPrice}} box-price">
                  <div class="col-sm-4">
                    <label for="price">Preço</label>
                    <input class="form-control input-money" type="text" name="price" placeholder="Definir Preço do Curso" value="{{ $course->price }}">
                  </div>
                </div>
                <div class="form-group  row">
                  <div class="col-xs-12">
                    <label for="requirements">Requisitos para o curso</label>
                    <textarea name="requirements" placeholder="Requisitos para realizar o curso (opcional)" class="form-control tinyeditor" rows="4">{{$course->requirements}}</textarea>
                  </div>
                </div>
                <div class="form-group  row">
                  <div class="col-xs-12">
                    <label for="meta_title">Meta Title</label>
                    <input class="form-control" id="meta_title" type="text" name="meta_title" placeholder="Meta Title" value="{{ $course->meta_title }}">
                  </div>
                </div>
                <div class="form-group  row">
                  <div class="col-xs-12">
                    <label for="meta_description">Meta Description</label>
                    <textarea name="meta_description" id="meta_description" rows="6" class="form-control">{{$course->meta_description}}</textarea>
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
                <a href="{{route('admin.course.index')}}">
                  <button type="button" class="btn btn-secondary">Voltar</button>
                </a>
              </div>
            </form>
          </div>
        </section>
        
      </section>
      <!-- /.content -->
      </div>
      <!-- /.row (main row) -->

  </div>

@stop

@section('scripts')
<script type="text/javascript">
  $('.input-check-private').change( function(){
    if($(this).prop('checked')){
      $('input[name="price"]').val('');
      $('.box-price').css( "display", "none" );
    } else {
      $('.box-price').css( "display", "block" );
    }
  });
</script>
@endsection