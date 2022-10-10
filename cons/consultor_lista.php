<?php
session_start();
date_default_timezone_set('America/Sao_Paulo');
if($_SESSION['nome'] != "Vivian Martins" && $_SESSION['nome'] != "Denilson Soares" && $_SESSION['nome'] != "MARIANNE COSTA" && $_SESSION['nome'] != "JOSE EDUARDO SOARES SALDANHA"){
   echo "<script>alert('Você não tem permissão para acessar está página!');</script>";
   echo "<script language=\"javascript\">window.close();</script>";
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
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/navbar.css">
  
</head>
<script type="text/javascript">
         
    $(function() {
      var d=1000;
      $('#menu span').each(function(){
        $(this).stop().animate({
         'top':'-17px'
        },d+=250);
      });

      $('#menu > li').hover(
        function () {
          var $this = $(this);
          $('a',$this).addClass('hover');
          $('span',$this).stop().animate({'top':'40px'},300).css({'zIndex':'10'});
        },
        function () {
          var $this = $(this);
          $('a',$this).removeClass('hover');
          $('span',$this).stop().animate({'top':'-17px'},800).css({'zIndex':'-1'});
        }
      );
    });

</script>
</head>
<body class="bg-info">
  <?  include "menu.php"; ?>  
<div class="container" id="home">
 <center><h2>LISTA DE TODOS OS CONSULTORES</h2></center>";
   <center>
 <table class="table table-sm mt-0 mb-0" id="tabela">
 <thead>
  <tr align="center" bgcolor="#CCCCCC">
    <th align="center" style="width: 6%"><font color="#333333" size="3"><b>Nº</b></font></th>
    <th align="center" style="width: 6%"><font color="#333333" size="3"><b>Código</b></font></th> 
    <th align="center" style="width: 30%"><font color="#333333" size="3"><b>Consultor</b></font></th>
    <th align="center" style="width: 20%"><font color="#333333" size="3"><b>Regional</b></font></th>
    <th align="center" style="width: 20%"><font color="#333333" size="3"><b>Equipe</b></font></th>
    <th align="center" style="width: 10%"><font color="#333333" size="3"><b>Vínculo</b></font></th>
    <th align="center" style="width: 10%"><font color="#333333" size="3"><b>Status</b></font></th>
  </tr>
  <tr align="center" bgcolor="#CCCCCC">
    <th align="center" style="width: 6%"></th>
    <th align="center" style="width: 6%"></th> 
    <th align="center" style="width: 30%"><input type="text" id="txtColuna2" size="15%"/></th>
    <th align="center" style="width: 20%"><input type="text" id="txtColuna3" size="10%"/></th>
    <th align="center" style="width: 20%"><input type="text" id="txtColuna4" size="10%"/></th>
    <th align="center" style="width: 10%"><input type="text" id="txtColuna5" size="4%"/></th>
    <th align="center" style="width: 10%"><input type="text" id="txtColuna6" size="4%"/></th>
  </tr>
 </thead>
</table>

<?php
include "conexao.php";
$ano = date("Y"); //$_SESSION['ano1']
$dia = date("d");
$mes = date("m"); //$_SESSION['mes1'];
if(isset($_SESSION['mesc'])){
      $mes = $_SESSION['mesc'];
      $ano = $_SESSION['anoc'];
  }
  
$saldo = 0;  $con = 1;
//echo $dia." / ".$mes." / ".$ano;

$sql = "SELECT * FROM consultor ORDER BY regional,equipe,nome ASC";
//WHERE MONTH(dataProposta) = '$mes'
$resultado = mysqli_query($conn,$sql) or die (mysql_error());
while ($linha = mysqli_fetch_array($resultado)) {
      
      $id = $linha['idConsultor']; 
      $id = str_pad( $id, 4, '0', STR_PAD_LEFT);
      $nome = $linha['nome']; 
      $regional = $linha['regional'];
      $equipe = $linha['equipe']; 
      $vinculo = $linha['vinculo'];
      $stat = $linha['status'];
   
   //echo $id." ".$consultor1." ".$associado." ".$equipe1." ".$reginal1." ".$dataProposta;

  if ($con % 2 == 0)
     $bgcolor = "bgcolor='#FFFFFF'";
  else
     $bgcolor = "bgcolor='#FFFFCC'";

  
  if ($vinculo == "FREELANCE" and $stat == "Ativo")
     $nomecolor = "color='#6699FF'";
   else
     $nomecolor = "color='black'";

   if ($stat == "Inativo")
     $nomecolor = "color='#FF3C33'";

?>

<table class="table table-hover table-sm mt-0 mb-0" id="tabela">
 <tbody>
  <tr align="center" <? echo $bgcolor; ?>>
    <td align="center" style="width: 6%"><font <? echo $nomecolor; ?> size="2"><b><? echo $con; ?></b></font></td>
    <td align="center" style="width: 6%"><font <? echo $nomecolor; ?> size="2"><b><? echo $id; ?></b></font></td>
    <td align="left" style="width: 30%"><font <? echo $nomecolor; ?> size="2"><b><? echo $nome; ?></b></font></td>
    <td align="center" style="width: 20%"><font <? echo $nomecolor; ?> size="2"><b><? echo $regional; ?></b></font></td>
    <td align="center" style="width: 20%"><font <? echo $nomecolor; ?> size="2"><b><? echo $equipe; ?></b></font></td>
    <td align="center" style="width: 10%"><font <? echo $nomecolor; ?> size="2"><b><? echo $vinculo; ?></b></font></td>
    <td align="center" style="width: 10%"><font <? echo $nomecolor; ?> size="2"><b><? echo $stat; ?></b></font></td>
  </tr>
 </tbody>
</table>
</center>
<?
$con = $con + 1;
}
$con = $con - 1;

?>
</div>
<? include "footer.html"; ?>
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/navbar.js"></script>
    <script src="js/script.js"></script>  
</body>
</html>