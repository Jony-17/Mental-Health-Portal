<?php
session_start();
require_once ("../../conn/conn.php");

if (isset($_POST['editarbtn'])) {
    $pensamento = $_POST['pensamento'];
    $comportamento = $_POST['comportamento'];
    $sentimentos = $_POST['sentimentos'];
    $quando = $_POST['quando'];
    $pensamento_alternativo = $_POST['pensamento_alternativo'];
    $comportamento_alternativo = $_POST['comportamento_alternativo'];

    if (isset($_POST['registos_id']))
        $registos_id = $_POST['registos_id'];

    $query = "UPDATE registos SET pensamento = '$pensamento', comportamento = '$comportamento', sentimentos = '$sentimentos', quando = '$quando', pensamento_alternativo = '$pensamento_alternativo', comportamento_alternativo = '$comportamento_alternativo' WHERE registos_id = $registos_id";

    $query_run = mysqli_query($conn, $query);

    if ($query_run) {
        $_SESSION['status'] = "Registos atualizados com sucesso";
        $_SESSION['status_code'] = "success";
        header('Location: .');
    } else {
        $_SESSION['status'] = "Erro ao atualizar Registos   ";
        $_SESSION['status_code'] = "error";
        header('Location: .');
    }
}

?>