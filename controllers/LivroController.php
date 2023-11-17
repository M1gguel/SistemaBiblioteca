<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/models/Livro.php";

class LivroController
{

    private $livroModel;

    public function __construct()
    {
        $this->livroModel = new Livro();
    }

    public function listarLivros()
    {
        return $this->livroModel->listar();
    }

    public function cadastrarLivro()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $dados = [
                'titulo' => $_POST['titulo'],
                'autor' => $_POST['autor'],
                'numero_pagina' => $_POST['numero_pagina'],
                'preco' => $_POST['preco'],
                'ano_publicacao' => $_POST['ano_publicacao'],
                'isbn' => $_POST['isbn']
            ];

            

            if(isset($_FILES['capa']['name']) && !empty($_FILES['capa']['name'])) {
                $fileinfo = pathinfo(($_FILES['capa']['name']));
                
                // Gera um novo nome aleatório
                $nomeArquivo = md5(uniqid());

                // Diretório de destino
                $uploadDir = __dir__ ."/../upload/";            
               
                // Garante que a pasta existe
                if(!is_dir($uploadDir)) {
                    mkdir($uploadDir,0777, true);
                }

                // Renomeia o arquivo original para o nome aleatório
                $novoNomeArquivo = $nomeArquivo. ".".$fileinfo['extension'];

                // Configura a pasta de destino onde o arquivo salve
                $pastaDestino = $uploadDir . $novoNomeArquivo;

                // Salva o arquivo na pasta
                move_uploaded_file($_FILES['capa']['tmp_name'], $pastaDestino);

                $dados['capa'] = $novoNomeArquivo;
            } 
            
            $this->livroModel->cadastrar($dados);
            header('Location: index.php');
            exit;
        }
    }

    public function editarLivro()
    {
        $id_Livro = $_GET['id_Livro'];
        $livro = $this->livroModel->buscar($id_Livro);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $dados = [
                'titulo' => $_POST['titulo'],
                'autor' => $_POST['autor'],
                'numero_pagina' => $_POST['numero_pagina'],
                'preco' => $_POST['preco'],
                'ano_publicacao' => $_POST['ano_publicacao'],
                'isbn' => $_POST['isbn']
            ];

            if(isset($_FILES['capa']['name']) && !empty($_FILES['capa']['name'])) {
                $fileinfo = pathinfo(($_FILES['capa']['name']));
                
                // Gera um novo nome aleatório
                $nomeArquivo = md5(uniqid());

                // Diretório de destino
                $uploadDir = __DIR__ ."/../upload/";            
               
                // Garante que a pasta existe
                if(!is_dir($uploadDir)) {
                    mkdir($uploadDir,0777, true);
                }

                // Renomeia o arquivo original para o nome aleatório
                $novoNomeArquivo = $nomeArquivo. ".".$fileinfo['extension'];

                // Configura a pasta de destino onde o arquivo salve
                $pastaDestino = $uploadDir . $novoNomeArquivo;

                // Salva o arquivo na pasta
                move_uploaded_file($_FILES['capa']['tmp_name'], $pastaDestino);

                $dados['capa'] = $novoNomeArquivo;
            }else{
                $dados['capa'] = $livro->capa;
            }

            $this->livroModel->editar($id_Livro, $dados);
            header('Location: index.php');
            exit;
        }

        return $livro;
    }

    public function excluirLivro()
    {
        //Apagar o arquivo do servidor
        $livro = $this->livroModel->buscar($_GET['id_Livro']);
        $imagemcapa = __DIR__ ."/../upload/".$livro->capa;
        unset($imagemcapa);

        //Deletar o registro do banco de dados
        $this->livroModel->excluir($_GET['id_Livro']);
        header('Location: index.php');
        exit;
    }
}
