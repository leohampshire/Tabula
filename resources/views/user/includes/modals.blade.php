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
<!--Confirmacao-->
<div class="modal fade" id="avaliableModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Confirmação</h4>
            </div>
            <div class="modal-body">
                <p>Tem certeza que deseja enviar o seu curso para análise de nossa equipe</p>
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
<!--/.Confirmação-->


<!--Solicitacao banco-->
<div class="modal fade" id="bankModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Dados Bancários</h4>
            </div>
            <form method="POST" action="{{route('bank-data')}}" enctype="multipart/form-data">
                <div class="modal-body">
                    {{csrf_field()}}

                    <div class="box-body">
                        <div class="row">
                            <div class="col-xs-12 col-sm-8">
                                <div class="form-group">
                                    <label for="legal_name">Nome</label>
                                    <input name="legal_name" type="text" placeholder="Informar nome que está no Cartão"
                                        class="form-control">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-4">
                                <div class="form-group">
                                    <label for="cpf">CPF</label>
                                    <input name="cpf" type="text" placeholder="XXX.XXX.XXX-XX"
                                        class="form-control input-cpf">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-8 col-sm-4">
                                <div class="form-group">
                                    <label for="bank_code">Cód. Banco</label>
                                    <input name="bank_code" placeholder="XXX" type="number" class="form-control">
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-4">
                                <div class="form-group">
                                    <label for="agencia">Agência</label>
                                    <input name="agencia" placeholder="XXXXX" type="number" class="form-control">
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-4">
                                <div class="form-group">
                                    <label for="agencia_dv">Dig. Agência</label>
                                    <input name="agencia_dv" placeholder="(Opcional)" type="number"
                                        class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-6 col-sm-5">
                                <div class="form-group">
                                    <label for="conta">Conta (sem dígito)</label>
                                    <input name="conta" type="number" placeholder="Conta" class="form-control">
                                </div>
                            </div>
                            <div class="col-xs-6 col-sm-3">
                                <div class="form-group">
                                    <label for="conta_dv">Dig. conta</label>
                                    <input name="conta_dv" placeholder="XX" type="number" class="form-control">
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
<!--/.Solicitacao Banco-->


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
            <form method="POST" action="{{route('teacher.course.chapter.store')}}" enctype="multipart/form-data">
                <div class="modal-body">
                    {{csrf_field()}}
                    <input type="hidden" name="course_id" value="">
                    <div class="box-body">
                        <div class="form-group row">
                            <div class="col-xs-12">
                                <label for="name">Nome</label>
                                <input type="text" name="name" placeholder="Nome" class="form-control"
                                    value="{{old('name')}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-xs-12">
                                <label for="desc">Descrição</label>
                                <input type="text" name="desc" placeholder="Descrição" class="form-control"
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
            <form method="POST" action="{{route('teacher.course.chapter.update')}}" enctype="multipart/form-data">
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
                                <input type="text" name="name" placeholder="Nome" class="form-control"
                                    value="{{old('name')}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-xs-12">
                                <label for="desc">Descrição</label>
                                <input type="text" name="desc" placeholder="Descrição" class="form-control"
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
            <form method="POST" action="{{route('teacher.course.item.store')}}" enctype="multipart/form-data">
                <div class="modal-body">
                    {{csrf_field()}}
                    <input type="hidden" name="chapter_id" value="">
                    <input type="hidden" name="course_id" value="">
                    <div class="box-body">
                        <div class="form-group row">
                            <div class="col-xs-12">
                                <label for="item_type_id">Tipo de Aula</label>
                                <select class="form-control item_type_id" name="item_type_id">
                                    <option selected disabled="">Selecione...</option>
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
                                <input type="text" name="name" placeholder="Nome" class="form-control"
                                    value="{{old('name')}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-xs-12">
                                <label for="desc">Descrição</label>
                                <textarea class="form-control" rows="4" placeholder="Descrição"
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
                <h4 class="modal-title">Editar Item</h4>
            </div>
            <form method="POST" action="{{route('teacher.course.item.update')}}" enctype="multipart/form-data">
                <input type="hidden" name="id">
                <div class="modal-body">
                    {{csrf_field()}}
                    <div class="box-body">
                        <div class="form-group row">
                            <div class="col-xs-12">
                                <label for="item_type_id">Tipo de Aula</label>
                                <select class="form-control item_type_id" name="item_type_id">
                                    <option selected disabled="">Selecione...</option>
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
                                <input type="text" name="name" placeholder="Nome" class="form-control"
                                    value="{{old('name')}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-xs-12">
                                <label for="desc">Descrição</label>
                                <textarea class="form-control" rows="4" placeholder="Descrição"
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
    </div>
    <!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>
