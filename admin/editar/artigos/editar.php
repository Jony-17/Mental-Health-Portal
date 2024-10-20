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
                        <h6 class="collapse-header">Perturbações Mentais</h6>
                        <a class="collapse-item" href="../perturbacoes/">Perturbações</a>
                        <a class="collapse-item" href="../grupos-perturbacoes/">Grupo de Perturbações</a>
                        <a class="collapse-item" href="../juncao-perturbacoes/">Junção de Perturbações</a>
                        <a class="collapse-item" href="../perturbacoes/personalidade/">Perturbações de Person.</a>
                        <a class="collapse-item" href="../juncao-perturbacoes-personalidade/">Junção de Pert. de
                            Person.</a>
                        <a class="collapse-item" href="../10-factos/">10 factos</a>

                        <h6 class="collapse-header">Artigos</h6>
                        <a class="collapse-item" href="../artigos/">Artigos</a>

                        <h6 class="collapse-header">Notícias</h6>
                        <a class="collapse-item" href="../noticias/">Notícias</a>

                        <h6 class="collapse-header">Conteúdo Educativo</h6>
                        <a class="collapse-item" href="../quizzes/">Quizzes</a>
                        <a class="collapse-item" href="../exercicios-mindfulness/">Exercícios Mindfulness</a>
                        <a class="collapse-item" href="">TED Talks</a>

                        <h6 class="collapse-header">Perguntas Frequentes</h6>
                        <a class="collapse-item" href="../perguntas-frequentes/">Perguntas e respostas</a>
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
                        <a class="collapse-item" href="../../editar/perturbacoes/">Perturbações</a>
                        <a class="collapse-item" href="../../editar/grupos-perturbacoes/">Grupo de Perturbações</a>
                        <a class="collapse-item" href="../../editar/juncao-perturbacoes/">Junção de Perturbações</a>
                        <a class="collapse-item" href="../../editar/perturbacoes/personalidade/">Perturbações de
                            Person.</a>
                        <a class="collapse-item" href="../../editar/juncao-perturbacoes-personalidade/">Junção de Pert.
                            de
                            Person.</a>
                        <a class="collapse-item" href="../../editar/10-factos/">10 factos</a>

                        <h6 class="collapse-header">Artigos</h6>
                        <a class="collapse-item" href="../../editar/artigos/">Artigos</a>

                        <h6 class="collapse-header">Notícias</h6>
                        <a class="collapse-item" href="../../editar/noticias/">Notícias</a>

                        <h6 class="collapse-header">Conteúdo Educativo</h6>
                        <a class="collapse-item" href="../../editar/quizzes/">Quizzes</a>
                        <a class="collapse-item" href="../../editar/exercicios-mindfulness/">Exercícios Mindfulness</a>
                        <a class="collapse-item" href="">TED Talks</a>

                        <h6 class="collapse-header">Perguntas Frequentes</h6>
                        <a class="collapse-item" href="../../editar/perguntas-frequentes/">Perguntas e respostas</a>
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
                        <a class="collapse-item" href="">TED Talks</a>

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
                            <h6 class="m-0 font-weight-bold text-primary">Artigos
                            </h6>
                        </div>

                        <div class="card-body">
                            <?php

                            if (isset($_POST['edit_btn'])) {
                                $artigo_id = $_POST['edit_id'];

                                $query = "SELECT 
                                            artigos.*, 
                                            perturbacoes.nome AS perturbacao, 
                                            grupos_perturbacoes.nome AS grupo_perturbacao, 
                                            GROUP_CONCAT(conteudo_artigo.ponto SEPARATOR '--- ') AS ponto,
                                            GROUP_CONCAT(conteudo_artigo.texto SEPARATOR '--- ') AS texto
                                          FROM 
                                            artigos
                                          JOIN 
                                            juncao_perturbacoes ON artigos.juncao_perturbacoes_id = juncao_perturbacoes.juncao_perturbacoes_id
                                          JOIN 
                                            perturbacoes ON juncao_perturbacoes.perturbacoes_id = perturbacoes.perturbacoes_id
                                          JOIN 
                                            grupos_perturbacoes ON juncao_perturbacoes.grupos_perturbacoes_id = grupos_perturbacoes.grupos_perturbacoes_id
                                          LEFT JOIN 
                                            conteudo_artigo ON artigos.artigo_id = conteudo_artigo.artigo_id
                                          WHERE
                                            artigos.artigo_id='$artigo_id'
                                          GROUP BY
                                            artigos.artigo_id";

                                $query_run = mysqli_query($conn, $query);

                                if (mysqli_num_rows($query_run) > 0) {
                                    $row = mysqli_fetch_assoc($query_run);
                                    ?>
                                    <form action="artigos.php" method="post" enctype="multipart/form-data">
                                        <input type="hidden" name="artigo_id" value="<?php echo $row['artigo_id'] ?>">

                                        <div class="form-group">
                                            <label>Título</label>
                                            <input type="text" name="titulo" value="<?php echo $row['titulo'] ?>"
                                                class="form-control" placeholder="Editar título">
                                        </div>

                                        <div class="form-group">
                                            <label>Data da publicação</label>
                                            <input type="text" name="data_publicacao"
                                                value="<?php echo $row['data_publicacao'] ?>" class="form-control"
                                                placeholder="Editar data da publicação">
                                        </div>

                                        <div class="form-group">
                                            <label>Autor</label>
                                            <input type="text" name="autor" value="<?php echo $row['autor'] ?>"
                                                class="form-control" placeholder="Editar autor">
                                        </div>

                                        <div class="form-group">
                                            <label>Imagem atual</label><br>
                                            <?php if (!empty($row['img_artigo'])): ?>
                                                <img src="../../inserir/imgs/artigos/<?php echo $row['img_artigo']; ?>"
                                                    alt="Imagem atual" style="max-width: 200px; max-height: 200px;">
                                            <?php else: ?>
                                                <span>Nenhuma imagem disponível.</span>
                                            <?php endif; ?>
                                        </div>

                                        <div class="form-group">
                                            <label>Nova imagem</label>
                                            <input type="file" name="imagem" class="form-control">
                                        </div>

                                        <div class="form-group">
                                            <label>Perturbação</label>
                                            <select name="perturbacao" class="form-control">
                                                <?php
                                                $query_perturbacoes = "SELECT perturbacoes_id, nome FROM perturbacoes";
                                                $result_perturbacoes = mysqli_query($conn, $query_perturbacoes);

                                                while ($row_perturbacao = mysqli_fetch_assoc($result_perturbacoes)): ?>
                                                    <option value="<?php echo $row_perturbacao['nome']; ?>" <?php if ($row_perturbacao['nome'] == $row['perturbacao'])
                                                           echo 'selected'; ?>>
                                                        <?php echo $row_perturbacao['nome']; ?>
                                                    </option>
                                                <?php endwhile; ?>
                                            </select>
                                        </div>

                                        <div class="form-group">
                                            <label>Grupo de Perturbação</label>
                                            <select name="grupo_perturbacao" class="form-control">
                                                <?php
                                                $query_grupos_perturbacoes = "SELECT grupos_perturbacoes_id, nome FROM grupos_perturbacoes";
                                                $result_grupos_perturbacoes = mysqli_query($conn, $query_grupos_perturbacoes);

                                                while ($row_grupo = mysqli_fetch_assoc($result_grupos_perturbacoes)): ?>
                                                    <option value="<?php echo $row_grupo['nome']; ?>" <?php if ($row_grupo['nome'] == $row['grupo_perturbacao'])
                                                           echo 'selected'; ?>>
                                                        <?php echo $row_grupo['nome']; ?>
                                                    </option>
                                                <?php endwhile; ?>
                                            </select>
                                        </div>

                                        
                                        <?php
                                        $pontos = explode('---', $row['ponto']);
                                        $textos = explode('---', $row['texto']);
                                        foreach ($pontos as $index => $ponto) {
                                            ?>
                                            <div class="form-group">
                                                <label>Ponto <?php echo $index + 1 ?></label>
                                                <input type="text" name="ponto[]" value="<?php echo $ponto ?>"
                                                    class="form-control ponto-dinamico">
                                            </div>
                                            <div class="form-group">
                                                <label>Texto do ponto <?php echo $index + 1 ?></label>
                                                <input type="text" name="texto[]" value="<?php echo $textos[$index] ?>"
                                                    class="form-control texto-dinamico">
                                            </div>
                                        <?php } ?>

                                        <div class="form-group">
                                            <label>Fonte</label>
                                            <input type="text" name="fonte" value="<?php echo $row['fonte'] ?>"
                                                class="form-control" placeholder="Editar fonte">
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
                <script>
                    const btnAddPonto = document.querySelector('.btn-add-ponto');
                    const btnAddTexto = document.querySelector('.btn-add-texto');
                    let pontoCount = 1; // Começa em 1
                    let textoCount = 1; // Começa em 1

                    btnAddPonto.addEventListener('click', function () {
                        const pontoGroup = this.closest('.form-group');
                        const newPontoGroup = pontoGroup.cloneNode(true);
                        pontoCount++; // Incrementar após a clonagem

                        // Atualizar o identificador, nome e rótulo do campo
                        const newInput = newPontoGroup.querySelector('.ponto-dinamico');
                        newInput.name = `ponto[${pontoCount}]`;
                        newInput.value = ''; // Limpar o valor do campo clonado
                        const newLabel = newPontoGroup.querySelector('label');
                        newLabel.textContent = `Ponto ${pontoCount}`; // Atualizar o rótulo

                        pontoGroup.parentNode.insertBefore(newPontoGroup, pontoGroup.nextSibling);
                    });

                    btnAddTexto.addEventListener('click', function () {
                        const textoGroup = this.closest('.form-group');
                        const newTextoGroup = textoGroup.cloneNode(true);
                        textoCount++; // Incrementar após a clonagem

                        // Atualizar o identificador, nome e rótulo do campo
                        const newInput = newTextoGroup.querySelector('.texto-dinamico');
                        newInput.name = `texto[${textoCount}]`;
                        newInput.value = ''; // Limpar o valor do campo clonado
                        const newLabel = newTextoGroup.querySelector('label');
                        newLabel.textContent = `Texto do ponto ${textoCount}`; // Atualizar o rótulo

                        textoGroup.parentNode.insertBefore(newTextoGroup, textoGroup.nextSibling);
                    });

                </script>

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