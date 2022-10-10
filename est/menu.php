<?
session_start();
?>
<!doctype html>
<html lang=''>
<head>
   <meta charset='utf-8'>
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="stylesheet" href="css/styles_menu.css">
   <script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
   <script src="include/script_menu.js"></script>
   <title>CSS MenuMaker</title>
</head>
 <body>
  <div id='cssmenu'>
    <ul>
         <li><a href='#'>Home</a> </li>
         <li><a href='#'>Cadastra</a>
            <ul>
               <li><a href='#'>Fornecedor</a></li>
               <li><a href='#'>Itens</a></li>
            </ul>
         </li>
         <li><a href='#'>Estoque</a>
            <ul>
               <li><a href='#'>Lista</a></li>
               <li><a href='#'>Relatórios</a></li>
            </ul>
         </li>
         <li><a href='#'>Requisição</a></li>
         <li><a href='usuario_lista.php'>Usuários</a></li>
         <li><a href='sair.php'>Sair</a></li>

         <li><? echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Usuário: ".$_SESSION['nomeE']; ?></li>
    </ul>
  </div>
 </body>
<html>