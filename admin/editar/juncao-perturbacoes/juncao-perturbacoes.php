<?php
session_start();
require_once ("../../../conn/conn.php");

if (isset($_POST['inserirbtn'])) {
    $nome_perturbacao = $_POST['nome_perturbacao'];
    $nome_grupo = $_POST['nome_grupo'];

    if (isset($_POST['juncao_perturbacoes_id']))
        $juncao_perturbacoes_id = $_POST['juncao_perturbacoes_id'];
        
        $query = "UPDATE juncao_perturbacoes SET perturbacoes_id='$nome_perturbacao', grupos_perturbacoes_id='$nome_grupo' WHERE juncao_perturbacoes_id='$juncao_perturbacoes_id'";
        
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
