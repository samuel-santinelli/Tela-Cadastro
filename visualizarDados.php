<?php
    //Import do arquivo para buscar os dados do cliente 
    require_once('controles/visualizarDadosClientes.php');    

    // Recebe o id enviado pelo ajax na pagina da index
    $id = $_GET['id'];

    //  Chama a função para buscar no Banco de dados 
     $dadosCliente = visualizarCliente($id);

     
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Visualizar Dados</title>
</head>
<body>
    <table>
        <tr>
            <td>Nome</td>
            <td><?=$dadosCliente['nome']?></td>
        </tr>
        <tr>
            <td>RG</td>
            <td><?=$dadosCliente['rg']?></td>
        </tr>
        <tr>
            <td>CPF</td>
            <td><?=$dadosCliente['cpf']?></td>
        </tr>
        <tr>
            <td>Telefone</td>
            <td><?=$dadosCliente['telefone']?></td>
        </tr>
        <tr>
        <tr>
            <td>Celular</td>
            <td><?=$dadosCliente['celular']?></td>
        </tr>
            <td>Email</td>
            <td><?=$dadosCliente['email']?></td>
        </tr>
        <tr>
            <td>OBS</td>
            <td><?=$dadosCliente['obs']?></td>
        </tr>
    </table>
</body>
</html>













