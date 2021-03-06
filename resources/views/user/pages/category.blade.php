@extends('user.templates.default')

@section('title', $checked_category->meta_title)

@section('description', $checked_category->meta_description)

@section('content')

<section>
    <div class="container">
        <div class="box-title">
            <div class="row">
                <div class="col-xs-12">
                    <h1>{{$category_name}}</h1>
                </div>
            </div>
        </div>
        <?php
		//Columns must be a factor of 12 (1,2,3,4,6,12)
		$numOfCols = 4;
		$rowCount = 0;
		$bootstrapColWidth = 12 / $numOfCols;
		?>
        <div class="row">
            @forelse ($courses as $row)
            @if($row->avaliable == 2 || $row->price != null)
            <div class="col-sm-<?php echo $bootstrapColWidth; ?>">
                <a href="{{route('course.single', ['urn' => $row->urn])}}">
                    <div class="course-box">
                        <div class="course-thumb">
                            <img src="{{ asset('images/aulas')}}/{{$row->thumb_img}}" alt="Curso">
                        </div>
                        <div class="course-desc">
                            <h3>{{$row->name}}</h3>
                            <p><?php echo substr($row->desc, 0, 74) ?></p>
                        </div>
                        <div class="course-value">
                            <span>@if($row->price == 0) Grátis @else R$ {{number_format($row->price,2,',','.')}}@endif</span>
                        </div>
                    </div>
                </a>
            </div>
            <?php
		    $rowCount++;
		    if($rowCount % $numOfCols == 0) echo '</div><div class="row">';
		?>
            @endif
            @empty
            <div class="col-sm-12">
                Não existem cursos nesta categoria.
            </div>
            @endforelse
        </div>
    </div>
</section>

@stop