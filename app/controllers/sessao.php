<?php 

session_start();

if (isset($_SESSION['id'])) {
	header("Location:{$server}/dashboard.php");

} else {
	header("Location:{$server}/login.php");

}
