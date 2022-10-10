<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include("conexao.php");
$grupo = selectAllPessoa();
//var_dump($grupo);

$arqexcel = "<meta charset='UTF-8'>";

$arqexcel .= "<table border='1'>
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Nascimento</th>
                    <th>Telefone</th>
                    <th>Endereço</th>
                </tr>
            </thead>
            <tbody>";
                
                    foreach ($grupo as $pessoa) { 
           $arqexcel .="        <tr>
                    <td>{$pessoa["nome"]}</td>
                    <td>".formatoData($pessoa["nascimento"])."</td>
                    <td>{$pessoa["telefone"]}</td>
                    <td>{$pessoa["endereco"]}</td>
                    </tr>";
                  }
                
          $arqexcel .="  </tbody>
        </table>";
          
          header("Content-Type: application/xls");
          header("Content-Disposition:attachment; filename = relatorio.xls");
          echo $arqexcel;

