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
  <script type="text/javascript">
        $(document).ready(function(){
            $("#placa").inputmask({mask: 'AAA-9999'});
           
          });


        function tonal(){
               var a = document.getElementById('plac').value;
               document.location = "cadProducao_edita.php?tip="+a;
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
</head>
<body>
  <?php 
    include "cabecalho1P.php"; 
    $datacad = date('Y-m-d');
    $horacad = date('H:i');
    $datacad2 = date('Y/m/d');
    $horacad2 = date('H:i');
    $ano = date('Y');
    $regi = $_SESSION['regio'];
    include ("conexao.php");
  ?>
 <div id="interface">
  <H1>EDITA CADASTRO DA PROPOSTA</H1>
  <div id="palco5">
   <table>
    <tr>
        <td><h3>Placa</h3></td>
         <td>
          <select name="plac" id="plac" tabindex="4" onchange="tonal();">
            <option value="">---</option>
              <?php
                                               
                $sql = "SELECT DISTINCT placa FROM producao WHERE placa != ''  GROUP BY placa ORDER BY placa";
                $results = mysqli_query($conn,$sql);
                while ( $row = mysqli_fetch_array($results) ) {
                  echo "<option value='".$row[0]."'>".$row[0]."</option>";
                }
              ?>
          </select>
         </td>
    </tr>
   </table>
   <?php 
    
    if(isset($_GET['tip'])){
    $plac = $_GET['tip'];
    $sql = "SELECT *, DATE_FORMAT(dataProposta,'%d/%m/%Y') as idataProposta, DATE_FORMAT(dataRecebimento,'%d/%m/%Y') as idataRecebimento, DATE_FORMAT(dataInstalacao,'%d/%m/%Y') as idataInstalacao FROM producao WHERE placa='$plac' AND YEAR(dataProposta) = '$ano'";
    //WHERE MONTH(dataProposta) = '$mes'
    $resultado = mysqli_query($conn,$sql) or die (mysql_error());
    while ($linha = mysqli_fetch_array($resultado)) {
      
      $idProducao = $linha['idProducao'];
      $id = $linha['idConsultor']; 
      $associado = $linha['associado']; 
      $veiculo = $linha['veiculo'];
      $placa = $linha['placa']; 
      $dataProposta = $linha['idataProposta'];
      $dataRecebimento = $linha['idataRecebimento']; 
      $substituicao = $linha['substituicao']; 
      $migracao = $linha['migracao']; 
      $vistoria = $linha['vistoria'];
      $pendencia = $linha['pendencia']; 
      $obsProducao = $linha['obsprod']; 
      $rastreador = $linha['rastreador']; 
      $dataInstalacao = $linha['idataInstalacao']; 
      $localInstalacao = $linha['local']; 
      $equipamento = $linha['equipamento']; 
      $instalador = $linha['instalador'];
      $corte = $linha['corte']; 
      $ship = $linha['chip']; 
      $obsInstalacao = $linha['obsinst'];
      $rastrea = $linha['rastrea'];
      $stat = $linha['status'];
      $valor = $linha['valor'];

      $sql1 = "SELECT * FROM consultor WHERE idConsultor = '$id'";
      $resultado1 = mysqli_query($conn,$sql1) or die (mysql_error());
      while ($linha1 = mysqli_fetch_array($resultado1)) {
       $consultor1 = $linha1['nome'];
       }
      
   ?>
  <form name="form1" method="post" action="cadProducao_editaOK.php">
    <table>
        <tr>
          <td><h3>Data/Hora:</h3></td>
          <td>
           <input type="date" name="datacadA" id="datacadA" size="10" tabindex="-1" value="<?php echo date('Y-m-d',strtotime($datacad));?>" readonly="true" />
          </td>
        </tr>
        <tr>
            <td><h3>Consultor:</h3></td>
             <td>
              <select name="consultor" id="consultor" tabindex="1" required="true">
                <option value="<? echo $consultor1; ?>"><? echo $consultor1; ?></option>
                  <?php
                    include ("conexao.php");
                    $sql = "SELECT nome FROM consultor WHERE status='Ativo' AND '$_SESSION[nivel]' = 0 || status='Ativo' AND '$_SESSION[nivel]' = 10 ORDER BY nome";
                    $results = mysqli_query($conn,$sql);
                    while ( $row = mysqli_fetch_array($results) ) {
                      echo "<option value='".$row[0]."'>".$row[0]."</option>";
                    }
                  ?>
              </select>
             </td>
        </tr>
        <tr>
            <td><h3>Associado:</h3></td>
             <td>
               <input type="text" name="associado" id="associado" size="30" value="<? echo  $associado; ?>" tabindex="2" required="true" />
             </td>
        </tr>
        <tr>
            <td><h3>Veículo:</h3></td>
             <td>
               <input type="text" name="veiculo" size="30" tabindex="3" value="<? echo  $veiculo; ?>" required="true" />
             </td>
        </tr>
        <tr>
            <td><h3>Placa</h3></td>
             <td>
             <input type="text" name="placa" id="placa" size="30" value="<? echo  $placa; ?>" tabindex="4" style='text-transform:uppercase' />
             </td>
         </tr>
         </table>
    </div>
    <div id="palco6"> 
        <table>
          <tr>
               <td><h3>Data da Proposta:</h3></td>
               <td style="border-color:transparent"><input type="date" name="dataP" id="dataP" tabindex="4"   size="8" maxlength="10" value="<?php// echo date('Y-m-d',strtotime($dataProposta));?>" title="Informe a data do serviço" />
               </td>
          </tr>
      <!--    <tr>
               <td><h3>Data de Recebimento:</h3></td>
               <td style="border-color:transparent"><input type="date" name="dataR" id="dataR" tabindex="5"  size="8" maxlength="10" value="<?php //echo date('Y-m-d',strtotime($dataRecebimento));?>" title="Informe a data do serviço" />
               </td>
         </tr> -->
          <tr>
            <td><h3>Rastreador:</h3></td>
             <td>
                   <INPUT TYPE="RADIO" NAME="rastreador" VALUE="Instalado" tabindex="11" 
                   <? if($rastreador == "Instalado"){?> checked="true" <?}?>> Instalado
                   <INPUT TYPE="RADIO" NAME="rastreador" VALUE="Agendar" 
                   <? if($rastreador == "Não Instalado"){?> checked="true" <?}?>> Não Instalado
             </td>
          </tr>
         <tr>
               <td><h3>Substituição</h3></td>
               <td>
                   <INPUT TYPE="RADIO" NAME="substituicao" VALUE="Sim" tabindex="6" 
                    <? if($substituicao == "Sim"){?> checked="true" <?}?>> Sim
                   <INPUT TYPE="RADIO" NAME="substituicao" VALUE="Não" 
                   <? if($substituicao == "Não"){?> checked="true" <?}?>> Não 
               </td>
          </tr>
          <td><h3>Reativação:</h3></td>
         <td>
             <INPUT TYPE="RADIO" NAME="reativacao" VALUE="Sim" tabindex="8"> Sim
             <INPUT TYPE="RADIO" NAME="reativacao" VALUE="Não"> Não 
         </td>
         </tr>
      <!--    <tr>
               <td><h3>Migração</h3></td>
               <td>
                   <INPUT TYPE="RADIO" NAME="migracao" VALUE="Sim" tabindex="7" 
                   <? if($migracao == "Sim"){?> checked="true" <?}?>> Sim
                   <INPUT TYPE="RADIO" NAME="migracao" VALUE="Não" 
                   <? if($migracao == "Não"){?> checked="true" <?}?>> Não 
               </td>
          </tr>
          <tr>
          <td><h3>Vistoria:</h3></td>
               <td>
                   <INPUT TYPE="RADIO" NAME="vistoria" VALUE="Sim" tabindex="8" 
                   <? if($vistoria == "Sim"){?> checked="true" <?}?>> Sim
                   <INPUT TYPE="RADIO" NAME="vistoria" VALUE="Não" 
                   <? if($vistoria == "Não"){?> checked="true" <?}?>> Não 
               </td>
          </tr>
          <tr>
               <td><h3>Pendência:</h3></td>
               <td>
                   <INPUT TYPE="RADIO" NAME="pendencia" VALUE="CNH" tabindex="9" 
                   <? if($pendencia == "CNH"){?> checked="true" <?}?>> CNH
                   <INPUT TYPE="RADIO" NAME="pendencia" VALUE="Doc Veículo" 
                   <? if($pendencia == "Doc Veículo"){?> checked="true" <?}?>> Doc Veículo
                   <INPUT TYPE="RADIO" NAME="pendencia" VALUE="Comp. Residência" 
                   <? if($pendencia == "Comp. Residência"){?> checked="true" <?}?>> Comp. Residência
               </td>
          </tr>
          <tr><td><h3>&nbsp;</h3></td>
               <td>
                   <INPUT TYPE="RADIO" NAME="pendencia" VALUE="Boleto de Migração" <? if($pendencia == "Boleto de Migração"){?> checked="true" <?}?>> Boleto de Migração 
                   <INPUT TYPE="RADIO" NAME="pendencia" VALUE="Não" <? if($pendencia == "Não"){?> checked="true" <?}?>> Não
               </td>
          </tr>
          <tr>
               <td><h3>Obs Produção:</h3></td>
               <td><input type="text" name="obsprod" size="30" tabindex="10" value="<? echo  $obsProducao; ?>" /></td>
          </tr>-->
        </table>
    </div>
        
         <center>
          <table>
            <tr>
               <td colspan="4" align="center"><hr align="center" width="600" size="1" color=red></td>
             </tr>
             <tr>
               <td colspan="4" align="center"><input type="submit" size="150" value="E D I T A R"></td>  
            </tr>
          </table>
         </center>     
  </form>
  <? }   
  } ?>
  </div>
 </div>
   <footer id="footer">   
    <?php include "footer.php"; ?>
   </footer>

</body>
</html>