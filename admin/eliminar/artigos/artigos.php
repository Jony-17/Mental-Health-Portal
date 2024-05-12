<?php
session_start();
require_once ("../../../conn/conn.php");

if (isset($_POST['delete_btn'])) {
    $artigo_id = $_POST['delete_id'];

    // Consulta para excluir o conteúdo da notícia
    $delete1 = "DELETE FROM conteudo_artigo WHERE artigo_id = '$artigo_id'";
    $delete1_result = mysqli_query($conn, $delete1);

    // Consulta para excluir a notícia
    $delete2 = "DELETE FROM artigos WHERE artigo_id = '$artigo_id'";
    $delete2_result = mysqli_query($conn, $delete2);

    // Verifica se ambas as consultas foram executadas com sucesso
    if ($delete1_result && $delete2_result) {
        $_SESSION['status'] = "Peça eliminada";
        $_SESSION['status_code'] = "success";
        header('Location: .');
    } else {
        $_SESSION['status'] = "Peça não foi eliminada";
        $_SESSION['status_code'] = "error";
        header('Location: .');
    }
}

?>