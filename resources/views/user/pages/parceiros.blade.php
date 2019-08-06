@extends('user.templates.default')

@section('title', 'Tabula')

@section('description', 'Descrição')

@section('content')

<section>
    <div class="container">
        <div class="box-w-shadow">
            <div class="row">
                <div class="col-xs-4">
                    <img src="{{asset('images/img/Saint-Paul.jpg')}}" alt="">
                </div>
                <div class="col-xs-8">
                    <h4>Saint Paul Escola de Negócios</h4>
                    <p>
                        A Saint Paul Escola de Negócios é uma das principais empresas de soluções em treinamento na área
                        de finanças e negócios do país, com milhares de executivos habilitados por ano. Entre o seleto
                        grupo das 70 instituições presentes no ranking, estamos na 59.ª posição ao lado de consagradas
                        escolas de negócio como Harvard, Columbia e Stanford. Somos a 6.ª melhor da América Latina e
                        estamos entre as quatro melhores do Brasil. Nossos cursos são concentrados em diversas áreas de
                        conhecimento, como finanças, controladoria, contabilidade, gestão de projetos, gestão
                        empresarial e outras no campo dos negócios. Escolhida para capacitar os executivos das maiores
                        empresas e bancos que atuam no Brasil, a Saint Paul Escola de Negócios, possui um corpo docente
                        com mais de 250 professores de excelente titulação, didática e experiência prática nos temas
                        ministrados. A Saint Paul Escola de Negócios está dividida em quatro grandes áreas: cursos
                        abertos, cursos in company, pós-graduação, e consultoria educacional.
                    </p>
                    <p> <a href="http://www.saintpaul.com.br/default.aspx" target="_blank"> [Ir para o site]</a></p>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-4">
                    <img src="{{asset('images/img/academia-de-varejo-logo.png')}}" alt="">
                </div>
                <div class="col-xs-8">
                    <h4>Academia de Varejo</h4>
                    <p>
                        A Academia de Varejo foca no aprendizado do participante e na aplicação prática do conteúdo
                        apresentado. Privilegiamos a aula presencial, mas combinamos com outros formatos, como estudos
                        de casos, pre-work, pílulas do conhecimento, ensino a distância, visitas a campo, trabalhos em
                        equipe, role-playing, viagens internacionais, aulas filmadas, etc. como formatos assessórios
                        para uma melhor experiência de aprendizagem. As aulas podem ser no cliente, ou na nossa sede na
                        região da Av. Paulista. Com a proposta de treinar e desenvolver competências técnicas e
                        gerenciais, a UBS Escola de Negócios propõe ao mercado um novo conceito em escola de negócios,
                        oferecendo programas personalizados e com o fomento da troca de ideia.
                    </p>
                    <p><a href="http://ubs.edu.br/academia-de-varejo" target="_blank"> [Ir para o site]</a></p>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-4">
                    <img src="{{asset('images/img/logo-ibevar.jpg')}}" alt="">
                </div>
                <div class="col-xs-8">
                    <h4>IBEVAR</h4>
                    <p>
                        O Instituto Brasileiro de Executivos de Varejo & Mercado de Consumo é uma instituição sem fins
                        lucrativos. Foi fundado em Dezembro de 2009, em São Paulo, por um grupo de profissionais ligados
                        ao setor varejista com o objetivo de estabelecer grupos de discussão, relacionamento e
                        conhecimento a respeito deste mercado
                        “Nossa missão é ser uma Instituição que congregue executivo(a)s de varejo, indústria e serviços,
                        promovendo relacionamento profissional e social aos executivos que atuam – direta e
                        indiretamente – no mercado de varejo e consumo no Brasil”.
                    </p>
                    <p> <a href="https://www.ibevar.org.br/" target="_blank">[Ir para o site]</a></p>
                </div>
            </div>
        </div>
    </div>
</section>

@stop