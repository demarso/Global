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
                  soma += parseFloat($('td:nth-child(5)', $(this).parents('tr')).text()); //parseFloat($(this).text()); 
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
 
 $(function() {
                var d=1000;
                $('#menu span').each(function(){
                    $(this).stop().animate({
                        'top':'-17px'
                    },d+=250);
                });

                $('#menu > li').hover(
                function () {
                    var $this = $(this);
                    $('a',$this).addClass('hover');
                    $('span',$this).stop().animate({'top':'40px'},300).css({'zIndex':'10'});
                },
                function () {
                    var $this = $(this);
                    $('a',$this).removeClass('hover');
                    $('span',$this).stop().animate({'top':'-17px'},800).css({'zIndex':'-1'});
                }
            );
            });
</script>
</head>
<body>
 
<?php 
     include "menu.php"; 
  
?>
<div id="interface">
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
   if(isset($_POST['data1'])){
      $data1 = $_POST['data1'];
      $data2 = $_POST['data2'];}
   else{
      $data1 = date('d/m/Y');
      $data2 = date('d/m/Y');}

if(isset($_POST['data1'])){   
  ?>
  <br />    
	 <h1>Sa&iacute;das do Caixa de <? echo date('d/m/Y',strtotime($data1))." a ".date('d/m/Y',strtotime($data2)) ?> </h1>
  
 <div id="caixa1"><br />
	<table id="tabela" align="center" width="100%" border="1">
   <thead>
	  <tr align="center" bgcolor="#CCCCCC">
	    <th align="center" style="width: 10%"><font color="#333333" size="1"><b>Edit/Del</b></font></th>
	    <th align="center" style="width: 15%"><font color="#333333" size="1"><b>Data</b></font></th>
      <th align="center" style="width: 15%"><font color="#333333" size="1"><b>Tipo Sa&itilde;da</b></font></th>
		  <th align="center" style="width: 25%"><font color="#333333" size="1"><b>Benefici&aacute;rio</b></font></th>
	    <th align="center" style="width: 25%"><font color="#333333" size="1"><b>Descri&ccedil;&atilde;o</b></font></th>
      <th align="center" style="width: 15%"><font color="#333333" size="1"><b>Valor</b></font></th>
	  </tr>
    <tr align="center" bgcolor="#CCCCCC">
      <th align="center" style="width: 10%"><input type="text" id="txtColuna1" readonly="true" size="8%"/></th>
      <th align="center" style="width: 15%"><input type="text" id="txtColuna2" size="12%"/></th>
      <th align="center" style="width: 15%"><input type="text" id="txtColuna2" size="12%"/></th>
      <th align="center" style="width: 25%"><input type="text" id="txtColuna3" size="22%"/></th>
      <th align="center" style="width: 25%"><input type="text" id="txtColuna4" size="22%"/></th>
      <th align="center" style="width: 15%"><input type="text" id="txtColuna5" size="8%"/></th>
   </tr>
  </thead>
 </table>

	<?php
		include "conexao.php";
		$ano = date("Y");
    $mes = date("m");
    $today = date("d/m/Y");
		$con = 1; $somaC = 0; $somaS = 0;
	 
  	$sql = "select *, DATE_FORMAT(data,'%d/%m/%Y') as dat from financeirosaida where data >= '$data1' and data <='$data2' order by data";
		$resultado = mysqli_query($conn,$sql) or die (mysql_error());
		while ($linha = mysqli_fetch_array($resultado)) {
    	$idCaixaSaida = $linha['idCaixaSaida'];
      $tiposaida = $linha['tiposaida'];
			$beneficiario = $linha['beneficiario'];
			$descricao = $linha['descricao'];
			$data = $linha['dat'];
      $valor = $linha['valor'];
      $valorf = number_format($valor, 2, ',', '.');
      $somaC =  $somaC + $valor;
      $somaCf = number_format($somaC, 2, ',', '.');
      $valorSangria = 0;
	
			if ($con % 2 == 0)
				 $bgcolor = "bgcolor='#FFFFFF'";
			else
				 $bgcolor = "bgcolor='#FFFFCC'";
	 ?>
   <center>
     <table id="tabela" align="center" width="100%"  border="1">
      <tbody>
        <tr align="center" <? echo $bgcolor; ?>>
    	    <td align="center" style="width: 10%">
    		   <?
    		   echo "<a href=\"javascript:checar1('caixaSaida_edita.php?id=".$idCaixaSaida."');\"><img src=\"imagens/letra-e.png\" width=\"20\" border=\"0\" alt=\"Click para editar o Sa&iacute;da.\" title=\"Click para editar o Sa&iacute;da.\"></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
    		   echo "<a href=\"javascript:checar2('caixaSaida_deleta.php?id=".$idCaixaSaida."');\"><img src=\"imagens/letra-d.png\" width=\"20\" border=\"0\" alt=\"Click para deletar o Sa&iacute;da.\" title=\"Click para deletar o Sa&iacute;da.\"></a>";
    		   ?>
         </td>
          <td align="center" style="width: 15%"><font color="#333333" size="1"><b><? echo $data; ?></b></font></td>
           <td align="center" style="width: 15%"><font color="#333333" size="1"><b><? echo $tiposaida; ?></b></font></td>
    	    <td align="center" style="width: 25%"><font color="#333333" size="1"><b><? echo $beneficiario; ?></b></font></td>
    	    <td align="center" style="width: 25%"><font color="#333333" size="1"><b><? echo $descricao; ?></b></font></td>
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
  
 	$con = $con - 1;
	$soma = $somaC + $somaS;
  $soma = number_format($soma, 2, ',', '.');
  $soma2 = "R$ ".$soma;
}
	?>

 </div>
    <div style="position: relative; margin-right: 100px" align="right">
         Total: <font color="blue"><b><input id="resultado" type="text" align="right" size="10" style="color: blue; font-weight: bold;" value="<? echo $soma2; ?>" readonly /></b></font>
    </div>
</div>
	<? include "footer.html"; ?>
    <script src="include/jquery-3.2.1.min.js"></script>
    <script src="include/popper.min.js"></script>
    <script src="include/bootstrap.min.js"></script>
    <script src="include/navbar.js"></script>  
</body>
</html>