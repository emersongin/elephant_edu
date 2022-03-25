<?php 

include "../config/database/conexao.php";

try {

	$conexao->beginTransaction();

	$sql = 
		"SELECT
			u.*
		FROM
			usuarios u
		WHERE
			u.nome = :nome
			AND u.senha = :senha";

	$parametros = Array(
		'nome' => $_POST['nome'],
		'senha' => $_POST['senha']
	);

	$consulta = $conexao->prepare($sql);
	$consulta->execute($parametros);

	$usuario = $consulta->fetch(PDO::FETCH_ASSOC);

	$conexao->commit();

	session_start();
	
	if ($usuario) {
		$_SESSION['id'] = $usuario['id'];
	
		header("Location:{$server}dashboard.php");
	
	} else{
		$_SESSION['erro_login'] = true;
	
		header("Location:{$server}login.php");
		
	}

} catch(PDOException $e) {
	$conexao->rollback();

	echo $e;

}
