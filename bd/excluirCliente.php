<?php
/*
 _____________________________________________
|Objetivos: Excluir os dados de Clientes     |
|no Banco de Dados                           |
|Clientes, solicitando ao Banco de Dados     |
|do Banco de Dados                           |                                        |                                |
|Data: 29/09/2021                            |
|Autor: Samuel Santinelli                    |
|____________________________________________|
*/

require_once('../bd/conexaoMysql.php');

function excluir($idCliente)
{
    $sql = "delete from tblcliente
                where idcliente = ".$idCliente;

                $conexao = conexaoMysql();

                if (mysqli_query($conexao, $sql))
                    if(mysqli_affected_rows($conexao))
                    return true;
                else
                    return false;
}

?>