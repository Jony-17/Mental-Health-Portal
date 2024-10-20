<?php
include '../../../includes/header.php';

session_start();
require_once ("../../../conn/conn.php");

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
            <li><a href="../../../noticas">Notícias</a></li>
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

        //Consulta SQL para obter o grupo de perturbação associado
        $query = "SELECT grupos_perturbacoes.nome AS grupo_perturbacoes_nome, juncao_perturbacoes.perturbacoes_id
                  FROM grupos_perturbacoes
                  INNER JOIN juncao_perturbacoes ON juncao_perturbacoes.grupos_perturbacoes_id = grupos_perturbacoes.grupos_perturbacoes_id
                  WHERE grupos_perturbacoes.nome = '$nome_perturbacao'";

        $result = mysqli_query($conn, $query);

        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $perturbacoes_id = $row['perturbacoes_id'];

            // Consulta SQL para obter o nome de determinada perturbacao
            $query_perturbacao = "SELECT nome
                                  FROM perturbacoes
                                  WHERE perturbacoes_id = $perturbacoes_id";

            $result_perturbacao = mysqli_query($conn, $query_perturbacao);

            if ($result_perturbacao && mysqli_num_rows($result_perturbacao) > 0) {
                $row_perturbacao = mysqli_fetch_assoc($result_perturbacao);
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

                <?php
                if ($row_perturbacao['nome'] != $row['grupo_perturbacoes_nome']) {
                    ?>
                    <li class="list">
                        <div class="items">
                            <a href="../?nome=<?php echo $row_perturbacao['nome']; ?>" class="text-sm">
                                <?php echo $row_perturbacao['nome']; ?>
                            </a>
                            <span class="separator">/</span>
                        </div>
                    </li>
                    <?php
                }
                ?>

                <li class="list">
                    <div class="items-current">
                        <span class="text-sm" aria-current="page">
                            <?php echo $row['grupo_perturbacoes_nome']; ?>
                        </span>
                    </div>
                </li>
            </ol>

            <div class="heading">
                <h1>
                    <?php echo $row['grupo_perturbacoes_nome']; ?>
                </h1>
            </div>
            <?php
        } else {
            // Se o grupo de perturbações não for encontrado, exiba uma mensagem de erro ou faça alguma outra ação
            echo "Grupo de perturbações não encontrado.";
        }
    }
    ?>


    <!--Botões-->
    <?php
    if (isset($_GET['nome'])) {
        $nome_perturbacao = urldecode($_GET['nome']);

        // Consulta SQL para obter o grupo de perturbacao de determinada perturbacao
        $query = "SELECT grupos_perturbacoes_id
                  FROM grupos_perturbacoes
                  WHERE nome = '$nome_perturbacao'";

        $result = mysqli_query($conn, $query);

        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $grupos_perturbacoes_id = $row['grupos_perturbacoes_id'];
        } else {
            $grupos_perturbacoes_id = null;
        }


        if ($nome_perturbacao === "Grupo A" || "Grupo B" || "Grupo C") {
            // Consulta SQL para obter o nome das perturbações de personalidade referentes a determinada perturbacao
            $query = "SELECT perturbacoes_personalidade.nome AS perturbacoes_personalidade_nome
                      FROM perturbacoes_personalidade
                      INNER JOIN juncao_pert_personalidade ON juncao_pert_personalidade.perturbacoes_personalidade_id = perturbacoes_personalidade.perturbacoes_personalidade_id
                      INNER JOIN grupos_perturbacoes ON juncao_pert_personalidade.grupos_perturbacoes_id = grupos_perturbacoes.grupos_perturbacoes_id
                      WHERE grupos_perturbacoes.grupos_perturbacoes_id = $grupos_perturbacoes_id";

            $result = mysqli_query($conn, $query);

            if ($result && mysqli_num_rows($result) > 0) {
                ?>
                <div class="buttons">
                    <?php
                    while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                        <a class="btn2"
                            href="../perturbacao-personalidade/?nome=<?php echo urlencode($row["perturbacoes_personalidade_nome"]); ?>">
                            <?php echo $row['perturbacoes_personalidade_nome']; ?>
                        </a>
                        <?php
                    }
                    ?>
                </div>
                <?php
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
                    $query = "SELECT texto FROM grupos_perturbacoes WHERE nome = '$nome_perturbacao'";
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
                $query = "SELECT sintomas_texto FROM grupos_perturbacoes WHERE nome = '$nome_perturbacao'";
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
                $query = "SELECT prevalencias_texto FROM grupos_perturbacoes WHERE nome = '$nome_perturbacao'";
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
        // Se o nome da perturbacao estiver definido na URL, exibir o conteúdo do artigo
        if (isset($_GET['nome'])) {
            $nome_perturbacao = urldecode($_GET['nome']);
            // Verifica se o nome do grupo não é A, B ou C
            if ($nome_perturbacao != 'Grupo A' && $nome_perturbacao != 'Grupo B' && $nome_perturbacao != 'Grupo C') {
                $query = "SELECT ajuda_texto FROM grupos_perturbacoes WHERE nome = '$nome_perturbacao'";
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


    <!--Também nas-->
    <?php
    if (isset($_GET['nome'])) {
        $nome_perturbacao = urldecode($_GET['nome']);

        if ($nome_perturbacao != 'Perturbações Obsessivo-Compulsivas') {
            ?>

            <div class="perturbacao-especifica-card2">
                <div class="card">
                    <div class="card-body">
                        <?php
                        // Consulta para selecionar a perturbação da tabela perturbacoes
                        $query_perturbacao = "SELECT nome AS perturbacoes_nome
                                          FROM perturbacoes
                                          WHERE perturbacoes_id = $perturbacoes_id";

                        $result_perturbacao = mysqli_query($conn, $query_perturbacao);

                        if ($result_perturbacao && mysqli_num_rows($result_perturbacao) > 0) {
                            $row_perturbacao = mysqli_fetch_assoc($result_perturbacao);
                            ?>
                            <p>Também nas
                                <?php echo $row_perturbacao['perturbacoes_nome']; ?>
                            </p>
                            <div class="perturbacoes-hr"></div>
                            <?php
                        } else {
                            echo "Não foi possível encontrar informações sobre a perturbação selecionada.";
                        }

                        $query_grupo_perturbacoes = "SELECT grupos_perturbacoes.nome AS grupos_perturbacoes_nome
                                                 FROM grupos_perturbacoes
                                                 INNER JOIN juncao_perturbacoes ON juncao_perturbacoes.grupos_perturbacoes_id = grupos_perturbacoes.grupos_perturbacoes_id
                                                 INNER JOIN perturbacoes ON juncao_perturbacoes.perturbacoes_id = perturbacoes.perturbacoes_id
                                                 WHERE grupos_perturbacoes.nome != '$nome_perturbacao' AND perturbacoes.perturbacoes_id = $perturbacoes_id";


                        $result_grupo_perturbacoes = mysqli_query($conn, $query_grupo_perturbacoes);

                        if ($result_grupo_perturbacoes && mysqli_num_rows($result_grupo_perturbacoes) > 0) {
                            while ($row_grupo_perturbacoes = mysqli_fetch_assoc($result_grupo_perturbacoes)) {
                                ?>
                                <a href="?nome=<?php echo $row_grupo_perturbacoes['grupos_perturbacoes_nome']; ?>">
                                    <?php echo $row_grupo_perturbacoes['grupos_perturbacoes_nome']; ?>
                                </a>
                                <?php
                            }
                        } else {
                            echo "Os grupos que estão adjacentes a esta Perturbação são subentendidos como um todo.";
                        }
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
            $query = "SELECT gp.fonte
                      FROM grupos_perturbacoes gp
                      WHERE gp.nome = '$nome'";

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

    <!--Artigos relacionados-->
    <div class="artigos">
        <h2 class="artigos-text">Alguns artigos relacionados</h2>
        <div class="perturbacoes-hr2"></div>

        <?php
        if (isset($_GET['nome'])) {
            $nome_codificado = urldecode($_GET['nome']);
            $query = "SELECT grupos_perturbacoes_id, nome  FROM grupos_perturbacoes WHERE nome = '$nome_codificado'";

            echo '<script>console.log("' . $query . '")</script>';

            $result = mysqli_query($conn, $query);

            if ($result && mysqli_num_rows($result) > 0) {

                $row = mysqli_fetch_assoc($result);

                $grupos_perturbacoes_id = $row['grupos_perturbacoes_id'];

                // Consulta SQL para obter os artigos referentes a determinada perturbacao
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
                                        juncao_perturbacoes.perturbacoes_id = $perturbacoes_id AND juncao_perturbacoes.grupos_perturbacoes_id = $grupos_perturbacoes_id
                                    LIMIT 3;";
                $result_info_adicional = mysqli_query($conn, $query_info_adicional);


                ?>
                <div class="card2-container">
                    <?php
                    // Exibir informações adicionais sobre outras perturbações
                    while ($row_info_adicional = mysqli_fetch_assoc($result_info_adicional)) {
                        ?>
                        <div class="card2">

                            <a
                                href="../../../artigos/artigo/?titulo=<?php echo urlencode($row_info_adicional["titulo_artigo"]); ?>">
                                <img src="../../../admin/inserir/imgs/artigos/<?php if (!empty($row_info_adicional["img_artigo"])) {
                                    echo $row_info_adicional["img_artigo"];
                                } else {
                                    echo "teste.jpeg";
                                } ?>" alt="<?php echo $row_info_adicional["img_artigo"]; ?>">
                            </a>
                            <div class="card2-content">
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
                    <?php
            } else {
                echo "Ainda não tem texto para mostrar.";
            }
        }
        ?>
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
                <a href="../../../termos-e-condicoes">Termos e Condições</a>

                <div class="vertical-hr"></div>

                <a href="../../../perguntas-frequentes">Perguntas Frequentes</a>

                <div class="vertical-hr"></div>

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
    <script src="../../../darkmode/darkmode.js"></script>

</body>

</html>