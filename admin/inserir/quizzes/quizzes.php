<?php
session_start();
require_once("../../../conn/conn.php");

if (isset($_POST['inserirbtn'])) {
    $nome = $_POST['nome'];
    $explicacao = $_POST['explicacao'];
    $texto = $_POST['texto'];
    $questao = $_POST['questao'];
    $opcao_a = $_POST['opcao_a'];
    $opcao_b = $_POST['opcao_b'];
    $respostas = $_POST['respostas'];
    $qtd = $_POST['qtd'];

    // Verifica se um arquivo de imagem foi enviado
    if ($_FILES['imagemperfil']['error'] == UPLOAD_ERR_OK && !empty($_FILES['imagemperfil']['tmp_name'])) {
        $imagemperfil_temp = $_FILES['imagemperfil']['tmp_name'];
        $imagemperfil_nome = $_FILES['imagemperfil']['name'];
        
        // Move o arquivo para o diretório de destino
        $destino = "../imgs/quizzes/" . $imagemperfil_nome;
        if (move_uploaded_file($imagemperfil_temp, $destino)) {
            // O upload foi bem-sucedido, salve o nome do arquivo no banco de dados
            $imagemperfil = $imagemperfil_nome;
        } else {
            // Ocorreu um erro ao mover o arquivo
            echo "Erro ao fazer upload da imagem.";
            exit();
        }
    } else {
        // Nenhum arquivo de imagem foi enviado, use um valor padrão ou deixe-o em branco
        $imagemperfil = ""; // Ou defina um valor padrão, se desejar
    }

    // Inserir novo quiz_nome
    $query = "INSERT INTO quiz_nome (nome,img_quiz,explicacao_quiz,texto_informacao) VALUES ('$nome','$imagemperfil','$explicacao','$texto')";
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
