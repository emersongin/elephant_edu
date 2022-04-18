<section class="mb-3 bg-theme-primary">
    <nav class="navbar">
        <div class="container-fluid">
            <div class="d-flex w-100 justify-content-between">
                <div>
                    <a class="navbar-brand" href="#">
                        <img id="img-fluid" src="../assets/img/logoDashboard.svg" style="height: 50px !important;" alt="logo">
                    </a>
                </div>
                <div>
                    <button class="navbar-toggler second-button" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarToggleExternalContent10"
                        aria-controls="navbarToggleExternalContent10" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <div class="animated-icon2"><span></span><span></span><span></span><span></span></div>
                    </button>
                </div>
            </div>
        </div>
    </nav>
    <div class="collapse " id="navbarToggleExternalContent10">

        <hr>

        <!-- Links --> 
        <!-- <span class="sr-only">(current)</span> -->
        <ul>

            <li class="nav-item">
                <a href="inicio.php" class="nav-link text-uppercase fw-bold <?= $pagina_atual == 'inicio' ? 'text-white' : ''; ?>">
                    Inicio
                </a>
            </li>
            <li class="nav-item">
                <a href="setores.php" class="nav-link text-uppercase fw-bold <?= $pagina_atual == 'setores' ? 'text-white' : ''; ?>">
                    Setores
                </a>
            </li>
            <li class="nav-item">
                <a href="localidades.php" class="nav-link text-uppercase fw-bold <?= $pagina_atual == 'localidades' ? 'text-white' : ''; ?>">
                    Localidades
                </a>
            </li>
            <li class="nav-item">
                <a href="escolas.php" class="nav-link text-uppercase fw-bold <?= $pagina_atual == 'escolas' ? 'text-white' : ''; ?>">
                    Escolas
                </a>
            </li>
            <li class="nav-item">
                <a href="visitas.php" class="nav-link text-uppercase fw-bold <?= $pagina_atual == 'visitas' ? 'text-white' : ''; ?>">
                    Visitas
                </a>
            </li>

            <?= $perfil_admin ? '<li class="nav-item"><a href="usuarios.php" class="nav-link text-uppercase fw-bold '. ($pagina_atual == 'usuarios' ? 'text-white' : '') .' ">Usuários</a></li>' : '' ?>

            <li class="nav-item">
                <a href="../views/relatorios.php" class="nav-link text-uppercase fw-bold <?= $pagina_atual == 'relatorio' ? 'text-white' : ''; ?>">
                    Relatório
                </a>
            </li>

            <hr>

            <li class="nav-item text-uppercase fw-bold">
                <a href="../controllers/logout.php" class="nav-link">
                    Sair
                </a>
            </li>

            <hr>

        </ul>
    </div>
</section>
