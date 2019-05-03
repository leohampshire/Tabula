@extends('user.templates.default')

@section('title', 'Tabula')

@section('description', 'Descrição')

@section('content')

<section class="p-top">
	<div class="container">
		<div class="row">
			<div class="col-sm-3">
				<ul>
					<li>Categoria</li>
				</ul>
			</div>
			<div class="col-sm-9">
				<div class="row">
					<div class="col-sm-4">
						<div class="course-box">
							<div class="course-thumb">
								<img src="{{ asset('images/course.jpg')}}" alt="Curso">
							</div>
							<div class="course-desc">
								<h3>Título do curso</h3>
								<p>Descrição do curso</p>
							</div>
							<div class="course-value">
								<span>R$ 200,00</span>
							</div>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="course-box">
							<div class="course-thumb">
								<img src="{{ asset('images/course.jpg')}}" alt="Curso">
							</div>
							<div class="course-desc">
								<h3>Título do curso</h3>
								<p>Descrição do curso</p>
							</div>
							<div class="course-value">
								<span>R$ 200,00</span>
							</div>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="course-box">
							<div class="course-thumb">
								<img src="{{ asset('images/course.jpg')}}" alt="Curso">
							</div>
							<div class="course-desc">
								<h3>Título do curso</h3>
								<p>Descrição do curso</p>
							</div>
							<div class="course-value">
								<span>R$ 200,00</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

@stop