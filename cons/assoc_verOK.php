<?php
session_start();
date_default_timezone_set('America/Sao_Paulo');
if($_SESSION['nome'] != "Vivian Martins" && $_SESSION['nome'] != "Denilson Soares" && $_SESSION['nome'] != "MARIANNE COSTA" && $_SESSION['nome'] != "JOSE EDUARDO SOARES SALDANHA"){
   echo "<script>alert('Você não tem permissão para acessar está página!');</script>";
   echo "<script language=\"javascript\">window.close();</script>";
   exit;
 }
 ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta http-equiv="Content-type" content="text/html; charset=UTF-8"/>
  <link rel="stylesheet" type="text/css" href="../css/estilo.css"/>
  <link rel="stylesheet" href="../css/style_menu.css" type="text/css"/>
    <script type="text/javascript" src="../include/jquery-1.3.2.js"></script>
    <script type="text/javascript" src="../include/jquery-latest.min.js"></script>
    <script type="text/javascript" src="../include/script_menu.js"></script>
    <script type="text/javascript">
    </script>
</head>
<body>
<div id="interface">
    <?php 
        include ("conexao.php");
        $idc = $_POST['idc'];
        $assoc = $_POST['assoc'];
        //str_replace(',','.', str_replace('.','', $assoc));
        $conf = $_POST['conf'];
        //str_replace(',','.', str_replace('.','', $conf));
        $indic = $conf*100/$assoc;
        $indic = number_format($indic, 2, ',', '.');
        
        $ano = date("Y");
       // echo $idc." ".$assoc." ".$conf." ".$indic." ".$ano;
       $sql = "SELECT idConsultor FROM indice WHERE idConsultor='$idc' AND ano='$ano'";
        $resultado = mysqli_query($conn,$sql) or die (mysql_error());
        $registro = mysqli_num_rows($resultado);
		if ($registro == 0)
	        {
			    $sql = "INSERT INTO indice (idConsultor, totAssoc, totConf, indice, ano) VALUES('$idc','$assoc','$conf', REPLACE( REPLACE( '$indic', '.' ,'' ), ',', '.' ),'$ano')";
	            $result = mysqli_query($conn,$sql) or die ("Cadastro do Associado não realizado.");
	            echo "<script>window.close();</script>";


		    }
	    else
	        {
        	    $query = mysqli_query($conn,"UPDATE indice SET totAssoc='$assoc', totConf='$conf', indice=REPLACE( REPLACE( '$indic', '.' ,'' ), ',', '.' )  WHERE idConsultor = '$idc' AND ano='$ano'") or die(mysql_error());
            		echo "<script>window.close();</script>";
   			}
   ?>       


</div>
</body>
</html>