<div class="row">
    <div class="col-xl-4 col-xxl-3">
        <div class="mb-3">
            <div class="input-group"><span class="input-group-text">N° Ticket #</span><input class="bg-white form-control" type="text" id="id" readonly name="id" value="{{ isset($ticket) ? $ticket->id : 0 }}"></div>
        </div>
    </div>
    <div class="col-xl-4 col-xxl-4">
        <div class="mb-3">
            <div class="input-group"><span class="input-group-text">Data de abertura</span>
                <input class="bg-white form-control" id="opened_at" readonly type="datetime-local" name="opened_at" value="{{ isset($ticket) ? $ticket->opened_at : date('Y-m-d\TH:i:s') }}">
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
                <input class="bg-white form-control" type="text" id="client" readonly required name="client" value="">
                <input type="hidden" id="client_id" name="client_id" value="">
                <button class="btn btn-primary py-0" type="button" data-bs-target="#procurarCliente" data-bs-toggle="modal">
                    <i class="fas fa-search"></i>
                </button>
                <div class="modal fade input-group-text" role="dialog" tabindex="-1" id="procurarCliente" name="procurarCliente" style="padding-top: 0px;background: rgba(234,236,244,0);">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Procurar cliente</h4><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="input-group">
                                    <select class="form-select" name="filtro" id="filtro">
                                        <option value="nome" selected="">Nome</option>
                                        <option value="idCliente">Código</option>
                                        <option value="cpfCnpj">CPF/CNPJ</option>
                                    </select>
                                    <input class="form-control" type="text" name="procurar" id="procurar" style="width: 461px;">
                                    <button class="btn btn-primary" type="button" onclick="filtrarCliente()">
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
                                    <tbody id="dados" name="dados">
                                        
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
                <select class="form-select" id="sector" required name="sector">
                    <option value="">Selecione uma opção</option>
                    @php 
                        use App\Models\Sector;
                        $sectors = Sector::all();
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
                    @php 
                        use App\Models\User;
                        $users = User::all();
                    @endphp
                    @foreach ($users as $user)
                        <option value="{{ $user->id }}" {{ isset($ticket) && $ticket->user_id == $user->id ? 'selected' : '' }}>{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    <div class="col-xl-5 col-xxl-4">
        <div class="mb-3">
            <div class="input-group"><span class="input-group-text">Estado</span>
                <input class="bg-white form-control" type="text" id="status" name="status" readonly value="">
                <input type="hidden" name="status_id" value="">
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xl-5 col-xxl-5">
        <div class="mb-3">
            <div class="input-group"><span class="input-group-text">Categoria</span>
                <select class="form-select" id="category" required name="category">
                    <option value="">Selecione uma opção</option>
                    @php 
                        use App\Models\Category;
                        $categories = Category::all();
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
                        use App\Models\Priority;
                        $priorities = Priority::all();
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
    <a class="btn btn-primary" role="button" href="filaAtendimentos.php">Voltar</a>
</div>
