<div class="box-w-shadow">

	<div class="box-title">
		<div class="row">
			<div class="col-xs-12">
				<h2>Meus cursos</h2>
			</div>
		</div>
	</div>
	<div class="row">
		@forelse($courses as $myCourse)
		<a href="{{route('course.single', ['urn' =>$myCourse->urn])}}">
			<div class="col-sm-3">
				<div class="course-box">
					<div class="course-thumb">
						<img src="{{ asset('images/aulas')}}/{{$myCourse->thumb_img}}" alt="Curso">
					</div>
					<div class="course-desc">
						<h3>{{$myCourse->name}}</h3>
						<p>{{substr($myCourse->desc, 0, 30)}}</p>
					</div>
					<div class="course-access">
						<span>ACESSAR</span>
					</div>
				</div>
			</div>
		</a>
		@empty
		<div class="col-xs-12">
			<p>Não possui nenhum curso</p>
		</div>
		@endforelse
	</div>
</div>