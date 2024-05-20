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
                <form action="login.php" method="post" class="sign-in-form">
                    <h3 class="title-h3">Bem-vindo</h3>
                    <h2 class="title-h2">Login</h2>

                    <?php if (isset ($_GET['error'])) { ?>
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
                    <p class="text3"><a class="text3" href="../../paginainicial/">Acede ao website sem criar conta</a></p>
                </form>
            </div>
        </div>

        <div class="panels-container">
            <div class="panel left-panel">
                <div class="content">
                    <h2 class="content-text1">Tu</h2>
                    <h3 class="content-text2">mereces ser feliz</h3>
                    <p class="content-text3">
                        “O que é necessário para mudar uma pessoa é mudar sua consciência de si mesma.”
                    </p>
                    <h2 class="content-text4">Abraham Maslow</h2>
                    <h3 class="content-text5">Psicólogo</h3>
                </div>
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
    <script src="app.js"></script>
</body>

</html>