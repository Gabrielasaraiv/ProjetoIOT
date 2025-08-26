<div class="container mt-4">
    <div class="row mb-3">
        <div class="col-md-6">
            <h2 class="card-header text-white fw-bold">Ambientes</h2>
        </div>
        <div class="col-md-6 text-end">
            <html>

            <head>
                <style>
                    .botaoNovo {

                        background-color: #6c9bdc;
                        color: white;
                        border: #7d94ed;
                        border-radius: 5px;
                    }

                    .botaoNovo:hover {
                        background-color: #5b7eff;
                        color: #fff
                    }
                </style>
            </head>
            <a href="{{ route('ambiente.create') }}" class="btn botaoNovo">
                <i class="bi bi-plus-circle"></i> Novo Ambiente
            </a>

            </html>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            {{-- pesquisa --}}
            <div class="col-md-6 d-flex">
                <select wire:model="perPage" class="form-select me-2" style="width: 150px">
                    <option value="10">10 por página</option>
                    <option value="25">25 por página</option>
                    <option value="50">50 por página</option>
                    <option value="100">100 por página</option>
                </select>

                <input placeholder="Buscar Alunos..." wire:model.live="search" class="form-control me-2">
        
            </div>

            @if (session()->has('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

            @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif

            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>descrição</th>
                            <th>Status</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($ambientes as $ambiente)
                            <tr>
                                <td>{{ $ambiente->id }}</td>
                                <td>{{ $ambiente->nome }}</td>
                                <td>{{ $ambiente->descricao }}</td>
                                <td>{{ $ambiente->status }}</td>
                              
                                <td>
                                    <a href="{{ route('ambiente.edit', ['id' => $ambiente->id]) }}"
                                        class="btn btn-sm btn-warning">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <a href="" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#deleteModal"
                                        wire:click="abrirModalExclusao({{ $ambiente->id }})">

                                        <i class="bi bi-trash"></i>
                                    </a>


                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center">Nenhum Ambiente encontrado.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="mt-3">
                {{ $ambientes->links() }}
            </div>

        </div>
    </div>

    <div wire:ignore.self class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Excluir Ambiente</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <p>Tem certeza que deseja excluir o ambiente?</p>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>

                    <button type="button" class="btn btn-danger" wire:click="delete"
                        data-bs-dismiss="modal">Excluir</button>
                </div>
            </div>
        </div>
    </div>
</div>