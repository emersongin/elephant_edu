<?php

function parseId($dado) {
    return intval($dado) > 0 ? intval($dado) : false;
}

function parseNumber($dado) {
    return is_numeric($dado) ? intval($dado) : false;
}

function parseTexto($dado) {
    return is_string($dado) && strlen($dado) > 2 ? $dado : false;
}

function sucesso($dado = true, $code = 200) {
    http_response_code($code);

    return json_encode($dado);
}

function falha($erro = false, $code = 400) {
    http_response_code($code);

    return json_encode($erro);
}
