<?php
session_start();
require_once ("../../../conn/conn.php");

if (isset($_GET['quiz_nome_id']) && isset($_GET['simCount'])) {
    $quiz_nome_id = $_GET['quiz_nome_id'];
    $simCount = $_GET['simCount'];

    if ($quiz_nome_id == 1) {
        // Consultar a base de dados para obter as respostas com base no quiz_nome_id e no simCount
        $query = "SELECT r.respostas
        FROM (
            SELECT 
                CASE 
                    WHEN ? BETWEEN 0 AND 5 THEN 1
                    WHEN ? BETWEEN 6 AND 10 THEN 6
                    WHEN ? BETWEEN 11 AND 15 THEN 11
                    ELSE 16
                END AS qtd_value
        ) AS subquery
        JOIN quiz_respostas r ON subquery.qtd_value = r.qtd AND r.quiz_nome_id = ?;
        ";
    } else {
        $query = "SELECT r.respostas
        FROM (
            SELECT 
                CASE 
                    WHEN ? BETWEEN 0 AND 1 THEN 1
                    WHEN ? BETWEEN 2 AND 3 THEN 2
                    WHEN ? BETWEEN 4 AND 5 THEN 4
                    ELSE 6
                END AS qtd_value
        ) AS subquery
        JOIN quiz_respostas r ON subquery.qtd_value = r.qtd AND r.quiz_nome_id = ?;
        ";
    }


    // Preparar a declaração
    $stmt = mysqli_prepare($conn, $query);

    // Vincular os parâmetros
    mysqli_stmt_bind_param($stmt, "iiii", $simCount, $simCount, $simCount, $quiz_nome_id);

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