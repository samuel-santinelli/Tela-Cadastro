<?php
/*
____________________________________________
|Objetivos: Arquivo responsavel por receber|
|dados, tratar os dados e validar os dados |
|de clientes                               |
|Data: 15/09/2021                          |
|Autor: Samuel Santinelli                  |
|__________________________________________|
*/

//Import do arquivo de configuração de variaveis e constantes
require_once('../functions/config.php');

//Import do arquivo para inserir no Banco de Dados
require_once(SRC . '/bd/inserirCliente.php');
require_once(SRC . '/bd/atualizarCliente.php');

// Import do arquivo que faz upload de imagens para o servidor
require_once(SRC . '/functions/upload.php');

//Declaração de variaveis 
$nome = (string) null;
$cpf = (string) null;
$telefone = (string) null;
$celular = (string) null;
$email = (string) null;
$obs = (string) null;
$idEstado = (int) null;

//Variavel criada para guardar o nome da foto  
$foto = (string) null;

// Validação para saber se o id do registro está chegando pela url(modo para atualizar um registro)
if (isset($_GET['id']))
    // Será utilizado somente para o editar 
    $id = (int) $_GET['id'];
else
    $id = (int) 0;

//if($_SERVER['REQUEST_METHOD'] - Verifica qual tipo de requisição foi encaminhada pelo form(GET/POST) 
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Recebe os dados encaminhados pelo Formulario atravéss do metodo POST
    $nome = $_POST['txtNome'];
    $rg = $_POST['txtRG'];
    $cpf = $_POST['txtCPF'];
    $telefone = $_POST['txtTelefone'];
    $celular = $_POST['txtCelular'];
    $email = $_POST['txtEmail'];
    $obs = $_POST['txtObs'];
    $idEstado = $_POST['sltEstado'];
    
    // Esse nome está chegando através do action do form da index, o motivo dessa variavel é para concluir o editar com o upload de foto
    $nomeFoto = $_GET['nomeFoto'];

        if (strtoupper($_GET['modo']) == 'ATUALIZAR')
        {
            if($_FILES['fleFoto']['name'] != "")
            {
                //Chama a função que faz o upload de um arquivo 
                $foto = uploadFile($_FILES['fleFoto']);
            }   
        }

    //Validação de campos obrigatórios
    if ($nome == null || $rg == null || $cpf == null)
        echo ("<script>
                alert('" . ERRO_CAIXA_VAZIA . "');
                window.history.back();
            </script>");
    //Validação de quantidade de caracteres
    //strlen() - Retorna a quantidade de caracteres de uma variavel
    elseif (strlen($nome) > 100 || strlen($rg) > 15 || strlen($cpf) > 20)
        echo ("<script>
                alert('" . ERRO_MAXLENGHT . "');
                window.history.back();
            </script>");
    else {
        //Local para enviar os dados para o Banco de Dados

        //Criação de um Array para encaminhar a função de inserir
        $cliente = array(
            "nome"     => $nome,
            "rg"       => $rg,
            "cpf"      => $cpf,
            "telefone" => $telefone,
            "celular"  => $celular,
            "email"    => $email,
            "obs"      => $obs,
            "id"       => $id, 
            "idEstado" => $idEstado,
            "foto"     => $foto
        );

        // Validação para saber se é para inserir um novo registro ou se é para atualiar um registro existente no Banco de Dados
        if (strtoupper($_GET['modo']) == 'SALVAR') {
            //Chama a função inserir do arquivo inserirCliente do php, encaminha o array com os dados do cliente
            if (inserir($cliente))
                echo ("
                <script> 
                    alert('" . BD_MSG_INSERIR . "');
                    window.location.href = '../index.php';
                </script>
            ");
            else
                echo ("
                <script> 
                    alert('" . BD_MSG_ERRO . "');
                    window.history.back();
                </script>
            ");
        } elseif (strtoupper($_GET['modo']) == 'ATUALIZAR') 
        {
            if (editar($cliente))
            echo ("
            <script> 
                alert('" . BD_MSG_INSERIR . "');
                window.location.href = '../index.php';
            </script>
        ");
        else
            echo ("
            <script> 
                alert('" . BD_MSG_ERRO . "');
                window.history.back();
            </script>
        ");
        
        }
    }
}
//window.history.back(); - retorna para pagina anterior 

?>