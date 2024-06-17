<?php

include '../../includes/header.php';

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

// Definir o banner

// Verifique se a variável $_GET['nome'] está definida na URL
if (isset($_GET['nome'])) {
    // Obter o título da perturbação da URL e decodificar
    $nome_perturbacao = urldecode($_GET['nome']);

    // Consulta SQL para buscar o banner da perturbação pelo nome
    $query_banner = "SELECT banner_perturbacao FROM perturbacoes WHERE nome = '$nome_perturbacao'";

    // Executar a consulta para obter o banner da perturbação
    $result_banner = mysqli_query($conn, $query_banner);

    // Verificar se a consulta foi bem-sucedida e se retornou pelo menos uma linha
    if ($result_banner && mysqli_num_rows($result_banner) > 0) {
        // Extrair o resultado da consulta
        $row_banner = mysqli_fetch_assoc($result_banner);
        // Atribuir o valor do banner à variável $banner_perturbacao
        $banner_perturbacao = $row_banner['banner_perturbacao'];
    }
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

        .background {
            background-image: url("../../admin/inserir/imgs/perturbacoes/banners/<?php echo $banner_perturbacao; ?>");
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
                <li><a href="..">Perturbações</a></li>
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
            <li><a href="..">Perturbações</a></li>
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
    if (isset($_GET['nome'])) {
        // Obter o nome da perturbação da URL e decodificar
        $nome_perturbacao = urldecode($_GET['nome']);

        // Consulta SQL para buscar a perturbação pelo nome
        $query = "SELECT perturbacoes_id, nome FROM perturbacoes WHERE nome = '$nome_perturbacao'";

        // Executar a consulta
        $result = mysqli_query($conn, $query);

        // Verificar se a consulta foi bem-sucedida e se retornou pelo menos uma linha
        if ($result && mysqli_num_rows($result) > 0) {
            // Extrair o resultado da consulta
            $row = mysqli_fetch_assoc($result);
            $perturbacoes_id = $row['perturbacoes_id'];

            // Consulta SQL para buscar a perturbacao_id e o nome da perturbacao associada ao nome
            $query_grupo = "SELECT nome FROM perturbacoes WHERE perturbacoes_id = $perturbacoes_id";

            // Executar a consulta para obter a perturbacao_id e o nome da perturbacao
            $result_grupo = mysqli_query($conn, $query_grupo);

            ?>
            <div class="background">
                <h1>
                    <?php echo $row['nome'] ?>
                </h1>
            </div>
            <ol role="list">
                <li class="list">
                    <div class="items"><a href=".." class="text-sm">Perturbações Mentais</a><span class="separator">/</span>
                    </div>
                </li>
                <li class="list">
                    <div class="items-current"><span class="text-sm" aria-current="page">
                            <?php echo $row['nome'] ?>
                        </span></div>
                </li>
            </ol>
            <?php
        } else {
            // Se a consulta não retornar nenhum resultado, exibir uma mensagem de erro ou fazer alguma outra ação
            echo "Perturbação não encontrada.";
        }
    } else {
        // Se o título da perturbação não estiver definido na URL, exibir uma mensagem de erro ou fazer alguma outra ação
        echo "Título da perturbação não especificado na URL.";
    }
    ?>


    <!--Botões-->
    <?php
    if (isset($_GET['nome'])) {
        $nome_perturbacao = urldecode($_GET['nome']);
        $perturbacoes_id = $row['perturbacoes_id'];

        $query = "SELECT grupos_perturbacoes.nome AS grupo_perturbacoes_nome
        FROM grupos_perturbacoes
        INNER JOIN juncao_perturbacoes ON juncao_perturbacoes.grupos_perturbacoes_id = grupos_perturbacoes.grupos_perturbacoes_id
        INNER JOIN perturbacoes ON juncao_perturbacoes.perturbacoes_id = perturbacoes.perturbacoes_id
        WHERE perturbacoes.perturbacoes_id = $perturbacoes_id";

        $result = mysqli_query($conn, $query);

        if ($result && mysqli_num_rows($result) > 0) {
            ?>
            <div class="buttons">
                <?php
                while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <a class="btn2" href="perturbacao-especifica/?nome=<?php echo urlencode($row["grupo_perturbacoes_nome"]); ?>">
                        <?php echo $row['grupo_perturbacoes_nome']; ?>
                    </a>
                    <?php
                }
                ?>
            </div>
            <?php
        } else {
            // Se o título da perturbação não estiver definido na URL, exibir uma mensagem de erro ou fazer alguma outra ação
            echo '<div style="padding-left: 100px;">
            O grupo todo, no geral, reflete todos os outros subgrupos.
            </div>';
        }
    }
    ?>

    <!--Texto de cada grupo de Perturbações-->
    <section class="grupo-perturbacoes" id="grupo-perturbacoes">
        <div class="grupo-perturbacoes-card">
            <div class="grupo-perturbacoes-card-body">
                <?php
                // Se o nome da perturbacao estiver definido na URL, exibir o conteúdo do artigo
                if (isset($_GET['nome'])) {
                    $nome_perturbacao = urldecode($_GET['nome']);
                    $query = "SELECT texto FROM perturbacoes WHERE nome = '$nome_perturbacao'";
                    $result = mysqli_query($conn, $query);
                    if ($result && mysqli_num_rows($result) > 0) {
                        $row = mysqli_fetch_assoc($result);
                        echo '<p>' . $row['texto'] . '</p>';
                    } else {
                        echo "Ainda não tem texto.";
                    }
                } else {
                    // Se o título do artigo não estiver definido na URL, exibir uma mensagem de erro ou fazer alguma outra ação
                    echo "Texto da perturbação não especificado na URL.";
                }
                ?>
            </div>
        </div>


        <!--Factos e artigos-->
        <div class="card2-container">
            <div class="card2">
                <?php
                // Se o nome da perturbacao estiver definido na URL, exibir o conteúdo do artigo
                if (isset($_GET['nome'])) {
                    $nome_codificado = urldecode($_GET['nome']);
                    $query = "SELECT nome, img_perturbacao FROM perturbacoes WHERE nome = '$nome_codificado'";
                    $result = mysqli_query($conn, $query);
                    if ($result && mysqli_num_rows($result) > 0) {
                        $row = mysqli_fetch_assoc($result);
                        ?>
                        <a href="factos_10/?nome=<?php echo $nome_codificado; ?>">
                            <img src="../../admin/inserir/imgs/perturbacoes/<?php if (!empty($row["img_perturbacao"])) {
                                echo $row["img_perturbacao"];
                            } else {
                                echo "teste.jpeg";
                            } ?>" alt="Quizz">
                        </a>
                        <div class="card2-content">
                            <h1>10 Factos sobre
                                <?php echo $row["nome"]; ?>
                            </h1>
                            <a class="secondary-button" href="factos_10/?nome=<?php echo $nome_codificado; ?>">
                                Sabe mais<i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>

                    <?php
                    // Consulta para obter informações adicionais sobre a perturbação (outra consulta)
                    $query_info_adicional = "SELECT
                                        perturbacoes.nome AS perturbacoes_nome,
                                        grupos_perturbacoes.nome AS grupos_perturbacoes_nome,
                                        artigos.titulo AS titulo_artigo,
                                        artigos.img_artigo AS img_artigo,
                                        artigos.data_publicacao AS data_artigo,
                                        artigos.autor AS autor_artigo
                                    FROM
                                        grupos_perturbacoes
                                    INNER JOIN juncao_perturbacoes ON juncao_perturbacoes.grupos_perturbacoes_id = grupos_perturbacoes.grupos_perturbacoes_id
                                    INNER JOIN perturbacoes ON juncao_perturbacoes.perturbacoes_id = perturbacoes.perturbacoes_id
                                    INNER JOIN artigos ON juncao_perturbacoes.juncao_perturbacoes_id = artigos.juncao_perturbacoes_id
                                    WHERE
                                        juncao_perturbacoes.perturbacoes_id = $perturbacoes_id AND LENGTH(artigos.titulo) <= 100
                                    LIMIT 3;";
                    $result_info_adicional = mysqli_query($conn, $query_info_adicional);

                    if ($result_info_adicional && mysqli_num_rows($result_info_adicional) > 0) {
                        ?>
                        <div class="card4-container">
                            <?php
                            // Exibir informações adicionais sobre outras perturbações
                            while ($row_info_adicional = mysqli_fetch_assoc($result_info_adicional)) {
                                ?>

                                <div class="card4">
                                    <a
                                        href="../../artigos/artigo/?titulo=<?php echo urlencode($row_info_adicional["titulo_artigo"]); ?>">
                                        <img src="../../admin/inserir/imgs/artigos/<?php if (!empty($row_info_adicional["img_artigo"])) {
                                            echo $row_info_adicional["img_artigo"];
                                        } else {
                                            echo "teste.jpeg";
                                        } ?>" alt="<?php echo $row_info_adicional["img_artigo"]; ?>">
                                    </a>
                                    <div class="card4-content">
                                        <h3>
                                            <?php echo $row_info_adicional["perturbacoes_nome"]; ?>
                                        </h3>
                                        <h2>
                                            <?php echo $row_info_adicional["grupos_perturbacoes_nome"]; ?>
                                        </h2>
                                        <h1>
                                            <?php echo $row_info_adicional["titulo_artigo"]; ?>
                                        </h1>
                                        <p>
                                            <?php echo $row_info_adicional["data_artigo"]; ?>
                                        </p>
                                        <p>
                                            <?php echo $row_info_adicional["autor_artigo"]; ?>
                                        </p>
                                    </div>
                                </div>
                                <?php
                            }
                            ?>
                        </div>
                        <?php
                    } else {
                        echo "Ainda não tem texto para mostrar.";
                    }
                    }
                }
                ?>
        </div>
    </section>


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
            $query = "SELECT p.fonte
                      FROM perturbacoes p
                      WHERE p.nome = '$nome'
                      UNION
                      SELECT fonte
                      FROM (
                          SELECT DISTINCT artigos.fonte
                          FROM artigos 
                          INNER JOIN juncao_perturbacoes ON artigos.juncao_perturbacoes_id = juncao_perturbacoes.juncao_perturbacoes_id
                          INNER JOIN perturbacoes ON juncao_perturbacoes.perturbacoes_id = perturbacoes.perturbacoes_id
                          INNER JOIN grupos_perturbacoes ON juncao_perturbacoes.grupos_perturbacoes_id = grupos_perturbacoes.grupos_perturbacoes_id
                          WHERE artigos.fonte IS NOT NULL AND artigos.fonte <> '' AND juncao_perturbacoes.perturbacoes_id = $perturbacoes_id
                          LIMIT 3
                      ) AS limited_artigos;
                      ";

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