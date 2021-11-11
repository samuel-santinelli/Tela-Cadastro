<?php
/*
__________________________________
|Objetivo: Atualizar dados de     |
|Clientes no Banco de Dados       |
|Data: 13/10/2021                   |
|Autor: Samuel Santinelli         |
|_________________________________|

*/

// Varchar sempre será com aspas simples '".."'

//Import do arquivo de conexão com o Banco de Dados
require_once('../bd/conexaoMysql.php');

function editar($arrayCliente)
{
    $sql = "update tblcliente set 
            nome = '".$arrayCliente['nome']."',
            rg = '".$arrayCliente['rg']."',
            cpf = '".$arrayCliente['cpf']."',
            telefone = '".$arrayCliente['telefone']."',
            celular = '".$arrayCliente['celular']."',
            email = '".$arrayCliente['email']."',
            obs = '".$arrayCliente['obs']."',
            idEstado = ".$arrayCliente['idEstado'].",
            foto = '".$arrayCliente['foto']."'  
        where idcliente = ".$arrayCliente['id'];

          //Chamando a função que estabelece a conexão com Banco de dados
          $conexao = conexaoMysql();
        
          // Envia o script SQL para o BD
         if (mysqli_query($conexao, $sql))
            return true; //Retorna verdadeiro se o registro foi inserido no Banco de Dados
        else 
            return false; //Retorna falso se houver algum problema

}

?>