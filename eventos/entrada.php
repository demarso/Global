<?php
session_start();
date_default_timezone_set('America/Sao_Paulo');
if (!isset($_SESSION['id'])){
    header("Location: index.php?erro=1");
    exit;
 }

  $datacad = date('Y-m-d');
  $horacad = date('H:i');
  $datacad2 = date('Y/m/d');
  $horacad2 = date('H:i');
  
 include ("conexaoG.php");
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
        <form action="entrada1.php" method="post" name="form1">
        <div class="form-group">
          <div class="form-row">
            <div class="input-group-prepend">
             <div class="col-form-label col-form-label-lg" for="datacadA">Data:</div>
            </div>
            <div class="col-md-2">
             <input type="date" name="datacadA" id="datacadA" size="10" class="form-control" id="DataInput" value="<? echo $datacad ?>" readonly>
            </div>
            <div class="input-group-prepend ml-2">
              <div class="col-form-label col-form-label-lg">Hora:</div>
            </div>
            <div class="col-md-2">
              <input type="time" name="horacadA" id="horacadA" size="4" class="form-control" value="<? echo $horacad ?>" readonly>
            </div>
          </div>
        </div>
        <div class="form-group mt-2">
          <div class="form-row">
            <div>
              <label class="col-form-label col-form-label-lg" for="placa">Placa:</label>
            </div>
            <div class="col-3">  
              <select class="form-control" name="placa" id="placa" onchange="this.form.submit();">
               <option value="">---</option>
                  <?php
                    $sql2 = "SELECT DISTINCT placa FROM producao WHERE placa != ''  GROUP BY placa ORDER BY placa";
                    $results2 = mysqli_query($conn,$sql2);
                    while ( $row2 = mysqli_fetch_array($results2) ) {
                      echo "<option value='".$row2[0]."'>".$row2[0]."</option>";
                    }
                  ?>
              </select>
            </div>
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