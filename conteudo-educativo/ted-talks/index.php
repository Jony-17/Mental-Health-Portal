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
<html>

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
    </style>
    <header>
        <div class="navbar">
            <div class="logo">Portal de <br> Saúde Mental.</div>

            <ul class="links">
                <li><a href="../../paginainicial">Página Inicial</a></li>
                <li><a href="#about">Sobre Nós</a></li>
                <li><a href="../../perturbacoes">Perturbações</a></li>
                <li><a href="../../artigos">Artigos</a></li>
                <li><a href="#noticias">Notícias</a></li>
                <li><a href="#">Conteúdo Educativo</a>
                    <i class="fas fa-chevron-down"></i>
                    <ul class="dropdown">
                        <li><a href="../quizzes">Quizzes</a></li>
                        <li><a href="#">Exercícios Mindfulness</a></li>
                        <li><a href="#">TED Talks</a></li>
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
                    <a class="btn" onclick="funcao1()">Terminar Sessão</a>
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
            <li><a href="#">Sobre Nós</a></li>
            <li><a href="../../perturbacoes">Perturbações</a></li>
            <li><a href="../../artigos">Artigos</a></li>
            <li><a href="#portfolio">Notícias</a></li>
            <li class="dropdown-trigger"><a href="#">Conteúdo Educativo <i class="fas fa-chevron-down"></i></a>
                <ul class="dropdown">
                    <li><a href="../quizzes">Quizzes</a></li>
                    <li><a href="#">Exercícios Mindfulness</a></li>
                    <li><a href="#">TED Talks</a></li>
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
                <li><a class="btn" onclick="funcao1()">Terminar Sessão</a></li>
            <?php else: ?>
                <li><a class="btn" href="../../areacliente/login/">Iniciar Sessão</a></li>
            <?php endif ?>


            <script>
                function funcao1() {
                    var r = confirm("Deseja realmente terminar sessão?");
                    if (r == true) {
                        var url = "../../logout/logout.php";
                        window.location = url;
                    }
                    document.getElementById("demo").innerHTML = x;
                }
            </script>
        </div>
    </header>


    <ol role="list">
        <li class="list">
            <div class="items">
                <span class="text-sm">
                    Conteúdo Educativo
                </span>
                <span class="separator">/</span>
            </div>

        </li>
        <li class="list">
            <div class="items-current">
                <a href="#" class="text-sm" aria-current=page>
                    TED Talks
                </a>
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
            <p>Stands for <span class="color">Technology, Entertainment, Design</span> — three broad subject areas that
                are collectively
                shaping our world. But a TED conference is broader still, showcasing important research and ideas
                from all disciplines and exploring how they connect. The format is fast-paced: 50+ talks over the
                course of three days to a week, in addition to interviews, debates, workshops, activities,
                interactive exhibits, evening events and parties. The program is designed for attendees and speakers
                from vastly different fields to connect, cross-fertilize and draw inspiration from unlikely places.
                This is the magic of TED.</p>
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
            <div class="card1">
                <div class="card-background">
                    <a href="https://www.ted.com/talks/andrew_solomon_depression_the_secret_we_share?referrer=playlist-the_struggle_of_mental_health&autoplay=true"
                        target="_blank">
                        <div class="card-background2">
                            <i class="fas fa-play">
                            </i>
                            <img src="imgs/1.webp" alt="Depressão">
                        </div>
                    </a>
                </div>
                <div class="card1-content">
                    <h3>Andrew Solomon
                    </h3>
                    <h1>Depression, the secret we share
                    </h1>
                    <div class="info">
                        <p><span class="text-sm">29:07 min</span><span class="separator">|</span><span
                                class="text-sm">Outubro 2013</span></p>
                    </div>
                </div>
            </div>


            <div class="card2-container">

                <div class="card2">
                    <div class="card-background">
                        <a href="https://www.ted.com/talks/andrew_solomon_depression_the_secret_we_share?referrer=playlist-the_struggle_of_mental_health&autoplay=true"
                            target="_blank">
                            <div class="card-background2">
                                <i class="fas fa-play">
                                </i>
                                <img src="imgs/1.webp" alt="Depressão">
                            </div>
                        </a>
                    </div>
                    <div class="card2-content">
                        <h3>Kevin Breel
                        </h3>
                        <h1>Confessions of a depressed comic
                        </h1>
                        <div class="info">
                            <p><span class="text-sm">10:46 min</span><span class="separator">|</span><span
                                    class="text-sm">Maio 2013</span></p>
                        </div>
                    </div>
                </div>

                <div class="card2">
                    <div class="card-background">
                        <a href="https://www.ted.com/talks/andrew_solomon_depression_the_secret_we_share?referrer=playlist-the_struggle_of_mental_health&autoplay=true"
                            target="_blank">
                            <div class="card-background2">
                                <i class="fas fa-play">
                                </i>
                                <img src="imgs/1.webp" alt="Depressão">
                            </div>
                        </a>
                    </div>
                    <div class="card2-content">
                        <h3>Kevin Breel
                        </h3>
                        <h1>Confessions of a depressed comic
                        </h1>
                        <div class="info">
                            <p><span class="text-sm">10:46 min</span><span class="separator">|</span><span
                                    class="text-sm">Maio 2013</span></p>
                        </div>
                    </div>
                </div>

                <div class="card2">
                    <div class="card-background">
                        <a href="https://www.ted.com/talks/andrew_solomon_depression_the_secret_we_share?referrer=playlist-the_struggle_of_mental_health&autoplay=true"
                            target="_blank">
                            <div class="card-background2">
                                <i class="fas fa-play">
                                </i>
                                <img src="imgs/1.webp" alt="Depressão">
                            </div>
                        </a>
                    </div>
                    <div class="card2-content">
                        <h3>Kevin Breel
                        </h3>
                        <h1>Confessions of a depressed comic
                        </h1>
                        <div class="info">
                            <p><span class="text-sm">10:46 min</span><span class="separator">|</span><span
                                    class="text-sm">Maio 2013</span></p>
                        </div>
                    </div>
                </div>


            </div>
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


    <!--Chatbot-->
    <!--<div id="chatbotContainer">
        <iframe id="chatbotFrame" src="http://127.0.0.1:5000/"></iframe>
    </div>-->


    <script src="js/script.js"></script>

</body>

</html>