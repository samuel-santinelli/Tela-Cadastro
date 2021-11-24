<?php
    /*
_____________________________________________
|Objetivos: Arquivo Responsavel por receber  |
|dados da API(POST or PUT)                   |
|Data: 24/11/2021                            |
|Autor: Samuel Santinelli                    |
|____________________________________________|
*/

// Import do arquivo de configuração 
require_once('../functions/config.php');

// Import do arquivo de que vai inserir no banco de dados 
require_once(SRC .'bd/inserirCliente.php');

// Função para inserir dados no Banco de dados via POST da API
function inserirClienteAPI($arrayDados)
{
    // Fazer tratamento de dados para consistência

    if (inserir($arrayDados))
        return true;
    else 
        return false;

}
    
     
     
     
     
?> 