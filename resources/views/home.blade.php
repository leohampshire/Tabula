@extends('user.templates.default')
@php($seo = DB::table('seos')->first())
@section('title', $seo->meta_title)

@section('description', $seo->meta_description)

@section('content')

<section>
    @if(count($promotions) > 0)
    <div class="container">
        <div class="box-w-shadow">
            <div id="slider" class="carousel slide" data-ride="carousel">
                <!-- Indicators -->

                <!-- Wrapper for slides -->
                <div class="carousel-inner">
                    <?php $i = 0; ?>
                    @forelse($promotions as $key => $promotion)

                    <div class="item @if($key == 0) active @endif">
                        @if($promotion->type == 'image')
                        <a href="{{$promotion->url}}" target="_blank">
                            <img src="{{ asset('images/promotion')}}/{{$promotion->file}}" alt="Slider"
                                style="width:100%; height: 350px; object-fit: cover;">
                        </a>
                        @else
                        <video controlsList="nodownload" oncontextmenu="return false;" class="afterglow"
                            id="{{$promotion->id}}" style="width:100%; height: 350px; object-fit: cover;">
                            <source src="{{asset('/images/promotion/')}}/{{$promotion->file}}" type="video/mp4">
                        </video>
                        @endif
                    </div>
                    <?php $i++; ?>
                    @empty
                    @endforelse
                </div>
                <!-- Left and right controls -->
                <a class="left carousel-control" href="#slider" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#slider" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </div>
    @endif
</section>

<section>
    <div class="container">
        <div class="box-w-shadow">
            <div class="row macro-mobile">
                <div class="col-xs-12">
                    <div class="macro-mobile-wrapper">
                        @for($i = 0; $i<3; $i++) <div class="macrotema-col-{{ $i+1 }}">
                            @for($j = 0; $j < $mobile_col_limit; $j++) <div class="macro-indv-mobile">
                                <a href="{{ url('categoria/' . $mobile_categories[$mobile_category_count]->urn) }}"
                                    style="background-image: url('{{ asset('images/hex/mobile/')}}/{{$mobile_categories[$mobile_category_count]->mobile_hex_bg }}')">
                                    <p id="macro-title">{{ $mobile_categories[$mobile_category_count]->name }}</p>
                                    <img class="macroicon"
                                        src="{{ asset('images/hex/icon/'.$mobile_categories[$mobile_category_count]->hex_icon) }}">
                                </a>
                    </div>
                    @php($mobile_category_count++)

                    @endfor
                    @if($mobile_col_limit == 5)
                    @php($mobile_col_limit = 6)
                    @else
                    @php($mobile_col_limit = 5)
                    @endif
                </div>
                @endfor
            </div>
        </div>
    </div>
    <div class="row macro-pc">
        <div class="col-xs-12">
            <div class="macro-pc-wrapper hide-md">
                @for($i = 0; $i<3; $i++) <div class="macro-row-{{ $i+1 }}">
                    @for($j = 0; $j < $row_limit; $j++) <div class="macro-indv-pc">
                        <a href="{{ url('categoria/' . $categories[$category_count]->urn) }}"
                            style="background-image: url('{{ asset('images/hex/desktop')}}/{{$categories[$category_count]->desktop_hex_bg }}');">
                            <p>{{ $categories[$category_count]->name }}</p>
                            <img class="macroicon"
                                src="{{ asset('images/hex/icon/'.$categories[$category_count]->hex_icon) }}">
                        </a>
                        @php($category_count++)
            </div>
            @endfor
            @if($row_limit == 5)
            @php($row_limit = 6)
            @else
            @php($row_limit = 5)
            @endif
        </div>
        @endfor
    </div>
    </div>
    </div>
    </div>
    </div>
</section>

@if($featured_courses1->count())
<section>
    <div class="container">
        <div class="box-w-shadow">
            <h2>Cursos em destaque: {{$featured_category1}}</h2>
            <div class="container-carousel-courses">
                <button class="prev-carousel-courses"><i class="fa fa-chevron-left" aria-hidden="true"></i></button>
                <button class="next-carousel-courses"><i class="fa fa-chevron-right" aria-hidden="true"></i></button>
                <div id="destaque-carousel" class="carousel-courses">
                    @forelse($featured_courses1 as $course)
                    @if($course->avaliable == 2 || $course->price != null)
                    <a href="{{route('course.single', ['urn' =>$course->urn])}}">
                        <div class="course-box">
                            <div class="course-thumb">
                                <img src="{{ asset('images/aulas')}}/{{$course->thumb_img}}" alt="Curso">
                            </div>
                            <div class="course-desc">
                                <h3>{{$course->name}}</h3>
                                <p><?php echo substr($course->desc,0,50) ?></p>
                            </div>
                            <div class="course-value">
                                <span>@if($course->price == 0) Grátis @else R$ {{number_format($course->price,2,',','.')}}@endif</span>
                            </div>
                        </div>
                    </a>
                    @endif
                    @empty
                    <div>
                        <p>Não existem cursos cadastrados</p>
                    </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</section>
