@extends('user.templates.default')

@section('title', 'Tabula')

@section('description', 'Descrição')

@section('content')

<section id="teacher-questions">
	<div class="container">
		<div class="box-w-shadow">
			<div class="row">
				<div class="col-sm-12">
					<img height="200px" style="width: 100%; object-fit: cover;" src="{{asset('uploads/archives')}}/{{$post->cover}}">
				</div>
			</div>
		</div>
		<div class="box-w-shadow">
			<div class="row">
				<div class="col-sm-12">
					<?php echo $post->content; ?>
				</div>
			</div>
		</div>
	</div>
</section>

@stop