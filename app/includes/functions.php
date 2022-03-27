<?php

include_once './methodes.php';

function parseId($dado) {
    return intval($dado) > 0 ? intval($dado) : false;
}

function parseTexto($dado) {
    return is_string($dado) && strlen($dado) > 2 ? $dado : false;
}

function sucesso($dado = true, $code = 200) {
    http_response_code($code);

    return json_encode(array(
        'retorno' => true,
        'dado' => $dado,
        'code' => $code
    ));
}

function falha($erro = false, $code = 400) {
    http_response_code($code);

    return json_encode(array(
        'retorno' => false,
        'dado' => $erro,
        'code' => $code
    ));
}
