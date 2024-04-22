<?php
session_start();
require_once ("../conn/conn.php");

// Verifica se a sessão do usuário está definida
if (isset($_SESSION['id_utilizador'])) {
  // Obtém o ID do usuário da sessão
  $utilizador_id = $_SESSION['id_utilizador'];
  echo "<script>console.log('ID: $utilizador_id');</script>";

  // Variável para rastrear se houve alguma edição nos campos
  $edicao_realizada = false;

  $query = "SELECT nome, email, img_perfil FROM utilizadores WHERE utilizador_id = $utilizador_id";

  $result = mysqli_query($conn, $query);

  if ($result) {
    // Extrair o resultado da consulta
    $row = mysqli_fetch_assoc($result);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      echo "<script>console.log('Formulário enviado');</script>";

      if (isset($_POST["novo_nome"]) && !empty($_POST["novo_nome"])) {
        $novo_nome = $_POST["novo_nome"];
        echo "<script>console.log('Novo nome: $novo_nome');</script>";

        if ($novo_nome !== $row['nome']) {
          // Query para atualizar apenas o nome no banco de dados
          $sql = "UPDATE utilizadores SET nome='$novo_nome' WHERE utilizador_id = $utilizador_id";

          if ($conn->query($sql) === TRUE) {
            $_SESSION['success_nome_message'] = "Nome atualizado com sucesso!";
            $edicao_realizada = true;
          }
        } else {
          $_SESSION['danger_nome_message'] = "Nome utilizado anteriormente. Insere outro!";
        }
      }
    }


    // Verifica se o novo email foi enviado no formulário
    if (isset($_POST["novo_email"]) && !empty($_POST["novo_email"])) {
      $novo_email = $_POST["novo_email"];
      echo "<script>console.log('Novo email: $novo_email');</script>";

      $query_check_email = "SELECT COUNT(*) AS total FROM utilizadores WHERE email='$novo_email' AND utilizador_id != $utilizador_id";
      $result_check_email = mysqli_query($conn, $query_check_email);
      $row_check_email = mysqli_fetch_assoc($result_check_email);

      if ($novo_email !== $row['email']) {
        if ($row_check_email['total'] > 0) {
          $_SESSION['danger_email_message'] = "O email fornecido já está em uso. Por favor, escolha outro email.</p>";
        } else {
          // Query para atualizar apenas o email no banco de dados
          $sql = "UPDATE utilizadores SET email='$novo_email' WHERE utilizador_id = $utilizador_id";

          if ($conn->query($sql) === TRUE) {
            $_SESSION['success_email_message'] = "Email atualizado com sucesso!";
            $edicao_realizada = true;
            //unset($_SESSION['success_email_message']);
          } else {
            $_SESSION['danger_email_message'] = "Erro ao atualizar o email: " . $conn->error;
          }
        }
      } else {
        $_SESSION['danger_email_message'] = "Email utilizado anteriormente. Insere outro!";
      }
    }



    // Verifica se a nova senha foi enviada no formulário
    if (isset($_POST["nova_password"]) && !empty($_POST["nova_password"])) {
      $nova_password = $_POST["nova_password"];

      $senha_hash = password_hash($nova_password, PASSWORD_DEFAULT);

      // Verifica a senha atual no banco de dados
      $sql = "UPDATE utilizadores SET password='$senha_hash' WHERE utilizador_id = $utilizador_id";


      if ($conn->query($sql) === TRUE) {
        $_SESSION['success_password_message'] = "Password atualizada com sucesso!";
        unset($_SESSION['success_nome_message']);
      } else {
        echo "<p class='text-danger'>Erro ao atualizar o email: " . $conn->error . "</p>";
      }
    }


    // Verifica se a nova imagem de perfil foi enviada no formulário
    if (isset($_FILES["nova_imagemperfil"]) && !empty($_FILES["nova_imagemperfil"]["name"])) {
      $nome_arquivo = $_FILES["nova_imagemperfil"]["name"];
      $nome_temporario = $_FILES["nova_imagemperfil"]["tmp_name"];
      $caminho_destino = "../areacliente/registo/imgs" . $nome_arquivo;

      if (move_uploaded_file($nome_temporario, $caminho_destino)) {
        // Atualize o campo de imagem de perfil no banco de dados com o novo caminho da imagem
        $sql = "UPDATE utilizadores SET img_perfil='$nome_arquivo' WHERE utilizador_id = $utilizador_id";

        if ($conn->query($sql) === TRUE) {
          $_SESSION['success_imagemperfil_message'] = "Foto de perfil atualizada com sucesso!";
          $edicao_realizada = true;
        } else {
          $_SESSION['danger_imagemperfil_message'] = "Erro ao atualizar a foto de perfil: " . $conn->error;
        }
      } else {
        $_SESSION['danger_imagemperfil_message'] = "Erro ao fazer o upload da foto de perfil.";
      }
    }


  }

  // Consulta SQL para buscar o campo img_perfil
  $query = "SELECT nome, email, password, img_perfil FROM utilizadores WHERE utilizador_id = $utilizador_id";

  $result = mysqli_query($conn, $query);

  if ($result) {
    // Extrair o resultado da consulta
    $row = mysqli_fetch_assoc($result);

    // Exibir o valor da sessão
    //var_dump($_SESSION['id_utilizador']);
  } else {
    echo "Erro na consulta SQL: " . mysqli_error($conn);
  }
} else {
  echo "Sessão do utilizador não está definida.";
}
?>



