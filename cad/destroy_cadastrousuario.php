<?php

$id = $_REQUEST['IDUsuario'];

include 'conn.php';

$sql = "delete from usuario where IDUsuario=$id";
@mysqli_query($conn,$sql);
echo json_encode(array('success'=>true));
?>