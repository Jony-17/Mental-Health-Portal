<?php
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
                <li><a href="../paginainicial">Página Inicial</a></li>
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
            <li><a href="../paginainicial">Página Inicial</a></li>
            <li><a href="../sobre-nos">Sobre Nós</a></li>
            <li><a href="../perturbacoes">Perturbações</a></li>
            <li><a href="../artigos">Artigos</a></li>
            <li><a href="../noticias">Notícias</a></li>
            <li class="dropdown-trigger"><a href="../conteudo-educativo">Conteúdo Educativo <i
                        class="fas fa-chevron-down"></i></a>
                <ul class="dropdown">
                    <li><a href="../conteudo-educativo/quizzes">Quizzes</a></li>
                    <li><a href="../conteudo-educativo/exercicios-mindfulness">Exercícios Mindfulness</a></li>
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
                <li><a class="btn" onclick="funcao1()">Terminar Sessão</a></li>
            <?php else: ?>
                <li><a class="btn" href="../areacliente/login/">Iniciar Sessão</a></li>
            <?php endif ?>


            <script>
                function funcao1() {
                    var r = confirm("Deseja realmente terminar sessão?");
                    if (r == true) {
                        var url = "../logout/logout.php";
                        window.location = url;
                    }
                    document.getElementById("demo").innerHTML = x;
                }
            </script>
        </div>
    </header>



    <ol role="list">
        <li class="list">
            <div class="items-current">
                <span class="text-sm" aria-current=page>
                    Artigos
                </span>
                <span class="separator"
                    style="display: <?php echo (isset($_GET['filter']) && ($_GET['filter'] != 'Perturbações')) ? 'inline-block' : 'none'; ?>">/</span>
            </div>
        </li>

        <?php
        // Defina os nomes das perturbações que deseja exibir na lista
        $perturbacoes = array(
            'Perturbações de Ansiedade',
            'Perturbações do Sono - Vigília',
            'Perturbações de Humor',
            'Perturbações Alimentares',
            'Perturbações de Personalidade',
            'Perturbações Obsessivo-Compulsivas',
            'Perturbações relacionadas com Trauma e Fatores de stress'
        );

        // Percorre a lista de perturbações
        foreach ($perturbacoes as $perturbacao) {
            ?>
            <li class="list-visible"
                style="display: <?php echo (isset($_GET['filter']) && ($_GET['filter'] == urldecode($perturbacao))) ? 'inline-block' : 'none'; ?>">
                <div class="items-current">
                    <span class="text-sm" aria-current="page">
                        <?php echo htmlspecialchars($perturbacao); ?>
                    </span>
                </div>
            </li>
            <?php
        }
        ?>

    </ol>

    <div class="background1">
        <img src="background1.png" alt="banner background" />
    </div>

    <div class="background2">
        <img src="background2.png" alt="banner background" />
    </div>

    <div class="heading">
        <h1>
            Artigos
        </h1>
    </div>

    <!--Artigos-->
    <section class="artigos" id="artigos">

        <?php
        // Consulta para obter a lista de perturbações
        $query_perturbacoes = "SELECT nome, perturbacoes_id FROM perturbacoes";
        $result_perturbacoes = mysqli_query($conn, $query_perturbacoes);

        if ($result_perturbacoes && mysqli_num_rows($result_perturbacoes) > 0) {
            ?>
            <div class="buttons">
                <a class="btn2" href="?filter=Perturbações">Todos</a>
                <?php
                while ($row = mysqli_fetch_assoc($result_perturbacoes)) {
                    ?>
                    <a class="btn2" href="?filter=<?php echo urlencode($row['nome']); ?>">
                        <?php echo $row['nome']; ?>
                    </a>
                    <?php
                }
                ?>
            </div>
            <?php
        }
        ?>

        <!--Pesquisa-->
        <div class="container">
            <div class="container-search">
                <form method="GET">
                    <div class="search-wrapper">
                        <i class="fas fa-search"></i>
                        <input id="input-search" type="text" name="search_query"
                            placeholder="Pesquisar o nome de um artigo">
                    </div>
                    <button type="submit">Pesquisar</button>
                </form>
            </div>

            <!--Ordenação-->
            <div class="container-order">
                <form method="get">
                    <button type="submit" name="ordem" value="data_recente">Ordenar por publicação mais recente</button>
                </form>
            </div>
        </div>

        <?php
        // Define o número de itens por página
        $itens_por_pagina = 6;

        // Página atual. Se não for fornecido na URL, assume a primeira página (1)
        $pagina_atual = isset($_GET['pagina']) ? $_GET['pagina'] : 1;

        // Calcula o offset para a consulta SQL com base na página atual
        $offset = ($pagina_atual - 1) * $itens_por_pagina;

        // Consulta SQL para recuperar os artigos
        $query = "SELECT artigos.juncao_perturbacoes_id, perturbacoes.nome AS perturbacao_nome, grupos_perturbacoes.nome AS grupo_nome, artigos.titulo, artigos.data_publicacao, artigos.autor, artigos.img_artigo 
                FROM artigos 
                INNER JOIN juncao_perturbacoes ON artigos.juncao_perturbacoes_id = juncao_perturbacoes.juncao_perturbacoes_id
                INNER JOIN perturbacoes ON juncao_perturbacoes.perturbacoes_id = perturbacoes.perturbacoes_id
                INNER JOIN grupos_perturbacoes ON juncao_perturbacoes.grupos_perturbacoes_id = grupos_perturbacoes.grupos_perturbacoes_id";

        // Adiciona filtro de pesquisa, se fornecido
        if (isset($_GET['search_query']) && !empty($_GET['search_query'])) {
            $search_query = mysqli_real_escape_string($conn, $_GET['search_query']);
            $query .= " WHERE artigos.titulo LIKE '%$search_query%'";
        }

        // Adiciona filtro de perturbação, se fornecido
        if (isset($_GET['filter']) && $_GET['filter'] !== '') {
            $filtro_nome = mysqli_real_escape_string($conn, urldecode($_GET['filter']));
            if ($filtro_nome !== 'Perturbações') {
                $query .= " WHERE perturbacoes.nome = '$filtro_nome'";
            }
        }

        if (isset($_GET['ordem']) && $_GET['ordem'] === 'data_recente') {
            $query .= " ORDER BY artigos.data_publicacao DESC";
        }

        // Conta o número total de artigos com base nos filtros aplicados
        $query_count = "SELECT COUNT(*) AS total FROM ($query) AS count_query";
        $result_count = mysqli_query($conn, $query_count);
        $total_resultados = 0;

        if ($result_count) {
            $row_count = mysqli_fetch_assoc($result_count);
            $total_resultados = $row_count['total'];
        }

        // Calcula o número total de páginas com base nos resultados encontrados
        $total_paginas = ceil($total_resultados / $itens_por_pagina);

        // Adiciona limitação para paginação
        $query .= " LIMIT $itens_por_pagina OFFSET $offset";

        // Executa a consulta SQL
        $result = mysqli_query($conn, $query);

        // Exibe os resultados
        if ($result && mysqli_num_rows($result) > 0) {
            ?>
            <div class="card-container">
                <?php
                while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <div class="card">
                        <?php
                        $titulo_codificado = urlencode($row["titulo"]);
                        ?>
                        <a href="artigo/?titulo=<?php echo $titulo_codificado; ?>">
                            <img src="../admin/inserir/imgs/artigos/<?php if (!empty($row["img_artigo"])) {
                                echo $row["img_artigo"];
                            } else {
                                echo "teste.jpeg";
                            } ?>" alt="<?php echo $row["img_artigo"]; ?>" class="lazyload">
                        </a>
                        <div class="card4-content">
                            <h3><?php echo $row["perturbacao_nome"] ?></h3>
                            <h2><?php echo $row["grupo_nome"] ?></h2>
                            <h1><?php echo $row["titulo"] ?></h1>
                            <p><?php echo $row['data_publicacao'] ?></p>
                            <p><?php echo $row['autor'] ?></p>
                        </div>
                    </div>
                    <?php
                }
                ?>
            </div>
            <?php
        } else {
            echo '<div style="margin: 100px 100px 50px 100px; font-size: 20px;">Nenhum artigo encontrado.</div>';
        }

        // Exibe a paginação
        if ($total_paginas > 1) {
            ?>
            <div class='paginacao'>
                <?php
                // Link para a página anterior
                if ($pagina_atual > 1) {
                    echo "<a href='?pagina=" . ($pagina_atual - 1);
                    if (isset($_GET['filter']) && !empty($_GET['filter'])) {
                        echo "&filter=" . urlencode($_GET['filter']);
                    }

                    if (isset($_GET['search_query']) && !empty($_GET['search_query'])) {
                        echo "&search_query=" . urlencode($_GET['search_query']);
                    }

                    if (isset($_GET['ordem']) && !empty($_GET['ordem'])) {
                        echo "&ordem=" . urlencode($_GET['ordem']);
                    }
                    echo "'>Anterior</a> ";
                }

                // Exibe os números das páginas
                for ($pagina = 1; $pagina <= $total_paginas; $pagina++) {
                    $classe_pagina_atual = ($pagina == $pagina_atual) ? "pagina-atual" : "";
                    echo "<a class='$classe_pagina_atual' href='?pagina=$pagina";
                    if (isset($_GET['filter']) && !empty($_GET['filter'])) {
                        echo "&filter=" . urlencode($_GET['filter']);
                    }

                    if (isset($_GET['search_query']) && !empty($_GET['search_query'])) {
                        echo "&search_query=" . urlencode($_GET['search_query']);
                    }

                    if (isset($_GET['ordem']) && !empty($_GET['ordem'])) {
                        echo "&ordem=" . urlencode($_GET['ordem']);
                    }
                    echo "'>$pagina</a> ";
                }

                // Link para a próxima página
                if ($pagina_atual < $total_paginas) {
                    echo "<a href='?pagina=" . ($pagina_atual + 1);
                    if (isset($_GET['filter']) && !empty($_GET['filter'])) {
                        echo "&filter=" . urlencode($_GET['filter']);
                    }

                    if (isset($_GET['search_query']) && !empty($_GET['search_query'])) {
                        echo "&search_query=" . urlencode($_GET['search_query']);
                    }

                    if (isset($_GET['ordem']) && !empty($_GET['ordem'])) {
                        echo "&ordem=" . urlencode($_GET['ordem']);
                    }
                    echo "'>Seguinte</a>";
                }
                ?>
            </div>
            <?php
        }
        ?>
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
        // Base da consulta para obter as fontes
        $query = "SELECT DISTINCT artigos.fonte 
              FROM artigos 
              INNER JOIN juncao_perturbacoes ON artigos.juncao_perturbacoes_id = juncao_perturbacoes.juncao_perturbacoes_id
              INNER JOIN perturbacoes ON juncao_perturbacoes.perturbacoes_id = perturbacoes.perturbacoes_id
              INNER JOIN grupos_perturbacoes ON juncao_perturbacoes.grupos_perturbacoes_id = grupos_perturbacoes.grupos_perturbacoes_id
              WHERE artigos.fonte IS NOT NULL AND artigos.fonte <> ''";

        // Adiciona filtro de pesquisa, se fornecido
        if (isset($_GET['search_query']) && !empty($_GET['search_query'])) {
            $search_query = mysqli_real_escape_string($conn, $_GET['search_query']);
            $query .= " AND artigos.titulo LIKE '%$search_query%'";
        }

        // Adiciona filtro de perturbação, se fornecido
        if (isset($_GET['filter']) && $_GET['filter'] !== '') {
            $filtro_nome = mysqli_real_escape_string($conn, urldecode($_GET['filter']));
            if ($filtro_nome !== 'Perturbações') {
                $query .= " AND perturbacoes.nome = '$filtro_nome'";
            }
        }

        // Adiciona ordenação por data de publicação mais recente, se fornecido
        if (isset($_GET['ordem']) && $_GET['ordem'] === 'data_recente') {
            $query .= " ORDER BY artigos.data_publicacao DESC";
        }

        $result = mysqli_query($conn, $query);

        while ($row = mysqli_fetch_assoc($result)) {
            ?>
            <div class="fontes-content2">
                <p><?php echo $row['fonte']; ?></p>
            </div>
            <?php
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lazysizes/5.3.2/lazysizes.min.js" async></script>

</body>

</html>