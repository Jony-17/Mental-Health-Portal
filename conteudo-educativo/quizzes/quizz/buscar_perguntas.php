<?php
session_start();
require_once ("../../../conn/conn.php");

if (isset($_GET['quiz_nome_id'])) {
    // Obtém o valor do parâmetro
    $quiz_nome_id = $_GET['quiz_nome_id'];

    // Consulta SQL para obter as perguntas do quiz com o ID especificado
    $query = "SELECT quiz_questoes_id, questao, opcao_a, opcao_b FROM quiz_questoes WHERE quiz_nome_id = $quiz_nome_id";
    $result = mysqli_query($conn, $query);

    // Verifica se há resultados
    if (mysqli_num_rows($result) > 0) {
        // Array para armazenar os dados das perguntas
        $quizData = array();

        // Itera sobre os resultados e adiciona cada pergunta ao array
        while ($row = mysqli_fetch_assoc($result)) {
            $quizData[] = $row;
        }

        // Retorna os dados como JSON
        echo json_encode($quizData);
    } else {
        // Se não houver perguntas encontradas, retorna uma mensagem de erro
        echo json_encode(array('error' => 'Nenhuma pergunta encontrada para o ID especificado.'));
    }
} else {
    // Se o parâmetro quiz_nome_id não foi enviado, retorna uma mensagem de erro
    echo json_encode(array('error' => 'O parâmetro quiz_nome_id não foi especificado.'));
}
?>