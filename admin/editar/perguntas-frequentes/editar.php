<?php
session_start();
require_once ("../../../conn/conn.php");

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

    <title>Painel Admin | Portal de Saúde Mental</title>

    <!-- Custom fonts for this template-->
    <link href="../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../../css/sb-admin-2.min.css" rel="stylesheet">

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
                <a class="nav-link" href="../..">
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
                <a class="nav-link" href="../../perfis/">
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
                <div id="collapseInserir" class="collapse" aria-labelledby="headingInserir"
                    data-parent="#accordionSidebar">
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
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseEditar"
                    aria-expanded="true" aria-controls="collapseEditar">
                    <i class="fas fa-edit"></i>
                    <span>Editar</span>
                </a>
                <div id="collapseEditar" class="collapse" aria-labelledby="headingEditar"
                    data-parent="#accordionSidebar">
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
                <div id="collapseEliminar" class="collapse" aria-labelledby="headingEliminar"
                    data-parent="#accordionSidebar">
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
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                                    <?php echo $row["nome"] ?>
                                </span>
                                <img class="img-profile rounded-circle" src="../../../areacliente/registo/imgs/<?php if (
                                    !empty($row["img_perfil"])
                                ) {
                                    echo $row["img_perfil"];
                                } else {
                                    echo "../../teste.jpeg";
                                } ?>">
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

                <div class="container-fluid">

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Perguntas e respostas
                            </h6>
                        </div>

                        <div class="card-body">
                            <?php

                            if (isset($_POST['edit_btn'])) {
                                $perguntas_id = $_POST['edit_id'];

                                $query = "SELECT * FROM perguntas WHERE perguntas_id='$perguntas_id' ";
                                $query_run = mysqli_query($conn, $query);

                                if (mysqli_num_rows($query_run) > 0) {
                                    $row = mysqli_fetch_assoc($query_run);
                                    ?>
                                    <form action="perguntas-respostas.php" method="post" enctype="multipart/form-data">
                                        <input type="hidden" name="perguntas_id"
                                            value="<?php echo $row['perguntas_id'] ?>">
                                        
                                            <div class="form-group">
                                            <label>Pergunta</label>
                                            <input type="text" name="pergunta" value="<?php echo $row['pergunta'] ?>"
                                                class="form-control" placeholder="Editar pergunta">
                                        </div>

                                        <div class="form-group">
                                            <label>Resposta</label>
                                            <input type="text" name="resposta" value="<?php echo $row['resposta'] ?>"
                                            class="form-control" placeholder="Editar resposta">
                                        </div>

                                        <a href="." class="btn btn-danger">Cancelar</a>
                                        <button type="submit" name="inserirbtn" class="btn btn-primary">Editar</button>
                                    </form>
                                    <?php
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->

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
                            <a class="btn btn-primary" href="../../../areacliente/login/">Logout</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Bootstrap core JavaScript-->
            <script src="../../vendor/jquery/jquery.min.js"></script>
            <script src="../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

            <!-- Core plugin JavaScript-->
            <script src="../../vendor/jquery-easing/jquery.easing.min.js"></script>

            <!-- Custom scripts for all pages-->
            <script src="../../js/sb-admin-2.min.js"></script>

</body>

</html>