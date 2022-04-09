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

    $usuario = autenticacaoUsuario($params);

	session_start();
		
	if ($usuario) {
		$_SESSION['id'] = $usuario['id'];
		$_SESSION['nome_usuario'] = $usuario['nome_usuario'];
		$_SESSION['token'] = $usuario['token'];
		$_SESSION['id_perfil'] = $usuario['id_perfil'];

		echo sucesso('usuário autenticado!');
		header("Location:/elephant_edu/app/views/inicio.php");

	} else{
		$_SESSION['erro_login'] = true;

		echo falha('usuário não autenticado!', 401);
		header("Location:/elephant_edu/app/views/login.php");
		
	}

    exit;
}

echo falha("metodo {$_SERVER['REQUEST_METHOD']} não disponível.");
exit;