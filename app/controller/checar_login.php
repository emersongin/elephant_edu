<?php 

session_start();

if (isset($_SESSION['cpf'])) {
	header('Location:dashboard.php');

} else {
	header('Location:tela_login.php');

}
