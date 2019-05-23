<div class="box-title">
	<div class="row">
		<div class="col-xs-12">
			<h2>Cursos que leciono</h2>
		</div>
	</div>
</div>
<div class="row">
		
	<div class="col-sm-3">
		<a href="#" class="course-create" data-url="{{route('user.course.create')}}">
			<div class="add-course-box">
				<i class="fa fa-plus-circle" aria-hidden="true"></i>
			</div>
		</a>
	</div>
	@foreach($auth->courses as $course)
	<div class="col-sm-3">
		<div class="course-box">
			<div class="course-thumb">
				<img src="{{ asset('images/aulas')}}/{{$course->thumb_img}}" alt="Curso">
			</div>
			<div class="course-desc">
				<h3>{{$course->name}}</h3>
				<p>{{substr($course->desc, 0, 59)}}</p>
			</div>
			<div class="course-access">
				<a href="#" class="course-edit" data-url="{{route('user.course.edit', ['id' => $course->id])}}"><span>EDITAR</span></a>
				<a href="#" class="course-edit" data-url="{{route('user.course.edit', ['id' => $course->id])}}"><span>VISUALIZAR</span></a>		
				@if($course->avaliable == 1)
				<a href="{{route('user.course.avaliable', ['id' => $course->id])}}" class="act-avaliable"><span>DISPONIBILIZAR</span></a>		
				@endif	
				@if($auth->company_id != NULL)
					@if($course->company != 1)
					<a href="{{route('user.course.company', ['course' => $course->id])}}"><span>LIBERAR EMPRESA</span></a>
					@else	
					<a href="{{route('user.course.company', ['course' => $course->id])}}"><span>REMOVER EMPRESA</span></a>
					@endif
				@endif
			</div>
		</div>
	</div>
	@endforeach
	