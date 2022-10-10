<header id="cabecalho">
     <hgroup>
    	   <h1>SISTEMA DE GESTÃO DE FESTAS</h1>
    	   <h2>SUA FESTA - NOSSA ALEGRIA.&nbsp;&nbsp;Usu&aacute;rio:&nbsp;&nbsp;<?php echo $_SESSION['nome']; ?></h2>

     </hgroup>
     <nav id="menu">
      <?php	
        if($_SESSION['nivel'] == 1)
            include "menu.php"; 
        else
            include "menu2.php"
      ?>
     </nav>

     <img id="icone" src="imagens/globo.png">
 </header>