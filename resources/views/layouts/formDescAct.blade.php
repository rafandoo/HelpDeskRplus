<div class="row">
    <input type="hidden" id="id" name="id">
    <div class="col">
        <div class="mb-3">
            <label class="form-label" for="description">
                <strong>Descrição</strong><br>
            </label>
            <input class="form-control" type="text" id="description" name="description" value="{{ old('description') ?? $object->description }}">
        </div>
    </div>
    <div class="col">
        <div class="mb-3">
            <label class="form-label" for="active">
                <strong>Situação</strong><br>
            </label>
            <select class="form-select" id="active" name="active">
                <option value="1" {{ $object->active == 1 ? 'selected' : '' }}>Ativo</option>
                <option value="0" {{ $object->active == 0 ? 'selected' : '' }}>Inativo</option>
            </select>
        </div>
    </div>
</div>
<div class="mb-3"><button class="btn btn-primary" type="submit">Salvar</button></div>