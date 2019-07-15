<div class="box-w-shadow">
    <div class="box-title">
        <div class="row">
            <div class="col-xs-12">
                <h2>Criar curso</h2>
            </div>
        </div>
    </div>
    <form method="POST" action="{{route('teacher.course.store')}}" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="row form-group">
            <div class="col-xs-8">
                <label for="name">Nome</label>
                <input name="name" value="{{ old('name') }}" type="text" class="form-control" placeholder="Nome">
            </div>

            <div class="col-xs-4">
                <label>Tempo do curso em horas</label>
                <div class="row">
                    <div class="col-xs-6">
                        <input name="timeH" maxlength="2" value="{{ old('timeH') }}" type="number" class="form-control"
                            placeholder="Horas">
                    </div>
                    <div class="col-xs-6">
                        <input name="timeM" value="{{ old('timeM') }}" type="number" class="form-control"
                            placeholder="Minutos">
                    </div>
                </div>
            </div>
        </div>
        <div class="row form-group">
            <div class="col-xs-12">
                <label for="desc">Descrição</label>
                <input name="desc" type="text" value="{{ old('desc') }}" class="form-control" placeholder="Descrição">
            </div>
        </div>
        <div class="row form-group">
            <div class="col-sm-4" id="categ">
                <label for="category_id">Categoria</label>
                <select name="category_id" class="form-control" id="category_id" onchange="categAjax()">
                    <option value="" selected disabled hidden>Escolha</option>
                    @foreach($categories as $category)
                    @if($category->category_id === NULL)
                    <option value="{{$category->id}}" @if($category->id == old('category_id')) selected
                        @endif>{{$category->name}}</option>
                    @endif
                    @endforeach
                </select>
            </div>
            <div class="col-sm-4" id="sub_categ">
                <label for="subcategory_id">SubCategoria</label>
                <select name="subcategory_id" class="form-control" id="subcategory_id">
                    <option value="" selected disabled hidden>Escolha</option>
                </select>
            </div>
            <div class="col-xs-4">
                <label for="price">Preço</label>
                <input name="price" value="{{ old('price') }}" type="text" onclick="ajaxMoney()"
                    class="form-control input-money" placeholder="Preço">
            </div>
        </div>
        <div class="row form-group">
            <div class="col-xs-12">
                <label for="requirements">Requisitos</label>
                <textarea name="requirements" class="form-control" placeholder="Requisitos para o curso"
                    rows="4">{{ old('requirements') }}</textarea>
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
                <button type="submit">Criar</button>
            </div>
        </div>
    </form>
</div>