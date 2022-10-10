<?php
session_start();
if (!isset($_SESSION['id'])){
    header("Location: index.php?erro=1");
    exit;
 }
 ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta http-equiv="Content-type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>GESTÃO - GLOBAL</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/navbar.css">
  <link rel="stylesheet" type="text/css" href="css/estilo.css?version=12"/>
  <link rel="stylesheet" type="text/css" href="css/style_menu.css?version=12" />
</head>
<body class="bg-info">
  <?  include "menuI.php"; ?>  
<div class="container" id="home">
   <center>
   <?php
      include("conexao.php");
      $idInstalador = $_POST['idinstalador'];
      $instalador   = $_POST['instalador'];

      $sql2 = "UPDATE instalador SET nome='$instalador' WHERE IdInstalador = '$idInstalador'";
      $result = mysqli_query($conn,$sql2) or die ("Cadastro do Consultor não atualizado.");
      
      echo "<script type = 'text/javascript'> location.href = 'editInstalador.php'</script>"; 
   ?>
   </center>
</div>
 <? include "footer.html"; ?>
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/navbar.js"></script>
    <script src="js/script.js"></script>  
</body>
</html>