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
  <link rel="stylesheet" href="css/style.css" type="text/css"/>
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
<?php include "menu_usu.php"; ?>
<div id="interface">
 <?php 
    
   $datacad = date('d/m/Y');
   $horacad = date('H:i');
   $datacad2 = date('d/m/Y');
   $horacad2 = date('H:i');
 
    $id = $_POST['id'];
    $Nome = $_POST['nome'];
    $Login = strtolower($_POST['login']);
    $Senha = $_POST['senha'];
    $Empresa = strtoupper($_POST['empresa']);
    $Nivel = $_POST['nivel'];
    $Status = $_POST['status'];

    $confu1 = "L2xB3Sbia";
    $confu2 = "Dawi748v2";
    $senha1 = $Senha;
    $senha1 = $confu1.$senha1.$confu2;
    $Senha1 = hash( 'SHA256',$senha1);

    include "conexao.php";

    $sql = "update usuariof set nome='$Nome',login='$Login',senha='$Senha1',empresa='$Empresa',nivel='$Nivel',status='$Status' where idUsuario=$id";
    $result = @mysqli_query($conn,$sql);

      echo "<script type = 'text/javascript'> location.href = 'usuario_lista.php'</script>"; 
?>
</div>
  <footer id="footer">   
     <?php include "footer.php"; ?>
  </footer>
</body>
</html>