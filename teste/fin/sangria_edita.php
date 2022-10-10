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
  <link rel="stylesheet" type="text/css" href="css/style.css"/>
 <title>Gestão de Finanças</title>
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

          function carrega(){
             datac1 = document.getElementById("datac1").value;
             datacf1 = document.getElementById("datacf1").value;
             $("#datac").val(datac1);
             $("#dataf").val(datacf1);
          }

  </script>
<style>
    .dia {font-family: helvetica, arial; font-size: 8pt; color: #FFFFFF}
    .data {font-family: helvetica, arial; font-size: 8pt; text-decoration:none; color:#191970}
    .mes {font-family: helvetica, arial; font-size: 8pt}
    .Cabecalho_Calendario {font-family: helvetica, arial; font-size: 10pt; color: #000000; text-decoration:none; font-weight:bold}
</style>
</head>
<body>
<div id="interface">
<?php include "menu.php"; ?>
 <?php 
   $datacad = date('d/m/Y');
   $horacad = date('H:i');
   $datacad2 = date('d/m/Y');
   $horacad2 = date('H:i');

   $id = $_GET['id'];

   include 'conexao.php';

    $sql = "select *,DATE_FORMAT(dataCaixa,'%d/%m/%Y') as datc, DATE_FORMAT(dataFinanceiro,'%d/%m/%Y') as datf from sangria where idSangria='$id' order by dataCaixa";
    $resultado = mysqli_query($conn,$sql) or die (mysql_error());

     while ($linha = mysqli_fetch_array($resultado)) {
      $id = $linha['idSangria'];
      $datac = $linha['datc'];
      $dataf = $linha['datf'];
      $valor = $linha['valor'];
       //$datacF = trim($datac);
      // $datacF = date("**d-m-Y**", strtotime($datacF));
      // $datafF = trim($dataf);
       //$datafF = date("**d-m-Y**", strtotime($datafF));

     //echo $id." ".$datac." ".$dataf." ".$valor;
 ?>
  <br /><br />
  
 <form name="form1" method="post" action="sangriaEditaOK.php" onload="carrega();" >
          <table>
            <input type="hidden" name="id" id="id" size="10" value="<? echo $id; ?>">
            
        <tr>
            <td><h3>Data Caixa:</h3></td>
             <td>
               <input type="date" name="datac" id="datac" size="15" tabindex="6" value="<?php echo date('Y-m-d',strtotime($datac));?>" required="true">
             </td>
        </tr>
        <tr>
            <td><h3>Data Financeiro:</h3></td>
             <td>
               <input type="date" name="dataf" id="dataf" size="15" tabindex="6" value="<?php echo date('Y-m-d',strtotime($dataf));?>" required="true">
               
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
             <td colspan="4" align="center"><input type="submit" size="150" value="EDITAR">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
             <input type="reset" value="LIMPA" /></td> 
             
           </tr>
        </table>
    </center>
   
         </form>
 <? } ?>
 </div>
  <footer id="footer">   
     <?php include "footer.php"; ?>
  </footer>
</body>
</html>