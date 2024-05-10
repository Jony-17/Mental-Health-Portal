<?php
session_start();
require_once ("../../../conn/conn.php");

if (isset($_POST['inserirbtn'])) {
    $autor = $_POST['autor'];
    $titulo = $_POST['titulo'];
    $data = $_POST['data'];
    $tempo = $_POST['tempo'];
    $link = $_POST['link'];

    // Verifica se um arquivo de imagem foi enviado
    if ($_FILES['imagem']['error'] == UPLOAD_ERR_OK && !empty($_FILES['imagem']['tmp_name'])) {
        $imagem_temp = $_FILES['imagem']['tmp_name'];
        $imagem_nome = $_FILES['imagem']['name'];
        
        // Move o arquivo para o diretório de destino
        $destino = "../imgs/ted-talks/" . $imagem_nome;
        if (move_uploaded_file($imagem_temp, $destino)) {
            // O upload foi bem-sucedido, salve o nome do arquivo no banco de dados
            $imagem = $imagem_nome;
        } else {
            // Ocorreu um erro ao mover o arquivo
            echo "Erro ao fazer upload da imagem.";
            exit();
        }
    } else {
        // Nenhum arquivo de imagem foi enviado, use um valor padrão ou deixe-o em branco
        $imagem = ""; // Ou defina um valor padrão, se desejar
    }


    $query = "INSERT INTO ted_talks (autor, titulo, data, tempo, img_ted_talks, link) VALUES ('$autor','$titulo','$data','$tempo','$imagem','$link')";
    $query_run = mysqli_query($conn, $query);

    if ($query_run) {
        // echo "Saved";
        $_SESSION['status'] = "Ted Talks inserida com sucesso";
        $_SESSION['status_code'] = "success";
        header('Location: .');
    } else {
        $_SESSION['status'] = "Admin Profile Not Added";
        $_SESSION['status_code'] = "error";
        header('Location: .');
    }
} else {
    $_SESSION['status'] = "Não foi inserida qualquer Ted Talks";
    $_SESSION['status_code'] = "warning";
    header('Location: .');
}

?>