<?php

include_once '../includes/methodes.php';
include_once '../includes/functions.php';
include_once '../includes/autorizacao.php';
include_once '../repositories/visitas.php';

if($_SERVER['REQUEST_METHOD'] == 'GET') {
    if(isset($_GET['id'])) {
        $id = isset($_GET['id']) ? parseId($_GET['id']) : false;

        $params = array(
            'id' => $id
        );

        echo $id ? visitasID($params) : falha();
        
    } else {
        echo visitasTodas([ 
            'id' => $auth_user_id, 
            'id_perfil' => $auth_user_id_perfil,
        ]);

    }

    exit;
}

if($_SERVER['REQUEST_METHOD'] == 'POST') {

    $id_usuario = isset($auth_user_id) ? parseID($auth_user_id) : false;

    $id_escola = isset($_POST['id_escola']) ? parseID($_POST['id_escola']) : false;
    $id_setor = isset($_POST['id_setor']) ? parseID($_POST['id_setor']) : false;
    $qtd_alunos = isset($_POST['qtdAlunos']) ? parseNumber($_POST['qtdAlunos']) : false;
    $professor = isset($_POST['professor']) ? parseTexto($_POST['professor']) : false;
    $telefone = isset($_POST['telefone']) ? parseTexto($_POST['telefone']) : false;
    $data = isset($_POST['data']) ? parseTexto($_POST['data']) : false;
    $conteudo = isset($_POST['conteudo']) ? parseTexto($_POST['conteudo']) : false;

    $valido = $id_usuario && $id_setor && $id_escola && $qtd_alunos && $conteudo && $professor && $telefone && $data;
    $params = array(
        'id_usuario'  => $id_usuario,
        'id_escola'   => $id_escola,
        'id_setor'    => $id_setor,
        'qtd_alunos'  => $qtd_alunos,
        'professor'   => $professor,
        'telefone'    => $telefone,
        'data_visita' => $data,
        'conteudo'    => $conteudo
    );

    echo $valido ? visitasInserir($params) : falha('parametros inválido!');
    exit;
}

if($_SERVER['REQUEST_METHOD'] == 'PUT') {
    $id = isset($_GET['id']) ? parseId($_GET['id']) : false;

    $id_setor = isset($_PUT['id_setor']) ? parseID($_PUT['id_setor']) : false;
    $qtd_alunos = isset($_PUT['qtdAlunos']) ? parseNumber($_PUT['qtdAlunos']) : false;
    $professor = isset($_PUT['professor']) ? parseTexto($_PUT['professor']) : false;
    $telefone = isset($_PUT['telefone']) ? parseTexto($_PUT['telefone']) : false;
    $data = isset($_PUT['data']) ? parseTexto($_PUT['data']) : false;
    $conteudo = isset($_PUT['conteudo']) ? parseTexto($_PUT['conteudo']) : false;

    $valido = $id && $id_setor && $qtd_alunos && $conteudo && $professor && $telefone && $data;
    $params = array(
        'id'          => $id,
        'id_setor'    => $id_setor,
        'qtd_alunos'  => $qtd_alunos,
        'professor'   => $professor,
        'telefone'    => $telefone,
        'data_visita' => $data,
        'conteudo'    => $conteudo
    );

    echo $valido ? visitasAtualizar($params) : falha('parametros inválido!');
    exit;
}

if($_SERVER['REQUEST_METHOD'] == 'DELETE') {
    $id = isset($_DELETE['id']) ? parseId($_DELETE['id']) : false;

    $params = array(
        'id' => $id
    );

    echo $id ? visitasApagar($params) : falha('parametros inválido!');
    exit; 
}

echo falha("metodo {$_SERVER['REQUEST_METHOD']} não disponível.");
exit;