<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Painel Perfil | Portal de Saúde Mental</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Kode+Mono:wght@400..700&family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Libre+Baskerville:ital,wght@0,400;0,700;1,400&family=Saira+Condensed:wght@100;200;300;400;500;600;700;800;900&display=swap"
    rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
    integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <div class="sidebar-brand d-flex align-items-center justify-content-center" href="">
        <div class="sidebar-brand-icon rotate-n-15">
        </div>
        <div class="sidebar-brand-text mx-3">Portal de Saúde Mental</div>
      </div>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="#">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
        Interface
      </div>

      <!-- Nav Item - Registos de automonitorização -->
      <li class="nav-item">
        <a class="nav-link" href="registos-automonitorizacao"> <!--Alterar HREF -->
          <i class="fas fa-clipboard"></i>
          <span>Registos de automonitorização</span></a>
      </li>

      <!-- Nav Item - Fórum -->
      <li class="nav-item">
        <a class="nav-link" href="forum/users.php"> <!--Alterar HREF -->
          <i class="fas fa-comments"></i>
          <span>Fórum</span></a>
      </li>

      <!-- Nav Item - Notificações Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseNotificações"
          aria-expanded="true" aria-controls="collapseNotificações">
          <i class="fas fa-bell"></i>
          <span>Notificações</span>
        </a>
        <div id="collapseNotificações" class="collapse" aria-labelledby="headingNotificações" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <!--<h6 class="collapse-header">Login Screens:</h6>-->
            <a class="collapse-item" href="notificacoes">Todas as notificações</a>
            <a class="collapse-item" href="notificacoes/lembrete">Lembrete</a>
          </div>
        </div>
      </li>


      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Alerts -->
          <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-bell fa-fw"></i>
              </a>
              <!-- Dropdown - Alerts -->
              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                aria-labelledby="alertsDropdown">
                <h6 class="dropdown-header">
                  Notificações
                </h6>
                <?php
                $data_atual = date('Y-m-d');
                $horario_atual = date('H:i:s');

                // Selecionar lembretes com data igual à data atual e hora do lembrete menor ou igual à hora atual
                $sql_lembretes = "SELECT * FROM lembrete WHERE data = '$data_atual' AND horario <= '$horario_atual' AND utilizador_id = $utilizador_id";
                $result_lembretes = mysqli_query($conn, $sql_lembretes);

                if (mysqli_num_rows($result_lembretes) > 0) {
                  // Exibir os lembretes
                  while ($row_lembrete = mysqli_fetch_assoc($result_lembretes)) {
                    $data_lembrete = new DateTime($row_lembrete['data']);

                    ?>
                    <a class="dropdown-item d-flex align-items-center">
                      <div class="mr-3">
                        <div class="icon-circle bg-secondary">
                          <i class="fas fa-file-alt text-white"></i>
                        </div>
                      </div>
                      <div>
                        <div class="small text-gray-500"><?php echo $data_lembrete->format('d/m/Y') . ' - ' . $row_lembrete['horario']; ?></div>
                        <span class="font-weight-bold"><?php echo $row_lembrete['mensagem']; ?></span>
                      </div>
                    </a>
                    <?php
                  }
                }

                ?>
                <a class="dropdown-item text-center small text-gray-500" href="notificacoes">Ver todas as notificações</a>
              </div>
            </li>


            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                  <?php echo $row["nome"] ?>
                </span>
                <img class="img-profile rounded-circle" src="../areacliente/registo/imgs/<?php if (
                  !empty($row["img_perfil"])
                ) {
                  echo $row["img_perfil"];
                } else {
                  echo "teste.jpeg";
                } ?>">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="../paginainicial/">
                  <i class="fas fa-home fa-sm fa-fw mr-2 text-gray-400"></i>
                  Voltar à Página Inicial
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Aqui é apresentada a tua informação pessoal</h1>
          </div>

          <!-- Content Row -->
          <div class="row">

            <div class="col-lg-12">

              <!-- Circle Buttons -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Edição de dados</h6>
                </div>
                <div class="card-body">
                  <div class="row">
                    <div class="col-lg-6 col-md-12 mb-4">
                      <p>NOME</p>
                      <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                        <input type="text" name="novo_nome"
                          style="border: 1px solid rgba(0, 0, 0, 0.1); border-radius: 10px; padding: 10px; width: 100%;"
                          value="<?php echo $row["nome"] ?>">
                        <button type="submit" class="btn btn-primary btn-icon-split" style="margin-top: 10px;">
                          <span class="text">Atualizar</span>
                        </button>
                        <?php
                        // Verifica se existe uma mensagem de sucesso na sessão
                        if (isset($_SESSION['success_nome_message'])) {
                          echo "<p class='text-success'>" . $_SESSION['success_nome_message'] . "</p>";
                          // Limpa a mensagem da sessão
                          unset($_SESSION['success_nome_message']);
                        }
                        if (isset($_SESSION['danger_nome_message'])) {
                          echo "<p class='text-danger'>" . $_SESSION['danger_nome_message'] . "</p>";
                          // Limpa a mensagem da sessão
                          unset($_SESSION['danger_nome_message']);
                        }
                        ?>
                      </form>
                    </div>

                    <div class="col-lg-6 col-md-12 mb-4">
                      <p>EMAIL</p>
                      <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                        <input type="email" name="novo_email"
                          style="border: 1px solid rgba(0, 0, 0, 0.1); border-radius: 10px; padding: 10px; width: 100%;"
                          value="<?php echo $row["email"] ?>">
                        <button type="submit" class="btn btn-primary btn-icon-split" style="margin-top: 10px;">
                          <span class="text">Atualizar</span>
                        </button>
                        <?php
                        // Verifica se existe uma mensagem de sucesso na sessão
                        if (isset($_SESSION['success_email_message'])) {
                          echo "<p class='text-success'>" . $_SESSION['success_email_message'] . "</p>";
                          // Limpa a mensagem da sessão
                          unset($_SESSION['success_email_message']);
                        }
                        if (isset($_SESSION['danger_email_message'])) {
                          echo "<p class='text-danger'>" . $_SESSION['danger_email_message'] . "</p>";
                          // Limpa a mensagem da sessão
                          unset($_SESSION['danger_email_message']);
                        }
                        ?>
                      </form>
                    </div>

                    <div class="col-lg-6 col-md-12 mb-4">
                      <p>PASSWORD</p>
                      <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                        <i class="fas fa-eye toggle-password" style="cursor: pointer" ;></i>
                        <input type="password" name="nova_password" id="password" placeholder="Insere a password"
                          style="border: 1px solid rgba(0, 0, 0, 0.1); border-radius: 10px; padding: 10px; margin-left: 5px; width: 85%;">
                        <button type="submit" class="btn btn-primary btn-icon-split" style="margin-top: 10px;">
                          <span class="text">Atualizar</span>
                        </button>
                        <?php
                        // Verifica se existe uma mensagem de sucesso na sessão
                        if (isset($_SESSION['success_password_message'])) {
                          echo "<p class='text-success'>" . $_SESSION['success_password_message'] . "</p>";
                          // Limpa a mensagem da sessão
                          unset($_SESSION['success_password_message']);
                        }
                        ?>
                      </form>
                    </div>


                    <div class="col-lg-6 col-md-12 mb-4">
                      <p>FOTO DE PERFIL</p>
                      <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" enctype="multipart/form-data">
                        <!--<i class="fas fa-eye toggle-password" style="cursor: pointer" ;></i>-->
                        <input type="file" name="nova_imagemperfil" id="imagemperfil"
                          style="border: 1px solid rgba(0, 0, 0, 0.1); border-radius: 10px; padding: 10px; width: 100%;">
                        <button type="submit" class="btn btn-primary btn-icon-split" style="margin-top: 10px;">
                          <span class="text">Atualizar</span>
                        </button>
                        <?php
                        // Verifica se existe uma mensagem de sucesso na sessão
                        if (isset($_SESSION['success_imagemperfil_message'])) {
                          echo "<p class='text-success'>" . $_SESSION['success_imagemperfil_message'] . "</p>";
                          // Limpa a mensagem da sessão
                          unset($_SESSION['success_imagemperfil_message']);
                        }
                        ?>
                      </form>
                    </div>

                  </div>
                </div>
              </div>

            </div>


            <!-- Earnings (Monthly) Card Example -->

            <!--<div class="col-lg-6">
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">A tua atividade</h6>
                </div>-->



            <!-- QUIZ EMPATIA -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Quiz realizado - O quão
                        empática/o és?
                      </div>
                      <?php
                      $query = "SELECT utilizador_id FROM quizzes WHERE quiz_empatia_id IS NOT NULL AND utilizador_id = $utilizador_id ORDER BY quiz_id";

                      $query_run = mysqli_query($conn, $query);

                      $row = mysqli_num_rows($query_run);

                      echo '<h1> ' . $row . '</h1>';
                      ?>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-handshake fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- QUIZ PREOCUPAÇÃO -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Quiz realizado - O quão
                        preocupada/o és?
                      </div>
                      <?php
                      $query = "SELECT utilizador_id FROM quizzes WHERE quiz_preocupacao_id IS NOT NULL AND utilizador_id = $utilizador_id ORDER BY quiz_id";

                      $query_run = mysqli_query($conn, $query);

                      $row = mysqli_num_rows($query_run);

                      echo '<h1> ' . $row . '</h1>';
                      ?>
                    </div>
                    <div class="col-auto">
                      <i class="far fa-comments fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- QUIZ ENERGIA -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Quiz realizado - Tens uma
                        energia positiva?
                      </div>
                      <?php
                      $query = "SELECT utilizador_id FROM quizzes WHERE quiz_energia_id IS NOT NULL AND utilizador_id = $utilizador_id ORDER BY quiz_id";

                      $query_run = mysqli_query($conn, $query);

                      $row = mysqli_num_rows($query_run);

                      echo '<h1> ' . $row . '</h1>';
                      ?>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-bolt fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>


            <!-- QUIZ EMOÇÃO -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Quiz realizado - O quão
                        livre emocionalmente, és?
                      </div>
                      <?php
                      $query = "SELECT utilizador_id FROM quizzes WHERE quiz_emocao_id IS NOT NULL AND utilizador_id = $utilizador_id ORDER BY quiz_id";

                      $query_run = mysqli_query($conn, $query);

                      $row = mysqli_num_rows($query_run);

                      echo '<h1> ' . $row . '</h1>';
                      ?>
                    </div>
                    <div class="col-auto">
                      <i class="far fa-smile-wink fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!--</div>
            </div>
          </div>-->

            <!-- Content Row -->


          </div>
          <!-- End of Main Content -->


        </div>
        <!-- End of Content Wrapper -->


        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
          <i class="fas fa-angle-up"></i>
        </a>

        <!-- Logout Modal-->
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
          aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Terminar Sessão</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
              </div>
              <div class="modal-body">Tens a certeza que queres sair?</div>
              <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                <a class="btn btn-primary" href="../areacliente/login/">Logout</a>
              </div>
            </div>
          </div>
        </div>

        <!-- Bootstrap core JavaScript-->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="js/sb-admin-2.min.js"></script>

        <script src="toggle-password.js"></script>

        <script src="js/script.js"></script>

</body>

</html>