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
					<button class="btn-block btn-active" type="button">Dados pessoais</button>
				</div>
				<div class="col-xs-3">
					<button class="btn-block" type="button">Meus cursos</button>
				</div>
				@if($auth->user_type_id == 3)
				<div class="col-xs-3">
					<a href="{{route('teacher.be')}}">
						<button class="btn-block" type="button">Tornar-se professor</button>
					</a>
				</div>
				@elseif($auth->user_type_id == 4)
					@if($auth->courses()->count() != 0)
					<div class="col-xs-3">
						<button class="btn-block" type="button">Criar Curso</button>
					</div>
					@endif
				@endif
			</div>
		</div>
		<div class="box-w-shadow">
			<div class="box-title">
				<div class="row">
					<div class="col-xs-12">
						<h2>Cursos que leciono</h2>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-3">
					<div class="add-course-box">
						<i class="fa fa-plus-circle" aria-hidden="true"></i>
					</div>
				</div>
				<div class="col-sm-3">
					<div class="course-box">
						<div class="course-thumb">
							<img src="{{ asset('images/course.jpg')}}" alt="Curso">
						</div>
						<div class="course-desc">
							<h3>Título do curso</h3>
							<p>Descrição do curso</p>
						</div>
						<div class="course-access">
							<a href=""><span>ACESSAR</span></a>
						</div>
					</div>
				</div>
				<div class="col-sm-3">
					<div class="course-box">
						<div class="course-thumb">
							<img src="{{ asset('images/course.jpg')}}" alt="Curso">
						</div>
						<div class="course-desc">
							<h3>Título do curso</h3>
							<p>Descrição do curso</p>
						</div>
						<div class="course-access">
							<a href=""><span>ACESSAR</span></a>
						</div>
					</div>
				</div>
				<div class="col-sm-3">
					<div class="course-box">
						<div class="course-thumb">
							<img src="{{ asset('images/course.jpg')}}" alt="Curso">
						</div>
						<div class="course-desc">
							<h3>Título do curso</h3>
							<p>Descrição do curso</p>
						</div>
						<div class="course-access">
							<a href=""><span>ACESSAR</span></a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="box-w-shadow">
			<div class="box-title">
				<div class="row">
					<div class="col-xs-12">
						<h2>Criar curso</h2>
					</div>
				</div>
			</div>
			<form>
				<div class="row form-group">
					<div class="col-xs-6">
						<label>Nome</label>
	    				<input name="name" type="text" class="form-control" placeholder="Nome">
					</div>
				</div>
				<div class="row form-group">
					<div class="col-xs-6">
						<label>Descrição</label>
	    				<input name="name" type="text" class="form-control" placeholder="Descrição">
					</div>
				</div>
				<div class="row form-group">
					<div class="col-sm-4">
						<label>Categoria</label>
						<select class="form-control">
							<option value="" selected disabled hidden>Escolha</option>
							<option>Brasil</option>
						</select>
					</div>
				</div>
				<div class="row form-group">
					<div class="col-xs-4">
						<label>Preço</label>
	    				<input name="name" type="text" class="form-control" placeholder="Preço">
					</div>
				</div>
				<div class="row form-group">
					<div class="col-xs-6">
						<label>Requisitos</label>
						<textarea name="about" class="form-control" placeholder="Requisitos para o curso" rows="4"></textarea>
					</div>
				</div>
				<div class="row form-group">
					<div class="col-xs-4">
						<label>Imagem da vitrine</label>
	    				<input type="file">
					</div>
				</div>
				<div class="row form-group">
					<div class="col-xs-4">
						<label>Vídeo de apresentação</label>
	    				<input type="file">
					</div>
				</div>
				<div class="row form-group">
					<div class="col-xs-4">
						<button type="submit">Criar</button>
					</div>
				</div>
			</form>
		</div>
		<div class="box-w-shadow">
			<div class="box-title">
				<div class="row">
					<div class="col-xs-12">
						<h2>Meus cursos</h2>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-3">
					<div class="course-box">
						<div class="course-thumb">
							<img src="{{ asset('images/course.jpg')}}" alt="Curso">
						</div>
						<div class="course-desc">
							<h3>Título do curso</h3>
							<p>Descrição do curso</p>
						</div>
						<div class="course-access">
							<a href=""><span>ACESSAR</span></a>
						</div>
					</div>
				</div>
				<div class="col-sm-3">
					<div class="course-box">
						<div class="course-thumb">
							<img src="{{ asset('images/course.jpg')}}" alt="Curso">
						</div>
						<div class="course-desc">
							<h3>Título do curso</h3>
							<p>Descrição do curso</p>
						</div>
						<div class="course-access">
							<a href=""><span>ACESSAR</span></a>
						</div>
					</div>
				</div>
				<div class="col-sm-3">
					<div class="course-box">
						<div class="course-thumb">
							<img src="{{ asset('images/course.jpg')}}" alt="Curso">
						</div>
						<div class="course-desc">
							<h3>Título do curso</h3>
							<p>Descrição do curso</p>
						</div>
						<div class="course-access">
							<a href=""><span>ACESSAR</span></a>
						</div>
					</div>
				</div>
				<div class="col-sm-3">
					<div class="course-box">
						<div class="course-thumb">
							<img src="{{ asset('images/course.jpg')}}" alt="Curso">
						</div>
						<div class="course-desc">
							<h3>Título do curso</h3>
							<p>Descrição do curso</p>
						</div>
						<div class="course-access">
							<a href=""><span>ACESSAR</span></a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="box-w-shadow">
			<div class="box-title">
				<div class="row">
					<div class="col-xs-12">
						<h2>Dados pessoais</h2>
					</div>
				</div>
			</div>
			<form action="{{route('user.update')}}" method="POST" enctype="multipart/form-data">
              {{csrf_field()}}
              	<input type="hidden" name="id" value="{{$auth->id}}">
				<div class="row form-group">
					<div class="col-xs-4">
						<label for="img_avatar">Foto de perfil</label>
	    				<input type="file" name="img_avatar">
					</div>
				</div>
				<div class="row form-group">
					<div class="col-xs-4">
						<label>Nome</label>
	    				<input name="name" value="{{$auth->name}}" type="text" class="form-control" placeholder="Nome">
					</div>
					<div class="col-xs-4">
						<label>E-mail</label>
	    				<input name="email" type="email" value="{{$auth->email}}" class="form-control" placeholder="E-mail">
					</div>
					<div class="col-xs-4">
						<label for="sex">Sexo</label>
	    				<select class="form-control">
							<option value="" selected disabled hidden>Escolha</option>
							<option name="sex" value="m" @if($auth->sex == 'Masculino') selected @endif>Masculino</option>
							<option name="sex" value="f" @if($auth->sex == 'Feminino') selected @endif>Feminino</option>
						</select>
					</div>
				</div>
				<div class="row form-group">
					
					<div class="col-xs-4">
						<label for="country_id">País</label>
	    				<select name="country_id" class="form-control">
							<option value="" selected disabled hidden>Escolha</option>
							@foreach($countries as $country)
							<option  value="{{$country->id}}" @if($country->id == $auth->country_id) selected @endif>{{$country->name}}</option>
							@endforeach

						</select>
					</div>
					<div class="col-xs-4">
						<label>Estado</label>
	    				<select name="state_id" class="form-control">
							<option value="" selected disabled hidden>Escolha</option>
							@foreach($states as $state)
							<option value="{{$state->id}}" @if($state->id == $auth->state_id) selected @endif> {{$state->name}}</option>
							@endforeach
						</select>
					</div>
				</div>
				<div class="row form-group">
					<div class="col-xs-8">
						<label for="bio">Conte-nos um pouco sobre você</label>
						<textarea name="bio" class="form-control" placeholder="Escreva aqui..." rows="5">{{$auth->bio}}</textarea>
					</div>
				</div>
				<div class="row form-group">
					<div class="col-xs-4">
						<label for="website">Website</label>
	    				<input name="website" value="{{$auth->website}}" type="text" class="form-control" placeholder="https:// ...">
					</div>
					<div class="col-xs-4">
						<label for="facebook">Facebook</label>
	    				<input name="facebook" value="{{$auth->facebook}}" type="text" class="form-control" placeholder="https:// ...">
					</div>
				</div>
				<div class="row form-group">
					<div class="col-xs-4">
						<label for="twitter">Twitter</label>
	    				<input name="twitter" value="{{$auth->twitter}}" type="text" class="form-control" placeholder="https:// ...">
					</div>
					<div class="col-xs-4">
						<label for="google_plus">Google</label>
	    				<input name="google_plus" value="{{$auth->google_plus}}" type="text" class="form-control" placeholder="https:// ...">
					</div>
				</div>
				<div class="row form-group">
					<div class="col-xs-4">
						<button type="submit">Atualizar</button>
					</div>
				</div>
			</form>
			<div class="box-title">
				<div class="row">
					<div class="col-xs-12">
						<h2>Dados de pagamento</h2>
					</div>
				</div>
			</div>
			<form>
				<div class="row form-group">
					<div class="col-xs-5">
						<label>Endereço</label>
	    				<input name="website" type="text" class="form-control" placeholder="Endereço">
					</div>
					<div class="col-xs-3">
						<label>Número</label>
	    				<input name="facebook" type="text" class="form-control" placeholder="Número">
					</div>
				</div>
				<div class="row form-group">
					<div class="col-xs-4">
						<label>Estado</label>
	    				<select class="form-control">
							<option value="" selected disabled hidden>Escolha</option>
							<option>Brasil</option>
						</select>
					</div>
					<div class="col-xs-4">
						<label>Cidade</label>
	    				<select class="form-control">
							<option value="" selected disabled hidden>Escolha</option>
							<option>Brasil</option>
						</select>
					</div>
				</div>
				<div class="row form-group">
					<div class="col-xs-3">
						<label>CEP</label>
	    				<input name="cep" type="text" class="form-control" placeholder="CEP">
					</div>
				</div>
				<div class="row form-group">
					<div class="col-xs-4">
						<button type="submit">Atualizar</button>
					</div>
				</div>
			</form>
		</div>
</section>

@stop