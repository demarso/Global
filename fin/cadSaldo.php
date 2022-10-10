<?
    include ('conexao.php');
    $dataH = date('Y-m-d');
    $saldo = $_GET["sa"];

    $sql = "UPDATE caixaSaldo SET valor='$saldo' where data='$dataH'";
    $result = @mysqli_query($conn,$sql);

   //header('javascript:window.close()'); 
?>

<script>
window.close();
</script> 