@extends('user.templates.default')

@section('title', 'Cursos')

@section('description', 'Descrição')

@section('content')

<section class="course-details">
  <div class="container">
    <div class="box-w-shadow">
      <div class="row">
        <div class="col-sm-6">
          <h2 class="course-category">{{$course->category->name}}</h2>
          <h1 class="course-name">{{$course->name}}</h1>
          <p>{{$course->star}}</p>
          <hr>
          <h4>Autor</h4>
          <p>{{$course->author->name}}</p>

          <h4>Descrição</h4>
          <p>{{$course->desc}}</p>
          <br>
            @if($hasCourse)
              <a href="{{route('course.class', ['id' => $course->id])}}">
                <button>Iniciar Curso</button>
              </a>
              <a href="#" class="act-rating" data-user_id="{{$auth->id}}" data-course_id="{{$course->id}}">
                <button>Avaliações</button>
              </a>
            @else
              <a href="{{route('cart.finish', ['id' => $course->id])}}">
                <button>Comprar</button>
              </a>
              <a href="{{route('cart.insert', ['id' => $course->id])}}">
                <button>Adicionar ao Carrinho</button>
              </a>
            @endif
        </div>
        <div class="col-sm-6">
          <img src="{{ asset('images/aulas')}}/{{$course->thumb_img}}" alt="Curso">
        </div>
      </div>
    </div>
    <div class="box-w-shadow">
      <div class="row"> 
        <div class="col-sm-7">
          <h3>Conteúdo</h3>
          @foreach($course->course_item_chapters as $chapter)
            <div class="row-chapter">
              <div class="row">
                <div class="col-xs-12">
                  <h4>{{substr($chapter->name, 0, 40)}}</h4>
                </div>
              </div>
            </div>
            @foreach($chapter->course_item as $item)
              @if($item->course_items_parent == NULL)
                @if($item->free_item == 1)
                <div class="row-item">
                  <div class="row">
                    <div class="col-xs-12">
                      <h5>{{$item->name}}</h5>
                      <a href="#" class="act-free-item" data-name="{{$item->name}}" data-desc="{{$item->desc}}" data-path="{{$item->path}}" data-type= "{{$item->course_item_types_id}}" data-url="{{asset('uploads/archives')}}">Vizualizar</a>
                    </div>
                  </div>
                </div>
                @else
                <div class="row-item">
                  <div class="row">
                    <div class="col-xs-12">
                      <h5>{{$item->name}}</h5>
                    </div>
                  </div>
                </div>
                @endif
              @endif
            @endforeach
          @endforeach 
        </div>
        <div class="col-sm-5">
          <h3>Requisitos</h3>
          <p>{{$course->requirements}}</p>
        </div>
      </div>
    </div>
    <div class="box-w-shadow">
      <h3>Avaliações</h3>
      @forelse($course->rating as $rating)
      <div class="row"> 
        <div class="col-xs-12">
          <p>{{$rating->pivot->star}}</p>
          <p>{{$rating->pivot->comment}}</p>
          <p><b>{{$rating->name}}</b></p>
          <hr>
        </div>
      </div>
      @empty
      <div class="row">
        <div class="col-xs-12">
          <p>Este curso nunca foi avaliado, seja o primeiro a dizer o que acha do curso.</p>
        </div>
      </div>
      @endforelse


    </div>
    @if(count($allCourses) != 0)
    <div class="box-w-shadow">
      <h3>Cursos relacionados</h3>
      <div class="container-carousel-courses">
        <button class="prev-carousel-courses"><i class="fa fa-chevron-left" aria-hidden="true"></i></button>
        <button class="next-carousel-courses"><i class="fa fa-chevron-right" aria-hidden="true"></i></button>
        <div class="carousel-courses">
          @forelse($allCourses as $recommended)
          <a href="{{route('course.single', ['urn' => $recommended->urn])}}">
              <div class="course-box">
                <div class="course-thumb">
                  <img src="{{ asset('images/aulas')}}/{{$recommended->thumb_img}}" alt="Curso">
                </div>
                <div class="course-desc">
                  <h3>{{substr($recommended->name,0, 14)}}</h3>
                  <p>{{substr($recommended->desc, 0, 55)}}</p>
                </div>
                <div class="course-value">
                  <span>R$ {{number_format($recommended->price, 2, ',', '.')}}</span>
                </div>
              </div>
          </a>
          @empty
          @endforelse
        </div>
      </div>
    </div>
    @endif
  </div>
</section>

@stop