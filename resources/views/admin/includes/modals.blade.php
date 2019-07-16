<!--Exclusão-->
<div class="modal fade" id="confirmationModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Confirmação</h4>
            </div>
            <div class="modal-body">
                <p>Tem certeza que deseja realizar esta exclusão?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary" id="confirm">Confirmar</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!--/.Exclusão-->

<!--Criar Capitulo-->
<div class="modal fade" id="chapterModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Novo Capítulo</h4>
            </div>
            <form method="POST" action="{{route('admin.course.chapter.store')}}" enctype="multipart/form-data">
                <div class="modal-body">
                    {{csrf_field()}}
                    @isset($course)
                    <input type="hidden" name="course_id" value="{{$course->id}}">
                    @endisset
                    <div class="box-body">
                        <div class="form-group row">
                            <div class="col-xs-12">
                                <label for="name">Nome</label>
                                <input type="text" name="name" placeholder="Nome" class="form-control" id="name"
                                    value="{{old('name')}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-xs-12">
                                <label for="desc">Descrição</label>
                                <input type="text" name="desc" placeholder="Descrição" class="form-control" id="desc"
                                    value="{{old('desc')}}">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Confirmar</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!--/.Criar Capitulo-->

<!--Editar Capitulo-->
<div class="modal fade" id="chapterEditModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Novo Capítulo</h4>
            </div>
            <form method="POST" action="{{route('admin.course.chapter.update')}}" enctype="multipart/form-data">
                <div class="modal-body">
                    {{csrf_field()}}
                    @isset($course)
                    <input type="hidden" name="course_id" value="{{$course->id}}">
                    @endisset
                    <input type="hidden" name="id">

                    <div class="box-body">
                        <div class="form-group row">
                            <div class="col-xs-12">
                                <label for="name">Nome</label>
                                <input type="text" name="name" placeholder="Nome" class="form-control" id="name"
                                    value="{{old('name')}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-xs-12">
                                <label for="desc">Descrição</label>
                                <input type="text" name="desc" placeholder="Descrição" class="form-control" id="desc"
                                    value="{{old('desc')}}">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Atualizar</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!--/.Editar Capitulo-->

<!--Criar Item-->
<div class="modal fade" id="itemModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Novo Item</h4>
            </div>
            <form method="POST" action="{{route('admin.course.item.store')}}" enctype="multipart/form-data">
                <div class="modal-body">
                    {{csrf_field()}}
                    @isset($chapter)
                    <input type="hidden" name="chapter_id" value="{{$chapter->id}}">
                    @endisset
                    @isset($course)
                    <input type="hidden" name="course_id" value="{{$course->id}}">
                    @endisset
                    <div class="box-body">
                        <div class="form-group row">
                            <div class="col-xs-12">
                                <label for="item_type_id">Tipo de Aula</label>
                                <select class="form-control item_type_id" name="item_type_id">
                                    <option selected disabled="">SELECIONE...</option>
                                    @isset($item_types)
                                    @foreach($item_types as $item)
                                    @if($item->id < 5) <option value="{{$item->id}}">{{$item->name}}</option>
                                        @endif
                                        @endforeach
                                        @endisset
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-xs-12">
                                <label for="name">Nome</label>
                                <input type="text" name="name" placeholder="Nome" class="form-control" id="name"
                                    value="{{old('name')}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-xs-12">
                                <label for="desc">Descrição</label>
                                <textarea class="form-control" rows="4" placeholder="Descrição" id="desc"
                                    name="desc">{{old('desc')}}</textarea>

                            </div>
                        </div>
                        <div class="form-group row file">
                            <div class="col-xs-12">
                                <label for="file">Arquivo</label>
                                <input type="file" name="file">

                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Confirmar</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!--/.Criar Capitulo-->

