<?php
session_start();
date_default_timezone_set('America/Sao_Paulo');
if($_SESSION['nome'] != "Vivian Martins" && $_SESSION['nome'] != "Denilson Soares" && $_SESSION['nome'] != "MARIANNE COSTA" && $_SESSION['nome'] != "JOSE EDUARDO SOARES SALDANHA"){
   echo "<script>alert('Você não tem permissão para acessar está página!');</script>";
   echo "<script language=\"javascript\">window.close();</script>";
   exit;
 }
  $ano = date("Y");
 
 ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta http-equiv="Content-type" content="text/html; charset=UTF-8"/>
  <link rel="stylesheet" type="text/css" href="../css/estilo.css"/>
  <link rel="stylesheet" href="../css/style_menu.css" type="text/css"/>
    <script type="text/javascript" src="../include/jquery-1.3.2.js"></script>
    <script type="text/javascript" src="../include/jquery-latest.min.js"></script>
    <script type="text/javascript" src="../include/script_menu.js"></script>
    <script type="text/javascript">
    </script>
    <script type="text/javascript">
      function atualiza()
        { window.opener.location.reload();}
    </script>
</head>
<body onunload="atualiza()">
  
    <?
    
      include ("conexao.php");
      $idc = $_GET[tip];
      $sql = "SELECT nome, obs FROM consultor WHERE idConsultor='$idc' AND status='Ativo'";
       $resultado = mysqli_query($conn,$sql) or die (mysql_error());
       while ($linha = mysqli_fetch_array($resultado)) {
              $nomec = $linha['nome'];
              $obsc = $linha['obs'];
            }
    ?>
    <center>
      <h3>Digitar Observação:</h3>
      <h3><? echo "Consultor:\n".$nomec; ?></h3>
      <? echo "Cod.: ".$idc ?>
    <form name="form1" method="post" action="obs_verOK.php" >
      <table border="1">
        <input  type="hidden" name="idc" id="idc" size="3" value="<? echo $idc; ?>">
        <tr>
          <td><font size='2'>Observação:</font></td>
          <td>
            <input  type="text" name="obsv" id="obsv" size="50" value="<? echo $obsc; ?>">   
          </td>
        </tr>
        <tr>
          <td colspan="2" align="center">
            <input type="submit" value="Enviar">   
          </td>
        </tr>
      </table>
    </form>  
    </center>
</body>
</html>