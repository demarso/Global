<?php
session_start();
//header('Content-Type: text/html; charset=utf-8');
date_default_timezone_set('America/Sao_Paulo');
if (!isset($_SESSION['idF'])){
    header("Location: index.php?erro=1");
    exit;
 }
 $ano = date("Y");
 
 ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta http-equiv="Content-type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Caixa - Global</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css?version=12">
  <link rel="stylesheet" href="css/navbar.css?version=12">

</head>
<body class="bg-info">
  <?  include "menu.php"; ?>  
  <div class="container" id="home">
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
             <input type="submit" value="BUSCAR" onclick="this.form.submit()">
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
   
   if(isset($_POST['data1']))
      $data1 = $_POST['data1'];
   else
   	  $data1 = date('Y/m/d');

   if(isset($_POST['data2']))
      $data2 = $_POST['data2']; 
   else
   	  $data2 = date('Y/m/d');

   if($data2 == "") 
         $data2 = $data1;
/*      
     $ano = date('Y');
  if($mes == 1) $mes1 = "Janeiro";
  if($mes == 2) $mes1 = "Fevereio";
  if($mes == 3) $mes1 = "Março";
  if($mes == 4) $mes1 = "Abril";
  if($mes == 5) $mes1 = "Maio";
  if($mes == 6) $mes1 = "Junho";
  if($mes == 7) $mes1 = "Julho";
  if($mes == 8) $mes1 = "Agosto";
  if($mes == 9) $mes1 = "Setembro";
  if($mes == 10) $mes1 = "Outubro";
  if($mes == 11) $mes1 = "Novembro";
  if($mes == 12) $mes1 = "Dezembro";*/
  
