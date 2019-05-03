@extends('user.templates.default')

@section('title', 'Tabula')

@section('description', 'Descrição')

@section('content')

<section>
	<div class="container">
		<div class="box-w-shadow">
			<div id="slider" class="carousel slide" data-ride="carousel">
		    <!-- Indicators -->
		    <ol class="carousel-indicators">
		      <li data-target="#slider" data-slide-to="0" class="active"></li>
		      <li data-target="#slider" data-slide-to="1"></li>
		    </ol>

		    <!-- Wrapper for slides -->
		    <div class="carousel-inner">

		      <div class="item active">
		        <img src="{{ asset('images/slider.png')}}" alt="Slider" style="width:100%;">
		      </div>

		      <div class="item">
		        <img src="{{ asset('images/slider2.png')}}" alt="Slider" style="width:100%;">
		      </div>
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
</section>

<section>
	<div class="container">
		<div class="box-w-shadow">
			<div class="row macro-mobile">
				<div class="col-xs-12">
					<div class="macro-mobile-wrapper">
                        @for($i = 0; $i<3; $i++)
                            <div class="macrotema-col-{{ $i+1 }}">
                                @for($j = 0; $j < $mobile_col_limit; $j++)
                                	<div class="macro-indv-mobile">
	                                    <a href="{{ url('categoria/' . $categories[$mobile_category_count]->urn) }}" style="background-image: url('{{ asset('images/hex/mobile/')}}/{{$mobile_categories[$mobile_category_count]->mobile_hex_bg }}')">
	                                        <p id="macro-title">{{ $mobile_categories[$mobile_category_count]->name }}</p> 
	                                        <img class="macroicon" src="{{ asset('images/hex/icon/'.$mobile_categories[$mobile_category_count]->hex_icon) }}"> 
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
                        @for($i = 0; $i<3; $i++)
                            <div class="macro-row-{{ $i+1 }}">
                                @for($j = 0; $j < $row_limit; $j++)
                                    <div class="macro-indv-pc">
                                        <a href="{{ url('categoria/' . $categories[$category_count]->urn) }}" style="background-image: url('{{ asset('images/hex/desktop')}}/{{$categories[$category_count]->desktop_hex_bg }}');">
                                            <p>{{ $categories[$category_count]->name }}</p> 
                                            <img class="macroicon" src="{{ asset('images/hex/icon/'.$categories[$category_count]->hex_icon) }}"> 
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
				<div class="carousel-courses">
					@forelse($featured_courses1 as $course)
				  	<div class="course-box">
					  	<div class="course-thumb">
					  		<img src="{{ asset('images/course.jpg')}}" alt="Curso">
					  	</div>
					  	<div class="course-desc">
					  		<h3>{{$course->name}}</h3>
					  		<p>{{substr($course->desc, 0, 50)}}</p>
					  	</div>
					  	<div class="course-value">
					  		<span>R$ {{number_format($course->price, 2, ',', '.' )}}</span>
					  	</div>
				  	</div>
				  	@empty
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
				<button class="prev-carousel-courses"><i class="fa fa-chevron-left" aria-hidden="true"></i></button>
				<button class="next-carousel-courses"><i class="fa fa-chevron-right" aria-hidden="true"></i></button>
				<div class="carousel-courses">
					@forelse($featured_courses2 as $course)
				  	<div class="course-box">
					  	<div class="course-thumb">
					  		<img src="{{ asset('images/course.jpg')}}" alt="Curso">
					  	</div>
					  	<div class="course-desc">
					  		<h3>{{$course->name}}</h3>
					  		<p>{{substr($course->desc, 0, 50)}}</p>
					  	</div>
					  	<div class="course-value">
					  		<span>R$ {{number_format($course->price, 2, ',', '.' )}}</span>
					  	</div>
				  	</div>
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
            <video class="video-about" controls poster="../images/layout/home/poster-video.png" width="500px">
                <source src="{{asset('/images/layout/home/presentation-tabula.mp4')}}">
            </video>
		</div>
	</div>
</section>

@stop