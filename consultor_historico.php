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
     <br />
     <H2>HISTÓRICO DOS CONSULTORES</H2>
     <br />
 <table id="tabela" align="center" width="80%" border="1">
 <thead>
  <tr align="center" bgcolor="#CCCCCC">
    <th align="center" style="width: 5%"><font color="#333333" size="3"><b>Numero</b></font></th>
    <th align="center" style="width: 25%"><font color="#333333" size="3"><b>Consultor</b></font></th>
    <th align="center" style="width: 10%"><font color="#333333" size="3"><b>Data</b></font></th>
    <th align="center" style="width: 10%"><font color="#333333" size="3"><b>Hora</b></font></th>
    <th align="center" style="width: 10%"><font color="#333333" size="3"><b>Motivo</b></font></th>
    <th align="center" style="width: 10%"><font color="#333333" size="3"><b>Regional</b></font></th>
    <th align="center" style="width: 10%"><font color="#333333" size="3"><b>Equipe</b></font></th>
    <th align="center" style="width: 10%"><font color="#333333" size="3"><b>Vínculo</b></font></th>
    <th align="center" style="width: 10%"><font color="#333333" size="3"><b>Responsável</b></font></th>
  </tr>
  <tr align="center" bgcolor="#CCCCCC">
    <th align="center" style="width: 5%">
    <th align="center" style="width: 25%"><input type="text" id="txtColuna2" size="15%"/></th>
    <th align="center" style="width: 10%"><input type="text" id="txtColuna3" size="5%"/></th>
    <th align="center" style="width: 10%"><input type="text" id="txtColuna4" size="5%"/></th>
    <th align="center" style="width: 10%"><input type="text" id="txtColuna5" size="10%"/></th>
    <th align="center" style="width: 10%"><input type="text" id="txtColuna6" size="10%"/></th>
    <th align="center" style="width: 10%"><input type="text" id="txtColuna7" size="10%"/></th>
    <th align="center" style="width: 10%"><input type="text" id="txtColuna8" size="10%"/></th>
    <th align="center" style="width: 10%"><input type="text" id="txtColuna9" size="10%"/></th>
 </thead>
</table>

<?php
include "conexao.php";
$con = 1;
//echo $dia." / ".$mes." / ".$ano;

$sql = "SELECT * FROM consultorHistorico ORDER BY idConsultor, data, hora";
$resultado = mysqli_query($conn,$sql) or die (mysql_error());
while ($linha = mysqli_fetch_array($resultado)) {
      
      $id = $linha['idConsultor'];
      $id2 = str_pad( $id, 4, '0', STR_PAD_LEFT); 
      //$nome = $linha['nome']; 
      $data = $linha['data'];
      $hora = $linha['hora']; 
      $motivo = $linha['motivo'];
      $regional = $linha['regional'];
      $equipe = $linha['equipe'];
      $vinculo = $linha['vinculo'];
      $responsavel = $linha['responsavel'];
   
    $sql2 = "SELECT * FROM consultor WHERE idConsultor = '$id'";
      $resultado2 = mysqli_query($conn,$sql2) or die (mysql_error());
      while ($linha2 = mysqli_fetch_array($resultado2)) {
        $nome = $linha2['nome'];
    }
  if ($con % 2 == 0)
     $bgcolor = "bgcolor='#FFFFFF'";
  else
     $bgcolor = "bgcolor='#FFFFCC'";
  
?>

<table id="tabela" align="center" width="80%"  border="1">
 <tbody>
  <tr align="center" <? echo $bgcolor; ?>>
    <td align="center" style="width: 5%"><font size="2"><b><? echo $con; ?></b></font></td>
    <td align="center" style="width: 25%"><font size="2"><b><? echo $nome; ?></b></font></td>
    <td align="center" style="width: 10%"><font size="2"><b><? echo $data; ?></b></font></td>
    <td align="center" style="width: 10%"><font size="2"><b><? echo $hora; ?></b></font></td>
    <td align="center" style="width: 10%"><font size="2"><b><? echo $motivo; ?></b></font></td>
    <td align="center" style="width: 10%"><font size="2"><b><? echo $regional; ?></b></font></td>
    <td align="center" style="width: 10%"><font size="2"><b><? echo $equipe; ?></b></font></td>
    <td align="center" style="width: 10%"><font size="2"><b><? echo $vinculo; ?></b></font></td>
    <td align="center" style="width: 10%"><font size="2"><b><? echo $responsavel; ?></b></font></td>
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