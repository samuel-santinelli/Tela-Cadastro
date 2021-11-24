<?php
    // Import para o start do slim php
    require_once("vendor/autoload.php");
    
    // Import do arquivo que solicita as requisições de busca no Banco de Dados
    require_once('../controles/exibeDadosClientes.php');

    // Instancia da classe Slim\App, é realizada para que possamos ter acesso aos metodos da classe
    $app = new \Slim\App();

    // EndPoint - É um ponto de parada de API, ou sejá, serão as formas de requisção que a API irá responder

    // $request - será usado para pegar algo que vai ser enviado para a API.
    // $response - será utilizado para quando a API irá devolver algo, sejá uma mensagem, status, body, header, etc.

    //args - serão os argumentos que podem ser encaminhados para a API.

    // Endpoint: GET, retorna todos os dados de clientes
    $app->get('/clientes/{id}', function($request, $response, $args){

        // Recebe o ID que será encaminhado na URL 
        $id = $args['id'];

        // Chama a função (na pasta controles) que vai requisitaros dados no Banco de Dados 
        if($listDados = buscarClientes($id))
            if($listDadosArray = criarArray($listDados))
                $listDadosJSON = criarJSON($listDadosArray);

        // Validação para tratar o Banco de Dados sem coteúdo
        if($listDadosArray)
        {
             return $response    ->withStatus(200)  
                                 ->withHeader('Content-Type', 'application/json')
                                 ->write($listDadosJSON);                                               
        }else
        {
             return $response    ->withStatus(204);
                                                                        
        }                        
    });

    // Endpoint: GET, retorna um cliente pelo ID
    $app->get('/clientes', function($request, $response, $args){

        // Chama a função (na pasta controles) que vai requisitaros dados no Banco de Dados 
        if($listDados = exibirClientes())
            if($listDadosArray = criarArray($listDados))
                $listDadosJSON = criarJSON($listDadosArray);

        // Validação para tratar o Banco de Dados sem coteúdo
        if($listDadosArray)
        {
             return $response    ->withStatus(200)  
                                 ->withHeader('Content-Type', 'application/json')
                                 ->write($listDadosJSON);                                               
        }else
        {
             return $response    ->withStatus(204);
                                                                        
        }                        
    });

    // Endpoint: POST, envia um novo cliente para o Banco de Dados
    $app->post('/clientes', function($request, $response, $args){

         
        // Recebe o Content Type do header, para verificar se o padrão do body será JSON
        $contentType = $request->getHeaderLine('Content-Type'); 

        // Valida se o tipo de dados é JSON 
        if($contentType == 'application/json')
        {

            // Recebe o conteudo enviado no body da mensagem
            $dadosBodyJSON = $request->getParsedBody();

            // Valida se o corpo do body está vazio
            if($dadosBodyJSON == "" || $dadosBodyJSON == null)
            {
                return $response   ->withStatus(406)  
                                   ->withHeader('Content-Type', 'application/json')
                                   ->write('{"message":"Conteúdo enviado pelo body não contem dados validos"}');
            }else
            
            {
                // Import no arquivo que vai encaminhar os dados no Banco
                require_once('../controles/recebeDadosClientesAPI.php');
               

                // Envia os dados para o Banco de dados e valida se foi inserido com sucesso
                if (inserirClienteAPI($dadosBodyJSON))
                    {
                    return $response   ->withStatus(201)  
                                       ->withHeader('Content-Type', 'application/json')
                                       ->write('{"message":"Item criado com sucesso"}');
                    }else

                        {
                            return $response    ->withStatus(400)  
                                                ->withHeader('Content-Type', 'application/json')
                                                ->write('{"message":"Não foi possivel salvar os dados, favor conferir o body da mensagem"}');
                        }
            }
        }else
        { 

            return $response   ->withStatus(406)  
                               ->withHeader('Content-Type', 'application/json')
                               ->write('{"message":"O formato de Dados do header é incompatível com o JSON"}');
        }

    });

    // Endpoint: PUT, atualiza um cliente no Banco de Dados
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