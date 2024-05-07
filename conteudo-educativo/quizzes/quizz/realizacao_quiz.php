<?php
session_start();
require_once ("../../conn/conn.php");

// Verifica se a sessão do usuário está definida
if (isset($_SESSION['id_utilizador'])) {
    // Recupera o ID do utilizador da sessão
    $utilizador_id = $_SESSION['id_utilizador'];

    $data = json_decode(file_get_contents("php://input"), true);
    $answers = $data['answers'];

    // Consulta para obter as respostas correspondentes às perguntas respondidas
    $responses = [];
    foreach ($answers as $answer) {
        $query = "SELECT respostas FROM quiz_respostas WHERE quiz_nome_id = $quiz_nome_id";
        $result = $conn->query($query);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $responses[] = $row['resposta'];
        }
    }

    // Aqui você pode calcular o resultado com base nas respostas obtidas
    // Exemplo de cálculo do resultado
    $result = "";
    foreach ($responses as $response) {
        $result .= $response . ", ";
    }

    // Remove a vírgula extra no final
    $result = rtrim($result, ", ");

    // Aqui você pode enviar o resultado de volta para o front-end ou fazer o que desejar com ele
    echo $result;

    // Feche a conexão com o banco de dados
    $conn->close();
}
?>