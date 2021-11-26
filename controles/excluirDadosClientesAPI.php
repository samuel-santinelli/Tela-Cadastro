<?php
/*____________________________________________
|Objetivos: Arquivo Responsavel por receber  |
|o id do cliente no Banco de Dados           |
|Data: 25/11/2021                            |
|Autor: Samuel Santinelli                    |
|____________________________________________|
*/

require_once(SRC. 'bd/excluirCliente.php');

function excluirClienteAPI($id)
{
    if (excluir($id))
        return true;
    else 
        return false;

}

?>


