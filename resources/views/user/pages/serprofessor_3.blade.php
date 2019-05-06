@extends('user.templates.default')

@section('title', 'Tabula')

@section('description', 'Descrição')

@section('content')

<section id="teacher-questions">
	<div class="container">
		<div class="box-w-shadow">
			<div class="row">
				<div class="col-xs-10">
					<p>Esta pergunta facilita o processo de criação de cupons para o seu curso e o ajuda a distribuí-los ao público ideal.</p><br><br>
				</div>
			</div>
			<form action="{{route('teacher.store')}}" method="POST">
				{{csrf_field()}}
				<div class="row">
					<div class="col-xs-6">
						<p><b>Já produziu um conteúdo online?</b></p>
						<input type="hidden" name="row" value="answer_third">
						<div class="radio">
						  <label>
						    <input type="radio" name="answer" value="1">
						    No momento não
						  </label>
						</div>
						<div class="radio">
						  <label>
						    <input type="radio" name="answer" value="2">
						    Possuo uma pequena Base de seguidores.
						  </label>
						</div>
						<div class="radio">
						  <label>
						    <input type="radio" name="answer" value="3">
						    Uma quantidade considerável de seguidores.
						  </label>
						</div>
						<button type="submit">Avançar</button>
						<a href="{{ route('teacher.delete', ['id' => 'answer_first']) }}">
							<button type="button" class="btn-back">Voltar</button>
						</a>
					</div>
					<div class="col-xs-6">
						<img src="{{ asset('images/img/tela3.png')}}" alt="Ser professor">
					</div>
				</div>
			</form>
		</div>
	</div>
</section>

@stop