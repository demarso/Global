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
<script type="text/javascript">
	
  function mudaFoto(foto){
		document.getElementById("icone").src = foto;
	}

 </script>
</head>
<body>
<!--<img id="logo" src="imagens/logo.png" >-->
<div id="interface">
 <?php include "cabecalho1.php"; ?>
   <center>
   <br />
   <?php
      include("conexao.php");
      
      
      $idProd = $_POST['idProd']; 
      $placa = $_POST['placa']; 
      $consultor = $_POST['consultor']; 
      $substituicao = $_POST['substituicao'];
      $migracao = $_POST['migracao'];
      $vistoria = $_POST['vistoria'];
      $pendencia = $_POST['pendencia'];
      $obsprod = $_POST['obsprod'];
      $rastreador = $_POST['rastreador']; 
      $dataInstalacao = $_POST['data']; 
      $localInstalacao = $_POST['local']; 
      $equipamento = $_POST['equipamento']; 
      $instalador = $_POST['instalador'];
      $corte = $_POST['corte']; 
      $ship = $_POST['ship']; 
      $obsInstalacao = $_POST['obsinst'];
      $datacadA = $_POST['datacadA'];
      $horacadA = $_POST['horacadA'];
      $datacadB = $_POST['datacadB'];
      $horacadB = $_POST['horacadB'];

       $sql1 = "SELECT idConsultor FROM consultor WHERE nome = '$consultor'";
      $resultado1 = mysqli_query($conn,$sql1) or die (mysql_error());
      while ($linha1 = mysqli_fetch_array($resultado1)) {
       $idC = $linha1['idConsultor'];
      }

      
        $sql ="UPDATE producao SET
                      idConsultor = '$idC',
                      placa = '$placa',
                      substituicao = '$substituicao',
                      migracao = '$migracao',
                      vistoria = '$vistoria',
                      pendencia = '$pendencia',
                      obsProducao = '$obsprod',
                      rastreador = '$rastreador',
                      dataInstalacao = '$dataInstalacao',
                      localInstalacao = '$localInstalacao',
                      equipamento = '$equipamento',
                      instalador = '$instalador',
                      corte = '$corte',
                      ship = '$ship',
                      obsInstalacao = '$obsInstalacao',
                      datacadB = '$datacadB',
                      horacadB = '$horacadB'
                      WHERE idProducao = '$idProd'";
      
      $query = mysqli_query($conn,$sql) or die(mysql_error()); 
 
      $var = "<script language=javascript>window.history.go(-2);</script>";
      echo $var;

      ?>
   </center>
   <br /><br />
<footer id="footer">   
   <?php include "footer.php"; ?>
</footer>
</div>
</body>
</html>