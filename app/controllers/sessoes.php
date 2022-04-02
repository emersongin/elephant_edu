<?php 


if($_SERVER['REQUEST_METHOD'] == 'GET') {
	session_start();

	if (isset($_SESSION['id'])) {
		header("Location:dashboard.php");
	
	} else {
		header("Location:login.php");
	
	}
}
