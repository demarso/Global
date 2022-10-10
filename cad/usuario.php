<?php
  session_start();
  if (!isset($_SESSION['id'])){
    header("Location: index.php?erro=1");
    exit;
  }
  if($_SESSION['nivel'] != 1){
	 echo "<script>alert('Você não tem permissão para acessar está página!');history.back(-1);</script>";
	 exit;
  }
 ?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta http-equiv="Content-type" content="text/html; charset=UTF-8"/>
    <meta name="keywords" content="crud, cadastro,filtro, php, mysql, crud php mysql">
    <meta name="description" content="administre os seus Usuarios.">
    <title>Gestão de Propostas</title>
    <link rel="stylesheet" type="text/css" href="css/easyui.css">
    <link rel="stylesheet" type="text/css" href="css/icon.css">
    <link rel="stylesheet" type="text/css" href="css/demo.css">
    <link rel="stylesheet" type="text/css" href="../css/estilo.css"/>
    <script type="text/javascript" src="js/jquery-1.6.min.js"></script>
    <script type="text/javascript" src="js/jquery.easyui.min.js"></script>
    <script type="text/javascript" src="js/jquery.edatagrid.js"></script>
    <script type="text/javascript" src="js/datagrid-filter.js"></script>
    <script type="text/javascript">
        $(function(){
            $("div.easyui-layout").layout();
            $('#dg').edatagrid({
                url: 'get_cadastrousuario.php',
                saveUrl: 'save_cadastrousuario.php',
                updateUrl: 'update_cadastrousuario.php',
                destroyUrl: 'destroy_cadastrousuario.php',
                fitColumns: true
            });
            var dg = $('#dg');
            dg.edatagrid();    // create datagrid
            dg.edatagrid('enableFilter');    // enable filter
        });
    </script>
</head>
<body>
<!--<img id="logo" src="imagens/logo.png" >-->
<div id="interface">
 <?php include "../cabecalho1.php"; ?>
    <center>
    <br />
 <div class="easyui-layout">
    <div class="demo-info" style="margin-bottom:10px">
        <div class="demo-tip icon-tip">&nbsp;</div>
        <div>Dê um duplo clique na linha para editar.</div>
    </div>
    <table id="dg" title="Cadastro de Usuario" style="width:900px; height:250px; border:1px solid #ccc;"
            toolbar="#toolbar" pagination="true" idField="id"
            rownumbers="true" fitColumns="true" resizable="true">
        <thead>
            <tr>
                <th field="IDUsuario" width="20" readonly="true">ID</th>
                <th field="Nome" width="50" editor="{type:'validatebox',options:{required:true}}">Nome</th>
                <th field="login" width="50" editor="{type:'validatebox',options:{required:true}}">Login</th>
                <th field="senha" width="50" editor="{type:'validatebox',options:{required:true}}">Senha</th>
                <th field="email" width="50" editor="{type:'validatebox',options:{validType:'email'}}">Email</th>
                <th field="nivel" width="50" editor="{type:'validatebox',options:{required:true}}">Nível</th>
                <th field="status" width="50" editor="{type:'validatebox',options:{required:true}}">Status</th>
            </tr>
        </thead>
    </table>
    <div id="toolbar">
        <a href="#" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="javascript:$('#dg').edatagrid('addRow')">Novo</a>
        <a href="#" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="javascript:$('#dg').edatagrid('destroyRow')">Remover</a>
        <a href="#" class="easyui-linkbutton" iconCls="icon-save" plain="true" onclick="javascript:$('#dg').edatagrid('saveRow')">Salvar</a>
        <a href="#" class="easyui-linkbutton" iconCls="icon-undo" plain="true" onclick="javascript:$('#dg').edatagrid('cancelRow')">Cancelar</a>
    </div>
  </div>
</center>
<br />
<footer id="footer">   
   <?php include "../footer.php"; ?>
</footer>
</div>    
</body>
</html>