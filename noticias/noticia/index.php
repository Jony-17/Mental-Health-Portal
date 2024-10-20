<?php

include '../../includes/header.php';

session_start();
require_once ("../../conn/conn.php");

// Define a zona de tempo para Portugal
date_default_timezone_set('Europe/Lisbon');

setlocale(LC_TIME, 'pt_PT.utf8');

// Verifica se a sessão do utilizador está definida
if (isset($_SESSION['id_utilizador'])) {

    // Se a sessão do utilizador já estiver definida, echo
    echo "Sessão do utilizador já está definida. ID do utilizador: " . $_SESSION['id_utilizador'];

    $utilizador_id = $_SESSION['id_utilizador'];

    // Consulta SQL
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

        // Consulta SQL para obter a notícia
        $query = "SELECT noticias_id, titulo FROM noticias WHERE titulo = '$titulo_artigo'";

        // Executar a consulta
        $result = mysqli_query($conn, $query);

        // Verificar se a consulta foi bem-sucedida e se retornou pelo menos uma linha
        if ($result && mysqli_num_rows($result) > 0) {
            // Extrair o resultado da consulta
            $row = mysqli_fetch_assoc($result);
            $noticias_id = $row['noticias_id'];

            // Consulta SQL para obter a noticia_id e o titulo associado à noticia
            $query_grupo = "SELECT noticias_id, titulo FROM noticias";

            // Executar a consulta para obter a noticia_id
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
        <img src="../imgs/imgs-backgrounds/background1.png" alt="banner background" />
    </div>

    <div class="background2">
        <img src="../imgs/imgs-backgrounds/background2.png" alt="banner background" />
    </div>


    <!--Títulos-->
    <?php
    if (isset($_GET['titulo'])) {
        // Obter o título da noticia da URL e decodificar
        $titulo_artigo = urldecode($_GET['titulo']);

        // Consulta SQL para obter a noticia pelo título
        $query = "SELECT noticias_id, titulo FROM noticias WHERE titulo = '$titulo_artigo'";

        // Executar a consulta
        $result = mysqli_query($conn, $query);

        // Verificar se a consulta foi bem-sucedida e se retornou pelo menos uma linha
        if ($result && mysqli_num_rows($result) > 0) {
            // Extrair o resultado da consulta
            $row = mysqli_fetch_assoc($result);
            $noticias_id = $row['noticias_id']; // Acessar o artigo_id associado ao artigo
    
            // Consulta SQL para obter a noticia_id e o titulo associado à notica
            $query_grupo = "SELECT noticias_id, titulo FROM noticias";


            // Executar a consulta para obter a noticia_id e o titulo
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

        // Consulta SQL para obter a noticia pelo autor e data de publicacao
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
            echo '<li class="list"><div class="items"><span class="text-sm">' . $data_publicacao = date("d-m-Y", strtotime($row['data_publicacao'])) . '</span></div></li>';
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

        // Consulta SQL para obter a imagem da noticia
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
            // Consulta SQL para selecionar os pontos do noticia atual apenas
            $query = "SELECT conteudo_noticia_id, noticias_id, ponto, texto FROM conteudo_noticia WHERE noticias_id = $noticias_id";

            // Executar a consulta
            $result = mysqli_query($conn, $query);

            // Verificar se a consulta foi bem-sucedida e se retornou pelo menos uma linha
            if ($result && mysqli_num_rows($result) > 0) {
                // Loop através dos resultados
                while ($row = mysqli_fetch_assoc($result)) {
                    // Exibir o conteúdo de cada ponto dentro dos elementos <div> e <h1>
                    echo '<div class="subheading" id="ponto_' . urlencode($row['ponto']) . '">';
                    echo '<h1>' . $row['ponto'] . '</h1>';
                    echo '<p>' . $row['texto'] . '</p>';
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

            // Consulta SQL para a fonte da noticia
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


    <!--Footer-->
    <footer>
        <div class="footer-row">
            <div class="footer-col">
                <h1>Portal de <br> Saúde Mental.</h1>
                <p>Tu mereces ser feliz.</p>
            </div>

            <?php

            $query = "SELECT nome, img_perturbacao FROM perturbacoes";
            $result = mysqli_query($conn, $query);

            if ($result && mysqli_num_rows($result) > 0) {
                ?>
                <div class="footer-col">
                    <h3>Perturbações</h3>
                    <?php

                    while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                        <ul>
                            <?php

                            $nome_codificado = urlencode($row["nome"]);
                            ?>
                            <li><a
                                    href="../../perturbacoes/grupo-perturbacoes/?nome=<?php echo $nome_codificado; ?>"><?php echo $row["nome"] ?></a>
                            </li>
                        </ul>
                        <?php
                    }
                    ?>
                </div>
                <?php
            }
            ?>

            <!--Artigos-->
            <?php

            $query = "SELECT titulo FROM artigos LIMIT 3";
            $result = mysqli_query($conn, $query);

            if ($result && mysqli_num_rows($result) > 0) {
                ?>

                <div class="footer-col">
                    <h3>Artigos</h3>
                    <?php

                    while ($row = mysqli_fetch_assoc($result)) {
                        ?>

                        <ul>
                            <?php
                            $titulo_codificado = urlencode($row["titulo"]);
                            ?>
                            <li><a
                                    href="../../artigos/artigo/?titulo=<?php echo $titulo_codificado; ?>"><?php echo $row["titulo"] ?></a>
                            </li>
                        </ul>
                        <?php
                    }
                    ?>
                </div>
                <?php
            }
            ?>

            <!--Notícias-->
            <?php

            $query = "SELECT titulo FROM noticias LIMIT 3";
            $result = mysqli_query($conn, $query);

            if ($result && mysqli_num_rows($result) > 0) {
                ?>

                <div class="footer-col">
                    <h3>Notícias</h3>
                    <?php

                    while ($row = mysqli_fetch_assoc($result)) {
                        ?>

                        <ul>
                            <?php
                            $titulo_codificado = urlencode($row["titulo"]);
                            ?>
                            <li><a
                                    href="../../noticias/noticia/?titulo=<?php echo $titulo_codificado; ?>"><?php echo $row["titulo"] ?></a>
                            </li>
                        </ul>
                        <?php
                    }
                    ?>
                </div>
                <?php
            }
            ?>

            <!--Contactos-->
            <div class="footer-col">
                <h3>Contactos</h3>
                <ul>
                    <li><a href="https://www.sns24.gov.pt/servico/aconselhamento-psicologico-no-sns-24/#" target="_blank">Apoio Psicológico</a>
                        <ul>
                            <li>24h/dia</li>
                        </ul>
                    </li>
                </ul>
                <ul>
                    <li><a href="https://www.instagram.com/p/CK665-vMKhw/" target="_blank">Vira(l)Solidariedade</a>
                        <ul>
                            <li>Todos os dias das 08h00 às 00h00</li>
                        </ul>
                    </li>
                </ul>
                <ul>
                    <li><a href="https://www.sosvozamiga.org/pt/contactos/" target="_blank">SOS Voz Amiga</a>
                        <ul>
                            <li>Todos os dias das 15:30h às 00:30h</li>
                        </ul>
                    </li>
                </ul>
                <ul>
                    <li><a href="https://eportugal.gov.pt/servicos/pedir-apoio-psicologico-e-emocional-atraves-da-linha-conversa-amiga-" target="_blank">Linha Conversa Amiga</a>
                        <ul>
                            <li>Dias úteis das 15h00 às 22h00</li>
                            <li>Fins de semana das 19h00 às 22h00</li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>

        <hr>

        <div class="footer-links">
            <p class="copyright">@2024 Todos os direitos reservados</p>
            <div class="footer-links-2">
                <a href="../../termos-e-condicoes">Termos e Condições</a>

                <div class="vertical-hr"></div>

                <a href="../../perguntas-frequentes">Perguntas Frequentes</a>

                <div class="vertical-hr"></div>

                <!--<li class="dropdown-trigger-f"><i class="fas fa-globe"></i>Idioma <i class="fas fa-chevron-down"></i>
                    <ul class="dropdown-f">
                        <li><a href="#" id="portugues" onclick="changeLanguage('portuguese')">Português</a></li>
                        <li><a href="#" id="ingles" onclick="changeLanguage('english')">Inglês</a></li>
                    </ul>
                </li>

                <span><a href="?lang=en-GB" class="lang-link active">EN</a> / <a href="?lang=pt-PT"
                        class="lang-link">PT</a></span>

                <div class="vertical-hr"></div>-->

                Light/Dark<button id="dark-mode-toggle" class="dark-mode-toggle">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" id="dark-mode-icon-light">
                            <path fill="currentColor"
                                d="M283.2 512c79 0 151.1-35.9 198.9-94.8 7.1-8.7-.6-21.4-11.6-19.4-124.2 23.7-238.3-71.6-238.3-197 0-72.2 38.7-138.6 101.5-174.4 9.7-5.5 7.3-20.2-3.8-22.2A258.2 258.2 0 0 0 283.2 0c-141.3 0-256 114.5-256 256 0 141.3 114.5 256 256 256z"
                                transform="translate(-8 -8)" />
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" id="dark-mode-icon-dark"
                            style="display:none">
                            <path fill="currentColor"
                                d="M256 160c-52.9 0-96 43.1-96 96s43.1 96 96 96 96-43.1 96-96-43.1-96-96-96zm246.4 80.5l-94.7-47.3 33.5-100.4c4.5-13.6-8.4-26.5-21.9-21.9l-100.4 33.5-47.4-94.8c-6.4-12.8-24.6-12.8-31 0l-47.3 94.7L92.7 70.8c-13.6-4.5-26.5 8.4-21.9 21.9l33.5 100.4-94.7 47.4c-12.8 6.4-12.8 24.6 0 31l94.7 47.3-33.5 100.5c-4.5 13.6 8.4 26.5 21.9 21.9l100.4-33.5 47.3 94.7c6.4 12.8 24.6 12.8 31 0l47.3-94.7 100.4 33.5c13.6 4.5 26.5-8.4 21.9-21.9l-33.5-100.4 94.7-47.3c13-6.5 13-24.7 .2-31.1zm-155.9 106c-49.9 49.9-131.1 49.9-181 0-49.9-49.9-49.9-131.1 0-181 49.9-49.9 131.1-49.9 181 0 49.9 49.9 49.9 131.1 0 181z" />
                        </svg>
                    </button>
            </div>
        </div>
    </footer>

    <div class="loader">A carregar...</div>

    <!--Chatbot-->
    <!--<div id="chatbotContainer">
        <iframe id="chatbotFrame" src="http://127.0.0.1:5000/"></iframe>
    </div>-->


    <script src="js/script.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lazysizes/5.3.2/lazysizes.min.js" async></script>
    <script src="../../darkmode/darkmode.js"></script>

</body>

</html>