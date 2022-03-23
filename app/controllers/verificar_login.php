<?php 

include "../config/database/conexao.php";

$cpf = $_POST['cpf'];
$senha = $_POST['senha'];

$server = 'http://localhost/projeto5periodo-main_login_ok/';

$sql = 
	"SELECT 
		u.* 
	FROM 
		usuarios u 
	WHERE 
		u.nome = '$cpf' 
		AND u.senha = '$senha'";

$resultado = mysqli_query($conexao, $sql);
$quantidade= mysqli_num_rows($resultado);

session_start();
// $_SESSION['method'] = $_SERVER['REQUEST_METHOD'];

if ($quantidade > 0) {
	$_SESSION['cpf'] = $cpf;

	header("Location:{$server}dashboard.html");

} else{
	$_SESSION['erro_login'] = true;

	header("Location:{$server}login.php");
	
}


/*echo "$quantidade";*/

