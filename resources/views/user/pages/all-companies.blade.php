@extends('user.templates.default')

@section('title', 'Tabula')

@section('description', 'Descrição')

@section('content')

<section id="teacher-questions">
	<div class="container">
		<div class="box-w-shadow">
			<?php
				$numOfCols = 4;
				$rowCount = 0;
				$bootstrapColWidth = 12 / $numOfCols;
			?>
			<div class="row">
			@forelse ($companies as $row)
			        <div class="col-sm-<?php echo $bootstrapColWidth; ?>">
			        	<a href="{{route('company', ['id' => $row->id])}}">
				            <div class="course-box">
								<div class="course-thumb">
									<img src="{{ asset('images/profile')}}/{{$row->avatar}}" alt="Curso">
								</div>
								<div class="course-desc">
									<h3>{{$row->name}}</h3>
									<p>Cursos: {{count($row->courses)}}</p>
								</div>
							</div>
			        	</a>
			        </div>
			<?php
			    $rowCount++;
			    if($rowCount % $numOfCols == 0) echo '</div><div class="row">';
			?>
			@empty
			<div class="col-sm-12">
				Não existem Empresas matriculadas.
			</div>
			@endforelse
		</div>
			
		</div>
	</div>
</section>

@stop