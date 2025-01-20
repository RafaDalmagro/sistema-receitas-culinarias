<aside class="sidebar p-4">
    <div class="flex-shrink-0 p-4 bg-dark text-light" style="width: 280px;">
        <a href="/" class="d-flex align-items-center pb-3 mb-3 text-light text-decoration-none border-bottom">
            <span class="fs-5 fw-semibold">Home</span>
        </a>
        <ul class="list-unstyled ps-0">
            <li class="mb-1">
                <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed text-light"
                    data-bs-toggle="collapse" data-bs-target="#home-collapse" aria-expanded="false">
                    <svg class="bi ms-auto" width="16" height="16">
                        <use xlink:href="#chevron-right" />
                    </svg>
                    Início
                </button>
                <div class="collapse" id="home-collapse">
                    <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                        <li><a href="/receitas" class="text-light d-inline-flex text-decoration-none rounded">Receitas</a></li>
                        <li><a href="/categorias" class="text-light d-inline-flex text-decoration-none rounded">Categorias</a></li>
                        <li><a href="#" class="text-light d-inline-flex text-decoration-none rounded">Usuários</a></li>
                    </ul>
                </div>
            </li>
            <li class="border-top my-3 border-light"></li>
            <li class="mb-1">
                <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed text-light"
                    data-bs-toggle="collapse" data-bs-target="#account-collapse" aria-expanded="false">
                    <svg class="bi ms-auto" width="16" height="16">
                        <use xlink:href="#chevron-right"/>
                    </svg>
                    Conta
                </button>
                <div class="collapse" id="account-collapse">
                    <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                        <li><a href="/receitas/create" class="text-light d-inline-flex text-decoration-none rounded">Nova Receita</a></li>
                        <li><a href="/user/profile" class="text-light d-inline-flex text-decoration-none rounded">Meus Dados</a></li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="btn btn-danger">Sair</button>
                        </form>
                    </ul>
                </div>
            </li>
        </ul>
    </div>
</aside>
