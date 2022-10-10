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
  <script type="text/javascript" src="include/jquery-1.3.2.js"></script>
  <script type="text/javascript" src="include/script.js"></script>
  <script type="text/javascript" src="include/jquery-latest.min.js"></script>
  <script type="text/javascript" src="include/script_menu.js"></script>
  <!--<script type="text/javascript" src="include/micoxAjax.js"></script>-->
  <title>Gestão de Propostas</title> 
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

      function checar2(pagina) 
      { 
        if (confirm("CONFIRMA A EDIÇÃO DESTE CONSULTOR?")==true) 
          { 
            window.location=pagina; 
          } 
      }

      function checar3(pagina) 
      { 
        if (confirm("CONFIRMA A INATIVAÇÃO DESTE CONSULTOR?")==true) 
          { 
            window.location=pagina; 
          } 
      }

      function checar4(pagina) 
      { 
        if (confirm("CONFIRMA A ATIVAÇÃO DESTE CONSULTOR?")==true) 
          { 
            window.location=pagina; 
          } 
      }
</script>
</head>
<body>
<!--<img id="logo" src="imagens/logo.png" >-->
<div id="interface">
 <?php include "cabecalho1P.php"; ?>
   <center>
 <table id="tabela" align="center" width="80%" border="1">
 <thead>
  <tr align="center" bgcolor="#CCCCCC">
    <? if ($_SESSION['nivel'] != 5){ ?>
    <th align="center" style="width: 5%"><font color="#333333" size="3"><b>Edit</b></font></th><? } ?>
    <th align="center" style="width: 5%"><font color="#333333" size="3"><b>Cód. Consultor</b></font></th> 
    <th align="center" style="width: 30%"><font color="#333333" size="3"><b>Consultor</b></font></th>
    <th align="center" style="width: 20%"><font color="#333333" size="3"><b>Regional</b></font></th>
    <th align="center" style="width: 15%"><font color="#333333" size="3"><b>Equipe</b></font></th>
    <th align="center" style="width: 15%"><font color="#333333" size="3"><b>Vínculo</b></font></th>
    <th align="center" style="width: 10%"><font color="#333333" size="3"><b>Status</b></font></th>
  </tr>
  <tr align="center" bgcolor="#CCCCCC">
    <? if ($_SESSION['nivel'] != 5){ ?>
    <th align="center" style="width: 5%"></th><? } ?> 
    <th align="center" style="width: 5%"></th> 
    <th align="center" style="width: 30%"><input type="text" id="txtColuna2" size="20%"/></th>
    <th align="center" style="width: 20%"><input type="text" id="txtColuna3" size="15%"/></th>
    <th align="center" style="width: 15%"><input type="text" id="txtColuna4" size="15%"/></th>
    <th align="center" style="width: 15%"><input type="text" id="txtColuna5" size="5%"/></th>
    <th align="center" style="width: 10%"><input type="text" id="txtColuna6" size="5%"/></th>
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
      $id2 = str_pad( $id, 4, '0', STR_PAD_LEFT); 
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

<table id="tabela" align="center" width="80%"  border="1">
 <tbody>
  <tr align="center" <? echo $bgcolor; ?>>
     <? if ($_SESSION['nivel'] != 5){ ?>
    <td align="center" style="width: 5%">
      <? 
      echo "<a href=\"javascript:checar2('editDadosConsultor.php?nome=".$id."');\"><img src=\"imagens/letra-e.png\" width=\"20\" border=\"0\" alt=\"Click para editar este Consultor.\" title=\"Click para editar este Consultor.\"></a>&nbsp;";
      if($stat == "Ativo")
       echo "<a href=\"javascript:checar3('delConsultorOK.php?id=".$id."');\"><img src=\"imagens/letra_I.png\" width=\"20\" border=\"0\" alt=\"Click para inativar este Consultor.\" title=\"Click para inativar este Consultor.\"></a>&nbsp;";
      else if($stat == "Inativo")
        echo "<a href=\"javascript:checar4('reativaConsultorOK.php?id=".$id."');\"><img src=\"imagens/letra_A.png\" width=\"20\" border=\"0\" alt=\"Click para ativar este Consultor.\" title=\"Click para ativar este Consultor.\"></a>&nbsp;";
      ?>
    </td> <? } ?>
    <td align="center" style="width: 5%"><font <? echo $nomecolor; ?> size="2"><b><? echo $id2; ?></b></font></td>
    <td align="left" style="width: 30%"><font <? echo $nomecolor; ?> size="2"><b><? echo $nome; ?></b></font></td>
    <td align="center" style="width: 20%"><font <? echo $nomecolor; ?> size="2"><b><? echo $regional; ?></b></font></td>
    <td align="center" style="width: 15%"><font <? echo $nomecolor; ?> size="2"><b><? echo $equipe; ?></b></font></td>
    <td align="center" style="width: 15%"><font <? echo $nomecolor; ?> size="2"><b><? echo $vinculo; ?></b></font></td>
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
   <br /><br />
<footer id="footer">   
   <?php include "footer.php"; ?>
</footer>
</div>
</body>
</html>