?>

  <h1>Entradas do Caixa de <? echo date('d/m/Y',strtotime($data1))." a ".date('d/m/Y',strtotime($data2)) ?></h1>
 <div id="caixa1a">
	<table class="table table-sm mt-0 mb-0" id="tabela">
   <thead>
	  <tr align="center" bgcolor="#CCCCCC">
	    <th align="center" style="width: 8%"><font color="#333333" size="1"><b>Alterar</b></font></th>
    	<th align="center" style="width: 8%"><font color="#333333" size="1"><b>Data</b></font></th>
		<th align="center" style="width: 24%"><font color="#333333" size="1"><b>Associado</b></font></th>
	    <th align="center" style="width: 10%"><font color="#333333" size="1"><b>Pagamento</b></font></th>
        <th align="center" style="width: 10%"><font color="#333333" size="1"><b>Motivo</b></font></th>
	    <th align="center" style="width: 10%"><font color="#333333" size="1"><b>Recibo/NF</b></font></th>
        <th align="center" style="width: 20%"><font color="#333333" size="1"><b>Empresa</b></font></th>
        <th align="center" style="width: 10%"><font color="#333333" size="1"><b>Valor</b></font></th>
	  </tr>
    <tr align="center" bgcolor="#CCCCCC">
     
      <th align="center" style="width: 8%"></th>
      
      <th align="center" style="width: 8%"></th>
      <th align="center" style="width: 24%"><input type="text" id="txtColuna3" size="18%"/></th>
      <th align="center" style="width: 10%"><input type="text" id="txtColuna4" size="4%"/></th>
      <th align="center" style="width: 10%"><input type="text" id="txtColuna5" size="4%"/></th>
      <th align="center" style="width: 10%"><input type="text" id="txtColuna6" size="4%"/></th>
      <th align="center" style="width: 20%"><input type="text" id="txtColuna7" size="14%"/></th>
      <th align="center" style="width: 10%"><input type="text" id="txtColuna8" size="4%"/></th>
   </tr>
	</thead>
 </table>

	<?php
		include "conexao.php";
		
		$today = date("d/m/Y");
    $dataH = date('Y/m/d');
		$con = 1; $soma = 0;
		$sql = "SELECT *, DATE_FORMAT(data,'%d/%m/%Y') as dat FROM caixa WHERE data >= '$data1' AND data <='$data2' ORDER BY recibo ASC";
		$resultado = mysqli_query($conn,$sql) or die (mysql_error());
		while ($linha = mysqli_fetch_array($resultado)) {
    
			$idCaixa = $linha['idCaixa'];
      $empresa = $linha['empresa'];
			$associado = $linha['associado'];
			$boleto = $linha['boleto'];
			$motivo = $linha['motivo'];
			$recibo = $linha['recibo'];
      $descricao = $linha['descricao'];
      $data = $linha['dat'];
      $valor = $linha['valor'];
      $valorf = number_format($valor, 2, ',', '.');
      $soma =  $soma + $valor;
      
			
      
			if ($con % 2 == 0)
				 $bgcolor = "bgcolor='#FFFFFF'";
			else
				 $bgcolor = "bgcolor='#FFFFCC'";
	 ?>
   <center>
    <table class="table table-hover table-sm mt-0 mb-0" id="tabela">
     <tbody>
     
  	  <tr align="center" <? echo $bgcolor; ?>>
  	    <td align="center" style="width: 8%">
  		   <?
  		  // echo "<a href=\"javascript:checar1('caixa_edita.php?id=".$idCaixa."');\"><img src=\"imagens/letra-e.png\" width=\"20\" border=\"0\" alt=\"Click para editar o Entrada.\" title=\"Click para editar o Entrada.\"></a>&nbsp;&nbsp;&nbsp;&nbsp;";
  		   echo "<a href=\"javascript:checar2('caixa_deleta.php?id=".$idCaixa."');\"><img src=\"imagens/letra-d.png\" width=\"20\" border=\"0\" alt=\"Click para deletar o Entrada.\" title=\"Click para deletar o Entrada.\"></a>";
  		   ?>
  		</td>
  	    <td align="center" style="width: 8%" ><font color="#333333" size="1"><b><? echo $data; ?></b></font></td>
  	    <td align="center" style="width: 24%"><font color="#333333" size="1"><b><? echo $associado; ?></b></font></td>
  	    <td align="center" style="width: 10%"><font color="#333333" size="1"><b><? echo $boleto; ?></b></font></td>
        <td align="center" style="width: 10%"><font color="#333333" size="1"><b><? echo $motivo; ?></b></font></td>
        <td align="center" style="width: 10%"><font color="#333333" size="1"><b><? echo $recibo; ?></b></font></td>
        <td align="center" style="width: 20%"><font color="#333333" size="1"><b><? echo $empresa; ?></b></font></td>
        <td class="campo" lign="right" style="width: 10%" ><font color="#333333" size="1"><b><? echo $valorf; ?></b></font></td>
      </tr>
     </tbody>
	  </table>
    </center>
  <? 
   
	$con = $con + 1;
	}

	$con = $con - 1;
	$saldo = number_format(round($saldo * 2 )/ 2,2);
  $soma2 = number_format($soma, 2, ',', '.');
  $soma2 = "R$ ".$soma2;

   // $sql = "UPDATE caixaSaldo SET valor='$soma' where data='$dataH'";
   // $result = @mysqli_query($conn,$sql);
	?>
 </div>
    <div style="position: relative; margin-right: 100px" align="right">
         Total: <b><input id="resultado" type="text" align="right" size="10" style="color: blue; font-weight: bold;" value="<? echo $soma2; ?>" readonly /></b>
    </div>
</div>

	 <script src="include/jquery-3.2.1.min.js"></script>
    <script src="include/popper.min.js"></script>
    <script src="include/bootstrap.min.js"></script>
    <script src="include/navbar.js"></script>
    <script src="include/script.js"></script>
    <script type="text/javascript">
    function tonal(tipo){
           var a = tipo;
           document.location = "consProducao.php?tip="+a;
    }

    function mudaFoto(foto){
            document.getElementById("icone").src = foto;
    }

    function checar1(pagina) 
   { 
      if (confirm("CONFIRMA A EDICAO DA ENTRADA DO CAIXA?")==true) 
        { 
          window.location=pagina; 
        } 
   }

    function checar2(pagina) 
    { 
      if (confirm("CONFIRMA A EXCLUSAO DA ENTRADA DO CAIXA?")==true) 
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
              soma += parseFloat($('td:nth-child(8)', $(this).parents('tr')).text()); //parseFloat($(this).text()); 
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
</body>
</html>