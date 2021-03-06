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
        <div class="row">
            <div class="col-xs-12 col-sm-8">
                <div class="form-group">
                    <label for="name">Nome</label>
                    <input name="name" value="{{ old('name') }}" type="text" class="form-control" placeholder="Nome">
                </div>
            </div>
            <div class="col-xs-12 col-sm-4">
                <div class="form-group">
                    <label>Tempo do curso em horas</label>
                    <div class="row">
                        <div class="col-xs-4 col-sm-6">
                            <input name="timeH" maxlength="2" value="{{ old('timeH') }}" type="number" class="form-control"
                                placeholder="Horas">
                        </div>
                        <div class="col-xs-4 col-sm-6">
                            <input name="timeM" value="{{ old('timeM') }}" type="number" class="form-control"
                                placeholder="Minutos">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <div class="form-group">
                    <label for="desc">Descrição</label>
                    <input name="desc" type="text" class="form-control" placeholder="Descrição">
                </div>
            </div>
        </div>
        @if(Auth::guard('user')->user()->user_type_id == 5)
        <div class="row">
            <div class="col-xs-12">
                <label class="form-check" style="font-weight: 400; margin: 8px 0 18px;">
                    <input type="checkbox" class="form-check-input input-check-private" value="1">
                    Curso privado e não disponível para venda no site
                </label>
            </div>
        </div>
        @endif
        <div class="row">
            <div class="col-sm-4" id="categ">
                <div class="form-group">
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
            </div>
            <div class="col-sm-4" id="sub_categ">
                <div class="form-group">
                    <label for="subcategory_id">SubCategoria</label>
                    <select name="subcategory_id" class="form-control" id="subcategory_id">
                        <option value="" selected disabled hidden>Escolha</option>
                    </select>
                </div>
            </div>
            <div class="col-xs-6 col-sm-4 box-price">
                <div class="form-group">
                    <label for="price">Preço</label>
                    <input name="price" value="{{ old('price') }}" type="text" onclick="ajaxMoney()"
                        class="form-control input-money" placeholder="Preço">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-4">
                <div class="form-group">
                    <label for="thumb_img">Imagem da vitrine</label>
                    <input type="file" name="thumb_img">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-4">
                <div class="form-group">
                    <label for="video">Vídeo de apresentação</label>
                    <input type="file" name="video">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-6 col-sm-4">
                <div class="form-group">
                    <button type="submit">Criar</button>
                </div>
            </div>
        </div>
    </form>
</div>


<script type="text/javascript">
    $('body').on('change', '.input-check-private', function(){
        if($(this).prop('checked')){
            $('input[name="price"]').val('');
            $('.box-price').css( "display", "none" );
        } else {
            $('.box-price').css( "display", "block" );
        }
    });
</script>