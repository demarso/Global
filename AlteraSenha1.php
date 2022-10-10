<?php
session_start();
date_default_timezone_set('America/Sao_Paulo');
if (!isset($_SESSION['id'])){
    header("Location: index.php?erro=1");
    exit;
}
 $hora1      = "07:00";
 $hora2      = "19:00";
 $horaAtual = date("H:i");
 ?>s
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta http-equiv="Content-type" content="text/html; charset=UTF-8"/>
  <link rel="stylesheet" type="text/css" href="css/estilo.css"/>
  <title>Gestão de Propostas</title> 
</head>
<script type="text/javascript">
	function mudaFoto(foto){
		document.getElementById("icone").src = foto;
	}
</script>
<body>
<!--<img id="logo" src="imagens/logo.png" >-->
<div id="interface">
 <?php 
  date_default_timezone_set('America/Sao_Paulo');
  include "cabecalho1.php";
  require_once("conexao.php");
  $senha0 = $_POST["Senha0"];
  $senha1 = $_POST["Senha1"];
  $senha2 = $_POST["Senha2"];
  $nome2 = $_SESSION['nome'];

    $confu1 = "L2xB3Sbia";
	$confu2 = "Dawi748v2";
	$senha0 = $confu1.$senha0.$confu2;
	$senha1 = $confu1.$senha1.$confu2;
	$senha2 = $confu1.$senha2.$confu2;
	$senha1 = hash( 'SHA256',$senha1);
	$senha2 = hash( 'SHA256',$senha2);
  	$senha0 = hash( 'SHA256',$senha0);
	

$sql = "SELECT senha FROM usuario WHERE Nome = '$nome2'";
 $result = mysqli_query($conn, $sql) or die (mysql_error());

while ($linha = mysqli_fetch_array($result))
{
	$senhaantiga = $linha['senha'];
	}

if ($senha0 ==  $senhaantiga){

  if (empty($senha1)){ 
      echo "<br /><br /><a href='AlteraSenha.php'>VOLTA</a><br /><br />";
	  die("Escolha uma senha Nova");
	  
   }
   
   if (empty($senha2)){ 
      echo "<br /><br /><a href='AlteraSenha.php'>VOLTA</a><br /><br />";
	  die("Você deve confirmar a sua senha Nova");
	  
   }
   
   if ($senha1 != $senha2){ 
     echo "<br /><br /><a href='AlteraSenha.php'>VOLTA</a><br /><br />";
	 die("Os campos senha e confirmação de senha devem ser idênticos");
	 
   }
}
else{
echo "<br /><br /><a href='AlteraSenha.php'>VOLTA</a><br /><br />";
die("Sua senha antiga não confere");

}

$query = mysqli_query($conn,"UPDATE usuario SET senha='$senha1' WHERE nome = '$nome2'") or die(mysql_error());

echo "<br>";
echo "<font face=verdana size=2>Sua senha foi alterada com sucesso.";

mysqli_close($conn);

?>
    

   <br>
   <footer id="footer">   
     <?php include "footer.php"; ?>
   </footer>
</div>
</body>
</html>
