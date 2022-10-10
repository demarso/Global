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
  <meta http-equiv="Content-type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Fin - Caixa</title>
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/style.css">
        <link rel="stylesheet" href="css/navbar.css">
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

  </script>
<style>
    .dia {font-family: helvetica, arial; font-size: 8pt; color: #FFFFFF}
    .data {font-family: helvetica, arial; font-size: 8pt; text-decoration:none; color:#191970}
    .mes {font-family: helvetica, arial; font-size: 8pt}
    .Cabecalho_Calendario {font-family: helvetica, arial; font-size: 10pt; color: #000000; text-decoration:none; font-weight:bold}
</style>
</head>
<body class="bg-info">
 <?  include "menu.php"; ?>  
<div class="container" id="home">
 <?php 
   $datacad = date('d/m/Y');
   $horacad = date('H:i');
   $datacad2 = date('d/m/Y');
   $horacad2 = date('H:i');

   $id = $_GET['id'];

   include 'conexao.php';

    $sql = "select *,DATE_FORMAT(data,'%d/%m/%Y') as dat from caixa where idCaixa='$id' order by data";
    $resultado = mysqli_query($conn,$sql) or die (mysql_error());

     while ($linha = mysqli_fetch_array($resultado)) {
      $id = $linha['idCaixa'];
      $empresa = $linha['empresa'];
      $associado = $linha['associado'];
      $boleto = $linha['boleto'];
      $recibo = $linha['recibo'];
      $motivo = $linha['motivo'];
      $descricao = $linha['descricao'];
      $data = $linha['dat'];
      $valor = $linha['valor'];
     
 ?>
  <br /><br /><br />
  <div id="caixa1">
  
  <form name="form1" method="post" action="caixaEditaOK.php" >
          <table>
            <input type="hidden" name="id" id="id" size="10" value="<? echo $id; ?>">
            <tr>
              <td><h3>Empresa:</h3></td>
              <td>
              <INPUT TYPE="RADIO" NAME="empresa" VALUE="global" tabindex="2" <? if($empresa == "global"){?> checked="true" <?}?>> Global
              <INPUT TYPE="RADIO" NAME="empresa" VALUE="jrx" <? if($empresa == "jrx"){?> checked="true" <?}?>> JRX
              <INPUT TYPE="RADIO" NAME="empresa" VALUE="oficina" <? if($empresa == "oficina"){?> checked="true" <?}?>> Oficina
             </td>
            </tr>
           <tr>
             <td><h3>Associado:</h3></td>
             <td>
               <input type="text" name="associado" id="associado" size="60" tabindex="1" value="<? echo $associado; ?>" style='text-transform:uppercase' required="true">
             </td>
           </tr>
        <tr>
           <td><h3>Pagamento:</h3></td>
             <td>
              <INPUT TYPE="RADIO" NAME="boleto" VALUE="Dinheiro" tabindex="2" <? if($boleto == "Dinheiro"){?> checked="true" <?}?>> Dinheiro
              <INPUT TYPE="RADIO" NAME="boleto" VALUE="Débito" <? if($boleto == "Débito"){?> checked="true" <?}?>> Débito
              <INPUT TYPE="RADIO" NAME="boleto" VALUE="Crédito" <? if($boleto == "Crédito"){?> checked="true" <?}?>> Crédito
             </td>
        </tr>
        <tr>
           <td><h3>Motivo:</h3></td>
           <td>
               <INPUT TYPE="RADIO" NAME="motivo" VALUE="Rastreador" tabindex="3" <? if($motivo == "Rastreador"){?> checked="true" <?}?>> Rastreador
               <INPUT TYPE="RADIO" NAME="motivo" VALUE="Vidro" <? if($motivo == "Vidro"){?> checked="true" <?}?>> Vidro
               <INPUT TYPE="RADIO" NAME="motivo" VALUE="Mensalidade" <? if($motivo == "Mensalidade"){?> checked="true" <?}?>> Mensalidade
               <INPUT TYPE="RADIO" NAME="motivo" VALUE="Franquia" <? if($motivo == "Franquia"){?> checked="true" <?}?>> Franquia
           </td>
            </tr>
        <tr>
            <td><h3>Recido:</h3></td>
             <td>
               <input type="text" name="recibo" id="recibo" size="10" tabindex="4" value="<? echo $recibo; ?>" required="true">
             </td>
        </tr>
        <tr>
            <td><h3>Descrição:</h3></td>
             <td>
               <input type="text" name="descricao" id="descricao" size="60" tabindex="5" value="<? echo $descricao; ?>" required="true">
             </td>
        </tr>
        <tr>
            <td><h3>Data:</h3></td>
             <td>
               <input type="date" name="data" id="data" size="15" tabindex="6" value="<?php echo date('Y-m-d',strtotime($data));?>" required="true">
             </td>
        </tr>
            <tr>
            <td><h3>Valor:</h3></td>
             <td>
              <input type="text" name="valor" size="10" value="<? echo $valor; ?>" onkeyup="maskIt(this,event,'###.###.###,##',true)" style="text-align: right;" >
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
             <td> <a href="entrada_caixa_lista.php"><img src="imagens/lista2.png" width="100"></a></td>
           </tr>
        </table>
    </center>
   
         </form>
 <? } ?>
 </div>
 </div>
 <? include "footer.html"; ?>
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/navbar.js"></script>
    <script src="js/script.js"></script>  
</body>
</html>