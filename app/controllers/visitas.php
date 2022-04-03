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
        echo visitasTodas();

    }

    exit;
}

if($_SERVER['REQUEST_METHOD'] == 'POST') {

    $id_usuario = isset($_POST['id_usuario']) ? parseID($_POST['id_usuario']) : false;
    $id_setor = isset($_POST['id_setor']) ? parseID($_POST['id_setor']) : false;
    $id_escola = isset($_POST['id_escola']) ? parseID($_POST['id_escola']) : false;
    $qtd_alunos = isset($_POST['qtd_alunos']) ? parseID($_POST['qtd_alunos']) : false;
    $conteudo = isset($_POST['conteudo']) ? parseTexto($_POST['conteudo']) : false;
    $professor = isset($_POST['professor']) ? parseTexto($_POST['professor']) : false;
    $telefone = isset($_POST['telefone']) ? parseTexto($_POST['telefone']) : false;
    $data = isset($_POST['data']) ? parseTexto($_POST['data']) : false;
    $criado_em = isset($_POST['criado_em']) ? parseTexto($_POST['criado_em']) : false;

    $valido = $id_usuario && $id_setor && $id_escola && $qtd_alunos && $conteudo && $professor && $telefone && $data && $criado_em;
    $params = array(
        'id_usuario'  => $id_usuario,
        'id_setor'    => $id_setor,
        'id_escola'   => $id_escola,
        'qtd_alunos'  => $qtd_alunos,
        'conteudo'    => $conteudo,
        'professor'   => $professor,
        'telefone'    => $telefone,
        'data'        => $data,
        'criado_em'   => $criado_em
    );

    echo $valido ? visitasInserir($params) : falha('parametros inválido!');
    exit;
}

if($_SERVER['REQUEST_METHOD'] == 'PUT') {
    
    $id = isset($_GET['id']) ? parseId($_GET['id']) : false;
    $id_usuario = isset($_POST['id_usuario']) ? parseID($_POST['id_usuario']) : false;
    $id_setor = isset($_POST['id_setor']) ? parseID($_POST['id_setor']) : false;
    $id_escola = isset($_POST['id_escola']) ? parseID($_POST['id_escola']) : false;
    $qtd_alunos = isset($_POST['qtd_alunos']) ? parseID($_POST['qtd_alunos']) : false;
    $conteudo = isset($_POST['conteudo']) ? parseTexto($_POST['conteudo']) : false;
    $professor = isset($_POST['professor']) ? parseTexto($_POST['professor']) : false;
    $telefone = isset($_POST['telefone']) ? parseTexto($_POST['telefone']) : false;
    $data = isset($_POST['data']) ? parseTexto($_POST['data']) : false;
    $criado_em = isset($_POST['criado_em']) ? parseTexto($_POST['criado_em']) : false;

    $valido = $id && $id_usuario && $id_setor && $id_escola && $qtd_alunos && $conteudo && $professor && $telefone && $data && $criado_em;
    $params = array(
        'id'          => $id,
        'id_usuario'  => $id_usuario,
        'id_setor'    => $id_setor,
        'id_escola'   => $id_escola,
        'qtd_alunos'  => $qtd_alunos,
        'conteudo'    => $conteudo,
        'professor'   => $professor,
        'telefone'    => $telefone,
        'data'        => $data,
        'criado_em'   => $criado_em
    );

    echo $valido ? visitasInserir($params) : falha('parametros inválido!');
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
