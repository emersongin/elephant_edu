<?php 

session_start();

$server = 'http://localhost/projeto5periodo-main_login_ok/';

if (isset($_SESSION['id'])) {
	header("Location:{$server}dashboard.php");

} else {
	header("Location:{$server}login.php");

}
