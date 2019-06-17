@extends('user.templates.default')

@section('title', 'Tabula')

@section('description', 'Descrição')

@section('content')

<section id="teacher-questions">
	<div class="container">
		<div class="box-w-shadow">
			<div class="row">
				<div class="col-sm-12">
					<img style="width: 100px; position: absolute; bottom: 0;" src="{{asset('images/profile')}}/{{$teacher->avatar}}">
					<img height="200px" style="width: 100%; object-fit: cover;" src="{{asset('images/cover')}}/{{$teacher->cover}}">
				</div>
				<div class="col-sm-12">
					<nav class="navbar navbar-light bg-light " style="float: right;">
					  <a href="#about" class="navbar-brand scroll" >Sobre</a>
					  <a href="#courses" class="navbar-brand scroll" >Cursos</a>
					</nav>
				</div>
			</div>
			<hr id="courses">
			<div class="row" id="about">
				<div class="col-sm-12">
					<h1>Sobre {{$teacher->name}}</h1>
				</div>
				<div class="col-sm-12">
					<p>{{$teacher->bio}}</p>
				</div>
			</div>
			<hr>
				<?php
				//Columns must be a factor of 12 (1,2,3,4,6,12)
				$numOfCols = 4;
				$rowCount = 0;
				$bootstrapColWidth = 12 / $numOfCols;
				?>
				<div class="row">
					<div class="col-sm-12">
						<h1>Cursos {{$teacher->name}}</h1>
					</div>
				@forelse ($teacher->courses as $row)
					@if($row->avaliable == 2)
			        <div class="col-sm-<?php echo $bootstrapColWidth; ?>">
			        	<a href="{{route('course.single', ['urn' => $row->urn])}}">
				            <div class="course-box">
								<div class="course-thumb">
									<img src="{{ asset('images/aulas')}}/{{$row->thumb_img}}" alt="Curso">
								</div>
								<div class="course-desc">
									<h3>{{$row->name}}</h3>
									<p>{{substr($row->desc, 0, 50)}}</p>
								</div>
								<div class="course-value">
									<span>R$ {{number_format($row->price, 2, ',', '.')}}</span>
								</div>
							</div>
			        	</a>
			        </div>
			        @endif
				<?php
				    $rowCount++;
				    if($rowCount % $numOfCols == 0) echo '</div><div class="row">';
				?>
				@empty
				<div class="col-sm-12">
					<p>Não existem cursos para esta empresa</p>
					
				</div>
				@endforelse
			</div>
		</div>
	</div>
</section>

@stop