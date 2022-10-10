 <div id='cssmenu'>
    <ul >
        <li><a href="index1.php" class="first">Home</a></li>
     <!--    <li><a href="#">Cadastros</a></li> -->
        <li><a href="#">Entradas</a>
            <ul>
               <li><a href='entrada_caixa_lista.php'>Caixa</a></li>
               <li><a href='entrada_financeiro_lista.php'>Financeiro</a></li>
            </ul>
        </li>
        <li><a href="#">Saídas</a>
            <ul>
               <li><a href='saida_caixa_lista.php'>Caixa</a></li>
               <li><a href='saida_financeiro_lista.php'>Financeiro</a></li>
            </ul>
        </li>
     <li><a href="#">Diretoria</a>
            <ul>
               <li><a href='entrFinDir.php'>Saídas</a></li>
               <li><a href='entrResumoDir.php'>Resumo Caixa</a></li>
            </ul>
        </li>
        <li><a href="sair.php" class="last">Sair</a></li>
        <li>
          <font size="2" color="blue"><b>&nbsp;&nbsp;&nbsp;&nbsp;Usuário:&nbsp;&nbsp;<? echo $_SESSION['nomeF'];  ?></b></font>
       </li>
    </ul>
</div>
