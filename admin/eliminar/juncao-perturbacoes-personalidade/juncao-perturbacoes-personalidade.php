<?php
session_start();
require_once("../../../conn/conn.php");

if (isset($_POST['delete_btn'])) {
    $juncao_pert_pers_id = $_POST['delete_id']; // Verifique se o nome do campo corresponde ao valor passado no formulário

    // Excluir os registros da tabela juncao_pert_personalidade
    $query_excluir_juncao = "DELETE FROM juncao_pert_personalidade WHERE juncao_pert_pers_id = '$juncao_pert_pers_id'";
    $query_run = mysqli_query($conn, $query_excluir_juncao);

    if ($query_run) {
        $_SESSION['status'] = "Registros de perturbações excluídos com sucesso";
        $_SESSION['status_code'] = "success";
        header('Location: .');
        exit();
    } else {
        $_SESSION['status'] = "Erro ao excluir registros de perturbações";
        $_SESSION['status_code'] = "error";
        header('Location: .');
        exit();
    }
}
?>
