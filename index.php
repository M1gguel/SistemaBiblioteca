<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema Bibliotecas</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/main.css">
</head>

<body>

    <div class="barra-topo">
        <header id="cabecalho" class="container">

            <div id="botao-mobile">
                <i class="fa-solid fa-bars"></i>
            </div>

            <div id="logotipo">
                <h1> <img src="assets/img/logotipo.png" alt="BookMeNow" height="30"></h1>
            </div>
            <nav id="menu">
                <ul>
                    <li><a href="#">Categorias</a></li>
                    <li><a href="#">Sobre nós</a></li>
                    <li><a href="#">Contato</a></li>
                </ul>
            </nav>
            <div id="botaoTopo">
                <a href="" class="btn-secudario">Login</a>
                <a href="" class="btn-secudario">Registrar</a>

            </div>
        </header>
    </div>
    <div id="banner">
        <div class="container">
            <h2>
                Explorando Mundos Literários
            </h2>

            <p>Descubrir os tesouros de conhecimentos e Imaginação em nossa Biblioteca</p>
            <div id="formProcurar">
                <form action="buscar.php" method="get">
                    <i class="fa-solid fa-magnifying-glass"></i>

                    <input type="text" name="q" placeholder="O que você está procurando?">

                    <button type="submit">Procurar</button>

                </form>
            </div>
        </div>
    </div>

    <main class="container">
        <section id="LivrosPopulares">

            <div class="bloco-titulo">
                <div class="titulo">
                    <h2>Livros Populares</h2>
                    <a href="#">Ver todos</a>
                </div>
                <p>Descubra nossos livros</p>
            </div>

            <div class="lista-livros">

                <?php for ($cont = 1; $cont <= 6; $cont++): ?>



                    <div class="card-livro">
                        <div class="capa">
                            <img src="assets/img/livro-css.png" alt="CSS">
                            <span class="legenda">Lançamento</span>
                        </div>
                        <h3>CSS Grid layout: Criando Layouts Profissionais</h3>
                    </div>




                    <div class="card-livro">
                        <div class="capa">
                            <img src="assets/img/livro-html.png" alt="CSS">
                            <span class="black-friday">Black Friday</span>
                        </div>
                        <h3>Html e CSS: Guia Prático</h3>
                    </div>

                <?php endfor; ?>
            </div>

            </div>

        </section>

    </main>

    <footer id="rodape">
        <div class="container">
            <div class="bloco-rodape">
                <h2>BookMeNow</h2>
                <ul>
                    <li><a href="#">Sobre Nós</a></li>
                    <li><a href="#">Tecnologia</a></li>
                    <li><a href="#">FAQ</a></li>
                    <li><a href="#">Politica de Privacidade</a></li>
                </ul>
            </div>
            <div class="bloco-rodape">
                <h2>Contatos</h2>
                <ul>
                    <li>Paraíba, 125</li>
                    <li>(14) 99999-9999</li>
                    <li>contato@bookmenow</li>
                </ul>
            </div>
            <div class="bloco-rodape">
                <h2>Redes Sociais</h2>
                <ul>
                    <li><i class="fa-brands fa-square-facebook"></i></li>
                    <li><i class="fa-brands fa-instagram"></i></li>
                </ul>
            </div>
        </div>
        <div class="copyright">
            &copy;
            <?= date("Y") ?> -BookMeNow- Todos os direitos sao reservados
        </div>
    </footer>
    <script src="/assets/js/main.js"></script>
</body>

</html>