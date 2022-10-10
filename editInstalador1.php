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
   <?  
     include ("conexao.php");
     $idInstalador = $_POST['instalador'];

     $sql = "SELECT nome FROM instalador Where idInstalador='$idInstalador'";
          $results = mysqli_query($conn,$sql);
          while ( $row = mysqli_fetch_array($results) ) {
              $instalador = $row['nome'];}
   ?>
   <form name="form1" method="post" action="editInstaladorOK.php" >
    <h1>Altere o nome do Instalador</h1>
    <div class="form-group row mt-5 mb-5">
      <label class="col-sm-2 col-form-label" for="idinstalador">ID:</label>
      <div class="col-md-3">
        <input type="text" class="form-control text-muted" id="comboSelect" name="idinstalador" value="<? echo  $idInstalador; ?>" readonly>
      </div>
    </div>
    <div class="form-group row mt-1 mb-1">
      <label class="col-sm-2 col-form-label" for="instalador" id="comboSelect">Nome:</label>
      <div class="col-md-3">
        <input type="text" class="form-control" name="instalador" value="<? echo $instalador; ?>">   
      </div>
    </div>
     <div class="form-group mt-5 mb-5">
      <div class="form-row">
        <button class="btn btn-primary btn-block">A L T E R A R</button>
      </div>
    </div>
      </table>
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