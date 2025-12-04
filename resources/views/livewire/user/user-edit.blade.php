<div class="mt-5">

    @if (session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
    </div>
    @endif


    {{-- Cartão principal --}}
    <div class="card border-0 shadow rounded-3" style="margin-left: 20%; margin-right:20%">
        <h5 class="card-header text-white fw-bold"
            style="background: linear-gradient(to right, rgb(170, 208, 251), #0e75d5);">
            Editar Perfil
        </h5>

        <div class="card-body" style="background-color: rgba(236, 243, 254, 0.711)">
            <form wire:submit.prevent="update">
                <div class="py-3">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-12 col-sm-10 col-md-8 col-lg-6 col-xl-5 col-xxl-4;" style="width: 600px">

                                <div class="bg-white p-4 rounded shadow-sm border border-light-subtle">

                                    {{-- Nome --}}
                                   <div class="mb-3">
                                        <label for="name" class="form-label fw-semibold">Nome</label>
                                        <input type="text" class="form-control" id="name" name="name"
                                            placeholder="Nome Completo" wire:model.defer="name">
                                        @error('name')
                                        <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label for="email" class="form-label fw-semibold">Email</label>
                                        <input type="email" class="form-control" id="email"
                                            placeholder="Exemplo: xxx@gmail.com" wire:model="email">
                                        @error('email')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="password" class="form-label fw-semibold">Senha</label>
                                        <input type="password" class="form-control" id="password"
                                            placeholder="Digite sua nova senha (opcional)" wire:model="password">
                                        @error('password')
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
                                        <i class="bi bi-pencil-square me-1"></i> Editar Perfil
                                    </button>

                                    </html>



                                    {{-- Botão Cancelar --}}
                                    <div class="mt-3">
                                        <a href="{{ route('perfil') }}"
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