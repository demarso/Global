<?php
session_start();
date_default_timezone_set('America/Sao_Paulo');
if (!isset($_SESSION['idF'])){
    header("Location: index.php?erro=1");
    exit;
 }
 if($_SESSION['nivelF'] != 0 && $_SESSION['nivelF'] != 10){
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
<script type="text/javascript">
    function tonal(tipo){
           var a = tipo;
           document.location = "consProducao.php?tip="+a;
    }

    function mudaFoto(foto){
            document.getElementById("icone").src = foto;
    }

    
  </script>
<style>
    .dia {font-family: helvetica, arial; font-size: 8pt; color: #FFFFFF}
    .data {font-family: helvetica, arial; font-size: 8pt; text-decoration:none; color:#191970}
    .mes {font-family: helvetica, arial; font-size: 8pt}
    .Cabecalho_Calendario {font-family: helvetica, arial; font-size: 10pt; color: #000000; text-decoration:none; font-weight:bold}
</style>
</head>
<body>
<div id="interface">
<?php include "menu_usu.php"; ?>
 <?php 
   $datacad = date('d/m/Y');
   $horacad = date('H:i');
   $datacad2 = date('d/m/Y');
   $horacad2 = date('H:i');

   $id = $_GET['id'];

   include 'conexao.php';

    $sql = "select idUsuario, Nome, login, senha, empresa, nivel, status from usuariof where idUsuario='$id' order by Nome";
    $resultado = mysqli_query($conn,$sql) or die (mysql_error());

     while ($linha = mysqli_fetch_array($resultado)) {
      $idUsuario = $linha['idUsuario'];
      $Nome = $linha['Nome'];
      $login = $linha['login'];
      //$senha = substr($linha['senha'], 0, 25);
      $empresa = $linha['empresa'];
      $nivel = $linha['nivel'];
      $status1 = $linha['status'];
 ?>
  <br /><br />
   <H3>CADASTRO DE USUÁRIO</H3>
 <form name="form1" method="post" action="usuario_editaOK.php" >
   <table>
      <tr>
        <td><h3>ID:</h3></td>
         <td>
           <input type="text" name="id" id="id" size="40" tabindex="1" value="<? echo $idUsuario; ?>" readonly>
         </td>
    </tr>
    <tr>
        <td><h3>Nome:</h3></td>
         <td>
           <input type="text" name="nome" id="nome" size="40" tabindex="1" value="<? echo $Nome; ?>" required="true">
         </td>
    </tr>
    <tr>
        <td><h3>Login:</h3></td>
         <td>
           <input type="text" name="login" id="login" size="40" tabindex="2" value="<? echo $login; ?>" style='text-transform:lowercase'>
         </td>
    </tr>
    <tr>
        <td><h3>Senha</h3></td>
         <td>
           <input type="password" name="senha" id="senha" size="10" tabindex="3">
         </td>
    </tr>
    <tr>
        <td><h3>Empresa:</h3></td>
         <td>
          <select name="empresa" id="empresa"  tabindex="5">
            <option value="<? echo $empresa; ?>"><? echo $empresa; ?></option>
            <option value="GLOBAL">GLOBAL</option>
            <option value="JRX">JRX</option>
            <option value="LANTERNAGEM">LANTERNAGEM</option>
          </select>
         </td>
    </tr>
    <tr>
         <td><h3>Nível</h3></td>
         <td><select name="nivel" id="nivel"  tabindex="5">
            <option value="<? echo $nivel; ?>"><? echo $nivel; ?></option>
            <option value="0">0</option>
            <option value="2">2</option>
            <option value="3">3</option>
          </td></select>
    </tr>
    <tr>
         <td><h3>Status</h3></td>
         <td>
             <INPUT TYPE="RADIO" NAME="status" VALUE="Ativo" tabindex="7" <? if($status1 == 'Ativo'){?> checked="true" <?}?>> Ativo
             <INPUT TYPE="RADIO" NAME="status" VALUE="Inativo" <? if($status1 == 'Inativo'){?> cheked="true" <?}?> > Inativo
         </td>
    </tr>
    </table>
  <center>
    <table>
      <tr>
         <td colspan="4" align="center"><hr align="center" width="600" size="1" color=red></td>
       </tr>
       <tr>
         <td colspan="4" align="center"><input type="submit" size="150" value="CADASTRAR"></td>  
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