<!--Editar Item-->
<div class="modal fade" id="itemEditModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Novo Item</h4>
            </div>
            <form method="POST" action="{{route('admin.course.item.update')}}" enctype="multipart/form-data">
                <div class="modal-body">
                    {{csrf_field()}}
                    <input type="hidden" name="id">
                    @isset($chapter)
                    <input type="hidden" name="chapter_id" value="{{$chapter->id}}">
                    @endisset
                    @isset($course)
                    <input type="hidden" name="course_id" value="{{$course->id}}">
                    @endisset
                    <div class="box-body">
                        <div class="form-group row">
                            <div class="col-xs-12">
                                <label for="item_type_id">Tipo de Aula</label>
                                <select class="form-control item_type_id" name="item_type_id">
                                    <option selected disabled="">SELECIONE...</option>
                                    @isset($item_types)
                                    @foreach($item_types as $item)
                                    @if($item->id < 5) <option value="{{$item->id}}" @if($item->id ==
                                        old('item_type_id')) selected @endif>{{$item->name}}</option>
                                        @endif
                                        @endforeach
                                        @endisset
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-xs-12">
                                <label for="name">Nome</label>
                                <input type="text" name="name" placeholder="Nome" class="form-control" id="name"
                                    value="{{old('name')}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-xs-12">
                                <label for="desc">Descrição</label>
                                <textarea class="form-control" rows="4" placeholder="Descrição" id="desc"
                                    name="desc">{{old('desc')}}</textarea>

                            </div>
                        </div>
                        <div class="file">
                            <div class="form-group row">
                                <div class="col-xs-12">
                                    <label for="file">Arquivo</label>
                                    <input type="file" name="file">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 path">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Confirmar</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!--/.Criar Capitulo-->

<!--Criar Complemento-->
<div class="modal fade" id="complementModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Incluir Material Complementar</h4>
            </div>
            <form method="POST" action="{{route('admin.course.item.store')}}" enctype="multipart/form-data">
                <div class="modal-body">
                    {{csrf_field()}}
                    @isset($chapter)
                    <input type="hidden" name="chapter_id" value="{{$chapter->id}}">
                    @endisset
                    @isset($course)
                    <input type="hidden" name="course_id" value="{{$course->id}}">
                    @endisset
                    <input type="hidden" name="item_type_id" value="5">
                    <div class="box-body">
                        <div class="form-group row">
                            <div class="col-xs-12">
                                <label for="name">Nome</label>
                                <input type="text" name="name" placeholder="Nome" class="form-control" id="name"
                                    value="{{old('name')}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-xs-12">
                                <label for="desc">Descrição</label>
                                <textarea class="form-control" rows="4" placeholder="Descrição" id="desc"
                                    name="desc">{{old('desc')}}</textarea>

                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-xs-12">
                                <label for="file">Arquivo</label>
                                <input type="file" name="file">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Confirmar</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!--/.Criar Complemento-->


<!--Editar Complemento-->
<div class="modal fade" id="editComplementModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Editar Material Complementar</h4>
            </div>
            <form method="POST" action="{{route('admin.course.item.update')}}" enctype="multipart/form-data">
                <div class="modal-body">
                    {{csrf_field()}}
                    <input type="hidden" name="id">
                    @isset($chapter)
                    <input type="hidden" name="chapter_id" value="{{$chapter->id}}">
                    @endisset
                    @isset($course)
                    <input type="hidden" name="course_id" value="{{$course->id}}">
                    @endisset
                    <input type="hidden" name="item_type_id" value="5">
                    <div class="box-body">
                        <div class="form-group row">
                            <div class="col-xs-12">
                                <label for="name">Nome</label>
                                <input type="text" name="name" placeholder="Nome" class="form-control" id="name"
                                    value="{{old('name')}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-xs-12">
                                <label for="desc">Descrição</label>
                                <textarea class="form-control" rows="4" placeholder="Descrição" id="desc"
                                    name="desc">{{old('desc')}}</textarea>

                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-xs-12">
                                <label for="file">Arquivo</label>
                                <input type="file" name="file">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Confirmar</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!--/.Editar Complemento-->


