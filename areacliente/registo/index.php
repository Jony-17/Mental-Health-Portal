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

                <!---- FORMULÁRIO REGISTO ---->
                <form action="registo.php" method="post" class="sign-in-form" enctype="multipart/form-data">
                    <h2 class="title-h2">Registo</h2>
                    <h3 class="title-h3">Começa a tua jornada mental</h3>

                    <?php if (isset($_GET['error'])) { ?>
                        <p class="error">
                            <?php echo $_GET['error']; ?>
                        </p>
                    <?php } ?>
                    <?php if (isset($_GET['success'])) { ?>
                        <p class="success">
                            <?php echo $_GET['success']; ?>
                        </p>
                    <?php } ?>

                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text" name="nome" placeholder="Nome Completo" value="<?php if ($_POST) {
                            echo "$_POST[nome]";
                        } ?>" required>
                    </div>

                    <div class="input-field">
                        <i class="fas fa-envelope"></i>
                        <input type="email" name="emaill" placeholder="Email Institucional" required value="<?php if ($_POST) {
                            echo "$_POST[emaill]";
                        } ?>">
                    </div>

                    <div class="input-field">
                        <i class="fas fa-eye toggle-password"></i>
                        <input type="password" name="passwordd" id="password" placeholder="Password" value="<?php if ($_POST) {
                            echo "$_POST[passwordd]";
                        } ?>" required />
                    </div>

                    <div class="input-field">
                        <i class="fas fa-eye toggle-cpassword"></i>
                        <input type="password" name="cpasswordd" id="cpassword" placeholder="Repetir Password" value="<?php if ($_POST) {
                            echo "$_POST[cpasswordd]";
                        } ?>" required />
                    </div>

                    <div class="gender-group">
                        <div class="gender-title">
                            <h6>Género</h6>
                        </div>
                        <div class="gender-input-field">
                            <input type="radio" name="genero" id="genero1" placeholder="Género" value="1">
                            <label for="masculino">Masculino</label>
                        </div>

                        <div class="gender-input-field">
                            <input type="radio" name="genero" id="genero2" placeholder="Género" value="2">
                            <label for="feminino">Feminino</label>
                        </div>

                        <div class="gender-input-field">
                            <input type="radio" name="genero" id="genero3" placeholder="Género" value="3">
                            <label for="pnd">Prefiro não dizer</label>
                        </div>
                    </div>

                    <div class="profile-image">
                        <h6>Foto de perfil</h6>
                    </div>
                    <input type="file" name="imagemperfil" id="imagemperfill">

                    <input type="submit" class="btn" value="Registar" />
                    <p class="text2">OU</p>
                    <p class="text3">Já tens conta criada? <a class="text3" href="../login/">Inicia sessão</a></p>
                </form>

            </div>
        </div>

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
                    <h2 class="content-text1">Tu</h2>
                    <h3 class="content-text2">mereces ser feliz</h3>
                    <p class="content-text3">
                        “Não somos responsáveis apenas pelo que fazemos, mas também pelo que deixamos de fazer.”
                    </p>
                    <h2 class="content-text4">Sigmund Freud</h2>
                    <h3 class="content-text5">Médico neurologista e Psicanalista</h3>
                </div>
                <img src="imgs/background-acesso.png" class="image" alt="" />
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
    <script src="app.js"></script>
    <script src="../../darkmode/darkmode.js"></script>
</body>

</html>
