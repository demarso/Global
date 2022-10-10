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
  <link rel="stylesheet" type="text/css" href="css/forms.css"/>
  <title>Gestão de Propostas</title>
  <script type="text/javascript" src="include/jquery-1.3.2.js"></script>
  <script type="text/javascript" src="include/jquery-latest.min.js"></script>
  <script type="text/javascript" src="include/script_menu.js"></script>
  <script type="text/javascript" src="include/jquery.maskedinput-1.1.4.pack.js"></script>
  <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
<script type="text/javascript">
      
      $(document).ready(function(){
          $("#myInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#tabela tr").filter(function() {
              $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
          });
        });

      function mudaFoto(foto){
        document.getElementById("icone").src = foto;
      }

      function checar2(pagina) 
      { 
        if (confirm("CONFIRMA A EXCLUSAO DO ITEM?")==true) 
          { 
            window.location=pagina; 
          } 
      }

      function checar3(pagina) 
      { 
        if (confirm("CONFIRMA A INATIVAÇÃO DO ITEM?")==true) 
          { 
            window.location=pagina; 
          } 
      }

      function checar4(pagina) 
      { 
        if (confirm("CONFIRMA A ATIVAÇÃO DO ITEM?")==true) 
          { 
            window.location=pagina; 
          } 
      }

</script>
</head>
<body>
 <br />
 <input class="form-control input-group-lg" id="myInput" type="text" placeholder="Digite aqui a sua busca...">
 <center>
 <center>
 <table id="tabela" align="center" width="100%" border="1">
 </thead>
  <tr align="center" bgcolor="#CCCCCC">
    <th align="center" style="width: 10%"><font color="#333333" size="3"><b>Nº</b></font></th> 
    <th align="center" style="width: 15%"><font color="#333333" size="3"><b>Consultor</b></font></th>
    <th align="center" style="width: 10%"><font color="#333333" size="3"><b>Regional</b></font></th>
    <th align="center" style="width: 15%"><font color="#333333" size="3"><b>Associado</b></font></th>
    <th align="center" style="width: 10%"><font color="#333333" size="3"><b>Veículo</b></font></th>
    <th align="center" style="width: 8%"><font color="#333333" size="3"><b>Placa</b></font></th>
    <th align="center" style="width: 8%"><font color="#333333" size="3"><b>Proposta</b></font></th>
    <th align="center" style="width: 8%"><font color="#333333" size="3"><b>Receb.</b></font></th>
    <th align="center" style="width: 5%"><font color="#333333" size="3"><b>Rastr.</b></font></th>
    <th align="center" style="width: 8%"><font color="#333333" size="3"><b>Instal.</b></font></th>
  </tr>
<!-- <tr align="center" bgcolor="#CCCCCC">
    <th align="center" style="width: 10%"><input type="text" id="txtColuna1" readonly="true" size="5%"/></th> 
    <th align="center" style="width: 15%"><input type="text" id="txtColuna2" size="15%"/></th>
    <th align="center" style="width: 10%"><input type="text" id="txtColuna3" size="10%"/></th>
    <th align="center" style="width: 15%"><input type="text" id="txtColuna4" size="15%"/></th>
    <th align="center" style="width: 10%"><input type="text" id="txtColuna5" size="10%"/></th>
    <th align="center" style="width: 8%"><input type="text" id="txtColuna6" size="10%"/></th>
    <th align="center" style="width: 8%"><input type="text" id="txtColuna7" size="10%"/></font></th>
    <th align="center" style="width: 8%"><input type="text" id="txtColuna8" size="12%"/></th>
    <th align="center" style="width: 5%"><input type="text" id="txtColuna9" size="5%"/></th>
    <th align="center" style="width: 8%"><input type="text" id="txtColuna10" size="12%"/></th>
  </tr>-->
 </thead>
</table>

<?php
include "conexao.php";
$ano = date("Y"); //$_SESSION['ano1']
$dia = date("d");
$mes = date("m"); //$_SESSION['mes1'];
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
    

?>

<table id="tabela" align="center" width="100%"  border="1">
 <tbody>
  <tr align="center" <? echo $bgcolor; ?>>
   <td align="center" style="width: 10%"><font <? echo $nomecolor; ?> size="2"><b><? echo $con; ?></b></font></td>
    <td align="center" style="width: 15%"><font <? echo $nomecolor; ?> size="2"><b><? echo $consultor1; ?></b></font></td>
    <td align="center" style="width: 10%"><font <? echo $nomecolor; ?> size="2"><b><? echo $regional1; ?></b></font></td>
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
</center>
<?
$con = $con + 1;
}}
$con = $con - 1;

?>

</body>
</html>