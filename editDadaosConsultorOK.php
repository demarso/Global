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
  <link rel="stylesheet" type="text/css" href="css/estilo.css"/>
  <link rel="stylesheet" type="text/css" href="css/forms.css"/>
  <title>Gestão de Propostas</title>
<script type="text/javascript" src="include/jquery.js"></script>
<script type="text/javascript" src="include/micoxAjax.js"></script>
</head>
<body>
<!--<img id="logo" src="imagens/logo.png" >-->
<div id="interface">
 <?php include "cabecalho1P.php"; ?>
   <center>
   <br />
   <?php
      include("conexao.php");
      
      $id = $_POST['id'];
      $datacadA = $_POST['datacadA'];
      $horacadA = $_POST['horacadA'];
      $consultor = strtoupper($_POST['consultor']);
      $regional = strtoupper($_POST['regional']);
      $equipe = strtoupper($_POST['equipe']);
      $vinculo = strtoupper($_POST['vinculo']);
      $responsavel = $_SESSION['nome'];     
      echo $datacadA." ".$horacadA." ".$consultor." ".$regional." ".$equipe." ".$vinculo;
 /*
      $sql2 = "UPDATE consultor SET nome = '$consultor',regional = '$regional',equipe = '$equipe',vinculo = '$vinculo' WHERE idConsultor = '$id'";
      $result = mysqli_query($conn,$sql2) or die ("Alteração do nome do Consultor não realizado.");
      
      $sql3 = "INSERT INTO consultorHistorico (idConsultor,data,hora,motivo,responsavel) VALUES (' $id',$datacadA','$horacadA','Alteração','$responsavel')";
      $result = mysqli_query($conn,$sql3) or die ("Cadastro do Histórico do Consultor não realizado.");

      echo "<script type = 'text/javascript'> location.href = 'editDadosConsultor.php'</script>";
       */
   ?>
   </center>
  </div> 
   <br /><br />
<footer id="footer">   
   <?php include "footer.php"; ?>
</footer>
</div>
</body>
</html>