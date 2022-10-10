<?php

include 'conn.php';
$rs = mysqli_query($conn,'select * from usuario order by Nome');
/*$result = array();
while($row = mysql_fetch_object($rs)){
	array_push($result, $row);
}*/
      $items = array();
    while($row = $rs->fetch_object())
        {
            foreach($row as $key => $col){
               $col_array[$key] = utf8_encode($col);
            }
            $row_array[] =  $col_array;

        }

$result["rows"] = $row_array;
echo json_encode($result);
?>