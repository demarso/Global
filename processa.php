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
  <script type="text/javascript" src="include/jquery.js"></script>
  <script type="text/javascript" src="include/micoxAjax.js?version=12"></script>
  <script type="text/javascript" src="include/jquery-1.3.2.js"></script>  
  <script type="text/javascript" src="include/jquery.maskedinput-1.1.4.pack.js"></script>
  <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
</head>
<body>  
 <?php
      include_once("conexao.php");
	  $mes = $_POST['mesc'];
      $ano = $_POST['anoc'];
      $hoje = date('Y-m-d');
	//$dados = $_FILES['arquivo'];
	//var_dump($dados);
	echo $mes."<br />";
	echo $ano."<br />";
	echo $hoje."<br />";
	if(!empty($_FILES['arquivo']['tmp_name'])){
		$arquivo = new DomDocument();
		$arquivo->load($_FILES['arquivo']['tmp_name']);
		//var_dump($arquivo);
		
		$linhas = $arquivo->getElementsByTagName("Row");
		//var_dump($linhas);
		
		$primeira_linha = true;
		
		foreach($linhas as $linha){
			 $coLi = $linha->getElementsByTagName('Data')->length;
		echo $coLi."<br />";
			if($coLi == 7){
			if($primeira_linha == false){
				$associado = $linha->getElementsByTagName("Data")->item(0)->nodeValue;
				echo "Associado: $associado <br>";
				
				$placa1 = $linha->getElementsByTagName("Data")->item(1)->nodeValue;
				echo "Placa: $placa1 <br>";
				
				$dataProposta = $linha->getElementsByTagName("Data")->item(2)->nodeValue;
				echo "Data da Proposta: $dataProposta <br>";

				$veiculo = $linha->getElementsByTagName("Data")->item(3)->nodeValue;
				echo "Veículo de Acesso: $veiculo <br>";

				$Consultor = $linha->getElementsByTagName("Data")->item(4)->nodeValue;
				echo "Consultor: $Consultor <br>";

				$adesao = $linha->getElementsByTagName("Data")->item(5)->nodeValue;
				echo "Adesao: $adesao <br>";

				$chassi1 = $linha->getElementsByTagName("Data")->item(6)->nodeValue;
				echo "Chassi: $chassi1 <br>";
								
				echo "<hr>";
				
				 $sql = "SELECT idConsultor FROM consultor Where nome= '$Consultor'";
		         $results = mysqli_query($conn,$sql);
		         while ( $row = mysqli_fetch_array($results) ) {
		            $idc = $row['idConsultor'];
		         }
		         if($idc == "") $idc = 99999;
 
				  if($adesao == "SUBSTITUIÇÃO") 
				  	$subst = "Sim"; 
				  else 
				  	$subst = "Não";

				  if($adesao == "REATIVAÇÃO") 
				  	$reatv = "Sim"; 
				  else 
				  	$reatv = "Não";
			    

                $sql2 = "SELECT count(chassi) AS cha FROM producao Where chassi='$chassi1' and month(dataProposta)='$mes' and year(dataProposta)='$ano'";
		         $results2 = mysqli_query($conn,$sql2);
		         while ( $row2 = mysqli_fetch_array($results2) ) {
		            $cha = $row2['cha'];
                ///echo $pla;
		        }    			
                if($cha == 0){ 
				//Inserir o usuário no BD
				$result_usuario = "INSERT INTO producao (associado, placa, chassi, dataProposta, veiculo, idConsultor, substituicao,  reativacao, datacadA, status, usuario ) VALUES ('$associado', '$placa1', '$chassi1', '$dataProposta', '$veiculo', '$idc', '$subst', '$reatv', '$hoje', 'Ativo', 'MIGRACAO')";  
				$resultado_usuario = mysqli_query($conn, $result_usuario);
			   } 
			 
			}
			$idc = 99999;
			$primeira_linha = false;
		}
	}
  }
         echo "<script>alert(\"Dados migrados com sucesso!\");</script>";
		 echo "<script type = 'text/javascript'> location.href = 'cadProducaoMigracao.php'</script>";

?> 
</body>
</html> 