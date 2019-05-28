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
			<label for="cover">Capa perfil público</label>
			<input type="file" name="cover">
		</div>
	</div>
	<div class="row form-group">
		<div class="col-xs-6">
			<label>Nome Completo</label>
			<input name="name" value="{{$auth->name}}" type="text" class="form-control" placeholder="Nome Completo">
		</div>
		<div class="col-xs-6">
			<label>E-mail</label>
			<input name="email" type="email" value="{{$auth->email}}" class="form-control" placeholder="E-mail">
		</div>
	</div>
	<div class="row form-group">
		
		<div class="col-xs-4">
			<label for="country_id">País</label>
			<select name="country_id" id="country" class="form-control">
				<option value="" selected disabled hidden>Escolha</option>
				@foreach($countries as $country)
				<option  value="{{$country->id}}" @if($country->id == $auth->country_id) selected @endif>{{$country->name}}</option>
				@endforeach

			</select>
		</div>
		<div class="col-xs-4 state">
			<label>Estado</label>
			<select name="state_id" class="form-control">
				<option value="" selected disabled hidden>Escolha</option>
				@foreach($states as $state)
				<option value="{{$state->id}}" @if($state->id == $auth->state_id) selected @endif> {{$state->name}}</option>
				@endforeach
			</select>
		</div>
		@if($auth->user_type_id != 5)
		<div class="col-xs-4">
			<label for="sex">Sexo</label>
			<select class="form-control">
				<option value="" selected disabled hidden>Escolha</option>
				<option name="sex" value="m" @if($auth->sex == 'Masculino') selected @endif>Masculino</option>
				<option name="sex" value="f" @if($auth->sex == 'Feminino') selected @endif>Feminino</option>
			</select>
		</div>
		@endif
	</div>
	<div class="row form-group">
		<div class="col-xs-12">
			<label for="bio">Conte-nos um pouco sobre você</label>
			<textarea name="bio" class="form-control" placeholder="Escreva aqui..." rows="4">{{$auth->bio}}</textarea>
		</div>
	</div>
	<div class="row form-group">
		<div class="col-xs-6">
			<label for="website">Website</label>
			<input name="website" value="{{$auth->website}}" type="text" class="form-control" placeholder="https:// ...">
		</div>
		<div class="col-xs-6">
			<label for="facebook">Facebook</label>
			<input name="facebook" value="{{$auth->facebook}}" type="text" class="form-control" placeholder="https:// ...">
		</div>
	</div>
	<div class="row form-group">
		<div class="col-xs-6">
			<label for="twitter">Twitter</label>
			<input name="twitter" value="{{$auth->twitter}}" type="text" class="form-control" placeholder="https:// ...">
		</div>
		<div class="col-xs-6">
			<label for="google_plus">Google</label>
			<input name="google_plus" value="{{$auth->google_plus}}" type="text" class="form-control" placeholder="https:// ...">
		</div>
	</div>
	
	<div class="row form-group">
		<div class="col-xs-6">
			<label for="interest">Interesses</label>

				@forelse($interests as $interest)
				<div class="form-check">
					<input type="checkbox" @if(in_array($interest->id, $auth['interest'])) checked @endif name="interest[]" class="form-check-input" value="{{$interest->id}}">{{$interest->name}}
				</div>
				@empty
				@endforelse	
		</div>
	</div>
	<div class="row form-group">
		<div class="col-xs-4">
			<button type="submit">Atualizar</button>
		</div>
	</div>
</form>
@if($auth->user_type_id != 3)
<form method="POST" action="{{route('bank-data')}}">
	{{csrf_field()}}
	<div class="row">
		<div class="col-xs-12">
			<h2>Dados bancários</h2>
		</div>
	</div>
	<div class="row form-group">
		<div class="col-xs-2">
			<label for="bank_code">Cód. Banco</label>
			<input name="bank_code" value="{{$auth->databank->bank_code}}" placeholder="XXX" type="number" class="form-control">
		</div>
		<div class="col-xs-2">
			<label for="agencia">Agência</label>
			<input name="agencia" value="{{$auth->databank->agencia}}" placeholder="XXXXX" type="number" class="form-control">
		</div>
		<div class="col-xs-2">
			<label for="agencia_dv">Dig. Agência</label>
			<input name="agencia_dv" value="{{$auth->databank->agencia_dv}}" placeholder="X" type="number" class="form-control">
		</div>

		<div class="col-xs-3">
			<label for="conta">Conta (sem dígito)</label>
			<input name="conta" value="{{$auth->databank->conta}}" type="number" placeholder="Conta" class="form-control">
		</div>

		<div class="col-xs-2">
			<label for="conta_dv">Digito conta</label>
			<input name="conta_dv" value="{{$auth->databank->conta_dv}}" placeholder="XX" type="number"  class="form-control">
		</div>
		<div class="col-xs-3">
			<label for="cpf">CPF</label>
			<input name="cpf" value="{{$auth->databank->document_number}}" type="text" class="form-control input-cpf">
		</div>
	</div>
	<div class="row form-group">
		<div class="col-xs-4">
			<button type="submit">Salvar</button>
		</div>
	</div>
</form>
@endif

