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
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>GESTÃO - GLOBAL</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/navbar.css">

</head>
<body class="bg-info">
 <div class="container" id="home">
  <?php
    include ("conexao.php");
   $mes = date("m");
   $ano = date("Y");
   $_SESSION['mesc'] = $mes;
   $_SESSION['anoc'] = $ano;
   $consu = $_SESSION['co'];
 
 if(isset($_GET['consultor'])){
  $consu = $_GET['consultor']; 
  }// echo $consu;          
?>
 <table class="table table-sm mt-0 mb-0" id="tabela">
 <thead>
  <tr align="center" bgcolor="#CCCCCC">
    <th align="center" style="width: 5%"><font color="#333333" size="3"><b>Del/Stat</b></font></th> 
    <th align="center" style="width: 5%"><font color="#333333" size="3"><b>Nº</b></font></th> 
    <th align="center" style="width: 15%"><font color="#333333" size="3"><b>Associado</b></font></th>
    <th align="center" style="width: 10%"><font color="#333333" size="3"><b>Veículo</b></font></th>
    <th align="center" style="width: 8%"><font color="#333333" size="3"><b>Placa</b></font></th>
    <th align="center" style="width: 8%"><font color="#333333" size="3"><b>Proposta</b></font></th>
    <th align="center" style="width: 8%"><font color="#333333" size="3"><b>Receb.</b></font></th>
    <th align="center" style="width: 5%"><font color="#333333" size="3"><b>Rastr.</b></font></th>
    <th align="center" style="width: 8%"><font color="#333333" size="3"><b>Instal.</b></font></th>
  </tr>
  <tr align="center" bgcolor="#CCCCCC">
    <th align="center" style="width: 5%"><input type="text" id="txtColuna1" readonly="true" size="5%"/></th>
    <th align="center" style="width: 5%"><input type="text" id="txtColuna1" readonly="true" size="5%"/></th> 
    <th align="center" style="width: 15%"><input type="text" id="txtColuna4" size="15%"/></th>
    <th align="center" style="width: 10%"><input type="text" id="txtColuna5" size="10%"/></th>
    <th align="center" style="width: 8%"><input type="text" id="txtColuna6" size="10%"/></th>
    <th align="center" style="width: 8%"><input type="text" id="txtColuna7" size="10%"/></font></th>
    <th align="center" style="width: 8%"><input type="text" id="txtColuna8" size="12%"/></th>
    <th align="center" style="width: 5%"><input type="text" id="txtColuna9" size="5%"/></th>
    <th align="center" style="width: 8%"><input type="text" id="txtColuna10" size="12%"/></th>
  </tr>
 </thead>
</table>
<?php
  $saldo = 0;  $con = 1;
  $sql = "SELECT *, DATE_FORMAT(dataProposta,'%d/%m/%Y') as idataProposta, DATE_FORMAT(dataRecebimento,'%d/%m/%Y') as idataRecebimento, DATE_FORMAT(dataInstalacao,'%d/%m/%Y') as idataInstalacao FROM producao WHERE idConsultor = '$consu'  ORDER BY dataProposta DESC";
  //WHERE MONTH(dataProposta) = '$mes'
  $resultado = mysqli_query($conn,$sql) or die (mysql_error());
  while ($linha = mysqli_fetch_array($resultado)) {
        
        $idProducao = $linha['idProducao'];
        $id = $linha['idConsultor']; 
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
        $stat = $linha['status'];

 if ($con % 2 == 0)
     $bgcolor = "bgcolor='#FFFFFF'";
  else
     $bgcolor = "bgcolor='#FFFFCC'";

   if($substituicao == "Sim")
      $nomecolor = "color='red'";
    else
      $nomecolor = "color='black'";

    if($stat == "Inativo")
      $nomecolor = "color='#6699FF'";
    

?>

<table class="table table-hover table-sm mt-0 mb-0" id="tabela">
 <tbody>
  <tr align="center" <? echo $bgcolor; ?>>
    <td align="center" style="width: 5%">
       <?
       echo "<a href=\"javascript:checar2('#?id=".$idProducao."');\"><img src=\"imagens/letra-d.png\" width=\"20\" border=\"0\" alt=\"Click para deletar este item.\" title=\"Click para deletar este item.\"></a>&nbsp;&nbsp;";
      if($stat == "Ativo")
       echo "<a href=\"javascript:checar3('#?id=".$idProducao."');\"><img src=\"imagens/letra_I.png\" width=\"20\" border=\"0\" alt=\"Click para inativar este item.\" title=\"Click para inativar este item.\"></a>&nbsp;";
      else if($stat == "Inativo")
        echo "<a href=\"javascript:checar4('#?id=".$idProducao."');\"><img src=\"imagens/letra_A.png\" width=\"20\" border=\"0\" alt=\"Click para ativar este item.\" title=\"Click para ativar este item.\"></a>&nbsp;";
       ?>
    </td>
    <td align="center" style="width: 5%"><font <? echo $nomecolor; ?> size="2"><b><? echo $con; ?></b></font></td>
    <td align="center" style="width: 15%"><font <? echo $nomecolor; ?> size="2"><b><? echo $associado; ?></b></font></td>
    <td align="center" style="width: 10%"><font <? echo $nomecolor; ?> size="2"><b><? echo $veiculo; ?></b></font></td>
    <td align="center" style="width: 8%"><font <? echo $nomecolor; ?> size="2"><b><? echo $placa; ?></b></font></td>
    <td align="center" style="width: 8%"><font <? echo $nomecolor; ?> size="2"><b><? echo $dataProposta; ?></b></font></td>
    <td align="center" style="width: 8%"><font <? echo $nomecolor; ?> size="2"><b><? echo $dataRecebimento; ?></b></font></td>
    <td align="center" style="width: 5%"><font <? echo $nomecolor; ?> size="2"><b><? echo $rastreador; ?></b></font></td>
    <td align="center" style="width: 8%"><font <? echo $nomecolor; ?> size="2"><b><? echo $dataInstalacao; ?></b></font></td>
  </tr>
 </tbody>
</table>
<?
$con = $con + 1;
}
$con = $con - 1;

?>
 </div>

    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/navbar.js"></script>
    <script src="js/script.js"></script>  
</body>
</html>