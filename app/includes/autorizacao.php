<?php

include_once '../repositories/autenticacoes.php';

session_start();

$params = array(
    'id' => $_SESSION['id'],
    'id' => $_SESSION['token'],
    'id_perfil' => 1
);

if(autorizacaoToken($params) == false) echo falha('token de usuário não autorizado!');
