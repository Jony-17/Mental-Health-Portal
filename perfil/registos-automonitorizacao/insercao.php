<?php
session_start();
require_once ('../../conn/conn.php');

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



    if (isset($_POST['inserirbtn'])) {
        $Pensamento = $_POST['Pensamento'];
        $Comportamento = $_POST['Comportamento'];
        $Sentimentos = $_POST['Sentimentos'];
        $Quando = $_POST['Quando'];
        $Pensamento_Alternativo = $_POST['Pensamento_Alternativo'];
        $Comportamento_Alternativo = $_POST['Comportamento_Alternativo'];

        $nome_query = "SELECT * FROM registos WHERE pensamento='$Pensamento' AND comportamento='$Comportamento'
                       AND sentimentos='$Sentimentos' AND quando='$Quando' AND pensamento_alternativo='$Pensamento_Alternativo' AND comportamento_alternativo='$Comportamento_Alternativo'";
        $nome_query_run = mysqli_query($conn, $nome_query);
        if (!empty($Pensamento) && !empty($Comportamento)) {
            $query = "INSERT INTO registos (utilizador_id, pensamento, comportamento, sentimentos, quando, pensamento_alternativo, comportamento_alternativo) VALUES ('$utilizador_id', '$Pensamento','$Comportamento', '$Sentimentos', '$Quando', '$Pensamento_Alternativo', '$Comportamento_Alternativo')";
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