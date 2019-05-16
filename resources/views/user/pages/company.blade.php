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
	
		</div>
			
		</div>
	</div>
</section>

@stop