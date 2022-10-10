<?php
session_start();
date_default_timezone_set('America/Sao_Paulo');
if (!isset($_SESSION['idF'])){
    header("Location: index.php?erro=1");
    exit;
 }
 if($_SESSION['nivelF'] != 10){
     echo "<script>alert('Voce nao tem permissao para acessar esta pagina!');history.back(-1);</script>";
     exit;
  }
 
 ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta http-equiv="Content-type" content="text/html; charset=UTF-8"/>
  <link rel="stylesheet" href="css/style.css" type="text/css"/>
  <title>Entradas Caixa</title>
  <script type="text/javascript" src="include/jquery.js"></script>
        <script type="text/javascript" src="include/jquery-1.3.2.js"></script>
        <script type="text/javascript" src="include/script.js"></script>
        <script type="text/javascript">
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
                return this.split('').reverse().join(''); };

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
                  var x,y;
                  x = document.getElementById("beneficiario");
                  y = document.getElementById("descricao");
                  
                  if(document.getElementById("sangra").checked==true){
                      x.visible = false;
                      x.disabled = true;
                      y.visible = false;
                      y.disabled = true;
                      
                  }
                  else{
                      x.visible = true;
                      x.disabled = false;
                      y.visible = true;                
                      y.disabled = false;
                  }
                }
                
</script>

</head>
<body>
<?php include "menu.php";
 $mes = date('m'); $ano = date('Y');
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
 <h1>Resumo Financeiro de <? echo $mes1." de ".$ano; ?></h1>
