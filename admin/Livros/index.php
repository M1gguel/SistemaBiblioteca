<?php 
    require_once $_SERVER['DOCUMENT_ROOT'] . "/includes/cabecalho.php";
    require_once $_SERVER['DOCUMENT_ROOT'] . "/controllers/LivroController.php";
    require_once $_SERVER['DOCUMENT_ROOT'] . "/models/Livro.php";
?>

<main class="container mt-3 mb-3">
        <h1>Lista de Livros</h1>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Título</th>
                    <th>Autor</th>
                    <th>Número de Páginas</th>
                    <th>Preço</th>
                    <th>Ano de Publicação</th>
                    <th>ISBN</th>
                    <th style="width: 200px;">Ação</th>             
                </tr>
            </thead>
            <tbody>

                <?php 
                    $livroController =  new LivroController();

                    $livros = $livroController->listarLivros();

                    //var_dump($usuarios);

                    foreach($livros as $book):
                ?>

                <tr>
                    <td><?=$book->id_Livro ?></td>
                    <td><?=$book->titulo ?></td>
                    <td><?=$book->autor ?></td>
                    <td><?=$book->numero_pagina ?></td>
                    <td><?=$book->preco ?></td>
                    <td><?=$book->ano_publicacao ?></td>
                    <td><?=$book->isbn ?></td>
                    
                    
                    <td>
                        <a href="#" class="btn btn-primary">Editar</a>
                        <a href="#"class="btn btn-danger">Excluir</a>          
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