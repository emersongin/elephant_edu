<?php

include_once '../includes/methodes.php';
include_once '../includes/functions.php';
include_once '../includes/autorizacao.php';
include_once '../repositories/localidades.php';

if($_SERVER['REQUEST_METHOD'] == 'GET') {
    if(isset($_GET['id'])) {
        $id = isset($_GET['id']) ? parseId($_GET['id']) : false;

        $params = array(
            'id' => $id
        );

        echo $id ? localidadesID($params) : falha();
        
    } else {
        echo localidadesTodas();

    }

    exit;
}

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $descricao = isset($_POST['descricao']) ? parseTexto($_POST['descricao']) : false;
    $id_setor = isset($_POST['id_setor']) ? parseId($_POST['id_setor']) : false;

    $valido = $descricao && $id_setor;
    $params = array(
        'descricao'  => $descricao,
        'id_setor'   => $id_setor
    );

    echo $valido ? localidadesInserir($params) : falha('parametros inválido!');
    exit;
}

if($_SERVER['REQUEST_METHOD'] == 'PUT') {
    $id = isset($_GET['id']) ? parseId($_GET['id']) : false;
    $descricao = isset($_PUT['descricao']) ? parseTexto($_PUT['descricao']) : false;
    $id_setor = isset($_PUT['id_setor']) ? parseId($_PUT['id_setor']) : false;

    $valido = $id && $descricao && $id_setor;
    $params = array(
        'id'             => $id,
        'descricao'      => $descricao,
        'id_setor'       => $id_setor
    );

    echo $valido ? localidadesAtualizar($params) : falha('parametros inválido!');
    exit;
}

if($_SERVER['REQUEST_METHOD'] == 'DELETE') {
    $id = isset($_DELETE['id']) ? parseId($_DELETE['id']) : false;

    $params = array(
        'id' => $id
    );

    echo $id ? localidadesApagar($params) : falha('parametros inválido!');
    exit;
    
}

echo falha("metodo {$_SERVER['REQUEST_METHOD']} não disponível.");
exit;
