<?php 

session_start();

if (isset($_SESSION['cpf'])) {
	header('Location:../../dashboard.html');

} else {
	header('Location:../../login.php');

}
