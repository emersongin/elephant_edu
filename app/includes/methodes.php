<?php

$GLOBALS['_DELETE'] = array();
$GLOBALS['_PUT'] = array();

if (!strcasecmp($_SERVER['REQUEST_METHOD'], 'POST') && empty($_POST)) {
    $_POST = json_decode(file_get_contents('php://input', true), true);
}

if (!strcasecmp($_SERVER['REQUEST_METHOD'], 'DELETE')) {
    $GLOBALS['_DELETE'] = json_decode(file_get_contents('php://input', true), true);
}

if (!strcasecmp($_SERVER['REQUEST_METHOD'], 'PUT')) {
    $GLOBALS['_PUT'] = json_decode(file_get_contents('php://input', true), true);
}
