<?php
session_start();
date_default_timezone_set('America/Sao_Paulo');
if($_SESSION['nome'] != "Vivian Martins" && $_SESSION['nome'] != "Denilson Soares" && $_SESSION['nome'] != "MARIANNE COSTA" && $_SESSION['nome'] != "JOSE EDUARDO SOARES SALDANHA"){
   echo "<script>alert('Você não tem permissão para acessar está página!');</script>";
   echo "<script language=\"javascript\">window.close();</script>";
   exit;
 }
 
 unset( $_SESSION['mesc'] );
 unset( $_SESSION['anoc'] );
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
  
<script type="text/javascript">
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
<body class="bg-info">
 <?  include "menu.php"; ?>  
<div class="container" id="home">
  <?php
    include ("conexao.php");
   $mes = date("m");
   $ano = date("Y");
   $_SESSION['mesc'] = $mes;
   $_SESSION['anoc'] = $ano;

   ?>
  <div class="row">
    <div class="col-12 mt-4 mb-1"> 
      <form class="form-inline" name='form1' action='<? $myself ?>' method='post'>
        <div class="form-group row mt-1 mb-1">
          <label class="col-sm-4 col-form-label mr-0" for="consultor"><b>Selecione o Consultor:</b></label>
          <div class="col-md-3">
            <select class="form-control ml-0" name="consultor" id="consultor">
                <option value="">---</option>
                  <?php
                    
                    $sql = "SELECT idConsultor, nome FROM consultor WHERE status='Ativo' ORDER BY nome";
                    $results = mysqli_query($conn,$sql);
                    while ( $row = mysqli_fetch_array($results) ) {
                      echo "<option value='".$row[0]."'>".$row[1]."</option>";
                    }
                  ?>
            </select>
          </div>
        </div>   
        <div class="form-group row mt-1 mb-1 ml-5">
          <label class="col-sm-2 col-form-label" for="anoc"><b>Ano:</b></label>
          <div class="col-md-3">
               <select class="form-control" name="anoc" id="anoc" onchange="this.form.submit()">
                <option value=""> - - -</option>
                <option value="2017">2017</option>
                <option value="2018">2018</option>
                <option value="2019">2019</option>
                <option value="2020">2020</option>
                <option value="2021">2021</option>
                <option value="2022">2022</option>
                <option value="2023">2023</option>
                <option value="2024">2024</option>
                <option value="2025">2025</option>
                <option value="2025">2026</option>
                <option value="2025">2027</option>
                <option value="2025">2028</option>
                <option value="2025">2029</option>
                <option value="2025">2030</option>
               </select>
          </div>
        </div>    
      <!-- &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="imagens/q_pret.png" width="20">&nbsp;&nbsp;<font size="5">- Normal/Ativo</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="imagens/q_verm.png" width="20">&nbsp;&nbsp;<font size="5">- Substituição</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="imagens/q_cian.png" width="20">&nbsp;&nbsp;<font size="5">- Inativo</font>-->
      </form>
    </div>
  </div>    
  <?php
 /*     
   if(isset($_POST['mesc'])){
      $mes = $_POST['mesc'];
      $ano = $_POST['anoc'];
      $consu = $_POST['consultor'];
      $_SESSION['mesc'] = $mes;
      $_SESSION['anoc'] = $ano;
   }

   if($mes == 1) $mesatual = "JANEIRO";
   if($mes == 2) $mesatual = "FEVEREIRO";
   if($mes == 3) $mesatual = "MARÇO";
   if($mes == 4) $mesatual = "ABRIL";
   if($mes == 5) $mesatual = "MAIO";
   if($mes == 6) $mesatual = "JUNHO";
   if($mes == 7) $mesatual = "JULHO";
   if($mes == 8) $mesatual = "AGOSTO";
   if($mes == 9) $mesatual = "SETEMBRO";
   if($mes == 10) $mesatual = "OUTUBRO";
   if($mes == 11) $mesatual = "NOVEMBRO";
   if($mes == 12) $mesatual = "DEZEMBRO";

 echo "<center><h1>PRODUÇÃO DE ".$mesatual." DE ".$ano."</h1></center>"; */
 if(isset($_POST['consultor'])){
  $consu = $_POST['consultor'];
  $anoc = $_POST['anoc']; 
  include ("conexao.php");
  $sql = "SELECT nome FROM consultor WHERE idConsultor = '$consu'";
       $resultado = mysqli_query($conn,$sql) or die (mysql_error());
       while ($linha = mysqli_fetch_array($resultado)) {
                 $nomec = $linha['nome'];
                }
 echo "<center><h2>CONSULTOR: ".$nomec."</h2></center>";                
  ?>
  <br />
 <center>
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
  $sql = "SELECT *, DATE_FORMAT(dataProposta,'%d/%m/%Y') as idataProposta, DATE_FORMAT(dataRecebimento,'%d/%m/%Y') as idataRecebimento, DATE_FORMAT(dataInstalacao,'%d/%m/%Y') as idataInstalacao FROM producao WHERE idConsultor = '$consu' AND YEAR(dataProposta) = '$anoc' ORDER BY dataProposta DESC";
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
  </center>
  <?
  $con = $con + 1;
  }}
  $con = $con - 1;

  ?>
</div>
 <? include "footer.html"; ?>
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/navbar.js"></script>
    <script src="js/script.js"></script>  
</body>
</html>