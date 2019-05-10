<div class="box-title">
	<div class="row">
		<div class="col-xs-12">
			<h2>Meus cursos</h2>
		</div>
	</div>
</div>
<div class="row">
	@forelse($courses as $myCourse)
	<div class="col-sm-3">
		<div class="course-box">
			<div class="course-thumb">
				<img src="{{ asset('images/course.jpg')}}" alt="Curso">
			</div>
			<div class="course-desc">
				<h3>{{$myCourse->name}}</h3>
				<p>{{substr($myCourse->desc, 0, 30)}}</p>
			</div>
			<div class="course-access">
				<a href="{{route('course.single', ['urn' =>$myCourse->urn])}}"><span>ACESSAR</span></a>
			</div>
		</div>
	</div>
	@empty
	<div class="col-xs-12">
		<p>Não possui nenhum curso</p>
	</div>
	@endforelse
	
</div>