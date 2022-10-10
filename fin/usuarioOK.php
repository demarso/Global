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
 
    $Nome = $_REQUEST['nome'];
    $Login = strtolower($_REQUEST['login']);
    $Senha = $_REQUEST['senha'];
    $Empresa = strtoupper($_REQUEST['empresa']);
    $Nivel = $_REQUEST['nivel'];
    $Status = $_REQUEST['status'];

    $confu1 = "L2xB3Sbia";
    $confu2 = "Dawi748v2";
    $senha1 = $Senha;
    $senha1 = $confu1.$senha1.$confu2;
    $senha1 = hash( 'SHA256',$senha1);

    //echo $Nome." ".$Login." ".$senha1." ".$Empresa." ".$Nivel." ".$Status."<br /> "

    include "conexao.php";

    $sql = "insert into usuariof(nome,login,senha,empresa,nivel,status) 
        values('$Nome','$Login','$senha1',upper('$Empresa'),'$Nivel','$Status')";
    $result = mysqli_query($conn,$sql) or die ("Cadastro do usuário não realizado.");

      echo "<script type = 'text/javascript'> location.href = 'usuario_lista.php'</script>"; 
   
?>
 </div>
  <footer id="footer">   
     <?php include "footer.php"; ?>
  </footer>
</body>
</html>