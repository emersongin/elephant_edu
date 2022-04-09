
<div class="card" style="background-color: #153575; height: 100vh;">
    <div id="logo-container" class="container text-center">
        <img id="img-fluid" src="../assets/img/logoDashboard.svg" style="height: 50px !important;" alt="logo">
    </div>

    <hr>

    <div id="container-menu" style="margin-top: 50px">
        <ul>
            <li><a href="inicio.php" class="btn <?= $pagina_atual == 'inicio' ? 'text-white' : ''; ?>">Inicio</a></li>

            <?= $perfil_admin ? '<li><a href="usuarios.php" class="btn '. ($pagina_atual == 'usuarios' ? 'text-white' : '') .' ">Usuários</a></li>' : '' ?>

            <li><a href="escolas.php" class="btn <?= $pagina_atual == 'escolas' ? 'text-white' : ''; ?>">Escolas</a></li>
            <li><a href="setores.php" class="btn <?= $pagina_atual == 'setores' ? 'text-white' : ''; ?>">Setores</a></li>
            <li><a href="localidades.php" class="btn <?= $pagina_atual == 'localidades' ? 'text-white' : ''; ?>">Localidades</a></li>
            <li><a href="visitas.php" class="btn <?= $pagina_atual == 'visitas' ? 'text-white' : ''; ?>">Visitas</a></li>
            <li><a href="../views/relatorios.php" class="btn <?= $pagina_atual == 'relatorio' ? 'text-white' : ''; ?>">Relatório</a></li>
        </ul>
    </div>

    <div class="card" style="background-color: #7F9ECD;"id="">
        <h3 style="color: #FFF">Cargo:</h3>
        <img src="../assets/img/avatar_man_boy.png" style="width: 50px; height: 50px;" alt="">
        <h4 style="color: #FFF"><?= $nome_usuario; ?></h4>

        <a href="../controllers/logout.php">
            <button class="btn btn-outline-danger w-100">
                SAIR <i class="fa fa-arrow-right" aria-hidden="true"></i>
            </button>
        </a>

    </div>
</div>
