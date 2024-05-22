<?php
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
                <li><a href="../../../paginainicial">Página Inicial</a></li>
                <li><a href="../../../sobre-nos">Sobre Nós</a></li>
                <li><a href="../..">Perturbações</a></li>
                <li><a href="../../../artigos">Artigos</a></li>
                <li><a href="../../../noticias">Notícias</a></li>
                <li><a href="../../../conteudo-educativo">Conteúdo Educativo</a>
                    <i class="fas fa-chevron-down"></i>
                    <ul class="dropdown">
                        <li><a href="../../../conteudo-educativo/quizzes">Quizzes</a></li>
                        <li><a href="../../../conteudo-educativo/exercicios-mindfulness">Exercícios Mindfulness</a></li>
                        <li><a href="../../../conteudo-educativo/ted-talks">TED Talks</a></li>
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
            <li><a href="../..">Perturbações</a></li>
            <li><a href="../../../artigos">Artigos</a></li>
            <li><a href="../../../noticias">Notícias</a></li>
            <li class="dropdown-trigger"><a href="../../../conteudo-educativo">Conteúdo Educativo <i
                        class="fas fa-chevron-down"></i></a>
                <ul class="dropdown">
                    <li><a href="../../../conteudo-educativo/quizzes">Quizzes</a></li>
                    <li><a href="../../../conteudo-educativo/exercicios-mindfulness">Exercícios Mindfulness</a></li>
                    <li><a href="../../../conteudo-educativo/ted-talks">TED Talks</a></li>
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


    <!--Separadores-->
    <?php
    if (isset($_GET['nome'])) {
        $nome_perturbacao = urldecode($_GET['nome']);

        $query = "SELECT perturbacoes_personalidade.nome AS perturbacoes_personalidade_nome, juncao_pert_personalidade.grupos_perturbacoes_id, juncao_pert_personalidade.perturbacoes_id
        FROM perturbacoes_personalidade
        INNER JOIN juncao_pert_personalidade ON juncao_pert_personalidade.perturbacoes_personalidade_id = perturbacoes_personalidade.perturbacoes_personalidade_id
        INNER JOIN perturbacoes ON juncao_pert_personalidade.perturbacoes_id = perturbacoes.perturbacoes_id
        WHERE perturbacoes_personalidade.nome = '$nome_perturbacao' AND perturbacoes.nome = 'Perturbações de Personalidade';";

        $result = mysqli_query($conn, $query);

        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $grupos_perturbacoes_id = $row['grupos_perturbacoes_id'];

            $query_perturbacao = "SELECT nome
                                  FROM grupos_perturbacoes
                                  WHERE grupos_perturbacoes_id = $grupos_perturbacoes_id";

            $result_perturbacao = mysqli_query($conn, $query_perturbacao);

            if ($result_perturbacao && mysqli_num_rows($result_perturbacao) > 0) {
                $row_perturbacao = mysqli_fetch_assoc($result_perturbacao);
            }




            if ($result && mysqli_num_rows($result) > 0) {
                $row_perturbacao2 = mysqli_fetch_assoc($result);
                $perturbacoes_id = $row['perturbacoes_id'];

                $query_perturbacao2 = "SELECT nome
                                      FROM perturbacoes
                                      WHERE perturbacoes_id = $perturbacoes_id";

                $result_perturbacao2 = mysqli_query($conn, $query_perturbacao2);

                if ($result_perturbacao2 && mysqli_num_rows($result_perturbacao2) > 0) {
                    $row_perturbacao2 = mysqli_fetch_assoc($result_perturbacao2);
                }

                ?>



                <ol role="list">
                    <li class="list">
                        <div class="items">
                            <a href="../.." class="text-sm">
                                Perturbações Mentais
                            </a>
                            <span class="separator">/</span>
                        </div>
                    </li>

                    <li class="list">
                        <div class="items">
                            <a href="../?nome=<?php echo $row_perturbacao2['nome']; ?>" class="text-sm">
                                <?php echo $row_perturbacao2['nome']; ?>
                            </a>
                            <span class="separator">/</span>
                        </div>
                    </li>

                    <li class="list">
                        <div class="items">
                            <a href="../perturbacao-especifica?nome=<?php echo $row_perturbacao['nome']; ?>" class="text-sm">
                                <?php echo $row_perturbacao['nome']; ?>
                            </a>
                            <span class="separator">/</span>
                        </div>
                    </li>

                    <li class="list">
                        <div class="items-current">
                            <span class="text-sm" aria-current="page">
                                <?php echo $row['perturbacoes_personalidade_nome']; ?>
                            </span>
                        </div>
                    </li>
                </ol>

                <div class="heading">
                    <h1>
                        <?php echo $row['perturbacoes_personalidade_nome']; ?>
                    </h1>
                </div>
                <?php
            } else {
                // Se o grupo de perturbações não for encontrado, exiba uma mensagem de erro ou faça alguma outra ação
                echo "Grupo de perturbações não encontrado.";
            }
        }
    }
    ?>

    <ol role="list2" class="list2">
        <?php
        if (isset($_GET['nome'])) {
            $nome_perturbacao = urldecode($_GET['nome']);
            if ($nome_perturbacao != 'Grupo A' && $nome_perturbacao != 'Grupo B' && $nome_perturbacao != 'Grupo C') {
                ?>
                <li class="list">
                    <div class="items">
                        <a href="#sintomas" class="text-sm">
                            Sintomas
                        </a>
                        <span class="separator">|</span>
                    </div>
                </li>

                <li class="list">
                    <div class="items">
                        <a href="#prevalencias" class="text-sm">
                            Prevalências
                        </a>
                        <span class="separator">|</span>
                    </div>
                </li>

                </li>
                <li class="list">
                    <div class="items">
                        <a href="#ajuda" class="text-sm">
                            Procurar ajuda
                        </a>
                    </div>
                </li>
                <?php
            }
        }
        ?>
    </ol>


    <!--Perturbação específica-->
    <section class="perturbacao-especifica" id="perturbacao-especifica">
        <div class="perturbacao-especifica-card">
            <div class="perturbacao-especifica-card-body">
                <?php
                // Se o nome da perturbacao estiver definido na URL, exibir o conteúdo do artigo
                if (isset($_GET['nome'])) {
                    $nome_perturbacao = urldecode($_GET['nome']);
                    $query = "SELECT texto FROM perturbacoes_personalidade WHERE nome = '$nome_perturbacao'";
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
    </section>


    <div class="subheading" id="sintomas">
        <?php
        // Se o nome da perturbação estiver definido na URL, exibir o conteúdo do artigo
        if (isset($_GET['nome'])) {
            $nome_perturbacao = urldecode($_GET['nome']);
            // Verifica se o nome do grupo não é A, B ou C
            if ($nome_perturbacao != 'Grupo A' && $nome_perturbacao != 'Grupo B' && $nome_perturbacao != 'Grupo C') {
                $query = "SELECT sintomas_texto FROM perturbacoes_personalidade WHERE nome = '$nome_perturbacao'";
                $result = mysqli_query($conn, $query);
                if ($result && mysqli_num_rows($result) > 0) {
                    $row = mysqli_fetch_assoc($result);
                    ?>
                    <h1>Sintomas</h1>
                    <p>
                        <?php echo $row['sintomas_texto']; ?>
                    </p>
                    <?php
                } else {
                    echo "Ainda não tem texto.";
                }
            }
        } else {
            // Se o título do artigo não estiver definido na URL, exibir uma mensagem de erro ou fazer alguma outra ação
            echo "Texto da perturbação não especificado na URL.";
        }
        ?>
    </div>

    <div class="subheading" id="prevalencias">
        <?php
        // Se o nome da perturbação estiver definido na URL, exibir o conteúdo do artigo
        if (isset($_GET['nome'])) {
            $nome_perturbacao = urldecode($_GET['nome']);
            // Verifica se o nome do grupo não é A, B ou C
            if ($nome_perturbacao != 'Grupo A' && $nome_perturbacao != 'Grupo B' && $nome_perturbacao != 'Grupo C') {
                $query = "SELECT prevalencias_texto FROM perturbacoes_personalidade WHERE nome = '$nome_perturbacao'";
                $result = mysqli_query($conn, $query);
                if ($result && mysqli_num_rows($result) > 0) {
                    $row = mysqli_fetch_assoc($result);
                    ?>
                    <h1>Prevalências</h1>
                    <p>
                        <?php echo $row['prevalencias_texto']; ?>
                    </p>
                    <?php
                } else {
                    echo "Ainda não tem texto.";
                }
            }
        } else {
            // Se o título do artigo não estiver definido na URL, exibir uma mensagem de erro ou fazer alguma outra ação
            echo "Texto da perturbação não especificado na URL.";
        }
        ?>
    </div>

    <div class="subheading" id="ajuda">
        <?php
        // Se o nome da perturbação estiver definido na URL, exibir o conteúdo do artigo
        if (isset($_GET['nome'])) {
            $nome_perturbacao = urldecode($_GET['nome']);
            // Verifica se o nome do grupo não é A, B ou C
            if ($nome_perturbacao != 'Grupo A' && $nome_perturbacao != 'Grupo B' && $nome_perturbacao != 'Grupo C') {
                $query = "SELECT ajuda_texto FROM perturbacoes_personalidade WHERE nome = '$nome_perturbacao'";
                $result = mysqli_query($conn, $query);
                if ($result && mysqli_num_rows($result) > 0) {
                    $row = mysqli_fetch_assoc($result);
                    ?>
                    <h1>Procurar ajuda</h1>
                    <p>
                        <?php echo $row['ajuda_texto']; ?>
                    </p>
                    <?php
                } else {
                    echo "Ainda não tem texto.";
                }
            }
        } else {
            // Se o título do artigo não estiver definido na URL, exibir uma mensagem de erro ou fazer alguma outra ação
            echo "Texto da perturbação não especificado na URL.";
        }
        ?>
    </div>


    <!--Também no-->
    <div class="perturbacao-especifica-card2">
        <div class="card">
            <div class="card-body">
                <?php
                if (isset($_GET['nome'])) {
                    $nome_perturbacao = urldecode($_GET['nome']);

                    // Consulta para selecionar a perturbação da tabela perturbacoes
                    $query_perturbacao = "SELECT nome
                                          FROM grupos_perturbacoes
                                          WHERE grupos_perturbacoes_id = $grupos_perturbacoes_id";

                    $result_perturbacao = mysqli_query($conn, $query_perturbacao);

                    if ($result_perturbacao && mysqli_num_rows($result_perturbacao) > 0) {
                        $row_perturbacao = mysqli_fetch_assoc($result_perturbacao);
                        ?>
                        <p>Também no
                            <?php echo $row_perturbacao['nome']; ?>
                        </p>
                        <div class="perturbacoes-hr"></div>
                        <?php
                    } else {
                        echo "Não foi possível encontrar informações sobre a perturbação selecionada.";
                    }

                    $query_grupo_perturbacoes = "SELECT perturbacoes_personalidade.nome AS perturbacoes_personalidade_nome
                                                 FROM perturbacoes_personalidade
                                                 INNER JOIN juncao_pert_personalidade ON juncao_pert_personalidade.perturbacoes_personalidade_id = perturbacoes_personalidade.perturbacoes_personalidade_id
                                                 INNER JOIN grupos_perturbacoes ON juncao_pert_personalidade.grupos_perturbacoes_id = grupos_perturbacoes.grupos_perturbacoes_id
                                                 WHERE perturbacoes_personalidade.nome != '$nome_perturbacao' AND grupos_perturbacoes.grupos_perturbacoes_id = $grupos_perturbacoes_id";


                    $result_grupo_perturbacoes = mysqli_query($conn, $query_grupo_perturbacoes);

                    if ($result_grupo_perturbacoes && mysqli_num_rows($result_grupo_perturbacoes) > 0) {
                        while ($row_grupo_perturbacoes = mysqli_fetch_assoc($result_grupo_perturbacoes)) {
                            ?>
                            <a href="?nome=<?php echo $row_grupo_perturbacoes['perturbacoes_personalidade_nome']; ?>">
                                <?php echo $row_grupo_perturbacoes['perturbacoes_personalidade_nome']; ?>
                            </a>
                            <?php
                        }
                    } else {
                        echo "Não existem mais perturbações neste grupo.";
                    }
                }
                ?>
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
            $query = "SELECT pp.fonte
                      FROM perturbacoes_personalidade pp
                      WHERE pp.nome = '$nome'";

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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lazysizes/5.3.2/lazysizes.min.js" async></script>
    <script src="../../../darkmode/darkmode.js"></script>

</body>

</html>