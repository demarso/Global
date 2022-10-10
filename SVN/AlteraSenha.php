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
 <?php 
     date_default_timezone_set('America/Sao_Paulo');
     include "cabecalho1.php";
  ?>
      <form action="AlteraSenha1.php" method="post" >
          
          <div align="center">
          <font size="+2" color="#0033FF">Altera&ccedil;&atilde;o de Senha</font><br /><br />
          </div>
            <div>
              <label for="password">Senha Antiga:</label>
              <input type="password" name="Senha0" value="" id="Senha0" />
            </div><br /><br />
            <div>
              <label for="password">Senha Nova:</label>
              <input type="password" name="Senha1" value="" id="Senha1" />
            </div><br /><br />
           
            <div>
              <label for="password">Confirma Senha Nova:</label>
              <input type="password" name="Senha2" value="" id="Senha2" />
            </div>
            <br /><br />
          <div id="login-button">
        <input type="submit"  value="ALTERA"  />
          </div>
      </form>
      
    
   <footer id="footer">   
     <?php include "footer.php"; ?>
   </footer>
</div>
</body>
</html>