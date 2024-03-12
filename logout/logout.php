<?php
session_start();
session_destroy();
//elimina as variaveis de sessao
header("location: ../areacliente/login/");//volta à pagina de login
exit();
