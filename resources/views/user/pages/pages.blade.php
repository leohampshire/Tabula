@extends('user.templates.default')

@section('title', 'Tabula')

@section('description', 'Descrição')

@section('content')

<section id="teacher-questions">
	<div class="container">
		<div class="box-w-shadow">

			<div class="row">
				<div class="col-xs-12">
					<h1>{{$page->name}}</h1>
					<p>{{$page->desc}}</p>
				</div>
			</div>
			
		</div>
	</div>
</section>

@stop