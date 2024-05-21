<?php
session_start();
require_once ("../../../conn/conn.php");

if (isset($_POST['inserirbtn'])) {
    $perturbacoes_id = $_POST['perturbacoes_id'];
    //$perturbacao = $_POST['perturbacoes'];
    $nº = $_POST['nº'];
    $facto = $_POST['facto'];
    $descricao = $_POST['descricao'];
    $fonte = $_POST['fonte'];

    if (isset($_POST['factos_id']))
        $factos_id = $_POST['factos_id'];

    $query = "UPDATE factos_10 SET perturbacoes_id = '$perturbacoes_id', nº = '$nº', factos = '$facto', descricao = '$descricao', fonte = '$fonte' WHERE 10_factos_id = $factos_id";

    $query_run = mysqli_query($conn, $query);

    if ($query_run) {
        $_SESSION['status'] = "Factos atualizados com sucesso";
        $_SESSION['status_code'] = "success";
        header('Location: .');
    } else {
        $_SESSION['status'] = "Erro ao atualizar factos";
        $_SESSION['status_code'] = "error";
        header('Location: .');
    }
}

?>