<!--Editar Avaliacao-->
<div class="modal fade" id="classEditModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Editar Prova</h4>
            </div>
            <form method="POST" action="{{route('admin.course.item.update')}}" enctype="multipart/form-data">
                <div class="modal-body">
                    {{csrf_field()}}
                    <input type="hidden" name="id">
                    @isset($chapter)
                    <input type="hidden" name="chapter_id" value="{{$chapter->id}}">
                    @endisset
                    @isset($course)
                    <input type="hidden" name="course_id" value="{{$course->id}}">
                    @endisset
                    <input type="hidden" name="item_type_id" value="6">
                    <div class="box-body">
                        <div class="form-group row">
                            <div class="col-xs-12">
                                <label for="name">Nome</label>
                                <input type="text" name="name" placeholder="Nome" class="form-control" id="name"
                                    value="{{old('name')}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-xs-12">
                                <label for="desc">Descrição</label>
                                <textarea class="form-control" rows="4" placeholder="Descrição" id="desc"
                                    name="desc">{{old('desc')}}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Confirmar</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!--/.Editar Avaliacao-->
<!--Avaliacao-->
<div class="modal fade" id="classModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Incluir Prova</h4>
            </div>
            <form method="POST" action="{{route('admin.course.item.store')}}" enctype="multipart/form-data">
                <div class="modal-body">
                    {{csrf_field()}}
                    @isset($chapter)
                    <input type="hidden" name="chapter_id" value="{{$chapter->id}}">
                    @endisset
                    @isset($course)
                    <input type="hidden" name="course_id" value="{{$course->id}}">
                    @endisset
                    <input type="hidden" name="item_type_id" value="6">
                    <div class="box-body">
                        <div class="form-group row">
                            <div class="col-xs-12">
                                <label for="name">Nome</label>
                                <input type="text" name="name" placeholder="Nome" class="form-control" id="name"
                                    value="{{old('name')}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-xs-12">
                                <label for="desc">Descrição</label>
                                <textarea class="form-control" rows="4" placeholder="Descrição" id="desc"
                                    name="desc">{{old('desc')}}</textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Confirmar</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!--/.Avaliacao-->


<!--Incluir questão-->
<div class="modal fade" id="questionModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Incluir Questão</h4>
            </div>
            <form method="POST" action="{{route('admin.course.test.store')}}" enctype="multipart/form-data">
                <div class="modal-body">
                    {{csrf_field()}}
                    @isset($chapter)
                    <input type="hidden" name="chapter_id" value="{{$chapter->id}}">
                    @endisset
                    @isset($course)
                    <input type="hidden" name="course_id" value="{{$course->id}}">
                    @endisset
                    @isset($item_parent)
                    <input type="hidden" name="item_parent" value="{{$item_parent->id}}">
                    @endisset
                    <div class="box-body">
                        <div class="form-group row">
                            <div class="col-xs-12">
                                <label for="item_type_id">Tipo de Pergunta</label>
                                <select class="form-control item_type_id" name="item_type_id">
                                    <option selected disabled="">SELECIONE...</option>
                                    @isset($item_types)
                                    @foreach($item_types as $item)
                                    @if($item->id > 6)
                                    <option value="{{$item->id}}">{{$item->value}}</option>
                                    @endif
                                    @endforeach
                                    @endisset
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-xs-12">
                                <label for="name">Pergunta</label>
                                <input type="text" name="name" placeholder="Pergunta" class="form-control" id="name"
                                    value="{{old('name')}}">
                            </div>
                        </div>
                        <div class="form-group row dissertative">
                            <div class="col-xs-12">
                                <label for="desc">Dissertativa</label>
                                <textarea class="form-control" rows="4" placeholder="Descrição" id="desc"
                                    name="desc">{{old('desc')}}</textarea>
                            </div>
                        </div>
                        <div class="form-group row alternative">
                            <div class="col-xs-12">
                                <label for="desc">Alternativas</label>
                                <div class="row">
                                    <div class="col-xs-12">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <input type="radio" name="verdadeira" value="0">
                                            </span>
                                            <input type="text" class="form-control" name="afirma[]">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <input type="radio" name="verdadeira" value="1">
                                            </span>
                                            <input type="text" class="form-control" name="afirma[]">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <input type="radio" name="verdadeira" value="2">
                                            </span>
                                            <input type="text" class="form-control" name="afirma[]">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <input type="radio" name="verdadeira" value="3">
                                            </span>
                                            <input type="text" class="form-control" name="afirma[]">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <input type="radio" name="verdadeira" value="4">
                                            </span>
                                            <input type="text" class="form-control" name="afirma[]">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row truefalse">
                            <div class="col-xs-12">
                                <label for="desc">Verdadeiro ou Falso:</label>
                                <label class="radio-inline"><input type="radio" name="trueFalse"
                                        value="1">Verdadeira</label>
                                <label class="radio-inline"><input type="radio" name="trueFalse" value="0">Falsa</label>
                            </div>
                        </div>
                        <div class="form-group row alt_mult">
                            <div class="col-xs-12">
                                <label for="verdadeira">Multipla Escolha</label><br>
                                <div class="row">
                                    <div class="col-xs-12">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <input type="checkbox" name="verdadeira[]" value="0">
                                            </span>
                                            <input type="text" class="form-control" name="afirmacao[]">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">                                    
                                    <div class="col-xs-12">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <input type="checkbox" name="verdadeira[]" value="1">
                                            </span>
                                            <input type="text" name="afirmacao[]" class="form-control">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <input type="checkbox" name="verdadeira[]" value="2">
                                            </span>
                                            <input type="text" name="afirmacao[]" class="form-control">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <input type="checkbox" name="verdadeira[]" value="3">
                                            </span>
                                            <input type="text" name="afirmacao[]" class="form-control">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <input type="checkbox" name="verdadeira[]" value="4">
                                            </span>
                                            <input type="text" name="afirmacao[]" class="form-control">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Confirmar</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!--/.Incluir questão-->

