
<div class="card h-100 w-100 bg-theme-primary">
    <div class="container text-center">
        <img id="img-fluid" src="../assets/img/logoDashboard.svg" style="height: 40px !important;" alt="logo">
    </div>

    <hr>

    <div class="m-1 px-1">
        <ul>
            <li><a href="inicio.php" class="btn mb-1 w-100 text-uppercase font-weight-bold <?= $pagina_atual == 'inicio' ? 'btn-light' : 'btn-primary'; ?>">Inicio</a></li>
            <li><a href="escolas.php" class="btn mb-1 w-100 text-uppercase font-weight-bold <?= $pagina_atual == 'escolas' ? 'btn-light' : 'btn-primary'; ?>">Escolas</a></li>
            <li><a href="setores.php" class="btn mb-1 w-100 text-uppercase font-weight-bold <?= $pagina_atual == 'setores' ? 'btn-light' : 'btn-primary'; ?>">Setores</a></li>
            <li><a href="localidades.php" class="btn mb-1 w-100 text-uppercase font-weight-bold <?= $pagina_atual == 'localidades' ? 'btn-light' : 'btn-primary'; ?>">Localidades</a></li>
            <li><a href="visitas.php" class="btn mb-1 w-100 text-uppercase font-weight-bold <?= $pagina_atual == 'visitas' ? 'btn-light' : 'btn-primary'; ?>">Visitas</a></li>

            <?= $perfil_admin ? '<li><a href="usuarios.php" class="btn mb-1 w-100 text-uppercase font-weight-bold '. ($pagina_atual == 'usuarios' ? 'btn-light' : 'btn-primary') .' ">Usuários</a></li>' : '' ?>

            <li><a href="../views/relatorios.php" class="btn mb-1 w-100 text-uppercase font-weight-bold <?= $pagina_atual == 'relatorio' ? 'btn-light' : 'btn-primary'; ?>">Relatório</a></li>
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
