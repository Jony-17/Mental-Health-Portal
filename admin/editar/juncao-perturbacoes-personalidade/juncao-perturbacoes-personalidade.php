<?php
session_start();
require_once ("../../../conn/conn.php");

if (isset($_POST['inserirbtn'])) {
    $nome_perturbacao = $_POST['nome_perturbacao'];
    $nome_grupo = $_POST['nome_grupo'];
    $nome_grupo_assoc_perturbacao = $_POST['nome_grupo_assoc_perturbacao'];

    if (isset($_POST['juncao_pert_pers_id']))
        $juncao_pert_pers_id = $_POST['juncao_pert_pers_id'];
        
        $query = "UPDATE juncao_pert_personalidade SET perturbacoes_personalidade_id = '$nome_grupo_assoc_perturbacao', perturbacoes_id='$nome_perturbacao', grupos_perturbacoes_id='$nome_grupo' WHERE juncao_pert_pers_id='$juncao_pert_pers_id'";
        
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
