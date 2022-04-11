<?php

include_once '../includes/methodes.php';
include_once '../includes/functions.php';
include_once '../includes/autorizacao.php';
include_once '../repositories/perfis.php';

if($_SERVER['REQUEST_METHOD'] == 'GET') {
    if(isset($_GET['id'])) {
        $id = isset($_GET['id']) ? parseId($_GET['id']) : false;

        $params = array(
            'id' => $id
        );

        echo $id ? perfisID($params) : falha();
        
    } else {
        echo perfisTodas();

    }

    exit;
}

echo falha("metodo {$_SERVER['REQUEST_METHOD']} não disponível.");
exit;
