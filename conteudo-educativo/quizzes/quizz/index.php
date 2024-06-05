<?php
include '../../../includes/header.php';

session_start();
require_once ("../../../conn/conn.php");

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
    // Armazena a URL de destino na sessão
    $_SESSION['redirect_url'] = $_SERVER['REQUEST_URI'];
    header("Location: ../../../areacliente/login");
    exit();
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
                <li><a href="../../../paginainicial">Página Inicial</a></li>
                <li><a href="../../../sobre-nos">Sobre Nós</a></li>
                <li><a href="../../../perturbacoes">Perturbações</a></li>
                <li><a href="../../../artigos">Artigos</a></li>
                <li><a href="../../../noticias">Notícias</a></li>
                <li><a href="../..">Conteúdo Educativo</a>
                    <i class="fas fa-chevron-down"></i>
                    <ul class="dropdown">
                        <li><a href="..">Quizzes</a></li>
                        <li><a href="../../exercicios-mindfulness">Exercícios Mindfulness</a></li>
                        <li><a href="../../ted-talks">TED Talks</a></li>
                    </ul>
                </li>
                </li>
            </ul>

            <?php if (!empty($_SESSION['id_utilizador'])): ?>
                <li class="dropdown-container">
                    <div class="profile-dropdown">
                        <img class="img-profile rounded-circle" src="../../../areacliente/registo/imgs/<?php if (!empty($row["img_perfil"])) {
                            echo $row["img_perfil"];
                        } else {
                            echo "teste.jpeg";
                        } ?>" alt="Imagem de Perfil">
                        <i class="fas fa-chevron-down" style="margin-right: 20px;"></i>
                        <ul class="dropdown-p">
                            <li><a href="../../../perfil/">Perfil</a></li>
                            <!--<li><a href="#">Termos e Condições</a></li>
                            <li><a href="#">Definições</a></li>-->
                        </ul>
                    </div>
                    <a class="btn" onclick="logout()">Terminar Sessão</a>
                </li>
            <?php else: ?>
                <li><a class="btn" href="../../../areacliente/login/">Iniciar Sessão</a></li>
            <?php endif ?>

            <div class="toggle_btn">
                <i class="fas fa-bars"></i>
            </div>
        </div>


        <div class="dropdown_menu">
            <li><a href="../../../paginainicial">Página Inicial</a></li>
            <li><a href="../../../sobre-nos">Sobre Nós</a></li>
            <li><a href="../../../perturbacoes">Perturbações</a></li>
            <li><a href="../../../artigos">Artigos</a></li>
            <li><a href="../../../noticias">Notícias</a></li>
            <li class="dropdown-trigger"><a href="../..">Conteúdo Educativo <i class="fas fa-chevron-down"></i></a>
                <ul class="dropdown">
                    <li><a href="..">Quizzes</a></li>
                    <li><a href="../../exercicios-mindfulness">Exercícios Mindfulness</a></li>
                    <li><a href="../../ted-talks">TED Talks</a></li>
                </ul>
            </li>

            <?php if (!empty($_SESSION['id_utilizador'])): ?>
                <li class="dropdown-trigger">
                    <a href="#">
                        <img class="img-profile rounded-circle" src="../../../areacliente/registo/imgs/<?php if (!empty($row["img_perfil"])) {
                            echo $row["img_perfil"];
                        } else {
                            echo "teste.jpeg";
                        } ?>" alt="Imagem de Perfil">
                        <i class="fas fa-chevron-down"></i></a>
                    <ul class="dropdown">
                        <li><a href="../../../perfil/">Perfil</a></li>
                        <!--<li><a href="#">Termos e Condições</a></li>
                        <li><a href="#">Definições</a></li>-->
                    </ul>
                </li>
                <li><a class="btn" onclick="logout()">Terminar Sessão</a></li>
            <?php else: ?>
                <li><a class="btn" href="../../../areacliente/login/">Iniciar Sessão</a></li>
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
                            window.location = "../../../logout/logout.php";
                        }
                    });
                }
            </script>
        </div>
    </header>

    <?php
    if (isset($_GET['nome'])) {
        $nome_quiz = urldecode($_GET['nome']);

        $query = "SELECT nome, quiz_nome_id FROM quiz_nome WHERE nome = '$nome_quiz'";
        $result = mysqli_query($conn, $query);

        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $quiz_nome_id = $row['quiz_nome_id'];

            ?>
            <ol role="list">
                <li class="list">
                    <div class="items">
                        <a href="../.." class="text-sm">
                            Conteúdo Educativo</a>
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
                            <?php echo $row['nome']; ?>
                        </span>
                    </div>
                </li>
            </ol>
            <?php
        }
    }
    ?>



    <!--Quizzes-->
    <section class="quizzes" id="quizzes">
        <div class="quizzes-banner-container">

            <div class="quizzes-text-section">
                <div class="card">
                    <div class="card-body">
                        <?php
                        $query = "SELECT nome, explicacao_quiz, texto_informacao FROM quiz_nome WHERE nome = '$nome_quiz'";
                        $query_run = mysqli_query($conn, $query);
                        ?>
                        <?php
                        if (mysqli_num_rows($query_run) > 0) {
                            while ($row = mysqli_fetch_assoc($query_run)) {
                                ?>
                                <h1 class="card-title"><?php echo $row['nome']; ?></h1>
                                <p><?php echo $row['explicacao_quiz']; ?></p>
                                <h2 class="card-title2">Informações acerca</h2>
                                <p><?php echo $row['texto_informacao']; ?>
                                </p>
                                <p class="disclaimer">Isenção de responsabilidade: este quizz é apenas para fins de
                                    entretenimento. De forma alguma
                                    este é um teste empiricamente validado. Os conceitos apresentados pela Dra. Judith Orloff
                                    não estão enraizados em nenhuma pesquisa conhecida. Contudo, caso queira aprender mais
                                    acerca desta temática pode sempre aceder ao livro da autora. <a href="#fontes">[1]</a></p>
                            </div>
                            <?php
                            }
                        }
                        ?>
                </div>
            </div>


            <div class="quizzes-text-section">
                <div class="card">
                    <div class="card-body2">

                        <div class="quiz-container" id="quiz">
                            <div class="quiz-header">
                                <?php
                                if (isset($_GET['quiz_nome_id'])) {
                                    $quiz_nome_id = $_GET['quiz_nome_id'];
                                    $query2 = "SELECT COUNT(*) AS total_perguntas FROM quiz_questoes WHERE quiz_nome_id = $quiz_nome_id";
                                    $query_run2 = mysqli_query($conn, $query2);

                                    if ($row2 = mysqli_fetch_assoc($query_run2)) {
                                        $total_perguntas = $row2['total_perguntas'];
                                        ?>

                                        <p class="disclaimer2">Responda a cada uma das <?php echo $total_perguntas; ?>
                                            perguntas. Seja honesta/o para obter o resultado mais preciso.</p>

                                        <?php

                                        $query_perguntas = "SELECT questao, opcao_a, opcao_b FROM quiz_questoes WHERE quiz_nome_id = $quiz_nome_id";
                                        $query_run_perguntas = mysqli_query($conn, $query_perguntas);
                                        if ($row_pergunta = mysqli_fetch_assoc($query_run_perguntas)) {
                                            ?>
                                            <h2 id="question"><?php echo $row_pergunta['questao']; ?></h2>
                                            <ul class="ul-question">
                                                <li class="li-question">
                                                    <input type="radio" name="answer" id="a" class="answer">
                                                    <label for="a" id="a_text"><?php echo $row_pergunta['opcao_a']; ?></label>
                                                </li>
                                                <li class="li-question">
                                                    <input type="radio" name="answer" id="b" class="answer">
                                                    <label for="b" id="b_text"><?php echo $row_pergunta['opcao_b']; ?></label>
                                                </li>
                                            </ul>
                                            <?php
                                        }
                                    }
                                }
                                ?>


                                <button class="button-quiz" id="nextButton" onclick="nextQuestion()">Próxima</button>
                                <button class="button-quiz" id="submitButton" onclick="submitQuiz()">Obter
                                    resultados</button>
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
                <?php
                if (isset($_GET['nome'])) {
                    // Obter o título do artigo da URL e decodificar
                    $nome = urldecode($_GET['nome']);

                    // Consulta SQL para buscar o artigo pelo título
                    $query = "SELECT q.fonte
                      FROM quiz_nome q
                      WHERE q.nome = '$nome' AND fonte != ''";

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
                                    href="../../../perturbacoes/grupo-perturbacoes/?nome=<?php echo $nome_codificado; ?>"><?php echo $row["nome"] ?></a>
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
                                    href="../../../artigos/artigo/?titulo=<?php echo $titulo_codificado; ?>"><?php echo $row["titulo"] ?></a>
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
                                    href="../../../noticias/noticia/?titulo=<?php echo $titulo_codificado; ?>"><?php echo $row["titulo"] ?></a>
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
                <a href="../../../termos-e-condicoes">Termos e Condições</a>

                <div class="vertical-hr"></div>

                <a href="../../../perguntas-frequentes">Perguntas Frequentes</a>

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
    <script src="js/script-quizz.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lazysizes/5.3.2/lazysizes.min.js" async></script>
    <script src="../../../darkmode/darkmode.js"></script>

</body>

</html>