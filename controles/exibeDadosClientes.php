<?php
/*
_____________________________________________
|Objetivos: Buscar ou listar os dados de     |
|Clientes, solicitando ao Banco de Dados     |
|do Banco de Dados                           |                                        |                                |
|Data: 23/09/2021                            |
|Autor: Samuel Santinelli                    |
|____________________________________________|
*/

//Import do arquivo de conexão com o Banco de Dados
require_once(SRC.'/bd/listarClientes.php');

function exibirClientes()
{
    /*Chama a função que busca os 
    dados no Banco de Dados e recebe os registros dos clientes*/
    $dados = listar();

    return $dados;
}

?>