<?php 
    session_start();

    if(isset($_SESSION['token'])) {
        $perfil_admin = intval($_SESSION['id_perfil']) == 1;

        $pagina_atual = basename($_SERVER["REQUEST_URI"],".php");

        switch ($pagina_atual) {
            case 'dashboard':
                break;
            case 'usuarios':
                if(!$perfil_admin) header('Location:dashboard.php');
                break;
        }
        
    } else {
        header("Location:/elephant_edu/app/views/login.php");
        
    }

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="icon" type="image/png" sizes="16x16" href="../assets/img/logoFavicon.png">

        <!-- bootstrap 4 -->
        <link rel="stylesheet" href="../assets/lib/bootstrap-4.0.0-dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="../assets/css/style.css">
        <link rel="stylesheet" href="../views/components/burguer-menu/style.css">
        <link rel="stylesheet" href="../assets/css/dashboard.css">

        <title>Elephant EDU :: Dashboard</title>
    </head>
    <body>
        
        <div class="row">

            <!-- mobile - tablete -->
                <div class="col-12 d-block d-md-none bg-danger">
                    <?= include_once '../views/components/burguer-menu/burguer-menu.php'; ?>
                </div>
            <!-- mobile - tablete -->

            <!-- desktop -->
                <div class="col-3 d-none d-md-block">
                    <?= include_once '../views/components/side-menu/side-menu.php'; ?>
                </div>
            <!-- desktop -->

            <!-- conteudo -->
                <div class="col-12 col-md-9">
            <!-- conteudo... -->


