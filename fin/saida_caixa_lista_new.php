<?php
session_start();
date_default_timezone_set('America/Sao_Paulo');
if (!isset($_SESSION['idF'])){
    header("Location: index.php?erro=1");
    exit;
 }
 
 ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta http-equiv="Content-type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>>GLOBAL - Financeiro</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css?version=12">
  <link rel="stylesheet" href="css/navbar.css?version=12">
<script type="text/javascript">
    
    function selDeletarSangria(id){
           var i = id;
           document.location = "sangria_deleta.php?id="+i;
    }

    function selDeletarSaida(id){
           var i = id;
           document.location = "caixaSaida_deleta.php?id="+i;
    }

    function tonal(tipo){
           var a = tipo;
           document.location = "consProducao.php?tip="+a;
    }

    function mudaFoto(foto){
            document.getElementById("icone").src = foto;
    }

    function checar1(pagina) 
   { 
      if (confirm("CONFIRMA A EDICAO ?")==true) 
        { 
          window.location=pagina; 
        } 
   }

    function checar2(pagina) 
    { 
      if (confirm("CONFIRMA A EXCLUSAO ?")==true) 
        { 
          window.location=pagina; 
        } 
    }

    $(function(){
    $("#tabela input").keyup(function(){       
        var index = $(this).parent().index();
        var nth = "#tabela td:nth-child("+(index+1).toString()+")";
        var valor = $(this).val().toUpperCase();
        var soma = 0; 
        var col = 0;

        
        $("#tabela tbody tr").show();
        $(nth).each(function(){
            if($(this).text().toUpperCase().indexOf(valor) < 0){
                $(this).parent().hide();
            }
            else{ 
                  soma += parseFloat($('td:nth-child(7)', $(this).parents('tr')).text()); //parseFloat($(this).text()); 
                }
            
            var campos = $(".campo");
            //converter coleção de elementos em array.
            campos = [].slice.apply(campos);
            $(document).on("input", campos, function (event) {
              col = (campos.indexOf(event.target) + 1);
            });


           var numero = soma.toFixed(2).split('.');
           numero[0] = "R$ " + numero[0].split(/(?=(?:...)*$)/).join('.');
           numero.join(','); 
           //if(col == 8){
              $("#resultado").val(numero);
          // }
        });
    });
 
    $("#tabela input").blur(function(){
        $(this).val("");
    });
});
 
</script>
</head>
<body>
  <?php  include "menu.php"; ?>
 <div id="interface">
  <?php //if(!isset($_POST['data1'])){ ?>
     <form name='form1' action='<? $myself ?>' method='post'>
   <tabel>
    <tr>
           <td><font color="cyan"><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;SELECIONE AS DATAS:</b></font>
           
          &nbsp;&nbsp;&nbsp;&nbsp;
          <font size="5">Data Inicial:</font>&nbsp;&nbsp;&nbsp;&nbsp;
             <input type="date" name="data1" id="data1" size="15" tabindex="3"> 
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
           <font size="5">Data Final:</font>&nbsp;&nbsp;&nbsp;&nbsp;
             <input type="date" name="data2" id="data2" size="15" tabindex="3">
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
             <input type="submit" onclick="this.form.submit()">
          </td>
    <!--
           <td>
             <select name="mesc" id="mesc" onchange="this.form.submit()">
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
  -->       
    </tr>
   </tabel>
  <!-- &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="imagens/q_pret.png" width="20">&nbsp;&nbsp;<font size="5">- Normal/Ativo</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="imagens/q_verm.png" width="20">&nbsp;&nbsp;<font size="5">- Substituição</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src="imagens/q_cian.png" width="20">&nbsp;&nbsp;<font size="5">- Inativo</font>-->
  </form>  
<?php
   // }  
   if(isset($_POST['data1']))
      $data1 = $_POST['data1'];

   if(isset($_POST['data2']))
      $data2 = $_POST['data2']; 
      
   if($data2 == "") 
         $data2 = $data1;
   

   
   echo    $data1." ".$data2;       
   /*   
    $data1 =  date('d/m/Y',strtotime($data1));
    $data2 =  date('d/m/Y',strtotime($data2));    
    echo    $data1." ".$data2;
 
     $ano = date('Y');
  if(month($data) == 1) $mes1 = "Janeiro";
  if(month($data) == 2) $mes1 = "Fevereio";
  if(month($data) == 3) $mes1 = "Março";
  if(month($data) == 4) $mes1 = "Abril";
  if(month($data) == 5) $mes1 = "Maio";
  if(month($data) == 6) $mes1 = "Junho";
  if(month($data) == 7) $mes1 = "Julho";
  if(month($data) == 8) $mes1 = "Agosto";
  if(month($data) == 9) $mes1 = "Setembro";
  if(month($data) == 10) $mes1 = "Outubro";
  if(month($data) == 11) $mes1 = "Novembro";
  if(month($data) == 12) $mes1 = "Dezembro";*/