<!--/.editar item-->

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
            <form method="POST" action="{{route('teacher.course.item.store')}}" enctype="multipart/form-data">
                <div class="modal-body">
                    {{csrf_field()}}
                    <input type="hidden" name="chapter_id" value="">
                    <input type="hidden" name="course_id" value="">
                    <input type="hidden" name="item_type_id" value="5">
                    <div class="box-body">
                        <div class="form-group row">
                            <div class="col-xs-12">
                                <label for="name">Nome</label>
                                <input type="text" name="name" placeholder="Nome" class="form-control"
                                    value="{{old('name')}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-xs-12">
                                <label for="desc">Descrição</label>
                                <textarea class="form-control" rows="4" placeholder="Descrição"
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
<!--/.Criar Capitulo-->


<!--Editar Complemento-->
<div class="modal fade" id="complementModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Incluir Material Complementar</h4>
            </div>
            <form method="POST" action="{{route('teacher.course.item.store')}}" enctype="multipart/form-data">
                <div class="modal-body">
                    {{csrf_field()}}
                    <input type="hidden" name="chapter_id" value="">
                    <input type="hidden" name="course_id" value="">
                    <input type="hidden" name="item_type_id" value="5">
                    <div class="box-body">
                        <div class="form-group row">
                            <div class="col-xs-12">
                                <label for="name">Nome</label>
                                <input type="text" name="name" placeholder="Nome" class="form-control"
                                    value="{{old('name')}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-xs-12">
                                <label for="desc">Descrição</label>
                                <textarea class="form-control" rows="4" placeholder="Descrição"
                                    name="desc">{{old('desc')}}</textarea>

                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-xs-12">
                                <label for="file">Arquivo</label>
                                <input class="form-control" type="file" name="file">
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


