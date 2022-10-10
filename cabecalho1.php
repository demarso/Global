<header id="cabecalho">
    <nav id="menu">
     <hgroup>
       <img src="imagens/logo.png" width="250">
       
     </hgroup>
     
      <?php	
        if($_SESSION['nivel'] == 0)
            include "menu_prod.php";
        else if($_SESSION['nivel'] == 3)
            include "menu3_prod.php";
        else  
            include "menu2_prod.php";
       ?>
    </nav>
     
</header>