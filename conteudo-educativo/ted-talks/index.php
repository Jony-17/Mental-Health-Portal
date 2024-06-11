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
    <link
        href="https://fonts.googleapis.com/css2?family=Kode+Mono:wght@400..700&family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Libre+Baskerville:ital,wght@0,400;0,700;1,400&family=Saira+Condensed:wght@100;200;300;400;500;600;700;800;900&display=swap"
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
                <li><a href="..">Conteúdo Educativo</a>
                    <i class="fas fa-chevron-down"></i>
                    <ul class="dropdown">
                        <li><a href="../quizzes">Quizzes</a></li>
                        <li><a href="../exercicios-mindfulness">Exercícios Mindfulness</a></li>
                        <li><a href="../ted-talks">TED Talks</a></li>
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
            <li class="dropdown-trigger"><a href="..">Conteúdo Educativo <i class="fas fa-chevron-down"></i></a>
                <ul class="dropdown">
                    <li><a href="../quizzes">Quizzes</a></li>
                    <li><a href="../exercicios-mindfulness">Exercícios Mindfulness</a></li>
                    <li><a href="../ted-talks">TED Talks</a></li>
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


    <ol role="list">
        <li class="list">
            <div class="items">
                <a href=".." class="text-sm">
                    Conteúdo Educativo</a>
                <span class="separator">/</span>
            </div>
        </li>

        <li class="list">
            <div class="items-current">
                <div class="text-sm" aria-current=page>
                    TED Talks
                </div>
            </div>
        </li>
    </ol>

    <div class="heading">
        <h1>
            TED Talks
        </h1>
        <a href="https://www.ted.com/playlists/175/the_struggle_of_mental_health" target="_blank"
            class="first-button">Ver todas<i class="fas fa-arrow-up"></i></a>
    </div>

    <!--Explicação do que são TED Talks-->
    <section class="ted-talks" id="ted-talks">
        <div class="ted-talks-card">
            <p>Significa <span class="color"></span>Tecnologia, Entretenimento, Design</span> — três grandes áreas temáticas que moldam
                coletivamente o nosso mundo. Uma conferência TED é ainda mais ampla, apresentando pesquisas e ideias
                importantes de todas as disciplinas e explorando como elas se conectam. O formato é acelerado: mais de
                50 palestras ao longo de três dias a uma semana, além de entrevistas, debates, workshops, atividades,
                exposições interativas, eventos noturnos e festas. O programa foi projetado para que participantes e
                palestrantes de áreas muito diferentes se conectem, fertilizem e se inspirem em lugares improváveis.
            </p>
        </div>


        <!--Backgrounds-->
        <div class="background1">
            <img src="imgs/imgs-backgrounds/background2.png" alt="banner background" />
        </div>

        <div class="background2">
            <img src="imgs/imgs-backgrounds/background2.png" alt="banner background" />
        </div>


        <!--Ted Talks-->
        <div class="card-container">
            <?php
            $query = "SELECT autor, titulo, data, tempo, img_ted_talks, link
                              FROM ted_talks LIMIT 1";

            $result = mysqli_query($conn, $query);

            if ($result && mysqli_num_rows($result) > 0) {
                /*while ($row = mysqli_fetch_assoc($result)) {*/
                $row = mysqli_fetch_assoc($result);
                ?>

                <div class="card1">
                    <div class="card-background">
                        <a href="<?php echo $row['link']; ?>" target="_blank">
                            <div class="card-background2">
                                <i class="fas fa-play">
                                </i>
                                <img src="../../admin/inserir/imgs/ted-talks/<?php if (!empty($row["img_ted_talks"])) {
                                    echo $row["img_ted_talks"];
                                } else {
                                    echo "teste.jpeg";
                                } ?>" alt="Ted Talks">
                            </div>
                        </a>
                    </div>
                    <div class="card1-content">
                        <h3>
                            <?php echo $row['autor']; ?>
                        </h3>
                        <h1>
                            <?php echo $row['titulo']; ?>
                        </h1>
                        <div class="info">
                            <p><span class="text-sm">
                                    <?php echo $row['data']; ?>
                                </span><span class="separator">|</span><span class="text-sm">
                                    <?php echo $row['tempo']; ?>
                                </span></p>
                        </div>
                    </div>
                </div>
                <?php
            }
            ?>

            <!-- Container para as outras três TED Talks -->
            <div class="card2-container">
                <?php
                $query2 = "SELECT autor, titulo, data, tempo, img_ted_talks, link FROM ted_talks LIMIT 1, 3";
                $result2 = mysqli_query($conn, $query2);

                while ($row2 = mysqli_fetch_assoc($result2)) {
                    ?>
                    <div class="card2">
                        <div class="card-background">
                            <a href="<?php echo $row2['link']; ?>" target="_blank">
                                <div class="card-background2">
                                    <i class="fas fa-play"></i>
                                    <img src="../../admin/inserir/imgs/ted-talks/<?php if (!empty($row2["img_ted_talks"])) {
                                        echo $row2["img_ted_talks"];
                                    } else {
                                        echo "teste.jpeg";
                                    } ?>" alt="Ted Talks">
                                </div>
                            </a>
                        </div>
                        <div class="card2-content">
                            <h3><?php echo $row2['autor']; ?></h3>
                            <h1><?php echo $row2['titulo']; ?></h1>
                            <div class="info">
                                <p>
                                    <span class="text-sm"><?php echo $row2['data']; ?></span>
                                    <span class="separator">|</span>
                                    <span class="text-sm"><?php echo $row2['tempo']; ?></span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <?php
                }
                ?>
            </div>
    </section>


    <!--Disclaimer-->
    <div class="disclaimer">
        <div class="disclaimer-card">
            <div class="disclaimer-content">
                <p>O Portal de Saúde Mental não é afiliado à TED Conferences LLC.
                    Todas as referências à TED Talks, TEDx, TED, e TED Conferences são utilizadas apenas para fins
                    informativos e de divulgação. O conteúdo disponível neste site é produzido independentemente e não
                    foi revisado, aprovado ou endossado pela TED Conferences LLC. Qualquer opinião, informação, ou
                    conteúdo apresentado aqui é de responsabilidade exclusiva do Portal de Saúde Mental e não reflete
                    necessariamente as opiniões da TED Conferences LLC ou de suas afiliadas.
                </p>
            </div>
        </div>
    </div>

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
        <div class="fontes-content2">
            <p>https://www.ted.com/</p>
        </div>
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
                    <li><a href="https://www.sns24.gov.pt/servico/aconselhamento-psicologico-no-sns-24/#"
                            target="_blank">Apoio Psicológico</a>
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
                    <li><a href="https://eportugal.gov.pt/servicos/pedir-apoio-psicologico-e-emocional-atraves-da-linha-conversa-amiga-"
                            target="_blank">Linha Conversa Amiga</a>
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
                    <svg width="100%" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 496 496">
                        <path fill="currentColor"
                            d="M8,256C8,393,119,504,256,504S504,393,504,256,393,8,256,8,8,119,8,256ZM256,440V72a184,184,0,0,1,0,368Z"
                            transform="translate(-8 -8)" />
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