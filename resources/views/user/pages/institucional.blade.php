@extends('user.templates.default')

@section('title', 'Tabula')

@section('description', 'Descrição')

@section('content')

<section>
    <div class="container">
        <div class="box-w-shadow">

            <div class="row">
                <div class="col-xs-12">
                    <h2>O TABULA</h2>
                    <p>Tabula é um marketplace de curso online com foco em vídeo-aulas. Ou seja, somos uma plataforma
                        que permite que pessoas, professores ou não, compartilhem seus conhecimentos e sejam remuneradas
                        por isso. Além de proporcionar a plataforma de comercialização de cursos, também oferecemos aos
                        nossos usuários um ambiente de ensino a distância colaborativo e interativo.</p>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <h3>Como funciona ?</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-6">
                    <h4>PARA OS ALUNOS:</h4>
                    <p>
                        Somos uma plataforma que não possuí qualquer tipo de mensalidade. No Tabula você paga apenas
                        pelo
                        curso que assistir, o qual você poderá ver e rever quantas vezes quiser durante 6 meses.Para
                        garantir um melhor aprendizado, nós disponibilizamos diversas formas de interação seja com o
                        professor, seja entre os alunos.
                    </p>
                    <p>
                        Isto acontece através dos fóruns ou grupos privados de cada curso. Além disso, permitimos aos
                        professores melhorar o aprendizado dos seus alunos através de materiais complementares, tarefas
                        e avaliações.
                    </p>
                    <p>

                        Dado que qualquer pessoa pode ser tornar um professor em nossa plataforma, contamos com um
                        modelo de seleção de cursos rigoroso. Contamos ainda com um sistema de avaliação colaborativo
                        que permite classificar todos os cursos de acordo com as avaliações de outros usuários. Se tudo
                        isso falhar, entre contato conosco através do alunos@tabula.xyz!
                    </p>
                </div>
                <div class="col-xs-6">
                    <h4>PARA OS PROFESSORES:</h4>
                    <p>
                        Somos marketplace inovador que permite aos nossos colaboradores, não apenas ampliar o alcance de
                        alunos mas também ser remunerado de forma eficiente pelo conteúdo criado. Um de nossos
                        diferenciais é que não somos proprietários do seu conteúdo. Somos apenas a ferramenta que
                        permite a comercialização e a viabilização do seu curso.
                    </p>
                    <p>
                        Ao final, é você professor que tem a voz final sobre os aspectos mais relevantes do seu curso
                        como conteúdo, métodos de avaliação e política de preço. Ao final, 65% do faturamento total do
                        seu curso será SEU!
                    </p>
                    <p>
                        Comece agora mesmo clicando <a href="{{url('user/register')}}"> aqui</a>.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

@stop