<?php
session_start();
require_once ("../../../conn/conn.php");

// Verifica se a sessão do usuário está definida
if (isset ($_SESSION['id_utilizador'])) {

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
    header("Location: ../../../areacliente/login");
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
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Kode+Mono:wght@400..700&family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Saira+Condensed:wght@100;200;300;400;500;600;700;800;900&display=swap"
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
                <li><a href="#artigos">Artigos</a></li>
                <li><a href="#noticias">Notícias</a></li>
                <li><a href="#">Conteúdo Educativo</a>
                    <i class="fas fa-chevron-down"></i>
                    <ul class="dropdown">
                        <li><a href="../index.php">Quizzes</a></li>
                        <li><a href="#">Exercícios Mindfulness</a></li>
                        <li><a href="#">TED Talks</a></li>
                    </ul>
                </li>
                </li>
            </ul>

            <?php if (!empty ($_SESSION['id_utilizador'])): ?>
                <li class="dropdown-container">
                    <div class="profile-dropdown">
                        <img class="img-profile rounded-circle" src="../../areacliente/registo/imgs/<?php if (!empty ($row["img_perfil"])) {
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
                <li><a class="btn" href="../areacliente/login/">Iniciar Sessão</a></li>
            <?php endif ?>

            <div class="toggle_btn">
                <i class="fas fa-bars"></i>
            </div>
        </div>


        <div class="dropdown_menu">
            <li><a href="../../paginainicial">Página Inicial</a></li>
            <li><a href="#">Sobre Nós</a></li>
            <li><a href="../../perturbacoes">Perturbações</a></li>
            <li><a href="#skills">Artigos</a></li>
            <li><a href="#portfolio">Notícias</a></li>
            <li class="dropdown-trigger"><a href="#">Conteúdo Educativo <i class="fas fa-chevron-down"></i></a>
                <ul class="dropdown">
                    <li><a href="../index.php">Quizzes</a></li>
                    <li><a href="#">Exercícios Mindfulness</a></li>
                    <li><a href="#">TED Talks</a></li>
                </ul>
            </li>

            <?php if (!empty ($_SESSION['id_utilizador'])): ?>
                <li class="dropdown-trigger">
                    <a href="#">
                        <img class="img-profile rounded-circle" src="../../areacliente/registo/imgs/<?php if (!empty ($row["img_perfil"])) {
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
                <li><a class="btn" href="../areacliente/login/">Iniciar Sessão</a></li>
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
            <div class="items">
                <a href=".." class="text-sm" aria-current=page>
                    Quizzes
                </a>
                <span class="separator">/</span>
            </div>

        </li>
        <li class="list">
            <div class="items-current">
                <span class="text-sm" aria-current=page>
                    Tens uma energia positiva?
            </span>
            </div>
        </li>
    </ol>


    <!--Quizzes-->
    <section class="quizzes" id="quizzes">
        <div class="quizzes-banner-container">

            <div class="quizzes-text-section">
                <div class="card">
                    <div class="card-body">
                        <h1 class="card-title">Tens uma energia positiva?</h1>
                        <p>Relationships are always an energy exchange. Positive attitudes accentuate wellness. Negative
                            attitudes impair it. Take this quiz to determine your positivity score and the energy impact
                            you have on yourself and others.</p>
                        <h2 class="card-title2">Informações acerca da empatia</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore magna aliqua. Tristique et egestas quis ipsum suspendisse ultrices gravida
                            dictum fusce. In metus vulputate eu scelerisque. Libero id faucibus nisl tincidunt eget
                            nullam non. At elementum eu facilisis sed odio morbi. Et malesuada fames ac turpis. At
                            imperdiet dui accumsan sit. Quisque id diam vel quam. Vitae congue eu consequat ac felis
                            donec et odio pellentesque. Enim lobortis scelerisque fermentum dui faucibus in ornare quam
                            viverra. Tristique senectus et netus et malesuada fames. Diam quam nulla porttitor massa.
                            Consectetur lorem donec massa sapien faucibus. Nisi est sit amet facilisis magna etiam
                            tempor. Aliquam faucibus purus in massa tempor nec feugiat nisl pretium. Dictum fusce ut
                            placerat orci nulla pellentesque dignissim enim. Venenatis urna cursus eget nunc.

                            Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore magna aliqua. Tristique et egestas quis ipsum suspendisse ultrices gravida
                            dictum fusce. In metus vulputate eu scelerisque. Libero id faucibus nisl tincidunt eget
                            nullam non. At elementum eu facilisis sed odio morbi. Et malesuada fames ac turpis. At
                            imperdiet dui accumsan sit. Quisque id diam vel quam. Vitae congue eu consequat ac felis
                            donec et odio pellentesque. Enim lobortis scelerisque fermentum dui faucibus in ornare quam
                            viverra. Tristique senectus et netus et malesuada fames. Diam quam nulla porttitor massa.
                            Consectetur lorem donec massa sapien faucibus. Nisi est sit amet facilisis magna etiam
                            tempor. Aliquam faucibus purus in massa tempor nec feugiat nisl pretium. Dictum fusce ut
                            placerat orci nulla pellentesque dignissim enim. Venenatis urna cursus eget nunc.
                        </p>
                        <p class="disclaimer">Isenção de responsabilidade: este quizz é apenas para fins de
                            entretenimento. De forma alguma
                            este é um teste empiricamente validado. Os conceitos apresentados pela Dra. Judith Orloff
                            não estão enraizados em nenhuma pesquisa conhecida. Contudo, caso queira aprender mais
                            acerca desta temática pode sempre aceder ao livro da autora. <a href="#fontes">[1]</a></p>
                    </div>
                </div>
            </div>


            <div class="quizzes-text-section">
                <div class="card">
                    <div class="card-body2">

                        <div class="quiz-container" id="quiz">
                            <div class="quiz-header">
                                <p class="disclaimer2">Responda a cada uma das 9 perguntas. Seja honesta/o para obter o
                                    resultado
                                    mais preciso
                                </p>
                                <h2 id="question">Question Text</h2>
                                <ul class="ul-question">
                                    <li class="li-question">
                                        <input type="radio" name="answer" id="a" class="answer">
                                        <label for="a" id="a_text">Answer</label>
                                    </li>
                                    <li class="li-question">
                                        <input type="radio" name="answer" id="b" class="answer">
                                        <label for="b" id="b_text">Answer</label>
                                    </li>
                                </ul>
                                <button class="button-quiz" id="nextButton" onclick="nextQuestion()">Próxima</button>
                                <button class="button-quiz" id="submitButton" onclick="submitQuiz()">Obter resultados</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="quizzes-text-section">
                <div class="card">
                    <div class="card-body3">
                        <p>Esta triagem online não é uma ferramenta de diagnóstico. Somente um
                            profissional médico treinado, como um médico ou profissional de saúde mental, pode ajudá-lo
                            a determinar os próximos passos mais adequados para você</p>
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
                    <p>1. Orloff, J. (2015). Emotional Freedom: Liberati delle emozioni negative e trasforma la tua
                        vita. MyLife.</p>
                </div>
            </div>
    </section>

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
    <script src="js/script-quizz.js"></script>

</body>

</html>