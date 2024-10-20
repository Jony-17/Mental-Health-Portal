<?php
include '../includes/header.php';

session_start();
require_once ("../conn/conn.php");

// Verificar se a sessão do utilizador está definida
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

            <!-- Links -->
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

            <!-- Verificação da sessão do utilizador, caso tenha sessão iniciada apresentada a foto de perfil -->
            <!-- Caso não tenha, apresenta o botão de Iniciar Sessão -->
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

        <!-- Dropdown telemóvel -->
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

            <!-- Verificação da sessão do utilizador, caso tenha sessão iniciada apresentada a foto de perfil -->
            <!-- Caso não tenha, apresenta o botão de Iniciar Sessão -->
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
                    </ul>
                </li>
                <li class="list"><a class="btn" onclick="logout()">Terminar Sessão</a></li>
            <?php else: ?>
                <li class="list"><a class="btn" href="../areacliente/login/">Iniciar Sessão</a></li>
            <?php endif ?>

            <!-- Botão para logout -->
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

    <!-- Backgrounds -->
    <div class="background1">
        <img src="imgs/imgs-backgrounds/background1.png" alt="banner background" />
    </div>

    <div class="background2">
        <img src="imgs/imgs-backgrounds/background2.png" alt="banner background" />
    </div>

    <!-- Títulos e textos -->
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
                    O Portal de Saúde Mental declina qualquer responsabilidade por prejuízos ou danos materiais ou
                    pessoais que possam advir direta ou indiretamente da indevida utilização do seu website;
                </p>
            </li>
            <li>
                <p>
                    O presente website pode conter links para outros sites externos que não são
                    controlados pelo Portal de Saúde Mental;
                </p>
                <p>
                    O nosso relacionamento com os referidos sites não implica um endosso dos produtos
                    e/ou serviços vendidos ou anunciados e não nos responsabilizamos por faltas de
                    veracidade, falhas de qualidade, incorreções, erros e imprecisões que possam verificar-
                    se em conteúdos de outros portais ou websites, e sobre os quais o Portal de Saúde Mental não exerce
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
                    O Portal de Saúde Mental reserva o direito de alterar as informações e, em geral, o conteúdo do
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
            // Consulta SQL para apresentar todas as perturbações
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
            // Consulta SQL para apresentar o título de 3 artigos
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
            // Consulta SQL para apresentar o título de 3 notícias
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
                <a href="../termos-e-condicoes">Termos e Condições</a>

                <div class="vertical-hr"></div>

                <a href="../perguntas-frequentes">Perguntas Frequentes</a>

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

    <!-- Enquanto a página não dá o load completo, apresenta esta frase -->
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