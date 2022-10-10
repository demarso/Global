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
  <link rel="stylesheet" type="text/css" href="css/estilo.css?version=12"/>
  <link rel="stylesheet" href="css/style_menu.css?version=12" type="text/css"/>
  <script type="text/javascript" src="include/jquery-1.3.2.js"></script>
  <script type="text/javascript" src="include/script.js"></script>
  <script type="text/javascript" src="include/jquery-latest.min.js"></script>
  <script type="text/javascript" src="include/script_menu.js"></script>
  <script type="text/javascript" src="include/jquery.inputmask.bundle.js"></script>
   <script language="javascript" src="include/micoxAjax.js"></script>
<script type="text/javascript">
    
       /* $(document).ready(function(){
            $("#placa").inputmask({mask: 'AAA-9999'});
           
          });*/


        function tonal(tipo){
               var a = tipo;
               document.location = "consProducao.php?tip="+a;
        }

        function mudaFoto(foto){
                document.getElementById("icone").src = foto;
        }

        function checar1(pagina) 
        { 
           if (confirm("CONFIRMA A INCLUSÃO DE UM CONSULTOR?")==true) 
              { 
                window.location=pagina; 
              } 
        }

        function checar2() {
          var cons = document.getElementById('consultor').value;
          if(cons != ""){
             if (confirm("CONFIRMA EXCLUSÃO DO CONSULTOR?")==true) {
                 window.location="delConsultor.php?nome="+cons; 
             }
          } 
          else{
            alert("SELECIONA UM CONSULTOR");
            return false;
          }
        }
       
        function checar4() {
          var cons = document.getElementById('consultor').value;
          if(cons != ""){
             if (confirm("CONFIRMA EDIÇÃO DO CONSULTOR?")==true) {
                 window.location="editConsultor.php?nome="+cons; 
             }
          } 
          else{
            alert("SELECIONA UM CONSULTOR");
            return false;
          }
        }

        function checar3() {
          var inst = document.getElementById('instalador').value;
          if(inst != ""){
             if (confirm("CONFIRMA EXCLUSÃO DO INSTALADOR?")==true) {
                window.location="delInstalador.php?nome="+inst; 
            }
          } 
          else{
            alert("SELECIONA UM INSTALADOR");
            return false;
          }  
        }

        function placaChecar()
        { 
            window.location="placaChecar.php?placa="+document.getElementById('placa').value;
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
<?php include "cabecalho1P.php"; 
  $datacad = date('Y-m-d');
  $horacad = date('H:i');
  $datacad2 = date('Y/m/d');
  $horacad2 = date('H:i');
  $regi = $_SESSION['regio'];
 ?>
<div id="interface">
 <form name="form1" method="post" action="cadProducaoOK.php" onsubmit="placaChecar()">
  <div id="palco5">
   <H1>CADASTRO</H1>
   <table>
    <td><h3>Data/Hora:</h3>
      <td>
       <input type="date" name="datacadA" id="datacadA" size="10" tabindex="-1" value="<? echo $datacad ?>" readonly="true">
       &nbsp;&nbsp;&nbsp;
       <input type="time" name="horacadA" id="horacadA" size="4" tabindex="-1" value="<? echo $horacad ?>" readonly="true">
     </td>
    <tr>
        <td><h3>Consultor:</h3>
        </td>
         <td>
          <select name="consultor" id="consultor" tabindex="1" required="true" onchange="ajaxGet('processConsultaId.php?Nome='+this.value,document.getElementById('idc'),true);">
            <option value="">---</option>
              <?php
                include ("conexao.php");
                $sql = "SELECT nome FROM consultor WHERE status='Ativo' AND regional='$regi' || status='Ativo' AND regional='PLANTAO' || status='Ativo' AND $_SESSION[nivel] = 0 || status='Ativo' AND $_SESSION[nivel] = 10 ORDER BY nome";
                $results = mysqli_query($conn,$sql);
                while ( $row = mysqli_fetch_array($results) ) {
                  echo "<option value='".$row[0]."'>".$row[0]."</option>";
                }
              ?>
          </select>
         </td><td><b><input type="text" name="idc" id="idc" size="3" style="text-align:right; color:blue;" readonly="true" /></b></td>
      </tr>
<!--  <tr><td align="left">
          <? /*
           echo "<a href=\"javascript:checar1('cadConsultor.php');\"><img src=\"imagens/mais.png\" width=\"20\" border=\"0\" alt=\"Click para cadastrar um Consultor.\" title=\"Click para cadastrar um Consultor.\"></a>"; 
           echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
           echo "<a href=\"javascript:checar2();\"><img src=\"imagens/letra-d.png\" width=\"20\" border=\"0\" alt=\"Click para excluir um Consultor.\" title=\"Click para excluir um Consultor.\"></a>";
           echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
           echo "<a href=\"javascript:checar4();\"><img src=\"imagens/letra-e.png\" width=\"20\" border=\"0\" alt=\"Click para editar um Consultor.\" title=\"Click para editar um Consultor.\"></a>";*/
          ?></td>
      </tr> -->
    <tr>
        <td><h3>Associado:</h3></td>
         <td>
           <input type="text" name="associado" id="associado" size="30" value="<? echo  $associado; ?>" tabindex="2" required="true">
         </td>
    </tr>
    <tr>
        <td><h3>Veículo:</h3></td>
         <td>
           <input type="text" name="veiculo" size="30" tabindex="3" value="<? echo  $veiculo; ?>" required="true">
         </td>
    </tr>
    <tr>
        <td><h3>Placa</h3></td>
         <td>
         <input type="text" name="placa" id="placa" size="10" maxlength="8" tabindex="4" style='text-transform:uppercase'>
         </td>
     </tr>
     <tr>
         <td><h3>Carro Reserva:</h3></td>
         <td>
             <INPUT TYPE="RADIO" NAME="reserva" VALUE="Não" tabindex="6" required="true">Não
             <INPUT TYPE="RADIO" NAME="reserva" VALUE="7">7 dias
             <INPUT TYPE="RADIO" NAME="reserva" VALUE="15">15 dias
             <INPUT TYPE="RADIO" NAME="reserva" VALUE="30">30 dias
             <INPUT TYPE="RADIO" NAME="reserva" VALUE="45">45 dias
             <INPUT TYPE="RADIO" NAME="reserva" VALUE="60">60 dias
         </td>
    </tr>
     </table>
  </div>
  <div id="palco6"> 
   <table>
    <tr>
         <td><h3>Data da Proposta:</h3></d>
         <td style="border-color:transparent"><input type="date" name="dataP" id="dataP" tabindex="4"   size="8" maxlength="10" required="true" title="Informe a data do serviço"/>
       <!--  |onKeyPress="MascaraData(form1.dataP)"|     <input TYPE="button" NAME="btnData1" VALUE="---" Onclick="javascript:popdate('document.form1.dataP','pop2','150',document.form1.dataP.value)" required="true">
              <span id="pop2" style="position:absolute"></span> -->
          </td>
    </tr>
    <tr>
         <td><h3>Data de Recebimento:</h3></td>
         <td style="border-color:transparent"><input type="date" name="dataR" id="dataR" tabindex="5"  size="8" maxlength="10" required="true" title="Informe a data do serviço"/>
     <!--   |onKeyPress="MascaraData(form1.dataR)"|       <input TYPE="button" NAME="btnData1" VALUE="---" Onclick="javascript:popdate('document.form1.dataR','pop3','150',document.form1.dataR.value)" required="true">
              <span id="pop3" style="position:absolute"></span>-->
          </td>
   </tr>
    <tr>
         <td><h3>Instalar Rastreador?</h3></td>
         <td>
             <INPUT TYPE="RADIO" NAME="rastrea" VALUE="Sim" tabindex="6" required> Sim
             <INPUT TYPE="RADIO" NAME="rastrea" VALUE="Não"> Não 
         </td>
    </tr>
   <tr>
         <td><h3>Substituição</h3></td>
         <td>
             <INPUT TYPE="RADIO" NAME="substituicao" VALUE="Sim" tabindex="6" required> Sim
             <INPUT TYPE="RADIO" NAME="substituicao" VALUE="Não"> Não 
         </td>
    </tr>
    <tr>
         <td><h3>Migração</h3></td>
         <td>
             <INPUT TYPE="RADIO" NAME="migracao" VALUE="Sim" tabindex="7" required> Sim
             <INPUT TYPE="RADIO" NAME="migracao" VALUE="Não" > Não 
         </td>
    </tr>
    <tr>
    <td><h3>Reativação:</h3></td>
         <td>
             <INPUT TYPE="RADIO" NAME="reativacao" VALUE="Sim" tabindex="8"> Sim
             <INPUT TYPE="RADIO" NAME="reativacao" VALUE="Não"> Não 
         </td>
    </tr>
<!--    <tr>
         <td><h3>Pendência:</h3></td>
         <td>
             <INPUT TYPE="RADIO" NAME="pendencia" VALUE="CNH" tabindex="9"> CNH
             <INPUT TYPE="RADIO" NAME="pendencia" VALUE="Doc Veículo"> Doc Veículo
             <INPUT TYPE="RADIO" NAME="pendencia" VALUE="Comp. Residência"> Comp. Residência
         </td>
    </tr>
    <tr><td><h3>&nbsp;</h3></td>
         <td>
             <INPUT TYPE="RADIO" NAME="pendencia" VALUE="Boleto de Migração"> Boleto de Migração 
             <INPUT TYPE="RADIO" NAME="pendencia" VALUE="Não"> Não
         </td>
    </tr>
    <tr>
         <td><h3>Obs Produção:</h3></td>
         <td><input type="text" name="obsprod" size="30" tabindex="10"></td>
    </tr> -->
   </table>
  </div>
  
  <center>
    <table>
      <tr>
         <td colspan="4" align="center"><hr align="center" width="600" size="1" color=red></td>
       </tr>
       <tr>
         <td colspan="4" align="center"><input type="submit" size="150" value="CADASTRAR"></td>  
         </td>
       </tr>
    </table>
    </center>
   </form>
</div>
   <footer id="footer">   
    <?php include "footer.php"; ?>
   </footer>

</body>
</html>