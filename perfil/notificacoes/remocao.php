<?php
session_start();
require_once ('../../conn/conn.php');

// Define a zona de tempo para Portugal
date_default_timezone_set('Europe/Lisbon');

// Verifica se a sessão do usuário está definida
if (isset($_SESSION['id_utilizador'])) {
    // Obtém o ID do usuário da sessão
    $utilizador_id = $_SESSION['id_utilizador'];
    echo "<script>console.log('ID: $utilizador_id');</script>";

    // Consulta SQL para buscar o campo img_perfil
    $query = "SELECT nome, email, password, img_perfil FROM utilizadores WHERE utilizador_id = $utilizador_id";

    $result = mysqli_query($conn, $query);

    if ($result) {
        // Extrair o resultado da consulta
        $row = mysqli_fetch_assoc($result);

        // Exibir o valor da sessão
        //var_dump($_SESSION['id_utilizador']);
    } else {
        echo "Erro na consulta SQL: " . mysqli_error($conn);
    }

    if (isset($_POST['delete_btn'])) {
        // Verifique se o lembrete_id foi enviado corretamente
        if(isset($_POST['lembrete_id'])) {
            // Sanitizar o lembrete_id
            $lembrete_id = mysqli_real_escape_string($conn, $_POST['lembrete_id']);

            // Consulta SQL para excluir o lembrete
            $query_delete = "DELETE FROM lembrete WHERE lembrete_id = '$lembrete_id'";

            // Executar a consulta
            $result_delete = mysqli_query($conn, $query_delete);

            if ($result_delete) {
                echo '<script>console.log("Lembrete excluído com sucesso.");</script>';
                $_SESSION['status'] = "Lembrete excluído com sucesso.";
                $_SESSION['status_code'] = "success";
            } else {
                echo '<script>console.error("Erro ao excluir lembrete: ' . mysqli_error($conn) . '");</script>';
                $_SESSION['status'] = "Erro ao excluir lembrete.";
                $_SESSION['status_code'] = "error";
            }
        } else {
            echo '<script>console.error("ID do lembrete não fornecido.");</script>';
            $_SESSION['status'] = "ID do lembrete não fornecido.";
            $_SESSION['status_code'] = "error";
        }

        // Redirecionar de volta para a página onde o formulário foi submetido
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit();
    }
}
?>
