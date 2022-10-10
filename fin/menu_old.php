<div class="navigation">
    <ul class="menu" id="menu">
        <li><span class="home"></span><a href="index1.php" class="first">Home</a></li>
         <? if ($_SESSION['nivelF'] == 0){ ?>
        <li><span class="cadastro"></span><a href="cadastro.php">Cadastros</a></li>
        <? }
           else { ?>
            	<li ><span class="cadastro"></span><a href="#" onclick="alert('Você não tem premissão!')">Cadastros</a></li>
        <?  } ?>
        <li><span class="entrada"></span><a href="entrada.php">Entradas</a></li>
        <li><span class="saida"></span><a href="saida.php">Saídas</a></li>
         <? if ($_SESSION['nivelF'] == 10){ ?>
        <li><span class="relatorio"></span><a href="relatorio.php">Relatórios</a></li>
        <? }
           else { ?>
                <li ><span class="relatorio"></span><a href="#" onclick="alert('Você não tem premissão!')">Relatórios</a></li>
        <?  } ?>
         <? if ($_SESSION['nivelF'] == 0 || $_SESSION['nivelF'] == 10){ ?>
        <li><span class="usuario"></span><a href="usuario_lista.php">Usuários</a></li>
        <? }
           else { ?>
            <li><span class="usuario" ></span><a href="#" onclick="alert('Você não tem premissão!')">Usuários</a></li>
        <?  } ?>   
        <li><span class="exit"></span><a href="sair.php" class="last">Sair</a></li>
    </ul>
</div>
<div id="canto">
<font size="2" color="blue"><b>&nbsp;&nbsp;&nbsp;&nbsp;<? echo $_SESSION['nomeF'];  ?></b></font>
</div>