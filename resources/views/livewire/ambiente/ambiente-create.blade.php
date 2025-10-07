<div class="mt-5">

    @if (session()->has('message'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('message') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif


   <div class="card border-0 shadow rounded-3" style="margin-left: 20%; margin-right:20%">
        <h5 class="card-header text-white fw-bold"
            style="background: linear-gradient(to right, rgb(170, 208, 251), #0e75d5);">
            Cadastrar Ambiente
        </h5>

        <div class="card-body" style="background-color: rgba(236, 243, 254, 0.711)">
            <form wire:submit.prevent="store">
                <div class="py-3">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-12 col-sm-10 col-md-8 col-lg-6 col-xl-5 col-xxl-4;" style="width: 600px">

                                <div class="bg-white p-4 rounded shadow-sm border border-light-subtle">

                                    {{-- Nome --}}
                                    <div class="mb-3">
                                        <label for="nome" class="form-label fw-semibold">Nome</label>
                                        <input type="text" class="form-control" id="nome" name="nome"
                                            placeholder="Nome do ambiente" wire:model.defer="nome">
                                        @error('nome')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    {{-- Descrição --}}
                                    <div class="mb-3">
                                        <label for="descricao" class="form-label">Descrição</label>
                                        <textarea class="form-control" id="descricao"
                                            wire:model.defer="descricao"></textarea>
                                        @error('descricao')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>


                                    {{-- status --}}
                                    <div class=mb-3>
                                        <label for="status" class="form-label fw-semibold">Status</label>
                                        <select class="form-select" id="status" name="status" wire:model.defer="status">
                                            <option hidden>Selecione</option>
                                            <option value="1">Ativo</option>
                                            <option value="0">Inativo</option>
                                        </select>
                                        @error('status')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>


                                    {{-- Botão --}}
                                    <html>

                                    <head>
                                        <style>
                                            .botaoCadastrar {
                                                height: 43px;
                                                width:100%;
                                                display: inline-flex;
                                                align-items: center;
                                                justify-content: center;
                                                padding: 1rem 1.5rem;
                                                border: 1px solid #1374ce;
                                                background-color: #ffffff;
                                                color: #1374ce;
                                                border-radius: 0.4rem;
                                                font-size: 1rem;
                                                font-weight: 600;
                                                cursor: pointer;
                                                transition: background-color 0.2s, color 0.2s, border-color 0.2s;
                                                line-height: 1;

                                            }

                                            .botaoCadastrar:hover {
                                                background-color: #1374ce;
                                                color: #ffffff;
                                                border-color:#1374ce;
                                            }
                                        </style>
                                    </head>
                                    <button type="submit" class="botaoCadastrar">
                                        <i class="bi bi-person-plus-fill me-1"></i> Cadastrar Ambiente
                                    </button>

                                    </html>


                                    {{-- Botão Cancelar --}}
                                    <div class="mt-3">
                                        <a href="{{ route('ambiente.index') }}"
                                            class="btn btn-outline-danger w-100 py-2">
                                            <i class="bi bi-x-circle me-1"></i> Cancelar
                                        </a>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>