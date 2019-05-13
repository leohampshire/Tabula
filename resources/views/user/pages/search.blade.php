@extends('user.templates.default')

@section('title', 'Tabula')

@section('description', 'Descrição')

@section('content')

<section class="p-top">
	<div class="container">
		<div class="row">
			<div class="col-sm-3">
				<ul>
					@forelse($categories as $category)
					<li>{{$category->name}}</li>
					@empty
					@endforelse
				</ul>
			</div>
			<div class="col-sm-9">
				<div class="row">   
                    @forelse($courses as $course)    
                    	@if($course->avaliable == 2)
                    	<a href="{{route('course.single', ['id' => $course->urn])}}">
							<div class="col-sm-4">
								<div class="course-box">
									<div class="course-thumb">
										<img src="{{ asset('images/aulas')}}/{{$course->thumb_img}}" alt="Curso">
									</div>
									<div class="course-desc">
										<h3>{{$course->name}}</h3>
										<p>{{substr($course->desc, 0, 50)}}</p>
									</div>
									<div class="course-value">
										<span>R$ {{number_format($course->price, 2, ',', '.')}}</span>
									</div>
								</div>
							</div>
                    	</a>       
						@endif
					@empty
					<div class="col-sm-6">
						Não existem cursos das opções selecionadas.
					</div>
					@endforelse
					
				</div>
			</div>
		</div>
	</div>
</section>

@stop