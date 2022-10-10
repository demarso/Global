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
  <link rel="stylesheet" href="css/style.css?version=12">
  <link rel="stylesheet" href="css/navbar.css">
  <link rel="stylesheet" type="text/css" href="css/estilo.css?version=12"/>
  <link rel="stylesheet" type="text/css" href="css/style_menu.css?version=12" />
</head>
<body class="bg-info">
  <?  include "menuI.php"; ?>  
<div class="container" id="home">
   <center>
   <br />
   <form name="form1" method="post" action="editInstalador1.php" >
    <h1>Selecione o nome do Instalador</h1>
    <div class="form-group row mt-5 mb-5">
      <label class="col-sm-2 col-form-label" for="instalador">Instalador</label>
      <div class="col-md-3">
        <select class="form-control" name="instalador" id="comboSelect">
            <option value="" class="text-muted">- - -</option>
              <?php
                include ("conexao.php");
                $sql = "SELECT idInstalador, nome FROM instalador Where status='Ativo' ORDER BY nome";
                $results = mysqli_query($conn,$sql);
                while ( $row = mysqli_fetch_array($results) ) {
                  echo "<option value='".$row[0]."'>".$row[1]."</option>";
                }
              ?>
        </select>  
      </div>
    </div>
    <div class="form-group mt-2 mb-5">
      <div class="form-row">
        <button class="btn btn-primary btn-block">P R Ó X I M O</button>
      </div>
    </div>
   </form>
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