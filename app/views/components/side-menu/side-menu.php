
<div class="card" style="background-color: #153575; height: 100vh;">
    <div id="logo-container" class="container text-center">
        <img id="img-fluid" src="../assets/img/logoDashboard.svg" style="height: 40px !important;" alt="logo">
    </div>

    <hr>

    <div id="container-menu" class="m-1 px-1">
        <ul>
            <li><a href="inicio.php" class="btn mb-1 w-100 text-uppercase font-weight-bold <?= $pagina_atual == 'inicio' ? 'btn-light' : 'btn-primary'; ?>">Inicio</a></li>

            <?= $perfil_admin ? '<li><a href="usuarios.php" class="btn mb-1 w-100 text-uppercase font-weight-bold '. ($pagina_atual == 'usuarios' ? 'btn-light' : 'btn-primary') .' ">Usuários</a></li>' : 'btn-primary' ?>

            <li><a href="escolas.php" class="btn mb-1 w-100 text-uppercase font-weight-bold <?= $pagina_atual == 'escolas' ? 'btn-light' : 'btn-primary'; ?>">Escolas</a></li>
            <li><a href="setores.php" class="btn mb-1 w-100 text-uppercase font-weight-bold <?= $pagina_atual == 'setores' ? 'btn-light' : 'btn-primary'; ?>">Setores</a></li>
            <li><a href="localidades.php" class="btn mb-1 w-100 text-uppercase font-weight-bold <?= $pagina_atual == 'localidades' ? 'btn-light' : 'btn-primary'; ?>">Localidades</a></li>
            <li><a href="visitas.php" class="btn mb-1 w-100 text-uppercase font-weight-bold <?= $pagina_atual == 'visitas' ? 'btn-light' : 'btn-primary'; ?>">Visitas</a></li>
            <li><a href="../views/relatorios.php" class="btn mb-1 w-100 text-uppercase font-weight-bold <?= $pagina_atual == 'relatorio' ? 'btn-light' : 'btn-primary'; ?>">Relatório</a></li>
        </ul>
    </div>

    <div class="card" style="background-color: #7F9ECD;"id="">
        <h3 style="color: #FFF">Cargo:</h3>
        <img src="../assets/img/avatar_man_boy.png" style="width: 50px; height: 50px;" alt="">
        <h4 style="color: #FFF"><?= $nome_usuario; ?></h4>

        <a href="../controllers/logout.php">
            <button class="btn btn-outline-danger w-100 text-uppercase font-weight-bold">sair</button>
        </a>

    </div>
</div>
