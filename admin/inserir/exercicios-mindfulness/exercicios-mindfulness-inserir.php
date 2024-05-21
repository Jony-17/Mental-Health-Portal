<?php
session_start();
require_once ("../../../conn/conn.php");

if (isset($_POST['insertbtn'])) {
    $exercicios_mindfulness_id = $_POST['exercicios_mindfulness_id'];
    $titulo = $_POST['titulo'];
    $fonte = $_POST['fonte'];

    // Verifica se um arquivo de imagem foi enviado
    if ($_FILES['img']['error'] == UPLOAD_ERR_OK && !empty($_FILES['img']['tmp_name'])) {
        $img_temp = $_FILES['img']['tmp_name'];
        $img_nome = $_FILES['img']['name'];

        // Move o arquivo para o diretório de destino
        $destino = "../imgs/exercicios-mindfulness/atividades/" . $img_nome;
        if (move_uploaded_file($img_temp, $destino)) {
            // O upload foi bem-sucedido, salve o nome do arquivo no banco de dados
            $img = $img_nome;
        } else {
            // Ocorreu um erro ao mover o arquivo
            echo "Erro ao fazer upload da imagem.";
            exit();
        }
    } else {
        // Nenhum arquivo de imagem foi enviado, use um valor padrão ou deixe-o em branco
        $img = ""; // Ou defina um valor padrão, se desejar
    }

    // Verifica se um arquivo de áudio foi enviado
    if ($_FILES['audio']['error'] == UPLOAD_ERR_OK && !empty($_FILES['audio']['tmp_name'])) {
        $audio_temp = $_FILES['audio']['tmp_name'];
        $audio_nome = $_FILES['audio']['name'];

        // Move o arquivo de áudio para o diretório de destino
        $destino_audio = "../imgs/exercicios-mindfulness/audios/" . $audio_nome;
        if (move_uploaded_file($audio_temp, $destino_audio)) {
            // O upload do áudio foi bem-sucedido, salva o nome do arquivo
            $audio = $audio_nome;
        } else {
            // Ocorreu um erro ao mover o arquivo de áudio
            echo "Erro ao fazer upload do áudio.";
            exit();
        }
    } else {
        // Nenhum arquivo de áudio foi enviado, use um valor padrão ou deixe-o em branco
        $audio = ""; // Ou defina um valor padrão, se desejar
    }

    // Inserir na tabela exercicios_mindfulness
    $query = "INSERT INTO exercicios_mindfulness_ex (exercicios_mindfulness_id, titulo, img, audio, fonte) VALUES ('$exercicios_mindfulness_id','$titulo','$img','$audio','$fonte')";
    $query_run = mysqli_query($conn, $query);

    if ($query_run) {

        if ($query_run_ex) {
            $_SESSION['status'] = "Exercícios mindfulness inseridos com sucesso";
            $_SESSION['status_code'] = "success";
            header('Location: index.php');
        } else {
            $_SESSION['status'] = "Erro ao inserir exercícios mindfulness";
            $_SESSION['status_code'] = "error";
            header('Location: index.php');
        }
    } else {
        $_SESSION['status'] = "Erro ao inserir exercícios mindfulness";
        $_SESSION['status_code'] = "error";
        header('Location: index.php');
    }
} else {
    $_SESSION['status'] = "Não foram inseridos quaisquer exercícios mindfulness";
    $_SESSION['status_code'] = "warning";
    header('Location: index.php');
}


?>