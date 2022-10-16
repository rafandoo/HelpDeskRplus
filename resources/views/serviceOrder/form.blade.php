<div class="row">
    <div class="col-xl-4 col-xxl-3">
        <div class="mb-3">
            <div class="input-group"><span class="input-group-text">Ticket #</span><input class="bg-white form-control" type="text" id="ticket_id" readonly name="ticket_id" value="{{ isset($serviceOrder->ticket_id) ? $serviceOrder->ticket_id : '' }}"></div>
        </div>
    </div>
    <div class="col-xl-4 col-xxl-4">
        <div class="mb-3">
            <div class="input-group"><span class="input-group-text">Total horas</span><input class="bg-white form-control" id="amount_hours" name="amount_hours" readonly type="time"></div>
        </div>
    </div>
    <div class="col-xl-4 col-xxl-5">
        <div class="mb-3">
            <div class="input-group"><span class="input-group-text">Valor do serviço R$</span><input class="bg-white form-control" type="text" id="value" name="value" placeholder="0,00" required value="{{ isset($serviceOrder->value) ? $serviceOrder->value : '0,00' }}"></div>
        </div>
    </div>
</div>
<hr style="margin-top: 0px;">
<div class="row">
    <div class="col">
        <div class="mb-3"><label class="form-label" for="description"><strong>Descrição</strong><br></label><textarea class="form-control" id="description" name="description">{{ isset($serviceOrder->description) ? $serviceOrder->description : '' }}</textarea></div>
    </div>
</div>
<div class="mb-3">
    <button class="btn btn-primary" type="submit" style="margin-right: 10px;">Salvar</button>
    <a class="btn btn-primary" role="button" style="margin-right: 10px;" href="#" onclick="alert('Em desenvolvimento')">Imprimir</a>
    <a class="btn btn-primary" role="button" style="margin-right: 10px;" href="{{ route('ticket.edit', $serviceOrder->ticket_id) }}">Voltar</a>
</div>
