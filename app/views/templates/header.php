<?php 
    session_start();

    if(isset($_SESSION['token'])) {
        
        $perfil_admin = intval($_SESSION['id_perfil']) == 1;
        $pagina_atual = basename($_SERVER["REQUEST_URI"], ".php");
        $titulo = '';
        $nome_usuario = $_SESSION['nome_usuario'];
        $perfil_usuario = $_SESSION['perfil_usuario'];

        switch ($pagina_atual) {
            case 'inicio':
                $titulo = 'Início';
                $menu_ativo = 'none';

                break;
            case 'usuarios':
                if(!$perfil_admin) header('Location:inicio.php');
                $titulo = 'Usuários';
                $menu_ativo = 'cadastro';

                break;
            case 'escolas':
                $titulo = 'Escolas';
                $menu_ativo = 'cadastro';

                break;
            case 'setores':
                $titulo = 'Setores';
                $menu_ativo = 'cadastro';

                break;
            case 'localidades':
                $titulo = 'Localidades';
                $menu_ativo = 'cadastro';

                break;
            case 'visitas':
                $titulo = 'Visitas';
                $menu_ativo = 'cadastro';

                break;
            case 'relatorios':
                $titulo = 'Relatórios';
                $menu_ativo = 'relatorio';

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
        <link rel="stylesheet" href="../assets/lib/font-awesome-4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="../assets/lib/bootstrap-5.0.2-dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="../assets/css/style.css">
        <link rel="stylesheet" href="../views/components/burguer-menu/style.css">
        <link rel="stylesheet" href="../assets/css/inicio.css">

        <title>Elephant EDU :: <?= $titulo; ?> </title>
    </head>
    <body>
        
        <div class="row">

            <!-- mobile - tablete -->
                <div class="col-12 d-block d-lg-none">
                    <?php include_once '../views/components/burguer-menu/burguer-menu.php'; ?>
                </div>
            <!-- mobile - tablete -->

            <!-- desktop -->
                <div class="col-2 d-none d-lg-block vh-100">
                    <?php include_once '../views/components/side-menu/side-menu.php'; ?>
                </div>
            <!-- desktop -->

            <!-- conteudo -->
                <div class="col-12 col-lg-10">
            <!-- conteudo... -->


