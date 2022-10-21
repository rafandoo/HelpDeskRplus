<div class="row">
    <input type="hidden" id="id" name="id" value="{{ isset($user) ? $user->id : 0 }}">
    <div class="col">
        <div class="mb-3"><label class="form-label" for="login"><strong>Usuário</strong></label>
            <div class="input-group">
                <span class="input-group-text">@</span>
                <input class="form-control" type="text" id="login" name="login" placeholder="user.name" required minlenght="3" value="{{ isset($user) ? $user->login : '' }}" onchange="validateLogin(this)">
            </div>
        </div>
    </div>
    <div class="col">
        <div class="mb-3"><label class="form-label" for="email"><strong>E-mail</strong></label>
            <input class="form-control" type="email" id="email" name="email" placeholder="user@example.com" required value="{{ isset($user) ? $user->email : '' }}" onchange="validateEmail(this)">
        </div>
    </div>
</div>
<div class="row">
    <div class="col">
        <div class="mb-3"><label class="form-label" for="name">
            <strong>Nome</strong></label>
            <input class="form-control" type="text" id="name" name="name" placeholder="John" required value="{{ isset($user) ? $user->name : '' }}">
        </div>
    </div>
    <div class="col">
        <div class="mb-3"><label class="form-label" for="last_name">
            <strong>Sobrenome</strong><br></label>
            <input class="form-control" type="text" id="last_name" name="last_name" placeholder="Doe" required value="{{ isset($user) ? $user->last_name : '' }}">
        </div>
    </div>
</div>
<div class="row">
    <div class="col">
        <div class="mb-3">
            <label class="form-label" for="password"><strong>Senha</strong><br></label>
            @if (isset($user))
                <input class="form-control" type="password" id="password" name="password" placeholder="********" minlenght="8" onchange="validatePassword(this)">
            @else
                <input class="form-control" type="password" id="password" name="password" placeholder="********" minlenght="8" onchange="validatePassword(this)" required>
            @endif
        </div>
    </div>
    <div class="col">
        <div class="mb-3">
            <label class="form-label" for="confirm_password"><strong>Confirmar senha</strong><br></label>
            @if (isset($user))
                <input class="form-control" type="password" id="confirm_password" name="confirm_password" placeholder="********" minlenght="8" onchange="confirmPassword(this)">
            @else
                <input class="form-control" type="password" id="confirm_password" name="confirm_password" placeholder="********" minlenght="8" onchange="confirmPassword(this)" required>
            @endif
        </div>
    </div>
</div>
<div class="row">
    <div class="col">
        <div class="mb-3"><label class="form-label" for="access_level"><strong>Nível&nbsp;de acesso</strong><br></label>
            <select class="form-select" id="access_level" required name="access_level">
                <option value="0">Selecione um nível de acesso</option>
                @php
                    $access_levels = App\Models\AccessLevel::where('id', '>', 1)->get();
                @endphp
                @foreach ($access_levels as $access_level)
                    <option value="{{ $access_level->id }}" {{ isset($user) && $user->access_level == $access_level->id ? 'selected' : '' }}>{{ $access_level->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="col">
        <div class="mb-3"><label class="form-label" for="active"><strong>Situação</strong><br></label>
            <select class="form-select" id="active" required name="active">
                <option value="1" {{ isset($client) && $client->active == 1 ? 'selected' : '' }}>Ativo</option>
                <option value="0" {{ isset($client) && $client->active == 0 ? 'selected' : '' }}>Inativo</option>
            </select>
        </div>
    </div>
</div>
<div class="mb-3"><button class="btn btn-primary" type="submit">Salvar</button></div>
