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
          <hr>
          <h4>Autor</h4>
          <p>{{$course->author->name}}</p>

          <h4>Descrição</h4>
          <p>{{$course->desc}}</p>
          <br>
          @if($hasCourse)
            <a href="#">
              <button>Iniciar Curso</button>
            </a>
          @else
            <a href="{{route('cart.finish', ['id' => $course->id])}}">
              <button>Comprar</button>
            </a>
            <a href="{{route('cart.insert', ['id' => $course->id])}}">
              <button>Adicionar ao Carrinho</button>
            </a>
          @endif
          <a href="">
            <button>Avaliações</button>
          </a>
        </div>
        <div class="col-sm-6">
          <img src="{{ asset('images/course.jpg')}}" alt="Curso">
        </div>
      </div>
    </div>
    <div class="box-w-shadow">
      <div class="row"> 
        <div class="col-sm-6">
          <h3>Conteúdo</h3>
          @foreach($course->course_item_chapters as $chapter)
            <div class="row-chapter">
              <div class="row">
                <div class="col-xs-12">
                  <h4>{{$chapter->name}}</h4>
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
        <div class="col-sm-6">
          <h3>Requisitos</h3>
          <p>{{$course->requirements}}</p>
        </div>
      </div>
    </div>
    <div class="box-w-shadow">
      <h3>Avaliações</h3>

      <div class="row"> 
        <div class="col-xs-12">
          <p>4 estrelas</p>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In tristique, lacus quis semper tincidunt, justo turpis dignissim turpis, id cursus nibh dolor ac enim. Suspendisse quis massa congue, scelerisque urna eu, pulvinar purus. Nam eget tempor magna. Donec varius magna vel magna bibendum ultricies.</p>
          <p><b>Lucas Santos</b></p>
          <hr>
        </div>
      </div>

      <div class="row"> 
        <div class="col-xs-12">
          <p>4 estrelas</p>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In tristique, lacus quis semper tincidunt, justo turpis dignissim turpis, id cursus nibh dolor ac enim. Suspendisse quis massa congue, scelerisque urna eu, pulvinar purus. Nam eget tempor magna. Donec varius magna vel magna bibendum ultricies.</p>
          <p><b>Lucas Santos</b></p>
          <hr>
        </div>
      </div>

    </div>
    <div class="box-w-shadow">
      <h3>Cursos relacionados</h3>
      <div class="container-carousel-courses">
        <button class="prev-carousel-courses"><i class="fa fa-chevron-left" aria-hidden="true"></i></button>
        <button class="next-carousel-courses"><i class="fa fa-chevron-right" aria-hidden="true"></i></button>
        <div class="carousel-courses">
          <?php for ($i=0; $i < 8; $i++) { ?> 
          <a href="@">
              <div class="course-box">
                <div class="course-thumb">
                  <img src="{{ asset('images/course.jpg')}}" alt="Curso">
                </div>
                <div class="course-desc">
                  <h3>Curso teste</h3>
                  <p>Descrição</p>
                </div>
                <div class="course-value">
                  <span>R$ 200,00</span>
                </div>
              </div>
          </a>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>
</section>

@stop