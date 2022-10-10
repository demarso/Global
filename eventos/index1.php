<?php
session_start();
date_default_timezone_set('America/Sao_Paulo');
if (!isset($_SESSION['id'])){
    header("Location: index.php?erro=1");
    exit;
 }
 if($_SESSION['nivel'] != 10 || $_SESSION['stat'] != 3){
     echo "<script>alert('Voce nao tem permissao para acessar esta pagina!');history.back(-1);</script>";
     exit;
  }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta http-equiv="Content-type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>GLOBAL - EVENTOS</title>  
  <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body class="bg-info">
  <?  include "menu.php"; ?>  
  <div class="container" id="home">
    <div class="row">
        <div class="col-12 text-center mt-5">
            <h1>GLOBAL - CONTROLE DO EVENTOS</h1>
        </div>
    </div>
 </div>
 <? include "footer.html"; ?>
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>  
</body>
</html>