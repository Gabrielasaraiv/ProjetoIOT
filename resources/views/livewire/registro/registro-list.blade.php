<div class="container-fluid bg-light min-vh-100 py-4" style="background-color: #f0f4f8;"> <!-- Fundo suave da página -->
    <div class="container">
        <div class="row align-items-center mb-4">
            <div class="col-md-6">
                <h2 class="mb-0 text-dark">
                    <i class="bi bi-collection-fill"></i> Registros
                </h2>
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

                    <input placeholder="Buscar Registros..." wire:model.live="search" class="form-control me-2">

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
                        <thead class="bg-info text-white"> <!-- Cabeçalho da tabela com fundo azul suave -->
                            <tr>
                                <th>ID</th>
                                <th>sensor_id</th>
                                <th>valor</th>
                                <th>unidade</th>
                                <th>data_hora</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($registros as $registro)
                                <tr>
                                    <td>{{ $registro->id }}</td>
                                    <td>{{ $registro->sensor_id }}</td>
                                    <td>{{ $registro->valor }}</td>
                                    <td>{{ $registro->unidade }}</td>
                                    <td>{{ $registro->data_hora }}</td>

                                    <td>
                                        <a href="" class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                            data-bs-target="#deleteModal"
                                            wire:click="abrirModalExclusao({{ $registro->id }})">

                                            <i class="bi bi-trash"></i>
                                        </a>


                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center">Nenhum Registro encontrado.</td>
                                </tr>
                            @endforelse
                        </tbody>
                        </tbody>
                    </table>


                    <div class="d-flex flex-column align-items-center mt-3">
                        <div class="mb-2">
                            Mostrando {{ $registros->firstItem() }} até {{ $registros->lastItem() }} de
                            {{ $registros->total() }} resultados
                        </div>

                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                                {{-- Link Anterior --}}
                                <li class="page-item {{ $registros->onFirstPage() ? 'disabled' : '' }}">
                                    <a href="#" class="page-link" wire:click.prevent="previousPage"
                                        aria-label="Previous">
                                        <span aria-hidden="true">&laquo;</span>
                                    </a>
                                </li>

                                {{-- Links das páginas --}}
                                @foreach ($registros->getUrlRange(1, $registros->lastPage()) as $page => $url)
                                    <li class="page-item {{ $registros->currentPage() == $page ? 'active' : '' }}">
                                        <a href="#" class="page-link"
                                            wire:click.prevent="gotoPage({{ $page }})">{{ $page }}</a>
                                    </li>
                                @endforeach

                                {{-- Link Próximo --}}
                                <li class="page-item {{ $registros->hasMorePages() ? '' : 'disabled' }}">
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
                                <h5 class="modal-title">Excluir Registro</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                            </div>
                            <div class="modal-body">
                                <p>Tem certeza que deseja excluir o registro?</p>

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
