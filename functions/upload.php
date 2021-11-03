<?php
    /*______________________________________
|Objetivos: Arquivo para fazer upload de   |
|Imagens                                   |
|de clientes                               |
|Data: 03/11/2021                          |
|Autor: Samuel Santinelli                  |
|__________________________________________|
*/

// Função para fazer upload de arquivos
function uploadFile($arrayFile)
{
    $fotoFile = $arrayFile;
    $tamanhoOriginal = (int) 0;
    $tamanhoKB = (int) 0;
    $extensao = (string) null;
    $tipoArquivo = (string) null;
    $nomeArquivo = (string) null;
    $nomeArquivoCript = (string) null;
    

    // die; //Serve para parar a execuçãodo código do apache
    
    //Valida se o arquivo existe no array 
    if ($fotoFile['size'] > 0  && $fotoFile['type'] != "")
    {
        //Recebe o tamanho original do arquivo em byte
        $tamanhoOriginal = $fotoFile['size']; 

        // Converte o tamanho original em KBytes
        $tamanhoKB = $tamanhoOriginal/1024;
    
        // recebe o tipo original do arquivo
        $tipoArquivo = $fotoFile['type'];
  
        //Valida se o tamanho do arquivo é menor do que o permitido 
        if($tamanhoKB <= TAMANHO_FILE)
        {   
            // Validação para percorrer o array de extensões permitidas buscando a extensão do arquivo atual, se encontrar retorna true
            if(in_array($tipoArquivo, EXTENSOES_PERMITIDAS))
            {
                // Permite extrair apenas o nome de um arquivo sem a extensão 
                $nomeArquivo = pathinfo($fotoFile['name'], PATHINFO_FILENAME);
                // Permite extrair apenas a extensão de um arquivo sem o nome
                $extensao = pathinfo($fotoFile['name'], PATHINFO_EXTENSION);

                /*
                    Algoritmos de Criptografia no PHP
                        hash('sha256', 'variavel') - 64 caracteres
                        sha1('variavel') - 40 caracteres
                        md5('variavel') - 32 caracteres

                */

                $nomeArquivoCript = md5($nomeArquivo.uniqid(time()));
                    echo($nomeArquivoCript);
                        die;

            }else
                echo('Ocorreu um erro devido ao tipo do arquivo');
            }else
                echo('Ocorreu um erro, devido ao tamanho do arquivo');
    }

}


?>