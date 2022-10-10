<?php
session_start();
date_default_timezone_set('America/Sao_Paulo');
if (!isset($_SESSION['id'])){
    header("Location: index.php?erro=1");
    exit;
 }
$usuario = $_SESSION['nome'];
 //echo "<script language=\"JavaScript\" charset=\"utf-8\">alert(\"PARA EDITAR O VALOR OU O RASTREADOR, CLIQUE NA CÉLULA CORRESPONDENTE!\")</script>";
 ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
        <title>Gestão da PIBBM</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <link rel="stylesheet" href="css/estilo.css?version=12" type="text/css"/>
        <link rel="stylesheet" href="css/styles_menu.css" type="text/css"/>

        
    </head>
<body>

  <div id="interfaceF">
    <center><h2>USUÁRIO RESPONSÁVEL</h2></center>
    <fieldset id="forms" style="background-color:#E9E9E9">
      <?php
        $idProd = $_GET['id'];
        include("conexao.php");
        $sql = "SELECT placa, usuario FROM producao WHERE idProducao = '$idProd' ";
        //WHERE MONTH(dataProposta) = '$mes'
          $resultado = mysqli_query($conn,$sql) or die (mysql_error());
          while ($linha = mysqli_fetch_array($resultado)) {
      
          $usuario = $linha['usuario'];
          $placa = $linha['placa']; 

          }
          if($usuario != ""){
             echo "<center><font size='5' color='blue'>Responsável pelo cadastro desta proposta:</font><br><br>";
             echo "<font size='8' color='green'>Placa: ".$placa."</font><br><br>";
             echo "<font size='10' color='red'>".$usuario."</font></center>";
          }else{
             echo "<center><font size='6' color='black'>Não foi informado quem cadastrou esta proposta!</font></center>";
          }
        ?>     
    </fieldset>
   
 </div>
</body>
</html>