<a href="{{route('teacher.course.create')}}">	
	<button>Criar Curso</button>
</a>
<br>
<br>
@forelse($courses as $course)
<a href="{{route('teacher.course.edit', ['id' => $course->id])}}">	
	<button>Editar Curso</button>
</a>
<br>
@empty
nao tem curso
@endforelse