<?php

include_once '../includes/methodes.php';
include_once '../includes/functions.php';
include_once '../includes/autorizacao.php';
include_once '../repositories/escolas.php';

if($_SERVER['REQUEST_METHOD'] == 'GET') {
    if(isset($_GET['id'])) {
        $id = isset($_GET['id']) ? parseId($_GET['id']) : false;

        $params = array(
            'id' => $id
        );

        echo $id ? escolasID($params) : falha();
        
    } else {
        echo escolasTodas();

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

    echo $valido ? escolasInserir($params) : falha('parametros inválido!');
    exit;
}

if($_SERVER['REQUEST_METHOD'] == 'PUT') {
    
    $id = isset($_GET['id']) ? parseId($_GET['id']) : false;
    $nome = isset($_PUT['nome']) ? parseTexto($_PUT['nome']) : false;
    $id_responsavel = isset($_PUT['id_responsavel']) ? parseId($_PUT['id_responsavel']) : false;
    $id_localidade = isset($_PUT['id_localidade']) ? parseId($_PUT['id_localidade']) : false;

    $valido = $id && $nome && $id_responsavel && $id_localidade;
    $params = array(
        'id'             => $id,
        'nome'           => $nome,
        'id_responsavel' => $id_responsavel,
        'id_localidade'  => $id_localidade
    );

    echo $valido ? escolasAtualizar($params) : falha('parametros inválido!');
    exit;
}

if($_SERVER['REQUEST_METHOD'] == 'DELETE') {

    $id = isset($_DELETE['id']) ? parseId($_DELETE['id']) : false;

    $params = array(
        'id' => $id
    );

    echo $id ? escolasApagar($params) : falha('parametros inválido!');
    exit;
}

echo falha("metodo {$_SERVER['REQUEST_METHOD']} não disponível.");
exit;
