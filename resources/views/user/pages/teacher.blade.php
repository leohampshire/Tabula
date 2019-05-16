@extends('user.templates.default')

@section('title', 'Tabula')

@section('description', 'Descrição')

@section('content')

<section id="teacher-questions">
	<div class="container">
		<div class="box-w-shadow">
			
			<?php
		//Columns must be a factor of 12 (1,2,3,4,6,12)
		$numOfCols = 4;
		$rowCount = 0;
		$bootstrapColWidth = 12 / $numOfCols;
		?>
		<div class="row">
		@forelse ($teacher->courses as $row)
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
						</div>
		        	</a>
		        </div>
		<?php
		    $rowCount++;
		    if($rowCount % $numOfCols == 0) echo '</div><div class="row">';
		?>
		@empty
		<div class="col-sm-12">
			Não existem cursos nesta categoria.
		</div>
		@endforelse
		</div>
			
		</div>
	</div>
</section>

@stop