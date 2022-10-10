<?php
include ('class.ezpdf.php');
$pdf =& new Cezpdf();
$pdf->selectFont('./fonts/Helvetica.afm');

include "conexao.php";

$sql = "SELECT numero,solicitante,ramal,descricao,solicitacao,executante,conclusao,observacao FROM solicitacao";

if ($sql == ""){
echo "Nуo existe esse solicitaчуo de Manutenчуo";
}
else{
$resultado = mysql_query($sql) or die (mysql_error());

$cols = array('numero'=>"Nњmero",'solicitante'=>'Solicitante','ramal'=>'Ramal','descricao'=>'Descriчуo','solicitacao'=>'Data','executante'=>'Executante','conclusao'=>'Conclusуo','observacao'=>'Obs');

$pdf->ezTable($cols);

while ($linha = mysql_fetch_array($resultado))
{
$numero = $linha["numero"];
$solicitante = $linha["solicitante"];
$ramal = $linha["ramal"];
$descricao = $linha["descricao"];
$solicitacao = $linha["solicitacao"];
$executante = $linha["executante"];
$conclusao = $linha["conclusao"];
$observacao = $linha["observacao"];

$data = array(
array('numero'=>$numero ,'Solicitante'=>$solicitante,'ramal'=>$ramal,'descricao'=>$descricao,'solicitacao'=>$solicitacao,'executante'=>$executante,'conclusao'=>$conclusao,'observacao'=>$observacao));


$pdf->ezTable($data,'Relatѓrio de Solicitaчѕes de Manutenчуo',
array('xPos'=>20,'xOrientation'=>'right','width'=>500
,'cols'=>array('numero'=>array('width'=>10),'solicitante'=>array('width'=>30))));
}};
$pdf->ezStream();
?>