<?php
session_start();
require_once ("../../../conn/conn.php");

if (isset($_POST['inserirbtn'])) {
    $pergunta = $_POST['pergunta'];
    $resposta = $_POST['resposta'];

    if (isset($_POST['perguntas_id']))
        $perguntas_id = $_POST['perguntas_id'];

    $query = "UPDATE perguntas SET pergunta = '$pergunta', resposta = '$resposta' WHERE perguntas_id = $perguntas_id";

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