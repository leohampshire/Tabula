@extends('user.templates.class')

@section('title', 'Tabula')

@section('description', 'Descrição')

@section('content')

<section class="class-container">
    <div class="class-menu">
        @foreach($course->course_item_chapters as $chapter)

        <div class="class-chapter">
            <p class="active"><i class="fa fa-chevron-circle-right" aria-hidden="true"></i> {{$chapter->name}} cade</p>
        </div>

        <div class="class-items">
            @foreach($chapter->course_item as $key => $item)
            @if($item->course_items_parent == null)
            @if($item->course_item_types_id == 5)
            <a href="{{asset('uploads/archives')}}/{{$item->path}}" download="{{$item->name}}" class="btn-class-item">
                <div class="class-item class-item-complementar">
                    <p>{{$item->name}}</p>
                </div>
            </a>
            @else
            <a href="#" class="btn-class-item" data-item="{{$item->id}}" data-key="{{$key}}"
                data-url="{{route('course.getclass')}}">
                <div class="class-item">
                    <p id="{{$item->id}}">@if(strlen($item->name) > 50){{substr($item->name, 0,50)}}... @else
                        {{$item->name}}@endif</p>
                    <input id="{{$chapter->id}}-{{$item->id}}" class="check-class" data-user_id="{{$auth->id}}"
                        data-url="{{route('course.checked')}}" data-course_id="{{$course->id}}" type="checkbox"
                        name="check" @if($item->item_checked()->where('user_id', $auth->id)->first() &&
                    $item->item_checked()->where('user_id', $auth->id)->first()->pivot->course_item_status_id == 1)
                    checked @endif>

                    <label for="{{$chapter->id}}-{{$item->id}}" class="label-check-class"></label>
                </div>
            </a>
            @endif
            @endif
            @endforeach
        </div>
        @endforeach

    </div>

    <div class="class-content" id="content">
    </div>
</section>

@stop
@section('scripts')
@if($progress == 0)
<script type="text/javascript">
$(document).ready(function() {
    $('#textModal').modal('show');
});
</script>

@endif
@if(session()->has('send'))
<script type="text/javascript">
$(document).ready(function() {
    $('#successModal').modal('show');
});
</script>
@endisset
@endsection

<script type="text/javascript">
function getContent(item, url) {
    $.ajax({
        url: url,
        type: 'GET',
        data: {
            item: item,
        },
        beforeSend: function() {
            $('#content').html('<h1>Carregando...</h1>');
        },
        success: function(data) {
            $('#content').html(data);
            afterglow.getPlayer('teste');

        },
        error: function(e) {
            console.log(e);
        }
    });
}


function checkedClassAjax(url, class_id, user_id, course_id) {
    $.ajax({
        type: 'POST',
        url: url,
        data: {
            class_id: class_id,
            user_id: user_id,
            course_id: course_id,
        },
        beforeSend: function() {},
        success: function(data) {
            var result = JSON.parse(data);
            if (result == 'true') {
                window.location.href = "{{route('user.panel')}}?course=completed#certificates";
            }
        }
    });
}
</script>


@section('modals')
<!--Texto inicia curso-->
<div class="modal fade" id="textModal">
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

                <p><b>Observação :</b></p>
                O certififado desse curso é <b>GERADO AUTOMCATICAMENTE.</b><br>
                Para que isso aconteça o aluno deverá dar o um <b>"CHECK"</b> em Todas Aulas.<br>
                <br>
                <p><b>1</b> Os cursos estão divididos em Seções e Aulas</p>
                <ul>
                    <li>As Seções dividem o curso nos tópicos mais relevantes</li>
                    <li>Nas Aulas você encontra o conteúdo, que pode ser composto por materiais de leitura, exercícios,
                        e principalmente, vídeos</li>
                </ul>
                <p><b>2</b> Ao terminar a aula, não se esqueça clicar na "bolinha" do lado do titulo da aula antes de
                    passar para a próxima aula! Este passo é importante para a emissão do certificado</p>
                <p><b>3</b> Em muitos casos, ao final de cada Seção ou ao final do Curso, há uma Avaliação para examinar
                    o seu progresso. Lembre-se, uma vez iniciada a avaliação, é impossível pausá-la. Logo, somente
                    comece a avaliação caso tenha o tempo necessário para finalizá-la</p>
                <p><b>4</b> Com o intuito de criar um ambiente focado em compartilhamento de ideias, oferecemos um Fórum
                    de Dúvidas e os Grupos de Discussão</p>
                <p><b>5</b> Ao concluir o curso, o Tabula fornece um certificado, que estará disponível em seu perfil
                </p>
                <p><b>6</b> A emissão do certificado é gerado automaticamente, exceto em casos de cursos que contenham
                    uma avaliação diseertativa, neste cenário o certificado sera gerado após a correção do professor.
                </p>
                <p>Para qualquer problema ou sugestões, estamos à disposição através do suporte@tabula.com.br</p>
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
<!--/.Texto inicia curso-->
<!-- Modal de Sucesso -->
<div class="modal fade" id="successModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title"><b>Prova Enviada</b></h4>
            </div>
            <div class="modal-body">
                <p>Sua prova foi enviada com sucesso, cheque a sua aula e prossiga com o conteúdo</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="confirm" data-dismiss="modal">Confirmar</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.Modal de Sucesso -->
@endsection