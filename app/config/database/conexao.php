<?php 

$servername = "localhost";
$username = "root";
$password = "";
$database = "elephant_edu";

try {
    $GLOBALS['conexao'] = new PDO("mysql:host={$servername};dbname={$database}", $username, $password);
    $GLOBALS['conexao']->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // echo json_encode($GLOBALS['conexao']);
    // exit;

    $server = "{$_SERVER['SERVER_NAME']}/elephant_edu";

} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();

}
