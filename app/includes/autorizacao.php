<?php

include_once '../repositories/autenticacoes.php';

session_start();

$id = isset($_SESSION['id']) ? $_SESSION['id'] : (isset($_POST['id']) ? $_POST['id'] : 0);
$token = isset($_SESSION['token']) ? $_SESSION['token'] : (isset($_POST['token']) ? $_POST['token'] : 0);

$params = array(
    'id' => $id,
    'token' => $token,
    'id_perfil' => 1
);

if(autorizacaoToken($params) == false) echo falha('usuário não autorizado!'); exit;
