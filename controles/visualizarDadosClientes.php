<?php
/*
____________________________________________
|Objetivo: Arquivo responsável por buscar  |
| um registro para exibir na Modal do visua|
|-lizar                                    |
|                                          |
|Data: 21/10/2021                          |
|Autor: Samuel Santinelli                  |
|__________________________________________|
*/

function visualizarCliente($id)
{
    // Import do arquivo configuração de variaveis e constantes
    require_once('functions/config.php');

    //Import do arquivo para excluir no banco de dados
    require_once(SRC . 'bd/listarClientes.php');

    // Recebe o id enviado como argumento na função
    $idCliente = $id;

    // Chama a função para buscar de id do cliente
    $dadosCliente = buscar($idCliente); 

    if ($rsCliente = mysqli_fetch_assoc($dadosCliente)) 
        return $rsCliente;
    else
        return false;

}
?>

