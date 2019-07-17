@extends('user.templates.default')

@section('title', 'Tabula')

@section('description', 'Descrição')

@section('content')

<section id="teacher-questions">
    <div class="container">
        <div class="box-w-shadow">
            <div class="row">
                <div class="col-sm-10 col-xs-12">
                    <p>Bem-vindo, produtor de conteúdo! Gostaríamos de te conhecer melhor e saber em qual perfil
                        profissional você se encaixaria. Temos o intuito de te possibilitar uma experiência incrível e
                        um relacionamento longo e duradouro conosco.</p><br><br>
                </div>
            </div>
            <form action="{{route('teacher.store')}}" method="POST">
                {{csrf_field()}}
                <input type="hidden" name="row" value="answer_first">
                <div class="row">
                    <div class="col-sm-6 col-xs-12">
                        <p><b>Qual seu perfil de educador?</b></p>
                        <div class="radio">
                            <label>
                                <input type="radio" name="answer" value="1">
                                Trabalho na área de Educação.
                            </label>
                        </div>
                        <div class="radio">
                            <label>
                                <input type="radio" name="answer" value="2">
                                Sou Profissional de Mercado.
                            </label>
                        </div>
                        <div class="radio">
                            <label>
                                <input type="radio" name="answer" value="3">
                                Sou um Entusiasta
                            </label>
                        </div>
                        <button type="submit">Avançar</button>
                    </div>
                    <div class="col-sm-6 col-xs-12">
                        <img src="{{ asset('images/img/tela1.png')}}" alt="Ser professor">
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>

@stop