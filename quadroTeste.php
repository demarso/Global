<?php
session_start();
$_SESSION['id'] = 1;
 ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta http-equiv="Content-type" content="text/html; charset=UTF-8"/>
  <link rel="stylesheet" type="text/css" href="css/estilo.css"/>
  <link rel="stylesheet" href="css/style_menu.css" type="text/css"/>
  <title>Gestão de Propostas</title>
        <script type="text/javascript" src="include/jquery-1.3.2.js"></script>
        <script type="text/javascript" src="include/script.js"></script>
        <script type="text/javascript" src="include/jquery-latest.min.js"></script>
        <script type="text/javascript" src="include/script_menu.js"></script>
</head>
<body>
  <div id="interface">
 <?
    include "cabecalho1P.php"; 
    
   $mes = date("m");
   $ano = date("Y");
   
   
      $_SESSION['mesc'] = $mes;
      $_SESSION['anoc'] = $ano;
    

   if($mes == 1) $mesatual = "JANEIRO";
   if($mes == 2) $mesatual = "FEVEREIRO";
   if($mes == 3) $mesatual = "MARÇO";
   if($mes == 4) $mesatual = "ABRIL";
   if($mes == 5) $mesatual = "MAIO";
   if($mes == 6) $mesatual = "JUNHO";
   if($mes == 7) $mesatual = "JULHO";
   if($mes == 8) $mesatual = "AGOSTO";
   if($mes == 9) $mesatual = "SETEMBRO";
   if($mes == 10) $mesatual = "OUTUBRO";
   if($mes == 11) $mesatual = "NOVEMBRO";
   if($mes == 12) $mesatual = "DEZEMBRO";

   echo "<center><h1>PRODUÇÃO DE ".$mesatual." DE ".$ano."</h1></center>"; 

   
    include "quadro_global.php";
    include "quadro_ni.php";
    include "quadro_it.php";
    include "quadro_ar.php";
    include "quadro_plantao.php"; 
   


   $geral = $_SESSION['totglobal']+$_SESSION['totplantao']+$_SESSION['totalar']+$_SESSION['totalit']+$_SESSION['totalni'];
   $geralsubst =  $_SESSION['subglobal']+$_SESSION['subplantao'] + $_SESSION['subni'] + $_SESSION['subit'] + $_SESSION['subar'];
   $geralreat =   $_SESSION['reatglobal']+$_SESSION['reatplantao'] + $_SESSION['reatni'] + $_SESSION['reatit'] + $_SESSION['reatar'];
   

   ?>

   <br /><br />

   <center>
    <table align="center" width="80%"  border="1">
      <tr align="center" <? echo $bgcolor; ?>>
        <td  align="center" style="width: 20%"><font color="blue" size="4"><b>PRODUÇÃO</b></font></td>
        <td  align="center" style="width: 20%"><font color="blue" size="4"><b>NORMAL</b></font></td>
        <td  align="center" style="width: 20%"><font color="blue" size="4"><b>SUBSTITUIÇÃO</b></font></td>
        <td  align="center" style="width: 20%"><font color="blue" size="4"><b>REATIVAÇÃO</b></font></td>
      </tr>
      <tr align="center" <? echo $bgcolor; ?>>
        <td  align="center" style="width: 20%"><font color="blue" size="4"></td>
        <td  align="center" style="width: 20%"><font color="blue" size="4"><b><? echo $geral; ?></b></font></td>
        <td  align="center" style="width: 20%"><font color="blue" size="4"><b><? echo $geralsubst; ?></b></font></td>
        <td  align="center" style="width: 20%"><font color="blue" size="4"><b><? echo $geralreat; ?></b></font></td>
      </tr>
   </table>
  </center>
<br /><br />
  <? 
      $geral = 0;
      $geralsubst = 0;
      $geralreat = 0;
      unset($_SESSION['totglobal']);
      unset($_SESSION['total']);
      unset($_SESSION['totalar']);
      unset($_SESSION['totalin']);
      unset($_SESSION['totalit']);
      unset($_SESSION['totalni']);
      unset($_SESSION['totalnl']);
      unset($_SESSION['totplantao']);
      unset($_SESSION['subglobal']);
      unset($_SESSION['subplantao']);
      unset($_SESSION['subni']);
      unset($_SESSION['subit']);
      unset($_SESSION['subar']);
      unset($_SESSION['reatglobal']);
      unset($_SESSION['reatplantao']);
      unset($_SESSION['reatni']);
      unset($_SESSION['reatit']);
      unset($_SESSION['reatar']);
      unset( $_SESSION['mesc'] );
      unset( $_SESSION['anoc'] );

    ?>

</div>

 <footer id="footer">   

   <?php include "footer.php"; ?>

</footer>

</body>

</html>