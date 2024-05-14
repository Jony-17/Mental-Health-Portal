<?php
session_start();
require_once ("../../../conn/conn.php");

if (isset($_POST['inserirbtn'])) {
    $nome = $_POST['nome'];
    $definicao = $_POST['definicao'];
    $titulo = $_POST['titulo'];
    $imagem = '';
    $img = '';
    $audio = '';

    if (isset($_POST['exercicios_mindfulness_id'])) {
        $exercicios_mindfulness_id = $_POST['exercicios_mindfulness_id'];
        $exercicios_mindfulness_ex_id = $_POST['exercicios_mindfulness_ex_id'];

        // Consulta a imagem atual do banco de dados
        $query_imagem = "SELECT exercicios_mindfulness.banner, exercicios_mindfulness_ex.img
                         FROM
                            exercicios_mindfulness
                         LEFT JOIN
                            exercicios_mindfulness_ex 
                         ON
                            exercicios_mindfulness.exercicios_mindfulness_id = exercicios_mindfulness_ex.exercicios_mindfulness_id
                         WHERE
                            exercicios_mindfulness.exercicios_mindfulness_id='$exercicios_mindfulness_id' AND exercicios_mindfulness_ex.exercicios_mindfulness_ex_id='$exercicios_mindfulness_ex_id'";
        $result_imagem = mysqli_query($conn, $query_imagem);

        if ($result_imagem && mysqli_num_rows($result_imagem) > 0) {
            $row_imagem = mysqli_fetch_assoc($result_imagem);
            $imagem_atual = $row_imagem['banner'];
            $img_atual = $row_imagem['img'];
        } else {
            $imagem_atual = "";
            $img_atual = "";
        }

        // Define a variável $imagem com a imagem atual
        $imagem = $imagem_atual;
        $img = $img_atual;
    }

    // Verifica se um novo arquivo de imagem foi enviado
    if ($_FILES['imagem']['error'] == UPLOAD_ERR_OK && !empty($_FILES['imagem']['tmp_name'])) {
        $imagem_temp = $_FILES['imagem']['tmp_name'];
        $imagem_nome = $_FILES['imagem']['name'];

        // Move o arquivo para o diretório de destino
        $destino = "../../inserir/imgs/exercicios-mindfulness/banners/" . $imagem_nome;
        if (move_uploaded_file($imagem_temp, $destino)) {
            // O upload foi bem-sucedido, salva o nome do arquivo no banco de dados
            $imagem = $imagem_nome;
        } else {
            echo "Erro ao fazer upload da imagem.";
            exit();
        }
    }

    // Verifica se um novo arquivo de img foi enviado
    if ($_FILES['img']['error'] == UPLOAD_ERR_OK && !empty($_FILES['img']['tmp_name'])) {
        $img_temp = $_FILES['img']['tmp_name'];
        $img_nome = $_FILES['img']['name'];

        // Move o arquivo para o diretório de destino
        $destino_img = "../../inserir/imgs/exercicios-mindfulness/atividades/" . $img_nome;
        if (move_uploaded_file($img_temp, $destino)) {
            // O upload foi bem-sucedido, salva o nome do arquivo no banco de dados
            $img = $img_nome;
        } else {
            echo "Erro ao fazer upload do img.";
            exit();
        }
    }

    if ($_FILES['audio']['error'] == UPLOAD_ERR_OK && !empty($_FILES['audio']['tmp_name'])) {
        $audio_temp = $_FILES['audio']['tmp_name'];
        $audio_nome = $_FILES['audio']['name'];
    
        // Move o arquivo para o diretório de destino
        $destino_audio = "../../inserir/imgs/exercicios-mindfulness/audios/" . $audio_nome;
        if (move_uploaded_file($audio_temp, $destino_audio)) {
            // O upload foi bem-sucedido, salva o nome do arquivo no banco de dados ou onde for necessário
            $audio = $audio_nome;
        } else {
            echo "Erro ao fazer upload do áudio.";
            exit();
        }
    }

    // Verifica se há um ID de TED Talk para determinar se é uma inserção ou uma atualização
    if (isset($exercicios_mindfulness_id)) {
        // ID presente, é uma atualização
        $query = "UPDATE exercicios_mindfulness SET nome = '$nome', banner = '$imagem', definicao = '$definicao' WHERE exercicios_mindfulness_id = $exercicios_mindfulness_id";
    } else {
        // ID não presente, é uma inserção
        $query = "INSERT INTO exercicios_mindfulness (nome, banner, definicao) VALUES ('$nome', '$imagem', '$definicao')";
    }

    // Executa a consulta SQL
    $query_run = mysqli_query($conn, $query);

    if ($query_run) {
        // Se for uma atualização, também atualiza a tabela quiz_questoes
        if (isset($exercicios_mindfulness_id)) {
            // Verifica se a questão já existe para o quiz_nome_id
            $query_questao = "SELECT * FROM exercicios_mindfulness_ex WHERE exercicios_mindfulness_ex_id = $exercicios_mindfulness_ex_id";
            $result_questao = mysqli_query($conn, $query_questao);

            if ($result_questao && mysqli_num_rows($result_questao) > 0) {
                // Questão existe, atualiza a questão
                $query_update_questao = "UPDATE exercicios_mindfulness_ex SET titulo = '$titulo', img = '$img', audio = '$audio' WHERE exercicios_mindfulness_ex_id = $exercicios_mindfulness_ex_id";
                mysqli_query($conn, $query_update_questao);
            } else {
                // Questão não existe, insere uma nova questão
                $query_insert_questao = "INSERT INTO exercicios_mindfulness_ex (exercicios_mindfulness_ex_id, titulo, img, audio) VALUES ($exercicios_mindfulness_ex_id, '$titulo', '$img', '$audio')";
                mysqli_query($conn, $query_insert_questao);
            }
        } else {
            // Se for uma nova inserção, pega o último ID inserido na tabela quiz_nome
            $ultimo_id = mysqli_insert_id($conn);

            // Insere a nova questão na tabela quiz_questoes
            $query_insert_questao = "INSERT INTO exercicios_mindfulness_ex (exercicios_mindfulness_ex_id, titulo, img, audio) VALUES ($exercicios_mindfulness_ex_id, '$titulo', '$img', '$audio')";
            mysqli_query($conn, $query_insert_questao);
        }

        $_SESSION['status'] = isset($artigo_id) ? "Quiz atualizado com sucesso" : "Quiz inserido com sucesso";
        $_SESSION['status_code'] = "success";
        header('Location: .');
    } else {
        $_SESSION['status'] = isset($exercicios_mindfulness_id) ? "Erro ao atualizar Exercícios mindfulness" : "Erro ao inserir Exercícios mindfulness";
        $_SESSION['status_code'] = "error";
        header('Location: .');
    }
} else {
    $_SESSION['status'] = "Não foi inserida qualquer Exercícios mindfulness";
    $_SESSION['status_code'] = "warning";
    header('Location: .');
}

?>