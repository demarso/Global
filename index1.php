<?php
session_start();
date_default_timezone_set('America/Sao_Paulo');
if (!isset($_SESSION['id'])){
    header("Location: index.php?erro=1");
    exit;
 }
 ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta http-equiv="Content-type" content="text/html; charset=UTF-8"/>
  <link rel="stylesheet" type="text/css" href="css/estilo.css?version=12"/>
  <link rel="stylesheet" href="css/style_menu.css?version=12" type="text/css"/>
  <script type="text/javascript" src="include/jquery-1.3.2.js"></script>
  <script type="text/javascript" src="include/script.js"></script>
  <script type="text/javascript" src="include/jquery-latest.min.js"></script>
  <script type="text/javascript" src="include/script_menu.js"></script>
  <!--<script type="text/javascript" src="include/micoxAjax.js"></script>-->
  <title>Gestão de Propostas</title> 
</head>
<script type="text/javascript">
	function mudaFoto(foto){
		document.getElementById("icone").src = foto;
	}
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
            });]
</script>
<body>
<?php 
    include "cabecalho1P.php";
 ?>
 <div id="interface">
     <br>
      <a href="AlteraSenha.php">Alterar Senha</a> <br /><br />
     <table>
      <? if($_SESSION['nome'] == "Vivian Martins" || $_SESSION['nome'] == "Denilson Soares" || $_SESSION['nome'] == "MARIANNE COSTA" || $_SESSION['nome'] == "JOSE EDUARDO SOARES SALDANHA"){ ?>
        <tr>
          <td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
          <td colspan="3" align="center"><a href="cons/cons.php" target="_blank"><img src="imagens/botaoC.png" width="300px"></a></td><td>&nbsp;&nbsp;&nbsp;&nbsp;</td>  
          <td>&nbsp;&nbsp;&nbsp;&nbsp;</td>
        </tr>
      <?  }  ?>
    </table>
   
  </div>
   <footer id="footer">   
   <?php include "footer.php"; ?>
</footer>

</body>
</html>