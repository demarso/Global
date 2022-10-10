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
      $mes = date("m");
      $ano = date("Y");
      $usuario = $_SESSION['nome'];
      $datacadA = $_POST['datacadA'];
      $horacadA = $_POST['horacadA'];
      $datacadB = "";
      $horacadB = "";
      $consultor = $_POST['consultor']; 
      $associado = $_POST['associado']; 
      $veiculo = $_POST['veiculo'];
      $placa = strtoupper($_POST['placa']);
      $chassi = strtoupper($_POST['chassi']);
      $reserva = $_POST['reserva']; 
      $dataProposta = $_POST['dataP'];
      $dataRecebimento = $_POST['dataR'];
      $substituicao = $_POST['substituicao']; 
      $rastrea = $_POST['rastrea']; 
      $migracao = $_POST['migracao']; 
      $reativacao = $_POST['reativacao'];
 /*     $pendencia = $_POST['pendencia']; 
      $obsProducao = $_POST['obsprod']; */
    
  //   echo $datacadA."<br />".$horacadA."<br />".$consultor."<br />".$dataProposta."<br />".$dataRecebimento."<br />";
      $sql1 = "SELECT idConsultor FROM consultor WHERE nome = '$consultor'";
      $resultado1 = mysqli_query($conn,$sql1) or die (mysql_error());
      while ($linha1 = mysqli_fetch_array($resultado1)) {
       $id = $linha1['idConsultor'];
      }

     
      if($placa != ""){
          $sql = "SELECT chassi FROM producao WHERE chassi = '$chassi' and month(dataProposta) = '$mes'  and year(dataProposta) = '$ano'";
          $tabela = mysqli_query($conn,$sql) or die(mysql_error());
          $registro = mysqli_num_rows($tabela);
      
          if ($registro != 0)
          {
               echo "<script>alert(\"Veículo já cadastrado!\");history.go(-2);</script>";
                exit;
          }
        }

        if($rastrea == "Não")
            $rastreador = "Sem Rastreio";
        else if ($rastrea == "Sim")
            $rastreador = "Agendar";

        $sql1 = "INSERT INTO producao(
                                      idConsultor,
                                      associado,
                                      veiculo,
                                      placa,
                                      chassi,
                                      dataProposta,
                                      dataRecebimento,
                                      substituicao,
                                      migracao,
                                      vistoria,
                                      rastreador,
                                      datacadA,
                                      horacadA,
                                      datacadB,
                                      horacadB,
                                      rastrea,
                                      status,
                                      reserva,
                                      reativacao,
                                      usuario
                                     ) 
                              VALUES(
                                      '$id',
                                      '$associado',
                                      '$veiculo',
                                      '$placa',
                                      '$chassi',
                                      '$dataProposta',
                                      '$dataRecebimento',
                                      '$substituicao',
                                      '$migracao',
                                      '$vistoria',
                                      '$rastreador',
                                      '$datacadA',
                                      '$horacadA',
                                      '$datacadB',
                                      '$horacadB',
                                      '$rastrea',
                                      'Ativo',
                                      '$reserva',
                                      '$reativacao',
                                      '$usuario'
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