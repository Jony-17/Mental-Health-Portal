<?php
session_start();
require_once ("../../../conn/conn.php");

if(isset($_POST['inserirbtn'])) {
    $nome = $_POST['nome'];
    $banner = $_POST['banner'];
    $definicao = $_POST['definicao'];

    // Verificar se os campos necessários estão preenchidos
    if($nome && $banner && $definicao) {
        // Inserir na tabela exercicios_mindfulness
        $query = "INSERT INTO exercicios_mindfulness (nome, banner, definicao) VALUES ('$nome','$banner','$definicao')";
        $query_run = mysqli_query($conn, $query);

        if($query_run) {
            
            if($query_run_ex) {
                $_SESSION['status'] = "Exercícios mindfulness inseridos com sucesso";
                $_SESSION['status_code'] = "success";
                header('Location: .');
            } else {
                $_SESSION['status'] = "Erro ao inserir exercícios mindfulness";
                $_SESSION['status_code'] = "error";
                header('Location: .');
            }
        } else {
            $_SESSION['status'] = "Erro ao inserir exercícios mindfulness";
            $_SESSION['status_code'] = "error";
            header('Location: .');
        }
    } else {
        $_SESSION['status'] = "Não foram inseridos quaisquer exercícios mindfulness";
        $_SESSION['status_code'] = "warning";
        header('Location: .');
    }
}

?>