<?php
session_start();
require_once ("../../../../conn/conn.php");

if (isset($_POST['inserirbtn'])) {
    $nome = $_POST['nome'];
    $texto = $_POST['texto'];
    $sintomas_texto = $_POST['sintomas_texto'];
    $prevalencias_texto = $_POST['prevalencias_texto'];
    $ajuda_texto = $_POST['ajuda_texto'];
    $fonte = $_POST['fonte'];

    if (isset($_POST['perturbacoes_personalidade_id']))
        $perturbacoes_personalidade_id = $_POST['perturbacoes_personalidade_id'];

    $query = "UPDATE perturbacoes_personalidade SET nome = '$nome', texto = '$texto', sintomas_texto = '$sintomas_texto', prevalencias_texto = '$prevalencias_texto', ajuda_texto = '$ajuda_texto', fonte = '$fonte' WHERE perturbacoes_personalidade_id = $perturbacoes_personalidade_id";

    $query_run = mysqli_query($conn, $query);

    if ($query_run) {
        $_SESSION['status'] = "Pergunta e resposta atualizadas com sucesso";
        $_SESSION['status_code'] = "success";
        header('Location: .');
    } else {
        $_SESSION['status'] = "Erro ao atualizar pergunta e resposta";
        $_SESSION['status_code'] = "error";
        header('Location: .');
    }
}

?>