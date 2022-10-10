<?php

	$page = isset($_POST['page']) ? intval($_POST['page']) : 1;
	$rows = isset($_POST['rows']) ? intval($_POST['rows']) : 10;
	$offset = ($page-1)*$rows;
	$result = array();

	include 'conn.php';
	
	$rs = mysqli_query($conn,"select count(*) from usuario");
	$row = mysqli_fetch_row($rs);
	$result["total"] = $row[0];
	$rs = mysqli_query($conn,"select * from usuario order by Nome limit $offset,$rows");
	
	$items = array();
    while($row = $rs->fetch_object())
        {
            foreach($row as $key => $col){
               $col_array[$key] = utf8_encode($col);
            }
            $row_array[] =  $col_array;

        }
    
   /*
	$items = array();
	while($row = mysqli_fetch_object($rs)){
		array_push($items,$row);
	}*/
	
	$result["rows"] = $row_array; 
   

	echo json_encode($result);


?>