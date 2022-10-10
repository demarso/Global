<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta http-equiv="Content-type" content="text/html; charset=UTF-8"/>
  <link rel="stylesheet" type="text/css" href="css/estilo.css?version=12"/>
  <title>Gestão de Propostas</title> 
</head>
<body>
<?php 
     date_default_timezone_set('America/Sao_Paulo');
     include "cabecalhoP.php";
    
 ?>
 <div id="interface2">
     <br><br>
		
    <div id="login">
      <form action="testar.php" method="post" name="formulario">
		<font class="font3">
		<?php
		 if (isset($_GET['errologin'])){
		  echo "\n";
		  echo "<font size='3' color='#FFFF00'><b>&nbsp;&nbsp&nbsp&nbsp*** Senha inválida! ***</b></font>";
		  echo "\n";
		  }
		 if (isset($_GET['erro'])){
		  echo "\n";
		  echo "<font size='3' color='#FF0000'><b>*** Coloque o Login e senha válidos primeiro! ***</b></font>";
		  echo "\n";
		  } 
		?>
		</font>
		<table>
		<tr>
		 <td><font size="8">Login:</font></td>
		</tr>
		<tr>
		 <td><input type="text" name="login" size="30" align="left" maxlength=18 ></td>
		</tr>
		 <tr><td>&nbsp;</td></tr>
		 <tr>
		   <td><font size="8">Senha:</font></td>
		 </tr>
		 <tr>
		   <td><input type="password" name="senha" size="30" class="formulario"></td>
		 </tr>
		 <tr><td>&nbsp;</td></tr>
		 <tr>
		  <td><input type="submit" value="LOGAR" class="formulario"></td>
		 </tr>
		</table>
		</form>
	</div>
 </div>
   <footer id="footer">   
   <?php include "footer.php"; ?>
   </footer>

</body>
</html>