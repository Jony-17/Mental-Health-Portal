<?php
session_start();
require_once ("../../../conn/conn.php");

if (isset($_POST['inserirbtn'])) {
    $nome_perturbacao = $_POST['nome_perturbacao'];
    $grupo_perturbacao = $_POST['grupo_perturbacao'];
    $grupos_assoc_perturbacao = $_POST['grupos_assoc_perturbacao'];

    if ($nome_perturbacao && $grupo_perturbacao && $grupos_assoc_perturbacao) {
        $query = "INSERT INTO juncao_pert_personalidade (perturbacoes_id,grupos_perturbacoes_id,perturbacoes_personalidade_id) VALUES (6,'$grupo_perturbacao','$grupos_assoc_perturbacao')";
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