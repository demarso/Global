 <?php
 
  if ($_SESSION['nivel'] == 10)
    include "menu10.php";
  
  else if ($_SESSION['nivel'] == 0)
    include "menu1.php";
  
  else if ($_SESSION['nivel'] == 1)
    include "menu2.php";
  
  else if ($_SESSION['nivel'] == 2)
    include "menu2.php";
  
  else if ($_SESSION['nivel'] == 3)
    include "menu3_prod.php";
  
  else if ($_SESSION['nivel'] == 4)
    include "menu2.php";

  
 ?>