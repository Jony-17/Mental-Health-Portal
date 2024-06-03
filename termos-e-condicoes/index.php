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
                <li class="list"><a href="../paginainicial">Página Inicial</a></li>
                <li class="list"><a href="../sobre-nos">Sobre Nós</a></li>
                <li class="list"><a href="../perturbacoes">Perturbações</a></li>
                <li class="list"><a href="../artigos">Artigos</a></li>
                <li class="list"><a href="../noticias">Notícias</a></li>
                <li class="list"><a href="../conteudo-educativo">Conteúdo Educativo</a>
                    <i class="fas fa-chevron-down"></i>
                    <ul class="dropdown">
                        <li class="list"><a href="../conteudo-educativo/quizzes">Quizzes</a></li>
                        <li class="list"><a href="../conteudo-educativo/exercicios-mindfulness">Exercícios
                                Mindfulness</a></li>
                        <li class="list"><a href="../conteudo-educativo/ted-talks">TED Talks</a></li>
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
                            <li class="list"><a href="../perfil/">Perfil</a></li>
                            <!--<li><a href="#">Termos e Condições</a></li>
                            <li><a href="#">Definições</a></li>-->
                        </ul>
                    </div>
                    <a class="btn" onclick="logout()">Terminar Sessão</a>
                </li>
            <?php else: ?>
                <li class="list"><a class="btn" href="../areacliente/login/">Iniciar Sessão</a></li>
            <?php endif ?>

            <div class="toggle_btn">
                <i class="fas fa-bars"></i>
            </div>
        </div>


        <div class="dropdown_menu">
            <li class="list"><a href="../paginainicial">Página Inicial</a></li>
            <li class="list"><a href="../sobre-nos">Sobre Nós</a></li>
            <li class="list"><a href="../perturbacoes">Perturbações</a></li>
            <li class="list"><a href="../artigos">Artigos</a></li>
            <li class="list"><a href="../noticias">Notícias</a></li>
            <li class="dropdown-trigger"><a href="../conteudo-educativo">Conteúdo Educativo <i
                        class="fas fa-chevron-down"></i></a>
                <ul class="dropdown">
                    <li class="list"><a href="../conteudo-educativo/quizzes">Quizzes</a></li>
                    <li class="list"><a href="../conteudo-educativo/exercicios-mindfulness">Exercícios Mindfulness</a>
                    </li>
                    <li class="list"><a href="../conteudo-educativo/ted-talks">TED Talks</a></li>
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
                        <li class="list"><a href="../perfil/">Perfil</a></li>
                        <!--<li><a href="#">Termos e Condições</a></li>
                        <li><a href="#">Definições</a></li>-->
                    </ul>
                </li>
                <li class="list"><a class="btn" onclick="logout()">Terminar Sessão</a></li>
            <?php else: ?>
                <li class="list"><a class="btn" href="../areacliente/login/">Iniciar Sessão</a></li>
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

    <div class="background1">
        <img src="background1.png" alt="banner background" />
    </div>

    <div class="background2">
        <img src="background2.png" alt="banner background" />
    </div>

    <div class="heading">
        <h1>
            Termos e Condições
        </h1>
        <p>Bem-vindo ao Portal de Saúde Mental. Este documento estabelece os termos e condições gerais de
            uso do site e dos serviços oferecidos. Ao aceder e utilizar este site, irá concorda em cumprir e estar
            vinculado a estes termos. Recomendamos que leia atentamente este documento antes de continuar a navegação ou
            utilizar os serviços.
        </p>
        <ol class="decimal">
            <li>
                <p>
                    Isenção de responsabilidade: O conteúdo do site, incluindo textos, gráficos, imagens e outros
                    materiais, é apenas para fins informativos. Nada contido no site é ou deve ser considerado ou usado
                    como substituto de aconselhamento, diagnóstico ou tratamento médico ou de saúde mental profissional.

                    Nunca ignore o conselho médico do seu médico ou outro profissional de saúde qualificado, nem demore
                    a procurá-lo por causa de algo que leu na Internet, inclusive no site. Recomendamos que procure
                    o conselho do seu médico ou outro profissional de saúde qualificado caso tenha qualquer dúvida que
                    possa ter em relação a uma condição médica ou de saúde mental.

                    As informações contidas ou fornecidas através do site são fornecidas “como estão”, sem qualquer
                    garantia, expressa ou implícita. Qualquer acesso ao site é voluntário e por sua conta e risco. A
                    informação apresentada no site é disponibilizada apenas para fins de informação geral.
                    Isentamo-nos de toda responsabilidade decorrente de qualquer confiança depositada em tais materiais;
                </p>
            </li>
            <li>
                <p>
                    O Portal de Saúde Mental é um serviço fornecido exclusivamente pelo Portal de Saúde Mental. Não há
                    investidores com interesse financeiro nas informações disponibilizadas no site. Não é aceite
                    publicidade, o que nos permite total autonomia editorial;
                </p>
            </li>
            <li>
                <p>
                    O site contém links para sites de propriedade de terceiros. Esses links são fornecidos apenas para
                    conveniência e não são conteúdos ou serviços do Portal de Saúde Mental. O Portal de Saúde Mental não
                    tem controlo e não é responsável pelo conteúdo de quaisquer sites vinculados e não faz nenhuma
                    representação em relação ao conteúdo ou à precisão dos materiais nesses sites. Se decidir visitar
                    sites de terceiros usando links do site, estará por sua própria conta e risco. Consequentemente, o
                    Portal de Saúde Mental isenta-se expressamente de qualquer responsabilidade pelo conteúdo,
                    materiais, precisão das informações e/ou qualidade dos produtos ou serviços fornecidos, disponíveis
                    ou anunciados nesses sites de terceiros;
                </p>
            </li>
            <li>
                <p>
                    Poderemos solicitar que forneça voluntariamente determinadas informações, como nome e endereço
                    de e-mail, quando tentar efetuar registo no site. Irá concordar em fornecer
                    informações verdadeiras, precisas, atuais e completas sobre si.

                    Quando envia, envia, publica, baixa, exibe, executa, transmite ou de outra forma distribui
                    informações ou conteúdo para o site, você concede ao Portal de Saúde Mental e afiliados, executivos,
                    diretores, funcionários, consultores, agentes e representantes uma licença para usar, copiar,
                    distribuir, transmitir, exibir, reproduzir ou editar seu conteúdo. Garante que possui os
                    direitos sobre qualquer conteúdo enviado e/ou está autorizado a transmitir, enviar, exibir e/ou
                    disponibilizar de outra forma tal conteúdo.

                    Concorda em não enviar ou publicar qualquer conteúdo que seja calunioso, difamatório, obsceno,
                    pornográfico, abusivo, ameaçador, defenda ou encoraje conduta que possa constituir uma ofensa
                    criminal ou dar origem a responsabilidade civil, ou que de outra forma viole qualquer legislação
                    local, estadual, nacional aplicável, ou lei ou regulamento estrangeiro, ou que anuncie ou de outra
                    forma solicite fundos ou seja uma solicitação;
                </p>
            </li>
            <li>
                <p>
                    O ISPGAYA declina qualquer responsabilidade por prejuízos ou danos materiais ou
                    pessoais que possam advir direta ou indiretamente da indevida utilização do seu
                    website;
                </p>
            </li>
            <li>
                <p>
                    O presente website pode conter links para outros sites externos que não são
                    controlados pelo ISPGAYA;
                </p>
                <p>
                    O nosso relacionamento com os referidos sites não implica um endosso dos produtos
                    e/ou serviços vendidos ou anunciados e não nos responsabilizamos por faltas de
                    veracidade, falhas de qualidade, incorreções, erros e imprecisões que possam verificar-
                    se em conteúdos de outros portais ou websites, e sobre os quais o ISPGAYA não exerce
                    qualquer controlo, para onde remetem as ligações de hipertexto, também denominadas
                    “hyperlinks” ou “links” presentes neste website;
                </p>
                <p>
                    Uma vez que esses sites não são de propriedade da empresa, não podemos garantir a
                    qualidade, adequação ou operação dos mesmos, podendo existir recolha de dados de
                    acordo com a política de privacidade dos sites externos;
                </p>
                <p>
                    Recomendamos que nunca forneça os seus dados a qualquer entidade sem consultar
                    previamente a respetiva política de privacidade dessa entidade;
                </p>
            </li>
            <li>
                <p>
                    O ISPGAYA reserva-se o direito de alterar as informações e, em geral, o conteúdo do
                    website acima referido, sem qualquer aviso prévio, com exceção daqueles a que a lei
                    expressamente o obrigue;
                </p>
            </li>
        </ol>
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