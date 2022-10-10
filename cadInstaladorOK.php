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
      
      $instalador = strtoupper($_POST['instalador']);

      $sql = "SELECT nome FROM instalador WHERE nome = '$instalador'";
      $tabela = mysqli_query($conn,$sql) or die(mysql_error());
      $registro = mysqli_num_rows($tabela);
  
      if ($registro != 0)
      {
           echo "<script>alert(\"Instalador já cadastrado!\");history.go(-2);</script>";
      }
      else
      {
           $sql1 = "INSERT INTO instalador (nome, status) VALUES ('$instalador','Ativo')";
           $result1 = mysqli_query($conn,$sql1) or die ("Cadastro do Instalador não realizado.");
           $var = "<script language=javascript>window.history.go(-2);</script>";
           echo $var;
      }   
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