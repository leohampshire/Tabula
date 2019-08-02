@extends('user.templates.default')

@section('title', 'Tabula')

@section('description', 'Descrição')

@section('content')

<section>
    <div class="container">
        <div class="box-w-shadow">
            <div class="row">
                <div class="col-sm-12">
                    <img class="img-profile-company"
                        src="{{asset('images/profile')}}/{{$company->avatar}}">
                    <img style="width: 100%; height: 280px; object-fit: cover;"
                        src="{{asset('images/cover')}}/{{$company->company->cover}}">
                </div>
                <div class="col-sm-12">
                    <nav class="navbar navbar-light bg-light " style="float: right;">
                        <a href="#about" class="navbar-brand" id="scroll">Sobre</a>
                        <a href="#courses" class="navbar-brand" id="scroll">Cursos</a>
                        <a href="#teachers" class="navbar-brand" id="scroll">Professores</a>
                    </nav>
                </div>
            </div>
            <div class="row" id="about">
                <div class="col-sm-12">
                    <h1>Sobre {{$company->name}}</h1>
                </div>
                <div class="col-sm-12">
                    <p>{{$company->company->about}}</p>
                </div>
            </div>
            <hr id="courses">
            <?php
				//Columns must be a factor of 12 (1,2,3,4,6,12)
				$numOfCols = 4;
				$rowCount = 0;
				$bootstrapColWidth = 12 / $numOfCols;
				?>
            <div class="row">
                <div class="col-sm-12">
                    <h1>Cursos {{$company->name}}</h1>
                </div>
                @forelse ($company->courses as $row)
                <div class="col-sm-<?php echo $bootstrapColWidth; ?>">
                    <a href="{{route('course.single', ['urn' => $row->urn])}}">
                        <div class="course-box">
                            <div class="course-thumb">
                                <img src="{{ asset('images/aulas')}}/{{$row->thumb_img}}" alt="Curso">
                            </div>
                            <div class="course-desc">
                                <h3>{{$row->name}}</h3>
                                <p>{{substr($row->desc, 0, 50)}}</p>
                            </div>
                            <div class="course-value">
                                <span>R$ {{number_format($row->price, 2, ',', '.')}}</span>
                            </div>
                        </div>
                    </a>
                </div>
                <?php
				    $rowCount++;
				    if($rowCount % $numOfCols == 0) echo '</div><div class="row">';
				?>
                @empty
                <div class="col-sm-12">
                    <p>Não existem cursos para esta empresa</p>

                </div>
                @endforelse

                @forelse ($company->company->teachers as $teachers)
                @foreach($teachers->courses as $row)
                @if($row->company != NULL)
                <div class="col-sm-<?php echo $bootstrapColWidth; ?>">
                    <a href="{{route('course.single', ['urn' => $row->urn])}}">
                        <div class="course-box">
                            <div class="course-thumb">
                                <img src="{{ asset('images/aulas')}}/{{$row->thumb_img}}" alt="Curso">
                            </div>
                            <div class="course-desc">
                                <h3>{{$row->name}}</h3>
                                <p>{{substr($row->desc, 0, 50)}}</p>
                            </div>
                            <div class="course-value">
                                <span>R$ {{number_format($row->price, 2, ',', '.')}}</span>
                            </div>
                        </div>
                    </a>
                </div>
                <?php
						    $rowCount++;
						    if($rowCount % $numOfCols == 0) echo '</div><div class="row">';
						?>
                @endif
                @endforeach
                @empty
                <div class="col-sm-12">
                    <p>Não existem cursos para esta empresa</p>

                </div>
                @endforelse
            </div>
            <hr id="teachers">
            <?php
				//Columns must be a factor of 12 (1,2,3,4,6,12)
				$numOfCols = 4;
				$rowCount = 0;
				$bootstrapColWidth = 12 / $numOfCols;
				?>
            <div class="row">
                <div class="col-sm-12">
                    <h1>Professores {{$company->name}}</h1>
                </div>
                @forelse ($company->company->teachers as $row)
                <div class="col-sm-<?php echo $bootstrapColWidth; ?>">
                    <a href="{{route('teacher', ['id' => $row->id])}}">
                        <div class="course-box">
                            <div class="course-thumb">
                                <img src="{{ asset('images/profile')}}/{{$row->avatar}}" alt="Curso">
                            </div>
                            <div class="course-desc">
                                <h3>{{$row->name}}</h3>
                                <p>Cursos: {{count($row->courses)}}</p>
                            </div>
                        </div>
                    </a>
                </div>
                <?php
				    $rowCount++;
				    if($rowCount % $numOfCols == 0) echo '</div><div class="row">';
				?>
                @empty
                <div class="col-sm-12">
                    <p>Não existem progessores para esta empresa</p>

                </div>
                @endforelse
            </div>
        </div>
    </div>
</section>

@stop