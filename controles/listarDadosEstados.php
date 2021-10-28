<?php
/*
_____________________________________________
|Objetivos: Listar os dados de Estados no    |
|Banco de dados                              |
|do Banco de Dados                           |                                        |                                |
|Data: 27/10/2021                            |
|Autor: Samuel Santinelli                    |
|____________________________________________|
*/

//Import do arquivo de conexão com o Banco de Dados
require_once(SRC.'/bd/listarEstados.php');

function exibirEstados()
{
    /*Chama a função que busca os 
    dados no Banco de Dados e recebe os registros dos clientes*/
    $dados = listarEstados();

    return $dados;
}

?>