if(isset($_POST['data1'])){
?>
   <br />
	 <h1>Sa&iacute;das do Caixa de <? echo $data1." a ".$data2; ?><br /></h1>
  
 <div id="caixa1"><br />
	<table id="tabela" align="center" width="100%" border="1">
   <thead>
	  <tr align="center" bgcolor="#CCCCCC">
	    <?  if($_SESSION['nivelF'] == 10){  ?>
        <th align="center" style="width: 5%"><font color="#333333" size="2"><b>Edit</b></font></th>
        <th align="center" style="width: 5%"><font color="#333333" size="2"><b>Deletar</b></font></th>
	    <? } ?>
      <th align="center" style="width: 15%"><font color="#333333" size="1"><b>Data</b></font></th>
      <th align="center" style="width: 15%"><font color="#333333" size="1"><b>Recibo/NF</b></font></th>
		  <th align="center" style="width: 25%"><font color="#333333" size="1"><b>Benefici&aacute;rio</b></font></th>
	    <th align="center" style="width: 20%"><font color="#333333" size="1"><b>Descri&ccedil;&atilde;o</b></font></th>
      <th align="center" style="width: 15%"><font color="#333333" size="1"><b>Valor</b></font></th>
	  </tr>
    <tr align="center" bgcolor="#CCCCCC">
      <?  if($_SESSION['nivelF'] == 10){  ?>
      <th align="center" style="width: 5%"></th>
      <th align="center" style="width: 5%"></th>
      <? } ?>
      <th align="center" style="width: 15%"><input type="text" id="txtColuna3" size="10%"/></th>
      <th align="center" style="width: 15%"><input type="text" id="txtColuna4" size="10%"/></th>
      <th align="center" style="width: 25%"><input type="text" id="txtColuna5" size="20%"/></th>
      <th align="center" style="width: 20%"><input type="text" id="txtColuna6" size="15%"/></th>
      <th align="center" style="width: 15%"><input type="text" id="txtColuna7" size="10%"/></th>
   </tr>
  </thead>
 </table>

	<?php
		include "conexao.php";
		$ano = date("Y");

    $today = date("d/m/Y");
		$con = 1; $somaC = 0; $somaS = 0;
	  echo "<h2>Saídas do Caixa</h2>";
  	$sql = "select *, DATE_FORMAT(data,'%d/%m/%Y') as dat from caixasaida where data >= '$data1' and data <='$data2' order by data";
		$resultado = mysqli_query($conn,$sql) or die (mysql_error());
		while ($linha = mysqli_fetch_array($resultado)) {
    	$idCaixaSaida = $linha['idCaixaSaida'];
			$beneficiario = $linha['beneficiario'];
			$descricao = $linha['descricao'];
			$data = $linha['dat'];
      $recibo = $linha['recibo'];
      $valor = $linha['valor'];
      $valorf = number_format($valor, 2, ',', '.');
      $somaC =  $somaC + $valor;
      $valorSangria = 0;
	    $somaCf = number_format($somaC, 2, ',', '.');
      $somaCf = "R$ ".$somaCf;
			if ($con % 2 == 0)
				 $bgcolor = "bgcolor='#FFFFFF'";
			else
				 $bgcolor = "bgcolor='#FFFFCC'";
	 ?>
   <center>
     <table id="tabela" align="center" width="100%"  border="1">
      <tbody>
        <tr align="center" <? echo $bgcolor; ?>>
    	   <?  if($_SESSION['nivelF'] == 10){  ?>
          <td align="center" style="width: 5%">
    		   <?
    		   echo "<a href=\"javascript:checar1('caixaSaida_edita.php?id=".$idCaixaSaida."');\"><img src=\"imagens/letra-e.png\" width=\"20\" border=\"0\" alt=\"Click para editar o Sa&iacute;da.\" title=\"Click para editar o Sa&iacute;da.\"></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
    		   //echo "<a href=\"javascript:checar2('caixaSaida_deleta.php?id=".$idCaixaSaida."');\"><img src=\"imagens/letra-d.png\" width=\"20\" border=\"0\" alt=\"Click para deletar o Sa&iacute;da.\" title=\"Click para deletar o Sa&iacute;da.\"></a>";
    		   ?>
         </td>
         <td align="center" style="width: 5%"> 
           <input type="radio" name="dele"  onclick="selDeletarSaida(<?php echo $idCaixaSaida; ?>)">
         </td>
         <? } ?>
          <td align="center" style="width: 15%"><font color="#333333" size="1"><b><? echo $data; ?></b></font></td>
          <td align="center" style="width: 15%"><font color="#333333" size="1"><b><? echo $recibo; ?></b></font></td>
    	    <td align="center" style="width: 25%"><font color="#333333" size="1"><b><? echo $beneficiario; ?></b></font></td>
    	    <td align="center" style="width: 20%"><font color="#333333" size="1"><b><? echo $descricao; ?></b></font></td>
          <td class="campo" lign="right" style="width: 15%" ><font color="#333333" size="1"><b><? echo $valorf; ?></b></font></td>
        </tr>
      </tbody>
	   </table>
  </center>
  <? 
   $idc = $idCaixaSaida;
   $ids = $idSangria;
	$con = $con + 1;
	} 
  ?>
  <div style="position: relative; margin-right: 100px" align="right">
         Total de Saídas: <font color="blue"><b><input id="resultado" type="text" align="left" size="10" style="color: blue; font-weight: bold;" value="<? echo $somaCf; ?>" readonly /></b></font>
  </div> 
  <?
  echo "<h2>Saídas de Sangria</h2>";
  $sql2 = "select *, DATE_FORMAT(dataCaixa,'%d/%m/%Y') as dati from sangria where dataCaixa >= '$data1' and dataCaixa <='$data2' order by dataCaixa";
    $resultado2 = mysqli_query($conn,$sql2) or die (mysql_error());
    while ($linha2 = mysqli_fetch_array($resultado2)) {
      $idSangria = $linha2['idSangria'];
      $dataCaixa = $linha2['dati'];
      $valorSangria = $linha2['valor'];
      $valorSangriaf = number_format($valorSangria, 2, ',', '.');
      $somaS =  $somaS + $valorSangria;
            
      if ($con % 2 == 0)
         $bgcolor = "bgcolor='#FFFFFF'";
      else
         $bgcolor = "bgcolor='#FFFFCC'";
   ?>
     <center>
     <table id="tabela" align="center" width="100%"  border="1">
      <tbody>
       <tr align="center" <? echo $bgcolor; ?>>
         <?  if($_SESSION['nivelF'] == 10){  ?>
          <td align="center" style="width: 5%">
           <?
           echo "<a href=\"javascript:checar1('sangria_edita.php?id=".$idSangria."');\"><img src=\"imagens/letra-e.png\" width=\"20\" border=\"0\" alt=\"Click para editar o Sa&iacute;da.\" title=\"Click para editar o Sa&iacute;da.\"></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
           //echo "<a href=\"javascript:checar2('sangria_deleta.php?id=".$idSangria."');\"><img src=\"imagens/letra-d.png\" width=\"20\" border=\"0\" alt=\"Click para deletar o Sa&iacute;da.\" title=\"Click para deletar o Sa&iacute;da.\"></a>";
           ?>
          </td>
          <td align="center" style="width: 5%"> 
           <input type="radio" name="dele"  onclick="selDeletarSangria(<?php echo $idSangria; ?>)">
         </td>
          <? } ?>
          <td align="center" style="width: 15%"><font color="#333333" size="1"><b><? echo $dataCaixa; ?></b></font></td>
          <td align="center" style="width: 15%"><font color="#333333" size="1"><b><? echo " - " ?></b></font></td>
          <td align="center" style="width: 25%"><font color="#333333" size="1"><b><? echo "Financeiro" ?></b></font></td>
          <td align="center" style="width: 20%"><font color="#333333" size="1"><b><? echo "Sangria" ?></b></font></td>
          <td class="campo" lign="right" style="width: 15%" ><font color="#333333" size="1"><b><? echo $valorSangriaf; ?></b></font></td>
        </tr>
        </tbody>
     </table>
   </center>
 <?  }
	$con = $con - 1;
	$soma = $somaC + $somaS;
  $soma = number_format($soma, 2, ',', '.');
  $somaSf = number_format($somaS, 2, ',', '.');
  $somaSf = "R$ ".$somaSf;
  $soma2 = "R$ ".$soma;
?>  
  <div style="position: relative; margin-right: 100px" align="right">
         Total de Sangrias: <font color="blue"><b><input id="resultado" type="text" align="left" size="10" style="color: blue; font-weight: bold;" value="<? echo $somaSf; ?>" readonly /></b></font>
  </div>
<? }  ?>
  
 </div>
    <div style="position: relative; margin-right: 100px" align="right">
         Total Geral: <font color="blue"><b><input id="resultado" type="text" align="right" size="10" style="color: blue; font-weight: bold;" value="<? echo $soma2; ?>" readonly /></b></font>
    </div>
</div>
	<? include "footer.html"; ?>
    <script src="include/jquery-3.2.1.min.js"></script>
    <script src="include/popper.min.js"></script>
    <script src="include/bootstrap.min.js"></script>
    <script src="include/navbar.js"></script>  
</body>
</html>