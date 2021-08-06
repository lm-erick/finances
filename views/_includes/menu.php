<?php if (!defined('DIR')) exit;


if (!isset($_SESSION)) session_start();

if (!isset($_SESSION['userId'])) {

  session_destroy();

  header("Location: index.php");
  exit;
}

?>

<!DOCTYPE html>

<html lang="pt-BR">


<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="<?php echo CSS ?>style.css">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
  <link href="<?php echo URL ?>/views/_includes/fontawesome/css/all.css" rel="stylesheet">

  <script defer src="<?php echo URL ?>/views/_includes/fontawesome/js/all.js"></script>
  <script src="<?php echo JS ?>jquery.min.js"></script>
  <script src="<?php echo JS ?>jquery.mask.min.js"></script>

  <script>
    var URL_JS = '<?php echo URL ?>';
  </script>
  <script src="<?php echo JS ?>funcoesPainel.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
  <title><?php echo $this->title; ?></title>

  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.25/datatables.min.css" />

  <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.25/datatables.min.js"></script>



</head>

<body>
  <header>
    <div class="row">
      <div id="text-header" class="col-md-4">
        <span>Finances Control</span>
      </div>
      <div id="userInfo" class="col-md-8">
        <span>Olá, <?php echo $_SESSION['userName'] ?> <a href="<?php echo URL ?>/user/logout">Sair</a></span>
      </div>
    </div>
  </header>

  <div class="row">

    <nav id="menu" class="col-md-2">

      <label>Operações</label>
      <ul>
        <li><a href="<?php echo URL ?>/fluxo">Fluxo Financeiro</a></li>
      </ul>

      <label>Cadastros</label>
      <ul>
        <li><a href="<?php echo URL ?>/banco">Bancos</a></li>
        <li><a href="<?php echo URL ?>/categoria">Categorias</a></li>
        <li><a href="<?php echo URL ?>/conta">Contas</a></li>
      </ul>

    </nav>