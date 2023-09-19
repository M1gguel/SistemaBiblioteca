<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/models/Livro.php";
 class LivroController
{
    private $livroModel;

    public function __construct()
    {
        $this->livroModel = new Livro();
    }
    public function listarLivros(){
        return $this->livroModel->listar();
    }

    public function cadastrarLivro(){
        
        if($_SERVER['REQUEST_METHOD'] === 'POST'){

            $dados = [

                'titulo' => $_POST['titulo'],
                'autor' => $_POST['autor'],
                'numero_pagina' => $_POST['numero_pagina'],
                'preco' => $_POST['preco'],
                'ano_publicacao' => $_POST['ano_publicacao'],
                'isbn' => $_POST['isbn'],
                'perfil' => $_POST['perfil']
            ];
            $this->usuarioModel->cadastrar($dados);
            header('location: index.php');
            exit;
            //var_dump($dados);
        }
    }
    public function editarUsuario(){

        $id_Usuarios = $_GET['id_Usuarios'];
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            
            if(isset($_POST['senha']) && !empty($_POST['senha'])){
                //Criar Nova senha
                $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);
            }else{
                //Manter Senha antiga
                $usuarios = $this->usuarioModel->buscar($id_Usuarios);
                $senha = $usuarios->senha;
            }

            $dados = [
                'nome' => $_POST['nome'],
                'email' => $_POST['email'],
                'senha' => $senha,
                'perfil' => $_POST['perfil']
            ];
            $this->usuarioModel->editar($id_Usuarios, $dados);
            header('location: index.php');
            exit;
    }
    return $this->usuarioModel->buscar($id_Usuarios);
}
        public function excluirUsuario(){
            $this->usuarioModel->excluir($_GET['id_Usuarios']);
            
            header('location: index.php');
            exit;
        }
}
}