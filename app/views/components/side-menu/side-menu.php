<div class="card" style="background-color: #153575; height: 100vh;">
    <a id="dashboard" href="#">
        <div id="container-logo" class="d-flex justify-content-center" style="height: 7vh; margin-top: 1.25rem">
            <img id="img-fluid" src="../assets/img/elephantLogo.png" alt="logo">
        </div>
    </a>

    <hr>

    <div id="container-menu" style="margin-top: 50px">
        <ul>
            <li><a href="dashboard.php" class="btn">Inicio</a></li> -->

            <?= $perfil_admin ? '<li><a href="usuarios.php" class="btn">Cadastro</a></li>' : '' ?>

            <li><a href="visitas.php" class="btn">Visitas</a></li>
            <li><a href="#" class="btn">Relatório</a></li>
        </ul>
    </div>

    <div class="card" style="background-color: #7F9ECD;"id="">
        <h3 style="color: #FFF">Cargo:</h3>
        <img src="../assets/img/avatar_man_boy.png" style="width: 50px; height: 50px;" alt="">
        <h4 style="color: #FFF">Nome Sobrenome</h4>

        <a href="../controllers/logout.php">
            <button class="btn btn-outline-danger w-100">SAIR</button>
        </a>

        <i class="fa-solid fa-arrow-right-from-bracket" aria-hidden="true"></i>
    </div>
</div>