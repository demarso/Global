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
  <link rel="stylesheet" href="css/estilo.css?version=12" type="text/css"/>
  <link rel="stylesheet" href="css/styles_menu.css" type="text/css"/>
  <script type="text/javascript" src="include/jquery-1.3.2.js"></script>
  <script type="text/javascript" src="include/jquery-latest.min.js"></script>
  <script type="text/javascript" src="include/script_menu.js"></script>
  <script type="text/javascript" src="include/jquery.maskedinput-1.1.4.pack.js"></script>
  <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
  <title>Gestão de Propostas</title>
 <script type="text/javascript">

       $(document).ready(function(){
          $("#myInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#tabela tr").filter(function() {
              $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
          });
        });
    
    
    function entravalor(x) 
      { 
        window.open("cadValor.php?val="+x)
      }

       function reserva(x) 
      { 
        window.open("cadReserva.php?val="+x)
      }
 
    function editarastreo(x) 
      { 
        window.open("editarastreo.php?val="+x)
      }
      
 </script>

</head>
<body>
 <br />
 <input class="form-control input-group-lg" id="myInput" type="text" placeholder="Digite aqui a sua busca...">
 <center>
 <table id="tabela" align="center" width="100%" border="1">
 </thead>
  <tr align="center" bgcolor="#CCCCCC">
    <th align="center" style="width: 5%"><font color="#333333" size="3"><b>Del/Stat</b></font></th> 
    <th align="center" style="width: 5%"><font color="#333333" size="3"><b>Cód. Consultor</b></font></th> 
    <th align="center" style="width: 15%"><font color="#333333" size="3"><b>Consultor</b></font></th>
    <th align="center" style="width: 15%"><font color="#333333" size="3"><b>Associado</b></font></th>
    <th align="center" style="width: 10%"><font color="#333333" size="3"><b>Veículo</b></font></th>
    <th align="center" style="width: 8%"><font color="#333333" size="3"><b>Placa</b></font></th>
    <th align="center" style="width: 8%"><font color="#333333" size="3"><b>Proposta</b></font></th>
    <th align="center" style="width: 8%"><font color="#333333" size="3"><b>Receb.</b></font></th>
    <th align="center" style="width: 5%"><font color="#333333" size="3"><b>Rastr.</b></font></th>
    <th align="center" style="width: 8%"><font color="#333333" size="3"><b>Instal.</b></font></th>
    <th align="center" style="width: 8%"><font color="#333333" size="3"><b>Reserva</b></font></th>
  </tr>
<!--  <tr align="center" bgcolor="#CCCCCC">
    <th align="center" style="width: 5%"><input type="text" id="txtColuna1" readonly="true" size="3%"/></th>
    <th align="center" style="width: 5%"><input type="text" id="txtColuna1" readonly="true" size="3%"/></th> 
    <th align="center" style="width: 15%"><input type="text" id="txtColuna2" size="10%"/></th>
    <th align="center" style="width: 15%"><input type="text" id="txtColuna3" size="10%"/></th>
    <th align="center" style="width: 10%"><input type="text" id="txtColuna4" size="8%"/></th>
    <th align="center" style="width: 8%"><input type="text" id="txtColuna5" size="6%"/></th>
    <th align="center" style="width: 8%"><input type="text" id="txtColuna6" size="6%"/></font></th>
    <th align="center" style="width: 8%"><input type="text" id="txtColuna7" size="6%"/></th>
    <th align="center" style="width: 5%"><input type="text" id="txtColuna8" size="4%"/></th>
    <th align="center" style="width: 8%"><input type="text" id="txtColuna9" size="6%"/></th>
    <th align="center" style="width: 8%"><input type="text" id="txtColuna10" size="8%"/></th>
  </tr>-->
 </thead>
</table>

<?php
include "conexao.php";
$ano = date("Y");
$dia = date("d");
$mes = date("m");
if(isset($_SESSION['mesc'])){
      $mes = $_SESSION['mesc'];
      $ano = $_SESSION['anoc'];
  }

$saldo = 0;  $con = 1;
//echo $dia." / ".$mes." / ".$ano;

