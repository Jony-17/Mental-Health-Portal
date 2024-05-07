<?php
session_start();
require_once ("../../../conn/conn.php");

// Verifica se a sessão do usuário está definida e se o parâmetro quiz_nome_id está presente
if (isset($_SESSION['id_utilizador']) && isset($_GET['quiz_nome_id'])) {
    // Recupera o ID do usuário da sessão
    $utilizador_id = $_SESSION['id_utilizador'];
    // Recupera o ID do quiz fornecido via parâmetro GET e verifica se é um número inteiro
    $quiz_nome_id = isset($_GET['quiz_nome_id']) ? intval($_GET['quiz_nome_id']) : 0;

    // Verifica se o ID do quiz é válido
    if ($quiz_nome_id <= 0) {
        echo json_encode(array('error' => 'ID do quiz inválido.'));
        exit;
    }

    // Consulta para obter as perguntas e respostas específicas do quiz
    $query = "SELECT * FROM quiz_questoes WHERE quiz_nome_id = $quiz_nome_id"; // Ajuste a consulta conforme necessário
    $result = mysqli_query($conn, $query);

    // Verificar se a consulta foi bem-sucedida
    if ($result) {
        $quizData = array();

        // Loop através dos resultados e construir o array de dados do quiz
        while ($row = mysqli_fetch_assoc($result)) {
            $questionData = array(
                'question' => $row['questao'],
                'a' => $row['opcao_a'],
                'b' => $row['opcao_b']
            );
            $quizData[] = $questionData;
        }

        // Definir o cabeçalho como JSON
        header('Content-Type: application/json');
        // Retornar os dados do quiz no formato JSON
        echo json_encode($quizData);
    } else {
        echo json_encode(array('error' => 'Erro ao carregar dados do quiz: ' . mysqli_error($conn)));
    }

    // Fechar conexão com o banco de dados
    mysqli_close($conn);
} else {
    // Se a sessão do usuário não estiver definida ou se o parâmetro quiz_nome_id estiver ausente, retornar um erro
    echo json_encode(array('error' => 'Sessão do usuário não definida ou parâmetro quiz_nome_id ausente.'));
}
?>
