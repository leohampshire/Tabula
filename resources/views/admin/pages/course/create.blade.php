@extends('admin.templates.default')

@section('title', 'Adicionar Curso')

@section('description', 'Descrição')

@section('content')

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="row">
        <div class="col-sm-6">
          <h1>Adicionar Curso</h1>
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
              <h3 class="box-title">Dados</h3>
            </div>
            <form method="POST" action="{{route('admin.course.store')}}" enctype="multipart/form-data">
              {{csrf_field()}}
              <div class="box-body">
                <div class="form-group row">
                  <div class="col-xs-12 col-sm-8">
                    <label for="name">Nome</label>
                    <input type="text" name="name" placeholder="Nome" class="form-control" id="name" value="{{old('name')}}">
                  </div>
                  <div class="col-xs-6 col-sm-2">
                  <label>Tempo em horas</label>
                    <input name="timeH" value="{{ old('timeH') }}" type="number" class="form-control" placeholder="Horas">
                  </div>

                  <div class="col-xs-6 col-sm-2">
                  <label>Tempo em minutos</label>
                    <input name="timeM" value="{{ old('timeM') }}" type="number" class="form-control" placeholder="Minutos">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-xs-12">
                    <label for="desc">Descrição</label>
                    <input type="text" name="desc" placeholder="Descrição" class="form-control" id="desc" value="{{old('desc')}}">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-xs-6" id="categ">
                    <label for="category_id">Categoria</label>
                    <select name="category_id" class="form-control" id="category_id">
                      <option selected disabled="">Selecione...</option>
                      @foreach($categories as $category)
                        @if($category->category_id === NULL)
                        <option value="{{$category->id}}" @if($category->id == old('category_id')) selected @endif>{{$category->name}}</option>
                        @endif
                      @endforeach
                    </select>
                  </div>
                  <div class="col-xs-6" id="sub_categ">
                    <label for="subcategory_id">SubCategoria</label>
                    <select name="subcategory_id" class="form-control" id="subcategory_id">
                      <option selected disabled="">Selecione...</option>
                    </select>
                  </div>
                </div>
                <div class="row">
                  <div class="col-xs-12">
                    <label class="form-check" style="font-weight: 400; margin: 8px 0 18px;">
                      <input type="checkbox" class="form-check-input input-check-private" value="1">
                      Curso privado e não disponível para venda no site
                    </label>
                  </div>
                </div>
                <div class="form-group  row box-price">
                  <div class="col-xs-12">
                    <label for="price">Preço</label>
                    <input class="form-control input-money" type="text" name="price" placeholder="Definir Preço do Curso" value="{{ old('price') }}">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-xs-12">
                    <label for="requirements">Requisitos para o curso</label>
                    <textarea name="requirements"  placeholder="Requisitos para realizar o curso (opcional)" class="form-control tinyeditor" rows="4">{{ old('requirements') }}</textarea>
                  </div>
                </div>
                <div class="form-group  row">
                  <div class="col-xs-12">
                    <label for="meta_title">Meta Title</label>
                    <input class="form-control" id="meta_title" type="text" name="meta_title" placeholder="Meta Title" value="{{ old('meta_title') }}">
                  </div>
                </div>
                <div class="form-group  row">
                  <div class="col-xs-12">
                    <label for="meta_description">Meta Description</label>
                    <textarea name="meta_description" id="meta_description" rows="6" class="form-control">{{old('meta_description')}}</textarea>
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
                <button type="submit" class="btn btn-primary">Adicionar</button>
                <a href="{{route('admin.course.index')}}">
                  <button type="button" class="btn btn-secondary">Voltar</button>
                </a>
              </div>
            </form>
          </div>
        </section>
        
      </div>
      <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
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