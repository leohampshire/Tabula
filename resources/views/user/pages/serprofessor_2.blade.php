@extends('user.templates.default')

@section('title', 'Tabula')

@section('description', 'Descrição')

@section('content')

<section id="teacher-questions">
	<div class="container">
		<div class="box-w-shadow">
			<div class="row">
				<div class="col-xs-10">
					<p>Queremos saber o seu nível de produção de conteúdo para que possamos, dependendo da sua resposta, te auxiliar com dicas e sugestões valiosas! Também podemos te assessorar em cada etapa do seu curso e na forma como você quer publicá-lo, como, por exemplo: gravar as aulas em uma sala com todos os equipamentos necessários; editar os vídeos da gravação e, até mesmo, fazer o serviço de marketing do seu curso.</p><br><br>
				</div>
			</div>
			<form action="{{route('teacher.store')}}" method="POST">
				{{csrf_field()}}
				<div class="row">
					<div class="col-xs-6">
						<p><b>Qual seu perfil de educador?</b></p>

						<input type="hidden" name="row" value="answer_second">
						<div class="radio">
						  <label>
						    <input type="radio" name="answer" value="1">
						    Sou iniciante
						  </label>
						</div>
						<div class="radio">
						  <label>
						    <input type="radio" name="answer" value="2">
						    Tenho certa experiencia no tema
						  </label>
						</div>
						<div class="radio">
						  <label>
						    <input type="radio" name="answer" value="3">
						    Tenho conteúdo Pronto
						  </label>
						</div>
						<button type="submit">Avançar</button>
						<a href="{{ route('teacher.delete', ['id' => 'answer_first']) }}">
							<button type="button" class="btn-back">Voltar</button>
						</a>
					</div>
					<div class="col-xs-6">
						<img src="{{ asset('images/img/tela2.png')}}" alt="Ser professor">
					</div>
				</div>
			</form>
		</div>
	</div>
</section>

@stop