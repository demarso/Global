<?php
session_start();
date_default_timezone_set('America/Sao_Paulo');
  if (!isset($_SESSION['idF'])){
    header("Location: index.php?erro=1");
    exit;
  }
  if($_SESSION['nivelF'] != 10){
   echo "<script>alert('Você não tem permissão para acessar está página!');history.back(-1);</script>";
   exit;
  }
 
 ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
        <title>FinDir - Sídas</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
         <link rel="stylesheet" type="text/css" href="css/style.css"/>
         <link rel="stylesheet" href="css/style_menu.css" type="text/css"/>
        <script type="text/javascript" src="include/jquery-1.3.2.js"></script>
        <script type="text/javascript" src="include/script.js"></script>
        <script type="text/javascript" src="include/jquery-latest.min.js"></script>
        <script type="text/javascript" src="include/script_menu.js"></script>
        <script type="text/javascript" src="include/micoxAjax.js"></script>
  <script type="text/javascript">
            
        
            function checar(pagina) 
           { 
                  window.location=pagina; 
           }

            function checar2(pagina) 
            { 
              if (confirm("CONFIRMA A EXCLUSAO DESSA SAÍDA?")==true) 
                { 
                  window.location=pagina; 
                } 
            }
  

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
        
        function maskIt(w,e,m,r,a){
  				// Cancela se o evento for Backspace
  				if (!e) var e = window.event
  				if (e.keyCode) code = e.keyCode;
  				else if (e.which) code = e.which;
  				// Variáveis da função
  				var txt  = (!r) ? w.value.replace(/[^\d]+/gi,'') : w.value.replace(/[^\d]+/gi,'').reverse();
  				var mask = (!r) ? m : m.reverse();
  				var pre  = (a ) ? a.pre : "";
  				var pos  = (a ) ? a.pos : "";
  				var ret  = "";
  				if(code == 9 || code == 8 || txt.length == mask.replace(/[^#]+/g,'').length) return false;
  				// Loop na máscara para aplicar os caracteres
  				for(var x=0,y=0, z=mask.length;x<z && y<txt.length;){
  				if(mask.charAt(x)!='#'){
  				ret += mask.charAt(x); x++; } 
  				else {
  				ret += txt.charAt(y); y++; x++; } }
  				// Retorno da função
  				ret = (!r) ? ret : ret.reverse()	
  				w.value = pre+ret+pos; }
  				// Novo método para o objeto 'String'
  				String.prototype.reverse = function(){
				  return this.split('').reverse().join(''); 
        };

				function number_format( number, decimals, dec_point, thousands_sep ) {
  				var n = number, c = isNaN(decimals = Math.abs(decimals)) ? 2 : decimals;
  				var d = dec_point == undefined ? "," : dec_point;
  				var t = thousands_sep == undefined ? "." : thousands_sep, s = n < 0 ? "-" : "";
  				var i = parseInt(n = Math.abs(+n || 0).toFixed(c)) + "", j = (j = i.length) > 3 ? j % 3 : 0;
  				return s + (j ? i.substr(0, j) + t : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + t) + (c ? d + Math.abs(n - i).toFixed(c).slice(2) : "");
				}

				function calcula(operacion){ 
  				var operando1 = parseFloat( document.calc.operando1.value.replace(/\./g, "").replace(",", ".") );
  				var operando2 = parseFloat( document.calc.operando2.value.replace(/\./g, "").replace(",", ".") );
  				var result = eval(operando1 + operacion + operando2);
  				document.calc.resultado.value = number_format(result,2, ',', '.');
				} 

          
        function desabilita() {
            var x,y,z,w;
            x = document.getElementById("sacado");
            y = document.getElementById("titulo");
            v = document.getElementById("valor");
            z = document.getElementById("vsangria");
            w = document.getElementById("trsangria");
           if(document.getElementById("sangra").checked==true){
              x.visible = false;
              x.disabled = true;
              y.visible = false;
              y.disabled = true;
              v.visible = false;
              v.disabled = true;
              z.visible = true;                
              z.disabled = false;
              w.removeAttribute("disabled");
            }
            else{
              x.visible = true;
              x.disabled = false;
              y.visible = true;                
              y.disabled = false;
              v.visible = true;                
              v.disabled = false;
              z.visible = false;
              z.disabled = true;
              w.display.none;
              
            }
        }
         
        function desabilita2() {
            var z;
            z = document.getElementById("vsangria");
            z.visible = false;
            z.disabled=true;
          }

        function newPopup(){
          varWindow = window.open ('sangria.php', 'popup')
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
  </script>
        
</head>
<body>

  <? include "menu.php" ?><br />
<div id="interface">
  <form name='form1' action='<? $myself ?>' method='post'>
   <tabel>
    <tr>
           <td><font color="cyan"><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;SELECIONE PARA CONSULTAR POR MÊS:</b></font></td>
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
              <option value="2018">2018</option>
              <option value="2019">2019</option>
              <option value="2020">2020</option>
              <option value="2021">2021</option>
              <option value="2022">2022</option>
              <option value="2023">2023</option>
              <option value="2024">2024</option>
              <option value="2025">2025</option>
              <option value="2026">2026</option>
              <option value="2027">2027</option>
              <option value="2028">2028</option>
              <option value="2029">2029</option>
              <option value="2030">2030</option>
             </select>
           </td>
          <!-- <td></td>
           <td>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b><a href="entrFinDir.php">RECARREGAR GERAL</a></b></td>-->
    </tr>
   </tabel>
 </form>
  <?php
    if(isset($_POST['mesc'])){
      $mes = $_POST['mesc'];
      $ano = $_POST['anoc'];
   } else{
      $mes = date("m");
      $ano = date("Y");
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
  ?>
  <br />
            <h1>Saídas do Caixa Diretoria</h1>  
  <form name="form1" method="post" action="entFinDirOK.php" >
    <table>
      <tr>
        <td><h3>&nbsp;&nbsp;&nbsp;Data:</h3></td>
        <td>
          <input type="date" name="data" id="data" size="15" tabindex="1" required="true">
        </td>
        <td><h3>&nbsp;&nbsp;&nbsp;Descrição:</h3></td>
        <td>
          <input type="text" name="descricao" id="descricao" size="60" tabindex="1" required="true">
        </td>
        <td><h3>&nbsp;&nbsp;&nbsp;Valor:</h3></td>
        <td>
          <input type="text" name="valor" id="valor" size="30" tabindex="1" onkeyup="maskIt(this,event,'###.###.###,##',true)" style="text-align: right;" >
        </td>
      </tr>
    </table>          
      <center>
    <table>
          <tr>
             <td colspan="4" align="center"><input type="submit" size="150" value="REGISTRAR">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
             <input type="reset" value="LIMPA" /></td> 
            
          </tr>
          <tr>
             <td colspan="4" align="center"><hr align="center" width="600" size="1" color=red></td>
           </tr>
    </table>
    </center>
    <br />
  </form>
  <form name='form1' action='<? $myself ?>' method='post'>
   <tabel>
    
  
  <table id="tabela" align="center" width="80%" border="1">
   <thead>
    <tr align="center" bgcolor="#CCCCCC">
      <th align="center" style="width: 10%"><font color="#333333" size="1"><b>Edit/Del</b></font></th>
      <th align="center" style="width: 10%"><font color="#333333" size="1"><b>Nº</b></font></th>
      <th align="center" style="width: 20%"><font color="#333333" size="1"><b>Data</b></font></th>
      <th align="center" style="width: 40%"><font color="#333333" size="1"><b>Descrição</b></font></th>
      <th align="center" style="width: 20%"><font color="#333333" size="1"><b>Valor</b></font></th>
    </tr>
    <tr align="center" bgcolor="#CCCCCC">
      <th align="center" style="width: 10%"><input type="text" id="txtColuna1" readonly="true" size="8%"/></th>
      <th align="center" style="width: 10%"><input type="text" id="txtColuna2" size="8%"/></th>
      <th align="center" style="width: 20%"><input type="text" id="txtColuna3" size="15%"/></th>
      <th align="center" style="width: 40%"><input type="text" id="txtColuna4" size="30%"/></th>
      <th align="center" style="width: 20%"><input type="text" id="txtColuna5" size="15%"/></th>
      
   </tr>
  </thead>
 </table>

  <?php
    include "conexao.php";
    $con = 1; $soma = 0;

    if(isset($_POST['mesc'])){
    $sql = "SELECT *, DATE_FORMAT(data,'%d/%m/%Y') as dat from findir WHERE MONTH(data)='$mes' AND YEAR(data)='$ano' ORDER BY data desc";
    $resultado = mysqli_query($conn,$sql) or die (mysql_error());
    while ($linha = mysqli_fetch_array($resultado)) {
    
      $idFinDir = $linha['idFindir'];
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
    <table id="tabela" align="center" width="80%"  border="1">
     <tbody>
      <tr align="center" <? echo $bgcolor; ?>>
        <td align="center" style="width: 10%">
         <?
         echo "<a href=\"javascript:checar1('FinDir_edita.php?id=".$idFinDir."');\"><img src=\"imagens/letra-e.png\" width=\"20\" border=\"0\" alt=\"Click para editar o Entrada.\" title=\"Click para editar o Entrada.\"></a>&nbsp;&nbsp;&nbsp;&nbsp;";
         echo "<a href=\"javascript:checar2('FinDir_deleta.php?id=".$idFinDir."');\"><img src=\"imagens/letra-d.png\" width=\"20\" border=\"0\" alt=\"Click para deletar o Entrada.\" title=\"Click para deletar o Entrada.\"></a>";
         ?>

      </td>
        <td align="center" style="width: 10%" ><font color="#333333" size="1"><b><? echo $con; ?></b></font></td>
        <td align="center" style="width: 20%"><font color="#333333" size="1"><b><? echo $data; ?></b></font></td>
        <td align="center" style="width: 40%"><font color="#333333" size="1"><b><? echo $descricao; ?></b></font></td>
        <td class="campo" lign="right" style="width: 20%" ><font color="#333333" size="1"><b><? echo $valor; ?></b></font></td>
      </tr>
     </tbody>
    </table>
    </center>
  <? 
   
  $con = $con + 1;
  }
  }else{
    $sql = "SELECT *, DATE_FORMAT(data,'%d/%m/%Y') as dat from finDir ORDER BY data desc";
    $resultado = mysqli_query($conn,$sql) or die (mysql_error());
    while ($linha = mysqli_fetch_array($resultado)) {
    
      $idFinDir = $linha['idFindir'];
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
    <table id="tabela" align="center" width="80%"  border="1">
     <tbody>
      <tr align="center" <? echo $bgcolor; ?>>
        <td align="center" style="width: 10%">
         <?
         echo "<a href=\"javascript:checar1('FinDir_edita.php?id=".$idFinDir."');\"><img src=\"imagens/letra-e.png\" width=\"20\" border=\"0\" alt=\"Click para editar o Entrada.\" title=\"Click para editar o Entrada.\"></a>&nbsp;&nbsp;&nbsp;&nbsp;";
         echo "<a href=\"javascript:checar2('FinDir_deleta.php?id=".$idFinDir."');\"><img src=\"imagens/letra-d.png\" width=\"20\" border=\"0\" alt=\"Click para deletar o Entrada.\" title=\"Click para deletar o Entrada.\"></a>";
         ?>

      </td>
        <td align="center" style="width: 10%" ><font color="#333333" size="1"><b><? echo $con; ?></b></font></td>
        <td align="center" style="width: 20%"><font color="#333333" size="1"><b><? echo $data; ?></b></font></td>
        <td align="center" style="width: 40%"><font color="#333333" size="1"><b><? echo $descricao; ?></b></font></td>
        <td class="campo" lign="right" style="width: 20%" ><font color="#333333" size="1"><b><? echo $valor; ?></b></font></td>
      </tr>
     </tbody>
    </table>
    </center>
  <? 
   
  $con = $con + 1;
  }
  }

  $con = $con - 1;
  $saldo = number_format(round($saldo * 2 )/ 2,2);
  $soma = number_format($soma, 2, ',', '.');
  $soma2 = "R$ ".$soma;
  ?>
 
    <div style="position: relative; margin-right: 100px" align="right">
         Total: <b><input id="resultado" type="text" align="right" size="10" style="color: blue; font-weight: bold;" value="<? echo $soma2; ?>" readonly /></b>
    </div>
   
</div>
     <footer id="footer">   
       <?php include "footer.php"; ?>
    </footer>
</body>
</html>