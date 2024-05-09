<?php
session_start();
require_once ("../../../conn/conn.php");

if (isset($_POST['inserirbtn'])) {
    $nome = $_POST['nome'];
    $imagem = $_POST['imagem'];
    $explicacao = $_POST['explicacao'];
    $texto = $_POST['texto'];
    $questao = $_POST['questao'];
    $opcao_a = $_POST['opcao_a'];
    $opcao_b = $_POST['opcao_b'];
    $respostas = $_POST['respostas'];
    $qtd = $_POST['qtd'];

    // Inserir novo quiz_nome
    $query = "INSERT INTO quiz_nome (nome,img_quiz,explicacao_quiz,texto_informacao) VALUES ('$nome','$imagem','$explicacao','$texto')";
    $query_run = mysqli_query($conn, $query);

    if ($query_run) {
        $quiz_nome_id = mysqli_insert_id($conn);

        // Inserir questão na tabela quiz_questoes
        $query_conteudo = "INSERT INTO quiz_questoes (quiz_nome_id, questao, opcao_a, opcao_b) 
                               VALUES ('$quiz_nome_id', '$questao','$opcao_a','$opcao_b')";
        mysqli_query($conn, $query_conteudo);

        // Inserir resposta na tabela quiz_respostas
        $query_conteudo2 = "INSERT INTO quiz_respostas (quiz_nome_id, respostas, qtd)
                                VALUES ('$quiz_nome_id', '$respostas', '$qtd')";
        mysqli_query($conn, $query_conteudo2);

        $_SESSION['status'] = "Quiz inserido com sucesso";
        $_SESSION['status_code'] = "success";
        header('Location: .');
        exit();
    } else {
        $_SESSION['status'] = "Erro ao inserir quizz";
        $_SESSION['status_code'] = "error";
        header('Location: .');
        exit();
    }
}
?>