<!--Criar Avaliacao-->
<div class="modal fade" id="classModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Incluir Prova</h4>
            </div>
            <form method="POST" action="{{route('teacher.course.item.store')}}" enctype="multipart/form-data">
                <div class="modal-body">
                    {{csrf_field()}}
                    <input type="hidden" name="chapter_id" value="">
                    <input type="hidden" name="course_id" value="">
                    <input type="hidden" name="item_type_id" value="6">
                    <div class="box-body">
                        <div class="form-group row">
                            <div class="col-xs-12">
                                <label for="name">Nome</label>
                                <input type="text" name="name" placeholder="Nome" class="form-control"
                                    value="{{old('name')}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-xs-12">
                                <label for="desc">Descrição</label>
                                <textarea class="form-control" rows="4" placeholder="Descrição"
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
<!--/.Criar Avaliacao-->


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
            <form method="POST" action="{{route('teacher.course.item.store')}}" enctype="multipart/form-data">
                <div class="modal-body">
                    {{csrf_field()}}
                    <input type="hidden" name="chapter_id" value="">
                    <input type="hidden" name="course_id" value="">
                    <input type="hidden" name="item_parent" value="">
                    <div class="box-body">
                        <div class="form-group row">
                            <div class="col-xs-12">
                                <label for="item_type_id">Tipo de Pergunta</label>
                                <select class="form-control item_type_id" name="item_type_id">
                                    <option selected disabled="">Selecione...</option>
                                    @isset($item_types)
                                    @foreach($item_types as $item)
                                    @if($item->id > 6)
                                    <option value="{{$item->id}}" @if($item->id == old('item_type_id')) selected
                                        @endif>{{$item->value}}</option>
                                    @endif
                                    @endforeach
                                    @endisset
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-xs-12">
                                <label for="name">Pergunta</label>
                                <input type="text" name="name" placeholder="Pergunta" class="form-control"
                                    value="{{old('name')}}">
                            </div>
                        </div>
                        <div class="form-group row dissertative">
                            <div class="col-xs-12">
                                <label for="desc">Dissertativa</label>
                                <textarea class="form-control" rows="4" placeholder="Descrição"
                                    name="desc">{{old('desc')}}</textarea>
                            </div>
                        </div>
                        <div class="form-group row alternative">
                            <div class="col-xs-12">
                                <label for="desc">Alternativas</label>
                                <div class="row row-item-question">
                                    <div class="col-lg-12">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <input type="radio" name="verdadeira" value="0">
                                            </span>
                                            <input type="text" class="form-control" name="afirma[]">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                </div>
                                <div class="row row-item-question">
                                    <div class="col-lg-12">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <input type="radio" name="verdadeira" value="1">
                                            </span>
                                            <input type="text" class="form-control" name="afirma[]">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                </div>
                                <div class="row row-item-question">
                                    <div class="col-lg-12">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <input type="radio" name="verdadeira" value="2">
                                            </span>
                                            <input type="text" class="form-control" name="afirma[]">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                </div>
                                <div class="row row-item-question">
                                    <div class="col-lg-12">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <input type="radio" name="verdadeira" value="3">
                                            </span>
                                            <input type="text" class="form-control" name="afirma[]">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                </div>
                                <div class="row row-item-question">
                                    <div class="col-lg-12">
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
                        <div class="form-group row multiple">
                            <div class="col-xs-12">
                                <label for="verdadeira">Multipla Escolha</label><br>
                                <div class="row row-item-question">
                                    <div class="col-lg-12">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <input type="checkbox" name="verdadeira[]" value="0">
                                            </span>
                                            <input type="text" name="afirmacao[]" class="form-control">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                </div>
                                <div class="row row-item-question">
                                    <div class="col-lg-12">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <input type="checkbox" name="verdadeira[]" value="1">
                                            </span>
                                            <input type="text" name="afirmacao[]" class="form-control">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                </div>
                                <div class="row row-item-question">
                                    <div class="col-lg-12">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <input type="checkbox" name="verdadeira[]" value="2">
                                            </span>
                                            <input type="text" name="afirmacao[]" class="form-control">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                </div>
                                <div class="row row-item-question">
                                    <div class="col-lg-12">
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <input type="checkbox" name="verdadeira[]" value="3">
                                            </span>
                                            <input type="text" name="afirmacao[]" class="form-control">
                                        </div>
                                        <!-- /input-group -->
                                    </div>
                                </div>
                                <div class="row row-item-question">
                                    <div class="col-lg-12">
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
<!--/.Criar Capitulo-->

<!--Aula Gratis-->
<div class="modal fade" id="freeItemModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <div class="nome">
                    <h4 class="modal-title">Item</h4>
                </div>
            </div>
            <div class="modal-body">
                <div class="desc"></div>
                <div class="conteudo"></div>
                <div class="path"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left stop" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-primary stop" data-dismiss="modal">Confirmar</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!--/.Aula gratis-->

