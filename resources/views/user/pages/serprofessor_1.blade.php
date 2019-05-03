@extends('user.templates.default')

@section('title', 'Tabula')

@section('description', 'Descrição')

@section('content')

<section id="teacher-questions">
	<div class="container">
		<div class="box-w-shadow">
			<div class="row">
				<div class="col-xs-10">
					<p>Bem-vindo, produtor de conteúdo! Gostaríamos de te conhecer melhor e saber em qual perfil profissional você se encaixaria. Temos o intuito de te possibilitar uma experiência incrível e um relacionamento longo e duradouro conosco.</p><br><br>
				</div>
			</div>
			<form>
				<div class="row">
					<div class="col-xs-6">
						<p><b>Qual seu perfil de educador?</b></p>
						<div class="radio">
						  <label>
						    <input type="radio" name="optionsRadios" value="teste">
						    Trabalho na área de Educação.
						  </label>
						</div>
						<div class="radio">
						  <label>
						    <input type="radio" name="optionsRadios" value="teste">
						    Sou Profissional de Mercado.
						  </label>
						</div>
						<div class="radio">
						  <label>
						    <input type="radio" name="optionsRadios" value="teste">
						    Sou um Entusiasta
						  </label>
						</div>
						<button type="submit">Avançar</button>
					</div>
					<div class="col-xs-6">
						<img src="{{ asset('images/img/tela1.png')}}" alt="Ser professor">
					</div>
				</div>
			</form>
		</div>
	</div>
</section>

@stop