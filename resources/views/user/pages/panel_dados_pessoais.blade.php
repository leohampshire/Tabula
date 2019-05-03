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
						<img src="{{ asset('images/profile/default.png')}}" alt="Perfil">
					</div>
					<div class="user-name">
						<h1>Lucas Borelli</h1>
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
				<div class="col-xs-3">
					<button class="btn-block" type="button">Tornar-se professor</button>
				</div>
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
			<form>
				<div class="row form-group">
					<div class="col-xs-4">
						<label>Foto de perfil</label>
	    				<input type="file">
					</div>
				</div>
				<div class="row form-group">
					<div class="col-xs-4">
						<label>Nome</label>
	    				<input name="name" type="text" class="form-control" placeholder="Nome">
					</div>
					<div class="col-xs-4">
						<label>E-mail</label>
	    				<input name="email" type="email" class="form-control" placeholder="E-mail">
					</div>
					<div class="col-xs-4">
						<label>Sexo</label>
	    				<select class="form-control">
							<option value="" selected disabled hidden>Escolha</option>
							<option>Brasil</option>
						</select>
					</div>
				</div>
				<div class="row form-group">
					
					<div class="col-xs-4">
						<label>País</label>
	    				<select class="form-control">
							<option value="" selected disabled hidden>Escolha</option>
							<option>Brasil</option>
						</select>
					</div>
					<div class="col-xs-4">
						<label>Estado</label>
	    				<select class="form-control">
							<option value="" selected disabled hidden>Escolha</option>
							<option>Brasil</option>
						</select>
					</div>
				</div>
				<div class="row form-group">
					<div class="col-xs-8">
						<label>Conte-nos um pouco sobre você</label>
						<textarea name="about" class="form-control" placeholder="Escreva aqui..." rows="5"></textarea>
					</div>
				</div>
				<div class="row form-group">
					<div class="col-xs-4">
						<label>Website</label>
	    				<input name="website" type="text" class="form-control" placeholder="https:// ...">
					</div>
					<div class="col-xs-4">
						<label>Facebook</label>
	    				<input name="facebook" type="text" class="form-control" placeholder="https:// ...">
					</div>
				</div>
				<div class="row form-group">
					<div class="col-xs-4">
						<label>Twitter</label>
	    				<input name="twitter" type="text" class="form-control" placeholder="https:// ...">
					</div>
					<div class="col-xs-4">
						<label>Google</label>
	    				<input name="google" type="text" class="form-control" placeholder="https:// ...">
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