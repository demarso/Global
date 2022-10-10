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
  <link rel="stylesheet" href="css/style_menu.css" type="text/css"/>
  <title>Gestão de Propostas</title>
        <script type="text/javascript" src="include/jquery-1.3.2.js"></script>
        <script type="text/javascript" src="include/script.js"></script>
        <script type="text/javascript" src="include/jquery-latest.min.js"></script>
        <script type="text/javascript" src="include/script_menu.js"></script>
</head>
<body>
<?  include "cabecalho1P.php"; 
    include "conexao.php";

   $mes = date("m");
   $ano = date("Y");
   $_SESSION['mesc'] = $mes;
   $_SESSION['anoc'] = $ano;

?>  

<div id="interface">
  <form name='form1' action='<? $myself ?>' method='post'>
   <table>
    <tr>
           <td><font color="cyan"><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;SELECIONE PARA CONSULTAR OUTRO MÊS:</b></font></td>
           <td><font color="yellow"><b>Mês:</b></font></td>
           <td>
             <select name="mesc" id="mesc">
              <option value=""> - - -</option>
              <option value="1">JANEIRO</option>
              <option value="2">FEVEREIRO</option>
              <option value="3">MARÇO</option>
              <option value="4">ABRIL</option>
              <option value="5">MAIO</option>
              <option value="6">JUNHO</option>
              <option value="7">JULHO</option>
              <option value="8">AGOSTO</option>
              <option value="9">SETEMBRO</option>
              <option value="10">OUTUBRO</option>
              <option value="11">NOVEMBRO</option>
              <option value="12">DEZEMBRO</option>
             </select>
           </td>
           <td>&nbsp;&nbsp;&nbsp;</td>
           <td><font color="yellow"><b>Ano:</b></font></td>
           <td>
             <select name="anoc" id="anoc" onchange="this.form.submit()">
              <option value=""> - - -</option>
              <option value="2017">2017</option>
              <option value="2018">2018</option>
              <option value="2019">2019</option>
              <option value="2020">2020</option>
              <option value="2021">2021</option>
              <option value="2022">2022</option>
              <option value="2023">2023</option>
              <option value="2024">2024</option>
              <option value="2025">2025</option>
             </select>
           </td>
    </tr>
   </table>

  <!-- &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="imagens/q_pret.png" width="20">&nbsp;&nbsp;<font size="5">- Normal/Ativo</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="imagens/q_verm.png" width="20">&nbsp;&nbsp;<font size="5">- Substituição</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="imagens/q_cian.png" width="20">&nbsp;&nbsp;<font size="5">- Inativo</font>-->
  </form>

   <?php 
   if(!empty($_POST['mesc'])){
      $mes = $_POST['mesc'];
      $ano = $_POST['anoc'];
      $_SESSION['mesc'] = $mes;
      $_SESSION['anoc'] = $ano;
    }
    else if(!empty($_GET['mesc'])){
      $mes = $_GET['mesc'];
      $ano = $_GET['anoc'];
      $_SESSION['mesc'] = $mes;
      $_SESSION['anoc'] = $ano;
   }else{
      $mes = date('m');
      $ano = date('Y');
      $_SESSION['mesc'] = $mes;
      $_SESSION['anoc'] = $ano;
   }

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

   if($_SESSION['regio'] == 'NOVA IGUAÇU' || $_SESSION['regio'] == 'GLOBAL'){
    include "quadro_global.php";
    //include "quadro_plantao.php";
    include "quadro_ni.php";
    include "quadro_it.php";
    //include "quadro_nl.php";
    //include "quadro_in.php";
    include "quadro_ar.php";
    include "quadro_vr.php";
    include "quadro_plantao.php"; 
   }

/*
  if($_SESSION['regio'] == 'NOVA IGUAÇU' && $_SESSION['nivel'] != 0 && $_SESSION['nivel'] != 10){
    include "quadro_global.php";
    include "quadro_plantao.php";
    include "quadro_ni.php";
  }*/

  if($_SESSION['regio'] == 'ITAGUAÍ' || $_SESSION['regio'] == 'ITAGUAI'){
    //include "quadro_plantao.php";
    include "quadro_it.php";
   
  }
  
