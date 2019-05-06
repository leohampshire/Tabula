@extends('user.templates.default')

@section('title', 'Tabula')

@section('description', 'Descrição')

@section('content')

<section>
	<div class="container">
		<div class="box-title">
			<div class="row">
				<div class="col-xs-12">
					<h1 class="text-center">Cadastre-se</h1>
				</div>
			</div>
		</div>
		<form>
			<div class="row form-group">
				<div class="col-sm-offset-4 col-sm-4">
					<label>Nome</label>
    				<input name="name" type="text" class="form-control" placeholder="Nome">
				</div>
			</div>
			<div class="row form-group">
				<div class="col-sm-offset-4 col-sm-4">
					<label>E-mail</label>
    				<input name="email" type="email" class="form-control" placeholder="E-mail">
				</div>
			</div>
			<div class="row form-group">
				<div class="col-sm-offset-4 col-sm-4">
					<label>Sexo</label><br>
    				<label class="radio-inline">
					  <input type="radio" name="sex" value="Masculino"> Masculino
					</label>
					<label class="radio-inline">
					  <input type="radio" name="sex" value="Feminino"> Feminino
					</label>
				</div>
			</div>
			<div class="row form-group">
				<div class="col-sm-offset-4 col-sm-4">
					<label>País</label>
					<select class="form-control">
						<option value="" selected disabled hidden>Escolha</option>
						<option>Brasil</option>
					</select>
				</div>
			</div>
			<div class="row form-group">
				<div class="col-sm-offset-4 col-sm-4">
					<label>Senha</label>
    				<input name="password" type="password" class="form-control" placeholder="Senha">
				</div>
			</div>
			<div class="row form-group">
				<div class="col-sm-offset-4 col-sm-4">
					<label>Confirmação de senha</label>
    				<input name="confirm_password" type="confirm_password" class="form-control" placeholder="Confirmação de senha">
				</div>
			</div>
			<div class="row form-group">
				<div class="col-sm-offset-4 col-sm-4">
					<label>Escolaridade</label>
					<select name="schooling_id" class="form-control">
						<option value="" selected disabled hidden>Escolha</option>
						<option value="1"> Fundamental - Incompleto </option>
						<option value="2"> Fundamental - Completo </option>
						<option value="3"> Médio - Incompleto </option>
						<option value="4"> Médio - Completo </option>
						<option value="5"> Superior - Incompleto </option>
						<option value="6"> Superior - Completo </option>
						<option value="7"> Pós Graduação - Incompleto </option>
						<option value="8"> Pós Graduação - Completo </option>
					</select>
				</div>
			</div>
			<div class="row form-group">
				<div class="col-sm-offset-4 col-sm-4">
					<label>Interesses</label>
					<div class="checkbox">
					  <label>
					    <input type="checkbox" value="">
					    Finanças e Economia
					  </label>
					</div>
					<div class="checkbox">
					  <label>
					    <input type="checkbox" value="">
					    Varejo e Consumo
					  </label>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-offset-4 col-sm-4">
					<button type="submit">Registrar</button>
				</div>
			</div>
		</form>
	</div>
</section>

@stop