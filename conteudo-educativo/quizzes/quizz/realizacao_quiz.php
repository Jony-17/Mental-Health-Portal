<?php
// Inicia a sessão
session_start();

// Verifica se a sessão do utilizador está definida
if (isset($_SESSION['id_utilizador'])) {
    require_once ("../../../conn/conn.php");

    // Recupera o ID do utilizador da sessão
    $utilizador_id = $_SESSION['id_utilizador'];

    // Verifica se foi recebido o quiz_nome_id via POST
    if (isset($_GET['quiz_nome_id'])) {
        $quiz_nome_id = $_GET['quiz_nome_id'];
        echo "Quiz Nome ID Recebido: " . $quiz_nome_id;

        // Prepara e executa a consulta SQL
        $query_insert = "INSERT INTO quizzes (utilizador_id, quiz_nome_id) VALUES (?, ?)";
        $stmt = $conn->prepare($query_insert);
        $stmt->bind_param("ii", $utilizador_id, $quiz_nome_id);

        if ($stmt->execute()) {
            echo "Dados inseridos com sucesso!";
        } else {
            echo "Erro ao inserir dados: " . $stmt->error;
        }

        // Fecha a declaração
        $stmt->close();
    } else {
        // Se quiz_nome_id não foi recebido via GET, retorna uma mensagem de erro
        echo "Erro: quiz_nome_id não foi recebido via GET";
    }

    $conn->close();
} else {
    // Se a sessão do usuário não estiver definida, retorna uma mensagem de erro
    echo "Erro: Sessão do usuário não está definida";
}
?>