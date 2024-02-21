<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
        integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css" />
    <title>Portal de Saúde Mental</title>
</head>

<body>
    <div class="container">
        <div class="logo">Portal de Saúde Mental.</div>
        <div class="forms-container">
            <div class="signin-signup">

                <!---- FORMULÁRIO LOGIN ---->
                <form action="#" class="sign-in-form">
                    <h3 class="title2">Bem-vindo</h3>
                    <h2 class="title">Login</h2>
                    <div class="input-field">
                        <i class="fas fa-envelope"></i>
                        <input type="text" placeholder="Email Institucional" />
                    </div>
                    <div class="input-field">
                        <i class="fas fa-eye-slash"></i>
                        <input type="password" placeholder="Password" />
                    </div>
                    <a href="#" class="text-a">Esqueci-me da password</a>
                    <input type="submit" value="Login" class="btn" />
                    <p class="social-text">OU</p>
                    <p class="social-text2">Não tens conta? Junta-te a nós</p>
                    <button class="btn transparent" id="sign-up-btn">
                        Registar
                    </button>
                </form>

                <!---- FORMULÁRIO REGISTO ---->
                <form action="#" class="sign-up-form">
                    <h2 class="title">Registo</h2>
                    <h3 class="title2">Começa a tua jornada mental</h3>
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text" placeholder="Nome Completo" />
                    </div>
                    <div class="input-field">
                        <i class="fas fa-envelope"></i>
                        <input type="email" placeholder="Email Institucional" />
                    </div>
                    <div class="input-field">
                        <i class="fas fa-eye-slash"></i>
                        <input type="password" placeholder="Password" />
                    </div>
                    <div class="input-field">
                        <i class="fas fa-eye-slash"></i>
                        <input type="password" placeholder="Repetir Password" />
                    </div>
                    <div class="input-field">
                        <i class="fas fa-chevron-down"></i>
                        <input type="text" placeholder="Género" />
                    </div>
                    <input type="submit" class="btn" value="Registar" />
                    <p class="social-text">OU</p>
                    <p class="social-text2">Já tens conta criada?</p>
                    <button class="btn transparent" id="sign-in-btn">
                        Login
                    </button>
                </form>

            </div>
        </div>

        <div class="panels-container">
            <!---- PAINEL LADO ESQUERDO (LOGIN) ---->
            <div class="panel left-panel">
                <div class="content">
                    <h2 class="first-text">Tu</h2>
                    <h3 class="second-text">mereces ser feliz</h3>
                    <p class="third-text">
                        “ O que é necessário para mudar uma pessoa é mudar sua consciência de si mesma. ”
                    </p>
                    <h2 class="fourth-text">Abraham Maslow</h2>
                    <h3 class="fifth-text">Psicólogo</h3>
                    <button class="btn transparent2"><button class="btn transparent3">
                </div>
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
                <img src="imgs/elementos/sol.png" class="elem6 lp2" />
            </div>

            <!---- PAINEL LADO DIREITO (REGISTO) ---->
            <div class="panel right-panel">
                <div class="content">
                    <h3>One of us ?</h3>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Nostrum
                        laboriosam ad deleniti.
                    </p>
                </div>
                <img src="imgs/teste.png" class="image" alt="" />
                <img src="imgs/elementos/musica.png" class="elem1 rp1" />
                <img src="imgs/elementos/musica.png" class="elem1 rp2" />

                <img src="imgs/elementos/coracao.png" class="elem2 rp1" />
                <img src="imgs/elementos/coracao.png" class="elem2 rp2" />

                <img src="imgs/elementos/estrela.png" class="elem3 rp1" />
                <img src="imgs/elementos/estrela.png" class="elem3 rp2" />

                <img src="imgs/elementos/arcoiris.png" class="elem4 rp1" />
                <img src="imgs/elementos/arcoiris.png" class="elem4 rp2" />

                <img src="imgs/elementos/lua.png" class="elem5 rp1" />
                <img src="imgs/elementos/lua.png" class="elem5 rp2" />

                <img src="imgs/elementos/sol.png" class="elem6 rp1" />
                <img src="imgs/elementos/sol.png" class="elem6 rp2" />
            </div>
        </div>
    </div>

    <script src="app.js"></script>
</body>

</html>