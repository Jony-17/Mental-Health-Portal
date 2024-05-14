<?php
session_start();
require_once ("../../../conn/conn.php");

if (isset($_POST['inserirbtn'])) {
    $nome = $_POST['nome'];
    $texto = $_POST['texto'];
    $sintomas_texto = $_POST['sintomas_texto'];
    $prevalencias_texto = $_POST['prevalencias_texto'];
    $ajuda_texto = $_POST['ajuda_texto'];

    if (isset($_POST['grupos_perturbacoes_id']))
        $grupos_perturbacoes_id = $_POST['grupos_perturbacoes_id'];

    $query = "UPDATE grupos_perturbacoes SET nome = '$nome', texto = '$texto', sintomas_texto = '$sintomas_texto', prevalencias_texto = '$prevalencias_texto', ajuda_texto = '$ajuda_texto' WHERE grupos_perturbacoes_id = $grupos_perturbacoes_id";

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