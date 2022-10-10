 <nav class="navbar navbar-expand-lg navbar-light bg-light bg-dark">
  <a class="navbar-brand text-warning" href="index1.php">Caixa</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="nav nav-tabs">
<!--****************************************************************************************--> 
      <li class="nav-item">
        <a class="nav-link" href="index1.php">Home</a>
      </li>
<!--****************************************************************************************-->
      <li class="nav-item">
        <a class="nav-link" href="entrada_caixa_lista.php">Lista das Entradas</a>
      </li>
<!--****************************************************************************************-->
      <li class="nav-item">
        <a class="nav-link" href="saida_caixa_lista.php">Lista das Saídas</a>
      </li>      
<!--****************************************************************************************-->
      <li class="nav-item">
        <a class="nav-link" href="entrada.php">Entradas</a>
      </li>
<!--****************************************************************************************-->
      <li class="nav-item">
        <a class="nav-link" href="saida.php">Saídas</a>
      </li>
<!--****************************************************************************************-->
      <li class="nav-item">
        <a class="nav-link" href="../sair.php">SAIR</a>
      </li>
</ul>
  </div>
   <li><font class="text-right text-light" size="1">Usu&aacute;rio:&nbsp;<?php echo $_SESSION['nomeF']; ?></font></li>
</nav>