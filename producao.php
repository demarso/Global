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
  <script type="text/javascript" src="include/jquery.js"></script>
  <script type="text/javascript" src="include/micoxAjax.js?version=12"></script>
  <script type="text/javascript" src="include/jquery-1.3.2.js"></script>  
  <script type="text/javascript" src="include/jquery.maskedinput-1.1.4.pack.js"></script>
  <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
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
<body>
  <?php
    include "cabecalho_prod.php";  
    //include "selectmes.php";
   $mes = date("m");
   $ano = date("Y");
   $_SESSION['mesc'] = $mes;
   $_SESSION['anoc'] = $ano;

 ?>
<div id="interface">

  <form name='form1' action='<? $myself ?>' method='post'>
   <tabel>
    <tr>
           <td><font color="cyan"><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;SELECIONE PARA CONSULTAR OUTRO MÊS:</b></font></td>
           <td><font color="yellow"><b>Mês:</b></font></td>
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
           <td><font color="yellow"><b>Ano:</b></font></td>
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
             </select>
           </td>
    </tr>
   </tabel>
  <!-- &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="imagens/q_pret.png" width="20">&nbsp;&nbsp;<font size="5">- Normal/Ativo</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="imagens/q_verm.png" width="20">&nbsp;&nbsp;<font size="5">- Substituição</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="imagens/q_cian.png" width="20">&nbsp;&nbsp;<font size="5">- Inativo</font>-->
  </form>
<?php
      
   if(isset($_POST['mesc'])){
      $mes = $_POST['mesc'];
      $ano = $_POST['anoc'];
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

 echo "<center><h1>PRODUÇÃO DE ".$mesatual." DE ".$ano."</h1></center>"; 
 echo "<img src=\"imagens/q_pret.png\" width=\"20\">&nbsp;&nbsp;<font size=\"3\">- Normal/Ativo</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src=\"imagens/q_verm.png\" width=\"20\">&nbsp;&nbsp;<font size=\"3\">- Substituição</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src=\"imagens/q_cian.png\" width=\"20\">&nbsp;&nbsp;<font size=\"3\">- Inativo</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src=\"imagens/q_verde.png\" width=\"20\">&nbsp;&nbsp;<font size=\"3\">- Reativação</font>";
  
  if($_SESSION['nivel'] == 0 || $_SESSION['nivel'] == 10){
    include "producao_geral.php";
  } 

  if($_SESSION['nivel'] == 3){
    include "producao_ver.php";
  } 
  
  if($_SESSION['nivel'] == 2 && $_SESSION['regio'] == 'NOVA IGUAÇU'){
    include "producao_novaiguacu.php";
  }
  
  if($_SESSION['nivel'] == 2 && $_SESSION['regio'] == 'ITAGUAI' || $_SESSION['regio'] == 'ITAGUAÍ'){
    include "producao_itaguai.php";
  }
   
  if($_SESSION['nivel'] == 2 && $_SESSION['regio'] == 'NILÓPOLIS' || $_SESSION['nivel'] == 2 && $_SESSION['regio'] == 'NILOPOLIS'){
   include "producao_nilopolis.php";
   
  } 
  
  if($_SESSION['nivel'] == 2 && $_SESSION['regio'] == 'INTENDENTE'){
   include "producao_intendente.php";
  }  
   
  if($_SESSION['nivel'] == 2 && $_SESSION['regio'] == 'ARARUAMA'){
   include "producao_araruama.php";
  }

 
      if($_SESSION['nivel'] == 0){
        echo "<a href='imp_prod_geral.php' target='_black'><img src='imagens/printer.png' width='100' align='left' title='Imprime Produção Geral'></a>";
      }
      if($_SESSION['nivel'] == 2 && $_SESSION['regio'] == 'NOVA IGUAÇU'){
        echo "<a href='imp_prod_novaiguacu.php' target='_black'><img src='imagens/printer.png' width='100' align='left' title='Imprime Produção Nova Iguaçu'></a>";
      }
      if($_SESSION['nivel'] == 2 && $_SESSION['regio'] == 'ITAGUAÍ' || $_SESSION['nivel'] == 2 && $_SESSION['regio'] == 'ITAGUAI'){
        echo "<a href='imp_prod_itaguai.php' target='_black'><img src='imagens/printer.png' width='100' align='left' title='Imprime Produção Itaguaí'></a>";
      }
      if($_SESSION['nivel'] == 2 && $_SESSION['regio'] == 'NILÓPOLIS'){
        echo "<a href='imp_prod_nilopolis.php' target='_black'><img src='imagens/printer.png' width='100' align='left' title='Imprime Produção Nilópolis'></a>";
      }
      if($_SESSION['nivel'] == 2 && $_SESSION['regio'] == 'INTENDENTE'){
        echo "<a href='imp_prod_intendente.php' target='_black'><img src='imagens/printer.png' width='100' align='left' title='Imprime Produção Intendente'></a>";
      }
      if($_SESSION['nivel'] == 2 && $_SESSION['regio'] == 'ARARUAMA'){
        echo "<a href='imp_prod_araruama.php' target='_black'><img src='imagens/printer.png' width='100' align='left' title='Imprime Produção Araruama'></a>";
      }
?>
</div>
 <footer id="footer">   
   <?php include "footer.php"; ?>
</footer>

</body>
</html>