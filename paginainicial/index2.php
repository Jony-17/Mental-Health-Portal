<?php
session_start();
require_once("../conn/conn.php");

// Verifica se a sessão do usuário está definida
if (!isset($_SESSION['id_utilizador'])) {

    // Exibe uma mensagem se a sessão estiver definida
    echo "AAAAAAAAA";
} else {
    // Se a sessão do usuário já estiver definida, você pode executar outras ações aqui
    echo "Sessão do utilizador já está definida. ID do utilizador: " . $_SESSION['id_utilizador'];
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
                <li><a href="#portfolio">Conteúdo Educativo</a>
                    <i class="fas fa-chevron-down"></i>
                    <ul class="dropdown">
                        <li><a href="#">Quizzes</a></li>
                        <li><a href="#">Exercícios Mindfulness</a></li>
                    </ul>
                </li>
                </li>
            </ul>

            <?php if (!empty($_SESSION['id_utilizador'])): ?>

                <li><a class="btn" onclick="funcao1()">Terminar Sessão</a></li>

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

    <script>
        const btn = document.querySelector('.toggle_btn')
        const btnIcon = document.querySelector('.toggle_btn i')
        const dropdown = document.querySelector('.dropdown_menu')

        const dropdownTrigger = document.querySelector('.dropdown-trigger');
        const dropdown2 = dropdownTrigger.querySelector('.dropdown');

        // Event listener para o botão do hambúrguer
        btn.onclick = function () {
            dropdown.classList.toggle('open')
            const isOpen = dropdown.classList.contains('open')

            btnIcon.classList = isOpen
                ? 'fas fa-xmark'
                : 'fas fa-bars'
        }

        dropdownTrigger.addEventListener('click', function (event) {
            event.preventDefault();
            dropdown2.classList.toggle('is-active');
        });
    </script>
</body>

</html>