<div id="caixa1a">
<?
include "conexao.php";
$mes = date('m');
  $sql = "select sum(valor) as val from movBanco where month(data) = '$mes'";
    $resultado = mysqli_query($conn,$sql) or die (mysql_error());
    while ($linha = mysqli_fetch_array($resultado)) {
      $ent_fin = $linha['val'];
      $ent_fin2 =$ent_fin;
      $ent_fin = number_format($ent_fin, 2, ',', '.');
   }
   $sql = "select sum(valor) as val2 from financeiroSaida where month(data) = '$mes' order by data";
    $resultado = mysqli_query($conn,$sql) or die (mysql_error());
    while ($linha = mysqli_fetch_array($resultado)) {
      $saida_fin = $linha['val2'];
      
   } 
   $sql = "select sum(valor) as val3 from caixa where month(data) = '$mes' order by data";
    $resultado = mysqli_query($conn,$sql) or die (mysql_error());
    while ($linha = mysqli_fetch_array($resultado)) {
      $ent_caixa = $linha['val3'];
      $ent_caixa2 =$ent_caixa;
      $ent_caixa = number_format($ent_caixa, 2, ',', '.');
   } 
   $sql = "select sum(valor) as val4 from caixaSaida where month(data) = '$mes' order by data";
    $resultado = mysqli_query($conn,$sql) or die (mysql_error());
    while ($linha = mysqli_fetch_array($resultado)) {
      $saida_caixa = $linha['val4'];
      $saldo_caixa = $ent_caixa2-$saida_caixa;
      $saida_caixa = number_format($saida_caixa, 2, ',', '.');
      $saldo_caixa = number_format($saldo_caixa, 2, ',', '.');
   }
   $sql5 = "select sum(valor) as val5 from sangria where month(data) = '$mes' and status = 1";
    $resultado5 = mysqli_query($conn,$sql5) or die (mysql_error());
    while ($linha5 = mysqli_fetch_array($resultado5)) {
      $sangria = $linha5['val5'];}
      $tot_entr1 = $sangria+$ent_fin2;
      $tot_entr = number_format($tot_entr, 2, ',', '.');
      $saldo_fin = $tot_entr1-$saida_fin;
      $saida_fin = number_format($saldo_fin, 2, ',', '.');
      
      
   
 ?>
 <div id="caixa2">
 <center><font size="4">Caixa</font><b></center> 
  <table align="center" width="90%"  border="1">
  <tr><td align="center">Entrada</td><td align="center">Saída</td><td align="center">Saldo</td></tr>
  <tr><td align="right"><? echo $ent_caixa ?></td><td align="right"><? echo $saida_caixa ?></td><td align="right"><? echo $saldo_caixa ?></td></tr>
 </table></b><br />
 <div id="caixa5">
  <center><font size="4">Entrada</font><b></center>
      <table id="tabela" align="center" width="90%" border="1">
       <thead>
        <tr align="center" bgcolor="#CCCCCC">
          <th align="center" style="width: 30%"><font color="#333333" size="1"><b>Associado</b></font></th>
          <th align="center" style="width: 25%"><font color="#333333" size="1"><b>Descri&ccedil;&atilde;o</b></font></th>
          <th align="center" style="width: 10%"><font color="#333333" size="1"><b>Valor</b></font></th>
        </tr>
    <!--  <tr align="center" bgcolor="#CCCCCC">
          <th align="center" style="width: 30%"><input type="text" id="txtColuna3" size="15%"/></th>
          <th align="center" style="width: 25%"><input type="text" id="txtColuna7" size="10%"/></th>
          <th align="center" style="width: 10%"><input type="text" id="txtColuna8" size="6%"/></th>
       </tr> -->
      </thead>
     </table>
     <?php
        
        $ano = date("Y");
        $today = date("d/m/Y");
        $con = 1; $soma = 0;
        $sql = "select *, DATE_FORMAT(data,'%d/%m/%Y') as dat from caixa where month(data) = '$mes' order by data";
        $resultado = mysqli_query($conn,$sql) or die (mysql_error());
        while ($linha = mysqli_fetch_array($resultado)) {
        
          $idCaixa = $linha['idCaixa'];
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
        <table id="tabela" align="center" width="90%"  border="1">
         <tbody>
            <td align="center" style="width: 30%"><font color="#333333" size="1"><b><? echo $associado; ?></b></font></td>
            <td align="center" style="width: 25%"><font color="#333333" size="1"><b><? echo $descricao; ?></b></font></td>
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
  </div><br />
  <div id="caixa5">
    <?php
    
    $con = 1; $somaC = 0; $somaS = 0;
    echo "<font size=\"4\">Saídas do Caixa</font>";
    $sql = "select *, DATE_FORMAT(data,'%d/%m/%Y') as dat from caixaSaida where month(data) = '$mes' order by data";
    $resultado = mysqli_query($conn,$sql) or die (mysql_error());
    while ($linha = mysqli_fetch_array($resultado)) {
      $idCaixaSaida = $linha['idCaixaSaida'];
      $beneficiario = $linha['beneficiario'];
      $descricao = $linha['descricao'];
      $data = $linha['dat'];
      $valor = $linha['valor'];
      $somaC =  $somaC + $valor;
      $valorSangria = 0;
  
      if ($con % 2 == 0)
         $bgcolor = "bgcolor='#FFFFFF'";
      else
         $bgcolor = "bgcolor='#FFFFCC'";
   ?>
   <center>
     <table id="tabela" align="center" width="90%"  border="1">
      <tbody>
        <tr align="center" <? echo $bgcolor; ?>>
          <td align="center" style="width: 15%"><font color="#333333" size="1"><b><? echo $data; ?></b></font></td>
          <td align="center" style="width: 25%"><font color="#333333" size="1"><b><? echo $beneficiario; ?></b></font></td>
          <td align="center" style="width: 25%"><font color="#333333" size="1"><b><? echo $descricao; ?></b></font></td>
          <td class="campo" lign="right" style="width: 15%" ><font color="#333333" size="1"><b><? echo $valor; ?></b></font></td>
        </tr>
       </tbody>
     </table>
   </center>
  <? 
   $idc = $idCaixaSaida;
   $ids = $idSangria;
  $con = $con + 1;
  }
  echo "<p><font size=\"4\">Saídas de Sangria</font>";
  $sql2 = "select *, DATE_FORMAT(dataCaixa,'%d/%m/%Y') as dati from sangria where month(dataCaixa) = '$mes' and status = 0 order by dataCaixa";
    $resultado2 = mysqli_query($conn,$sql2) or die (mysql_error());
    while ($linha2 = mysqli_fetch_array($resultado2)) {
      $idSangria = $linha2['idSangria'];
      $dataCaixa = $linha2['dati'];
      $valorSangria = $linha2['valor'];
      $somaS =  $somaS + $valorSangria;

      if ($con % 2 == 0)
         $bgcolor = "bgcolor='#FFFFFF'";
      else
         $bgcolor = "bgcolor='#FFFFCC'";
   ?>
     <center>
     <table id="tabela" align="center" width="90%"  border="1">
      <tbody>
       <tr align="center" <? echo $bgcolor; ?>>
          <td align="center" style="width: 15%"><font color="#333333" size="1"><b><? echo $dataCaixa; ?></b></font></td>
          <td align="center" style="width: 25%"><font color="#333333" size="1"><b><? echo "Financeiro" ?></b></font></td>
          <td align="center" style="width: 25%"><font color="#333333" size="1"><b><? echo "Sangria" ?></b></font></td>
          <td class="campo" lign="right" style="width: 15%" ><font color="#333333" size="1"><b><? echo $valorSangria; ?></b></font></td>
        </tr>
        </tbody>
     </table>
   </center>
 <?  }
  $con = $con - 1;
  $soma = $somaC + $somaS;
  $soma = number_format($soma, 2, ',', '.');
  $soma2 = "R$ ".$soma;
  ?>
   </div>
</div>
<div id="caixa3">
 <center><font size="4">Financeiro</font><b></center> 
 <table align="center" width="90%"  border="1">
  <tr><td align="center">Entrada</td><td align="center">Saída</td><td align="center">Saldo</td></tr>
  <tr><td align="right"><? echo $tot_entr ?></td><td align="right"><? echo $saida_fin ?></td><td align="right"><? echo $saldo_fin ?></td></tr>
 </table></b><br />
   <div id="caixa5">
     <center><font size="4">Entrada de Banco</font><b></center>
    <table id="tabela" align="center" width="90%" border="1">
   <thead>
    <tr align="center" bgcolor="#CCCCCC">
      <th align="center" style="width: 10%"><font color="#333333" size="1"><b>Data</b></font></th>
      <th align="center" style="width: 25%"><font color="#333333" size="1"><b>Empresa</b></font></th>
      <th align="center" style="width: 25%"><font color="#333333" size="1"><b>Tipo Entrada</b></font></th>
      <th align="center" style="width: 15%"><font color="#333333" size="1"><b>Valor</b></font></th>
    </tr>
 <!--   <tr align="center" bgcolor="#CCCCCC">
      <th align="center" style="width: 30%"><input type="text" id="txtColuna3" size="27%"/></th>
      <th align="center" style="width: 10%"><input type="text" id="txtColuna5" size="8%"/></th>
      <th align="center" style="width: 10%"><input type="text" id="txtColuna6" size="8%"/></th>
    </tr> -->
  </thead>
 </table>

  <?php
    include "conexao.php";
    $ano = date("Y");
    $mes = date("m");
    $today = date("d/m/Y");
    $con = 1; $soma = 0;
    $sql = "select *, DATE_FORMAT(data,'%d/%m/%Y') as dat from movBanco where month(data) = '$mes' order by data";
    $resultado = mysqli_query($conn,$sql) or die (mysql_error());
    while ($linha = mysqli_fetch_array($resultado)) {
      $idBanco = $linha['idBanco'];
      $data = $linha['dat'];
      $empresa = $linha['empresa'];
      $tipoentrada = $linha['tipoentrada'];
      $valor = $linha['valor'];
      //$somaC =  $somaC + $valor;

            //$somaS =  $somaS + $valorSangria;
      
      if ($con % 2 == 0)
         $bgcolor = "bgcolor='#FFFFFF'";
      else
         $bgcolor = "bgcolor='#FFFFCC'";
   ?>
   <center>
    <center><font size="4">Financeiro</font></center>
    <table id="tabela" align="center" width="90%"  border="1">
     <tbody>
       <tr align="center" <? echo $bgcolor; ?>>
        <td align="center" style="width: 10%"><font color="#333333" size="1"><b><? echo $data; ?></b></font></td>
        <td align="center" style="width: 25%"><font color="#333333" size="1"><b><? echo $empresa; ?></b></font></td>
        <td align="center" style="width: 25%"><font color="#333333" size="1"><b><? echo $tipoentrada; ?></b></font></td>
        <td class="campo" lign="right" style="width: 15%" ><font color="#333333" size="1"><b><? echo $valor; ?></b></font></td>
      </tr>
     </tbody>
    </table>
    <? } ?>
     <center><font size="4">Sangria</font></center> 
   <? $sql2 = "select *, DATE_FORMAT(dataFinanceiro,'%d/%m/%Y') as dati from sangria where month(dataFinanceiro) = '$mes' and status = 1 order by dataFinanceiro";
      $resultado2 = mysqli_query($conn,$sql2) or die (mysql_error());
      while ($linha2 = mysqli_fetch_array($resultado2)) {
      $idSangria = $linha2['idSangria'];
      $data = $linha2['dati'];
      $valor = $linha2['valor'];
    ?>
           
    <table id="tabela" align="center" width="90%"  border="1">
     <tbody>
       <tr align="center" <? echo $bgcolor; ?>>
        <td align="center" style="width: 10%"><font color="#333333" size="1"><b><? echo $data; ?></b></font></td>
        <td class="campo" lign="right" style="width: 10%" ><font color="#333333" size="1"><b><? echo $valor; ?></b></font></td>
      </tr>
     </tbody>
    </table>
    </center>
  <? 
  $con = $con + 1;
  }
  ?>
   </div><br />
   <div id="caixa5">
    <center><font size="4">Saída</font><b></center>
        <table id="tabela" align="center" width="100%" border="1">
           <thead>
            <tr align="center" bgcolor="#CCCCCC">
              <th align="center" style="width: 20%"><font color="#333333" size="1"><b>Benefici&aacute;rio</b></font></th>
              <th align="center" style="width: 20%"><font color="#333333" size="1"><b>Descri&ccedil;&atilde;o</b></font></th>
              <th align="center" style="width: 15%"><font color="#333333" size="1"><b>Valor</b></font></th>
            </tr>
        <!--   <tr align="center" bgcolor="#CCCCCC">
              <th align="center" style="width: 20%"><input type="text" id="txtColuna3" size="18%"/></th>
              <th align="center" style="width: 20%"><input type="text" id="txtColuna4" size="18%"/></th>
              <th align="center" style="width: 15%"><input type="text" id="txtColuna5" size="10%"/></th>
           </tr> -->
          </thead>
        </table>

      <?php
        include "conexao.php";
        $ano = date("Y");
        $mes = date("m");
        $today = date("d/m/Y");
        $con = 1; $somaC = 0; $somaS = 0;
       
        $sql = "select *, DATE_FORMAT(data,'%d/%m/%Y') as dat from financeiroSaida where month(data) = '$mes' order by data";
        $resultado = mysqli_query($conn,$sql) or die (mysql_error());
        while ($linha = mysqli_fetch_array($resultado)) {
          $idCaixaSaida = $linha['idCaixaSaida'];
          $beneficiario = $linha['beneficiario'];
          $descricao = $linha['descricao'];
          $data = $linha['dat'];
          $valor = $linha['valor'];
          $somaC =  $somaC + $valor;
         // $valorSangria = 0;
      
          if ($con % 2 == 0)
             $bgcolor = "bgcolor='#FFFFFF'";
          else
             $bgcolor = "bgcolor='#FFFFCC'";
       ?>
       <center>
         <table id="tabela" align="center" width="100%"  border="1">
          <tbody>
            <tr align="center" <? echo $bgcolor; ?>>
              <td align="center" style="width: 20%"><font color="#333333" size="1"><b><? echo $data; ?></b></font></td>
              <td class="campo" lign="right" style="width: 15%" ><font color="#333333" size="1"><b><? echo $valor; ?></b></font></td>
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
      ?>
   </div>
 </div> 
            
</div>
 </div>
  <footer id="footer">   
     <?php include "footer.php"; ?>
  </footer>
</body>
</html>