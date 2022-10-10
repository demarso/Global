<?php
session_start();
date_default_timezone_set('America/Sao_Paulo');
if (!isset($_SESSION['idF'])){
    header("Location: index.php?erro=1");
    exit;
 }
 if($_SESSION['nivelF'] != 0  && $_SESSION['nivelF'] != 10){
     echo "<script>alert('Voce nao tem permissao para acessar esta pagina!');history.back(-1);</script>";
     exit;
  }
 ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <title>GLOBAL - Financeiro</title>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <link rel="stylesheet" href="css/style.css" type="text/css"/>
  <script type="text/javascript" src="../include/micoxAjax.js"></script>

<style>
    .dia {font-family: helvetica, arial; font-size: 8pt; color: #FFFFFF}
    .data {font-family: helvetica, arial; font-size: 8pt; text-decoration:none; color:#191970}
    .mes {font-family: helvetica, arial; font-size: 8pt}
    .Cabecalho_Calendario {font-family: helvetica, arial; font-size: 10pt; color: #000000; text-decoration:none; font-weight:bold}
</style>
</head>
<body>
<?php include "menu_usu.php"; 
     $datacad = date('d/m/Y');
     $horacad = date('H:i');
     $datacad2 = date('d/m/Y');
     $horacad2 = date('H:i');
   ?>
<div id="interface">
	 <center>
	 <H3>ACESSOS DOS USU&Aacute;RIOS</H3>
    <table align="center" width="60%" border="1">
	   <tr align="center" bgcolor="#CCCCCC">
	    <td align="center" style="width: 20%"><font color="#333333" size="3"><b>N&ordm;</b></font></td>
	    <td align="center" style="width: 40%"><font color="#333333" size="3"><b>Nome</b></font></td>
	    <td align="center" style="width: 40%"><font color="#333333" size="3"><b>Data/Hora</b></font></td>
	   </tr>
	  </table>
   </center>

	<?php
		include "conexao.php";
		
		$con = 1; 
		$sql = "select * from acesso order by data desc";
		$resultado = mysqli_query($conn,$sql) or die (mysql_error());

		while ($linha = mysqli_fetch_array($resultado)) {
			$Nome = $linha['nome'];
			$Data = $linha['data'];
						
			if ($con % 2 == 0)
				 $bgcolor = "bgcolor='#FFFFFF'";
			else
				 $bgcolor = "bgcolor='#FFFFCC'";
	 ?>
  	<center>
   	 <table align="center" width="60%"  border="1">
  	  <tr align="center" <? echo $bgcolor; ?>>
  	    <td align="center" style="width: 20%"><font color="#333333" size="3"><b><? echo $con; ?></b></font></td>
  	    <td align="left" style="width: 40%"><font <? echo $color; ?> size="3"><b><? echo $Nome."<br /><font color='red'>".$adotante."</font>"; ?></b></font></td>
  	    <td align="center" style="width: 40%"><font color="#333333" size="3"><b><? echo $Data; ?></b></font></td>
  	  </tr>
  	 </table>
    </center>
	<?
	$con = $con + 1;
	}


	$con = $con - 1;
	
	?>

</div>
	<footer id="footer">   
	   <?php include "footer.php"; ?>
	</footer>

</body>
</html>