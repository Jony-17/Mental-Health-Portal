<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
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
                <form action="recuperarpassword.php" method="post" class="sign-in-form">
                    <h3 class="title-h3">Recupera a tua password</h3>
                    <!--<h2 class="title">Login</h2>-->
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
                        <i class="fas fa-envelope"></i>
                        <input type="email" name="emaill" placeholder="Email Institucional" required value="<?php if ($_POST) {
                            echo "$_POST[emaill]";
                        } ?>">
                    </div>

                    <div class="input-field">
                        <i class="fas fa-eye toggle-password"></i>
                        <input type="password" name="passwordd" id="password" placeholder="Nova password" />
                    </div>

                    <div class="input-field">
                        <i class="fas fa-eye toggle-cpassword"></i>
                        <input type="password" name="cpasswordd" id="cpassword" placeholder="Repetir password" />
                    </div>

                    <input type="submit" value="Recuperar" class="btn" />
                    <p class="text3"><a class="text3" href="../login/">Inicia sessão novamente</a></p>
                </form>
            </div>
        </div>

        <div class="panels-container">
            <div class="panel left-panel">
                <div class="content">
                    <h2 class="content-text1">Tu</h2>
                    <h3 class="content-text2">mereces ser feliz</h3>
                    <p class="content-text3">
                        “A sua visão tornar-se-á clara somente quando olhar para o seu próprio coração. Quem olha para
                        fora, sonha. Quem olha para dentro, desperta.”
                    </p>
                    <h2 class="content-text4">Carl Jung</h2>
                    <h3 class="content-text5">Psiquiatra e Psicanalista</h3>
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
</body>

</html>