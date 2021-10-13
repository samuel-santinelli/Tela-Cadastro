<?php
/*
__________________________________
|Objetivo: Inserir dados de       |
|Clientes no Banco de Dados       |
|Data: 16/09/21                   |
|Autor: Samuel Santinelli         |
|_________________________________|

*/
//Chamando o arquivo conexaoMysql
require_once('../bd/conexaoMysql.php');

function inserir ($arrayCliente)
{
    
    $sql = "insert into tblcliente
                (
                    nome,
                    rg,
                    cpf,
                    telefone,
                    celular,
                    email,
                    obs
                )
                values
                (
                    '".$arrayCliente['nome'] ."',
                    '".$arrayCliente['rg'] ."',
                    '".$arrayCliente['cpf'] ."',
                    '".$arrayCliente['telefone'] ."',
                    '".$arrayCliente['celular'] ."',
                    '".$arrayCliente['email'] ."',
                    '".$arrayCliente['obs'] ."'
                )
            ";

            echo($sql);

          //Chamando a função que estabelece a conexão com Banco de dados
          $conexao = conexaoMysql();
        
          // Envia o script SQL para o BD
         if (mysqli_query($conexao, $sql))
            return true; //Retorna verdadeiro se o registro foi inserido no Banco de Dados
        else 
            return false; //Retorna falso se houver algum problema
    
    
}


?>