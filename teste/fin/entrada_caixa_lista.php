<?php
session_start();
//header('Content-Type: text/html; charset=utf-8');
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
  <link rel="stylesheet" type="text/css" href="css/style.css"/>
   <link rel="stylesheet" href="css/style_menu.css" type="text/css"/>
 <title>Gest&atilde;o de Finan&ccedil;as</title>
    <script type="text/javascript" src="include/jquery-1.3.2.js"></script>
        <script type="text/javascript" src="include/script.js"></script>
        <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
        <script type="text/javascript" src="include/script_menu.js"></script>
        <script type="text/javascript" src="include/micoxAjax.js"></script>
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
</head>
<body>
 
<?php 
     include "menu.php"; 
     $data = date('d/m/Y');
     $mes = date('m');
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
  if($mes == 12) $mes1 = "Dezembro";
?>
<div id="interface">
	 <h1>Entradas do Caixa de <? echo $mes1." de ".$ano; ?>
      <? if($_SESSION['nivelF'] == 0) echo "- Financeiro" ?>
        <? if($_SESSION['nivelF'] == 1) echo "- Fiscal" ?>
        <? if($_SESSION['nivelF'] == 2) echo "- Caixa" ?>
        <? if($_SESSION['nivelF'] == 3) echo "- Baixa" ?>
    </h1>
  
 <div id="caixa1"><br />
	<table id="tabela" align="center" width="100%" border="1">
   <thead>
	  <tr align="center" bgcolor="#CCCCCC">
	    <th align="center" style="width: 8%"><font color="#333333" size="1"><b>Edit/Del</b></font></th>
	    <th align="center" style="width: 8%"><font color="#333333" size="1"><b>Data</b></font></th>
		  <th align="center" style="width: 24%"><font color="#333333" size="1"><b>Associado</b></font></th>
	    <th align="center" style="width: 10%"><font color="#333333" size="1"><b>Pagamento</b></font></th>
      <th align="center" style="width: 10%"><font color="#333333" size="1"><b>Motivo</b></font></th>
	    <th align="center" style="width: 10%"><font color="#333333" size="1"><b>Recibo</b></font></th>
      <th align="center" style="width: 20%"><font color="#333333" size="1"><b>Empresa</b></font></th>
      <th align="center" style="width: 10%"><font color="#333333" size="1"><b>Valor</b></font></th>
	  </tr>
    <tr align="center" bgcolor="#CCCCCC">
      <th align="center" style="width: 8%"><input type="text" id="txtColuna1" readonly="true" size="5%"/></th>
      <th align="center" style="width: 8%"><input type="text" id="txtColuna2" size="5%"/></th>
      <th align="center" style="width: 24%"><input type="text" id="txtColuna3" size="22%"/></th>
      <th align="center" style="width: 10%"><input type="text" id="txtColuna4" size="8%"/></th>
      <th align="center" style="width: 10%"><input type="text" id="txtColuna5" size="8%"/></th>
      <th align="center" style="width: 10%"><input type="text" id="txtColuna6" size="8%"/></th>
      <th align="center" style="width: 20%"><input type="text" id="txtColuna7" size="18%"/></th>
      <th align="center" style="width: 10%"><input type="text" id="txtColuna8" size="8%"/></th>
   </tr>
	</thead>
 </table>

	<?php
		include "conexao.php";
		$ano = date("Y");
		$today = date("d/m/Y");
		$con = 1; $soma = 0;
		$sql = "select *, DATE_FORMAT(data,'%d/%m/%Y') as dat from caixa where month(data) = '$mes' order by data";
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
      $soma =  $soma + $valor;
      
			
      
			if ($con % 2 == 0)
				 $bgcolor = "bgcolor='#FFFFFF'";
			else
				 $bgcolor = "bgcolor='#FFFFCC'";
	 ?>
   <center>
    <table id="tabela" align="center" width="100%"  border="1">
     <tbody>
  	  <tr align="center" <? echo $bgcolor; ?>>
  	    <td align="center" style="width: 8%">
  		   <?
  		   echo "<a href=\"javascript:checar1('caixa_edita.php?id=".$idCaixa."');\"><img src=\"imagens/letra-e.png\" width=\"20\" border=\"0\" alt=\"Click para editar o Entrada.\" title=\"Click para editar o Entrada.\"></a>&nbsp;&nbsp;&nbsp;&nbsp;";
  		   echo "<a href=\"javascript:checar2('caixa_deleta.php?id=".$idCaixa."');\"><img src=\"imagens/letra-d.png\" width=\"20\" border=\"0\" alt=\"Click para deletar o Entrada.\" title=\"Click para deletar o Entrada.\"></a>";
  		   ?>

  		</td>
  	    <td align="center" style="width: 8%" ><font color="#333333" size="1"><b><? echo $data; ?></b></font></td>
  	    <td align="center" style="width: 24%"><font color="#333333" size="1"><b><? echo $associado; ?></b></font></td>
  	    <td align="center" style="width: 10%"><font color="#333333" size="1"><b><? echo $boleto; ?></b></font></td>
        <td align="center" style="width: 10%"><font color="#333333" size="1"><b><? echo $motivo; ?></b></font></td>
        <td align="center" style="width: 10%"><font color="#333333" size="1"><b><? echo $recibo; ?></b></font></td>
        <td align="center" style="width: 20%"><font color="#333333" size="1"><b><? echo $empresa; ?></b></font></td>
        <td class="campo" lign="right" style="width: 10%" ><font color="#333333" size="1"><b><? echo $valor; ?></b></font></td>
      </tr>
     </tbody>
	  </table>
    </center>
  <? 
   
	$con = $con + 1;
	}

	$con = $con - 1;
	$saldo = number_format(round($saldo * 2 )/ 2,2);
  $soma = number_format($soma, 2, ',', '.');
  $soma2 = "R$ ".$soma;
	?>
 </div>
    <div style="position: relative; margin-right: 100px" align="right">
         Total: <b><input id="resultado" type="text" align="right" size="10" style="color: blue; font-weight: bold;" value="<? echo $soma2; ?>" readonly /></b>
    </div>
</div>
	<footer id="footer">   
	   <?php include "footer.php"; ?>
	</footer>
</body>
</html>