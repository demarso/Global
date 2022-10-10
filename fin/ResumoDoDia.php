<?php
session_start();
date_default_timezone_set('America/Sao_Paulo');
if (!isset($_SESSION['idF'])){
    header("Location: index.php?erro=1");
    exit;
 }
 ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
        <title>Fin - Resumo</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <link rel="stylesheet" href="css/style.css?version=12" type="text/css" charset="utf-8"/>
         <link rel="stylesheet" href="css/style_menu.css?version=12" type="text/css"/>
         <link rel="stylesheet" href="css/bootstrap.min.css">
        <script type="text/javascript" src="include/jquery-1.3.2.js"></script>
        <script type="text/javascript" src="include/script.js?version=1"></script>
        <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
        <script type="text/javascript" src="include/script_menu.js"></script>
        <script type="text/javascript" src="include/micoxAjax.js?version=12"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
  
        
</head>
<body>

  <? 
  include "menu.php";
  ?>
 
 <div id="interface">
  <font size="6" color="yellow">
    <form name='form1' action='<? $myself ?>' method='post'>
     <input type="date" name="data" onchange="this.form.submit()">
     
    </form><br>
  <?php
  include "conexao.php";
  if(!empty($_POST['data'])){
   $hoje = $_POST['data'];

      $sql = "SELECT sum(valor) AS val from caixa where data='$hoje' and boleto = 'Dinheiro'";
      $resultado = mysqli_query($conn,$sql) or die (mysql_error());
      while ($linha = mysqli_fetch_array($resultado)) {
             $ent_dinheiro1 = $linha['val'];
            }
             $ent_dinheiro = number_format($ent_dinheiro1, 2, ',', '.');
           
      $sql1 = "SELECT sum(valor) AS val1 from caixasaida where data='$hoje'";
      $resultado1 = mysqli_query($conn,$sql1) or die (mysql_error());
      while ($linha1 = mysqli_fetch_array($resultado1)) {
             $saida_dinheiro1 = $linha1['val1'];
            }
             $saida_dinheiro = number_format($saida_dinheiro1, 2, ',', '.');
            
      $sql2 = "SELECT sum(valor) AS val2 from sangria where dataCaixa='$hoje'";
      $resultado2 = mysqli_query($conn,$sql2) or die (mysql_error());
      while ($linha2 = mysqli_fetch_array($resultado2)) {
             $saida_sangria1 = $linha2['val2'];
            }
             $saida_sangria = number_format($saida_sangria1, 2, ',', '.');       
        
      echo "Valor da entrada em Dinheiro:<font color='blue'>  ".$ent_dinheiro."</font><br><br>";
      echo "Valor da saída em Dinheiro:<font color='blue'>  ".$saida_dinheiro."</font><br><br>";
      echo "Valor da saída para Sangria:<font color='blue'>  ".$saida_sangria."</font><br><br>";
      $saldo = $ent_dinheiro1-$saida_dinheiro1-$saida_sangria1;
      $saldo = number_format($saldo, 2, ',', '.');
      echo "Valor do Saldo do dia:<font color='red'>  ".$saldo."</font>"; 
  }  
  ?>
  </font>
 
 </div> 
   
     <footer id="footer">   
       <?php include "footer.php"; ?>
    </footer>
</body>
</html>