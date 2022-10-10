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
 <title>Gest&atilde;o de Finan&ccedil;as</title>
    <script type="text/javascript" src="include/jquery-1.7.2.min.js"></script>
    <script type="text/javascript" src="include/script.js"></script> 
    <script type="text/javascript" src="include/jquery.js"></script>
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
      if (confirm("CONFIRMA A EDICAO DO BANCO?")==true) 
        { 
          window.location=pagina; 
        } 
   }

    function checar2(pagina) 
    { 
      if (confirm("CONFIRMA A EXCLUSAO DO BANCO?")==true) 
        { 
          window.location=pagina; 
        } 
    }

    function recebe(pagina){
           if (confirm("CONFIRMA O RECEBIMENTO DA SANGRIA?")==true) 
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
?>
<div id="interface">
	 <h1>Entradas
      <? if($_SESSION['nivelF'] == 0) echo "- Financeiro" ?>
        <? if($_SESSION['nivelF'] == 1) echo "- Fiscal" ?>
        <? if($_SESSION['nivelF'] == 2) echo "- Caixa" ?>
        <? if($_SESSION['nivelF'] == 3) echo "- Baixa" ?>
    </h1>
  
 <div id="caixa1"><br />
	<table id="tabela" align="center" width="50%" border="1">
   <thead>
	  <tr align="center" bgcolor="#CCCCCC">
      <th align="center" style="width: 10%"><font color="#333333" size="2"><b>Recebe</b></font></th>
	    <th align="center" style="width: 10%"><font color="#333333" size="2"><b>Nº</b></font></th>
	    <th align="center" style="width: 40%"><font color="#333333" size="2"><b>Data Caixa</b></font></th>
		  <th align="center" style="width: 40%"><font color="#333333" size="2"><b>Valor</b></font></th>
	  </tr>
  </thead>
 </table>

	<?php
		include "conexao.php";
		$ano = date("Y");
		$today = date("d/m/Y");
		$con = 1; $soma = 0;
		$sql = "select *, DATE_FORMAT(dataCaixa,'%d/%m/%Y') as dat from sangria where status = 0 order by dataCaixa";
		$resultado = mysqli_query($conn,$sql) or die (mysql_error());
		while ($linha = mysqli_fetch_array($resultado)) {
   		$idS = $linha['idSangria'];
			$data = $linha['dat'];
      $valor = $linha['valor'];
      $soma =  $soma + $valor;
      
		     
			if ($con % 2 == 0)
				 $bgcolor = "bgcolor='#FFFFFF'";
			else
				 $bgcolor = "bgcolor='#FFFFCC'";
	 ?>
   <center>
    <table id="tabela" align="center" width="50%"  border="1">
     <tbody>
  	  <tr align="center" <? echo $bgcolor; ?>>
  	    <td align="center" style="width: 10%">
  		   <?
  		   echo "<a href=\"javascript:recebe('sangriaOK.php?idS=".$idS."');\"><img src=\"imagens/sifrao.png\" width=\"20\" border=\"0\" alt=\"Click para receber a sangria.\" title=\"Click para receber a sangria.\"></a>";
  		   ?>

  		</td>
  	    <td align="center" style="width: 10%" ><font color="#333333" size="2"><b><? echo $con; ?></b></font></td>
  	    <td align="center" style="width: 40%"><font color="#333333" size="2"><b><? echo $data; ?></b></font></td>
  	    <td class="campo" lign="right" style="width: 40%" ><font color="#333333" size="2"><b><? echo $valor; ?></b></font></td>
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