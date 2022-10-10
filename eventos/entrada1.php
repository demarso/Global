<?php
session_start();
date_default_timezone_set('America/Sao_Paulo');
if (!isset($_SESSION['id'])){
    header("Location: index.php?erro=1");
    exit;
 }

  $datacad = $_POST['datacadA'];
  $horacad = $_POST['horacadA'];
  $placa = $_POST['placa'];
  
 include ("conexaoG.php");

$sql = "SELECT * FROM producao WHERE placa = '$placa'";
      $results = mysqli_query($conn,$sql);
      while ( $row = mysqli_fetch_array($results) ) {
      $idProd = $row['idProducao'];
      $id = $row['idConsultor']; 
      $associado = $row['associado']; 
      $veiculo = $row['veiculo'];
      }     
 $sql1 = "SELECT * FROM consultor WHERE idConsultor = '$id'";
      $resultado1 = mysqli_query($conn,$sql1) or die (mysql_error());
      while ($linha1 = mysqli_fetch_array($resultado1)) {
       $id = $linha1['idConsultor'];
       $consultor1 = $linha1['nome'];
       $equipe = $linha1['equipe'];
       $regional = $linha1['regional'];
      }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta http-equiv="Content-type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>GLOBAL - SINISTROS</title>  
  <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body class="bg-info">
  <?  include "menu.php"; ?>  
  <div class="container" id="home">
    <div class="row">
      <div class="col-12 mb-3 mt-2">
        <H1>ENTRADA DE VEÍCULOS COM EVENTOS</H1>
      </div>
    </div>
    <div class="row">
      <div class="col-12">    
        <form action="entradaOK.php" method="post" name="form1">
          <div class="form-group row">
            <label class="col-sm-2 col-form-label" for="datacadA">Data:</label>
            <div class="col-md-3">
              <input type="date" name="datacadA" id="datacadA" class="form-control" id="DataInput" value="<? echo $datacad; ?>" readonly>
            </div>
          </div>  
          <div class="form-group row">  
            <label class="col-sm-2 col-form-label" for="horacadA">Hora:</label>
            <div class="col-md-3">
              <input type="time" name="horacadA" id="horacadA" class="form-control" value="<? echo $horacad; ?>" readonly>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label" for="placa">Placa:</label>
            <div class="col-md-5">  
              <input type="text" name="placa" id="placa" class="form-control" value="<? echo $placa; ?>" readonly>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label" for="veiculo">Veículo:</label>
            <div class="col-md-5">
              <input type="text" name="veiculo" id="veiculo" class="form-control" value="<? echo $veiculo; ?>" readonly>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label" for="associado">Associado:</label>
            <div class="col-md-5">
              <input type="text" name="associado" id="associado" class="form-control" value="<? echo $associado; ?>" readonly>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label" for="consultor">Consultor:</label>
            <div class="col-md-5">
              <input type="text" name="consultor" id="consultor" class="form-control" value="<? echo $consultor1; ?>" readonly>
            </div>
          </div>
          <div class="form-group row">
            <label class="col-sm-2 col-form-label" for="consultor">Regional:</label>
            <div class="col-md-5">
              <input type="text" name="regional" id="regional" class="form-control" value="<? echo $regional; ?>" readonly>
            </div>
          </div>
          <div class="form-group mt-2">
            <div class="form-row">
              <button class="btn btn-primary btn-block">S A L V A R</button>
            </div>
          </div>
      </form>
    </div>
    </div>
 </div>
 <? include "footer.html"; ?>
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>  
</body>
</html>