<?php
session_start();
require_once ("../../../conn/conn.php");

if (isset($_GET['quiz_nome_id'])) {
    $quiz_nome_id = $_GET['quiz_nome_id'];

    // Consultar o banco de dados para obter as respostas com base no quiz_nome_id
    $query = "SELECT respostas FROM quiz_respostas WHERE quiz_nome_id = $quiz_nome_id";
    $result = mysqli_query($conn, $query);

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