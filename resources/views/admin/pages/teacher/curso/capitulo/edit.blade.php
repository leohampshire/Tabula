
<form method="POST" action="{{route('teacher.course.chapter.update')}}">
  {{csrf_field()}}
      <input type="hidden" name="id" value="{{$chapter->id}}">

    <label for="name">Nome</label>
      <input type="text" name="name" placeholder="Nome" class="form-control" id="name" value="{{$chapter->name}}">
      <label for="desc">Descrição</label>
      <input type="text" name="desc" placeholder="Descrição" class="form-control" id="desc" value="{{$chapter->desc}}">
  <button type="submit" class="btn btn-primary">Confirmar</button>
</form>