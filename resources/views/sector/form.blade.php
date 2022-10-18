<div class="row">
    <input type="hidden" id="id" name="id" value="{{ isset($sector->id) ? $sector->id : 0 }}">
    <div class="col">
        <div class="mb-3">
            <label class="form-label" for="description">
                <strong>Descrição</strong><br>
            </label>
            <input class="form-control" type="text" id="description" name="description" required value="{{ isset($sector) ? $sector->description : '' }}">
        </div>
    </div>
    <div class="col">
        <div class="mb-3">
            <label class="form-label" for="active">
                <strong>Situação</strong><br>
            </label>
            <select class="form-select" id="active" name="active">
                <option value="1" {{ isset($sector) && $sector->active == 1 ? 'selected' : '' }}>Ativo</option>
                <option value="0" {{ isset($sector) && $sector->active == 0 ? 'selected' : '' }}>Inativo</option>
            </select>
        </div>
    </div>
</div>
<hr>
<div class="row">
    <div class="col">
        <div class="mb-3">
            <div class="input-group">
                <span class="input-group-text">Técnicos</span>
                <select class="form-select" required id="user_id" name="user_id">
                    @php $users = App\Models\User::where('active', 1)->where('access_level', '>', 1)->get(); @endphp
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
                <button class="btn btn-success" type="button" id="addUser">
                    <i class="fas fa-plus"></i>
                </button>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col">
        <div class="table-responsive table mt-2" id="dataTable-1" role="grid" aria-describedby="dataTable_info">
            <table class="table my-0" id="dataTable">
                <thead>
                    <tr>
                        <th>Código</th>
                        <th>Técnico</th>
                        <th class="text-center">Administador</th>
                    </tr>
                </thead>
                <tbody id="users">
                    @php $teams = App\Models\Team::where('sector_id', $sector->id)->get(); @endphp
                    @foreach ($teams as $team)
                        <tr class="align-middle">
                            <td>{{ $team->user_id }}</td>
                            <td>{{ @App\Models\User::find($team->user_id)->name }}</td>
                            <td class="text-center"><input type="checkbox" id="admin" {{ $team->admin == 1 ? 'checked' : '' }}></td>
                            <td class="text-center"><a class="btn btn-outline-danger border rounded-circle" id="removeBtn" role="button" style="border-radius: 30px;border-width: 1px;"><i class="far fa-trash-alt"></i></a></td>
                        </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td style="padding: 0px;"></td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
<div class="mb-3"><button class="btn btn-primary" type="submit">Salvar</button></div>