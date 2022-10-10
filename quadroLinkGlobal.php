<? session_start(); ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta http-equiv="Content-type" content="text/html; charset=UTF-8"/>
  <link rel="stylesheet" type="text/css" href="css/estilo.css"/>
  <link rel="stylesheet" href="css/style_menu.css" type="text/css"/>
  <title>Produção do mês</title>
        <script type="text/javascript" src="include/jquery-1.3.2.js"></script>
        <script type="text/javascript" src="include/script.js"></script>
        <script type="text/javascript" src="include/jquery-latest.min.js"></script>
        <script type="text/javascript" src="include/script_menu.js"></script>
</head>
<body>
<?  

  include "cabecalhoLink.php"; 
    include "conexao.php";
   $_SESSION['id'] = 1;
   $mes = date("m");
   $ano = date("Y");
   $geral = 0;

?>  

<div id="interface">
  
   <?php 
   
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

    include "quadroLink_global.php";
    //include "quadroLink_ni.php";
   // include "quadroLink_it.php";
    //include "quadroLink_ar.php"; 
    //include "quadroLink_plantao.php";
    
   
    $geral = $_SESSION['totglobal']+$_SESSION['totplantao']+$_SESSION['totalar']+$_SESSION['totalit']+$_SESSION['totalni'];

   

    $sql0 = "SELECT count(idConsultor) as conteq0 FROM consultor";

    $resultado0 = mysqli_query($conn,$sql0) or die (mysql_error());

    while ($linha0 = mysqli_fetch_array($resultado0)) {

      $contgeral = $linha0['conteq0'];

     } 

    $sql1 = "SELECT count(idConsultor) as conteq1 FROM consultor WHERE equipe='ÁGUIA' ";

    $resultado1 = mysqli_query($conn,$sql1) or die (mysql_error());

    while ($linha1 = mysqli_fetch_array($resultado1)) {

      $contaguia = $linha1['conteq1'];

     } 

    $sql2 = "SELECT count(idConsultor) as conteq2 FROM consultor WHERE equipe='ALFA' ";

    $resultado2 = mysqli_query($conn,$sql2) or die (mysql_error());

    while ($linha2 = mysqli_fetch_array($resultado2)) {

      $contalfa = $linha2['conteq2'];

     }

    $sql3 = "SELECT count(idConsultor) as conteq3 FROM consultor WHERE equipe='TISSUNAMI' ";

    $resultado3 = mysqli_query($conn,$sql3) or die (mysql_error());

    while ($linha3 = mysqli_fetch_array($resultado3)) {

      $conttissu = $linha3['conteq3'];

     }

    $sql4 = "SELECT count(idConsultor) as conteq4 FROM consultor WHERE equipe='PUPILOS' ";

    $resultado4 = mysqli_query($conn,$sql4) or die (mysql_error());

    while ($linha4 = mysqli_fetch_array($resultado4)) {

      $contpupi = $linha4['conteq4'];

     }

     $sql10 = "SELECT count(idConsultor) as conteq10 FROM consultor WHERE equipe='DESBRAVADORES' ";

    $resultado10 = mysqli_query($conn,$sql10) or die (mysql_error());

    while ($linha10 = mysqli_fetch_array($resultado10)) {

      $contdesb = $linha10['conteq10'];

     } 

    $sql5 = "SELECT count(idConsultor) as conteq5 FROM consultor WHERE equipe='ELITE' ";

    $resultado5 = mysqli_query($conn,$sql5) or die (mysql_error());

    while ($linha5 = mysqli_fetch_array($resultado5)) {

      $contpupi = $linha5['conteq5'];

     }

    $sql6 = "SELECT count(idConsultor) as conteq6 FROM consultor WHERE equipe='SNIPER' ";

    $resultado6 = mysqli_query($conn,$sql6) or die (mysql_error());

    while ($linha6 = mysqli_fetch_array($resultado6)) {

      $contsnip = $linha6['conteq6'];

     }

    $sql7 = "SELECT count(idConsultor) as conteq7 FROM consultor WHERE equipe='GLOBAL' ";

    $resultado7 = mysqli_query($conn,$sql7) or die (mysql_error());

    while ($linha7 = mysqli_fetch_array($resultado7)) {

      $contglob = $linha7['conteq7'];

     }

    $sql8 = "SELECT count(idConsultor) as conteq6 FROM consultor WHERE equipe='FENIX' ";

    $resultado8 = mysqli_query($conn,$sql8) or die (mysql_error());

    while ($linha8 = mysqli_fetch_array($resultado6)) {

      $contfenix = $linha8['conteq8'];

     }

    $sql9 = "SELECT count(idConsultor) as conteq9 FROM consultor WHERE equipe='POWER' ";

    $resultado9 = mysqli_query($conn,$sql9) or die (mysql_error());

    while ($linha9 = mysqli_fetch_array($resultado9)) {

      $contpower = $linha9['conteq9'];

     }

     $sql10 = "SELECT count(idConsultor) as conteq10 FROM consultor WHERE equipe='DELTA' ";

    $resultado10 = mysqli_query($conn,$sql10) or die (mysql_error());

    while ($linha10 = mysqli_fetch_array($resultado10)) {

      $contdelta = $linha10['conteq10'];

     }

     $sql11 = "SELECT count(idConsultor) as conteq11 FROM consultor WHERE equipe='FALCAO' OR equipe='FALCÃO' ";

    $resultado11 = mysqli_query($conn,$sql11) or die (mysql_error());

    while ($linha11 = mysqli_fetch_array($resultado11)) {

      $contfalcao = $linha11['conteq11'];

     }



    $pc = $geral / $contgeral;

   ?>

   <br /><br /><br /><br /><br />

   <center>
    <table align="center" width="80%"  border="1">
      <tr align="center" <? echo $bgcolor; ?>>
        <td  align="center" style="width: 20%"><font color="blue" size="4"><b>PRODUÇÃO TOTAL </b></font></td>
        <td  align="center" style="width: 20%"><font color="blue" size="4"><b><? echo $geral; ?></b></font></td>
      </tr>
   </table>
  </center>
<br />
<br /><br /><br />
    <?php 
     
      
      unset($_SESSION['totglobal']);
      unset($_SESSION['total']);
      unset($_SESSION['totalar']);
      unset($_SESSION['totalin']);
      unset($_SESSION['totalit']);
      unset($_SESSION['totalni']);
      unset($_SESSION['totalnl']);
      unset($_SESSION['totplantao']);

         

    ?>

</div>

 <footer id="footer">   

   <?php include "footer.php"; ?>

</footer>

</body>

</html>