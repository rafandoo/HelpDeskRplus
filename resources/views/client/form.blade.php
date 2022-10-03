@isset($client)
    $address = Address::find($client->id);
    $user = User::find($client->user_id);
@endisset

<div class="row">
    <input type="hidden" id="idCliente" name="idCliente" value="{{ isset($client) ? $client->id : '' }}">

    <div class="col">
        <div class="mb-3"><label class="form-label" for="name"><strong>Nome</strong></label>
            <input class="form-control" type="text" id="name" name="name" required minlength="2" value="{{ isset($client) ? $client->name : '' }}">
        </div>
    </div>
    <div class="col">
        <div class="mb-3"><label class="form-label" for="fantasy_name"><strong>Nome Fantasia</strong><br></label>
            <input class="form-control" type="text" id="fantasy_name" name="fantasy_name" value="{{ isset($client) ? $client->fantasy_name : '' }}">
        </div>
    </div>
</div>
<div class="row">
    <div class="col">
        <div class="mb-3"><label class="form-label" for="cpf_cnpj"><strong>CPF/CNPJ</strong><br></label>
            <input class="form-control" type="text" id="cpf_cnpj" name="cpf_cnpj" require minlength="11" value="{{ isset($client) ? $client->cpf_cnpj : '' }}">
            <!-- incluir validação de cpf/cnpj UNICO -->
        </div>
    </div>
    <div class="col">
        <div class="mb-3"><label class="form-label" for="phone"><strong>Telefone</strong><br></label>
            <input class="form-control" type="text" id="phone" name="phone" placeholder="(47) 90000-0000" value="{{ isset($client) ? $client->phone : '' }}">
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xl-3">
        <div class="mb-3"><label class="form-label" for="zip_code"><strong>CEP</strong><br></label>
            <input class="form-control" type="text" id="zip_code" name="zip_code" placeholder="00000-000" value="{{ isset($address) ? $address->zip_code : '' }}">
        </div>
    </div>
    <div class="col-xl-6">
        <div class="mb-3"><label class="form-label" for="street"><strong>Endereço</strong><br></label>
            <input class="form-control" type="text" id="street" name="street" required value="{{ isset($address) ? $address->street : '' }}">
        </div>
    </div>
    <div class="col-xl-3">
        <div class="mb-3"><label class="form-label" for="number"><strong>Número</strong><br></label>
            <input class="form-control" type="text" id="number" name="number" required value="{{ isset($address) ? $address->number : '' }}">
        </div>
    </div>
</div>
<div class="row">
    <div class="col">
        <div class="mb-3"><label class="form-label" for="neighborhood"><strong>Bairro</strong><br></label>
            <input class="form-control" type="text" id="neighborhood" name="neighborhood" required value="{{ isset($address) ? $address->neighborhood : '' }}"> 
        </div>
    </div>
    <div class="col">
        <div class="mb-3"><label class="form-label" for="complement"><strong>Complemento</strong><br></label>
            <input class="form-control" type="text" id="complement" name="complement" value="{{ isset($address) ? $address->complement : '' }}">
        </div>
    </div>
</div>
<div class="row">
    <div class="col">
        <div class="mb-3"><label class="form-label" for="state"><strong>Estado</strong><br></label>
            <select class="form-select" id="state" required name="state">
                <option value="" selected>Selecione uma opção</option>
                @php 
                    use App\Models\State;
                    $states = State::all();
                @endphp
                @foreach ($states as $state)
                    <option value="{{ $state->id }}" {{ isset($address) && $address->state == $state->id ? 'selected' : '' }}>{{ $state->name }}</option>
                @endforeach
                
            </select></div>
    </div>
    <div class="col">
        <div class="mb-3"><label class="form-label" for="cidade"><strong>Cidade</strong><br></label>
            <select class="form-select" id="city" required name="city">
                <option value="" selected>Selecione uma opção</option>
            </select>
        </div>
    </div>
</div>
<hr>
<div class="row">
    <div class="col">
        <div class="mb-3"><label class="form-label" for="login"><strong>Usuário</strong></label>
            <div class="input-group"><span class="input-group-text">@</span>
                <input class="form-control" type="text" id="login" name="login" placeholder="user.name" required minlength="2" value="{{ isset($user) ? $user->login : '' }}" onchange="validateLogin(this)">
            </div>
        </div>
    </div>
    <div class="col">
        <div class="mb-3"><label class="form-label" for="email"><strong>E-mail</strong></label>
            <!--verificar valiadação de email-->
            <input class="form-control" type="email" id="email" name="email" placeholder="user@example.com" required value="{{ isset($client) ? $client->email : '' }}" onchange="validateEmail(this)">
        </div>
    </div>
</div>
<div class="row">
    <!--ver sobre validação de senha-->
    <div class="col">
        <div class="mb-3"><label class="form-label" for="password"><strong>Senha</strong><br></label>
            <input class="form-control" type="password" id="password" name="password" placeholder="*******" minlength="8">
        </div>
    </div>
    <div class="col">
        <div class="mb-3"><label class="form-label" for="confirm_password"><strong>Confirmar senha</strong><br></label>
            <input class="form-control" type="password" id="confirm_password" name="confirm_password" placeholder="*******" minlength="8">
        </div>
    </div>
</div>
<hr>
<div class="row">
    <div class="col">
        <div class="mb-3"><label class="form-label" for="notes"><strong>Observações</strong><br></label>
            <textarea class="form-control" id="notes" name="notes" rows="3">{{ isset($client) ? $client->notes : '' }}</textarea>
        </div>
    </div>
</div>
<div class="row">
    <div class="col">
        <div class="mb-3"><label class="form-label" for="active"><strong>Situação</strong><br></label>
            <select class="form-select" id="active" name="active">
                <option value="1" {{ isset($client) && $client->active == 1 ? 'selected' : '' }}>Ativo</option>
                <option value="0" {{ isset($client) && $client->active == 0 ? 'selected' : '' }}>Inativo</option>
            </select>
        </div>
    </div>
    <div class="col">
        <div class="mb-3"></div>
    </div>
</div>
<div class="mb-3"><button class="btn btn-primary" type="submit">Salvar</button></div>
