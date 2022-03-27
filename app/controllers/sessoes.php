<?php 

if($_SERVER['REQUEST_METHOD'] == 'GET') {
	session_start();

	if (isset($_SESSION['id'])) {
		header("Location:{$server}/elephant_edu/dashboard.php");
	
	} else {
		header("Location:{$server}/elephant_edu/login.php");
	
	}
}
