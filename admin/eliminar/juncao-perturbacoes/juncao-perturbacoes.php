<?php
session_start();
require_once ("../../../conn/conn.php");

if (isset($_POST['delete_btn'])) {
    $perturbacoes_id = $_POST['perturbacoes_id'];
    $grupos_perturbacoes_id = $_POST['grupos_perturbacoes_id'];
    $juncao_perturbacoes_id = $_POST['juncao_perturbacoes_id'];

    // Verificar se existem registros na tabela 'artigos' referenciando 'juncao_perturbacoes_id'
    $check_artigos = "SELECT COUNT(*) as count FROM artigos WHERE juncao_perturbacoes_id = '$juncao_perturbacoes_id'";
    $check_result = mysqli_query($conn, $check_artigos);
    $row = mysqli_fetch_assoc($check_result);
    $artigos_count = $row['count'];

    if ($artigos_count > 0) {
        // Existem registros na tabela 'artigos' referenciando as peças que estão sendo excluídas
        // Você precisa decidir como lidar com esses registros, pode ser excluí-los ou atualizá-los de acordo com sua lógica de negócios

        // Por exemplo, você pode optar por excluí-los
        $delete_artigos = "DELETE FROM artigos WHERE juncao_perturbacoes_id = '$juncao_perturbacoes_id'";
        $delete_artigos_result = mysqli_query($conn, $delete_artigos);

        if (!$delete_artigos_result) {
            $_SESSION['status'] = "Falha ao excluir registros relacionados na tabela 'artigos'";
            $_SESSION['status_code'] = "error";
            header('Location: .');
            exit(); // Encerrar a execução do script
        }
    }

    // Excluir registros na tabela 'conteudo_artigo' que referenciam os artigos que estão sendo excluídos
    $delete_conteudo_artigo = "DELETE FROM conteudo_artigo WHERE artigo_id IN (SELECT artigo_id FROM artigos WHERE juncao_perturbacoes_id = '$juncao_perturbacoes_id')";
    $delete_conteudo_artigo_result = mysqli_query($conn, $delete_conteudo_artigo);

    if (!$delete_conteudo_artigo_result) {
        $_SESSION['status'] = "Falha ao excluir registros relacionados na tabela 'conteudo_artigo'";
        $_SESSION['status_code'] = "error";
        header('Location: .');
        exit(); // Encerrar a execução do script
    }

    // Proceder com a exclusão das peças e suas referências
    $delete_1 = "DELETE FROM perturbacoes WHERE perturbacoes_id = '$perturbacoes_id'";
    $delete_result1 = mysqli_query($conn, $delete_1);

    $delete_2 = "DELETE FROM grupos_perturbacoes WHERE grupos_perturbacoes_id = '$grupos_perturbacoes_id'";
    $delete_result2 = mysqli_query($conn, $delete_2);

    $delete_3 = "DELETE FROM juncao_perturbacoes WHERE juncao_perturbacoes_id = '$juncao_perturbacoes_id'";
    $delete_result3 = mysqli_query($conn, $delete_3);

    if ($delete_result1 && $delete_result2 && $delete_result3) {
        $_SESSION['status'] = "Peça eliminada";
        $_SESSION['status_code'] = "success";
        header('Location: .');
    } else {
        $_SESSION['status'] = "Falha ao excluir peça";
        $_SESSION['status_code'] = "error";
        header('Location: .');
    }
}

?>
