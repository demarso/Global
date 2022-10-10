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
<!--<img id="logo" src="imagens/logo.png" >-->
<div id="interface">
 <?php 
   include "cabecalho_usu.php"; 
   $datacad = date('d/m/Y');
   $horacad = date('H:i');
   $datacad2 = date('d/m/Y');
   $horacad2 = date('H:i');
 
    $Nome = $_REQUEST['nome'];
    $Login = strtolower($_REQUEST['login']);
    $Senha = $_REQUEST['senha'];
    $Regional = strtoupper($_REQUEST['regional']);
    $Nivel = $_REQUEST['nivel'];
    $Status = $_REQUEST['status'];

    $confu1 = "L2xB3Sbia";
    $confu2 = "Dawi748v2";
    $senha1 = $Senha;
    $senha1 = $confu1.$senha1.$confu2;
    $senha1 = hash( 'SHA256',$senha1);

    include "conexao.php";

    $sql = "insert into usuario(Nome,login,senha,regional,nivel,status) 
        values('$Nome','$Login','$senha1',upper('$Regional'),'$Nivel','$Status')";
    $result = mysqli_query($conn,$sql) or die ("Cadastro da Produção não realizado.");

      echo "<script type = 'text/javascript'> location.href = 'usuario_lista.php'</script>"; 
?>
    <footer id="footer">   
      <?php include "footer.php"; ?>
    </footer>
</div>
</body>
</html>