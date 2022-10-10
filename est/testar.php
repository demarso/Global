<?php
session_start();
date_default_timezone_set('America/Sao_Paulo');
include "conexao.php";

	
	if (!isset($_POST['senha']) || !isset($_POST['login']))
        {
		echo "<script>alert(\"Preencha corretamente!\");history.back(-1);</script>";
		exit;
	}
	$senha = addslashes($_POST['senha']);
    $login = addslashes($_POST['login']);
	
	$confu1 = "L2xB3Sbia";
	$confu2 = "Dawi748v2";
	$senha1 = $senha;
	$senha1 = $confu1.$senha1.$confu2;
	$senha1 = hash( 'SHA256',$senha1);
  	//echo $login." ".$senha." ".$senha1;/*
	if (mysql_errno())
    {
	   echo "ERRO : " . mysql_errno() . "</body></html>";
	   exit;
	}
	//echo $login." ".$senha1."<br  />";

	$sql = "SELECT * FROM usuarioe WHERE senha = '$senha1' and login = '$login'";
	$tabela = mysqli_query($conn,$sql) or die(mysql_error());
	$registro = mysqli_num_rows($tabela);
	//echo $registro."<br  />"; 
	if ($registro == 0)
        {
	     header('Location: index.php?errologin=1');
         exit;
	    }
    else
        {

			$reg = mysqli_fetch_array($tabela, MYSQL_ASSOC);
			//echo $reg['idUsuario']." ".$reg['nome']." ".$reg['nivel']." ".$reg['idIgreja']."<br  />";
			$_SESSION['idE'] = $reg['idUsuario'];
			$_SESSION['nomeE'] = $reg['nome'];
			$_SESSION['nivelE'] = $reg['nivel'];
			$_SESSION['loginE'] = $reg['login'];
			//$_SESSION['regio'] = $reg['regional'];
			//$_SESSION['pag'] = 0;
			
			//echo $_SESSION['id']." ".$_SESSION['nome']." ".$_SESSION['nivel']." ".$_SESSION['idIgreja'];

			if (!empty($_SERVER['HTTP_CLIENT_IP']))   //check ip from share internet
    		{
      			$ip=$_SERVER['HTTP_CLIENT_IP'];
    		}
      		elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR']))   //to check ip is pass from proxy
      		{
        		$ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
      		}
         	else
         	{
           		$ip=$_SERVER['REMOTE_ADDR'];
         	}
	  
				$data = date("Y-m-d - H:i:s");
				$addr = $ip;
				$self = $_SERVER['PHP_SELF'];
				$usu = $_SESSION['nomeE'];
                if($usu != "Denilson Soares"){
	 			   $sql_cad = "insert into acesso(nome,addr,data) values ('$usu','$addr','$data')";
        		   $result_cad = mysqli_query($conn,$sql_cad) or die ("Cadastro de acesso n&atild;o realizado.");
                 }
			header('Location: index1.php');

		}
?>