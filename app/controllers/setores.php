<?php

include_once '../includes/methodes.php';
include_once '../includes/functions.php';
include_once '../repositories/setores.php';

if($_SERVER['REQUEST_METHOD'] == 'GET') {
    if(isset($_GET['id'])) {
        $id = isset($_GET['id']) ? parseId($_GET['id']) : false;

        $params = array(
            'id' => $id
        );

        echo $id ? setoresID($params) : falha();
        
    } else {
        echo setoresTodas();

    }

    exit;
}

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $descricao = isset($_POST['descricao']) ? parseTexto($_POST['descricao']) : false;

    $valido = $descricao;
    $params = array(
        'descricao'  => $descricao
    );

    echo $valido ? setoresInserir($params) : falha('parametros inválido!');
    exit;
}

if($_SERVER['REQUEST_METHOD'] == 'PUT') {
    $id = isset($_GET['id']) ? parseId($_GET['id']) : false;
    $descricao = isset($_PUT['descricao']) ? parseTexto($_PUT['descricao']) : false;

    $valido = $id && $descricao;
    $params = array(
        'id'        => $id,
        'descricao' => $descricao
    );

    echo $valido ? setoresAtualizar($params) : falha('parametros inválido!');
    exit;
}

if($_SERVER['REQUEST_METHOD'] == 'DELETE') {
    $id = isset($_DELETE['id']) ? parseId($_DELETE['id']) : false;

    $params = array(
        'id' => $id
    );

    echo $id ? setoresApagar($params) : falha('parametros inválido!');
    exit;
}

echo falha("metodo {$_SERVER['REQUEST_METHOD']} não disponível.");
exit;
