<?php
session_start();
date_default_timezone_set('America/Sao_Paulo');
if (!isset($_SESSION['id'])){
    header("Location: index.php?erro=1");
    exit;
 }
 
 unset( $_SESSION['mesc'] );
 unset( $_SESSION['anoc'] );
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
<script type="text/javascript">
    function checar2(pagina) 
      { 
        if (confirm("CONFIRMA A EDIÇÃO DO ITEM?")==true) 
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
      
      function tonal2(){
               var a = document.getElementById('associado').value;
               document.location = "consProdAssociado.php?assoc="+a;
        }
   

</script>
</head>
<body>
  <?php include "cabecalho1P.php"; ?>

<div id="interface">

  <form name='form1' action='<? $myself ?>' method='get'>
   <tabel>
    <tr>
        <td><h3>Associado:</h3></td>
         <td>
           <select name="associado" id="associado" tabindex="3"> <!--onchange="tonal2();-->
            <option value="">---</option>
              <?php
                include ("conexao.php");
                $sql = "SELECT distinct(associado) FROM producao ORDER BY associado";
                $results = mysqli_query($conn,$sql);
                while ( $row = mysqli_fetch_array($results) ) {
                  echo "<option value='".$row[0]."'>".$row[0]."</option>";
                }
              ?>
          </select>
         </td>
    </tr>
   </tabel>
  <center><br />
      <table>
        <tr>
          <td colspan="4" align="center"><hr align="center" width="600" size="1" color=red></td>
        </tr>
        <tr>
          <td colspan="4" align="center"><input type="submit" size="150" value="BUSCAR"></td>  
           
        </tr>
      </table>
    </center>
  </form>
  <?php
    if(isset($_GET["associado"])){
      $assoc = $_GET["associado"];
     echo "<center><h1>CADASTROS DE:</h1></center>";
     echo "<center><h2>".$assoc."</h2></center>";
  ?>
    <center>
     <table id="tabela" align="center" width="100%" border="1">
       <thead>
        <tr align="center" bgcolor="#CCCCCC">
          <th align="center" style="width: 5%"><font color="#333333" size="3"><b>Edita</b></font></th> 
          <th align="center" style="width: 5%"><font color="#333333" size="3"><b>Nº</b></font></th> 
          <th align="center" style="width: 15%"><font color="#333333" size="3"><b>Consultor</b></font></th>
          <th align="center" style="width: 10%"><font color="#333333" size="3"><b>Regional</b></font></th>
          <th align="center" style="width: 15%"><font color="#333333" size="3"><b>Associado</b></font></th>
          <th align="center" style="width: 10%"><font color="#333333" size="3"><b>Veículo</b></font></th>
          <th align="center" style="width: 5%"><font color="#333333" size="3"><b>Placa</b></font></th>
          <th align="center" style="width: 5%"><font color="#333333" size="3"><b>Proposta</b></font></th>
          <th align="center" style="width: 5%"><font color="#333333" size="3"><b>Receb.</b></font></th>
          <th align="center" style="width: 8%"><font color="#333333" size="3"><b>Rastr.</b></font></th>
          <th align="center" style="width: 5%"><font color="#333333" size="3"><b>Instal.</b></font></th>
          <th align="center" style="width: 9%"><font color="#333333" size="3"><b>Valor</b></font></th>
        </tr>
        
       </thead>
     </table>
  
  <?
    $con = 1;
    $sql = "SELECT *, DATE_FORMAT(dataProposta,'%d/%m/%Y') as idataProposta, DATE_FORMAT(dataRecebimento,'%d/%m/%Y') as idataRecebimento, DATE_FORMAT(dataInstalacao,'%d/%m/%Y') as idataInstalacao FROM producao WHERE associado = '$assoc' ORDER BY dataProposta DESC";
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
      $rastrea = $linha['rastrea'];
      $stat = $linha['status'];
      $valor = $linha['valor'];
   
   $sql1 = "SELECT * FROM consultor WHERE idConsultor = '$id'";
   $resultado1 = mysqli_query($conn,$sql1) or die (mysql_error());
   while ($linha1 = mysqli_fetch_array($resultado1)) {
       $consultor1 = $linha1['nome'];
       $equipe1 = $linha1['equipe'];
       $regional1 = $linha1['regional'];
    }
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
      <td align="center" style="width: 5%">
       <?
       echo "<a href=\"javascript:checar2('prod_edita_assoc.php?ida=".$idProducao."');\"><img src=\"imagens/letra-e.png\" width=\"20\" border=\"0\" alt=\"Click para deletar este item.\" title=\"Click para editar este item.\"></a>&nbsp;&nbsp;";
     /* if($stat == "Ativo")
       echo "<a href=\"javascript:checar3('producao_inativa.php?id=".$idProducao."');\"><img src=\"imagens/letra_I.png\" width=\"20\" border=\"0\" alt=\"Click para inativar este item.\" title=\"Click para inativar este item.\"></a>&nbsp;";
      else if($stat == "Inativo")
        echo "<a href=\"javascript:checar4('producao_ativa.php?id=".$idProducao."');\"><img src=\"imagens/letra_A.png\" width=\"20\" border=\"0\" alt=\"Click para ativar este item.\" title=\"Click para ativar este item.\"></a>&nbsp;";*/
       ?>
      </td>
      <td align="center" style="width: 5%"><font <? echo $nomecolor; ?> size="2"><b><? echo $con; ?></b></font></td>
      <td align="center" style="width: 15%"><font <? echo $nomecolor; ?> size="2"><b><? echo $consultor1; ?></b></font></td>
      <td align="center" style="width: 10%"><font <? echo $nomecolor; ?> size="2"><b><? echo $regional1; ?></b></font></td>
      <td align="center" style="width: 15%"><font <? echo $nomecolor; ?> size="2"><b><? echo $associado; ?></b></font></td>
      <td align="center" style="width: 10%"><font <? echo $nomecolor; ?> size="2"><b><? echo $veiculo; ?></b></font></td>
      <td align="center" style="width: 5%"><font <? echo $nomecolor; ?> size="2"><b><? echo $placa; ?></b></font></td>
      <td align="center" style="width: 5%"><font <? echo $nomecolor; ?> size="2"><b><? echo $dataProposta; ?></b></font></td>
      <td align="center" style="width: 5%"><font <? echo $nomecolor; ?> size="2"><b><? echo $dataRecebimento; ?></b></font></td>
      <td align="center" style="width: 8%" onclick="editarastreo(<? echo $idProducao; ?>)" onmouseover="<? echo "Clique para editar o rastreador"; ?>><font <? echo $rastcolor; ?> size="2"><b><? echo $rastreador; ?></b></font></td>
      <td align="center" style="width: 5%"><font <? echo $nomecolor; ?> size="2"><b><? echo $dataInstalacao; ?></b></font></td>
      <td align="center" style="width: 9%" onclick="entravalor(<? echo $idProducao; ?>)" onmouseover="<? echo "Clique para editar o valor"; ?>><font <? echo $nomecolor; ?> size="2"><b><? echo $valor; ?></b></font></td>
   </tr>
 </tbody>
</table>
</center>
<?
  $con = $con + 1;
  }}
  $con = $con - 1;
?>
</div>
 <footer id="footer">   
   <?php include "footer.php"; ?>
</footer>

</body>
</html>