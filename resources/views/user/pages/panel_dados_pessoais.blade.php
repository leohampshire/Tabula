@extends('user.templates.default')

@section('title', 'Tabula')

@section('description', 'Descrição')

@section('content')

<section id="panel-header">
	<div class="container">
		<div class="box-w-shadow">
			<div class="row">
				<div class="col-xs-12">
					<div class="user-thumb">
						<img src="{{ asset('images/profile/')}}/{{$auth->avatar}}" alt="Perfil">
					</div>
					<div class="user-name">
						<h1>{{$auth->name}}</h1>
					</div>
				</div>
			</div>
		</div>
		<div class="box-w-shadow">
			<div class="row">
				<div class="col-xs-3">
					<a href="#personal" class="personal" data-url="{{route('user.personal')}}">
						<button class="btn-block btn-active btn-panel-menu" type="button">Dados pessoais</button>
					</a>
				</div>
				<div class="col-xs-3">
					<a href="#my-course"class="my-course" data-url="{{route('user.my.course')}}">
						<button class="btn-block btn-panel-menu" type="button">Meus cursos</button>
					</a>
				</div>
				<div class="col-xs-3">
					<a href="#orders"class="orders" data-url="{{route('user.orders')}}">
						<button class="btn-block btn-panel-menu" type="button">Meus Pedidos</button>
					</a>
				</div>
				@if($auth->user_type_id == 3)
				<div class="col-xs-3">
					<a href="{{route('teacher.be')}}">
						<button class="btn-block btn-panel-menu" type="button">Tornar-se professor</button>
					</a>
				</div>
				@else
					@if($auth->courses()->count() == 0)
					<div class="col-xs-3" >
						<a href="#course-create" class="course-create" data-url="{{route('user.course.create')}}">
							<button class="btn-block btn-panel-menu btn-danger" type="button">Criar Curso</button>
						</a>
					</div>
					@else
					<div class="col-xs-3" >
						<a href="#teach" class="teach" data-url="{{route('user.teach')}}">
							<button class="btn-block btn-panel-menu" type="button">Cursos que leciono</button>
						</a>
					</div>
					@endif
					<!-- 
					<div class="col-xs-3">
						<a href="#"class="my-course" data-url="#">
							<button class="btn-block btn-panel-menu" type="button">Cupons</button>
						</a>
					</div>
					 -->
			 	@endif
			 	@if($auth->user_type_id == 5)
			 	<div class="col-xs-3" >
						<a href="#course-create" class="course-create" data-url="{{route('user.teacher.index')}}">
							<button class="btn-block btn-panel-menu" type="button">Professores </button>
						</a>
					</div>
				@endif
			</div>
		</div>
		<div class="box-w-shadow" id="content">
			
		</div>
	</div>
</section>

@stop