<?php 


if($_SERVER['REQUEST_METHOD'] == 'GET') {
	session_start();

	if (isset($_SESSION['id'])) {
		header("Location:app/views/dashboard.php");

	} else {
		header("Location:app/views/login.php");
	
	}
}
