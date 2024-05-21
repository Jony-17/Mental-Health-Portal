<?php
session_start();
require_once ("../../conn/conn.php");

// Verifica se a sessão do usuário está definida
if (isset($_SESSION['id_utilizador'])) {

    // Se a sessão do usuário já estiver definida, você pode executar outras ações aqui
    echo "Sessão do utilizador já está definida. ID do utilizador: " . $_SESSION['id_utilizador'];

    $utilizador_id = $_SESSION['id_utilizador'];

    // Consulta SQL para buscar o campo img_perfil
    $query = "SELECT nome, img_perfil FROM utilizadores WHERE utilizador_id = $utilizador_id";

    $result = mysqli_query($conn, $query);

    if ($result) {
        // Extrair o resultado da consulta
        $row = mysqli_fetch_assoc($result);
    }
} else {
    echo "NÃO DEU";
}
?>


<!DOCTYPE html>
<html class="selection:text-white selection:bg-orange-400">

<head>
    <title>Portal de Saúde Mental</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../imgs/logo.png">

    <link rel="stylesheet" type="text/css" href="css/style.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Kode+Mono:wght@400..700&family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Saira+Condensed:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <!-- SweetAlert2 JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>

</head>

<body>
    <style>
        #chatbotContainer {
            position: fixed;
            bottom: 20px;
            right: 20px;
            z-index: 9999;
            /* Z-index alto para garantir que o iframe fique acima de outros elementos */
        }

        /* Estilo para o iframe */
        #chatbotFrame {
            width: 400px;
            height: 600px;
            border: none;
        }

        .btn-confirm {
            background-color: #fe9e0d;
            color: white;
            border: none;
            outline: none;
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
            margin-right: 10px;
        }

        .btn-confirm:hover {
            background-color: #c27500;
        }

        .btn-cancel {
            background-color: #d33;
            color: white;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
            margin-left: 10px;
        }

        .btn-cancel:hover {
            background-color: #b32424;
        }
    </style>
    <header>
        <div class="navbar">
            <div class="logo">Portal de <br> Saúde Mental.</div>

            <ul class="links">
                <li><a href="../../paginainicial">Página Inicial</a></li>
                <li><a href="../../sobre-nos">Sobre Nós</a></li>
                <li><a href="../../perturbacoes">Perturbações</a></li>
                <li><a href="../../artigos">Artigos</a></li>
                <li><a href="../../noticias">Notícias</a></li>
                <li><a href="../../conteudo-educativo">Conteúdo Educativo</a>
                    <i class="fas fa-chevron-down"></i>
                    <ul class="dropdown">
                        <li><a href="../../conteudo-educativo/quizzes">Quizzes</a></li>
                        <li><a href="../../conteudo-educativo/exercicios-mindfulness">Exercícios Mindfulness</a></li>
                        <li><a href="../../conteudo-educativo/ted-talks">TED Talks</a></li>
                    </ul>
                </li>
                </li>
            </ul>

            <?php if (!empty($_SESSION['id_utilizador'])): ?>
                <li class="dropdown-container">
                    <div class="profile-dropdown">
                        <img class="img-profile rounded-circle" src="../../areacliente/registo/imgs/<?php if (!empty($row["img_perfil"])) {
                            echo $row["img_perfil"];
                        } else {
                            echo "teste.jpeg";
                        } ?>" alt="Imagem de Perfil">
                        <i class="fas fa-chevron-down" style="margin-right: 20px;"></i>
                        <ul class="dropdown-p">
                            <li><a href="../../perfil/">Perfil</a></li>
                            <!--<li><a href="#">Termos e Condições</a></li>
                            <li><a href="#">Definições</a></li>-->
                        </ul>
                    </div>
                    <a class="btn" onclick="logout()">Terminar Sessão</a>
                </li>
            <?php else: ?>
                <li><a class="btn" href="../../areacliente/login/">Iniciar Sessão</a></li>
            <?php endif ?>

            <div class="toggle_btn">
                <i class="fas fa-bars"></i>
            </div>
        </div>


        <div class="dropdown_menu">
            <li><a href="../../paginainicial">Página Inicial</a></li>
            <li><a href="../../sobre-nos">Sobre Nós</a></li>
            <li><a href="../../perturbacoes">Perturbações</a></li>
            <li><a href="../../artigos">Artigos</a></li>
            <li><a href="../../noticias">Notícias</a></li>
            <li class="dropdown-trigger"><a href="../../conteudo-educativo">Conteúdo Educativo <i
                        class="fas fa-chevron-down"></i></a>
                <ul class="dropdown">
                    <li><a href="../../conteudo-educativo/quizzes">Quizzes</a></li>
                    <li><a href="../../conteudo-educativo/exercicios-mindfulness">Exercícios Mindfulness</a></li>
                    <li><a href="../../conteudo-educativo/ted-talks">TED Talks</a></li>
                </ul>
            </li>

            <?php if (!empty($_SESSION['id_utilizador'])): ?>
                <li class="dropdown-trigger">
                    <a href="#">
                        <img class="img-profile rounded-circle" src="../../areacliente/registo/imgs/<?php if (!empty($row["img_perfil"])) {
                            echo $row["img_perfil"];
                        } else {
                            echo "teste.jpeg";
                        } ?>" alt="Imagem de Perfil">
                        <i class="fas fa-chevron-down"></i></a>
                    <ul class="dropdown">
                        <li><a href="../../perfil/">Perfil</a></li>
                        <!--<li><a href="#">Termos e Condições</a></li>
                        <li><a href="#">Definições</a></li>-->
                    </ul>
                </li>
                <li><a class="btn" onclick="logout()">Terminar Sessão</a></li>
            <?php else: ?>
                <li><a class="btn" href="../../areacliente/login/">Iniciar Sessão</a></li>
            <?php endif ?>


            <script>
                function logout() {
                    Swal.fire({
                        title: 'Deseja realmente terminar sessão?',
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonText: 'Sim',
                        cancelButtonText: 'Não',
                        customClass: {
                            confirmButton: 'btn-confirm',
                            cancelButton: 'btn-cancel'
                        },
                        buttonsStyling: false
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location = "../../logout/logout.php";
                        }
                    });
                }
            </script>
        </div>
    </header>


    <!--Separadores-->
    <?php
    if (isset($_GET['titulo'])) {
        // Obter o título do artigo da URL e decodificar
        $titulo_artigo = urldecode($_GET['titulo']);

        // Consulta SQL para buscar o artigo pelo título
        $query = "SELECT noticias_id, titulo FROM noticias WHERE titulo = '$titulo_artigo'";

        // Executar a consulta
        $result = mysqli_query($conn, $query);

        // Verificar se a consulta foi bem-sucedida e se retornou pelo menos uma linha
        if ($result && mysqli_num_rows($result) > 0) {
            // Extrair o resultado da consulta
            $row = mysqli_fetch_assoc($result);
            $noticias_id = $row['noticias_id'];

            // Consulta SQL para buscar a perturbacao_id e o nome da perturbacao associada ao artigo
            $query_grupo = "SELECT noticias_id, titulo FROM noticias";

            // Executar a consulta para obter a perturbacao_id e o nome da perturbacao
            $result_grupo = mysqli_query($conn, $query_grupo);

            // Exibir os resultados
            echo '<ol role="list">';
            echo '<li class="list"><div class="items"><a href=".." class="text-sm">Notícias</a><span class="separator">/</span></div></li>';
            echo '<li class="list"><div class="items-current"><span class="text-sm" aria-current="page">' . $row['titulo'] . '</span></div></li>';
            echo '</ol>';
        } else {
            // Se a consulta não retornar nenhum resultado, exibir uma mensagem de erro ou fazer alguma outra ação
            echo "Notícia não encontrada.";
        }
    } else {
        // Se o título do artigo não estiver definido na URL, exibir uma mensagem de erro ou fazer alguma outra ação
        echo "Título da notícia não especificado na URL.";
    }
    ?>

    <div class="background1">
        <img src="../background1.png" alt="banner background" />
    </div>

    <div class="background2">
        <img src="../background2.png" alt="banner background" />
    </div>


    <!--Títulos-->
    <?php
    if (isset($_GET['titulo'])) {
        // Obter o título do artigo da URL e decodificar
        $titulo_artigo = urldecode($_GET['titulo']);

        // Consulta SQL para buscar o artigo pelo título
        $query = "SELECT noticias_id, titulo FROM noticias WHERE titulo = '$titulo_artigo'";

        // Executar a consulta
        $result = mysqli_query($conn, $query);

        // Verificar se a consulta foi bem-sucedida e se retornou pelo menos uma linha
        if ($result && mysqli_num_rows($result) > 0) {
            // Extrair o resultado da consulta
            $row = mysqli_fetch_assoc($result);
            $noticias_id = $row['noticias_id']; // Acessar o artigo_id associado ao artigo
    
            // Consulta SQL para buscar a perturbacao_id e o nome da perturbacao associada ao artigo
            $query_grupo = "SELECT noticias_id, titulo FROM noticias";


            // Executar a consulta para obter a perturbacao_id e o nome da perturbacao
            $result_grupo = mysqli_query($conn, $query_grupo);

            // Exibir os resultados
            echo '<div class="heading">';
            echo '<h1>' . $row['titulo'] . '</h1>';
            echo '</div>';
        } else {
            // Se a consulta não retornar nenhum resultado, exibir uma mensagem de erro ou fazer alguma outra ação
            echo "<div class='heading'><h4>Notícia não encontrada.</h4></div>";
        }
    } else {
        // Se o título do artigo não estiver definido na URL, exibir uma mensagem de erro ou fazer alguma outra ação
        echo "<div class='heading'><h4>Título da notícia não especificado na URL.</h4></div>";
    }
    ?>



    <!--Autor/es e data de publicação-->
    <?php
    if (isset($_GET['titulo'])) {
        // Obter o título do artigo da URL e decodificar
        $titulo_artigo = urldecode($_GET['titulo']);

        // Consulta SQL para buscar o artigo pelo título
        $query = "SELECT autor, data_publicacao FROM noticias WHERE titulo = '$titulo_artigo'";

        // Executar a consulta
        $result = mysqli_query($conn, $query);

        // Verificar se a consulta foi bem-sucedida e se retornou pelo menos uma linha
        if ($result && mysqli_num_rows($result) > 0) {
            // Extrair o resultado da consulta
            $row = mysqli_fetch_assoc($result);
            // Exibir o autor e a data de publicação do artigo
            echo '<ol role="list2" class="list2">';
            echo '<li class="list"><div class="items"><span class="text-sm">' . $row['autor'] . '</span><span class="separator">|</span></div></li>';
            echo '<li class="list"><div class="items"><span class="text-sm">' . $row['data_publicacao'] . '</span></div></li>';
            echo '</ol>';
        } else {
            // Se a consulta não retornar nenhum resultado, exibir uma mensagem de erro ou fazer alguma outra ação
            echo "Autor ou data de publicação não encontrados.";
        }
    } else {
        // Se o título do artigo não estiver definido na URL, exibir uma mensagem de erro ou fazer alguma outra ação
        echo "Título do artigo não especificado na URL.";
    }
    ?>

    <!--Imagem da publicação-->
    <?php
    if (isset($_GET['titulo'])) {
        // Obter o título do artigo da URL e decodificar
        $titulo_artigo = urldecode($_GET['titulo']);

        // Consulta SQL para buscar o artigo pelo título
        $query = "SELECT img_noticia FROM noticias WHERE titulo = '$titulo_artigo'";

        // Executar a consulta
        $result = mysqli_query($conn, $query);

        // Verificar se a consulta foi bem-sucedida e se retornou pelo menos uma linha
        if ($result && mysqli_num_rows($result) > 0) {
            // Extrair o resultado da consulta
            $row = mysqli_fetch_assoc($result);
            // Exibir o autor e a data de publicação do artigo
            echo '<img class="img-artigo" src="../../admin/inserir/imgs/noticias/' . (!empty($row["img_noticia"]) ? $row["img_noticia"] : "teste.jpeg") . '" alt="' . $row["img_noticia"] . '">';
        } else {
            // Se a consulta não retornar nenhum resultado, exibir uma mensagem de erro ou fazer alguma outra ação
            echo "Autor ou data de publicação não encontrados.";
        }
    } else {
        // Se o título do artigo não estiver definido na URL, exibir uma mensagem de erro ou fazer alguma outra ação
        echo "Título do artigo não especificado na URL.";
    }
    ?>


    <div class="container">
        <div class="artigo-wrapper">
            <section class="artigo" id="artigo">
                <div class="card">
                    <div class="card-body">
                        <?php
                        // Se o título do artigo estiver definido na URL, exibir o conteúdo do artigo
                        if (isset($_GET['titulo'])) {
                            $titulo_artigo = urldecode($_GET['titulo']);
                            $query = "SELECT conteudo_texto FROM noticias WHERE titulo = '$titulo_artigo'";
                            $result = mysqli_query($conn, $query);
                            if ($result && mysqli_num_rows($result) > 0) {
                                $row = mysqli_fetch_assoc($result);
                                echo '<p>' . $row['conteudo_texto'] . '</p>';
                            } else {
                                echo "Ainda não tem texto.";
                            }
                        } else {
                            // Se o título do artigo não estiver definido na URL, exibir uma mensagem de erro ou fazer alguma outra ação
                            echo "Título do artigo não especificado na URL.";
                        }
                        ?>
                    </div>
                </div>
            </section>

            <!--Pontos-->
            <?php
            // Consulta SQL para selecionar os pontos do artigo atual apenas
            $query = "SELECT conteudo_noticia_id, noticias_id, ponto, texto FROM conteudo_noticia WHERE noticias_id = $noticias_id";

            // Executar a consulta
            $result = mysqli_query($conn, $query);

            // Verificar se a consulta foi bem-sucedida e se retornou pelo menos uma linha
            if ($result && mysqli_num_rows($result) > 0) {
                // Loop através dos resultados
                while ($row = mysqli_fetch_assoc($result)) {
                    // Exibir o conteúdo de cada ponto dentro dos elementos <div> e <h1>
                    echo '<div class="subheading" id="ponto_' . $row['ponto'] . '">';
                    echo '<h1>' . $row['ponto'] . '</h1>';

                    $conteudo_noticia_id = $row['conteudo_noticia_id'];
                    $query_conteudo = "SELECT texto FROM conteudo_noticia WHERE conteudo_noticia_id = $conteudo_noticia_id";


                    // Executar a consulta de conteúdo
                    $result_conteudo = mysqli_query($conn, $query_conteudo);

                    // Verificar se a consulta de conteúdo foi bem-sucedida e se retornou pelo menos uma linha
                    if ($result_conteudo && mysqli_num_rows($result_conteudo) > 0) {
                        // Exibir o conteúdo real do ponto
                        while ($row_conteudo = mysqli_fetch_assoc($result_conteudo)) {
                            echo '<p>' . $row_conteudo['texto'] . '</p>';
                        }
                    } else {
                        // Se a consulta de conteúdo não retornar nenhum resultado
                        echo "Não há conteúdo disponível para este ponto.";
                    }

                    echo '</div>';
                }
            } else {
                // Se a consulta não retornar nenhum resultado
                echo "Não há pontos disponíveis para este artigo.";
            }
            ?>
        </div>

        <section class="tabela-conteudo">
            <?php
            // Consulta SQL para selecionar os pontos da tabela conteudo_artigo
            $query = "SELECT ponto FROM conteudo_noticia WHERE noticias_id = $noticias_id";
            $result = mysqli_query($conn, $query);
            if ($result && mysqli_num_rows($result) > 0) {
                echo '<div class="card-body2">';
                echo '<h1>Tabela de conteúdos</h1>';
                echo '<ul>';
                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<li><a href="#ponto_' . urlencode($row['ponto']) . '">' . $row['ponto'] . '</a></li>';
                }
                echo '</ul>';
                echo '</div>';
            } else {
                echo "Não há pontos disponíveis.";
            }
            ?>
        </section>
    </div>


    <script>
        window.addEventListener('DOMContentLoaded', function () {
            var dropdownToggle = document.querySelector('.dropdown-toggle');
            var dropdownMenu = document.querySelector('.dropdown-menu');

            if (window.innerWidth <= 768) {
                dropdownToggle.addEventListener('click', function () {
                    dropdownMenu.classList.toggle('show');
                });
            }
        });
    </script>

    <div class="fontes" id="fontes">
        <div class="fontes-content">
            <svg class="svg-up" width="15" height="10" xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                <path
                    d="M416 208H272V64c0-17.7-14.3-32-32-32h-32c-17.7 0-32 14.3-32 32v144H32c-17.7 0-32 14.3-32 32v32c0 17.7 14.3 32 32 32h144v144c0 17.7 14.3 32 32 32h32c17.7 0 32-14.3 32-32V304h144c17.7 0 32-14.3 32-32v-32c0-17.7-14.3-32-32-32z" />
            </svg>
            <svg class="svg-down" width="15" height="10" xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                <path
                    d="M416 208H32c-17.7 0-32 14.3-32 32v32c0 17.7 14.3 32 32 32h384c17.7 0 32-14.3 32-32v-32c0-17.7-14.3-32-32-32z" />
            </svg>
            <h3>Fontes</h3>
        </div>
        <?php
        if (isset($_GET['titulo'])) {
            // Obter o título do artigo da URL e decodificar
            $titulo_artigo = urldecode($_GET['titulo']);

            // Consulta SQL para buscar o artigo pelo título
            $query = "SELECT n.fonte
                      FROM noticias n
                      WHERE n.titulo = '$titulo_artigo'";

            $result = mysqli_query($conn, $query);

            while ($row = mysqli_fetch_assoc($result)) {
                ?>
                <div class="fontes-content2">
                    <p><?php echo $row['fonte']; ?></p>
                </div>
                <?php
            }
        }
        ?>
    </div>


    <!--Scroll to top-->
    <button onclick="scrollTopFunction()" id="scrollToTopBtn" title="Go to top"><i
            class="fas fa-chevron-up"></i></button>


    <!---Footer--->
    <footer>
        <div class="footer-row">
            <div class="footer-col">
                <h1>Portal de <br> Saúde Mental.</h1>
                <p>Tu mereces ser feliz.</p>
            </div>

            <div class="footer-col">
                <h3>Perturbações</h3>
                <ul>
                    <li><a href="../perturbacoes/perturbacoes-ansiedade/">Perturbações de Ansiedade</a></li>
                    <li><a href="#">Perturbações do Sono - Vigília</a></li>
                    <li><a href="#">Perturbações de Humor</a></li>
                    <li><a href="#">Perturbações Alimentares</a></li>
                    <li><a href="#">Perturbações Obsessivo-Compulsivas</a></li>
                    <li><a href="#">Perturbações de Personalidade</a></li>
                    <li><a href="#">Perturbações relacionadas com trauma<br>e fatores de stress</a></li>
                </ul>
            </div>

            <div class="footer-col">
                <h3>Artigos</h3>
                <ul>
                    <li><a href="#">Depressão</a></li>
                    <li><a href="#">Depressão</a></li>
                    <li><a href="#">Depressão</a></li>
                    <li><a href="#">Depressão</a></li>
                </ul>
            </div>

            <div class="footer-col">
                <h3>Notícias</h3>
                <ul>
                    <li><a href="#">Depressão</a></li>
                    <li><a href="#">Depressão</a></li>
                    <li><a href="#">Depressão</a></li>
                    <li><a href="#">Depressão</a></li>
                </ul>
            </div>

            <div class="footer-col">
                <h3>Conteúdo Educativo</h3>
                <ul>
                    <li><a href="../quizzes">Quizzes</a></li>
                    <li><a href="#">Exercícios Mindfulness</a></li>
                    <li><a href="#">TED Talks</a></li>
                </ul>
            </div>

            <div class="footer-col">
                <h3>Contactos</h3>
                <ul>
                    <li><a href="#" target="_blank">Apoio Psicológico</a>
                        <ul>
                            <li style="color: #DADADA;">24h/dia</li>
                        </ul>
                    </li>
                    <li><a href="#" target="_blank">Vira(l)Solidariedade</a>
                        <ul>
                            <li style="color: #DADADA;">Todos os dias das 08h00 às 00h00</li>
                        </ul>
                    </li>
                    <li><a href="#" target="_blank">SOS Voz Amiga</a>
                        <ul>
                            <li style="color: #DADADA;">Todos os dias das 15:30h às 00:30h</li>
                        </ul>
                    </li>
                    <li><a href="#" target="_blank">Linha Conversa Amiga</a>
                        <ul>
                            <li style="color: #DADADA;">Dias úteis das 15h00 às 22h00</li>
                            <li style="color: #DADADA;">Fins de semana das 19h00 às 22h00</li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>

        <hr>

        <div class="footer-links">
            <p class="copyright">@2024 Todos os direitos reservados</p>
            <div class="footer-links-2">
                <a href="#">Termos & Condições</a>

                <div class="vertical-hr"></div>

                <!--<li class="dropdown-trigger-f"><i class="fas fa-globe"></i>Idioma <i class="fas fa-chevron-down"></i>
                    <ul class="dropdown-f">
                        <li><a href="#" id="portugues" onclick="changeLanguage('portuguese')">Português</a></li>
                        <li><a href="#" id="ingles" onclick="changeLanguage('english')">Inglês</a></li>
                    </ul>
                </li>-->

                <span><a href="?lang=en-GB" class="lang-link active">EN</a> / <a href="?lang=pt-PT"
                        class="lang-link">PT</a></span>

                <div class="vertical-hr"></div>

                <input type="checkbox" id="darkmode-toggle">
                Light/Dark
                <label class="change" for="darkmode-toggle">
            </div>
        </div>
    </footer>

    <div class="loader">A carregar...</div>

    <!--Chatbot-->
    <!--<div id="chatbotContainer">
        <iframe id="chatbotFrame" src="http://127.0.0.1:5000/"></iframe>
    </div>-->


    <script src="js/script.js"></script>

</body>

</html>