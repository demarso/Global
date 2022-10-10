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
      
      $datacadA = $_POST['datacadA'];
      $horacadA = $_POST['horacadA'];
      $datacadB = "";
      $horacadB = "";
      $consultor = $_POST['consultor']; 
      $associado = $_POST['associado']; 
      $veiculo = $_POST['veiculo'];
      $placa = strtoupper($_POST['placa']); 
      $dataProposta = $_POST['dataP'];
      $dataRecebimento = $_POST['dataR']; 
      $substituicao = $_POST['substituicao']; 
      $migracao = $_POST['migracao']; 
      $vistoria = $_POST['vistoria'];
      $pendencia = $_POST['pendencia']; 
      $obsProducao = $_POST['obsprod']; 
    
               
        $sql1 = "SELECT idConsultor FROM consultor WHERE nome = '$consultor'";
        $resultado1 = mysqli_query($conn,$sql1) or die (mysql_error());
        while ($linha1 = mysqli_fetch_array($resultado1)) {
         $id = $linha1['idConsultor'];
        }
        if($placa != ""){
          $sql = "SELECT placa FROM producao WHERE placa = '$placa'";
          $tabela = mysqli_query($conn,$sql) or die(mysql_error());
          $registro = mysqli_num_rows($tabela);
      
          if ($registro != 0)
          {
               echo "<script>alert(\"Placa já cadastrada!\");history.go(-2);</script>";
               exit;
          }
        }
        
        $sql1 = "INSERT INTO producao(
                                      idConsultor,
                                      associado,
                                      veiculo,
                                      placa,
                                      dataProposta,
                                      dataRecebimento,
                                      substituicao,
                                      migracao,
                                      vistoria,
                                      pendencia,
                                      obsProducao,
                                      datacadA,
                                      horacadA,
                                      datacadB,
                                      horacadB
                                     ) 
                              VALUES(
                                      '$id',
                                      '$associado',
                                      '$veiculo',
                                      '$placa',
                                       STR_TO_DATE('$dataProposta','%d/%m/%Y'),
                                       STR_TO_DATE('$dataRecebimento','%d/%m/%Y'),
                                      '$substituicao',
                                      '$migracao',
                                      '$vistoria',
                                      '$pendencia',
                                      '$obsProducao',
                                      STR_TO_DATE('$datacadA','%d/%m/%Y'),
                                      STR_TO_DATE('$horacadA','%H:%i'),
                                      '$datacadB',
                                      '$horacadB'
                                    )";
   
        $result1 = mysqli_query($conn,$sql1) or die ("Cadastro da Produção não realizado.");

      echo "<script type = 'text/javascript'> location.href = 'cadProducao.php'</script>"; 
      
    
   ?>
   </center>
   <br /><br />
<footer id="footer">   
   <?php include "footer.php"; ?>
</footer>
</div>
</body>
</html>