<?php 

if($_SERVER['REQUEST_METHOD'] == 'GET') {
	session_start();

	if (isset($_SESSION['id'])) {
		header("Location:{$server}/projeto5periodo-main_login_ok/dashboard.php");
	
	} else {
		header("Location:{$server}/projeto5periodo-main_login_ok/login.php");
	
	}
}
