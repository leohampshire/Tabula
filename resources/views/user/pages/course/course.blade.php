@extends('user.templates.default')

@section('title', 'Cursos')

@section('description', 'Descrição')

@section('content')

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="row">
        <div class="col-sm-6">
          <h1>Categoria: {{$course->category->name}}</h1>
          <h2>Curso: {{$course->name}}</h2>
          <h3>Autor: {{$course->author->name}}</h3>
        </div>
      </div>
      <div class="row"> 
        <div class="col-sm-12">
          @foreach($course->course_item_chapters as $chapter)
            <h4>{{$chapter->name}}</h4>
            @foreach($chapter->course_item as $item)
              @if($item->course_items_parent == NULL)
                <h5>{{$item->name}}</h5>
              @endif
            @endforeach
          @endforeach 
        </div>
     </div>
    </section>
  </div>

@stop