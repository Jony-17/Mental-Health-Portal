<?php
session_start();
require_once ("../../../conn/conn.php");

if(isset($_POST['insertbtn'])) {
    $exercicios_mindfulness_id = $_POST['exercicios_mindfulness_id'];
    $titulo = $_POST['titulo'];
    $img = $_POST['img'];

    // Verificar se os campos necessários estão preenchidos
    if($exercicios_mindfulness_id && $titulo && $img) {
        // Inserir na tabela exercicios_mindfulness
        $query = "INSERT INTO exercicios_mindfulness_ex (exercicios_mindfulness_id, titulo, img) VALUES ('$exercicios_mindfulness_id','$titulo','$img')";
        $query_run = mysqli_query($conn, $query);

        if($query_run) {
            
            if($query_run_ex) {
                $_SESSION['status'] = "Exercícios mindfulness inseridos com sucesso";
                $_SESSION['status_code'] = "success";
                header('Location: index.php');
            } else {
                $_SESSION['status'] = "Erro ao inserir exercícios mindfulness";
                $_SESSION['status_code'] = "error";
                header('Location: index.php');
            }
        } else {
            $_SESSION['status'] = "Erro ao inserir exercícios mindfulness";
            $_SESSION['status_code'] = "error";
            header('Location: index.php');
        }
    } else {
        $_SESSION['status'] = "Não foram inseridos quaisquer exercícios mindfulness";
        $_SESSION['status_code'] = "warning";
        header('Location: index.php');
    }
}

?>