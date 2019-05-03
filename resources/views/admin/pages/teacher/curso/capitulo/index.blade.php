
<form method="POST" action="{{route('teacher.course.chapter.store')}}">
  {{csrf_field()}}
    @isset($course)
      <input type="hidden" name="course_id" value="{{$course->id}}">
    @endisset

    <label for="name">Nome</label>
      <input type="text" name="name" placeholder="Nome" class="form-control" id="name" value="{{old('name')}}">
      <label for="desc">Descrição</label>
      <input type="text" name="desc" placeholder="Descrição" class="form-control" id="desc" value="{{old('desc')}}">
  <button type="submit" class="btn btn-primary">Confirmar</button>
</form>