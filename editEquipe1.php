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
            });
 </script>
</head>
<body>
<!--<img id="logo" src="imagens/logo.png" >-->

<div id="interface">
 <?php include "cabecalho1P.php";
 include "conexao.php"; 
 $id = $_POST['equipe'];
 $sql = "SELECT nome FROM equipe WHERE idEquipe = '$id'";
      $resultado = mysqli_query($conn,$sql) or die (mysql_error());
      while ($linha = mysqli_fetch_array($resultado)) {
            $equi = $linha['nome'];
     }

 ?>
   <center>
   <br />
   <form name="form1" method="post" action="editEquipeOK.php" >
    <h1>Alatere os nome da Equipe</h1>
    <h2>Nome Atual:<? echo $equi; ?></h2>
   <table border="1">
    <!--   <input  type="hidden" name="id" id="id" tabindex="1" value="<? echo $id; ?>" readonly="true"> -->
       </tr>
       <input type="hidden" name="id" id='id' value="<? echo $id; ?>">
       <input type="hidden" name="eqold" id='eqold' value="<? echo $equi; ?>">
      <tr>
        <td><font size='5'>Nome novo:</font></td>
        <td>
        <input type="text" name="equipe" id='equipe'">
       </td>
       </tr>
       <tr>
       <td colspan="2" align="center">
         <input type="submit" value="Atualizar">   
       </td>
       </tr>
      </table>
   </form>
   </center>
   <br /><br />
<footer id="footer">   
   <?php include "footer.php"; ?>
</footer>
</div>
</body>
</html>