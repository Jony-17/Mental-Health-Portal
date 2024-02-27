<?php
session_start();
require_once("../conn/conn.php");

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
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="../imgs/logo.png">

    <link rel="stylesheet" type="text/css" href="css/style2.css">

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
    <header>
        <div class="navbar">
            <div class="logo">Portal de <br> Saúde Mental.</div>

            <ul class="links">
                <li><a href="#begin">Sobre Nós</a></li>
                <li><a href="#about-me">Perturbações</a></li>
                <li><a href="#skills">Artigos</a></li>
                <li><a href="#portfolio">Notícias</a></li>
                <li><a href="#">Conteúdo Educativo</a>
                    <i class="fas fa-chevron-down"></i>
                    <ul class="dropdown">
                        <li><a href="#">Quizzes</a></li>
                        <li><a href="#">Exercícios Mindfulness</a></li>
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
                            <li><a href="#">Perfil</a></li>
                            <li><a href="#">Termos e Condições</a></li>
                            <li><a href="#">Definições</a></li>
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
            <li><a href="#begin">Sobre Nós</a></li>
            <li><a href="#about-me">Perturbações</a></li>
            <li><a href="#skills">Artigos</a></li>
            <li><a href="#portfolio">Notícias</a></li>
            <li class="dropdown-trigger"><a href="#">Conteúdo Educativo <i class="fas fa-chevron-down"></i></a>
                <ul class="dropdown">
                    <li><a href="#">Quizzes</a></li>
                    <li><a href="#">Exercícios Mindfulness</a></li>
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
                        <li><a href="#">Perfil</a></li>
                        <li><a href="#">Termos e Condições</a></li>
                        <li><a href="#">Definições</a></li>
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
                        var url = "logout.php";
                        window.location = url;
                    }
                    document.getElementById("demo").innerHTML = x;
                }
            </script>
        </div>
    </header>

    <!--Home-->
    <section class="home" id="home">
        <div class="home-banner-container">
            <div class="home-bannerImage-container">
                <img src="imgs/background1.png" alt="banner background" />
            </div>

            <div class="home-text-section">
                <h1 class="primary-heading">
                    Saúde Mental <br> É Uma Prioridade
                </h1>
                <p class="primary-text">
                    Healthy switcher chefs do all the prep work, like
                    peeding, chopping & marinating, so you can cook
                    a fresh food.
                </p>
                <a href="#about" class="secondary-button">
                    <i class="fas fa-arrow-down"></i> Sabe mais
                </a>
            </div>
            <!--<div class="image-container">-->
            <img src="imgs/image1.png" alt="" />
            <!--</div>-->
        </div>
    </section>


    <!--About-->
    <section class="about" id="about">
        <div class="about-banner-container">
            <div class="about-bannerImage2-container">
                <img src="imgs/background2.png" alt="banner background" />
            </div>

            <div class="about-bannerImage3-container">
                <img src="imgs/background3.png" alt="banner background" />
            </div>

            <div class="image-container">
                <img src="imgs/image2.png" alt="" />
            </div>

            <div class="about-text-section">
                <h2 class="about-primary-heading">A nossa missão</h2>
                <h1 class="primary-heading">
                Nós queremos <br> saber de ti
                </h1>
                <p class="primary-text">
                    Healthy switcher chefs do all the prep work, like
                    peeding, chopping & marinating, so you can cook
                    a fresh food.
                </p>
                <a href="index.php" class="secondary-button">
                    <i class="fas fa-arrow-down"></i> Sabe mais
                </a>
            </div>
        </div>
    </section>

    <script>
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

            btnIcon.className = isOpen
                ? 'fas fa-xmark'
                : 'fas fa-bars';

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

</body>

</html>