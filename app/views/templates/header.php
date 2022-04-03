<?php 
    session_start();

    $id_perfil = intval($_SESSION['id_perfil']) == 1;

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="icon" type="image/png" sizes="16x16" href="assets/img/logoFavicon.png">

        <link rel="stylesheet" href="../assets/css/dashboard.css">
        <!-- bootstrap 4 -->
        <link rel="stylesheet" href="../assets/lib/bootstrap-4.0.0-dist/css/bootstrap.min.css">

        <title>Elephant EDU :: Dashboard</title>
    </head>
    <body>
        <div class="container" style="margin: 0 200px; padding: 0;">
            <div class="row">
                <div class="col-3 card" style="background-color: #153575; height: 100vh;">
                    <a id="dashboard" href="#">
                        <div id="container-logo" class="d-flex justify-content-center" style="height: 7vh; margin-top: 1.25rem">
                            <img id="img-fluid" src="../assets/img/elephantLogo.png" alt="logo">
                        </div>
                    </a>

                    <hr> <!-- Falta estilizar o hr --->

                    <div id="container-menu" style="margin-top: 50px">
                        <ul>
                            <li><a href="dashboard.php" class="btn">Inicio</a></li>

                            <?= $id_perfil ? '<li><a href="cadastro.php" class="btn">Cadastro</a></li>' : '' ?>
                            
                            <li><a href="visitas.php" class="btn">Visitas</a></li>
                            <li><a href="#" class="btn">Relatório</a></li>
                        </ul>
                    </div>

                    <div class="card" style="background-color: #7F9ECD;"id="">
                        <h3 style="color: #FFF">Cargo:</h3>
                        <img src="../assets/img/avatar_man_boy.png" style="width: 50px; height: 50px;" alt="">
                        <h4 style="color: #FFF">Nome Sobrenome</h4>

                        <button type="" class="">SAIR</button>
                        <i class="fa-solid fa-arrow-right-from-bracket" aria-hidden="true"></i>
                    </div>
                </div>
