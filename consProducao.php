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
 
   
        function tonal(){
               var a = document.getElementById('placa').value;
               document.location = "consProducao.php?tip="+a;
        }

        function tonal2(){
               var a = document.getElementById('associado').value;
               document.location = "consProducao2.php?tip="+a;
        }
        
        function checar5() {
            var assoc = document.getElementById('associado').value;
            if(assoc != ""){
               if (confirm("CONFIRMA EDIÇÃO DO ASSOCIADO?")==true) {
                   window.location="editAssociado.php?nome="+assoc; 
               }
            } 
            else{
              alert("SELECIONA UM ASSOCIADO");
              return false;
            }
          }

         function checar6() {
            var assoc = document.getElementById('placa').value;
            if(assoc != ""){
               if (confirm("CONFIRMA EDIÇÃO DA PLACA?")==true) {
                   window.location="editPlaca.php?pl="+assoc; 
               }
            } 
            else{
              alert("SELECIONA A PLACA");
              return false;
            }
          }

                
        function checar3(pagina) 
          { 
             if (confirm("CONFIRMA A INCLUSÃO DE UM INSTALADOR?")==true) 
                { 
                  window.location=pagina; 
                } 
          }

          function checar4() {
            var cons = document.getElementById('instalador').value;
            if(cons != ""){
               if (confirm("CONFIRMA EXCLUSÃO DO INSTALADOR?")==true) {
                   window.location="delInstalador.php?nome="+cons; 
               }
            } 
            else{
              alert("SELECIONA UM CONSULTOR");
              return false;
            }
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
<?php include "cabecalho1P.php";  ?>
<div id="interface">
 <?php 
   include "conexao.php";
   $datacad2 = date('Y-m-d');
   $horacad2 = date('H:i');
   $regi = $_SESSION['regio'];

if(isset($_GET["tip"])){
     $tonal2 = $_GET["tip"];
     $sql = "SELECT * FROM producao WHERE placa = '$tonal2'";
      $results = mysqli_query($conn,$sql);
      while ( $row = mysqli_fetch_array($results) ) {
      $idProd = $row['idProducao'];
      $id = $row['idConsultor']; 
      $associado = $row['associado']; 
      $veiculo = $row['veiculo'];
      $placa = $row['placa']; 
      $dataProposta = $row['dataProposta'];
      $dataRecebimento = $row['dataRecebimento']; 
      $substituicao = $row['substituicao']; 
      $migracao = $row['migracao']; 
      $vistoria = $row['vistoria'];
      $pendencia = $row['pendencia']; 
      $obsProducao = $row['obsProducao']; 
      $rastreador = $row['rastreador'];
      $rastrea = $row['rastrea']; 
      $dataInstalacao = $row['dataInstalacao'];
      $localInstalacao = $row['localInstalacao']; 
      $equipamento = $row['equipamento']; 
      $instalador = strtoupper($row['instalador']);
      $corte = $row['corte']; 
      $ship = $row['ship']; 
      $obsInstalacao = $row['obsInstalacao'];
      $datacad = $row['datacadA'];
      $horacad = $row['horacadA'];

      $sql1 = "SELECT idConsultor, nome FROM consultor WHERE idConsultor = '$id'";
      $resultado1 = mysqli_query($conn,$sql1) or die (mysql_error());
      while ($linha1 = mysqli_fetch_array($resultado1)) {
       $id = $linha1['idConsultor'];
       $consultor1 = $linha1['nome'];
     }
     
     if($rastrea == "Não"){
      echo "<script>alert('Veículo sem instalação de Rastreador!');history.back(-1);</script>";
      exit;
     }
  ?>

  <form name="form1" method="post" action="cadAtualizaOK.php" >
  <div id="palco3">
   <H3>CADASTRO</H3>
   <table>
   <tr>
    <input type="hidden" name="idProd" value="<? echo $idProd; ?>">
     <td><h3>Data / Hora:</h3></td>  
     <td>
       <input type="date" name="datacadA" id="datacadA" size="10" tabindex="-1" value="<? echo $datacad ?>" readonly="true">
       &nbsp;&nbsp;&nbsp;
       <input type="time" name="horacadA" id="horacadA" size="4" tabindex="-1" value="<? echo $horacad ?>" readonly="true">
     </td>
   </tr>
     <tr>
       <td><h3>Consultor:</h3></td>
        <td>
         <select name="consultor" id="consultor" tabindex="1" required="true">
            <option value="<? echo  $consultor1; ?>""><? echo  $consultor1; ?></option>
              <?php
                include ("conexao.php");
                $sql = "SELECT nome FROM consultor WHERE status='Ativo' AND regional='$regi' || status='Ativo' AND $_SESSION[nivel] = 0 || $_SESSION[nivel] = 10 ORDER BY nome";
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
           <input type="text" name="associado" id="associado" size="30" value="<? echo  $associado; ?>" tabindex="2" readonly="true">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
         <?
          echo "<a href=\"javascript:checar5();\"><img src=\"imagens/letra-e.png\" width=\"20\" border=\"0\" alt=\"Click para editar um Associado.\" title=\"Click para editar um Associado.\"></a>";
          ?>
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
         <td><h3>Data da Proposta:</h3></td>
         <td>
         <input type="date" name="dataP" id="dataP" size="30" tabindex="3" value="<? echo  $dataProposta; ?>" readonly="true">
         </td>
    </tr>
    <tr>
         <td><h3>Data de Recebimento:</h3></td>
         <td>
         <input type="date" name="dataR" id="dataR" size="30" tabindex="3" value="<? echo  $dataRecebimento; ?>" readonly="true">
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
    <tr>
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
             <INPUT TYPE="RADIO" NAME="pendencia" VALUE="Não" 
             <? if($pendencia == "Não"){?> checked="true" <?}?>> Não
         </td>
    </tr>
    <tr>
         <td><h3>Obs Produção:</h3></td>
         <td><input type="text" name="obsprod" size="30" tabindex="10" value="<? echo  $obsProducao; ?>"></td>
    </tr>
   </table>
  </div>
  <div id="palco4">
   <H3>RASTREADOR</H3>
   <table>
   <td><h3>Data / Hora:</h3></td>  
     <td>
      <input type="date" name="datacadB" id="datacadB" size="10" tabindex="-1" value="<? echo $datacad2 ?>" readonly="true">
       &nbsp;&nbsp;&nbsp;
      <input type="time" name="horacadB" id="horacadB" size="4" tabindex="-1" value="<? echo $horacad2 ?>" readonly="true">
     </td>
   </tr>
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
          <td><h3>Data da Instalação:</h3></td>
         <td style="border-color:transparent"><input type="date" name="data" id="data" tabindex="12" value="<? echo  $dataInstalacao; ?>"  size="8" maxlength="10" title="Informe a data do serviço"/>
      <!--  <input TYPE="button" NAME="btnData1" VALUE="" Onclick="javascript:popdate('document.form1.data','pop1','150',document.form1.data.value)">
              <span id="pop1" style="position:absolute"></span> -->
          </td>
     </tr>
    <tr>
         <td><h3>Local da Instalação:</h3></td>
         <td>
             <INPUT TYPE="RADIO" NAME="local" VALUE="Base" tabindex="13" 
             <? if($localInstalacao == "Base"){?> checked="true" <?}?>> Base
             <INPUT TYPE="RADIO" NAME="local" VALUE="Residência" 
             <? if($localInstalacao == "Residência"){?> checked="true" <?}?>> Residência 
         </td>
    </tr>
    <tr>     
         <td><h3>Equipamento:</h3></td>
         <td>
          <input type="text" name="equipamento" size="30" tabindex="14" value="<? echo  $equipamento; ?>">
         </td>
    </tr>
    <tr>
       <td><h3>Instalador:</h3></td>
         <td>
          <select name="instalador" id="instalador" tabindex="15" style='text-transform:uppercase'>
            <option value="<? echo  $instalador; ?>"><? echo  $instalador; ?></option>
            <?php
                include ("conexao.php");
                $sql = "SELECT nome FROM instalador Where status = 'Ativo' ORDER BY nome";
                $results = mysqli_query($conn,$sql);
                while ( $row = mysqli_fetch_array($results) ) {
                  echo "<option value='".$row[0]."'>".$row[0]."</option>";
                }
              ?>
          </select>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <?
           echo "<a href=\"javascript:checar3('cadInstalador.php');\"><img src=\"imagens/mais.png\" width=\"20\" border=\"0\" alt=\"Click para cadastrar um Instalador.\" title=\"Click para cadastrar um Instalador.\"></a>"; 
           echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
           echo "<a href=\"javascript:checar4();\"><img src=\"imagens/letra-d.png\" width=\"20\" border=\"0\" alt=\"Click para excluir um Instalador.\" title=\"Click para excluir um Instalador.\"></a>";
          ?>
         </td>
      </tr>
      <tr> 
         <td><h3>Corte:</h3></td>
         <td>
             <INPUT TYPE="RADIO" NAME="corte" VALUE="Sim" tabindex="16" 
             <? if($corte == "Sim"){?> checked="true" <?}?>> Sim
             <INPUT TYPE="RADIO" NAME="corte" VALUE="Não" 
             <? if($corte == "Não"){?> checked="true" <?}?>> Não 
         </td>
      </tr>
       <tr>
         <td><h3>Chip:</h3></td>
         <td>
             <INPUT TYPE="RADIO" NAME="ship" VALUE="TIM" tabindex="17" 
             <? if($ship == "TIM"){?> checked="true" <?}?>> TIM
             <INPUT TYPE="RADIO" NAME="ship" VALUE="CLARO" 
             <? if($ship == "CLARO"){?> checked="true" <?}?>> CLARO
             <INPUT TYPE="RADIO" NAME="ship" VALUE="VIVO" 
             <? if($ship == "VIVO"){?> checked="true" <?}?>> VIVO
             <INPUT TYPE="RADIO" NAME="ship" VALUE="OI" 
             <? if($ship == "OI"){?> checked="true" <?}?>> OI
         </td>
       </tr>
       <tr>
         <td><h3>Obs Instalação:</h3></td>
         <td><input type="text" name="obsinst" size="30" tabindex="18" value="<? echo  $obsInstalacao; ?>" ></td>
       </tr>
       </table>
  </div>
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
  <?}
}
else{?>
  <form name="form1" method="post" action="#" >
  <div id="palco3">
   <H3>CADASTRO</H3>
   <table>
   <tr>
     <td><h3>Data / Hora:</h3></td>  
     <td>
       <input type="date" name="datacadA" id="datacadA" size="10" tabindex="-1" value="<? echo $datacad ?>" readonly="true">
       &nbsp;&nbsp;&nbsp;
       <input type="time" name="horacadA" id="horacadA" size="4" tabindex="-1" value="<? echo $horacad ?>" readonly="true">
     </td>
   </tr>
     <tr>
       <td><h3>Consultor:</h3></td>
        <td>
        <input type="text" name="consultor" id="consultor" size="30" value="<? echo  $consultor; ?>" tabindex="2" readonly="true">
         
        </td>
    </tr>
    <tr>
        <td><h3>Associado:</h3></td>
         <td>
           <select name="associado" id="associado" tabindex="3" onchange="tonal2();">
            <option value="">---</option>
              <?php
                include ("conexao.php");
                $sql = "SELECT distinct(associado) FROM producao GROUP BY associado ORDER BY associado";
                $results = mysqli_query($conn,$sql);
                while ( $row = mysqli_fetch_array($results) ) {
                  echo "<option value='".$row[0]."'>".$row[0]."</option>";
                }
              ?>
          </select>
         </td>
    </tr>
    <tr>
        <td><h3>Veículo:</h3></td>
         <td>
           <input type="text" name="veiculo" size="30" tabindex="3" value="<? echo  $veiculo; ?>">
         </td>
    </tr>
    <tr>
        <td><h3>Placa</h3></td>
         <td>
          <select name="placa" id="placa" tabindex="4" onchange="tonal();">
            <option value="">---</option>
              <?php
                include ("conexao.php");
                               
                $sql2 = "SELECT DISTINCT placa FROM producao WHERE placa != ''  GROUP BY placa ORDER BY placa";
                $results2 = mysqli_query($conn,$sql2);
                while ( $row2 = mysqli_fetch_array($results2) ) {
                  echo "<option value='".$row2[0]."'>".$row2[0]."</option>";
                }
              ?>
          </select>
         </td>
    </tr>
    <tr>
         <td><h3>Data da Proposta:</h3></td>
         <td>
         <input type="date" name="dataP" id="dataP" tabindex="4" value="<? echo  $dataProposta; ?>" readonly="true"></td>
    </tr>
    <tr>
         <td><h3>Data de Recebimento:</h3></td>
         <td><input type="date" name="dataR" id="dataR" tabindex="5" value="<? echo  $dataRecebimento; ?>" readonly="true"></td>
   </tr>
   <tr>
         <td><h3>Substituição</h3></td>
         <td>
             <INPUT TYPE="RADIO" NAME="substituicao" VALUE="Sim" tabindex="6" 
              <? if($substituicao == "Sim"){?> cheked="true" <?}?> readonly="true"> Sim
             <INPUT TYPE="RADIO" NAME="substituicao" VALUE="Não" 
             <? if($substituicao == "Não"){?> cheked="true" <?}?> readonly="true"> Não 
         </td>
    </tr>
    <tr>
         <td><h3>Migração</h3></td>
         <td>
             <INPUT TYPE="RADIO" NAME="migracao" VALUE="Sim" tabindex="7" 
             <? if($migracao == "Sim"){?> cheked="true" <?}?> readonly="true"> Sim
             <INPUT TYPE="RADIO" NAME="migracao" VALUE="Não" 
             <? if($migracao == "Não"){?> cheked="true" <?}?> readonly="true"> Não 
         </td>
    </tr>
    <tr>
    <td><h3>Vistoria:</h3></td>
         <td>
             <INPUT TYPE="RADIO" NAME="vistoria" VALUE="Sim" tabindex="8" 
             <? if($vistoria == "Sim"){?> cheked="true" <?}?> readonly="true"> Sim
             <INPUT TYPE="RADIO" NAME="vistoria" VALUE="Não" 
             <? if($vistoria == "Não"){?> cheked="true" <?}?> readonly="true"> Não 
         </td>
    </tr>
    <tr>
         <td><h3>Pendência:</h3></td>
         <td>
             <INPUT TYPE="RADIO" NAME="pendencia" VALUE="CNH" tabindex="9" 
             <? if($pendencia == "CNH"){?> cheked="true" <?}?> readonly="true"> CNH
             <INPUT TYPE="RADIO" NAME="pendencia" VALUE="Doc Veículo" 
             <? if($pendencia == "Doc Veículo"){?> cheked="true" <?}?> readonly="true"> Doc Veículo
             <INPUT TYPE="RADIO" NAME="pendencia" VALUE="Comp. Residência" 
             <? if($pendencia == "Comp. Residência"){?> cheked="true" <?}?> readonly="true"> Comp. Residência 
         </td>
    </tr>
    <tr>
         <td><h3>Obs Produção:</h3></td>
         <td><input type="text" name="obsprod" size="30" tabindex="10" value="<? echo  $obsProducao; ?>" readonly="true"></td>
    </tr>
   </table>
  </div>
  <div id="palco4">
   <H3>RASTREADOR</H3>
   <table>
    <tr>
      <td><h3>Rastreador:</h3></td>
       <td>
             <INPUT TYPE="RADIO" NAME="rastreador" VALUE="Instalado" tabindex="11" 
             <? if($rastreador == "Instalado"){?> cheked="true" <?}?> readonly="true"> Instalado
             <INPUT TYPE="RADIO" NAME="rastreador" VALUE="Não Instalado" 
             <? if($rastreador == "Não Instalado"){?> cheked="true" <?}?> readonly="true"> Não Instalado
       </td>
    </tr>
    <tr>
          <td><h3>Data da Instalação:</h3></td>
         <td><input type="date" name="data" id="data" tabindex="12" value="<? echo  $dataInstalacao; ?>" readonly="true"></td>
     </tr>
    <tr>
         <td><h3>Local da Instalação:</h3></td>
         <td>
             <INPUT TYPE="RADIO" NAME="local" VALUE="Base" tabindex="13" 
             <? if($local == "Base"){?> cheked="true" <?}?> readonly="true"> Base
             <INPUT TYPE="RADIO" NAME="local" VALUE="Residência" 
             <? if($local == "Residência"){?> cheked="true" <?}?> readonly="true"> Residência 
         </td>
    </tr>
    <tr>     
         <td><h3>Equipamento:</h3></td>
         <td>
          <input type="text" name="equipamento" size="30" tabindex="14" value="<? echo  $equipamento; ?>" readonly="true">
         </td>
    </tr>
    <tr>
       <td><h3>Instalador:</h3></td>
         <td>
         <input type="text" name="instalador" size="30" tabindex="14" value="<? echo  $instalador; ?>" readonly="true">
          
         </td>
      </tr>
      <tr> 
         <td><h3>Corte:</h3></td>
         <td>
             <INPUT TYPE="RADIO" NAME="corte" VALUE="Sim" tabindex="16" 
             <? if($corte == "Sim"){?> cheked="true" <?}?> readonly="true"> Sim
             <INPUT TYPE="RADIO" NAME="corte" VALUE="Não" 
             <? if($corte == "Não"){?> cheked="true" <?}?> readonly="true"> Não 
         </td>
      </tr>
       <tr>
         <td><h3>Chip:</h3></td>
         <td>
             <INPUT TYPE="RADIO" NAME="chip" VALUE="TIM" tabindex="17" 
             <? if($chip == "TIM"){?> cheked="true" <?}?> readonly="true"> TIM
             <INPUT TYPE="RADIO" NAME="chip" VALUE="CLARO" 
             <? if($chip == "CLARO"){?> cheked="true" <?}?> readonly="true"> CLARO
             <INPUT TYPE="RADIO" NAME="chip" VALUE="VIVO" 
             <? if($chip == "VIVO"){?> cheked="true" <?}?> readonly="true"> VIVO
             <INPUT TYPE="RADIO" NAME="chip" VALUE="OI" 
             <? if($chip == "OI"){?> cheked="true" <?}?> readonly="true"> OI
         </td>
       </tr>
       <tr>
         <td><h3>Obs Instalação:</h3></td>
         <td><input type="text" name="obsinst" size="30" tabindex="18" value="<? echo  $obsInstalacao; ?>" readonly="true"></td>
       </tr>
       </table>
  </div>
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
 <footer id="footer">   
   <?php include "footer.php"; ?>
</footer>

</body>
</html>