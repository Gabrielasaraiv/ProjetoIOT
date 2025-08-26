<div class="mt-5">

    @if (session()->has('message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif


    {{-- Cartão principal --}}
    <div class="card border-0 shadow rounded-3" style="margin-left: 20%; margin-right:20%">
        <h5 class="card-header text-white fw-bold" style="background: linear-gradient(to right, #fff585, #fd85ad);">
            Cadastro de Sensor
        </h5>

        <div class="card-body" style="background-color: rgb(255, 243, 253)">
            <form wire:submit.prevent="store">
                <div class="py-3">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-12 col-sm-10 col-md-8 col-lg-6 col-xl-5 col-xxl-4; widht:100%">

                                <div class="bg-white p-4 rounded shadow-sm border border-light-subtle">

                                 
                                    <div class="mb-3">
                                        <label for="codigo" class="form-label fw-semibold">Código</label>
                                        <input type="text" class="form-control" id="codigo" name="codigo"
                                            placeholder="Código" wire:model.defer="codigo">
                                        @error('codigo')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                
                                    <div class=mb-3>
                                        <label for="tipo" class="form-label fw-semibold">Tipo</label>
                                        <select class="form-select" id="tipo" name="tipo"
                                            wire:model.defer="tipo">
                                            <option hidden>Selecione</option>
                                            <option value="luminosidade">Luminosidade</option>
                                            <option value="rfid">Rfid</option>
                                            <option value="infravermelho">Infravermelho</option>
                                            <option value="temperartura">Temperatura</option>
                                            <option value="umidade">Umidade</option>

                                        </select>
                                        @error('tipo')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    
                                    <div class="mb-3">
                                        <label for="matricula" class="form-label fw-semibold">Matrícula</label>
                                        <input type="integer" class="form-control" id="matricula" name="matricula"
                                            placeholder="0000" wire:model.defer="matricula">
                                        @error('matricula')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    {{-- Senha --}}
                                    <div class="mb-3">
                                        <label for="password" class="form-label">Senha</label>
                                        <input type="password" class="form-control" id="password" wire:model="password"
                                            placeholder="Digite sua senha">
                                        @error('password')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>


                                    {{-- Lembrar informações --}}
                                    <div class="form-check mb-4">
                                        <input class="form-check-input" type="checkbox" value="" id="rememberMe">
                                        <label class="form-check-label text-muted" for="rememberMe">
                                            Salvar informações
                                        </label>
                                    </div>

                                    {{-- Botão --}}
                                    <html>

                                    <head>
                                        <style>
                                            .botaoCadastrar {

                                                width: 293px;
                                                height: 40px;
                                                background-color: #ff5e86;
                                                color: white;
                                                border: #fd85ad;
                                                border-radius: 5px;
                                            }

                                            .botaoCadastrar:hover {
                                                background-color: #c94163;
                                                color: #fff
                                            }
                                        </style>
                                    </head>
                                    <button type="submit" class="botaoCadastrar">
                                        <i class="bi bi-person-plus-fill me-1"></i> Cadastrar Funcionário
                                    </button>

                                    </html>

                                    @if (auth()->check())
                                        {{-- Botão Cancelar --}}
                                        <div class="mt-3">
                                            <a href="{{ route('funcionario.index') }}"
                                                class="btn btn-outline-danger w-100 py-2">
                                                <i class="bi bi-x-circle me-1"></i> Cancelar
                                            </a>
                                        </div>
                                    @endif
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>