<!DOCTYPE html>
<html lang="en" class="selection:text-white selection:bg-orange-400">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="/PortalSaudeMental/includes/logo.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./css/style.css" />
    <title>Portal de Saúde Mental</title>
</head>

<body>
    <div class="container">
        <div class="logo">Portal de Saúde Mental.</div>
        <div class="forms-container">
            <div class="signin-signup">

                <!---- FORMULÁRIO LOGIN ---->
                <form action="login.php" method="post" class="sign-in-form">
                    <h3 class="title-h3">Bem-vindo</h3>
                    <h2 class="title-h2">Login</h2>

                    <?php if (isset($_GET['error'])) { ?>
                        <p class="error">
                            <?php echo $_GET['error']; ?>
                        </p>
                    <?php } ?>

                    <div class="input-field">
                        <i class="fas fa-envelope"></i>
                        <input type="email" name="emaill" placeholder="Email Institucional" />
                    </div>

                    <div class="input-field">
                        <i class="fas fa-eye toggle-password"></i>
                        <input type="password" name="passwordd" id="password" placeholder="Password" />
                    </div>

                    <a href="../recuperarpassword/" class="text">Esqueci-me da password</a>
                    <input type="submit" value="Login" class="btn" />
                    <p class="text2">OU</p>
                    <p class="text3">Não tens conta? <a class="text3" href="../registo/">Junta-te a
                            nós!</a></p>
                    <p class="text3"><a class="text3" href="../../paginainicial/">Acede ao website sem criar conta</a>
                    </p>
                </form>
            </div>
        </div>

        <!-- Painel do lado esquerdo -->
        <div class="panels-container">
            <div class="panel left-panel">
                <div class="content">
                    <button id="dark-mode-toggle" class="dark-mode-toggle">
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
                    <!-- Títulos -->
                    <h2 class="content-text1">Tu</h2>
                    <h3 class="content-text2">mereces ser feliz</h3>
                    <p class="content-text3">
                        “O que é necessário para mudar uma pessoa é mudar sua consciência de si mesma.”
                    </p>
                    <h2 class="content-text4">Abraham Maslow</h2>
                    <h3 class="content-text5">Psicólogo</h3>
                </div>
                <!-- Elementos -->
                <img src="imgs/background-acesso.png" class="image" />
                <img src="imgs/elementos/musica.png" class="elem1 lp1" />
                <img src="imgs/elementos/musica.png" class="elem1 lp2" />

                <img src="imgs/elementos/coracao.png" class="elem2 lp1" />
                <img src="imgs/elementos/coracao.png" class="elem2 lp2" />

                <img src="imgs/elementos/estrela.png" class="elem3 lp1" />
                <img src="imgs/elementos/estrela.png" class="elem3 lp2" />

                <img src="imgs/elementos/arcoiris.png" class="elem4 lp1" />
                <img src="imgs/elementos/arcoiris.png" class="elem4 lp2" />

                <img src="imgs/elementos/lua.png" class="elem5 lp1" />
                <img src="imgs/elementos/lua.png" class="elem5 lp2" />

                <img src="imgs/elementos/sol.png" class="elem6 lp1" />
                <img src="imgs/elementos/sol.png" class="elem6 lp2" />
            </div>
        </div>
    </div>
    <script src="./js/toggle-password.js"></script>
    <script src="../../darkmode/darkmode.js"></script>
</body>

</html>
