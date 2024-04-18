<?php
session_start();
require_once ('../../../conn/conn.php');

// Verifica se a sessão do usuário está definida
if (isset($_SESSION['id_utilizador'])) {
    // Obtém o ID do usuário da sessão
    $utilizador_id = $_SESSION['id_utilizador'];
    echo "<script>console.log('ID: $utilizador_id');</script>";

    // Consulta SQL para buscar o campo img_perfil
    $query = "SELECT nome, email, password, img_perfil FROM utilizadores WHERE utilizador_id = $utilizador_id";
    echo "<script>console.log('ID: $query');</script>";
    $result = mysqli_query($conn, $query);

    if ($result) {
        // Extrair o resultado da consulta
        $row = mysqli_fetch_assoc($result);

        // Exibir o valor da sessão
        //var_dump($_SESSION['id_utilizador']);
    } else {
        echo "Erro na consulta SQL: " . mysqli_error($conn);
    }
    


    if (isset($_POST['inserirbtn'])) {
        $data = $_POST['data'];
        $horario = $_POST['horario'];
        $mensagem = $_POST['mensagem'];

        $data_formatada = date('Y-m-d', strtotime($data));

        if (!empty($horario) && !empty($mensagem)) {
            $query = "INSERT INTO lembrete (data, horario, mensagem) VALUES ('$data_formatada','$horario', '$mensagem')";
            $query_run = mysqli_query($conn, $query);

            if ($query_run) {
                echo '<script>console.log("Foram inseridos");</script>';
                $_SESSION['status'] = "Dados inseridos com sucesso";
                $_SESSION['status_code'] = "success";
                header('Location: .');
            } else {
                echo '<script>console.log("Erro ao executar consulta SQL: ' . mysqli_error($conn) . '");</script>';
            }
        } else {
            $_SESSION['status'] = "Não foi inserido nenhum dado";
            $_SESSION['status_code'] = "warning";
            header('Location: .');
        }
    }
}
?>