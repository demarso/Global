<?php
session_start();
date_default_timezone_set('America/Sao_Paulo');
if (!isset($_SESSION['idF'])){
    header("Location: index.php?erro=1");
    exit;
 }
 if($_SESSION['nivelF'] != 0){
     echo "<script>alert('Voce nao tem permissao para acessar esta pagina!');history.back(-1);</script>";
     exit;
  }
 ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta http-equiv="Content-type" content="text/html; charset=UTF-8"/>
  <link rel="stylesheet" type="text/css" href="css/style.css"/>
 <title>Gestão de Finanças</title>
  <script type="text/javascript" src="include/jquery.js"></script>
<script type="text/javascript" src="include/micoxAjax.js"></script>

<style>
    .dia {font-family: helvetica, arial; font-size: 8pt; color: #FFFFFF}
    .data {font-family: helvetica, arial; font-size: 8pt; text-decoration:none; color:#191970}
    .mes {font-family: helvetica, arial; font-size: 8pt}
    .Cabecalho_Calendario {font-family: helvetica, arial; font-size: 10pt; color: #000000; text-decoration:none; font-weight:bold}
</style>
</head>
<body>
<div id="interface">
<?php include "menu_banco.php"; ?>
 <?php 
   $datacad = date('d/m/Y');
   $horacad = date('H:i');
   $datacad2 = date('d/m/Y');
   $horacad2 = date('H:i');

   $id = $_GET['id'];

   include 'conexao.php';

    $sql = "select * from bancos where idBanco='$id' order by nomeBanco";
    $resultado = mysqli_query($conn,$sql) or die (mysql_error());

     while ($linha = mysqli_fetch_array($resultado)) {
      $id = $linha['idBanco'];
      $Nome = $linha['nomeBanco'];
      $numero = $linha['numeroBanco'];
      $agencia = $linha['agenciaBanco'];
      $conta = $linha['contaBanco'];s
     
 ?>
  <br /><br />
   <H3>CADASTRO DE USUÁRIO</H3>
 <form name="form1" method="post" action="banco_editaOK.php" >
   <table>
      <tr>
        <td><h3>ID:</h3></td>
         <td>
           <input type="text" name="id" id="id" size="40" tabindex="1" value="<? echo $id; ?>" readonly>
         </td>
    </tr>
    <tr>
        <td><h3>Nome:</h3></td>
         <td>
           <input type="text" name="numero" id="numero" size="10" tabindex="2" value="<? echo $numero; ?>" required="true">
         </td>
    </tr>
    <tr>
        <td><h3>Nome:</h3></td>
         <td>
           <input type="text" name="nome" id="nome" size="40" tabindex="3" value="<? echo $Nome; ?>" style='text-transform:uppercase'>
         </td>
    </tr>
    <tr>
        <td><h3>Agência</h3></td>
         <td>
           <input type="text" name="agencia" id="agencia" size="30" tabindex="4" value="<? echo $agencia; ?>">
         </td>
    </tr>
    <tr>
        <td><h3>Conta</h3></td>
         <td>
           <input type="text" name="conta" id="conta" size="30" tabindex="5" value="<? echo $conta; ?>">
         </td>
    </tr>
    </table>
  <center>
    <table>
      <tr>
         <td colspan="4" align="center"><hr align="center" width="600" size="1" color=red></td>
       </tr>
       <tr>
         <td colspan="4" align="center"><input type="submit" size="150" value="EDITAR"></td>  
         </td>
       </tr>
    </table>
    </center>
 </form>
 <? } ?>
 </div>
  <footer id="footer">   
     <?php include "footer.php"; ?>
  </footer>
</body>
</html>