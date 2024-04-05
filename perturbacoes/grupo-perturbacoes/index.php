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

        .background {
            background-image: url("<?php echo $banner_perturbacao; ?>");
        }
    </style>
    <header>
        <div class="navbar">
            <div class="logo">Portal de <br> Saúde Mental.</div>

            <ul class="links">
                <li><a href="../../paginainicial">Página Inicial</a></li>
                <li><a href="#about">Sobre Nós</a></li>
                <li><a href="..">Perturbações</a></li>
                <li><a href="#artigos">Artigos</a></li>
                <li><a href="#noticias">Notícias</a></li>
                <li><a href="#">Conteúdo Educativo</a>
                    <i class="fas fa-chevron-down"></i>
                    <ul class="dropdown">
                        <li><a href="../../quizzes">Quizzes</a></li>
                        <li><a href="#">Exercícios Mindfulness</a></li>
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
            <li><a href="..">Perturbações</a></li>
            <li><a href="#skills">Artigos</a></li>
            <li><a href="#portfolio">Notícias</a></li>
            <li class="dropdown-trigger"><a href="#">Conteúdo Educativo <i class="fas fa-chevron-down"></i></a>
                <ul class="dropdown">
                    <li><a href="../../quizzes">Quizzes</a></li>
                    <li><a href="#">Exercícios Mindfulness</a></li>
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
                        var url = "../logout/logout.php";
                        window.location = url;
                    }
                    document.getElementById("demo").innerHTML = x;
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
                    <a class="btn2"
                        href="perturbacao-especifica/?nome=<?php echo urlencode($row["grupo_perturbacoes_nome"]); ?>"><?php echo $row['grupo_perturbacoes_nome']; ?></a>
                    <?php
                }
                ?>
            </div>;
            <?php
        } else {
            // Se o título da perturbação não estiver definido na URL, exibir uma mensagem de erro ou fazer alguma outra ação
            echo "Grupo da perturbação não especificado na URL.";
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
                        <a href="10-factos/?nome=<?php echo $nome_codificado; ?>">
                            <img src="<?php echo $row["img_perturbacao"]; ?>" alt="Perturbacoes">
                        </a>
                        <div class="card2-content">
                            <h1>10 Factos sobre
                                <?php echo $row["nome"]; ?>
                            </h1>
                            <p>TesteTesteTesteTeste</p>
                            <p>TesteTesteTeste</p>
                            <a class="secondary-button" href="10-factos/?nome=<?php echo $nome_codificado; ?>">
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
                                        juncao_perturbacoes.perturbacoes_id = $perturbacoes_id AND LENGTH(artigos.titulo) <= 30
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
                                        <img src="<?php echo $row_info_adicional["img_artigo"]; ?>" alt="Depressão">
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
        <div class="fontes-content2">
            <p>1. Orloff, J. (2015). Emotional Freedom: Liberati delle emozioni negative e trasforma la tua
                vita. MyLife.</p>
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