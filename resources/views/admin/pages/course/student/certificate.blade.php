<!DOCTYPE html>
<html>
<head>
	<title>Certificado</title>

	<link href="https://fonts.googleapis.com/css?family=Crimson+Text:400,600,700" rel="stylesheet">

<style type="text/css">
	.certificate{
		background: url('{{asset('images/img/certificado.jpg')}}');
		background-size: 100% 100%;
		height: 100%;
		padding: 20px 50px;
		font-family: 'Crimson Text', serif;
	}

	.content{
		width: 650px;
	}

	h1#universidade{
		margin-top: 20px;
		color: #d6eaf9;
		font-size: 40px;
	}

	p#data{
		font-weight: 400;
		font-size: 20px;
	}

	h2.course-name{
		font-size: 25px;
	}

	p.completo{
		font-weight: 400;
		font-size: 21px;
	}

	.hr{
		margin-top: 200px;
		border-top: 1px solid #ccc;
		width: 210px;
	}

	p#teacher{
		font-size: 13px;
		font-weight: 600;
	}
</style>

</head>
<body>
	<div class="certificate">
		<div class="content">
			@if($teacher->company != NULL)
			<h1 id="universidade"> {{$teacher->company->company->name}} </h1>
			@endif
			<?php
            setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
            date_default_timezone_set('America/Sao_Paulo');
            ?>
			<p id="data">{{strftime('%d de %B de %Y', strtotime($date))}}</p>
			<h2 class="course-name">{{$student->name}}</h2>
			<p class="completo">Completou o curso online de</p>
			<h2 class="course-name">{{$course->name}}</h2>
			<p class="completo">de @if($hour != NULL) {{$hour}} hora(s) @endif @if($minute != NULL) e {{$minute}} minuto(s)@endif, autorizado pelo professor {{$teacher->name}} @if($teacher->company != NULL), da {{$teacher->company->company->name}} @endif e oferecido pelo Tabula. </p>

			<div class="hr"></div>
			<p id="teacher">{{$teacher->name}}</p>
		</div>
	</div>
</body>
</html>