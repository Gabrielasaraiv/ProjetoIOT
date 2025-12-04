<div>
     <nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-4">
        <div class="container">
            <span class="navbar-brand">Perfil</span>
            <div class="navbar-nav ms-auto">
                <span class="navbar-text me-3">Olá, {{ $user->name }}</span>
            </div>
        </div>
    </nav>

    <div class="row g-4 mb-4">
        <div class="col-md-6 col-xl-3">
            <div class="card shadow-sm border-0">
                <div class="card-body d-flex align-items-center justify-content-between">
                    <div>
                        <h6 class="text-muted">Editar Perfil</h6>
                        <html>

                        <head>
                            <style>
                                .botaoEditar {

                                    background-color: #4b96ff;
                                    color: white;
                                    border: #7d94ed;
                                    border-radius: 5px;
                                }

                                .botaoEditar:hover {
                                    background-color: #3858c9;
                                    color: #fff
                                }
                            </style>
                        </head>


                        <a href="{{ route('user.edit', ['id' => $user->id]) }}" class="botaoEditar">
                            <button type="submit" class="botaoEditar">
                                <i class="bi bi-pencil"></i>
                            </button>
                        </a>

                        </html>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-md-6 col-xl-3">
            <div class="card shadow-sm border-0">
                <div class="card-body d-flex align-items-center justify-content-between">
                    <div>
                        <h6 class="text-muted">Sair</h6>
                        <html>

                        <head>
                            <style>
                                .botaoExcluir {

                                    background-color: #4b96ff;
                                    color: white;
                                    border: #7d94ed;
                                    border-radius: 5px;
                                }

                                .botaoExcluir:hover {
                                    background-color: #3858c9;
                                    color: #fff
                                }
                            </style>
                        </head>

                        <a href="{{ route('logout') }}" class="botaoEditar">
                            <button type="submit" class="botaoExcluir">
                            <i class=" bi bi-door-open-fill"></i>
                        </button>
                        </a>
                        

                        </html>

                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
