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
                    <h2 class="content-text1">Tu</h2>
                    <h3 class="content-text2">mereces ser feliz</h3>
                    <p class="content-text3">
                        “ O que é necessário para mudar uma pessoa é mudar sua consciência de si mesma. ”
                    </p>
                    <h2 class="content-text4">Abraham Maslow</h2>
                    <h3 class="content-text5">Psicólogo</h3>
                </div>
                <!-- Retirar à partida 
                <img src="imgs/teste.png" class="image" alt="" />
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
                <img src="imgs/elementos/sol.png" class="elem6 lp2" /> -->
            </div>
        </div>
    </div>
    <script src="./js/toggle-password.js"></script>
    <script src="app.js"></script>
</body>

</html>