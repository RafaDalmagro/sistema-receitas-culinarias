<aside class="sidebar p-4">
    <div class="flex-shrink-0 p-4 bg-dark text-light" style="width: 280px;">
        <div>
            <a href="/">
                <svg xmlns="http://www.w3.org/2000/svg" width="100" height="100" fill="currentColor"
                    class="bi bi-r-square-fill" viewBox="0 0 16 16">
                    <path d="M6.835 5.092v2.777h1.549c.995 0 1.573-.463 1.573-1.36 0-.913-.596-1.417-1.537-1.417z" />
                    <path
                        d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zm3.5 4.002h3.11c1.71 0 2.741.973 2.741 2.46 0 1.138-.667 1.94-1.495 2.24L11.5 12H9.98L8.52 8.924H6.836V12H5.5z" />
                </svg>
            </a>
            <h1><i>{{ auth()->user()->name }}</i></h1>
        </div>
        <ul class="list-unstyled ps-0">
            <li class="mb-1">
                <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed text-light"
                    data-bs-toggle="collapse" data-bs-target="#home-collapse" aria-expanded="false">
                    <svg class="bi ms-auto" width="16" height="16">
                        <use xlink:href="#chevron-right" />
                    </svg>
                    Páginas
                </button>
                <div class="collapse" id="home-collapse">
                    <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                        <li><a href="/receitas"
                                class="text-light d-inline-flex text-decoration-none rounded m-1">Receitas</a></li>
                        <li><a href="/categorias"
                                class="text-light d-inline-flex text-decoration-none rounded m-1">Categorias</a></li>
                    </ul>
                </div>
            </li>
            <li class="border-top my-3 border-light"></li>
            <li class="mb-1">
                <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed text-light"
                    data-bs-toggle="collapse" data-bs-target="#account-collapse" aria-expanded="false">
                    <svg class="bi ms-auto" width="16" height="16">
                        <use xlink:href="#chevron-right" />
                    </svg>
                    Conta
                </button>
                <div class="collapse" id="account-collapse">
                    <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                        <li><a href="/receitas/create"
                                class="text-light d-inline-flex text-decoration-none rounded m-1">Nova Receita</a></li>
                        <li><a href="/user/profile"
                                class="text-light d-inline-flex text-decoration-none rounded m-1">Meus Dados</a></li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="btn btn-danger m-1">Sair</button>
                            </form>
                        </li>

                    </ul>
                </div>
            </li>
        </ul>
    </div>
</aside>
