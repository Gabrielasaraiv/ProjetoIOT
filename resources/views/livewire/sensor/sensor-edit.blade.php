<div class="mt-5">

    @if (session()->has('message'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('message') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif


    {{-- Cartão principal --}}
    <div class="card border-0 shadow rounded-3" style="margin-left: 20%; margin-right:20%">
        <h5 class="card-header text-white fw-bold"
            style="background: linear-gradient(to right, rgb(170, 208, 251), #0e75d5);">
            Editar Sensor
        </h5>

        <div class="card-body" style="background-color:rgba(236, 243, 254, 0.711)">
            <form wire:submit.prevent="salvar">
                <div class="py-3">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-12 col-sm-10 col-md-8 col-lg-6 col-xl-5 col-xxl-4;" style="width: 600px">

                                <div class="bg-white p-4 rounded shadow-sm border border-light-subtle">
                                    <div class=mb-3>
                                        <label for="ambienteId" class="form-label fw-semibold">Ambiente</label>
                                        <select class="form-select" id="ambienteId" name="ambienteId"
                                            wire:model.defer="ambienteId">
                                            <option hidden>Selecione</option>
                                            @foreach ($ambientes as $a)
                                            <option value="{{ $a->id }}">{{ $a->nome }}</option>
                                            @endforeach
                                        </select>
                                    </div>


                                    <div class="mb-3">
                                        <label for="codigo" class="form-label fw-semibold">Código</label>
                                        <input type="text" class="form-control" id="nome" name="codigo"
                                            placeholder="Código do sensor" wire:model.defer="codigo">
                                        @error('codigo')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    {{-- --}}
                                    <div class=mb-3>
                                        <label for="tipo" class="form-label fw-semibold">Tipo de
                                            Sensor</label>
                                        <select class="form-select" id="tipo" name="tipo" wire:model.defer="tipo">
                                            <option hidden>Selecione</option>
                                            <option value="Luminosidade">Luminosidade</option>
                                            <option value="Rfid">Rfid</option>
                                            <option value="Infravermelho">Infravermelho</option>
                                            <option value="Temperatura">Temperatura</option>
                                            <option value="Umidade">Umidade</option>

                                        </select>
                                        @error('tipo')
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


                                    <html>

                                    <head>
                                        <style>
                                            .botaoEditar {
                                                height: 43px;
                                                width: 100%;
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

                                            .botaoEditar:hover {
                                                background-color: #1374ce;
                                                color: #ffffff;
                                                border-color: #1374ce;
                                            }
                                        </style>
                                    </head>
                                    <button type="submit" class="botaoEditar">
                                        <i class="bi bi-pencil-square me-1"></i> Editar Sensor
                                    </button>

                                    </html>



                                    {{-- Botão Cancelar --}}
                                    <div class="mt-3">
                                        <a href="{{ route('sensor.index') }}" class="btn btn-outline-danger w-100 py-2">
                                            <i class="bi bi-x-circle me-1"></i> Cancelar
                                        </a>
                                    </div>
            </form>
        </div>
    </div>
</div>