<?php
/*session_start();
date_default_timezone_set('America/Sao_Paulo');
if (!isset($_SESSION['id'])){
    header("Location: index.php?erro=1");
    exit;
 }
 if($_SESSION['nivel'] != 0 && $_SESSION['nivel'] != 10){
     echo "<script>alert('Voce nao tem permissao para acessar esta pagina!');history.back(-1);</script>";
     exit;
  }*/
 ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <title>MIGRAÇÃO EXCEL</title>
  <meta http-equiv="Content-type" content="text/html; charset=UTF-8"/>
  <link rel="stylesheet" type="text/css" href="css/estilo.css?version=12"/>
  <link rel="stylesheet" href="css/style_menu.css?version=12" type="text/css"/>
  <link rel="stylesheet" type="text/css" href="jquery-ui-1.10.3/themes/base/jquery.ui.all.css"/>
  <script type="text/javascript" src="include/script_menu.js"></script>
  <script language="JavaScript"> 
    function pergunta(){ 
       if (confirm('Tem certeza que quer enviar este arquivo?')){ 
          document.form1.submit() 
       } 
    } 
</script>
</head>
<body>
<?php include "cabecalho1P.php";  ?>
<div id="interface">
   
 <form name='form1' action='<? $myself ?>' method='post'>
    <font size="5" color="blue">MIGRAÇÃO DE ARQUIVO EXCEL PARA O CAD</font><br /><br />
   <tabel>
    <tr>
           <td><font color="blue" size="5"><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;SELECIONE PARA MIGRAÇÃO:</b></font></td>
           <td><font color="yellow" size="5"><b>Mês:</b></font></td>
           <td>
             <select name="mesc" id="mesc">
              <option value=""> - - -</option>
              <option value="1">JANEIRO</option>
              <option value="2">FEVEREIRO</option>
              <option value="3">MARÇO</option>
              <option value="4">ABRIL</option>
              <option value="5">MAIO</option>
              <option value="6">JUNHO</option>
              <option value="7">JULHO</option>
              <option value="8">AGOSTO</option>
              <option value="9">SETEMBRO</option>
              <option value="10">OUTUBRO</option>
              <option value="11">NOVEMBRO</option>
              <option value="12">DEZEMBRO</option>
             </select>
           </td>
           <td>&nbsp;&nbsp;&nbsp;</td>
           <td><font color="yellow" size="5"><b>Ano:</b></font></td>
           <td>
             <select name="anoc" id="anoc" onchange="this.form.submit()">
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
              <option value="2021">2026</option>
              <option value="2022">2027</option>
              <option value="2023">2028</option>
              <option value="2024">2029</option>
              <option value="2025">2030</option>
             </select>
           </td>
    </tr>
   </tabel>
  <!-- &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="imagens/q_pret.png" width="20">&nbsp;&nbsp;<font size="5">- Normal/Ativo</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="imagens/q_verm.png" width="20">&nbsp;&nbsp;<font size="5">- Substituição</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="imagens/q_cian.png" width="20">&nbsp;&nbsp;<font size="5">- Inativo</font>-->
  </form>
<br /><br />
  <? if(isset($_POST['mesc'])) { 
   $mes = $_POST['mesc'];
   $ano = $_POST['anoc'];

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

    echo "<center><h1>MIGRAÇÃO DE ".$mesatual." DE ".$ano."</h1></center>"; 
 ?>  
    <h1>Inclusão de arquivo do Excel</h1>
    <img src="imagens/importante.jpg" width="150"><br>
    <font size="5" color="yellow">Os compos do arquivo excel, devem ser:</font>
    <font size="5" color="black"> Nome, Placa, Data Contrato, Modelo, Voluntário, Tipo Adesão, Chassi.</font><br>
    <font size="5" color="yellow"> * * * O ARQUIVO NÃO PODE CONTER CÉLULAS EM BRANCO * * *</font>
    <h2>Antes de enviar o arquivo, abra o arquivo com a extensão (.xls) ou (.xlsx) com o Excel,</h2>
    <h2>clique em (Arquivo/Salva como), escolha o tipo [Planilha XML 2003 (*.xml)], clique em (Savar).</h2>
    <h2>Agora, escolha abaixo, esse novo arquivo com a extensão (.xml).</h2>
    <h2>Agora sim, pode enviar!</h2>
    <br />

    <form name="form1" method="POST" action="cadProducaoComparaOK.php" enctype="multipart/form-data">
      <label>Mês:</label>&nbsp;&nbsp;&nbsp;
      <input type="text" name="mesc" id="mesc" value="<? echo $mes; ?>" size="3" readonly="true"><br>
      <label>Ano:</label>&nbsp;&nbsp;&nbsp;
      <input type="text" name="anoc" id="anoc" value="<? echo $ano; ?>" size="5" readonly="true"><br>
      <label>Escolha o Arquivo</label>&nbsp;&nbsp;&nbsp;
      <input type="file" name="arquivo"><br><br>
      <input type="submit" onclick="pergunta()" value="E N V I A R">
    </form>
   <? } ?>
   <br><br>
</div>
   <footer id="footer">   
    <?php include "footer.php"; ?>
   </footer>

</body>
</html>