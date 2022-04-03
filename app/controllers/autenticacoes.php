<?php 

include_once '../includes/methodes.php';
include_once '../includes/functions.php';
include_once '../repositories/autenticacoes.php';

if($_SERVER['REQUEST_METHOD'] == 'POST') {

    $nome = isset($_POST['nome']) ? parseTexto($_POST['nome']) : false;
	$senha = isset($_POST['senha']) ? parseTexto($_POST['senha']) : false;

    $valido = $nome && $senha;
    $params = array(
        'nome'  => $nome,
        'senha' => $senha
    );

    $valido ? $usuario = autenticacaoUsuario($params) : falha('parametros inválido!');

	session_start();
		
	if ($usuario) {
		$_SESSION['id'] = $usuario['id'];
		$_SESSION['id_perfil'] = $usuario['id_perfil'];

		header("Location:../views/dashboard.php");

	} else{
		$_SESSION['erro_login'] = true;

		header("Location:../views/login.php");

	}

    exit;
}


echo falha("metodo {$_SERVER['REQUEST_METHOD']} não disponível.");
exit;