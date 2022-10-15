<div class="row">
<input type="hidden" name="ticket_id" value="{{ $ticket->id }}">
<input type="hidden" name="user_id" value="{{ $ticket->user_id }}">
<!-- Auth::user()->id-->
<div class="col-xl-4 col-xxl-3">
    <div class="mb-3">
        <div class="input-group">
            <span class="input-group-text">Contato</span>
            <input class="bg-white form-control" type="text" id="contact" readonly name="contact" value="{{ $ticket->contact }}">
        </div>
    </div>
</div>
<div class="col-xl-8 col-xxl-5">
    <div class="mb-3">
        <div class="input-group">
            <span class="input-group-text">Cliente</span>
            <input class="bg-white form-control" type="text" id="client" name="client" readonly value="{{ $ticket->client->name }}">
        </div>
    </div>
</div>
<div class="col-xl-4 col-xxl-4">
    <div class="mb-3">
        <div class="input-group"><span class="input-group-text">Estado</span><select class="form-select" id="status_id" required name="status_id">
                <option value="">Selecione uma opção</option>
                @php
                    $status = \App\Models\Status::all();
                @endphp
                @foreach ($status as $s)
                    @if ($s->id == $ticket->status_id)
                        <option value="{{ $s->id }}" selected>{{ $s->description }}</option>
                    @else
                        <option value="{{ $s->id }}">{{ $s->description }}</option>
                    @endif
                @endforeach
            </select>
        </div>
    </div>
</div>
</div>
<hr style="margin-top: 0px;">
<div class="row">
<div class="col-xl-4 col-xxl-4">
    <div class="mb-3">
        <div class="input-group">
            <span class="input-group-text">Data</span>
            <input class="bg-white form-control" id="created_at" name="created_at" type="date" readonly value="{{ date('Y-m-d') }}">
        </div>
    </div>
</div>
<div class="col-xl-4 col-xxl-4">
    <div class="mb-3">
        <div class="input-group">
            <span class="input-group-text">Hora inicial</span>
            <input class="bg-white form-control" id="initial_time" name="initial_time" readonly type="time" value="{{ date('H:i') }}">
        </div>
    </div>
</div>
<div class="col-xl-4 col-xxl-4">
    <div class="mb-3">
        <div class="input-group">
            <span class="input-group-text">Hora final</span>
            <input class="bg-white form-control" id="final_time" name="final_time" type="time" required readonly>
            <button class="btn btn-secondary" type="button" id="btnFinalTime">
                <i class="far fa-clock"></i>
            </button>
        </div>
    </div>
</div>
</div>
<div class="row">
<div class="col">
    <div class="mb-3">
        <label class="form-label" for="description">
            <strong>Descrição</strong><br>
        </label>
        <textarea class="form-control" id="summernote" name="description"></textarea>
    </div>
</div>
</div>
<div class="mb-3">
<button id="btnSave" disabled class="btn btn-primary" type="submit" style="margin-right: 10px;">Salvar</button>
<a class="btn btn-primary" role="button" style="margin-right: 10px;" href="{{ route('ticket.edit', $ticket->id) }}">Voltar</a>
</div>