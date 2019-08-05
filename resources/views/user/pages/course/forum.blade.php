@extends('user.templates.default')

@section('title', 'Tabula')

@section('description', 'Descrição')

@section('content')

<section class="container">
	<div class="box-w-shadow">
		<div class="row">
			<div class="col-sm-8">
				<form action="{{route('course.question')}}" method="POST">
					{{csrf_field()}}
					<input type="hidden" name="course_id" value="{{$course->id}}">
					<div class="row">
						<div class="col-sm-6">
							<div class="form-group">
								<label for="question">Faça uma pergunta</label>
								<input type="text" name="title" class="form-control" placeholder="Titulo">
							</div>
							<div class="form-group">
								<textarea class="form-control" name="question" rows="5" placeholder="Pergunta"></textarea>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-6">
							<div class="form-group">
								<button type="submit">Enviar</button>
								<a href="{{route('course.single', ['urn' => $course->urn])}}">
									<button type="button" class="btn-default">Voltar</button>
								</a>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	<div class="box-w-shadow">
		<div class="row">
			@forelse($course->question as $question)
				@if($question->answer == '')
				<div class="col-xs-12">
					<h2>{{$question->title}}</h2>
					<p><b><small>{{$question->user->name}}</small></b></p>
					<p>{{$question->question}}</p>
						<button type="button" class="btn-primary answers" onclick="seeAnswer({{$question->id}})" style="float: left; border: solid 1px #0b4b82; margin-right: 4px; margin-top: 10px;">VER RESPOSTAS</button>
						<button type="button" class="btn-primary act-answer" data-course_id="{{$course->id}}" data-answer="{{$question->id}}" style="float: left; border: solid 1px #0b4b82; margin-top: 10px;">RESPONDER</button>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-12">
					<div class="row answer" id="{{$question->id}}">
						@forelse($question->forums as $answer)
						<div class="col-xs-12" >
							<p><b><small>{{$answer->user->name}}</small></b></p>
							<p>{{$answer->question}}</p>
						</div>
						@empty
						<div class="col-xs-12">
							<p>Ainda sem respostas, sejam o primeiro a responder</p>			
						</div>
						@endforelse
					</div>
				</div>
				@endif
			@empty
			<div class="col-sm-6">
				<p>Não Existem perguntas para este curso</p>			
			</div>
			@endforelse
			
		</div>
	</div>
</section>

@stop