<?php 

if($_SERVER['REQUEST_METHOD'] == 'GET') {
	session_start();

	if (isset($_SESSION['token'])) {
		header("Location:/elephant_edu/app/views/dashboard.php");

	} else {
		header("Location:/elephant_edu/app/views/login.php");
	
	}
}
