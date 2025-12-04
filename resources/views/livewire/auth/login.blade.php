<div class="mt-5">

    @if (session()->has('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif


    <div class="card border-0 shadow rounded-3" style="margin-left: 20%; margin-right:20%">
        <h5 class="card-header text-white fw-bold"
            style="background: linear-gradient(to right, rgb(170, 208, 251), #0e75d5);">
            Login
        </h5>

        <div class="card-body" style="background-color: rgba(236, 243, 254, 0.711)">
            <form wire:submit.prevent="login">
                <div class="py-3">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-12 col-sm-10 col-md-8 col-lg-6 col-xl-5 col-xxl-4;" style="width: 600px">

                                <div class="bg-white p-4 rounded shadow-sm border border-light-subtle">

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
                                            placeholder="Digite sua senha..." wire:model="password">
                                        @error('password')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <html>

                                    <head>
                                        <style>
                                            .botaoEntrar {

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

                                            .botaoEntrar:hover {
                                                background-color: #1374ce;
                                                color: #ffffff;
                                                border-color: #1374ce;
                                            }
                                        </style>
                                    </head>

                                    <button type="submit" class="botaoEntrar">
                                        <i class="bi bi-door-open"></i> Entrar
                                    </button>

                                    </html>


                                    <p><a class="link-opacity-100" href="{{ route('user.create') }}">Não possuo
                                            cadastro</a></p>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
