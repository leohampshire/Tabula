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
        <div class="col-sm-6">
          @foreach($course->course_item_chapters as $chapter)
            <h4>{{$chapter->name}}</h4>
            @foreach($chapter->course_item as $item)
              @if($item->course_items_parent == NULL)
                @if($item->free_item == 1)
                <a href="#" class="act-free-item" data-name="{{$item->name}}" data-desc="{{$item->desc}}" data-path="{{$item->path}}" data-type= "{{$item->course_item_types_id}}" data-url="{{asset('uploads/archives')}}">{{$item->name}}</a>
                @else
                <h5>{{$item->name}}</h5>
                @endif
              @endif
            @endforeach
          @endforeach 
        </div>

        <div class="col-sm-6">
          <a href="{{route('cart.finish', ['id' => $course->id])}}">
            <button>Comprar</button>
          </a>
          <a href="">
            <button>Avaliações</button>
          </a>
          <a href="">
            <button>Adicionar ao Carrinho</button>
          </a>
        </div>
     </div>
    </section>
  </div>

@stop