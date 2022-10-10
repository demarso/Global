<header id="cabecalho">
    
       <img src="imagens/logo.png" width="200">
       
    
     
      <?php	
        if($_SESSION['nivel'] == 0)
            include "menu10.php";
        else if($_SESSION['nivel'] == 3)
            include "menu3_prod.php";
        else  
            include "menu2.php";
       ?>
   
     
</header>