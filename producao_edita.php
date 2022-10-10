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
  <link rel="stylesheet" href="css/style_menu.css" type="text/css"/>
        <script type="text/javascript" src="include/jquery-1.3.2.js"></script>
        <script type="text/javascript" src="include/script.js"></script>
        <script type="text/javascript" src="include/jquery-latest.min.js"></script>
        <script type="text/javascript" src="include/script_menu.js"></script>

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
   include "cabecalho_prod.php";  
    
   $id = $_GET['id'];

   include 'conexao.php';

  $sql = "SELECT *, DATE_FORMAT(dataProposta,'%d/%m/%Y') as idataProposta, DATE_FORMAT(dataRecebimento,'%d/%m/%Y') as idataRecebimento, DATE_FORMAT(dataInstalacao,'%d/%m/%Y') as idataInstalacao FROM producao WHERE idProducao = '$id'";
    $resultado = mysqli_query($conn,$sql) or die (mysql_error());
    while ($linha = mysqli_fetch_array($resultado)) {
          
          $idProducao = $linha['idProducao'];
          $id = $linha['idConsultor'];
          $id = str_pad( $id, 4, '0', STR_PAD_LEFT); 
          $associado = $linha['associado']; 
          $veiculo = $linha['veiculo'];
          $placa = $linha['placa']; 
          $dataProposta = $linha['idataProposta'];
          $dataRecebimento = $linha['idataRecebimento']; 
          $substituicao = $linha['substituicao']; 
          $migracao = $linha['migracao']; 
          $vistoria = $linha['vistoria'];
          $pendencia = $linha['pendencia']; 
          $obsProducao = $linha['obsprod']; 
          $rastreador = $linha['rastreador']; 
          $dataInstalacao = $linha['idataInstalacao']; 
          $localInstalacao = $linha['local']; 
          $equipamento = $linha['equipamento']; 
          $instalador = $linha['instalador'];
          $corte = $linha['corte']; 
          $ship = $linha['chip']; 
          $obsInstalacao = $linha['obsinst'];
          $rastrea = $linha['rastrea'];
          $stat = $linha['status'];
          $valor = $linha['valor'];

?>
  <center>
   <br />
   <form name="form1" method="post" action="producao_editaOK.php" >
    <h1>Alaterar o Consultor em uma Proposta</h1>
   <table border="1">
      <tr>
       <td><font size='3'>id Prod:</font></td>
       <td><input type="text" name="idp" id='idp' value="<? echo $idProducao; ?>" readonly></td>
     </tr>
      <tr>
        <td><font size='3'>Consultor Novo:</font></td>
        <td>
          <select name="consultor" id="consultor">
            <option value="">---</option>
              <?php
                
                $sql = "SELECT idConsultor, nome FROM consultor WHERE status='Ativo' ORDER BY nome";
                $results = mysqli_query($conn,$sql);
                while ( $row = mysqli_fetch_array($results) ) {
                  echo "<option value='".$row[0]."'>".$row[1]."</option>";
                }
              ?>
          </select>
         </td>
       </tr>
       <tr>
       <td colspan="2" align="center">
         <input type="submit" value="Atualizar">   
       </td>
       </tr>
      </table>
   </form>
   </center>
   <br /><br />


<? } ?>
    <footer id="footer">   
      <?php include "footer.php"; ?>
    </footer>
</div>
</body>
</html>