$sql = "SELECT *, DATE_FORMAT(dataProposta,'%d/%m/%Y') as idataProposta, DATE_FORMAT(dataRecebimento,'%d/%m/%Y') as idataRecebimento, DATE_FORMAT(dataInstalacao,'%d/%m/%Y') as idataInstalacao FROM producao WHERE MONTH(dataProposta) = '$mes' AND YEAR(dataProposta) = '$ano' ORDER BY dataProposta DESC";
//WHERE MONTH(dataProposta) = '$mes'
$resultado = mysqli_query($conn,$sql) or die (mysql_error());
while ($linha = mysqli_fetch_array($resultado)) {
      
      $idProducao = $linha['idProducao'];
      $id = $linha['idConsultor']; 
      $associado = $linha['associado']; 
      $veiculo = $linha['veiculo'];
      $placa = $linha['placa'];
      $reserva = $linha['reserva']; 
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
   
   $sql1 = "SELECT * FROM consultor WHERE idConsultor = '$id'";
   $resultado1 = mysqli_query($conn,$sql1) or die (mysql_error());
   while ($linha1 = mysqli_fetch_array($resultado1)) {
       $consultor1 = $linha1['nome'];
       $equipe1 = $linha1['equipe'];
       $regional1 = $linha1['regional'];

//echo $id." ".$consultor1." ".$associado." ".$equipe1." ".$reginal1." ".$dataProposta;

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
  /* 
    if($rastrea == "Sim" && $rastreador == "" || $rastrea == "" && $rastreador == "")
         $rastreador = "Agendar";
    
    if($rastrea == "Não")  
        $rastreador = "Sem Rastreio";*/

    if($rastreador == "Instalado")
      $rastcolor = "color='blue'";
    else
      $rastcolor = "color='black'"; 

      if($reserva != "Não" && $reserva != "-")
      $reserva = $reserva." Dias'"; 

if($regional1 == 'ARARUAMA'){
?>

<table id="tabela" align="center" width="100%"  border="1">
 <tbody>
  <tr align="center" <? echo $bgcolor; ?>>
   <td align="center" style="width: 5%">
       <?
       echo "<a href=\"javascript:checar2('producao_deleta.php?id=".$idProducao."');\"><img src=\"imagens/letra-d.png\" width=\"20\" border=\"0\" alt=\"Click para deletar este item.\" title=\"Click para deletar este item.\"></a>&nbsp;&nbsp;";
      if($stat == "Ativo")
       echo "<a href=\"javascript:checar3('producao_inativa.php?id=".$idProducao."');\"><img src=\"imagens/letra_I.png\" width=\"20\" border=\"0\" alt=\"Click para inativar este item.\" title=\"Click para inativar este item.\"></a>&nbsp;";
      else if($stat == "Inativo")
        echo "<a href=\"javascript:checar4('producao_ativa.php?id=".$idProducao."');\"><img src=\"imagens/letra_A.png\" width=\"20\" border=\"0\" alt=\"Click para ativar este item.\" title=\"Click para ativar este item.\"></a>&nbsp;";
       ?>
    </td>
    <td align="center" style="width: 5%"><font <? echo $nomecolor; ?> size="2"><b><? echo $id; ?></b></font></td>
    <td align="center" style="width: 15%"><font <? echo $nomecolor; ?> size="2"><b><? echo $consultor1; ?></b></font></td>
    <td align="center" style="width: 15%"><font <? echo $nomecolor; ?> size="2"><b><? echo $associado; ?></b></font></td>
    <td align="center" style="width: 10%"><font <? echo $nomecolor; ?> size="2"><b><? echo $veiculo; ?></b></font></td>
    <td align="center" style="width: 8%"><font <? echo $nomecolor; ?> size="2"><b><? echo $placa; ?></b></font></td>
    <td align="center" style="width: 8%"><font <? echo $nomecolor; ?> size="2"><b><? echo $dataProposta; ?></b></font></td>
    <td align="center" style="width: 8%"><font <? echo $nomecolor; ?> size="2"><b><? echo $dataRecebimento; ?></b></font></td>
    <td align="center" style="width: 5%" onclick="editarastreo(<? echo $idProducao; ?>)" onmouseover="<? echo "Clique para editar o rastreador"; ?>><font <? echo $rastcolor; ?> size="2"><b><? echo $rastreador; ?></b></font></td>
    <td align="center" style="width: 8%"><font <? echo $nomecolor; ?> size="2"><b><? echo $dataInstalacao; ?></b></font></td>
    <td align="center" style="width: 8%" onclick="reserva(<? echo $idProducao; ?>)" onmouseover="<? echo 'Clique para adicionar carro reserva'; ?>"><font <? echo $nomecolor; ?> size="2"><b><? echo $reserva; ?></b></font></td>
 <!--   <td align="center" style="width: 10%" onclick="entravalor(<? //echo $idProducao; ?>)" onmouseover="<? //echo "Clique para adicionar o valor"; ?>><font <? //echo $nomecolor; ?> size="2"><b><? //echo $valor; ?></b></font></td>-->
  </tr>
 </tbody>
</table>
</center>
<?
$con = $con + 1;
}}}
$con = $con - 1;
unset( $_SESSION['mesc'] );
unset( $_SESSION['anoc'] );
?>

</body>
</html>