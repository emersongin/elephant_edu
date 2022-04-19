<?php

include_once '../repositories/autenticacoes.php';

session_start();

$auth_user_id = isset($_SESSION['id']) ? $_SESSION['id'] : (isset($_POST['id']) ? $_POST['id'] : 0);
$auth_user_token = isset($_SESSION['token']) ? $_SESSION['token'] : (isset($_POST['token']) ? $_POST['token'] : 0);
$auth_user_id_perfil = isset($_SESSION['id_perfil']) ? $_SESSION['id_perfil'] : (isset($_POST['id_perfil']) ? $_POST['id_perfil'] : 0);
