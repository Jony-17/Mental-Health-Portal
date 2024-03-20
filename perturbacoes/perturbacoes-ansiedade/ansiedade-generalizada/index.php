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
                <li><a href="../../../paginainicial">Página Inicial</a></li>
                <li><a href="#about">Sobre Nós</a></li>
                <li><a href="../..">Perturbações</a></li>
                <li><a href="#artigos">Artigos</a></li>
                <li><a href="#noticias">Notícias</a></li>
                <li><a href="#">Conteúdo Educativo</a>
                    <i class="fas fa-chevron-down"></i>
                    <ul class="dropdown">
                        <li><a href="../../../quizzes">Quizzes</a></li>
                        <li><a href="#">Exercícios Mindfulness</a></li>
                    </ul>
                </li>
                </li>
            </ul>

            <?php if (!empty ($_SESSION['id_utilizador'])): ?>
                <li class="dropdown-container">
                    <div class="profile-dropdown">
                        <img class="img-profile rounded-circle" src="../areacliente/registo/imgs/<?php if (!empty ($row["img_perfil"])) {
                            echo $row["img_perfil"];
                        } else {
                            echo "teste.jpeg";
                        } ?>" alt="Imagem de Perfil">
                        <i class="fas fa-chevron-down" style="margin-right: 20px;"></i>
                        <ul class="dropdown-p">
                            <li><a href="../perfil/index.php">Perfil</a></li>
                            <!--<li><a href="#">Termos e Condições</a></li>
                            <li><a href="#">Definições</a></li>-->
                        </ul>
                    </div>
                    <a class="btn" onclick="funcao1()">Terminar Sessão</a>
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
            <li><a href="#">Sobre Nós</a></li>
            <li><a href="../..">Perturbações</a></li>
            <li><a href="#skills">Artigos</a></li>
            <li><a href="#portfolio">Notícias</a></li>
            <li class="dropdown-trigger"><a href="#">Conteúdo Educativo <i class="fas fa-chevron-down"></i></a>
                <ul class="dropdown">
                    <li><a href="../../../quizzes">Quizzes</a></li>
                    <li><a href="#">Exercícios Mindfulness</a></li>
                </ul>
            </li>

            <?php if (!empty ($_SESSION['id_utilizador'])): ?>
                <li class="dropdown-trigger">
                    <a href="#">
                        <img class="img-profile rounded-circle" src="../areacliente/registo/imgs/<?php if (!empty ($row["img_perfil"])) {
                            echo $row["img_perfil"];
                        } else {
                            echo "teste.jpeg";
                        } ?>" alt="Imagem de Perfil">
                        <i class="fas fa-chevron-down"></i></a>
                    <ul class="dropdown">
                        <li><a href="../perfil/index.php">Perfil</a></li>
                        <!--<li><a href="#">Termos e Condições</a></li>
                        <li><a href="#">Definições</a></li>-->
                    </ul>
                </li>
                <li><a class="btn" onclick="funcao1()">Terminar Sessão</a></li>
            <?php else: ?>
                <li><a class="btn" href="../../../areacliente/login/">Iniciar Sessão</a></li>
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
            <div class="items">
                <a href="../.." class="text-sm">
                    Perturbações Mentais
                </a>
                <span class="separator">/</span>
            </div>

        </li>

        <li class="list">
            <div class="items">
                <a href="../" class="text-sm">
                    Perturbações de Ansiedade
                </a>
                <span class="separator">/</span>
            </div>

        </li>

        </li>
        <li class="list">
            <div class="items-current">
                <span class="text-sm" aria-current=page>
                    Ansiedade Generalizada
                </span>
            </div>
        </li>
    </ol>

    <!--<div class="buttons">
        <a class="btn2" href="#">Ansiedade Social</a>
        <a class="btn2" href="#">Ansiedade Generalizada</a>
        <a class="btn2" href="#">Fobia específica</a>
        <a class="btn2" href="#">Perturbação de pánico</a>
    </div>-->

    <div class="heading">
        <h1>Ansiedade Generalizada</h1>
    </div>

    <ol role="list2" class="list2">
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
                <a href="#diagnostico" class="text-sm">
                    Diagnóstico
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
    </ol>


    <!--Ansiedade Generalizada-->
    <section class="ansiedade-generalizada" id="ansiedade-generalizada">
        <div class="ansiedade-generalizada-banner-container">
            <div class="ansiedade-generalizada-text-section">
                <div class="card">
                    <div class="card-body">
                        <!--<h1 class="card-title">O quão empática/o és?</h1>-->
                        <p>Everybody deals with anxiety from time to time, but when everyday feelings of nervousness
                            turn to intense and persistent feelings of fear, it may rise to the level of a diagnosable
                            anxiety disorder.

                            If you're struggling with an anxiety disorder like social anxiety or generalized anxiety,
                            know that you are not alone. The National Institutes of Mental Health estimate that nearly
                            one-third of US adults will deal with an anxiety disorder at some point in their lives.1
                            Any Anxiety Disorder, National Institutes of Mental Health

                            Since anxiety is a common mental health condition (and is a condition that can be
                            debilitating), it's recommended that all adults under the age of 65 receive routine anxiety
                            screening.2

                            Treatment options like therapy, medication, self-care strategies, and lifestyle changes can
                            help you manage your anxiety and help you live your best life at home, at work, and in your
                            relationships.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <div class="subheading" id="sintomas">
        <h1>Sintomas</h1>
        <p>Generalized anxiety disorder (GAD) is a specific type of anxiety disorder. Most people worry at times about
            their health, job, money, or family, but people with GAD experience anxiety about these things and more, in
            a way that is persistent, excessive, and intrusive. [1]</p>
        <p>Often, people with GAD struggle to relax and have trouble concentrating on tasks. They may experience
            physical symptoms including restlessness, sweating, difficulty swallowing, and using the restroom a lot.</p>
        <p>According to mental health experts, nearly 3% of all U.S. adults have experienced GAD in the last year and
            it is estimated that up to 9% experience GAD at some point in their lives. Considering that anxiety is a
            common mental health condition, the United States Preventative Services Task Force recommends that all
            adults under the age of 65 should be routinely screened for anxiety. [2]</p>
        <p>While symptoms of anxiety can be debilitating, with proper treatment—including medication and
            psychotherapy—people can learn to manage their symptoms and live a more productive life.</p>
    </div>

    <div class="subheading" id="diagnostico">
        <h1>Diagnóstico</h1>
        <p>Generalized anxiety disorder (GAD) is a specific type of anxiety disorder. Most people worry at times about
            their health, job, money, or family, but people with GAD experience anxiety about these things and more, in
            a way that is persistent, excessive, and intrusive. [1]</p>
        <p>Often, people with GAD struggle to relax and have trouble concentrating on tasks. They may experience
            physical symptoms including restlessness, sweating, difficulty swallowing, and using the restroom a lot.</p>
        <p>According to mental health experts, nearly 3% of all U.S. adults have experienced GAD in the last year and
            it is estimated that up to 9% experience GAD at some point in their lives. Considering that anxiety is a
            common mental health condition, the United States Preventative Services Task Force recommends that all
            adults under the age of 65 should be routinely screened for anxiety. [2]</p>
        <p>While symptoms of anxiety can be debilitating, with proper treatment—including medication and
            psychotherapy—people can learn to manage their symptoms and live a more productive life.</p>
    </div>

    <div class="subheading" id="ajuda">
        <h1>Procurar ajuda</h1>
        <p>Generalized anxiety disorder (GAD) is a specific type of anxiety disorder. Most people worry at times about
            their health, job, money, or family, but people with GAD experience anxiety about these things and more, in
            a way that is persistent, excessive, and intrusive. [1]</p>
        <p>Often, people with GAD struggle to relax and have trouble concentrating on tasks. They may experience
            physical symptoms including restlessness, sweating, difficulty swallowing, and using the restroom a lot.</p>
        <p>According to mental health experts, nearly 3% of all U.S. adults have experienced GAD in the last year and
            it is estimated that up to 9% experience GAD at some point in their lives. Considering that anxiety is a
            common mental health condition, the United States Preventative Services Task Force recommends that all
            adults under the age of 65 should be routinely screened for anxiety. [2]</p>
        <p>While symptoms of anxiety can be debilitating, with proper treatment—including medication and
            psychotherapy—people can learn to manage their symptoms and live a more productive life.</p>
    </div>


    <div class="ansiedade-generalizada2-text-section">
        <div class="card2">
            <div class="card2-body">
                <!--<h1 class="card-title">O quão empática/o és?</h1>-->
                <p>Também nas Perturbações de Ansiedade</p>
                <div class="perturbacoes-hr"></div>
                <a href="#">Ansiedade Social</a>
                <a href="#">Fobia Específica</a>
                <a href="#">Perturbação de pânico</a>
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


    <div class="artigos">
        <h2>Alguns artigos relacionados</h2>
        <div class="perturbacoes-hr2"></div>
        <div class="card-container">
            <div class="card">
                <a href="perturbacoes-ansiedade/">
                    <img src="imgs/imgs-perturbacoes/pert-ansie.png" alt="Depressão">
                </a>
                <h1>Perturbações de Ansiedade</h1>
                <p>TesteTesteTesteTesteTesteTesteTeste</p>
                <a href="perturbacoes-ansiedade/" class="first-button">
                    Sabe mais<i class="fas fa-arrow-right"></i>
                </a>
            </div>
            <div class="card">
                <a href="#">
                    <img src="imgs/imgs-perturbacoes/pert-sono.png" alt="Depressão">
                </a>
                <h1>Perturbações do Sono</h1>
                <p>TesteTesteTesteTesteTesteTesteTeste</p>
                <a href="#about" class="first-button">
                    Sabe mais<i class="fas fa-arrow-right"></i>
                </a>
            </div>
            <div class="card">
                <a href="#">
                    <img src="imgs/imgs-perturbacoes/pert-humor.png" alt="Depressão">
                </a>
                <h1>Perturbações de Humor</h1>
                <p>TesteTesteTesteTesteTesteTesteTeste</p>
                <a href="#about" class="first-button">
                    Sabe mais<i class="fas fa-arrow-right"></i>
                </a>
            </div>
        </div>
    </div>

    <script>
        //Função fontes
        const fontes = document.querySelectorAll(".fontes");

        fontes.forEach(fonte => {
            fonte.addEventListener("click", () => {
                fonte.classList.toggle("active");
            })
        })
    </script>




    <!---Footer--->
    <footer>
        <div class="footer-row">
            <div class="footer-col">
                <h1>Portal de <br> Saúde Mental.</h1>
                <p>Tu mereces ser feliz.</p>
            </div>

            <div class="footer-col">
                <h3>Perturbações</h3>
                <ul>
                    <li><a href="#">Depressão</a></li>
                    <li><a href="#">Depressão</a></li>
                    <li><a href="#">Depressão</a></li>
                    <li><a href="#">Depressão</a></li>
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
                    <li><a href="#">Quizzes</a></li>
                    <li><a href="#">Exercícios Mindfulness</a></li>
                </ul>
            </div>

            <!-- <a class="gotop" href="#"> <i class="fa-solid fa-chevron-up"></i> </a> -->

        </div>
        <hr>

        <div class="footer-links">
            <p class="copyright">@2024 Todos os direitos reservados</p>
            <div class="footer-links-2">
                <a href="#">Termos & Condições</a>

                <div class="vertical-hr"></div>

                <li class="dropdown-trigger-f"><i class="fas fa-globe"></i>Idioma <i class="fas fa-chevron-down"></i>
                    <ul class="dropdown-f">
                        <li><a href="#" id="portugues" onclick="changeLanguage('portuguese')">Português</a></li>
                        <li><a href="#" id="ingles" onclick="changeLanguage('english')">Inglês</a></li>
                    </ul>
                </li>

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



    <script>
        /*function changeLanguage(language) {
                // Lógica para mudar o idioma aqui
                // Por exemplo, você pode recarregar a página com o idioma selecionado ou usar AJAX para carregar novos conteúdos.
                console.log("Idioma selecionado: " + language);
    
                if (language === 'portuguese') {
                    document.getElementById('portugues').removeAttribute('href');
                    document.getElementById('ingles').setAttribute('href', '#');
                } else if (language === 'english') {
                    document.getElementById('ingles').removeAttribute('href');
                    document.getElementById('portugues').setAttribute('href', '#');
                }
    
                // Aqui você pode implementar a lógica para alterar o idioma conforme necessário
            }*/


        const darkModeToggle = document.getElementById('darkmode-toggle');

        //Função Light/Dark
        function toggleDarkMode() {
            document.body.classList.toggle('dark-mode', this.checked);
        }
        darkModeToggle.addEventListener('change', toggleDarkMode);


        const faqs = document.querySelectorAll(".faq");

        faqs.forEach(faq => {
            faq.addEventListener("click", () => {
                faq.classList.toggle("active");
            })
        })


        const btn = document.querySelector('.toggle_btn');
        const btnIcon = document.querySelector('.toggle_btn i');
        const dropdownMenus = document.querySelectorAll('.dropdown_menu');

        // Função para calcular a altura total dos dropdowns abertos
        function calcularAlturaDropdownsAbertos() {
            let alturaTotal = 0;
            dropdownMenus.forEach(menu => {
                if (menu.classList.contains('open')) {
                    alturaTotal += menu.scrollHeight;
                }
            });
            return alturaTotal;
        }

        // Event listener para o botão do hambúrguer
        btn.onclick = function () {
            dropdownMenus.forEach(menu => {
                menu.classList.toggle('open');
            });

            const isOpen = dropdownMenus[0].classList.contains('open'); // Verificar apenas um dos menus

            btnIcon.className = isOpen ?
                'fas fa-xmark' :
                'fas fa-bars';

            // Ajustar a altura do dropdown_menu
            const alturaDropdownsAbertos = calcularAlturaDropdownsAbertos();
            dropdownMenus[0].style.height = `${alturaDropdownsAbertos}px`;
        }

        // Event listener para os dropdown triggers
        const dropdownTriggers = document.querySelectorAll('.dropdown-trigger');
        dropdownTriggers.forEach(trigger => {
            trigger.addEventListener('click', function (event) {
                event.preventDefault();
                const dropdown = this.querySelector('.dropdown');
                dropdown.classList.toggle('is-active');

                // Adicione esta linha para exibir o menu dropdown correspondente quando o dropdown estiver ativo
                dropdown.nextElementSibling.classList.toggle('open');

                // Ajustar a altura do dropdown_menu
                const alturaDropdownsAbertos = calcularAlturaDropdownsAbertos();
                dropdownMenus[0].style.height = `${alturaDropdownsAbertos}px`;
            });
        });
    </script>

    <script src="js/script.js"></script>

</body>

</html>