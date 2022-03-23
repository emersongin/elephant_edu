<?php 

session_start();

$server = 'http://localhost/projeto5periodo-main_login_ok/';

if (isset($_SESSION['cpf'])) {
	header("Location:{$server}dashboard.html");

} else {
	header("Location:{$server}login.php");

}
