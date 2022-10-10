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

          function checar1(pagina) 
            { 
               if (confirm("CONFIRMA A INCLUSÃO DE UMA EQUIPE?")==true) 
                  { 
                    window.location=pagina; 
                  } 
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
 <?php 
    include "cabecalho1P.php";
    include ("conexao.php");
    $datacad = date('Y-m-d');
    $horacad = date('H:i');
 ?>
   <center>
   <br />
   <form name="form1" method="post" action="cadConsultorOK.php" >
     <h1>Digite o Consultor para Inclusão</h1>
   <table border="1">
    <tr>
      <td><font size='3'>Data/Hora:</font></td>
      <td>
       <input type="date" name="datacadA" id="datacadA" size="10" tabindex="-1" value="<? echo $datacad ?>" readonly="true">
       &nbsp;&nbsp;&nbsp;
       <input type="time" name="horacadA" id="horacadA" size="4" tabindex="-1" value="<? echo $horacad ?>" readonly="true">
      </td>
    </tr>  
     <tr><td><font size='3'>Consultor:</font></td>
       <td>
         <input  type="text" name="consultor" id="consultor" size="30" tabindex="1" style='text-transform:uppercase'>   
       </td>
       </tr>
       <tr><td><font size='3'>Regional:</font></td>
       <td>
        <select name="regional" id="regional" tabindex="1">
            <option value="">---</option>
              <?php
                $sql = "SELECT nome FROM regional WHERE status = 'Ativo' ORDER BY nome";
                $results = mysqli_query($conn,$sql);
                while ( $row = mysqli_fetch_array($results) ) {
                  echo "<option value='".$row[0]."'>".$row[0]."</option>";
                }
              ?>
          </select>
       </td>
       </tr>
       <tr>
      <td><font size='3'>Equipe:</font></td>
       <td>
          <select name="equipe" id="equipe" tabindex="1">
            <option value="">---</option>
              <?php
                $sql = "SELECT nome FROM equipe WHERE status = 'Ativo' ORDER BY nome";
                $results = mysqli_query($conn,$sql);
                while ( $row = mysqli_fetch_array($results) ) {
                  echo "<option value='".$row[0]."'>".$row[0]."</option>";
                }
              ?>
          </select> 
       </td>
      </tr>
      <tr><td><font size='3'>Vínculo:</font></td>
      <td>
        <select name="vinculo" id="vinculo"  tabindex="4">
            <option value=""> - - -</option>
            <option value="EFETIVO">EFETIVO</option>
            <option value="FREELANCE">FREELANCE</option>
            <option value="EFETIVO">EFETIVO/AGÊNCIA</option>
            <option value="FREELANCE">FREELANCE/AGÊNCIA</option>
            <option value="EFETIVO">PJ</option>
            <option value="EFETIVO">MASTER</option>
        </select></td>
      </tr>
      <tr>
       <td colspan="2" align="center">
         <input type="submit" value="Cadastrar">   
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