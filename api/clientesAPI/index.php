<?php
    // Import para o start do slim php
    require_once("vendor/autoload.php");
    
    // Import do arquivo de configuração do sistema
    //require_once("../functions/config.php");

    // Instancia da classe Slim\App, é realizada para que possamos ter acesso aos metodos da classe
    $app = new \Slim\App();

    // EndPoint - É um ponto de parada de API, ou sejá, serão as formas de requisção que a API irá responder

    // $request - será usado para pegar algo que vai ser enviado para a API.
    // $response - será utilizado para quando a API irá devolver algo, sej-a uma mensagem, status, body, header, etc.

    //args - serão os argumentos que podem ser encaminhados para a API.

    // Endpoint: GET, retorna todos os dados de clientes
    $app->get('/clientes', function($request, $response, $args){

        return $response   ->withStatus(200)  
                           ->withHeader('Content-Type', 'application/json')
                           ->write('{"message":"Requisição com sucesso"}');
                        
    });

    // Endpoint: POST, envia um novo cliente para o Banco de Dados
    $app->post('/clientes', function($request, $response, $args){

        return $response   ->withStatus(201)  
                           ->withHeader('Content-Type', 'application/json')
                           ->write('{"message":"Item criado com sucesso"}');
                        
    });

    // Endpoint: PUT, atualiza um cliente Banco de Dados
    $app->put('/clientes', function($request, $response, $args){

        return $response   ->withStatus(201)  
                           ->withHeader('Content-Type', 'application/json')
                           ->write('{"message":"item atualizado com sucesso"}');
                        
    });

    // Endpoint: DELETE, Exclui um cliente do Banco de Dados
    $app->delete('/clientes', function($request, $response, $args){

        return $response   ->withStatus(200)  
                           ->withHeader('Content-Type', 'application/json')
                           ->write('{"message":"Item excluido com sucesso"}');
                        
    });

    // Carrega todos os EndPoint para a execução
    $app->run();
    
?>