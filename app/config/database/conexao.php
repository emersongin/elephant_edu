<?php 

$host = "localhost"; // maquina ou host
$user = "root"; // user
$password = "";
$database = "login_top";

$conexao = mysqli_connect($host, $user, $password, $database);

mysqli_set_charset($conexao,'utf8');

if ($conexao == false) {
    http_response_code(500);
    
    echo "Erro de conexão não conhecida!";
}