<!--Incluir na empresa-->
<div class="modal fade" id="includeModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Incluir usuário</h4>
            </div>
            <form method="POST" action="{{route('admin.company.include')}}" enctype="multipart/form-data">
                <div class="modal-body">
                    {{csrf_field()}}
                    <input type="hidden" name="id">
                    <div class="box-body">
                        <div class="form-group row">
                            <div class="col-xs-12">
                                <label for="email">Nome</label>
                                <input type="text" name="email" placeholder="E-mail" class="form-control" id="email"
                                    value="{{old('email')}}">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Confirmar</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!--/.fim Incluir na empresa-->

<!--Incluir aluno-->
<div class="modal fade" id="studentModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Incluir usuário</h4>
            </div>
            <form method="POST" action="{{route('admin.course.student.include')}}" enctype="multipart/form-data">
                <div class="modal-body">
                    {{csrf_field()}}
                    <input type="hidden" name="id">
                    <div class="box-body">
                        <div class="form-group row">
                            <div class="col-xs-12">
                                <label for="email">E-mail</label>
                                <input type="text" name="email" placeholder="E-mail" class="form-control" id="email"
                                    value="{{old('email')}}">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Confirmar</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!--/.fim Incluir aluno-->

<!--Sacar-->
<div class="modal fade" id="lootModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Sacar</h4>
            </div>
            <form method="POST" action="{{route('admin.loot')}}" enctype="multipart/form-data">
                <div class="modal-body">
                    {{csrf_field()}}
                    <div class="box-body">
                        <h1 id="balance"></h1>
                        <div class="form-group row">
                            <div class="col-xs-12">
                                <label for="amount">Valor para sacar</label>
                                <input type="text" name="amount" placeholder="Valor a sacar"
                                    class="form-control input-money" value="{{old('amount')}}">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Confirmar</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!--/.fim Sacar-->

<!--aumentar prazo curso-->
<div class="modal fade" id="increaseModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Aumentar prazo curso</h4>
            </div>
            <form method="POST" action="{{ route('admin.course.time-increase')}}" enctype="multipart/form-data">
                <div class="modal-body">
                    {{csrf_field()}}
                    <input type="hidden" name="id" value="">
                    <div class="box-body">
                        <div class="form-group row">
                            <div class="col-xs-12">
                                <label for="increase">Informar prazo que deseja aumentar</label>
                                <select class="form-control" name="increase">
                                    <option value="1">1 Meses</option>
                                    <option value="2">2 Meses</option>
                                    <option value="3">3 Meses</option>
                                    <option value="4">4 Meses</option>
                                    <option value="5">5 Meses</option>
                                    <option value="6">6 Meses</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Confirmar</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!--/.fim aumentar prazo curso-->
@yield('modals')