<?php

if(session_status() == PHP_SESSION_NONE) {
    session_start();
}


// VARIÁVEIS DE CONFIGURAÇÃO
$GLOBALS['config'] = array(
    'mysql' => array(
        'host' => '127.0.0.1',
        'username' => 'root',
        'password' => 'adm371',
        'dbname' => 'guttenberg1'
    ),
    'lembrar_me' => array(
        'cookie_name' => 'hash',
        'cookie_expiry' => 604800
    ),
    'session' => array(
        'session_name' => 'usuario',
        'token_name' => 'token'
    )
);

// AUTOLOADER DE CLASSES
spl_autoload_register(function ($class) {
    require_once 'Models/' . $class . '.php';
});

require_once 'Functions/sanitize.php';