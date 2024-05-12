<?php
session_start();
require_once("../../../conn/conn.php");

if (isset($_POST['delete_btn'])) {
    $quiz_nome_id = $_POST['delete_id'];

    // Excluir respostas da tabela quiz_respostas
    $delete1 = "DELETE FROM quiz_respostas WHERE quiz_nome_id = '$quiz_nome_id'";
    $delete1_result = mysqli_query($conn, $delete1);

    // Excluir questões da tabela quiz_questoes
    $delete2 = "DELETE FROM quiz_questoes WHERE quiz_nome_id = '$quiz_nome_id'";
    $delete2_result = mysqli_query($conn, $delete2);

    // Excluir o quiz da tabela quiz_nome
    $delete3 = "DELETE FROM quiz_nome WHERE quiz_nome_id = '$quiz_nome_id'";
    $delete3_result = mysqli_query($conn, $delete3);

    if ($delete1_result && $delete2_result && $delete3_result) {
        $_SESSION['status'] = "Quiz excluído com sucesso";
        $_SESSION['status_code'] = "success";
        header('Location: .');
        exit();
    } else {
        $_SESSION['status'] = "Erro ao excluir quiz";
        $_SESSION['status_code'] = "error";
        header('Location: .');
        exit();
    }
}
?>
