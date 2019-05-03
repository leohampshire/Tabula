<section class="col-lg-12">
  <div class="box">
    <div class="box-header with-border">
      <h3 class="box-title">Dados</h3>
    </div>
    <form method="POST" action="{{route('teacher.course.store')}}" enctype="multipart/form-data">
      {{csrf_field()}}
      <div class="box-body">
        <div class="form-group row">
          <div class="col-xs-12">
            <label for="name">Nome</label>
            <input type="text" name="name" placeholder="Nome" class="form-control" id="name" value="{{old('name')}}">
          </div>
        </div>
        <div class="form-group row">
          <div class="col-xs-12">
            <label for="desc">Descrição</label>
            <input type="text" name="desc" placeholder="Descrição" class="form-control" id="desc" value="{{old('desc')}}">
          </div>
        </div>
        <div class="form-group row">
          <div class="col-xs-12" id="categ">
            <label for="category_id">Categoria</label>
            <select name="category_id" class="form-control" id="category_id">
              <option selected disabled="">SELECIONE...</option>
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
              <option selected disabled="">SELECIONE...</option>
            </select>
          </div>
        </div>
        <div class="form-group  row">
          <div class="col-xs-12">
            <label for="price">Preço</label>
            <input class="form-control input-money" type="text" name="price" placeholder="Definir Preço do Curso" value="{{ old('price') }}">
          </div>
        </div>
        <div class="form-group  row">
          <div class="col-xs-12">
            <label for="requirements">Requisitos para o curso</label>
            <textarea name="requirements" placeholder="Requisitos para realizar o curso (opcional)" class="form-control" rows="4">{{ old('requirements') }}</textarea>
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
        <a href="{{route('painel')}}">
          <button type="button" class="btn btn-secondary">Voltar</button>
        </a>
      </div>
    </form>
  </div>
</section>