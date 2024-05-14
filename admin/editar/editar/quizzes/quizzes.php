<?php
session_start();
require_once("../../../conn/conn.php");

if (isset($_POST['inserirbtn'])) {
    $nome = $_POST['nome'];
    $explicacao_quiz = $_POST['explicacao_quiz'];
    $texto_informacao = $_POST['texto_informacao'];
    $questao = $_POST['questao'];
    $opcao_a = $_POST['opcao_a'];
    $opcao_b = $_POST['opcao_b'];
    $resposta = $_POST['resposta'];
    $qtd = $_POST['qtd'];
    $imagem = '';

    if (isset($_POST['quiz_nome_id'])) {
        $quiz_nome_id = $_POST['quiz_nome_id'];

        // Consulta a imagem atual do banco de dados
        $query_imagem = "SELECT img_quiz FROM quiz_nome WHERE quiz_nome_id = $quiz_nome_id";
        $result_imagem = mysqli_query($conn, $query_imagem);

        if ($result_imagem && mysqli_num_rows($result_imagem) > 0) {
            $row_imagem = mysqli_fetch_assoc($result_imagem);
            $imagem_atual = $row_imagem['img_quiz'];
        } else {
            $imagem_atual = "";
        }

        // Define a variável $imagem com a imagem atual
        $imagem = $imagem_atual;
    }

    // Verifica se um novo arquivo de imagem foi enviado
    if ($_FILES['imagem']['error'] == UPLOAD_ERR_OK && !empty($_FILES['imagem']['tmp_name'])) {
        $imagem_temp = $_FILES['imagem']['tmp_name'];
        $imagem_nome = $_FILES['imagem']['name'];

        // Move o arquivo para o diretório de destino
        $destino = "../../inserir/imgs/quizzes/" . $imagem_nome;
        if (move_uploaded_file($imagem_temp, $destino)) {
            // O upload foi bem-sucedido, salva o nome do arquivo no banco de dados
            $imagem = $imagem_nome;
        } else {
            echo "Erro ao fazer upload da imagem.";
            exit();
        }
    }

    // Verifica se há um ID de quiz para determinar se é uma inserção ou uma atualização
    if (isset($quiz_nome_id)) {
        // ID presente, é uma atualização
        $query = "UPDATE quiz_nome SET nome = '$nome', explicacao_quiz = '$explicacao_quiz', texto_informacao = '$texto_informacao', img_quiz = '$imagem' WHERE quiz_nome_id = $quiz_nome_id";
    } else {
        // ID não presente, é uma inserção
        $query = "INSERT INTO quiz_nome (nome, explicacao_quiz, texto_informacao, img_quiz) VALUES ('$nome', '$explicacao_quiz', '$texto_informacao', '$imagem')";
    }

    // Executa a consulta SQL para a tabela quiz_nome
    $query_run = mysqli_query($conn, $query);

    if ($query_run) {
        if (isset($quiz_nome_id)) {
            // Verifica se a questão já existe para o quiz_nome_id
            $query_questao = "SELECT * FROM quiz_questoes WHERE quiz_nome_id = $quiz_nome_id";
            $result_questao = mysqli_query($conn, $query_questao);

            if ($result_questao && mysqli_num_rows($result_questao) > 0) {
                // Questão existe, atualiza a questão
                $query_update_questao = "UPDATE quiz_questoes SET questao = '$questao', opcao_a = '$opcao_a', opcao_b = '$opcao_b' WHERE quiz_nome_id = $quiz_nome_id";
                mysqli_query($conn, $query_update_questao);
            } else {
                // Questão não existe, insere uma nova questão
                $query_insert_questao = "INSERT INTO quiz_questoes (quiz_nome_id, questao, opcao_a, opcao_b) VALUES ($quiz_nome_id, '$questao', '$opcao_a', '$opcao_b')";
                mysqli_query($conn, $query_insert_questao);
            }

            // Verifica se a resposta já existe para o quiz_nome_id
            $query_resposta = "SELECT * FROM quiz_respostas WHERE quiz_nome_id = $quiz_nome_id";
            $result_resposta = mysqli_query($conn, $query_resposta);

            if ($result_resposta && mysqli_num_rows($result_resposta) > 0) {
                // Resposta existe, atualiza a resposta
                $query_update_resposta = "UPDATE quiz_respostas SET respostas = '$resposta', qtd = '$qtd' WHERE quiz_nome_id = $quiz_nome_id";
                mysqli_query($conn, $query_update_resposta);
            } else {
                // Resposta não existe, insere uma nova resposta
                $query_insert_resposta = "INSERT INTO quiz_respostas (quiz_nome_id, respostas, qtd) VALUES ($quiz_nome_id, '$resposta', '$qtd')";
                mysqli_query($conn, $query_insert_resposta);
            }
        } else {
            // Se for uma nova inserção, pega o último ID inserido na tabela quiz_nome
            $ultimo_id = mysqli_insert_id($conn);

            // Insere a nova questão na tabela quiz_questoes
            $query_insert_questao = "INSERT INTO quiz_questoes (quiz_nome_id, questao, opcao_a, opcao_b) VALUES ($ultimo_id, '$questao', '$opcao_a', '$opcao_b')";
            mysqli_query($conn, $query_insert_questao);

            // Insere a nova resposta na tabela quiz_respostas
            $query_insert_resposta = "INSERT INTO quiz_respostas (quiz_nome_id, respostas, qtd) VALUES ($ultimo_id, '$resposta', '$qtd')";
            mysqli_query($conn, $query_insert_resposta);
        }

        $_SESSION['status'] = isset($quiz_nome_id) ? "Quiz atualizado com sucesso" : "Quiz inserido com sucesso";
        $_SESSION['status_code'] = "success";
        header('Location: .');
    } else {
        $_SESSION['status'] = isset($quiz_nome_id) ? "Erro ao atualizar Quiz" : "Erro ao inserir Quiz";
        $_SESSION['status_code'] = "error";
        header('Location: .');
    }
} else {
    $_SESSION['status'] = "Não foi inserido qualquer Quiz";
    $_SESSION['status_code'] = "warning";
    header('Location: .');
}
?>
