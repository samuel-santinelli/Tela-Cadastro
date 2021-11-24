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

// Função para listar dados do banco de dados
function exibirClientes()
    {
        /*Chama a função que busca os 
        dados no Banco de Dados e recebe os registros dos clientes*/
        $dados = listar();

        return $dados;
    }


    // Função para buscar dados do banco de dados
    function buscarClientes($id)
    {
        /*Chama a função que busca os 
        dados no Banco de Dados e recebe os registros dos clientes*/
        $dados = buscar($id);

        return $dados;
    }


// Função para criar um array de dados com basee no retorno do Banco de Dados
function criarArray($objeto)
    {
        $cont = (int) 0;
        // Estrutura de repetição para pegar um objeto de dados e converter em um array
        while($rsDados = mysqli_fetch_assoc($objeto))
        {
            $arrayDados[$cont] = array(
                "id"              => $rsDados['idcliente'],
                "nome"            => $rsDados['nome'],
                "rg"              => $rsDados['rg'],
                "cpf"             => $rsDados['cpf'],
                "telefone"        => $rsDados['telefone'],
                "celular"         => $rsDados['celular'],
                "email"           => $rsDados['email'],
                "obs"             => $rsDados['obs'],
                "foto"            => $rsDados['foto'],
                "idEstado"        => $rsDados['idEstado'],
                "sigla"           => $rsDados['sigla']
            );

            $cont+=1;
        }
            // Tratatmento para validar se existe dados no Banco de Dados, se não ouver um retorno devera ser false.
            if(isset($arrayDados))
                return $arrayDados;
            else
                return false;
    }
    // Função para gerar um JSON, com base em um array de dados
    function criarJSON($arrayDados)
        {
            // Especifica no cabeçario do php que será gerado um JSON 
            header("content-type:application/json");

            //Converte um array em JSON
            $listJSON = json_encode($arrayDados);

            /*
                json_encode() - converte um array em formato JSONS
                json_dencode() - converte um array em formato JSONS
            */

            if(isset($listJSON))
                return $listJSON;
            else
            return false;
        }









?>