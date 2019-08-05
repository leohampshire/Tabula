@extends('user.templates.default')

@section('title', 'Tabula')

@section('description', 'Descrição')

@section('content')

<section class="container">
	<div class="row" >
		<div class="col-sm-8">
			<form action="{{route('course.question')}}" method="POST">
				{{csrf_field()}}
				<input type="hidden" name="course_id" value="{{$course->id}}">
				<div class="form-group row">
					<div class="col-sm-6">
						<label for="question">FAÇA UMA PERGUNTA</label>
						<input type="text" name="title" class="form-control" placeholder="Titulo">
						<textarea class="form-control" name="question" rows="5" placeholder="Pergunta"></textarea>
					</div>
					<div class="col-sm-6">
						<button type="submit">Enviar</button>
					</div>
				</div>
			</form>
		</div>
		<div class="col-sm-2">
			<a href="{{route('course.single', ['urn' => $course->urn])}}">
				<button type="button" class="btn-info">Voltar</button>
			</a>
		</div>
	</div>
	<div class="row">
		<div class="box-w-shadow">
			<div class="row">
				@forelse($course->question as $question)
					@if($question->answer == '')
					<div class="col-sm-12">
						<h2>{{$question->title}}</h2>
						<p><small>{{$question->user->name}}</small></p>
						<p>{{$question->question}}</p>
							<button type="button" class="btn-primary answers" onclick="seeAnswer({{$question->id}})" style="float: left; border: solid 1px #0b4b82; margin-right: 4px;">VER RESPOSTAS</button>
							<button type="button" class="btn-primary act-answer" data-course_id="{{$course->id}}" data-answer="{{$question->id}}" style="float: left; border: solid 1px #0b4b82;">RESPONDER</button>
					</div>
					<div class="row answer" id="{{$question->id}}">
						@forelse($question->forums as $answer)
						<div class="col-sm-12" >
							<p><b><small>{{$answer->user->name}}</small></b></p>
							<p>{{$answer->question}}</p>
						</div>
						@empty
						<div class="col-sm-6">
							<p>Ainda sem respostas, sejam o primeiro a responder</p>			
						</div>
						@endforelse
					</div>
					@endif
				@empty
				<div class="col-sm-6">
					<p>Não Existem perguntas para este curso</p>			
				</div>
				@endforelse
				
			</div>
		</div>
	</div>
</section>

@stop