<?php
session_start();
require_once ("../../../conn/conn.php");

if (isset($_POST['inserirbtn'])) {
    $perturbacao = $_POST['perturbacao'];
    $grupos_perturbacoes = $_POST['grupos_perturbacoes'];

    if ($perturbacao && $grupos_perturbacoes) {
        $query = "INSERT INTO juncao_perturbacoes (perturbacoes_id,grupos_perturbacoes_id) VALUES ('$perturbacao','$grupos_perturbacoes')";
        $query_run = mysqli_query($conn, $query);

        if ($query_run) {
            // echo "Saved";
            $_SESSION['status'] = "Grupo de perturbações inserida com sucesso";
            $_SESSION['status_code'] = "success";
            header('Location: .');
        } else {
            $_SESSION['status'] = "Admin Profile Not Added";
            $_SESSION['status_code'] = "error";
            header('Location: .');
        }
    } else {
        $_SESSION['status'] = "Não foi inserido qualquer grupo de perturbações";
        $_SESSION['status_code'] = "warning";
        header('Location: .');
    }
}

?>