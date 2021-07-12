<?php if (!defined('DIR')) exit; ?>

<!DOCTYPE html>

<html lang="pt-BR">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="<? echo JS ?>jquery.min.js"></script>
    <script>
        var URL_JS = '<? echo URL ?>';
    </script>
    <script src="<? echo JS ?>funcoesGerais.js"></script>
    <link rel="stylesheet" type="text/css" href="<? echo CSS ?>style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <title><?php echo $this->title; ?></title>
</head>

<body class="nav-md">
    <header>
        <div class="row">
            <div id="text-header" class="col-md-12">

                <span>Finances Control</span>

            </div>
        </div>
    </header>