/*
  if($_SESSION['regio'] == 'NILÓPOLIS' || $_SESSION['regio'] == 'NILOPOLIS'){
  // include "quadro_global.php";
   include "quadro_nl.php";
  
  } 
 */

  if($_SESSION['regio'] == 'VOLTA REDONDA'){
    include "quadro_vr.php";
   
  }  
  

  if($_SESSION['regio'] == 'ARARUAMA'){
  // include "quadro_global.php";
   include "quadro_ar.php";
   
  }

   if($_SESSION['nivel'] == 0 || $_SESSION['nivel'] == 10){

   $geral = $_SESSION['totglobal']+$_SESSION['totalar']+$_SESSION['totalit']+$_SESSION['totalni']+$_SESSION['totplantao'];
   $geralsubst =  $_SESSION['subglobal'] + $_SESSION['subni'] + $_SESSION['subit'] + $_SESSION['subar']+$_SESSION['subplantao'];
   $geralreat =   $_SESSION['reatglobal'] + $_SESSION['reatni'] + $_SESSION['reatit'] + $_SESSION['reatar']+$_SESSION['reatplantao'];


   $totalPP = $geral + $geralsubst + $geralreat;

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

    $_SESSION['total'] = $geral;
   ?>

   <br /><br /><br /><br /><br />

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
      <tr align="center" <? echo $bgcolor; ?>>
        <td colspan="2" align="center" style="width: 30%"><font color="blue" size="4"><b>PRODUÇÃO TOTAL</b></font></td>
        <td colspan="2" align="center" style="width: 70%"><font color="blue" size="4"><b><? echo $totalPP; ?></b></font></td>
      </tr>  
   </table>
  </center>
<br />
<br /><br /><br />
    <?php 
     //if($_SESSION['regio'] == 'NOVA IGUAÇU' || $_SESSION['regio'] == 'GLOBAL' || $_SESSION['regio'] == 'ITAGUAÍ' || $_SESSION['regio'] == 'ITAGUAI'){
    //  include "quadro_plantao.php";
    //}

      if($_SESSION['nivel'] == 0 || $_SESSION['nivel'] == 10){

        echo "<br /><a href='imp_quad_geral.php' target='_black'><img src='imagens/printer.png' width='100' align='left' title='Imprime o quadro'></a>

          <a href='grafProd.php'><img src='imagens/producao.png' width='100' align='right' title='Ver o gráfico anual'></a>";

      }

      if($geral > 0){

      $sql2 ="UPDATE prodmes SET

                      valor = '$geral'

                      WHERE mes = '$_SESSION[mesc]' AND ano = '$_SESSION[anoc]'";

      $query = mysqli_query($conn,$sql2) or die(mysql_error());  

      }

        /*    if($_SESSION['regional'] == 'NOVA IGUAÇU'){

        echo "<center><br /><a href='imp_prod_novaiguacu.php'><img src='imagens/printer.png' width='100'></a>

        <br><h3>IMPRIME NOVA IGUAÇU</h3></center>";

      }

      if($_SESSION['regional'] == 'ITAGUAÍ'){

        echo "<center><br /><a href='imp_prod_itaguai.php'><img src='imagens/printer.png' width='100'></a></center>";

      }

      if($_SESSION['regional'] == 'NILÓPOLIS'){

        echo "<center><br /><a href='imp_prod_nilopolis.php'><img src='imagens/printer.png' width='100'></a></center>";

      }

      if($_SESSION['regional'] == 'INTENDENTE'){

        echo "<center><br /><a href='imp_prod_intendente.php'><img src='imagens/printer.png' width='100'></a></center>";

      }

      if($_SESSION['regional'] == 'ARARUAMA'){

        echo "<center><br /><a href='imp_prod_araruama.php'><img src='imagens/printer.png' width='100'></a></center>";

      }*/}
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