<?php 

$servername = "localhost";
$username = "root";
$password = "";
$database = "elephant_edu";

try {
    $conexao = new PDO("mysql:host={$servername};dbname={$database}", $username, $password);
    $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $server = "{$_SERVER['HTTP_ORIGIN']}/elephant_edu";

} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();

}
