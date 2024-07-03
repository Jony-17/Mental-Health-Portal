<?php
include '../../includes/header.php';

session_start();
require_once ("../../conn/conn.php");

// Verifica se a sessão do utilizador está definida
if (isset($_SESSION['id_utilizador'])) {
  // Obtém o ID do utilizador da sessão
  $utilizador_id = $_SESSION['id_utilizador'];
  echo "<script>console.log('ID: $utilizador_id');</script>";

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
<html lang="en" class="selection:text-white selection:bg-orange-400">

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
        <a class="nav-link" href="..">
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
        <a class="nav-link" href="#"> <!--Alterar HREF -->
          <i class="fas fa-clipboard"></i>
          <span>Registos de automonitorização</span></a>
      </li>

      <!-- Nav Item - Fórum -->
      <li class="nav-item">
        <a class="nav-link" href="../forum/users.php"> <!--Alterar HREF -->
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
        <div id="collapseNotificações" class="collapse" aria-labelledby="headingNotificações"
          data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <!--<h6 class="collapse-header">Login Screens:</h6>-->
            <a class="collapse-item" href="../notificacoes">Todas as notificações</a>
            <a class="collapse-item" href="../notificacoes/lembrete">Lembrete</a>
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
                        <div class="small text-gray-500">
                          <?php echo $data_lembrete->format('d/m/Y') . ' - ' . $row_lembrete['horario']; ?>
                        </div>
                        <span class="font-weight-bold"><?php echo $row_lembrete['mensagem']; ?></span>
                      </div>
                    </a>
                    <a class="dropdown-item text-center small text-gray-500" href="../notificacoes">Ver todas as
                      notificações</a>
                    <?php
                  }
                } else {
                  ?>
                  <a class="dropdown-item text-center small text-gray-500">Não existem
                    notificações</a>
                  <?php
                }
                ?>

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
                <img class="img-profile rounded-circle" src="../../areacliente/registo/imgs/<?php if (
                  !empty($row["img_perfil"])
                ) {
                  echo $row["img_perfil"];
                } else {
                  echo "teste.jpeg";
                } ?>">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="../../paginainicial/">
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


        <div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
          aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Insira os seus dados</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form action="insercao.php" method="POST">

                <div class="modal-body">

                  <div class="form-group">
                    <label>Pensamento</label>
                    <input type="text" name="Pensamento" class="form-control" placeholder="Inserir...">
                  </div>
                  <div class="form-group">
                    <label>Comportamento</label>
                    <input type="text" name="Comportamento" class="form-control" placeholder="Inserir...">
                  </div>
                  <div class="form-group">
                    <label>Sentimentos</label>
                    <input type="text" name="Sentimentos" class="form-control" placeholder="Inserir...">
                  </div>
                  <div class="form-group">
                    <label>Quando</label>
                    <input type="text" name="Quando" class="form-control" placeholder="Inserir...">
                  </div>
                  <div class="form-group">
                    <label>Pensamento Alternativo</label>
                    <input type="text" name="Pensamento_Alternativo" class="form-control" placeholder="Inserir...">
                  </div>
                  <div class="form-group">
                    <label>Comportamento Alternativo</label>
                    <input type="text" name="Comportamento_Alternativo" class="form-control" placeholder="Inserir...">
                  </div>

                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                  <button type="submit" name="inserirbtn" class="btn btn-primary">Guardar</button>
                </div>
              </form>

            </div>
          </div>
        </div>



        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="align-items-center justify-content-between mb-4">
            <h2 class="h2 mb-0 text-gray-800">Registo de automonitorização.</h2>
            <br>
            <h4 class="h4 mb-0 text-gray-800">Poderás fazê-lo ao longo do
              dia, ou até mesmo não o fazeres todos os dias. O importante é compreenderes como tens andado.</h4>
          </div>

          <!-- Content Row -->
          <div class="row">

            <div class="col-lg-12">

              <!-- Circle Buttons -->
              <form action="generate_pdf.php" method="POST">
                <div class="card shadow mb-4">
                  <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Registos de automonitorização</h6>
                    <div class="card-header2">
                      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addadminprofile">
                        Inserir
                      </button>
                      <?php
                      $query = "SELECT * FROM registos WHERE utilizador_id = $utilizador_id";
                      $result = mysqli_query($conn, $query);
                      if (mysqli_num_rows($result) > 0) {
                        ?>
                        <button type="submit" class="btn btn-primary" name="export_pdf">
                          Exportar para PDF
                        </button>
                        <?php
                      }
                      ?>
                    </div>
                  </div>
              </form>

              <div class="card-body">
                <fieldset class="table-responsive">
                  <?php $query = "SELECT * FROM registos WHERE utilizador_id = $utilizador_id";
                  $result = mysqli_query($conn, $query); ?>
                  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                      <tr>
                        <th><a href="#pontos"><span class="th-textos">[1]</span></a>Pensamento</th>
                        <th><a href="#pontos"><span class="th-textos">[2]</span></a>Comportamento</th>
                        <th><a href="#pontos"><span class="th-textos">[3]</span></a>Sentimentos</th>
                        <th><a href="#pontos"><span class="th-textos">[4]</span></a>Quando</th>
                        <th><a href="#pontos"><span class="th-textos">[5]</span></a>Pensamento Alternativo</th>
                        <th><a href="#pontos"><span class="th-textos">[6]</span></a>Comportamento Alternativo</th>
                        <th><a href="#pontos"><span class="th-textos"></span></a>Nota</th>
                      </tr>
                    </thead>
                    <tbody> <?php if (mysqli_num_rows($result) > 0) {
                      while ($row = mysqli_fetch_assoc($result)) { ?>
                          <tr>
                            <td><?php echo $row['pensamento']; ?></td>
                            <td><?php echo $row['comportamento']; ?></td>
                            <td><?php echo $row['sentimentos']; ?></td>
                            <td><?php echo $row['quando']; ?></td>
                            <td><?php echo $row['pensamento_alternativo']; ?></td>
                            <td><?php echo $row['comportamento_alternativo']; ?></td>
                            <td>
                              <form action="edicao.php" method="post">
                                <input type="hidden" name="edit_id" value="<?php echo $row['registos_id']; ?>">
                                <button type="submit" name="edit_btn" class="btn btn-primary">
                                  Editar</button>
                              </form>
                            </td>
                            </form>

                          </tr> <?php }
                    } ?>
                    </tbody>
                  </table>
                </fieldset>
              </div>

              <!-- Modal para inserir nota -->
              <!--<div class="modal fade" id="teste" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Inserir nota</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <form action="edicao.php" method="POST">

                      <div class="modal-body">

                        <div class="form-group">
                          <label>Nota</label>
                          <input type="text" name="Nota" class="form-control" placeholder="Inserir...">
                        </div>

                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                        <button type="submit" name="inserirbtn_edicao" class="btn btn-primary">Guardar</button>

                      </div>
                    </form>

                  </div>
                </div>
              </div>-->


            </div>

          </div>


        </div>
        <!-- End of Content Wrapper -->

        <div class="th-textos-pontos" id="pontos">
          <h4>Em que consiste cada registo</h4>
          <p>1. O que pensei, o que me veio à cabeça, o que mexeu comigo</p>
          <p>2. O que fiz relativamente a esse pensamento, que atitude tomei</p>
          <p>3. O que senti relativamente a isso, de que forma fiquei</p>
          <p>4. Quando aconteceu, o que estava a fazer no momento que aconteceu</p>
          <p>5. O que poderia ter pensado de forma diferente</p>
          <p>6. O que poderia ter feito de diferente face à situação/pensamento que tive</p>
        </div>

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
                <a class="btn btn-primary" href="../../areacliente/login/">Logout</a>
              </div>
            </div>
          </div>
        </div>

        <!-- Bootstrap core JavaScript-->
        <script src="../vendor/jquery/jquery.min.js"></script>
        <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

        <!-- Core plugin JavaScript-->
        <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

        <!-- Custom scripts for all pages-->
        <script src="../js/sb-admin-2.min.js"></script>

        <script src="../toggle-password.js"></script>

        <script src="../includes/scripts.php"></script>

</body>

</html>