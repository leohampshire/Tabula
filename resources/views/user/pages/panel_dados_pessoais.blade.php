@extends('user.templates.default')

@section('title', 'Tabula')

@section('description', 'Descrição')

@section('content')

<section id="panel-header">
    <div class="container">
        <div class="box-w-shadow">
            <div class="row">
                <div class="col-xs-12">
                    <div class="user-thumb">
                        <img src="{{ asset('images/profile/')}}/{{$auth->avatar}}" alt="Perfil">
                    </div>
                    <div class="user-name">
                        <h1>{{$auth->name}}</h1>
                    </div>
                </div>
            </div>
        </div>
        @if($auth->courses->count() > 0 && $auth->databank == null)
        <!-- Main row -->
        <div class="row">
            <!-- Left col -->
            <section class="col-sm-12">
                <div class="alert alert-danger" style="margin-bottom: 0; margin-top: 25px; ">
                    Para que o seu curso fique disponível para compra, cadastre uma conta bancária, <a href="#"
                        class="data-bank" onclick="getDataBank();"> clicando aqui</a>
                </div>
            </section>
        </div>
        @endif
        <div class="box-w-shadow">
            <div class="container-scroll">
                <div class="container-buttons-panel">
                    <div class="box-button-panel">
                        <a href="#personal" class="personal" data-url="{{route('user.personal')}}">
                            <button class="btn-block btn-active btn-panel-menu" type="button">Dados pessoais</button>
                        </a>
                    </div>
                    <div class="box-button-panel">
                        <a href="#notification" class="notification" data-url="{{route('user.notification')}}">
                            <button class="btn-block btn-panel-menu" type="button">Notificações</button>
                        </a>
                    </div>
                    <div class="box-button-panel">
                        <a href="#my-course" class="my-course" data-url="{{route('user.my.course')}}">
                            <button class="btn-block btn-panel-menu" type="button">Meus cursos</button>
                        </a>
                    </div>
                    <div class="box-button-panel">
                        <a href="#orders" class="orders" data-url="{{route('user.orders')}}">
                            <button class="btn-block btn-panel-menu" type="button">Meus Pedidos</button>
                        </a>
                    </div>
                    <div class="box-button-panel">
                        <a href="#certificates" class="certificates" data-url="{{route('user.certificates')}}">
                            <button class="btn-block btn-panel-menu" type="button">Meus Certificados</button>
                        </a>
                    </div>
                    @if($auth->user_type_id == 3)
                    <div class="box-button-panel">
                        <a href="{{route('teacher.be')}}">
                            <button class="btn-block btn-panel-menu" type="button">Tornar-se professor</button>
                        </a>
                    </div>
                    @else
                    @if($auth->courses()->count() == 0)
                    <div class="box-button-panel">
                        <a href="#course-create" class="course-create" data-url="{{route('user.course.create')}}">
                            <button class="btn-block btn-panel-menu btn-danger" type="button">Criar Curso</button>
                        </a>
                    </div>
                    @else
                    <div class="box-button-panel">
                        <a href="#teach" class="teach" data-url="{{route('user.teach')}}">
                            <button class="btn-block btn-panel-menu" type="button">Cursos que leciono</button>
                        </a>
                    </div>
                    @endif


                    @endif
                    @if($auth->user_type_id == 5 || $auth->user_type_id == 4)
                    @if(isset($auth->databank))
                    <div class="box-button-panel">
                        <a href="#balance" class="balance" data-url="{{route('user.balance')}}">
                            <button class="btn-block btn-panel-menu" type="button">Saldo</button>
                        </a>
                    </div>
                    @endif
                    <div class="box-button-panel">
                        <a href="#coupons" class="coupons" data-url="{{route('user.coupon.index')}}">
                            <button class="btn-block btn-panel-menu" type="button">Cupons</button>
                        </a>
                    </div>

                    @endif
                    @if($auth->user_type_id == 5)
                    <div class="box-button-panel">
                        <a href="#my-teacher" class="my-teacher" data-url="{{route('user.teacher.index')}}">
                            <button class="btn-block btn-panel-menu" type="button">Professores </button>
                        </a>
                    </div>
                    @endif
                </div>
            </div>
        </div>
        <div id="content">

        </div>
    </div>
</section>

@stop
@section('scripts')
<script type="text/javascript">
$(document).on("click", '.usertest', function(event) {
    let url = $(this).data('url');
    getContent(url);
});
$(document).on("click", '.show-answer', function(event) {
    let url = $(this).data('url');
    getContent(url);
});
</script>
@endsection