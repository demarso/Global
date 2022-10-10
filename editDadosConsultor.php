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
<script type="text/javascript">
	
            function tonal(){
               var a = document.getElementById('Consul').value;
               document.location = "editDadosConsultor.php?nome="+a;
            }

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
  
 <?php 
  include "cabecalho1P.php";
  include "conexao.php"; 
  $datacad = date('Y-m-d');
  $horacad = date('H:i');
  if(!isset($_GET['nome'])){ 
 ?>
 <h1>Selecione o Consultor</h1>
 <table>
    <tr>
        <td><h3>Consultor:</h3></td>
         <td>
          <select name="Consul" id="Consul" tabindex="4" onchange="tonal();">
            <option value="">---</option>
              <?php
                                               
                $sql = "SELECT idConsultor, nome FROM consultor WHERE status = 'Ativo' ORDER BY  nome";
                $results = mysqli_query($conn,$sql);
                while ( $row = mysqli_fetch_array($results) ) {
                  echo "<option value='".$row[0]."'>".$row[1]."</option>";
                }
              ?>
          </select>
         </td>
    </tr>
   </table>
  <? } 
   if(isset($_GET['nome'])){ 
    $cons = $_GET[nome];
    $sql = "SELECT * FROM consultor WHERE idConsultor = '$cons'";
      $resultado = mysqli_query($conn,$sql) or die (mysql_error());
      while ($linha = mysqli_fetch_array($resultado)) {
       $id = $linha['idConsultor'];
       $consultor = $linha['nome'];
       $vinculo = $linha['vinculo'];
       $regional = $linha['regional'];
       $equipe = $linha['equipe'];
       $status = $linha['status'];
     }
 ?>
   <center>
   <br />
   <form name="form1" method="post" action="editDadosConsultorOK.php" >
    <h1>Altere os dados do Consultor</h1>
   <table border="1">
      <tr>
        <td><font size='3'>ID:</font></td>
        <td>
         <input  type="text" name="id" id="id" tabindex="1" size="10" value="<? echo $id; ?>" readonly="true">
        </td>
      </tr> 
      <tr>
        <td><font size='3'>Data/Hora:</font></td>
        <td>
         <input type="date" name="datacadA" id="datacadA" size="10" tabindex="-1" value="<? echo $datacad ?>" readonly="true">
         &nbsp;&nbsp;&nbsp;
         <input type="time" name="horacadA" id="horacadA" size="4" tabindex="-1" value="<? echo $horacad ?>" readonly="true">
        </td>
      </tr>  
       <tr>
         <td><font size='3'>Nome:</font></td>
         <td><input  type="text" name="consultor" id="consultor" size="50" tabindex="1" value="<? echo $consultor; ?>"></td>
       </tr>
       <tr><td><font size='3'>Regional:</font></td>
       <td>
        <select name="regional" id="regional" tabindex="1">
            <option value="<? echo $regional; ?>"><? echo $regional; ?></option>
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
            <option value="<? echo $equipe; ?>"><? echo $equipe; ?></option>
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
       <tr>
       <td><font size='3'>Vínculo:</font></td>
        <td>
          <select name="vinculo" id="vinculo"  tabindex="4">
              <option value="<? echo $vinculo; ?>"><? echo $vinculo; ?></option>
              <option value="EFETIVO">EFETIVO</option>
              <option value="FREELANCE">FREELANCE</option>
              <option value="EFETIVO">EFETIVO/AGÊNCIA</option>
            <option value="FREELANCE">FREELANCE/AGÊNCIA</option>
            <option value="EFETIVO">PJ</option>
            <option value="EFETIVO">MASTER</option>
          </select>
         </td>
       </tr>
       <tr>
       <td colspan="2" align="center">
         <input type="submit" value="Atualizar">   
       </td>
       </tr>

   </table>
   </form>
   <? } ?>
   <br /><br /><br /><br /><br /><br /><br /><br /><br /><br />
<footer id="footer">   
   <?php include "footer.php"; ?>
</footer>
</div>
</body>
</html>