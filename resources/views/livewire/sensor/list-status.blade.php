<div class="container-fluid bg-light min-vh-100 py-4" style="background-color: #f0f4f8;"> <!-- Fundo suave da página -->
    <div class="container-md">
        <div class="row align-items-center mb-4">
            <div class="col-md-6">
                <h2 class="mb-0 text-dark">
                    <i class="bi bi-toggles"></i> Status Sensores
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
                <a href="{{ route('sensor.index') }}" class="btn botaoNovo">
                    <i class="bi bi-chevron-double-left"></i> Voltar
                </a>

                <a href="{{ route('sensor.create') }}" class="btn botaoNovo">
                    <i class="bi bi-plus-circle"></i> Novo Sensor
                </a>

                </html>
            </div>
        </div>

        <div class="card shadow-lg border-0 rounded-4 bg-white" style="margin-left: 10%; margin-right:10%">
            <div class="card-body">
                <div class="row mb-4 align-items-center">
                    <div class="col-md-6 mb-2 mb-md-0">

                    </div>
                </div>

                {{-- pesquisa --}}
                <div class="col-md-6 d-flex">

                    <input placeholder="Buscar..." wire:model.live="search" class="form-control me-2">

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

                <div class="table-responsive" >
                    <table class="table table-hover align-middle">
                        <thead class="bg-info text-white" > 
                            <tr>
                                <th>ID</th>
                                <th>Código</th>
                                <th>Tipo</th>
                                <th >Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($sensores as $sensor)
                                <tr>
                                    <td>{{ $sensor->id }}</td>
                                    <td>{{ $sensor->codigo }}</td>
                                    <td>{{ $sensor->tipo }}</td>
                                    <td>
                                        <div class="form-check form-switch d-flex align-items-center">
                                            <input class="form-check-input me-4" type="checkbox" role="switch"
                                                id="statusSwitch{{ $sensor->id }}" {{-- O atributo @checked define se o switch estará ligado (true) ou desligado (false) --}}
                                                @checked($sensor->status == 1) {{-- Chamamos o método Livewire no evento de clique/mudança --}}
                                                wire:click="toggleStatus({{ $sensor->id }})">
                                            {{-- Exibe o status textual ao lado do switch --}}
                                            <label class="form-check-label" for="statusSwitch{{ $sensor->id }}">
                                                {{ $sensor->status == 1 ? 'Ativo' : 'Inativo' }}
                                            </label>
                                        </div>

                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center">Nenhum Sensor encontrado.</td>
                                </tr>
                            @endforelse
                        </tbody>
                        </tbody>
                    </table>


                    <div class="d-flex flex-column align-items-center mt-3">
                        <div class="mb-2">
                            Mostrando {{ $sensores->firstItem() }} até {{ $sensores->lastItem() }} de
                            {{ $sensores->total() }} resultados
                        </div>

                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                                {{-- Link Anterior --}}
                                <li class="page-item {{ $sensores->onFirstPage() ? 'disabled' : '' }}">
                                    <a href="#" class="page-link" wire:click.prevent="previousPage"
                                        aria-label="Previous">
                                        <span aria-hidden="true">&laquo;</span>
                                    </a>
                                </li>

                                {{-- Links das páginas --}}
                                @foreach ($sensores->getUrlRange(1, $sensores->lastPage()) as $page => $url)
                                    <li class="page-item {{ $sensores->currentPage() == $page ? 'active' : '' }}">
                                        <a href="#" class="page-link"
                                            wire:click.prevent="gotoPage({{ $page }})">{{ $page }}</a>
                                    </li>
                                @endforeach

                                {{-- Link Próximo --}}
                                <li class="page-item {{ $sensores->hasMorePages() ? '' : 'disabled' }}">
                                    <a href="#" class="page-link" wire:click.prevent="nextPage" aria-label="Next">
                                        <span aria-hidden="true">&raquo;</span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
