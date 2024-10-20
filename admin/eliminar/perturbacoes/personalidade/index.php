<?php
session_start();
require_once ("../../../../conn/conn.php");

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
    <link href="../../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../../../css/sb-admin-2.min.css" rel="stylesheet">

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
                <a class="nav-link" href="../../..">
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
                <a class="nav-link" href="../../../perfis/">
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
                        <h6 class="collapse-header">Perturbações Mentais</h6>
                        <a class="collapse-item" href="../../../inserir/perturbacoes/">Perturbações</a>
                        <a class="collapse-item" href="../../../inserir/grupos-perturbacoes/">Grupo de Perturbações</a>
                        <a class="collapse-item" href="../../../inserir/juncao-perturbacoes/">Junção de Perturbações</a>
                        <a class="collapse-item" href="../../../inserir/perturbacoes/personalidade/">Perturbações de Person.</a>
                        <a class="collapse-item" href="../../../inserir/juncao-perturbacoes-personalidade/">Junção de Pert. de
                            Person.</a>
                        <a class="collapse-item" href="../../../inserir/10-factos/">10 factos</a>

                        <h6 class="collapse-header">Artigos</h6>
                        <a class="collapse-item" href="../../../inserir/artigos/">Artigos</a>

                        <h6 class="collapse-header">Notícias</h6>
                        <a class="collapse-item" href="../../../inserir/noticias/">Notícias</a>

                        <h6 class="collapse-header">Conteúdo Educativo</h6>
                        <a class="collapse-item" href="../../../inserir/quizzes/">Quizzes</a>
                        <a class="collapse-item" href="../../../inserir/exercicios-mindfulness/">Exercícios Mindfulness</a>
                        <a class="collapse-item" href="../../../inserir/ted-talks/">TED Talks</a>

                        <h6 class="collapse-header">Perguntas Frequentes</h6>
                        <a class="collapse-item" href="../../../inserir/perguntas-frequentes/">Perguntas e respostas</a>
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
                        <h6 class="collapse-header">Perturbações Mentais</h6>
                        <a class="collapse-item" href="../../../editar/perturbacoes/">Perturbações</a>
                        <a class="collapse-item" href="../../../editar/grupos-perturbacoes/">Grupo de Perturbações</a>
                        <a class="collapse-item" href="../../../editar/juncao-perturbacoes/">Junção de Perturbações</a>
                        <a class="collapse-item" href="../../../editar/perturbacoes/personalidade/">Perturbações de
                            Person.</a>
                        <a class="collapse-item" href="../../../editar/juncao-perturbacoes-personalidade/">Junção de Pert.
                            de
                            Person.</a>
                        <a class="collapse-item" href="../../../editar/10-factos/">10 factos</a>

                        <h6 class="collapse-header">Artigos</h6>
                        <a class="collapse-item" href="../../../editar/artigos/">Artigos</a>

                        <h6 class="collapse-header">Notícias</h6>
                        <a class="collapse-item" href="../../../editar/noticias/">Notícias</a>

                        <h6 class="collapse-header">Conteúdo Educativo</h6>
                        <a class="collapse-item" href="../../../editar/quizzes/">Quizzes</a>
                        <a class="collapse-item" href="../../../editar/exercicios-mindfulness/">Exercícios Mindfulness</a>
                        <a class="collapse-item" href="../../../editar/ted-talks/">TED Talks</a>

                        <h6 class="collapse-header">Perguntas Frequentes</h6>
                        <a class="collapse-item" href="../../../editar/perguntas-frequentes/">Perguntas e respostas</a>
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
                        <h6 class="collapse-header">Perturbações Mentais</h6>
                        <a class="collapse-item" href="../../eliminar/perturbacoes/">Perturbações</a>
                        <a class="collapse-item" href="../../eliminar/grupos-perturbacoes/">Grupo de Perturbações</a>
                        <a class="collapse-item" href="../../eliminar/juncao-perturbacoes/">Junção de Perturbações</a>
                        <a class="collapse-item" href="../../eliminar/perturbacoes/personalidade/">Perturbações de
                            Person.</a>
                        <a class="collapse-item" href="../../eliminar/juncao-perturbacoes-personalidade/">Junção de
                            Pert. de
                            Person.</a>
                        <a class="collapse-item" href="../../eliminar/10-factos/">10 factos</a>

                        <h6 class="collapse-header">Artigos</h6>
                        <a class="collapse-item" href="../../eliminar/artigos/">Artigos</a>

                        <h6 class="collapse-header">Notícias</h6>
                        <a class="collapse-item" href="../../eliminar/noticias/">Notícias</a>

                        <h6 class="collapse-header">Conteúdo Educativo</h6>
                        <a class="collapse-item" href="../../eliminar/quizzes/">Quizzes</a>
                        <a class="collapse-item" href="../../eliminar/exercicios-mindfulness/">Exercícios
                            Mindfulness</a>
                        <a class="collapse-item" href="../../eliminar/ted-talks/">TED Talks</a>

                        <h6 class="collapse-header">Perguntas Frequentes</h6>
                        <a class="collapse-item" href="../../eliminar/perguntas-frequentes/">Perguntas e respostas</a>
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
                                <img class="img-profile rounded-circle" src="../../../../areacliente/registo/imgs/<?php if (
                                    !empty($row["img_perfil"])
                                ) {
                                    echo $row["img_perfil"];
                                } else {
                                    echo "../../../teste.jpeg";
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

                <!-- Begin Page Content -->
                <div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Inserir perturbações de personalidade</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="container-fluid">

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Perturbações de personalidade</h6>
                            <div class="card-header2">
                            </div>
                        </div>

                        <div class="card-body">

                            <div class="table-responsive">
                                <?php
                                $query = "SELECT * FROM perturbacoes_personalidade";
                                $query_run = mysqli_query($conn, $query);
                                ?>
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Nome</th>
                                            <th>Definição</th>
                                            <th>Texto de sintomas</th>
                                            <th>Texto de prevalências</th>
                                            <th>Texto de ajuda</th>
                                            <th>Fonte</th>
                                            <th>Ação</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if (mysqli_num_rows($query_run) > 0) {
                                            while ($row = mysqli_fetch_assoc($query_run)) {
                                                ?>
                                                <tr>
                                                    <td>
                                                        <?php echo $row['nome']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $row['texto']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $row['sintomas_texto']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $row['prevalencias_texto']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $row['ajuda_texto']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $row['fonte']; ?>
                                                    </td>
                                                    <td>
                                                        <form action="perturbacoes-personalidade.php" method="post">
                                                            <input type="hidden" name="delete_id"
                                                                value="<?php echo $row['perturbacoes_personalidade_id']; ?>">
                                                            <button type="submit" name="delete_btn" class="btn btn-danger">
                                                                Eliminar</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                                <?php
                                            }
                                        } else {
                                            echo "No Record Found";
                                        }
                                        ?>
                                    </tbody>
                                </table>

                            </div>
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
            <script src="../../../vendor/jquery/jquery.min.js"></script>
            <script src="../../../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

            <!-- Core plugin JavaScript-->
            <script src="../../../vendor/jquery-easing/jquery.easing.min.js"></script>

            <!-- Custom scripts for all pages-->
            <script src="../../../js/sb-admin-2.min.js"></script>

</body>

</html>