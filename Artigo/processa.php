<?php

	include_once("conexao.php");
	$mes = date('m');
	$ano = date('Y');
	//$dados = $_FILES['arquivo'];
	//var_dump($dados);
	
	if(!empty($_FILES['arquivo']['tmp_name'])){
		$arquivo = new DomDocument();
		$arquivo->load($_FILES['arquivo']['tmp_name']);
		var_dump($arquivo);
		
		$linhas = $arquivo->getElementsByTagName("Row");
		var_dump($linhas);
	/*	
		$primeira_linha = true;
		
		foreach($linhas as $linha){
			 $coLi = $linha->getElementsByTagName('Data')->length;
			if($coLi == 6){
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
								
				echo "<hr>";
				
				 $sql = "SELECT idConsultor FROM consultor Where nome= '$Consultor' and status='Ativo'";
		         $results = mysqli_query($conn,$sql);
		         while ( $row = mysqli_fetch_array($results) ) {
		            $idc = $row['idConsultor'];
		         }
				  if($adesao == "SUBSTITUIÇÃO") 
				  	$subst = "Sim"; 
				  else 
				  	$subst = "Não";

				  if($adesao == "REATIVAÇÃO") 
				  	$reatv = "Sim"; 
				  else 
				  	$reatv = "Não";
			    
                  if($placa1 == "") 
				  	$placa1 = "ZERO";

                $sql2 = "SELECT count(placa) AS plac FROM tblImport Where placa='$placa1' and month(dataProposta)=8 and year(dataProposta)='$ano'";
		         $results2 = mysqli_query($conn,$sql2);
		         while ( $row2 = mysqli_fetch_array($results2) ) {
		            $pla = $row2['plac'];
                ///echo $pla;

                if($associado != "" && $pla == 0){ 
				//Inserir o usuário no BD
				$result_usuario = "INSERT INTO tblImport (associado, placa, dataProposta, veiculo, idConsultor,substituicao,  reativacao ) VALUES ('$associado', '$placa1', '$dataProposta', '$veiculo', '$idc', '$subst', '$reatv')";
				$resultado_usuario = mysqli_query($conn, $result_usuario);
			   } 
			 }
			}
			$primeira_linha = false;
		}
	}}
		 echo "<script type = 'text/javascript'> location.href = 'index.php'</script>";*/
		}
?>