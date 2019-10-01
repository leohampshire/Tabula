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
            <div class="col-xs-12 col-sm-4">
                <label for="img_avatar">Foto de perfil</label>
                <input type="file" name="img_avatar">
            </div>
        </div>
        <div class="row form-group">
            <div class="col-xs-12 col-sm-4">
                <label for="cover">Capa perfil público</label>
                <input type="file" name="cover">
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-6">
                <div class="form-group">
                    <label>Nome Completo</label>
                    <input name="name" value="{{$auth->name}}" type="text" class="form-control" placeholder="Nome Completo">
                </div>
            </div>
            <div class="col-xs-12 col-sm-6">
                <div class="form-group">
                    <label>E-mail</label>
                    <input name="email" type="email" value="{{$auth->email}}" class="form-control" placeholder="E-mail">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 col-sm-4">
                <div class="form-group">
                    <label for="country_id">País</label>
                    <select name="country_id" id="country" class="form-control">
                        <option value="" selected disabled hidden>Escolha</option>
                        @foreach($countries as $country)
                        <option value="{{$country->id}}" @if($country->id == $auth->country_id) selected
                            @endif>{{$country->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-xs-6 col-sm-4 state">
                    <div class="form-group">
                        <label>Estado</label>
                        <select name="state_id" class="form-control">
                            <option value="" selected disabled hidden>Escolha</option>
                            @foreach($states as $state)
                            <option value="{{$state->id}}" @if($state->id == $auth->state_id) selected @endif> {{$state->name}}
                            </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                @if($auth->user_type_id != 5)
                <div class="col-xs-6 col-sm-4">
                    <div class="form-group">
                        <label for="sex">Sexo</label>
                        <select class="form-control">
                            <option value="" selected disabled hidden>Escolha</option>
                            <option name="sex" value="m" @if($auth->sex == 'Masculino') selected @endif>Masculino</option>
                            <option name="sex" value="f" @if($auth->sex == 'Feminino') selected @endif>Feminino</option>
                        </select>
                    </div>
                </div>
                @endif
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label for="bio">Conte-nos um pouco sobre você</label>
                        <textarea name="bio" class="form-control" placeholder="Escreva aqui..."
                        rows="6">{{$auth->bio}}</textarea>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-6">
                    <div class="form-group">
                        <label for="website">Website</label>
                        <input name="website" value="{{$auth->website}}" type="text" class="form-control" placeholder="https:// ...">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6">
                    <div class="form-group">
                        <label for="facebook">Facebook</label>
                        <input name="facebook" value="{{$auth->facebook}}" type="text" class="form-control" placeholder="https:// ...">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-6">
                    <div class="form-group">
                        <label for="twitter">Twitter</label>
                        <input name="twitter" value="{{$auth->twitter}}" type="text" class="form-control" placeholder="https:// ...">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6">
                    <div class="form-group">
                        <label for="google_plus">Google</label>
                        <input name="google_plus" value="{{$auth->google_plus}}" type="text" class="form-control" placeholder="https:// ...">
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col-xs-12">
                        <label style="width: 100">Interesses</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <?php
                        $i =0;

                        $countInterests = count($interests);

                        if($countInterests > 0){
                            $numToColInterests = $countInterests/2;
                            $numToColInterests = (int) $numToColInterests;
                        }
                        ?>
                        @forelse($interests as $interest)

                        @if($i == $numToColInterests)
                    </div><div class="col-sm-6">
                        @endif

                        <label class="form-check interest-label">
                            <input type="checkbox" @if(in_array($interest->id, $auth['interest'])) checked @endif
                            name="interest[]" class="form-check-input" value="{{$interest->id}}">{{$interest->name}}
                        </label>
                        @php($i++)
                        @empty
                        @endforelse
                    </div>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-xs-4">
                    <button type="submit">Atualizar</button>
                </div>
            </div>
        </form>
    </div>

    @if($auth->user_type_id != 3)
    <div class="box-w-shadow">
        <form method="POST" action="{{route('bank-data')}}">
            {{csrf_field()}}
            <div class="row">
                <div class="col-xs-12">
                    <h2>Dados bancários</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-8">
                    <div class="form-group">
                        <label for="legal_name">Nome</label>
                        <input name="legal_name" @if($auth->databank) value="{{$auth->databank->legal_name}}" @endif
                        placeholder="Informar nome que está no Cartão" type="text" class="form-control">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-4">
                    <div class="form-group">
                        <label for="cpf">CPF</label>
                        <input name="cpf" onclick="ajaxCPF()" @if($auth->databank) value="{{$auth->databank->document_number}}"
                        @endif type="text" class="form-control cpf-ajax">
                    </div>
                </div>
                <div class="col-xs-12 col-sm-4">
                    <div class="form-group">
                        <label for="cnpj">CNPJ</label>
                        <input name="cnpj" onclick="ajaxCNPJ()" @if($auth->databank) value="{{$auth->databank->document_type}}"
                        @endif type="text" class="form-control cnpj-ajax">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-8 col-sm-2">
                    <div class="form-group">
                        <label for="bank_code">Cód. Banco</label>
                        <input name="bank_code" @if($auth->databank) value="{{$auth->databank->bank_code}}" @endif
                        placeholder="XXX" type="number" class="form-control">
                    </div>
                </div>
                <div class="col-xs-7 col-sm-3">
                    <div class="form-group">
                        <label for="agencia">Agência</label>
                        <input name="agencia" @if($auth->databank) value="{{$auth->databank->agencia}}" @endif
                        placeholder="XXXX" type="number" class="form-control">
                    </div>
                </div>
                <div class="col-xs-5 col-sm-2">
                    <div class="form-group">
                        <label for="agencia_dv">Dig. Agência</label>
                        <input name="agencia_dv" @if($auth->databank) value="{{$auth->databank->agencia_dv}}" @endif
                        placeholder="(Opcional)" type="number" class="form-control">
                    </div>
                </div>

                <div class="col-xs-7 col-sm-3">
                    <div class="form-group">
                        <label for="conta">Conta (sem dígito)</label>
                        <input name="conta" @if($auth->databank) value="{{$auth->databank->conta}}" @endif type="number"
                        placeholder="Conta" class="form-control">
                    </div>
                </div>

                <div class="col-xs-5 col-sm-2">
                    <div class="form-group">
                        <label for="conta_dv">Digito conta</label>
                        <input name="conta_dv" @if($auth->databank) value="{{$auth->databank->conta_dv}}" @endif
                        placeholder="XX" type="number" class="form-control">
                    </div>
                </div>

            </div>
            <div class="row form-group">
                <div class="col-xs-4">
                    <button type="submit">Salvar</button>
                </div>
            </div>
        </form>
    </div>
    @endif