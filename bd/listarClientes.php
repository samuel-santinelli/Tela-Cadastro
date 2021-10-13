<?php
/*
_____________________________________________
|Objetivos: Listar todos os dados de Clientes|
| do Banco de Dados                          |                                        |                                |                                             
|Data: 15/09/2021                            |
|Autor: Samuel Santinelli                    |
|____________________________________________|
*/

// Import de arquivo de conexão no Banco de Dados
require_once(SRC.'bd/conexaoMysql.php');

// Retorna todos os regisros existentes no banco 
function listar()
{
   $sql = "select * from tblcliente order by idcliente desc";

   //Abre a conexão com o Banco de Dados
   $conexao = conexaoMysql();
   
   //Solicita ao Banco de Dados a execução do script SQL
   $select = mysqli_query($conexao, $sql);

   return $select;   
}

// Retorna apenas um registro, com base no id
function buscar($idCliente)
{
   $sql = "select * from tblcliente where idcliente = ".$idCliente;

   //Abre a conexão com o Banco de Dados
   $conexao = conexaoMysql();
   
   //Solicita ao Banco de Dados a execução do script SQL
   $select = mysqli_query($conexao, $sql);

   return $select;   
}