<!--Avaliacao-->
<div class="modal fade" id="ratingModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <div class="nome">
                    <h4 class="modal-title">Avaliar Curso</h4>
                </div>
            </div>
            <form method="POST" action="{{route('user.rating')}}">
                {{csrf_field()}}

                <div class="modal-body">
                    <div class="form-group row">
                        <div class="col-xs-12">
                            <label>Comentários</label>
                            <textarea name="comment" class="form-control" rows="5" placeholder="(opcional)"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-xs-12">
                            <label for="rating">Avaliação</label>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-xs-12">
                            <a href="javascript:void(0)" onclick="avaliar(1)">
                                <img src="{{asset('images/img/star0.png')}}" id="s1" class="rating-style"></a>

                            <a href="javascript:void(0)" onclick="avaliar(2)">
                                <img src="{{asset('images/img/star0.png')}}" id="s2" class="rating-style"></a>

                            <a href="javascript:void(0)" onclick="avaliar(3)">
                                <img src="{{asset('images/img/star0.png')}}" id="s3" class="rating-style"></a>

                            <a href="javascript:void(0)" onclick="avaliar(4)">
                                <img src="{{asset('images/img/star0.png')}}" id="s4" class="rating-style"></a>

                            <a href="javascript:void(0)" onclick="avaliar(5)">
                                <img src="{{asset('images/img/star0.png')}}" id="s5" class="rating-style"></a>
                            <p id="rating" hidden></p>
                            <input type="hidden" name="user_id" value="">
                            <input type="hidden" name="course_id" value="">
                            <input type="hidden" name="star" id="ratings" value="">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left stop" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Confirmar</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!--/.Avaliação-->

<!--Incluir Professor-->
<div class="modal fade" id="teacherModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Incluir Professor</h4>
            </div>
            <form method="POST" action="{{route('user.teacher.include')}}" enctype="multipart/form-data">
                <div class="modal-body">
                    {{csrf_field()}}
                    <input type="hidden" name="company_id" value="">
                    <div class="box-body">
                        <div class="form-group row">
                            <div class="col-xs-12">
                                <label for="email">Nome</label>
                                <input type="email" name="email" placeholder="E-mail" class="form-control"
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
<!--/.Incluir Professor-->


<!--Incluir Resposta-->
<div class="modal fade" id="answerModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Incluir Resposta</h4>
            </div>
            <form method="POST" action="{{route('course.question')}}" enctype="multipart/form-data">
                <div class="modal-body">
                    {{csrf_field()}}
                    <input type="hidden" name="course_id" value="">
                    <input type="hidden" name="answer" value="">
                    <div class="box-body">
                        <div class="form-group row">
                            <div class="col-xs-12">
                                <label for="email">Resposta</label>
                                <textarea name="question" placeholder="Resposta"
                                    class="form-control">{{old('question')}}</textarea>
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
<!--/.Incluir Resposta-->
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
            <form method="POST" action="{{route('user.course.include')}}" enctype="multipart/form-data">
                <div class="modal-body">
                    {{csrf_field()}}
                    <input type="hidden" name="id">
                    <div class="box-body">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="email">E-mail</label>
                                    <input type="text" name="email" placeholder="E-mail" class="form-control" id="email"
                                        value="{{old('email')}}">
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
            <form method="POST" action="{{route('user.loot')}}" enctype="multipart/form-data">
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

<<<<<<< HEAD
<div class="modal fade" id="textModalzin" >
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                                <h4 class="modal-title"><b>Em Manutenção</b></h4>
                                            </div>
                                            <div class="modal-body">
                                                <p>Caso você esteja acessando o site pelo celular, por favor, virar o celular na horizontal.</p>
                                            </div>
                                            <div class="modal-footer">
                                                <center><button type="button" class="btn btn-primary" id="confirm" data-dismiss="modal">Confirmar</button></center>
                                            </div>
                                        </div>
                                        <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                </div>

                                <!--Texto inicia curso-->
                                <div class="modal fade" id="textModal" >
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                                <h4 class="modal-title"><b>A Equipe Tabula te dá as boas-vindas ao curso!</b></h4>
                                            </div>
                                            <div class="modal-body">
                                                <p><b>Informações importantes</b></p><br>
=======
<div class="modal fade" id="textModalzin">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title"><b>Em Manutenção</b></h4>
            </div>
            <div class="modal-body">
                <p>Caso você esteja acessando o site pelo celular, por favor, virar o celular na horizontal.</p>
            </div>
            <div class="modal-footer">
                <center><button type="button" class="btn btn-primary" id="confirm"
                        data-dismiss="modal">Confirmar</button></center>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

