<div class="container-fluid bg-light min-vh-100 py-4" style="background-color: #f0f4f8;"> <!-- Fundo suave da página -->
    <div class="container">
        <div class="row align-items-center mb-4">
            <div class="col-md-6">
                <h2 class="mb-0 text-dark">
                    <i class="bi bi-building"></i> Ambientes
                </h2>
            </div>
            <div class="col-md-6 text-end">
                <html>

                <head>
                    <style>
                        .botaoNovo {

                            background-color: #4b96ff;
                            color: white;
                            border: #7d94ed;
                            border-radius: 5px;
                        }

                        .botaoNovo:hover {
                            background-color: #3858c9;
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

        <div class="card shadow-lg border-0 rounded-4 bg-white">
            <div class="card-body">
                <div class="row mb-4 align-items-center">
                    <div class="col-md-6 mb-2 mb-md-0">

                    </div>
                </div>

                {{-- pesquisa --}}
                <div class="col-md-6 d-flex">

                    <input placeholder="Buscar Ambientes..." wire:model.live="search" class="form-control me-2">

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
                    <table class="table table-hover align-middle">
                        <thead class="bg-info text-white">
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
                    <div class="d-flex flex-column align-items-center mt-3">
                        <div class="mb-2">
                            Mostrando {{ $ambientes->firstItem() }} até {{ $ambientes->lastItem() }} de
                            {{ $ambientes->total() }} resultados
                        </div>

                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                                {{-- Link Anterior --}}
                                <li class="page-item {{ $ambientes->onFirstPage() ? 'disabled' : '' }}">
                                    <a href="#" class="page-link" wire:click.prevent="previousPage"
                                        aria-label="Previous">
                                        <span aria-hidden="true">&laquo;</span>
                                    </a>
                                </li>

                                {{-- Links das páginas --}}
                                @foreach ($ambientes->getUrlRange(1, $ambientes->lastPage()) as $page => $url)
                                    <li class="page-item {{ $ambientes->currentPage() == $page ? 'active' : '' }}">
                                        <a href="#" class="page-link"
                                            wire:click.prevent="gotoPage({{ $page }})">{{ $page }}</a>
                                    </li>
                                @endforeach

                                {{-- Link Próximo --}}
                                <li class="page-item {{ $ambientes->hasMorePages() ? '' : 'disabled' }}">
                                    <a href="#" class="page-link" wire:click.prevent="nextPage" aria-label="Next">
                                        <span aria-hidden="true">&raquo;</span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>

                <div wire:ignore.self class="modal fade" id="deleteModal" tabindex="-1"
                    aria-labelledby="deleteModalLabel" aria-hidden="true">
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
                                <button type="button" class="btn btn-secondary"
                                    data-bs-dismiss="modal">Cancelar</button>

                                <button type="button" class="btn btn-danger" wire:click="delete"
                                    data-bs-dismiss="modal">Excluir</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>