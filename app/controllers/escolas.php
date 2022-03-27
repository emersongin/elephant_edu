<?php

include_once '../includes/functions.php';
include_once '../repositories/escolas.php';

if($_SERVER['REQUEST_METHOD'] == 'GET') {
    if(isset($_GET['id'])) {
        $id = parseId($_GET['id']);

        echo $id ? escolaID(['id' => $id]) : falha();
        
    } else {
        echo escolaTodas();

    }

    exit;
}

if($_SERVER['REQUEST_METHOD'] == 'POST') {

    $nome = isset($_POST['nome']) ? parseTexto($_POST['nome']) : false;
    $id_responsavel = isset($_POST['id_responsavel']) ? parseId($_POST['id_responsavel']) : false;
    $id_localidade = isset($_POST['id_localidade']) ? parseId($_POST['id_localidade']) : false;

    $valido = $nome && $id_responsavel && $id_localidade;
    $params = array(
        'nome'           => $nome,
        'id_responsavel' => $id_responsavel,
        'id_localidade'  => $id_localidade
    );

    echo $valido ? escolaInserir($params) : falha('parametros inválido!');
    exit;
}

if($_SERVER['REQUEST_METHOD'] == 'PUT') {
    global $_PUT;

    echo json_encode($_PUT);
    exit;
    
    $id = isset($_GET['id']) ? parseId($_GET['id']) : false;
    $nome = isset($_POST['nome']) ? parseTexto($_POST['nome']) : false;
    $id_responsavel = isset($_POST['id_responsavel']) ? parseId($_POST['id_responsavel']) : false;
    $id_localidade = isset($_POST['id_localidade']) ? parseId($_POST['id_localidade']) : false;

    $valido = $id && $nome && $id_responsavel && $id_localidade;
    $params = array(
        'id'             => $id,
        'nome'           => $nome,
        'id_responsavel' => $id_responsavel,
        'id_localidade'  => $id_localidade
    );

    echo $valido ? escolaAtualizar($params) : falha('parametros inválido!');
    exit;
}

if($_SERVER['REQUEST_METHOD'] == 'DELETE') {
    
}

echo falha();
exit;
