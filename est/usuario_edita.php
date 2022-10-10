<?php
session_start();
date_default_timezone_set('America/Sao_Paulo');
if (!isset($_SESSION['idE'])){
    header("Location: index.php?erro=1");
    exit;
 }
 if($_SESSION['nivelE'] != 0){
     echo "<script>alert('Voce nao tem permissao para acessar esta pagina!');history.back(-1);</script>";
     exit;
  }
 ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta http-equiv="Content-type" content="text/html; charset=UTF-8"/>
  <link rel="stylesheet" type="text/css" href="css/estilo.css"/>
  <link rel="stylesheet" type="text/css" href="css/forms.css"/>
  <title>Gestão de Propostas</title>
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
<? include "menu_usu.php" ?><br />
<div id="interface">
 <?
   $datacad = date('d/m/Y');
   $horacad = date('H:i');
   $datacad2 = date('d/m/Y');
   $horacad2 = date('H:i');

   $id = $_GET['id'];

   include 'conexao.php';

    $sql = "select IDUsuario, Nome, login, senha, regional, nivel, status from usuario where IDUsuario='$id' order by Nome";
    $resultado = mysqli_query($conn,$sql) or die (mysql_error());

     while ($linha = mysqli_fetch_array($resultado)) {
      $IDUsuario = $linha['IDUsuario'];
      $Nome = $linha['Nome'];
      $login = $linha['login'];
      //$senha = substr($linha['senha'], 0, 25);
      $regional = $linha['regional'];
      $nivel = $linha['nivel'];
      $status1 = $linha['status'];
 ?>
 <form name="form1" method="post" action="usuario_editaOK.php" >
  
   <H3>CADASTRO DE USUÁRIO</H3>
   <table>
      <tr>
        <td><h3>ID:</h3></td>
         <td>
           <input type="text" name="id" id="id" size="40" tabindex="1" value="<? echo $IDUsuario; ?>" readonly>
         </td>
    </tr>
    <tr>
        <td><h3>Nome:</h3></td>
         <td>
           <input type="text" name="nome" id="nome" size="40" tabindex="1" value="<? echo $Nome; ?>">
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
        <td><h3>Regional:</h3></td>
         <td>
           <input type="text" name="regional" id="regional" size="50" tabindex="4" value="<? echo $regional; ?>" style='text-transform:uppercase'>
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
             <INPUT TYPE="RADIO" NAME="status" VALUE="1" tabindex="7" <? if($status1 == 1){?> cheked="true" <?}?>> Ativo
             <INPUT TYPE="RADIO" NAME="status" VALUE="0" <? if($status1 == 0){?> cheked="true" <?}?> > Inativo
         </td>
    </tr>
    </table>
  
  <center><br />
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