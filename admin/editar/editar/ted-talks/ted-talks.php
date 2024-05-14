<?php
session_start();
require_once("../../../conn/conn.php");

if (isset($_POST['inserirbtn'])) {
    $autor = $_POST['autor'];
    $titulo = $_POST['titulo'];
    $data = $_POST['data'];
    $tempo = $_POST['tempo'];
    $link = $_POST['link'];
    $imagem = '';

    if (isset($_POST['ted_talks_id'])) {
        $ted_talks_id = $_POST['ted_talks_id'];

        // Consulta a imagem atual do banco de dados
        $query_imagem = "SELECT img_ted_talks FROM ted_talks WHERE ted_talks_id = $ted_talks_id";
        $result_imagem = mysqli_query($conn, $query_imagem);

        if ($result_imagem && mysqli_num_rows($result_imagem) > 0) {
            $row_imagem = mysqli_fetch_assoc($result_imagem);
            $imagem_atual = $row_imagem['img_ted_talks'];
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
        $destino = "../../inserir/imgs/ted-talks/" . $imagem_nome;
        if (move_uploaded_file($imagem_temp, $destino)) {
            // O upload foi bem-sucedido, salva o nome do arquivo no banco de dados
            $imagem = $imagem_nome;
        } else {
            echo "Erro ao fazer upload da imagem.";
            exit();
        }
    }

    // Verifica se há um ID de TED Talk para determinar se é uma inserção ou uma atualização
    if (isset($ted_talks_id)) {
        // ID presente, é uma atualização
        $query = "UPDATE ted_talks SET autor = '$autor', titulo = '$titulo', data = '$data', tempo = '$tempo', img_ted_talks = '$imagem', link = '$link' WHERE ted_talks_id = $ted_talks_id";
    } else {
        // ID não presente, é uma inserção
        $query = "INSERT INTO ted_talks (autor, titulo, data, tempo, img_ted_talks, link) VALUES ('$autor', '$titulo', '$data', '$tempo', '$imagem', '$link')";
    }

    // Executa a consulta SQL
    $query_run = mysqli_query($conn, $query);

    if ($query_run) {
        $_SESSION['status'] = isset($ted_talks_id) ? "Ted Talks atualizada com sucesso" : "Ted Talks inserida com sucesso";
        $_SESSION['status_code'] = "success";
        header('Location: .');
    } else {
        $_SESSION['status'] = isset($ted_talks_id) ? "Erro ao atualizar Ted Talks" : "Erro ao inserir Ted Talks";
        $_SESSION['status_code'] = "error";
        header('Location: .');
    }
} else {
    $_SESSION['status'] = "Não foi inserida qualquer Ted Talks";
    $_SESSION['status_code'] = "warning";
    header('Location: .');
}

?>