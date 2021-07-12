<?php
/**
 * Configuração geral
 */
date_default_timezone_set('America/Sao_Paulo');

//dados do banco - MYSQL
define( 'DB_HOSTNAME', 'localhost' );
define( 'DB_NAME', 'finance' );
define( 'DB_USER', 'root' );
define( 'DB_PASSWORD', '');
define( 'DB_CHARSET', 'utf8' );

if(!@$_GET['api_key']){

    if($_SERVER['HTTP_HOST'] != 'localhost'){
        if (!(isset($_SERVER['HTTPS']) && ($_SERVER['HTTPS'] == 'on' ||  $_SERVER['HTTPS'] == 1) ||  
            isset($_SERVER['HTTP_X_FORWARDED_PROTO']) &&  $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https'))
        {
            $redirect = 'https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
            header('HTTP/1.1 301 Moved Permanently');
            header('Location: ' . $redirect);
            exit();
        }
    }
}

//dados do banco - Mongo
if($_SERVER['HTTP_HOST'] == 'localhost'){
    define( 'URL', 'http://localhost/finances' );
    define( 'URL_API', 'http://localhost/finances' );
}else{
   define( 'URL', 'https://'.$_SERVER['HTTP_HOST']);
   define( 'URL_API', $_SERVER['HTTP_HOST']);
}

define( 'DIR', dirname( __FILE__ ) );
define( 'JS', URL."/views/_js/");
define( 'CSS', URL."/views/_css/");

// Carrega o loader, que vai carregar a aplicação inteira
require_once DIR . '/loader.php';
