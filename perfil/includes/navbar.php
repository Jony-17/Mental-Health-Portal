<?php

require_once("../../conn/conn.php");

// Verifica se a sessão do usuário está definida
if (isset($_SESSION['id_utilizador'])) {
    // Obtém o ID do usuário da sessão
    $utilizador_id = $_SESSION['id_utilizador'];
  
    // Consulta SQL para buscar o campo img_perfil
    $query = "SELECT nome, img_perfil FROM utilizadores WHERE utilizador_id = $utilizador_id";
  
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
    echo "Sessão do usuário não está definida.";
  }
?>
<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
        </div>
        <div class="sidebar-brand-text mx-3">Portal de Saúde Mental</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="index.php">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Interface
    </div>

    <!-- Nav Item - Perfis dos Alunos -->
    <li class="nav-item">
        <a class="nav-link" href="perfisalunos.php">
            <i class="fas fa-users"></i>
            <span>Perfis dos Alunos</span></a>
    </li>

    <!-- Nav Item - Inserir Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseInserir"
            aria-expanded="true" aria-controls="collapseInserir">
            <i class="fas fa-folder-plus"></i>
            <span>Inserir</span>
        </a>
        <div id="collapseInserir" class="collapse" aria-labelledby="headingInserir" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <!--<h6 class="collapse-header">Custom Utilities:</h6>-->
                <a class="collapse-item" href="#">Artigos</a>
                <a class="collapse-item" href="#">Notícias</a>
                <a class="collapse-item" href="#">Conteúdo educativo</a>
            </div>
        </div>
    </li>


    <!-- Nav Item - Editar Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseEditar" aria-expanded="true"
            aria-controls="collapseEditar">
            <i class="fas fa-edit"></i>
            <span>Editar</span>
        </a>
        <div id="collapseEditar" class="collapse" aria-labelledby="headingEditar" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <!--<h6 class="collapse-header">Login Screens:</h6>-->
                <a class="collapse-item" href="#">Artigos</a>
                <a class="collapse-item" href="#">Notícias</a>
                <a class="collapse-item" href="#">Conteúdo educativo</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Eliminar Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseEliminar"
            aria-expanded="true" aria-controls="collapseEliminar">
            <i class="fas fa-trash"></i>
            <span>Eliminar</span>
        </a>
        <div id="collapseEliminar" class="collapse" aria-labelledby="headingEliminar" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <!--<h6 class="collapse-header">Login Screens:</h6>-->
                <a class="collapse-item" href="#">Artigos</a>
                <a class="collapse-item" href="#">Notícias</a>
                <a class="collapse-item" href="#">Conteúdo educativo</a>
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

                <div class="topbar-divider d-none d-sm-block"></div>

                <!-- Nav Item - User Information -->
                <li class="nav-item dropdown no-arrow">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                            <?php echo $row["nome"] ?>
                        </span>
                        <img class="img-profile rounded-circle" src="<?php echo $row["img_perfil"] ?>">
                    </a>
                    <!-- Dropdown - User Information -->
                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                        aria-labelledby="userDropdown">
                        <!--<div class="dropdown-divider"></div>-->
                        <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                            Logout
                        </a>
                    </div>
                </li>

            </ul>

        </nav>
        <!-- End of Topbar -->


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