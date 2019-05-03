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
			<form>
				<div class="row">
					<div class="col-xs-6">
						<p><b>Qual seu perfil de educador?</b></p>
						<div class="radio">
						  <label>
						    <input type="radio" name="optionsRadios" value="teste">
						    Sou iniciante
						  </label>
						</div>
						<div class="radio">
						  <label>
						    <input type="radio" name="optionsRadios" value="teste">
						    Tenho certa experiencia no tema
						  </label>
						</div>
						<div class="radio">
						  <label>
						    <input type="radio" name="optionsRadios" value="teste">
						    Tenho conteúdo Pronto
						  </label>
						</div>
						<button type="submit">Avançar</button>
						<button type="button" class="btn-back">Voltar</button>
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