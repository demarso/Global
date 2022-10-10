<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta http-equiv="Content-type" content="text/html; charset=UTF-8"/>
  <link rel="stylesheet" type="text/css" href="css/estilo.css"/>
  <link rel="stylesheet" href="css/style_menu.css" type="text/css"/>
  <title>Produção do mês</title>
        <script type="text/javascript" src="include/jquery-1.3.2.js"></script>
        <script type="text/javascript" src="include/script.js"></script>
        <script type="text/javascript" src="include/jquery-latest.min.js"></script>
        <script type="text/javascript" src="include/script_menu.js"></script>
</head>
<body>
<?  

  include "cabecalhoLink.php"; 
    
   $_SESSION['id'] = 1;
   $mes = date("m");
   $ano = date("Y");
   $geral = 0;
 $eq = 'GLOBAL';
 $pass = $_GET['pass'];
if ($pass == "0cf0aa58f8e0f9423ddcbf1c84ba2745cd8811b0e3a9c62493e51e3af686fbc8"){
include "conexao.php";

      $sql0 = "SELECT idEquipe, nome, status FROM equipe WHERE status = 'Ativo'  AND nome = 'GLOBAL'";
      $results0 = mysqli_query($conn,$sql0);
      while ( $row0 = mysqli_fetch_array($results0) ){
              $ide = $row0['idEquipe'];
              $nom = $row0['nome'];
              $sta = $row0['status'];}
if($nom == 'GLOBAL') { 

 ?>
 
 
   <center>
   <H2>EQUIPE GLOBAL</H2>
   <table align="center" width="80%" border="1">
    <tr align="center" bgcolor="#CCCCCC">
      <td align="center" style="width: 10%"><font color="#333333" size="3"><b>Cod. Consultor</b></font></td> 
      <td align="center" style="width: 30%"><font color="#333333" size="3"><b>Consultor</b></font></td>
      <td align="center" style="width: 15%"><font color="#333333" size="3"><b>Normal</b></font></td>
      <td align="center" style="width: 15%"><font color="#333333" size="3"><b>Substituição</b></font></td>
      <td align="center" style="width: 15%"><font color="#333333" size="3"><b>Reativação</b></font></td>
      <td align="center" style="width: 15%"><font color="#333333" size="3"><b>Total</b></font></td>
    </tr>
  </table>

  <?php
  $ano = date("Y");
  $dia = date("d");
  $mes = date("m");

  $saldo = 0;  $con = 1; $consu=""; $tot =0;
  //echo $dia." / ".$mes." / ".$ano;

  $sql1 = "SELECT * FROM consultor WHERE  equipe = 'GLOBAL' AND status = 'Ativo' ORDER By nome";
  $resultado1 = mysqli_query($conn,$sql1) or die (mysql_error());
  while ($linha1 = mysqli_fetch_array($resultado1)) {
         $id = $linha1['idConsultor'];
         $id2 = str_pad( $id, 4, '0', STR_PAD_LEFT);
         $consultor1 = $linha1['nome'];
         $equipe1 = $linha1['equipe'];
         $regional1 = $linha1['regional'];
         $stat = $linha1['status'];
          $sub = 0;
          $reat =  0;
  //echo $consultor1."  ".$equipe1."  ".$regional1."<br >";
   $eq = $equipe1;
  $sql = "SELECT idConsultor, count(idConsultor) as cons FROM producao WHERE idConsultor='$id' AND MONTH(dataProposta) = '$mes' AND YEAR(dataProposta) = '$ano' AND status = 'Ativo'";
  // AND WHERE MONTH(dataProposta) = '$mes'
  $resultado = mysqli_query($conn,$sql) or die (mysql_error());
  while ($linha = mysqli_fetch_array($resultado)) {
    $contcons = $linha['cons'];
    $id3 = $linha['idConsultor'];
    // echo "Consultor: ".$contcons."<br />";
  }
  $sql2 = "SELECT substituicao FROM producao WHERE idConsultor='$id3' AND MONTH(dataProposta) = '$mes' AND YEAR(dataProposta) = '$ano' AND status = 'Ativo'";
  $resultado2 = mysqli_query($conn,$sql2) or die (mysql_error());
  while ($linha2 = mysqli_fetch_array($resultado2)) {
    $subst = $linha2['substituicao'];
    //$dataCadastro = $linha['idatacad'];
    if($subst == "Sim")
         $sub = $sub + 1;
  }

  $sql3 = "SELECT reativacao FROM producao WHERE idConsultor='$id3' AND MONTH(dataProposta) = '$mes' AND YEAR(dataProposta) = '$ano' AND status = 'Ativo'";
  $resultado3 = mysqli_query($conn,$sql3) or die (mysql_error());
  while ($linha3 = mysqli_fetch_array($resultado3)) {
    $reativ = $linha3['reativacao'];
    //$dataCadastro = $linha['idatacad'];
    if($reativ == "Sim")
         $reat = $reat + 1;
  }
    //echo "Substituições: ".$sub."<br />";

    $normal = $contcons - $sub - $reat;

    //echo "Normais: ".$normal."<br />";

    if ($con % 2 == 0)
       $bgcolor = "bgcolor='#FFFFFF'";
    else
       $bgcolor = "bgcolor='#FFFFCC'";

     if($stat == "Inativo")
        $nomecolor = "color='#6699FF'";
      else
        $nomecolor = "color='black'";
  if($stat == 'Ativo' || $contcons > 0 && $stat == 'Inativo'){
  ?>

    <table align="center" width="80%"  border="1">
    <tr align="center" <? echo $bgcolor; ?>>
       <td align="center" style="width: 10%"><font <? echo $nomecolor; ?> size="2"><b><? echo $id2; ?></b></font></td>
       <td align="left" style="width: 30%"><font <? echo $nomecolor; ?> size="2"><b><? echo $consultor1; ?></b></font></td>
       <td align="center" style="width: 15%"><font <? echo $nomecolor; ?> size="2"><b><? echo $normal; ?></b></font></td> 
       <td align="center" style="width: 15%"><font <? echo $nomecolor; ?> size="2"><b><? echo $sub; ?></b></font></td>
       <td align="center" style="width: 15%"><font <? echo $nomecolor; ?> size="2"><b><? echo $reat; ?></b></font></td>
       <td align="center" style="width: 15%"><font <? echo $nomecolor; ?> size="2"><b><? echo $contcons; ?></b></font></td>
    </tr>
   </table>
  </center>
  <?
  $con = $con + 1; $normaltot = $normaltot + $normal; $reattot = $reattot + $reat; $subtot = $subtot + $sub;
  }$consu = $id; $tot = $tot + $normal; $normal = 0; $totalg = $normaltot + $reattot + $subtot;
   }
    }
     //}
     // }
  $con = $con - 1;

  $_SESSION['totglobal'] = $_SESSION['totglobal'] + $tot;
  ?>
<center>
  <table align="center" width="80%"  border="1">
   <tr align="center" <? echo $bgcolor; ?>>
    <td colspan="2"  align="center" style="width: 40%"><font color="#333333" size="2"><b>PRODUÇÃO</b></font></td>
    <td  align="center" style="width: 15%"><font color="#333333" size="2"><b><? echo $normaltot; ?></b></font></td>
    <td  align="center" style="width: 15%"><font color="#333333" size="2"><b><? echo $subtot; ?></b></font></td>
    <td  align="center" style="width: 15%"><font color="#333333" size="2"><b><? echo $reattot; ?></b></font></td>
    <td  align="center" style="width: 15%"><font color="#333333" size="2"><b><? echo $totalg; ?></b></font></td>
   </tr>
  </table>
</center>

<? } $tot =0;  ?>

</div>

 <footer id="footer">   

   <?php include "footer.php"; ?>

</footer>

</body>

</html>