<?php
/*
_____________________________________________
|Objetivos: Listar todos os dados de Estados |
|do Banco de Dados                           |                                        |                                |                                             
|Data: 17/10/2021                            |
|Autor: Samuel Santinelli                    |
|____________________________________________|
*/

// Import de arquivo de conexão no Banco de Dados
require_once(SRC.'bd/conexaoMysql.php');

// Retorna todos os regisros existentes no banco 
function listarEstados()
{
   $sql = "select * from tblEstado order by nome";

   //Abre a conexão com o Banco de Dados
   $conexao = conexaoMysql();
   
   //Solicita ao Banco de Dados a execução do script SQL
   $select = mysqli_query($conexao, $sql);

   return $select;   
}

?>