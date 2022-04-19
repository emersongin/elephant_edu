
<div class="card h-100 w-100 bg-theme-primary">
    <div class="container text-center">
        <img id="img-fluid" src="../assets/img/logoDashboard.svg" style="height: 40px !important;" alt="logo">
    </div>

    <hr>

    <div class="m-1 px-1">
        <ul>
            <li><a href="inicio.php" class="btn mb-1 w-100 text-uppercase font-weight-bold <?= $pagina_atual == 'inicio' ? 'btn-light' : 'btn-primary'; ?>">Inicio</a></li>

            <li>
                <div class="mb-1 w-100">
                    <button 
                        class="btn w-100 text-uppercase font-weight-bold <?= $menu_ativo === 'cadastro' ? 'btn-light' : 'btn-primary'; ?>" 
                        type="button" data-bs-toggle="collapse" data-bs-target="#collapse-menu-cadastro" aria-expanded="false" aria-controls="collapse-menu-cadastro">
                        Cadastros
                    </button>
                </div>
                <div class="collapse <?= $menu_ativo === 'cadastro' ? 'show' : ''; ?>" id="collapse-menu-cadastro">
                    <div class="bg-theme-primary p-2">
                        <a href="setores.php" class="btn mb-1 w-100 text-uppercase font-weight-bold <?= $pagina_atual == 'setores' ? 'btn-light' : 'btn-primary'; ?>">Setores</a>
                        <a href="localidades.php" class="btn mb-1 w-100 text-uppercase font-weight-bold <?= $pagina_atual == 'localidades' ? 'btn-light' : 'btn-primary'; ?>">Localidades</a>
                        <a href="escolas.php" class="btn mb-1 w-100 text-uppercase font-weight-bold <?= $pagina_atual == 'escolas' ? 'btn-light' : 'btn-primary'; ?>">Escolas</a>
                        <a href="visitas.php" class="btn mb-1 w-100 text-uppercase font-weight-bold <?= $pagina_atual == 'visitas' ? 'btn-light' : 'btn-primary'; ?>">Visitas</a>

                        <?= $perfil_admin ? '<a href="usuarios.php" class="btn mb-1 w-100 text-uppercase font-weight-bold '. ($pagina_atual == 'usuarios' ? 'btn-light' : 'btn-primary') .' ">Usuários</a>' : '' ?>
                    </div>
                </div>
            </li>

            <li>
                <div class="mb-1 w-100">
                    <button class="btn w-100 text-uppercase font-weight-bold <?= $menu_ativo === 'relatorio' ? 'btn-light' : 'btn-primary'; ?>" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-menu-relatorio" aria-expanded="false" aria-controls="collapse-menu-relatorio">
                        Relatórios
                    </button>
                </div>
                <div class="collapse <?= $menu_ativo === 'relatorio' ? 'show' : ''; ?>" id="collapse-menu-relatorio">
                    <div class="bg-theme-primary p-2">
                        <a target="_blank" href="../views/relatorios.php" class="btn mb-1 w-100 text-uppercase font-weight-bold <?= $pagina_atual == 'relatorio' ? 'btn-light' : 'btn-primary'; ?>">Relatório</a>
                    </div>
                </div>
            </li>

        </ul>
    </div>

    <div class="card mb-3 bg-theme-primary" style="max-width: 18rem;">
        <div class="card-body text-success">
        <h5 class="card-title text-white"><?= $nome_usuario; ?></h5>
        <h6 class="card-text text-white"><?= $perfil_usuario; ?></h6>
        </div>
        <div class="card-footer bg-transparent">
            <a href="../controllers/logout.php">
                <button class="btn btn-outline-danger w-100 text-uppercase font-weight-bold">sair</button>
            </a>
        </div>
    </div>

</div>
