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
				<img src="{{ asset('images/course.jpg')}}" alt="Curso">
			</div>
			<div class="course-desc">
				<h3>{{$course->name}}</h3>
				<p>{{substr($course->desc, 0, 100)}}</p>
			</div>
			<div class="course-access">
									
				<a href="#" class="course-edit" data-url="{{route('user.course.edit', ['id' => $course->id])}}"><span>EDITAR</span></a>
			</div>
		</div>
	</div>
	@endforeach
	