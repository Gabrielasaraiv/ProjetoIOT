<div class="mt-5">

    @if (session()->has('message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif


    {{-- Cartão principal --}}
    <div class="card border-0 shadow rounded-3" style="margin-left: 20%; margin-right:20%">
        <h5 class="card-header text-white fw-bold" style="background: linear-gradient(to right, #a0eef6, #5db1ff);">
            Cadastro de Sensor
        </h5>

        <div class="card-body" style="background-color:rgb(236, 246, 254)">
            <form wire:submit.prevent="store">
                <div class=mb-3>
                    <label for="ambiente_id" class="form-label fw-semibold">Ambiente</label>
                    <select class="form-select" id="ambiente_id" name="ambiente_id" wire:model.defer="ambiente_id">
                        <option hidden>Selecione</option>
                        @foreach ($ambientes as $a)
                            <option value="{{ $a->id }}">{{ $a->nome }}</option>
                        @endforeach
                    </select>
                    @error('ambiente_id')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>


                {{--  --}}
                <div class="mb-3">
                    <label for="codigo" class="form-label fw-semibold">Código</label>
                    <input type="text" class="form-control" id="nome" name="codigo"
                        placeholder="Código do sensor" wire:model.defer="codigo">
                    @error('codigo')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                {{--  --}}
                <div class=mb-3>
                    <label for="tipo" class="form-label fw-semibold">Tipo de Sensor</label>
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
                    <textarea class="form-control" id="descricao" wire:model.defer="descricao"></textarea>
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

                            width: 695px;
                            height: 40px;
                            background-color: #5b9fff;
                            color: white;
                            border: #496eff;
                            border-radius: 5px;
                        }

                        .botaoCadastrar:hover {
                            background-color: #2d4ec6;
                            color: #fff
                        }
                    </style>
                </head>
                <button type="submit" class="botaoCadastrar">
                    <i class="bi bi-person-plus-fill me-1"></i> Cadastrar Sensor
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
