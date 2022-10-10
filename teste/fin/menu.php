 <?php
 
  if ($_SESSION['nivelF'] == 10)
    include "menu10.php";
  
  else if ($_SESSION['nivelF'] == 0)
    include "menu0.php";
  
  else if ($_SESSION['nivelF'] == 1)
    include "menu1.php";
  
  else if ($_SESSION['nivelF'] == 2)
    include "menu2.php";
  
  else if ($_SESSION['nivelF'] == 3)
    include "menu3.php";
  
  else if ($_SESSION['nivelF'] == 4)
    include "menu4.php";

  
 ?>