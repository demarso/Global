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
 <?php include "cabecalho1.php"; ?>
   <center>
   <br />
   <table border="1" width="80%">
     <tr align="center" height="30">
       <td height="70"><a href="#"><img src="imagens/Botao_Consultor.png" width="150" onMouseOver="mudaFoto('imagens/consultor2.png')" onMouseOut="mudaFoto('imagens/globo.png')" title="Cadastro de Consultores"></a></td>
       <td height="70"><a href="#"><img src="imagens/Botao_Agencia.png" width="150" onMouseOver="mudaFoto('imagens/agencia.png')" onMouseOut="mudaFoto('imagens/globo.png')" title="Cadastro das Agências"></a></td>
       <td height="70"><a href="#"><img src="imagens/Botao_Veiculo.png" width="150" onMouseOver="mudaFoto('imagens/carro2.png')" onMouseOut="mudaFoto('imagens/globo.png')" title="Cadastro de Veículos"></a></td>
     </tr>
     <tr align="center" height="30">
       <td height="70"><a href="#"><img src="imagens/Botao_Registro.png" width="150" onMouseOver="mudaFoto('imagens/registro.png')" onMouseOut="mudaFoto('imagens/globo.png')" title="Efetuar o registro das vendas"></a></td>
       <td height="70"><a href="#"><img src="imagens/Botao_Planilha.png" width="150" onMouseOver="mudaFoto('imagens/planilha.png')" onMouseOut="mudaFoto('imagens/globo.png')" title="Visualizar a planilha completa"></a></td>
       <td height="70"><a href="#"><img src="imagens/Botao_Equipes.png"ipes width="150" onMouseOver="mudaFoto('imagens/equipe.png')" onMouseOut="mudaFoto('imagens/globo.png')" title="Visualizar desempenho das equipes"></a></td>
     </tr>
     
   </table>
   </center>
   <br /><br />
<footer id="footer">   
   <?php include "footer.php"; ?>
</footer>
</div>
</body>
</html>