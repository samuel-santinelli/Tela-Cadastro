<?php
/*
 _____________________________________________
|Objetivos: Arquivo responsável por receber  |
|o id do Cliente e encaminhar para a função  |
|que ira excluir o dados                     |
|do Banco de Dados                           |                                        |                                |
|Data: 29/09/2021                            |
|Autor: Samuel Santinelli                    |
|____________________________________________|
*/

    //Import do arquivo de configuração de variaveis e constantes
    require_once('../functions/config.php');

    //Import do arquivo para inserir no Banco de Dados
    require_once(SRC.'/bd/excluirCliente.php');

    /*O id está sendo encaminhado pela index, no link que foi realizado
    na imagem do excluir*/
    $idCliente = $_GET['id'];

    /*Chama a função excluir e encaminha o id que será removido do 
    Banco de Dados*/
    if(excluir($idCliente))
        echo(BD_MSG_EXCLUIR);
    else
        echo("
                <script> 
                    alert('". BD_MSG_ERRO ."');
                    window.history.back();
                </script>
        ");
