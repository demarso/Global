<?php
session_start();
date_default_timezone_set('America/Sao_Paulo');
if (!isset($_SESSION['id'])){
    header("Location: index.php?erro=1");
    exit;
 }
 ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta http-equiv="Content-type" content="text/html; charset=UTF-8"/>
  <link rel="stylesheet" type="text/css" href="css/estilo.css?version=12" />
  <link rel="stylesheet" type="text/css" href="css/style_menu.css" />
  <script type="text/javascript" src="include/jquery-1.3.2.js"></script>
  <script type="text/javascript" src="include/script.js"></script>
  <script type="text/javascript" src="include/jquery-latest.min.js"></script>
  <script type="text/javascript" src="include/script_menu.js"></script>
  <!--<script type="text/javascript" src="include/micoxAjax.js"></script>-->
  <title>Gestão de Propostas</title> 
<script type="text/javascript">
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
</script>
</head>
<body>
<?php include "cabecalho1P.php";  ?>
<div id="interface">
 <?php 
   include "conexao.php";
   
   $val = $_GET['val'];

     $sql = "SELECT * FROM producao WHERE idProducao = '$val'";
      $results = mysqli_query($conn,$sql);
      while ( $row = mysqli_fetch_array($results) ) {
      $idProd = $row['idProducao'];
      $id = $row['idConsultor']; 
      $associado = $row['associado']; 
      $veiculo = $row['veiculo'];
      $placa = $row['placa']; 
      
      $sql1 = "SELECT idConsultor, nome FROM consultor WHERE idConsultor = '$id'";
      $resultado1 = mysqli_query($conn,$sql1) or die (mysql_error());
      while ($linha1 = mysqli_fetch_array($resultado1)) {
       $id = $linha1['idConsultor'];
       $consultor1 = $linha1['nome'];
     }

  ?>

 <form name="form1" method="post" action="cadValorOK.php" >
  <div id="palco3">
   <H2>LANÇA VALOR DO VEÍCULO</H2>
   <table>
   <tr>
    <input type="hidden" name="idProd" value="<? echo $idProd; ?>">
     <tr>
       <td><h3>Consultor:</h3></td>
        <td>
         <input type="text" name="consultor" id="consultor" size="50" value="<? echo  $consultor1; ?>" tabindex="2" readonly="true">
        </td>
    </tr>
    <tr>
        <td><h3>Associado:</h3></td>
         <td>
           <input type="text" name="associado" id="associado" size="50" value="<? echo  $associado; ?>" tabindex="2" readonly="true">
       
        </td>
    </tr>
    <tr>
        <td><h3>Veículo:</h3></td>
         <td>
           <input type="text" name="veiculo" size="30" tabindex="3" value="<? echo  $veiculo; ?>" readonly="true">
         </td>
    </tr>
    <tr>
        <td><h3>Placa</h3></td>
         <td>
         <input type="text" name="placa" size="10" tabindex="3" value="<? echo  $placa; ?>" readonly="true">
         </td>
     </tr>
    <tr>
         <td><h3>Valor:</h3></td>
         <td>
         <input type="text" name="valor" id="valor" size="10" tabindex="3" onkeyup="maskIt(this,event,'###.###.###,##',true)" style="text-align: right;">
         </td>
    </tr>
   </table>
   
    <center><br />
    <table>
      <tr>
         <td colspan="4" align="center"><hr align="center" width="600" size="1" color=red></td>
       </tr>
       <tr>
         <td colspan="4" align="center"><input type="submit" size="150" value="ATUALIZAR"></td>  
         </td>
       </tr>
    </table>
    </center>
  </form>

  <?}?>
</div>
</div>
 <footer id="footer">   
   <?php include "footer.php"; ?>
</footer>

</body>
</html>