<?php
session_start();
require_once("../../conn/conn.php");

// Verifica se a sessão do usuário está definida
if (isset($_SESSION['id_utilizador'])) {
    // Recupera o ID do utilizador da sessão
    $utilizador_id = $_SESSION['id_utilizador'];

    // Obtém os resultados do quiz enviados pelo JavaScript
    $data = json_decode(file_get_contents('php://input'), true);
    $result = $data['result'];

    $quiz_empatia_id = 1; // Você precisa fornecer o ID correto aqui
    $quiz_preocupacao_id = null; // Define como NULL, já que não queremos inserir um ID de quiz de preocupação
    $quiz_energia_id = null; // Define como NULL, já que não queremos inserir um ID de quiz de preocupação
    $quiz_emocao_id = null; // Define como NULL, já que não queremos inserir um ID de quiz de preocupação

    // Insere os resultados do quiz no banco de dados, incluindo apenas o quiz_empatia_id
    $query = "INSERT INTO quizzes (utilizador_id, quiz_empatia_id, quiz_preocupacao_id, quiz_energia_id, quiz_emocao_id) VALUES ('$utilizador_id', '$quiz_empatia_id', NULL, NULL, NULL)";

    $result = mysqli_query($conn, $query);

    if ($result) {
        echo "Resultados do quiz inseridos com sucesso.";
    } else {
        echo "Erro ao inserir os resultados do quiz: " . mysqli_error($conn);
    }
} else {
    echo "Sessão do utilizador não está definida.";
}
?>
