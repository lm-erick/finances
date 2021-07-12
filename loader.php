<?php



// Evita que usuários acesse este arquivo diretamente
if (!defined('DIR')) exit;

// Inicia a sessão
session_start();

require_once DIR . '/router.php';
require_once DIR . '/utils.php';

// Carrega a aplicação
$router = new Router();
