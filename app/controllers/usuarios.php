<?php

include_once '../includes/methodes.php';
include_once '../includes/functions.php';
include_once '../includes/autorizacao.php';
include_once '../repositories/usuarios.php';

if($_SERVER['REQUEST_METHOD'] == 'GET') {
    if(isset($_GET['id'])) {
        $id = isset($_GET['id']) ? parseId($_GET['id']) : false;

        $params = [ 'id' => $id ];

        echo $id ? usuariosID($params) : falha();
        
    } else {
        echo usuariosTodas([
            'id_user' => $auth_user_id
        ]);

    }

    exit;
}

if($_SERVER['REQUEST_METHOD'] == 'POST') {    

    $nome = isset($_POST['nome']) ? parseTexto($_POST['nome']) : false;
    $cpf = isset($_POST['cpf']) ? parseTexto($_POST['cpf']) : false;
    $senha = isset($_POST['senha']) ? parseTexto($_POST['senha']) : false;
    $telefone = isset($_POST['telefone']) ? parseTexto($_POST['telefone']) : false;
    $id_perfil = isset($_POST['id_perfil']) ? parseId($_POST['id_perfil']) : false;

    $valido = $nome && $cpf && $senha && $telefone && $id_perfil;
    $params = [
        'nome'      => $nome,
        'cpf'       => $cpf,
        'senha'     => $senha,
        'telefone'  => $telefone,
        'id_perfil' => $id_perfil
    ];

    echo $valido ? usuariosInserir($params) : falha('parametros inválido!');
    exit;
}

if($_SERVER['REQUEST_METHOD'] == 'PUT') {
    
    $id = isset($_GET['id']) ? parseId($_GET['id']) : false;
    $nome = isset($_PUT['nome']) ? parseTexto($_PUT['nome']) : false;
    $cpf = isset($_PUT['cpf']) ? parseTexto($_PUT['cpf']) : false;
    $telefone = isset($_PUT['telefone']) ? parseTexto($_PUT['telefone']) : false;
    $id_perfil = isset($_PUT['id_perfil']) ? parseId($_PUT['id_perfil']) : false;

    $valido = $id && $nome && $cpf && $telefone && $id_perfil;
    $params = [
        'id'        => $id,
        'nome'      => $nome,
        'cpf'       => $cpf,
        'telefone'  => $telefone,
        'id_perfil' => $id_perfil
    ];

    echo $valido ? usuariosAtualizar($params) : falha('parametros inválido!');
    exit;
}

if($_SERVER['REQUEST_METHOD'] == 'DELETE') {
    
    $id = isset($_DELETE['id']) ? parseId($_DELETE['id']) : false;

    $params = [ 'id' => $id ];

    echo $id ? usuariosApagar($params) : falha('parametros inválido!');
    exit;
}

echo falha("metodo {$_SERVER['REQUEST_METHOD']} não disponível.");
exit;
