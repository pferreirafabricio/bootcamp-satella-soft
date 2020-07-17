<header class="bg-primary">
    <div class="max-width">
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <a class="navbar-brand" href="{{BASE}}" aria-label="Logo Quase Tudo Gostoso">
                <img src="{{BASE}}assets/img/logo.png" alt="Logo Quase Tudo Gostoso" class="logo">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarColor02">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{BASE}}?url=nova">Nova receita</a>
                    </li>
                </ul>

                <form class="form-inline my-2 my-lg-0" method="get" action="{{BASE}}?url=busca" id="frmBusca">
                    <input class="form-control mr-sm-2" type="text" placeholder="O que você procura?" id="txtTermoBusca">
                    <button class="btn btn-black my-2 my-sm-0" type="submit">Buscar</button>
                </form>
            </div>
        </nav>
    </div>
</header>