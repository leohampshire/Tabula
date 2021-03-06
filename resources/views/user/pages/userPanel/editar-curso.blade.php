<div class="box-w-shadow">
    <div class="box-title">
        <div class="row">
            <div class="col-xs-12">
                <h2>Editar curso</h2>
            </div>
        </div>
    </div>
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
                    <button type="button" class="act-chapter" data-id="{{$course->id}}">
                        Novo capítulo
                    </button>
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
                                        <a href="#" data-url="{{ route('user.course.item', ['id' => $chapter->id])}}"
                                            title="Incluir Aula" class="act-list course-item">
                                            <i class="fa fa-bars" aria-hidden="true"></i>
                                        </a>
                                        <a href="#" title="Editar" class="act-list act-edit-chapter"
                                            data-name="{{$chapter->name}}" data-desc="{{$chapter->desc}}"
                                            data-id="{{$chapter->id}}">
                                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                        </a>
                                        <a href="{{ route('teacher.course.chapter.delete', ['id' => $chapter->id])}}"
                                            title="Excluir" class="act-list act-delete">
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
    </section>
    <form method="POST" action="{{route('teacher.course.update')}}" enctype="multipart/form-data">
        {{csrf_field()}}
        <input type="hidden" name="id" value="{{$course->id}}">
        <div class="row">
            <div class="col-xs-12 col-sm-8">
                <div class="form-group">
                    <label for="name">Nome</label>
                    <input name="name" value="{{ $course->name }}" type="text" class="form-control" placeholder="Nome">
                </div>
            </div>
            <div class="col-xs-12 col-sm-4">
                <div class="form-group">
                    <label>Tempo do curso em horas</label>
                    <div class="row">
                        <div class="col-xs-4 col-sm-6">
                            <input name="timeH" value="{{ $course->timeH }}" type="number" class="form-control" placeholder="Horas">
                        </div>
                        <div class="col-xs-4 col-sm-6">
                            <input name="timeM" value="{{ $course->timeM }}" type="number" class="form-control"
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
                    <input name="desc" type="text" value="{{ $course->desc }}" class="form-control" placeholder="Descrição">
                </div>
            </div>
        </div>
        @if(Auth::guard('user')->user()->user_type_id == 5)
        <div class="row">
            <div class="col-xs-12">
                <label class="form-check" style="font-weight: 400; margin: 8px 0 18px;">
                    <input type="checkbox" class="form-check-input input-check-private" @if($course->price == '0,00') checked @endif value="1">
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
                        <option value="{{$category->id}}" @if($category->id == $course->category_id) selected
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
            @php($classPrice = '')
            @if(Auth::guard('user')->user()->user_type_id == 5 && $course->price == '0,00')
                @php($classPrice = 'd-none')
            @endif
            <div class="col-xs-6 col-sm-4 box-price {{$classPrice}}">
                <div class="form-group">
                    <label for="price">Preço</label>
                    <input name="price" onclick="ajaxMoney()" value="{{ $course->price }}" type="text" class="form-control input-money" placeholder="Preço">
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
                    <button type="submit">Atualizar</button>
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