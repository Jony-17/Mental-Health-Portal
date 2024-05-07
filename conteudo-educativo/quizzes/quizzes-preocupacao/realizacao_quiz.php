<?php
session_start();
require_once ("../../../conn/conn.php");

// Verifica se a sessão do usuário está definida
if (isset($_SESSION['id_utilizador'])) {
    // Recupera o ID do utilizador da sessão
    $utilizador_id = $_SESSION['id_utilizador'];

    // Obtém os resultados do quiz enviados pelo JavaScript
    $data = json_decode(file_get_contents('php://input'), true);
    $respostas = $data['respostas'];

    // Insere os resultados do quiz no banco de dados
    $query = "INSERT INTO quizzes (utilizador_id, quiz_nome_id) VALUES ('$utilizador_id', '2')";
    $result = mysqli_query($conn, $query);

    if ($result) {
        // Registrar respostas individuais
        foreach ($respostas as $pergunta_id => $resposta) {
            $pergunta_id = $resposta['questao'];
            $resposta_a = $resposta['opcao_a'];
            $resposta_b = $resposta['opcao_b'];

            // Registrar resposta na tabela de respostas
            $sql = "INSERT INTO quiz_questoes (questao, opcao_a, opcao_b) VALUES (?, ?, ?)";
            $stmt = mysqli_prepare($conn, $sql);
            $stmt->bind_param('iiii', $pergunta_id, $resposta_a, $resposta_b, $resposta_correta);
            $stmt->execute();

            if ($stmt->affected_rows > 0) {
                echo "Resposta registrada com sucesso.";
            } else {
                echo "Erro ao registrar resposta: " . mysqli_error($conn);
            }
        }

        // Fechar conexões
        $stmt->close();
        $db->close();

    } else {
        echo "Erro ao inserir os resultados do quiz: " . mysqli_error($conn);
    }
} else {
    echo "Sessão do utilizador não está definida.";
}
?>