>>>>>>> bd0b6a9ba0689ea823341035af470882ed3c7119

                                                <p><b>Observação :</b></p>
                                                O certififado desse curso é <b>GERADO AUTOMCATICAMENTE.</b><br>
                                                Para que isso aconteça o aluno deverá dar o um <b>"CHECK"</b> em Todas Aulas.<br>
                                                <br>
                                                <p><b>1</b>  Os cursos estão divididos em Seções e Aulas</p>
                                                <ul>
                                                    <li>As Seções dividem o curso nos tópicos mais relevantes</li>
                                                    <li>Nas Aulas você encontra o conteúdo, que pode ser composto por materiais de leitura, exercícios, e principalmente, vídeos</li>
                                                </ul>
                                                <p><b>2</b>  Ao terminar a aula, não se esqueça clicar na "bolinha" do lado do titulo da aula antes de passar para a próxima aula! Este passo é importante para a emissão do certificado</p>
                                                <p><b>3</b>  Em muitos casos, ao final de cada Seção ou ao final do Curso, há uma Avaliação para examinar o seu progresso. Lembre-se, uma vez iniciada a avaliação, é impossível pausá-la. Logo, somente comece a avaliação caso tenha o tempo necessário para finalizá-la</p>
                                                <p><b>4</b>  Com o intuito de criar um ambiente focado em compartilhamento de ideias, oferecemos um Fórum de Dúvidas e os Grupos de Discussão</p>
                                                <p><b>5</b>  Ao concluir o curso, o Tabula fornece um certificado, que estará disponível em seu perfil</p>
                                                <p><b>6</b>  A emissão do certificado é gerado automaticamente, exceto em casos de cursos que contenham  uma avaliação diseertativa, neste cenário o certificado sera gerado após a correção do professor.</p>
                                                <p>Para qualquer problema ou sugestões, estamos à disposição através do suporte@tabula.com.br</p>
                                            </div>
                                            <div class="modal-footer">
                                                <center><button type="button" class="btn btn-primary" id="confirm" data-dismiss="modal">Confirmar</button></center>
                                            </div>
                                        </div>
                                        <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                </div>
<!--Novo Cupom-->
<div class="modal fade" id="couponModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">Novo Cupom</h4>
            </div>
            <form method="POST" action="{{route('user.coupon.store')}}" enctype="multipart/form-data">
                <div class="modal-body">
                    {{csrf_field()}}

                    <div class="box-body">
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="type_discount">Tipo de desconto</label>
                                    <select class="form-control" id="type_discount" name="type_discount">
                                        <option selected disabled hidden>Escolha uma...</option>
                                        <option value="porcentagem" @if(old('type_discount')=='porcentagem' ) selected
                                            @endif>Desconto Porcentagem</option>
                                        <option value="dinheiro" @if(old('type_discount')=='dinheiro' ) selected @endif>
                                            Desconto Monetário</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="cod_coupon">Código cupom</label>
                                    <input name="cod_coupon" type="text" placeholder="Código cupom"
                                        class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="desc_coupon">Descrição cupom</label>
                                    <input name="desc_coupon" type="text" placeholder="Descrição cupom"
                                        class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="limit">Limite cupom</label>
                                    <input name="limit" type="text" placeholder="Limite cupom" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <label for="value_coupon">Valor cupom</label>
                                    <input name="value_coupon" type="text" placeholder="Valor cupom"
                                        class="form-control input-money">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12 course">
                                <div class="form-group">
                                    <label for="type_id">Curso</label>
                                    <select class="form-control multiple select2" style="width: 100%;" name="type_id[]"
                                        multiple="multiple">
                                        <option value='0'>- Digite o Curso -</option>
                                    </select>
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
<!--/.Novo Cupom-->
@yield('modals')