<?php
    require_once $_SERVER['DOCUMENT_ROOT'] . "/controllers/LivroController.php";
    
    require_once $_SERVER['DOCUMENT_ROOT'] . "/includes/cabecalho.php";  

    if(isset($_GET["del"]) && !empty($_GET['id_Livro'])){

        $livroController = new LivroController();
        $livroController->excluirLivro();

    }
      
?>

    <main class="container mt-3 mb-3">
        <h1>Lista de Livro
            <a href="cadastrar.php" class="btn btn-primary float-end">Cadastrar</a>
        </h1>

        <?php include_once $_SERVER['DOCUMENT_ROOT'] ."/includes/alerta.php" ?>

        <table class="table table-striped">
            <thead>
                <tr>
                   <th>#</th> 
                   <th>capa</th> 
                   <th>Titulo</th> 
                   <th>Autor</th> 
                
                   <th style="width: 200px;">Ação</th> 
                </tr>
            </thead>
            <tbody>

            <?php

                $livroController = new LivroController();
                $livros = $livroController->listarLivros();
                //var_dump($usuarios);

                foreach($livros as $livro):
            ?>

                <tr>
                    <td><?=$livro->id_Livro ?></td>
                    <td><img src="/upload/<?=$livro->capa ?>"width="100"></td>
                    <td><?=$livro->titulo ?></td>
                    <td><?=$livro->autor ?></td>
                    <td>
                        <a href="editar.php?id_Livro=<?=$livro->id_Livro ?>" class="btn btn-primary">Editar</a>

                        <a href="index.php?id_Livro=<?=$livro->id_Livro ?>&del" class="btn btn-danger">Excluir</a>
                       
                    </td>
                </tr>

                <?php 
                    endforeach;
                ?>

            </tbody>
        </table>


    </main>


<?php
    require_once $_SERVER['DOCUMENT_ROOT'] . "/includes/rodape.php";  
?>