@endif
@if($featured_courses2->count())
<section>
    <div class="container">
        <div class="box-w-shadow">
            <h2>Cursos em destaque:{{$featured_category2}}</h2>
            <div class="container-carousel-courses">
                <button id="destaque2-prev" class="prev-carousel-courses"><i class="fa fa-chevron-left" aria-hidden="true"></i></button>
                <button id="destaque2-next" class="next-carousel-courses"><i class="fa fa-chevron-right" aria-hidden="true"></i></button>
                <div id="destaque2-carousel" class="carousel-courses">
                    @forelse($featured_courses2 as $course)
                    @if($course->avaliable == 2 || $course->price != null)
                    <a href="{{route('course.single', ['urn' =>$course->urn])}}">
                        <div class="course-box">
                            <div class="course-thumb">
                                <img src="{{ asset('images/aulas')}}/{{$course->thumb_img}}" alt="Curso">
                            </div>
                            <div class="course-desc">
                                <h3>{{$course->name}}</h3>
                                <p><?php echo substr($course->desc,0,50) ?></p>
                            </div>
                            <div class="course-value">
                                <span>@if($course->price == 0) Grátis @else R$ {{number_format($course->price,2,',','.')}}@endif</span>
                            </div>
                        </div>
                    </a>
                    @endif
                    @empty
                    <div>
                        <p>Não existem cursos cadastrados</p>
                    </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</section>
@endif

@if($courses != NULL)
<section>
    <div class="container">
        <div class="box-w-shadow">
            <h2>Cursos recomendados</h2>
           
            <div class="container-carousel-courses">
                <button class="prev-carousel-courses"><i class="fa fa-chevron-left" aria-hidden="true"></i></button>
                <button class="next-carousel-courses"><i class="fa fa-chevron-right" aria-hidden="true"></i></button>
                <div class="carousel-courses">
                    @forelse($courses as $course)
                    @if($course->avaliable == 2 || $course->price != null)

                    <a href="{{route('course.single', ['urn' =>$course->urn])}}">
                        <div class="course-box">
                            <div class="course-thumb">
                                <img src="{{ asset('images/aulas')}}/{{$course->thumb_img}}" alt="Curso">
                            </div>
                            <div class="course-desc">
                                <h3>{{$course->name}}</h3>
                                <p><?php echo substr($course->desc,0,50) ?></p>
                            </div>
                            <div class="course-value">
                                <span>@if($course->price == 0) Grátis @else R$ {{number_format($course->price,2,',','.')}}@endif</span>
                            </div>
                        </div>
                    </a>
                    @endif
                    @empty
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</section>
@endif

@if($posts->count())
<section id="posts">
    <div class="container">
        <div class="box-w-shadow">
            <h2>Posts</h2>
            <div class="container-carousel-courses">
                <button id="prev-post" class="prev-carousel-courses"><i class="fa fa-chevron-left" aria-hidden="true"></i></button>
                <button id="next-post" class="next-carousel-courses"><i class="fa fa-chevron-right" aria-hidden="true"></i></button>
                <div id="post-carousel" class="carousel-courses">
                    @forelse($posts as $post)
                    <a href="{{route('blog.single', ['urn' =>$post->urn])}}">
                        <div class="course-box">
                            <div class="course-thumb">
                                <img src="{{ asset('uploads/archives')}}/{{$post->cover}}" alt="Curso">
                            </div>
                            <div class="course-desc">
                                <h3>{{$post->name}}</h3>
                            </div>
                        </div>
                    </a>
                    @empty
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</section>
@endif


<section>
    <div class="container">
        <div class="box-w-shadow">
            <h2>Conheça o Tabula!</h2>
            <video controlsList="nodownload" oncontextmenu="return false;" class="video-about" controls
                poster="{{asset('/images/layout/home/capa.png')}}" width="500px">
                <source src="{{asset('/images/layout/home/Animação principal_2.mp4')}}">
            </video>
        </div>
    </div>
</section>

@stop