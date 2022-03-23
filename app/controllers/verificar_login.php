<?php 

include "../config/database/conexao.php";

$cpf = $_POST['cpf'];
$senha = $_POST['senha'];

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

if ($quantidade > 0) {
	session_start();

	$_SESSION['cpf'] = $cpf;

	header('Location:dashboard.html');

} else{
	header('Location:login.php');
	
}


/*echo "$quantidade";*/

