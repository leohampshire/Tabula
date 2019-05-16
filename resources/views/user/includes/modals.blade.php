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
                    <input type="text" name="name" placeholder="Nome" class="form-control" id="name" value="{{old('name')}}">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-xs-12">
                    <label for="desc">Descrição</label>
                    <input type="text" name="desc" placeholder="Descrição" class="form-control" id="desc" value="{{old('desc')}}">
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
                    <input type="text" name="name" placeholder="Nome" class="form-control" id="name" value="{{old('name')}}">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-xs-12">
                    <label for="desc">Descrição</label>
                    <input type="text" name="desc" placeholder="Descrição" class="form-control" id="desc" value="{{old('desc')}}">
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
                    <label for="item_type_id" >Tipo de Aula</label>
                    <select class="form-control item_type_id" name="item_type_id">
                      <option selected disabled="">SELECIONE...</option>
                      @isset($item_types)
                        @foreach($item_types as $item)
                          @if($item->id < 5)
                          <option value="{{$item->id}}" @if($item->id == old('item_type_id')) selected @endif>{{$item->name}}</option>
                          @endif
                        @endforeach
                      @endisset
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-xs-12">
                    <label for="name">Nome</label>
                    <input type="text" name="name" placeholder="Nome" class="form-control" id="name" value="{{old('name')}}">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-xs-12">
                    <label for="desc">Descrição</label>
                    <textarea class="form-control" rows="4" placeholder="Descrição" id="desc" name="desc">{{old('desc')}}</textarea>
                    
                  </div>
                </div>
                <div class="form-group row file">
                  <div class="col-xs-12">
                    <label for="file">Arquivo</label>
                    <input class="form-control" type="file" name="file">
                    <div class="col-xs-12">
                      <label for="vimeo"><input type="checkbox" id="vimeo" name="vimeo"> Upload Vimeo</label>
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
      <form method="POST" action="{{route('teacher.course.item.update')}}" enctype="multipart/form-data">
          <div class="modal-body">
              {{csrf_field()}}
                <input type="hidden" name="chapter_id" value="">
                <input type="hidden" name="course_id" value="">
              <div class="box-body">
                <div class="form-group row">
                  <div class="col-xs-12">
                    <label for="item_type_id" >Tipo de Aula</label>
                    <select class="form-control item_type_id" name="item_type_id">
                      <option selected disabled="">SELECIONE...</option>
                      @isset($item_types)
                        @foreach($item_types as $item)
                          @if($item->id < 5)
                          <option value="{{$item->id}}" @if($item->id == old('item_type_id')) selected @endif>{{$item->name}}</option>
                          @endif
                        @endforeach
                      @endisset
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-xs-12">
                    <label for="name">Nome</label>
                    <input type="text" name="name" placeholder="Nome" class="form-control" id="name" value="{{old('name')}}">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-xs-12">
                    <label for="desc">Descrição</label>
                    <textarea class="form-control" rows="4" placeholder="Descrição" id="desc" name="desc">{{old('desc')}}</textarea>
                    
                  </div>
                </div>
                <div class="file">
                  <div class="form-group row">
                    <div class="col-xs-12">
                      <label for="file">Arquivo</label>
                      <input class="form-control" type="file" name="file">
                      <div class="col-xs-12">
                        <label for="vimeo"><input type="checkbox" id="vimeo" name="vimeo"> Upload Vimeo</label>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-xs-12 path">
                        
                      </div>
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
                    <input type="text" name="name" placeholder="Nome" class="form-control" id="name" value="{{old('name')}}">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-xs-12">
                    <label for="desc">Descrição</label>
                    <textarea class="form-control" rows="4" placeholder="Descrição" id="desc" name="desc">{{old('desc')}}</textarea>
                    
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
                    <input type="text" name="name" placeholder="Nome" class="form-control" id="name" value="{{old('name')}}">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-xs-12">
                    <label for="desc">Descrição</label>
                    <textarea class="form-control" rows="4" placeholder="Descrição" id="desc" name="desc">{{old('desc')}}</textarea>
                    
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
                    <input type="text" name="name" placeholder="Nome" class="form-control" id="name" value="{{old('name')}}">
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-xs-12">
                    <label for="desc">Descrição</label>
                    <textarea class="form-control" rows="4" placeholder="Descrição" id="desc" name="desc">{{old('desc')}}</textarea>
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
              @isset($item_parent)
                <input type="hidden" name="item_parent" value="{{$item_parent->id}}">
              @endisset
              <div class="box-body">
                <div class="form-group row">
                  <div class="col-xs-12">
                    <label for="item_type_id" >Tipo de Pergunta</label>
                    <select class="form-control item_type_id" name="item_type_id">
                      <option selected disabled="">SELECIONE...</option>
                      @isset($item_types)
                        @foreach($item_types as $item)
                          @if($item->id > 6)
                          <option value="{{$item->id}}" @if($item->id == old('item_type_id')) selected @endif>{{$item->name}}</option>
                          @endif
                        @endforeach
                      @endisset
                    </select>
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-xs-12">
                    <label for="name">Pergunta</label>
                    <input type="text" name="name" placeholder="Pergunta" class="form-control" id="name" value="{{old('name')}}">
                  </div>
                </div>
                <div class="form-group row dissertative">
                  <div class="col-xs-12">
                    <label for="desc">Dissertativa</label>
                    <textarea class="form-control" rows="4" placeholder="Descrição" id="desc" name="desc">{{old('desc')}}</textarea>
                  </div>
                </div>
                <div class="form-group row alternative">
                  <div class="col-xs-12">
                    <label for="desc">Alternativas</label>
                    <div class="col-lg-12">
                      <div class="input-group">
                            <span class="input-group-addon">
                              <input type="radio" name="verdadeira" value="0">
                            </span>
                        <input type="text" class="form-control" name="afirma[]">
                      </div>
                      <!-- /input-group -->
                    </div>
                    <div class="col-lg-12">
                      <div class="input-group">
                            <span class="input-group-addon">
                              <input type="radio" name="verdadeira" value="1">
                            </span>
                        <input type="text" class="form-control" name="afirma[]">
                      </div>
                      <!-- /input-group -->
                    </div>
                    <div class="col-lg-12">
                      <div class="input-group">
                            <span class="input-group-addon">
                              <input type="radio" name="verdadeira" value="2">
                            </span>
                        <input type="text" class="form-control" name="afirma[]">
                      </div>
                      <!-- /input-group -->
                    </div>
                    <div class="col-lg-12">
                      <div class="input-group">
                            <span class="input-group-addon">
                              <input type="radio" name="verdadeira" value="3">
                            </span>
                        <input type="text" class="form-control" name="afirma[]">
                      </div>
                      <!-- /input-group -->
                    </div>
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
                <div class="form-group row truefalse">
                  <div class="col-xs-12">
                    <label for="desc">Verdadeiro ou Falso:</label>
                    <label class="radio-inline"><input type="radio" name="trueFalse" value="1">Verdadeira</label>
                    <label class="radio-inline"><input type="radio" name="trueFalse" value="0">Falsa</label>
                  </div>
                </div>
                <div class="form-group row multiple">
                  <div class="col-xs-12">
                    <label for="verdadeira">Multipla Escolha</label><br>
                    <div class="col-lg-12">
                      <div class="input-group">
                            <span class="input-group-addon">
                              <input type="checkbox" name = "verdadeira[]" value="0">
                            </span>
                        <input type="text" name="afirmacao[]" class="form-control">
                      </div>
                      <!-- /input-group -->
                    </div>
                    <div class="col-lg-12">
                      <div class="input-group">
                            <span class="input-group-addon">
                              <input type="checkbox" name = "verdadeira[]" value="1">
                            </span>
                        <input type="text" name="afirmacao[]" class="form-control">
                      </div>
                      <!-- /input-group -->
                    </div>
                    <div class="col-lg-12">
                      <div class="input-group">
                            <span class="input-group-addon">
                              <input type="checkbox" name = "verdadeira[]" value="2">
                            </span>
                        <input type="text" name="afirmacao[]" class="form-control">
                      </div>
                      <!-- /input-group -->
                    </div>
                    <div class="col-lg-12">
                      <div class="input-group">
                            <span class="input-group-addon">
                              <input type="checkbox" name = "verdadeira[]" value="3">
                            </span>
                        <input type="text" name="afirmacao[]" class="form-control">
                      </div>
                      <!-- /input-group -->
                    </div>
                    <div class="col-lg-12">
                      <div class="input-group">
                            <span class="input-group-addon">
                              <input type="checkbox" name = "verdadeira[]" value="4">
                            </span>
                        <input type="text" name="afirmacao[]" class="form-control">
                      </div>
                      <!-- /input-group -->
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
          <h4 class="modal-title">Novo Item</h4>
        </div>
      </div>
          <div class="modal-body">
              <div class="desc"></div>
              <div class="conteudo"></div>
              <div class="path"></div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default pull-left stop" data-dismiss="modal" >Cancelar</button>
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

                      <a href="javascript:void(0)" onclick="avaliar(1)">
                      <img src="{{asset('images/img/star0.png')}}" id="s1"></a>

                      <a href="javascript:void(0)" onclick="avaliar(2)">
                      <img src="{{asset('images/img/star0.png')}}" id="s2"></a>

                      <a href="javascript:void(0)" onclick="avaliar(3)">
                      <img src="{{asset('images/img/star0.png')}}" id="s3"></a>

                      <a href="javascript:void(0)" onclick="avaliar(4)">
                      <img src="{{asset('images/img/star0.png')}}" id="s4"></a>

                      <a href="javascript:void(0)" onclick="avaliar(5)">
                      <img src="{{asset('images/img/star0.png')}}" id="s5"></a>
                      <p id="rating">0</p>
                      <input type="hidden" name="user_id" value="">
                      <input type="hidden" name="course_id" value="">
                      <input type="hidden" name="star" id="ratings" value="">
                    </div>
                  </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default pull-left stop" data-dismiss="modal" >Cancelar</button>
              <button type="submit" class="btn btn-primary" >Confirmar</button>
            </div>
          </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!--/.Aula gratis-->

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
                    <input type="email" name="email" placeholder="E-mail" class="form-control" id="name" value="{{old('email')}}">
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