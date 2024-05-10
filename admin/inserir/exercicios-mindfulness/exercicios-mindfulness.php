<?php
session_start();
require_once ("../../../conn/conn.php");

if (isset($_POST['inserirbtn'])) {
    $nome = $_POST['nome'];
    $definicao = $_POST['definicao'];

    // Verifica se um arquivo de imagem foi enviado
    if ($_FILES['banner']['error'] == UPLOAD_ERR_OK && !empty($_FILES['banner']['tmp_name'])) {
        $banner_temp = $_FILES['banner']['tmp_name'];
        $banner_nome = $_FILES['banner']['name'];

        // Move o arquivo para o diretório de destino
        $destino = "../imgs/exercicios-mindfulness/banners/" . $banner_nome;
        if (move_uploaded_file($banner_temp, $destino)) {
            // O upload foi bem-sucedido, salve o nome do arquivo no banco de dados
            $banner = $banner_nome;
        } else {
            // Ocorreu um erro ao mover o arquivo
            echo "Erro ao fazer upload da imagem.";
            exit();
        }
    } else {
        // Nenhum arquivo de imagem foi enviado, use um valor padrão ou deixe-o em branco
        $banner = ""; // Ou defina um valor padrão, se desejar
    }


    // Inserir na tabela exercicios_mindfulness
    $query = "INSERT INTO exercicios_mindfulness (nome, banner, definicao) VALUES ('$nome','$banner','$definicao')";
    $query_run = mysqli_query($conn, $query);

    if ($query_run) {

        if ($query_run_ex) {
            $_SESSION['status'] = "Exercícios mindfulness inseridos com sucesso";
            $_SESSION['status_code'] = "success";
            header('Location: .');
        } else {
            $_SESSION['status'] = "Erro ao inserir exercícios mindfulness";
            $_SESSION['status_code'] = "error";
            header('Location: .');
        }
    } else {
        $_SESSION['status'] = "Erro ao inserir exercícios mindfulness";
        $_SESSION['status_code'] = "error";
        header('Location: .');
    }
}

?>