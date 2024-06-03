<?php
include '../includes/header.php';

session_start();
require_once ("../conn/conn.php");

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

<body>
    <style>
        #chatbotContainer {
            position: fixed;
            bottom: 50px;
            right: -10px;
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
                <li><a href="../sobre-nos">Sobre Nós</a></li>
                <li><a href="../perturbacoes">Perturbações</a></li>
                <li><a href="../artigos">Artigos</a></li>
                <li><a href="../noticias">Notícias</a></li>
                <li><a href="../conteudo-educativo">Conteúdo Educativo</a>
                    <i class="fas fa-chevron-down"></i>
                    <ul class="dropdown">
                        <li><a href="../conteudo-educativo/quizzes">Quizzes</a></li>
                        <li><a href="../conteudo-educativo/exercicios-mindfulness">Exercícios Mindfulness</a></li>
                        <li><a href="../conteudo-educativo/ted-talks">TED Talks</a></li>
                    </ul>
                </li>
                </li>
            </ul>

            <?php if (!empty($_SESSION['id_utilizador'])): ?>
                <li class="dropdown-container">
                    <div class="profile-dropdown">
                        <img class="img-profile rounded-circle" src="../areacliente/registo/imgs/<?php if (!empty($row["img_perfil"])) {
                            echo $row["img_perfil"];
                        } else {
                            echo "teste.jpeg";
                        } ?>" alt="Imagem de Perfil">
                        <i class="fas fa-chevron-down" style="margin-right: 20px;"></i>
                        <ul class="dropdown-p">
                            <li><a href="../perfil/">Perfil</a></li>
                            <!--<li><a href="#">Termos e Condições</a></li>
                            <li><a href="#">Definições</a></li>-->
                        </ul>
                    </div>
                    <a class="btn" onclick="logout()">Terminar Sessão</a>
                </li>
            <?php else: ?>
                <li><a class="btn" href="../areacliente/login/">Iniciar Sessão</a></li>
            <?php endif ?>

            <div class="toggle_btn">
                <i class="fas fa-bars"></i>
            </div>
        </div>


        <div class="dropdown_menu">
            <li><a href="../sobre-nos">Sobre Nós</a></li>
            <li><a href="../perturbacoes">Perturbações</a></li>
            <li><a href="../artigos">Artigos</a></li>
            <li><a href="../noticias">Notícias</a></li>
            <li class="dropdown-trigger"><a href="../conteudo-educativo">Conteúdo Educativo <i
                        class="fas fa-chevron-down"></i></a>
                <ul class="dropdown">
                    <li><a href="../conteudo-educativo/quizzes">Quizzes</a></li>
                    <li><a href="..conteudo-educativo/exercicios-mindfulness">Exercícios Mindfulness</a></li>
                    <li><a href="../conteudo-educativo/ted-talks">TED Talks</a></li>
                </ul>
            </li>

            <?php if (!empty($_SESSION['id_utilizador'])): ?>
                <li class="dropdown-trigger">
                    <a href="#">
                        <img class="img-profile rounded-circle" src="../areacliente/registo/imgs/<?php if (!empty($row["img_perfil"])) {
                            echo $row["img_perfil"];
                        } else {
                            echo "teste.jpeg";
                        } ?>" alt="Imagem de Perfil">
                        <i class="fas fa-chevron-down"></i></a>
                    <ul class="dropdown">
                        <li><a href="../perfil/">Perfil</a></li>
                        <!--<li><a href="#">Termos e Condições</a></li>
                        <li><a href="#">Definições</a></li>-->
                    </ul>
                </li>
                <li><a class="btn" onclick="logout()">Terminar Sessão</a></li>
            <?php else: ?>
                <li><a class="btn" href="../areacliente/login/">Iniciar Sessão</a></li>
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
                            window.location = "../logout/logout.php";
                        }
                    });
                }
            </script>

        </div>
    </header>


    <!--Home-->
    <section class="home" id="home">
        <div class="home-banner-container">
            <div class="home-bannerImage-container">
                <img src="imgs/imgs-backgrounds/background1.png" alt="banner background" />
            </div>

            <!--<div class="home-banner2Image-container">
                <img src="imgs/imgs-backgrounds/background-nuvens.png" alt="banner background" />
            </div>-->

            <div class="home-text-section">
                <h1 class="home-primary-heading">
                    Saúde Mental <br> É Uma Prioridade
                </h1>
                <p class="home-primary-text">
                    Comece hoje a melhorar a sua saúde mental e bem-estar!
                </p>
                <a href="#about" class="secondary-button">
                    <i class="fas fa-arrow-down"></i> Sabe mais
                </a>
            </div>
            <div class="image-container2">
                <img src="imgs/imgs-home/background.png" alt="" />
            </div>
        </div>
    </section>


    <!--About-->
    <section class="about" id="about">
        <div class="about-banner-container">
            <div class="about-bannerImage2-container">
                <img src="imgs/imgs-backgrounds/background2.png" alt="banner background" />
            </div>

            <div class="about-bannerImage3-container">
                <img src="imgs/imgs-backgrounds/background3.png" alt="banner background" />
            </div>

            <div class="image-container">
                <img src="imgs/imgs-about/image2.png" alt="" />
            </div>

            <div class="about-text-section">
                <h2 class="about-primary-heading">A nossa missão</h2>
                <h1 class="primary-heading">
                    Nós queremos <br> saber de ti
                </h1>
                <p class="about-primary-text">
                    Nós encarregamo-nos de fornecer todo o conhecimento e habilidades necessárias para fortalecer a sua
                    saúde mental e bem-estar
                </p>
                <div class="card">
                    <div class="card-body">
                        <i class="fas fa-comments"></i>
                        <h1 class="card-title">Fórum de discussão</h1>
                    </div>

                    <div class="card-body">
                        <i class="fas fa-robot"></i>
                        <h1 class="card-title">Chatbot com ajuda personalizada</h1>
                    </div>

                    <div class="card-body">
                        <i class="fas fa-sticky-note"></i>
                        <h1 class="card-title">Conteúdo educativo</h1>
                    </div>

                    <div class="card-body">
                        <i class="far fa-newspaper"></i>
                        <h1 class="card-title">Artigos científicos atualizados</h1>
                    </div>
                </div>

            </div>
        </div>
    </section>


    <!--Tipos Perturbações Mentais-->
    <section class="perturbacoes" id="perturbacoes">
        <div class="perturbacoes-banner-container">
            <h2 class="perturbacoes-primary-heading">Tipos</h2>
            <div class="perturbacoes-banner-container2">
                <h1 class="perturbacoes-second-heading">
                    Perturbações Mentais
                </h1>
                <a href="../perturbacoes" class="third-button">Ver mais</a>
            </div>
        </div>
        <?php

        $query = "SELECT nome, img_perturbacao, img_perturbacao_circ FROM perturbacoes LIMIT 4";
        $result = mysqli_query($conn, $query);

        if ($result && mysqli_num_rows($result) > 0) {
            ?>
            <div class="card2-container">
                <?php

                while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <div class="card2">
                        <?php

                        $nome_codificado = urlencode($row["nome"]);

                        ?>
                        <a href="../perturbacoes/grupo-perturbacoes/?nome=<?php echo $nome_codificado; ?>">
                            <img src="<?php echo $row["img_perturbacao_circ"] ?>" alt="Perturbações Mentais">
                        </a>
                        <h1><?php echo $row["nome"] ?></h1>
                    </div>
                    <?php
                }
                ?>
            </div>
            <?php
        } else {
            echo 'deu';
        }
        ?>
    </section>


    <!--Artigos científicos-->
    <section class="artigos" id="artigos">
        <div class="artigos-banner-container">
            <div class="artigos-bannerImage2-container">
                <img src="imgs/imgs-backgrounds/background2.png" alt="banner background" />
            </div>
            <h2 class="artigos-primary-heading">Artigos Científicos</h2>
            <h1 class="artigos-second-heading">Últimas publicações</h1>
        </div>
        <?php

        $query = "SELECT artigos.juncao_perturbacoes_id, perturbacoes.nome AS perturbacao_nome, grupos_perturbacoes.nome AS grupo_nome, artigos.titulo, artigos.data_publicacao, artigos.autor, artigos.img_artigo 
        FROM artigos 
        INNER JOIN juncao_perturbacoes ON artigos.juncao_perturbacoes_id = juncao_perturbacoes.juncao_perturbacoes_id
        INNER JOIN perturbacoes ON juncao_perturbacoes.perturbacoes_id = perturbacoes.perturbacoes_id
        INNER JOIN grupos_perturbacoes ON juncao_perturbacoes.grupos_perturbacoes_id = grupos_perturbacoes.grupos_perturbacoes_id LIMIT 3";
        $result = mysqli_query($conn, $query);

        if ($result && mysqli_num_rows($result) > 0) {
            ?>
            <div class="card3-container">

                <?php

                while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <div class="card3">
                        <?php

                        $titulo_codificado = urlencode($row["titulo"]);

                        ?>
                        <a href="../artigos/artigo/?titulo=<?php echo $titulo_codificado; ?>">
                            <img src="../admin/inserir/imgs/artigos/<?php if (!empty($row["img_artigo"])) {
                                echo $row["img_artigo"];
                            } else {
                                echo "teste.jpeg";
                            } ?>" alt="Artigos" class="lazyload">
                        </a>
                        <div class="card3-content">
                            <h3>
                                <?php echo $row["perturbacao_nome"] ?>
                            </h3>
                            <h2>
                                <?php echo $row["grupo_nome"] ?>
                            </h2>
                            <h1>
                                <?php echo $row["titulo"] ?>
                            </h1>
                            <p>
                                <?php echo $row['data_publicacao'] ?>
                            </p>
                            <p>
                                <?php echo $row['autor'] ?>
                            </p>
                        </div>
                    </div>
                    <?php
                }
                ?>
            </div>
            <?php
        } else {
            echo "deu";
        }
        ?>
        <a href="../artigos" class="fourth-button">Ver mais</a>
    </section>


    <!--Quizzes-->
    <section class="quizzes" id="quizzes">
        <div class="quizzes-banner-container">
            <div class="quizzes-bannerImage4-container">
                <img src="imgs/imgs-backgrounds/background4.png" alt="banner background" />
            </div>
            <h2 class="quizzes-primary-heading">Quizzes</h2>
            <h1 class="quizzes-second-heading">Descobre o que és</h1>
        </div>
        <div class="card4-container">
            <?php
            $query = "SELECT * FROM quiz_nome LIMIT 2";
            $query_run = mysqli_query($conn, $query);

            if (mysqli_num_rows($query_run) > 0) {
                while ($row = mysqli_fetch_assoc($query_run)) {
                    ?>
                    <?php
                    $nome_codificado = urlencode($row["nome"]);
                    ?>
                    <a href="../conteudo-educativo/quizzes/quizz/?nome=<?php echo $nome_codificado; ?>&quiz_nome_id=<?php echo $row['quiz_nome_id']; ?>"
                        onclick="loadQuizData(<?php echo $row['quiz_nome_id']; ?>);">
                        <div class="card4">
                            <div class="card4-content">
                                <h1><?php echo $row['nome']; ?></h1>
                            </div>
                            <div class="card4-content2">
                                <img src="../admin/inserir/imgs/quizzes/<?php if (!empty($row["img_quiz"])) {
                                    echo $row["img_quiz"];
                                } else {
                                    echo "teste.jpeg";
                                } ?>" alt="Quizz">
                            </div>
                        </div>
                    </a>
                    <!--<a href="../conteudo-educativo/quizzes/quizzes-emocao">
                        <div class="card4">
                            <div class="card4-content">
                                <h1>O quão livre és, emocionalmente?</h1>
                            </div>
                            <div class="card4-content2">
                                <img src="imgs/imgs-quizzes/livre.png" alt="O que é a saúde mental?">
                            </div>
                        </div>
                    </a>-->
                    <?php
                }
            } else {
                echo '<div style="margin: 100px 100px 30px 100px; font-size: 20px;">Nenhuma perturbação encontrada.</div>';
            }
            ?>
        </div>
        <a href="../conteudo-educativo/quizzes" class="fifth-button">Ver mais</a>
    </section>


    <!--Notícias-->
    <section class="noticias" id="noticias">
        <div class="noticias-banner-container">
            <div class="noticias-bannerImage2-container">
                <img src="imgs/imgs-backgrounds/background2.png" alt="banner background" />
            </div>
            <h2 class="noticias-primary-heading">Notícias</h2>
            <div class="noticias-banner-container2">
                <h1 class="noticias-second-heading">Saúde Mental</h1>
                <a href="../noticias" class="sixth-button">Ver mais</a>
            </div>
        </div>


        <div class="card5-container">
            <?php
            $query = "SELECT autor, titulo, img_noticia
                              FROM noticias LIMIT 1";

            $result = mysqli_query($conn, $query);

            if ($result && mysqli_num_rows($result) > 0) {
                /*while ($row = mysqli_fetch_assoc($result)) {*/
                $row = mysqli_fetch_assoc($result);
                ?>

                <div class="card5">
                    <?php

                    $titulo_codificado = urlencode($row["titulo"]);

                    ?>
                    <a href="../noticias/noticia/?titulo=<?php echo $titulo_codificado; ?>">
                        <div class="card5-background2">
                            <h1><?php echo $row['titulo']; ?></h1>
                            <h3><?php echo $row['autor']; ?></h3>
                            <img src="../admin/inserir/imgs/noticias/<?php if (!empty($row["img_noticia"])) {
                                echo $row["img_noticia"];
                            } else {
                                echo "teste.jpeg";
                            } ?>" alt="Notícias">
                        </div>
                    </a>
                </div>
                <?php
            }
            ?>

            <div class="card6-container">
                <div class="card-group">
                    <?php
                    $query2 = "SELECT autor, titulo, img_noticia
                                FROM noticias LIMIT 1, 2";
                    $result2 = mysqli_query($conn, $query2);

                    while ($row2 = mysqli_fetch_assoc($result2)) {
                        ?>
                        <div class="card6">
                            <?php

                            $titulo_codificado2 = urlencode($row2["titulo"]);

                            ?>
                            <a href="../noticias/noticia/?titulo=<?php echo $titulo_codificado2; ?>">
                                <div class="card6-background2">
                                    <img src="../admin/inserir/imgs/noticias/<?php if (!empty($row2["img_noticia"])) {
                                        echo $row2["img_noticia"];
                                    } else {
                                        echo "teste.jpeg";
                                    } ?>" alt="Notícias">
                                    <h1><?php echo $row2['titulo']; ?></h1>
                                    <h3><?php echo $row2['autor']; ?></h3>
                                </div>
                            </a>
                        </div>
                        <?php
                    }
                    ?>
                </div>
                <div class="card-group">
                    <?php
                    $query3 = "SELECT autor, titulo, img_noticia
                                 FROM noticias LIMIT 2 OFFSET 3";
                    $result3 = mysqli_query($conn, $query3);

                    while ($row3 = mysqli_fetch_assoc($result3)) {
                        ?>
                        <div class="card6">
                            <?php

                            $titulo_codificado3 = urlencode($row3["titulo"]);

                            ?>
                            <a href="../noticias/noticia/?titulo=<?php echo $titulo_codificado3; ?>">
                                <div class="card6-background2">
                                    <img src="../admin/inserir/imgs/noticias/<?php if (!empty($row3["img_noticia"])) {
                                        echo $row3["img_noticia"];
                                    } else {
                                        echo "teste.jpeg";
                                    } ?>" alt="Notícias">
                                    <h1><?php echo $row3['titulo']; ?></h1>
                                    <h3><?php echo $row3['autor']; ?></h3>
                                </div>
                            </a>
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </div>

    </section>

    <!--Perguntas Frequentes-->
    <section class="perguntas" id="perguntas">
        <div class="perguntas-banner-container">
            <div class="perguntas-bannerImage5-container">
                <img src="imgs/imgs-backgrounds/background5.png" alt="banner background" />
            </div>
            <h2 class="perguntas-primary-heading">O que precisas de saber</h2>
            <h1 class="perguntas-second-heading">Perguntas Frequentes</h1>
        </div>
        <?php
        $query = "SELECT pergunta, resposta FROM perguntas";
        $result = mysqli_query($conn, $query);

        while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <div class="faq">
                <div class="question">
                    <h3><?php echo $row['pergunta']; ?></h3>
                    <svg width="15" height="10" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                        <!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.-->
                        <path
                            d="M207 381.5L12.7 187.1c-9.4-9.4-9.4-24.6 0-33.9l22.7-22.7c9.4-9.4 24.5-9.4 33.9 0L224 284.5l154.7-154c9.4-9.3 24.5-9.3 33.9 0l22.7 22.7c9.4 9.4 9.4 24.6 0 33.9L241 381.5c-9.4 9.4-24.6 9.4-33.9 0z" />
                    </svg>
                </div>
                <div class="answer">
                    <p><?php echo $row['resposta']; ?>
                    </p>
                </div>

            </div>
            <?php
        }
        ?>
    </section>


    <!--Newsletter-->
    <?php if (empty($_SESSION['id_utilizador'])): ?>
        <section class="newsletter" id="newsletter">
            <div class="newsletter-container">
                <div class="box-newsletter">
                    <h2>Junta-te à nossa comunidade!</h2>
                    <p>Aqui poderás ter acesso a informação credível e fundamental
                        no que toca à saúde mental</p>
                    <a href="../areacliente/registo/">Registar</a>
                </div>
            </div>
        </section>
    <?php endif; ?>


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
                                    href="../perturbacoes/grupo-perturbacoes/?nome=<?php echo $nome_codificado; ?>"><?php echo $row["nome"] ?></a>
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
                                    href="../artigos/artigo/?titulo=<?php echo $titulo_codificado; ?>"><?php echo $row["titulo"] ?></a>
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
                                    href="../noticias/noticia/?titulo=<?php echo $titulo_codificado; ?>"><?php echo $row["titulo"] ?></a>
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
                    <li><a href="#" target="_blank">Apoio Psicológico</a>
                        <ul>
                            <li>24h/dia</li>
                        </ul>
                    </li>
                </ul>
                <ul>
                    <li><a href="#" target="_blank">Vira(l)Solidariedade</a>
                        <ul>
                            <li>Todos os dias das 08h00 às 00h00</li>
                        </ul>
                    </li>
                </ul>
                <ul>
                    <li><a href="#" target="_blank">SOS Voz Amiga</a>
                        <ul>
                            <li>Todos os dias das 15:30h às 00:30h</li>
                        </ul>
                    </li>
                </ul>
                <ul>
                    <li><a href="#" target="_blank">Linha Conversa Amiga</a>
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
                <a href="../termos-e-condicoes">Termos e Condições</a>

                <div class="vertical-hr"></div>

                <a href="../perguntas-frequentes">Perguntas Frequentes</a>

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
    <script src="../darkmode/darkmode.js"></script>

</body>

</html>