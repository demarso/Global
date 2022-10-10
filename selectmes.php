<?php
session_start();
date_default_timezone_set('America/Sao_Paulo');
if (!isset($_SESSION['id'])){
    header("Location: index.php?erro=1");
    exit;
 }
 ?>
<form action="<? $myself ?>" method="post">
  <tr>
  <td><h3>Mês:</h3></td>
    <td><select name='mes1' id='mes1'>
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
        </select></td>
     <td>&nbsp;&nbsp;</td>    
    <td><h3>Ano:</h3></td>
    <td><select name='ano1' id='ano1' onchange="this.form.submit()">
            <option value="2017">2017</option>
            <option value="2018">2018</option>
            <option value="2019">2019</option>
            <option value="2020">2020</option>
            <option value="2021">2021</option>
            <option value="2022">2022</option>
        </select></td>
  </form>
<?php
  $_SESSION['mes1'] = $_POST['mes1'];
  $_SESSION['ano1'] = $_POST['ano1'];

  include "producao.php";
?>