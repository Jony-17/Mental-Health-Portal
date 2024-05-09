<?php
session_start();
require_once ("../../../conn/conn.php");

if (isset($_GET['quiz_nome_id']) && isset($_GET['simCount'])) {
    $quiz_nome_id = $_GET['quiz_nome_id'];
    $simCount = $_GET['simCount'];

    // Consultar a base de dados para obter as respostas com base no quiz_nome_id e no simCount
    $query = "SELECT r.respostas
    FROM (
        SELECT 
            CASE 
                WHEN ? BETWEEN 1 AND 2 THEN 1
                ELSE 2
            END AS qtd_value
    ) AS subquery
    JOIN quiz_respostas r ON subquery.qtd_value = r.qtd AND r.quiz_nome_id = ?;
    ";


    // Preparar a declaração
    $stmt = mysqli_prepare($conn, $query);

    // Vincular os parâmetros
    mysqli_stmt_bind_param($stmt, "ii", $simCount, $quiz_nome_id);

    // Executar a consulta
    mysqli_stmt_execute($stmt);

    // Obter resultados
    $result = mysqli_stmt_get_result($stmt);


    // Verificar se há resultados
    if (mysqli_num_rows($result) > 0) {
        // Construir um array com as respostas
        $respostas = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $respostas[] = $row['respostas'];
        }

        // Retornar as respostas em formato JSON
        echo json_encode($respostas);
    } else {
        echo "Nenhuma resposta encontrada para o quiz_nome_id fornecido.";
    }
} else {
    // Se o parâmetro quiz_nome_id não foi enviado, retorna uma mensagem de erro
    echo json_encode(array('error' => 'O parâmetro quiz_nome_id não foi especificado.'));
}
?>