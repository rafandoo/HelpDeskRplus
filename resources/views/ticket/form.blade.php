<div class="row">
    <div class="col-xl-4 col-xxl-3">
        <div class="mb-3">
            <div class="input-group"><span class="input-group-text">N° Ticket #</span><input class="bg-white form-control" type="text" id="id" readonly name="id" value="{{ isset($ticket) ? $ticket->id : 0 }}"></div>
        </div>
    </div>
    <div class="col-xl-4 col-xxl-4">
        <div class="mb-3">
            <div class="input-group"><span class="input-group-text">Data de abertura</span>
                <input class="bg-white form-control" id="created_at" readonly type="datetime-local" name="created_at" value="{{ isset($ticket) ? $ticket->created_at : date('Y-m-d\TH:i:s') }}">
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-xxl-5 offset-xl-0">
        <div class="mb-3">
            <div class="input-group"><span class="input-group-text">Data atualização</span>
                <input class="bg-white form-control" id="updated_at" readonly type="datetime-local" name="updated_at" value="{{ isset($ticket) ? $ticket->updated_at : '' }}">
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-7 col-xl-7 col-xxl-8">
        <div class="mb-3">
            <div class="input-group"><span class="input-group-text">Cliente</span>
                <input class="bg-white form-control" type="text" id="client" readonly required name="client" value="{{ isset($ticket) ? $ticket->client->name : '' }}">
                <input type="hidden" id="client_id" name="client_id" value="{{ isset($ticket) ? $ticket->client_id : '' }}">
                <button class="btn btn-primary" type="button" data-bs-target="#searchClient" data-bs-toggle="modal">
                    <i class="fas fa-search"></i>
                </button>
                <div class="modal fade input-group-text" role="dialog" tabindex="-1" id="searchClient" name="searchClient" style="padding-top: 0px;background: rgba(234,236,244,0);">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Procurar cliente</h4><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="input-group">
                                    <select class="form-select" name="filter" id="filter">
                                        <option value="name">Nome</option>
                                        <option value="client_id">Código</option>
                                        <option value="cpf_cnpj">CPF/CNPJ</option>
                                    </select>
                                    <input class="form-control" type="text" name="search" id="search" style="width: 461px;">
                                    <button class="btn btn-primary" type="button" id="searchButton" name="searchButton">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="table-responsive" role="grid">
                                <table class="table table-hover my-0">
                                    <thead>
                                        <tr>
                                            <th>Código</th>
                                            <th>Nome</th>
                                            <th>CFP/CNPJ</th>
                                            <th>Situação</th>
                                        </tr>
                                    </thead>
                                    <tbody id="clients" name="clients">
                                        
                                    </tbody>
                                </table>
                            </div>
                            <div class="modal-footer"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="mb-3">
            <div class="input-group"><span class="input-group-text">Contato</span>
                <input class="form-control" type="text" id="contact" required name="contact" value="{{ isset($ticket) ? $ticket->contact : '' }}">
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xl-5 col-xxl-4">
        <div class="mb-3">
            <div class="input-group"><span class="input-group-text">Setor</span>
                <select class="form-select" id="sector_id" required name="sector_id">
                    <option value="">Selecione uma opção</option>
                    @php 
                        $sectors = App\Models\Sector::all();
                    @endphp
                    @foreach ($sectors as $sector)
                        <option value="{{ $sector->id }}" {{ isset($ticket) && $ticket->sector_id == $sector->id ? 'selected' : '' }}>{{ $sector->description }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    <div class="col-xl-7 col-xxl-4">
        <div class="mb-3">
            <div class="input-group"><span class="input-group-text">Técnico</span>
                <select class="form-select" id="user_id" required name="user_id">
                    <option value="">Selecione uma opção</option>
                    @if (isset($ticket))
                        @php 
                            $user = App\Models\User::find($ticket->user_id);
                        @endphp
                        <option value="{{ $user->id }}" {{ isset($ticket) && $ticket->user_id == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                    @endif
                </select>
            </div>
        </div>
    </div>
    <div class="col-xl-5 col-xxl-4">
        <div class="mb-3">
            <div class="input-group"><span class="input-group-text">Estado</span>
                @if (isset($ticket))
                    <input class="bg-white form-control" type="text" id="status" name="status" readonly placeholder="{{ App\Models\Status::find($ticket->status_id)->description }}">
                    <input type="hidden" id="status_id" name="status_id" value="{{ $ticket->status_id }}">
                @else
                    <input class="bg-white form-control" type="text" id="status" name="status" readonly placeholder="{{ App\Models\Status::find(1)->description }}">
                    <input type="hidden" id="status_id" name="status_id" value="1">
                @endif
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xl-5 col-xxl-5">
        <div class="mb-3">
            <div class="input-group"><span class="input-group-text">Categoria</span>
                <select class="form-select" id="category_id" required name="category_id">
                    <option value="">Selecione uma opção</option>
                    @php 
                        $categories = App\Models\Category::all();
                    @endphp
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ isset($ticket) && $ticket->category_id == $category->id ? 'selected' : '' }}>{{ $category->description }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
</div>
<hr style="margin-top: 0px;">
<div class="row">
    <div class="col-xl-5 col-xxl-4">
        <div class="mb-3">
            <div class="input-group"><span class="input-group-text">Prioridade</span>
                <select class="form-select" id="priority_id" required name="priority_id">
                    <option value="">Selecione uma opção</option>
                    @php 
                        $priorities = App\Models\Priority::all();
                    @endphp
                    @foreach ($priorities as $priority)
                        <option value="{{ $priority->id }}" {{ isset($ticket) && $ticket->priority_id == $priority->id ? 'selected' : '' }}>{{ $priority->description }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="mb-3">
            <div class="input-group"><span class="input-group-text">Título</span>
                <input class="form-control" type="text" id="title" name="title" value="{{ isset($ticket) ? $ticket->title : '' }}">
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col">
        <div class="mb-3"><label class="form-label" for="description"><strong>Descrição</strong><br></label>
            <textarea class="form-control" id="summernote" name="description">{{ isset($ticket) ? $ticket->description : '' }}</textarea>
        </div>
    </div>
</div>
<div class="mb-3">
    <button class="btn btn-primary" type="submit" style="margin-right: 10px;">Salvar</button>
    <a class="btn btn-primary" role="button" href="{{ route('ticket.index') }}">Voltar</a>
</div>
