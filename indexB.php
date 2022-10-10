<?php 
  date_default_timezone_set('America/Sao_Paulo');
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta http-equiv="Content-type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>GESTÃO - GLOBAL</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css?version=12">
  <link rel="stylesheet" href="css/navbar.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
</head>
<body class="bg-info">
  <?  include "menuIndex.php"; ?>  
  <div class="container" id="home">
	    <div class="col-12 text-center">
         <span class="btn btn-outline-warning btn-lg mt-5">GESTÃO - GLOBAL PROTEÇÃO VEICULAR</span>
	    </div>
	    <div class="row mt-5 mb-5"></div>
	    <div class="row mt-5 mb-5 text-center">
			<div class="col-sm">
				<a href="indexP.php" class="btn btn-primary btn-bg">
					<span class="fas fa-globe mr-2"></span>PROPOSTAS
				</a>
			</div>
			<div class="col-sm">
				<a href="fin/index.php" class="btn btn-success btn-bg">
					<span class="fas fa-dollar-sign mr-2"></span>FINANCEIRO
				</a>
			</div>
			<div class="col-sm">
				<a href="eventos/index.php" class="btn btn-danger btn-bg">
					<span class="fas fa-car-crash mr-2"></span>EVENTOS
				</a>
			</div>
		
	   </div>
		
</div>
<? include "footer.html"; ?>
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/navbar.js"></script>
    <script src="js/script.js"></script>  
</body>
</html>