<?php

include_once '../includes/methodes.php';
include_once '../includes/functions.php';
include_once '../repositories/escolas.php';
include_once '../includes/autorizacao.php';

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

    if(autorizacaoToken(array(
        'id' => $auth_user_id,
        'token' => $auth_user_token,
        'id_perfil' => 1
    )) == false) echo falha('usuário ou token não autorizado!'); exit;

    $nome = isset($_POST['nome']) ? parseTexto($_POST['nome']) : false;
    $responsavel = isset($_POST['responsavel']) ? parseId($_POST['responsavel']) : false;
    $id_localidade = isset($_POST['id_localidade']) ? parseId($_POST['id_localidade']) : false;

    $valido = $nome && $responsavel && $id_localidade;
    $params = array(
        'nome'           => $nome,
        'responsavel'    => $responsavel,
        'id_localidade'  => $id_localidade
    );

    echo $valido ? escolasInserir($params) : falha('parametros inválido!');
    exit;
}

if($_SERVER['REQUEST_METHOD'] == 'PUT') {
    
    $id = isset($_GET['id']) ? parseId($_GET['id']) : false;
    $nome = isset($_PUT['nome']) ? parseTexto($_PUT['nome']) : false;
    $responsavel = isset($_PUT['responsavel']) ? parseId($_PUT['responsavel']) : false;
    $id_localidade = isset($_PUT['id_localidade']) ? parseId($_PUT['id_localidade']) : false;

    $valido = $id && $nome && $responsavel && $id_localidade;
    $params = array(
        'id'             => $id,
        'nome'           => $nome,
        'responsavel'    => $responsavel,
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
