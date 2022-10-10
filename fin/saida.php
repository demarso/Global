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
        <title>Fin - Saídas</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <link rel="stylesheet" href="css/style.css" type="text/css" charset="utf-8"/>
         <link rel="stylesheet" href="css/style_menu.css" type="text/css"/>
         <link rel="stylesheet" href="css/bootstrap.min.css">
       <script type="text/javascript" src="include/jquery-1.3.2.js"></script>
        <script type="text/javascript" src="include/script.js"></script>
        <script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
        <script type="text/javascript" src="include/script_menu.js"></script>
        <script type="text/javascript" src="include/micoxAjax.js"></script>
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
  <? include "menu.php" ?><br />
  <h1>Saídas
        <? if($_SESSION['nivelF'] == 0) echo "- Financeiro" ?>
        <? if($_SESSION['nivelF'] == 1) echo "- Fiscal" ?>
        <? if($_SESSION['nivelF'] == 2) echo "- Caixa" ?>
        <? if($_SESSION['nivelF'] == 3) echo "- Baixa" ?>
    </h1>
  <div id="interface">
    
<div id="caixa1">
   <?php 
    if($_SESSION['nivelF'] == 0){ ?>
       <form name="form1" method="post" action="financeiroSaidaOK.php" >
      <br />
      <table>
        <tr>
          <td><h3>Tipo de Saída:</h3></td>
              <td>
              <INPUT TYPE="RADIO" NAME="tiposaida" VALUE="dinheiro" tabindex="2" checked="true"> Dinheiro
              <INPUT TYPE="RADIO" NAME="tiposaida" VALUE="transferencia"> Transferencia
              <INPUT TYPE="RADIO" NAME="tiposaida" VALUE="boleto"> Boleto
              <INPUT TYPE="RADIO" NAME="tiposaida" VALUE="cheque"> Cheque
              <INPUT TYPE="RADIO" NAME="tiposaida" VALUE="folha"> Folha de Pagamento
              <INPUT TYPE="RADIO" NAME="tiposaida" VALUE="sangria"> Sangria
            </td>
        </tr>
        <tr>
          <td><h3>Beneficiário:</h3></td>
          <td>
             <input type="text" name="beneficiario" id="beneficiario" size="60" tabindex="1" style='text-transform:uppercase' required="true">
          </td>
        </tr>  
        <tr>
          <td><h3>Descrição:</h3></td>
          <td>
             <input type="text" name="descricao" id="descricao" size="60" tabindex="2" required="true" >
          </td>
        </tr>
        <tr>
          <td><h3>Data:</h3></td>
          <td>
             <input type="date" name="data" id="data" size="15" tabindex="3" required="true">
          </td>
        </tr>
        <tr>
          <td><h3>Valor:</h3></td>
          <td>
             <input type="text" name="valor" size="10" tabindex="4" onkeyup="maskIt(this,event,'###.###.###,##',true)" style="text-align: right;" >
          </td>
        </tr>
      </table>
      <center>
            <table>
              <tr>
                 <td colspan="4" align="center"><hr align="center" width="600" size="1" color=red></td>
               </tr>
               <tr>
                 <td colspan="4" align="center"><input type="submit" size="150" value="REGISTRAR">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
                 <input type="reset" value="LIMPA" /></td> 
                 <td><a href="saida_financeiro_lista.php"><img src="imagens/lista2.png" width="100"></a></td>
               </tr>
            </table>
     </form> 
    <?}?>
    <? if($_SESSION['nivelF'] == 1){ ?>
        
    <?}?>
    <? if($_SESSION['nivelF'] == 2 || $_SESSION['nivelF'] == 10){ ?>
     <form name="form1" method="post" action="caixaSaidaOK.php" >
      <br />
      <table>
        <tr>
          <td><h3>Sangria:</h3></td>
           <td>
              <input type="checkbox" name="sangra" id="sangra" value="Sim" onclick="desabilita();"> Envia Sangria?
          </td> 
        </tr>
        <tr>
          <td><h3>Beneficiário:</h3></td>
          <td>
             <input type="text" name="beneficiario" id="beneficiario" size="60" tabindex="1" style='text-transform:uppercase' required="true">
          </td>
        </tr>  
        <tr>
          <td><h3>Descrição:</h3></td>
          <td>
             <input type="text" name="descricao" id="descricao" size="60" tabindex="2" required="true" >
          </td>
        </tr>
        <tr>
            <td><h3>Recido/NF:</h3></td>
             <td>
               <input type="text" name="recibo" id="recibo" size="10" tabindex="4" required="true">
             </td>
        </tr>
        <tr>
          <td><h3>Data:</h3></td>
          <td>
             <input type="date" name="data" id="data" size="15" tabindex="3" required="true">
          </td>
        </tr>
        <tr>
          <td><h3>Valor:</h3></td>
          <td>
             <input type="text" name="valor" size="10" tabindex="4" onkeyup="maskIt(this,event,'###.###.###,##',true)" style="text-align: right;" >
          </td>
        </tr>
      </table>
      <center>
            <table>
              <tr>
                 <td colspan="4" align="center"><hr align="center" width="600" size="1" color=red></td>
               </tr>
               <tr>
                 <td colspan="4" align="center"><input type="submit" size="150" value="REGISTRAR">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
                 <input type="reset" value="LIMPA" /></td> 
                 <td><a href="saida_caixa_lista.php"><img src="imagens/lista2.png" width="100"></a></td>
               </tr>
            </table>
     </form> 
    <? } ?>
    <? if($_SESSION['nivelF'] == 3){ ?>
       
    <?}?>
    <br /><br />
   </div> 
   <center>
   <?
     if($_SESSION['nivelF'] == 0){
     include "conexao.php";
      $dataH = date('Y/m/d');
      $mes = date('m'); 
      $sql = "select sum(valor) as val from movbanco where month(data) = '$mes' and tipoentrada = 'credito'";
      $resultado = mysqli_query($conn,$sql) or die (mysql_error());
      while ($linha = mysqli_fetch_array($resultado)) {
             $ent_credito1 = $linha['val'];}
             $ent_credito = number_format($ent_credito1, 2, ',', '.'); // str_replace('.',',',str_replace(',','.',$ent_din));
      
      $sql2 = "select sum(valor) as val2 from movbanco where month(data) = '$mes' and tipoentrada = 'saque'";
      $resultado2 = mysqli_query($conn,$sql2) or die (mysql_error());
      while ($linha2 = mysqli_fetch_array($resultado2)) {
             $ent_sac1 = $linha2['val2'];}
             $ent_sac = number_format($ent_sac1, 2, ',', '.'); //str_replace('.',',',str_replace(',','.',$ent_cre));
      
      $ent_tot = $ent_credito1 + $ent_sac1;
      $ent_tot = number_format($ent_tot, 2, ',', '.');

      $sql3 = "select sum(valor) as val3 from financeirosaida where  month(data) = '$mes'";
      $resultado3 = mysqli_query($conn,$sql3) or die (mysql_error());
      while ($linha3 = mysqli_fetch_array($resultado3)) {
             $saida1 = $linha3['val3'];}
             $saida = number_format($saida1, 2, ',', '.'); //str_replace('.',',',str_replace(',','.',$ent_deb));       
      
      $sql4 = "select sum(valor) as val4 from sangria where month(data) = '$mes' and status = 1";
      $resultado4 = mysqli_query($conn,$sql4) or die (mysql_error());
      while ($linha4 = mysqli_fetch_array($resultado4)) {
             $sangra = $linha4['val4'];}
      
      //$saidasT = $saidas+$sangra;
     // $saldo = $ent_din-$saidasT;
     // $saidas2 = number_format($saidasT, 2, ',', '.');
     // $saldo2 = number_format($saldo, 2, ',', '.');

     // $ent_tot = ($ent_din + $ent_cre + $ent_deb);
     // $ent_tot = number_format($ent_tot, 2, ',', '.');  

      //if($saldo > 0) $cor = "color='blue'"; else $cor = "color='red'";
      echo "FINANCEIRO: Entradas: Créditos:<font color='blue'>R$ ".$ent_credito."</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Saques:<font color='blue'>R$ ".$ent_sac."</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ENTRADA TOTAL:<font color='blue'>R$  ".$ent_tot;
      echo "<br />";  
      echo "Saídas: <font color='red'>R$ ".$saida."</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp";
    }

     if($_SESSION['nivelF'] == 2 || $_SESSION['nivelF'] == 10){
     include "conexao.php";
      $dataH = date('Y/m/d'); 


      $sql = "select sum(valor) as val from caixa where data = '$dataH' and boleto = 'dinheiro'";
      $resultado = mysqli_query($conn,$sql) or die (mysql_error());
      while ($linha = mysqli_fetch_array($resultado)) {
             $ent_din = $linha['val'];}
             $ent_din2 = number_format($ent_din, 2, ',', '.'); // str_replace('.',',',str_replace(',','.',$ent_din));

      $sql2 = "select sum(valor) as val2 from caixa where data = '$dataH' and boleto = 'credito'";
      $resultado2 = mysqli_query($conn,$sql2) or die (mysql_error());
      while ($linha2 = mysqli_fetch_array($resultado2)) {
             $ent_cre = $linha2['val2'];}
             $ent_cre2 = number_format($ent_cre, 2, ',', '.'); //str_replace('.',',',str_replace(',','.',$ent_cre));

      $sql3 = "select sum(valor) as val3 from caixa where data = '$dataH' and boleto = 'debito'";
      $resultado3 = mysqli_query($conn,$sql3) or die (mysql_error());
      while ($linha3 = mysqli_fetch_array($resultado3)) {
             $ent_deb = $linha3['val3'];}
             $ent_deb2 = number_format($ent_deb, 2, ',', '.'); //str_replace('.',',',str_replace(',','.',$ent_deb));       

      $sql4 = "select sum(valor) as val4 from caixasaida where data = '$dataH'";
      $resultado4 = mysqli_query($conn,$sql4) or die (mysql_error());
      while ($linha4 = mysqli_fetch_array($resultado4)) {
             $saidas = $linha4['val4'];}
             $saidas2 = number_format($saidas, 2, ',', '.');

      $sql5 = "select sum(valor) as val5 from sangria where dataCaixa = '$dataH'";
      $resultado5 = mysqli_query($conn,$sql5) or die (mysql_error());
      while ($linha5 = mysqli_fetch_array($resultado5)) {
             $sangra = $linha5['val5'];}
             $sangra2 = number_format($sangra, 2, ',', '.');

      $sql6 = "SELECT saldoant FROM saldo where idSaldo = 1";
         $result6 = mysqli_query($conn,$sql6) or die (mysql_error());
         while ($linha6 = mysqli_fetch_array($result6)) {
             $saldoant = $linha6['saldoant']; }
             $saldoant2 = number_format($saldoant, 2, ',', '.');       

    /*  $saidasT = $saidas+$sangra;
      $saldo = $ent_din-$saidasT;
      $saidas2 = number_format($saidasT, 2, ',', '.');
      $saldo2 = number_format($saldo, 2, ',', '.');

      $ent_tot = ($ent_din + $ent_cre + $ent_deb);
      $ent_tot = number_format($ent_tot, 2, ',', '.');*/

      $saidasT = $saidas+$sangra;
      $saldonovo = $ent_din+$saldoant-$saidasT; //$ent_din-$saidasT;
      $saldo1 = $ent_din-$saidasT;
      $saidas2 = number_format($saidasT, 2, ',', '.');
      $saldo2 = number_format($saldonovo, 2, ',', '.');
      $saldo1 = number_format($saldo1, 2, ',', '.');
      
      $saldofin = $saldo+$saldoant;
      $saldofin2 = number_format($saldofin, 2, ',', '.');

      $ent_tot = ($ent_din + $ent_cre + $ent_deb);
      $ent_tot2 = number_format($ent_tot, 2, ',', '.');  
 

      if($saldo > 0) $cor = "color='blue'"; else $cor = "color='red'";
    /*  echo "CAIXA: Entradas: Dinheiro:<font color='blue'>R$ ".$ent_din2."</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Débito:<font color='blue'>R$ ".$ent_deb2."</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Crédito:<font color='blue'>R$ ".$ent_cre2."</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ENTRADA TOTAL:<font color='blue'>R$  ".$ent_tot;
      echo "<br />";  
      echo "Saídas: <font color='red'>R$ ".$saidas2."</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Saldo de hoje: <font $cor>R$ ".$saldo2."</font>";*/

      echo "CAIXA: Entradas: Dinheiro:<font color='blue'>R$ ".$ent_din2."</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Débito:<font color='blue'>R$ ".$ent_deb2."</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Crédito:<font color='blue'>R$ ".$ent_cre2."</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ENTRADA TOTAL:<font color='blue'>R$  ".$ent_tot2;
      echo "<br />";  
      echo "Saldo dia anterior: <font color='red'>R$ ".$saldoant2."</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Saídas: <font color='red'>R$ ".$saidas2."</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Saldo hoje: <font $cor>R$ ".$saldo1."</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Saldo em dinheiro: <font $cor>R$ ".$saldo2."</font>";
    }
    ?>
  </center>
  <?php 
      $sql = "UPDATE caixasaldo SET saida='$saidas', sangria='$sangra' where data='$dataH'"; 
      $result = @mysqli_query($conn,$sql);
  ?>
 </div>
    <footer id="footer">   
       <?php include "footer.php"; ?>
    </footer>
</body>
</html>