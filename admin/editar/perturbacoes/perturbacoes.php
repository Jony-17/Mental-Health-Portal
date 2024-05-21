<?php
session_start();
require_once("../../../conn/conn.php");

if (isset($_POST['inserirbtn'])) {
    $nome = $_POST['nome'];
    $texto = $_POST['texto'];
    $fonte = $_POST['fonte'];
    $imagem = '';
    $banner = '';

    if (isset($_POST['perturbacoes_id'])) {
        $perturbacoes_id = $_POST['perturbacoes_id'];

        // Consulta a imagem e o banner atuais do banco de dados
        $query_midias = "SELECT img_perturbacao, banner_perturbacao FROM perturbacoes WHERE perturbacoes_id = $perturbacoes_id";
        $result_midias = mysqli_query($conn, $query_midias);

        if ($result_midias && mysqli_num_rows($result_midias) > 0) {
            $row_midias = mysqli_fetch_assoc($result_midias);
            $imagem_atual = $row_midias['img_perturbacao'];
            $banner_atual = $row_midias['banner_perturbacao'];
        } else {
            $imagem_atual = "";
            $banner_atual = "";
        }

        // Define as variáveis $imagem e $banner com as mídias atuais
        $imagem = $imagem_atual;
        $banner = $banner_atual;
    }

    // Verifica se um novo arquivo de imagem foi enviado
    if ($_FILES['imagem']['error'] == UPLOAD_ERR_OK && !empty($_FILES['imagem']['tmp_name'])) {
        $imagem_temp = $_FILES['imagem']['tmp_name'];
        $imagem_nome = $_FILES['imagem']['name'];

        // Move o arquivo para o diretório de destino
        $destino_imagem = "../../inserir/imgs/perturbacoes/" . $imagem_nome;
        if (move_uploaded_file($imagem_temp, $destino_imagem)) {
            // O upload foi bem-sucedido, salva o nome do arquivo no banco de dados
            $imagem = $imagem_nome;
        } else {
            echo "Erro ao fazer upload da imagem.";
            exit();
        }
    }

    // Verifica se um novo arquivo de banner foi enviado
    if ($_FILES['banner']['error'] == UPLOAD_ERR_OK && !empty($_FILES['banner']['tmp_name'])) {
        $banner_temp = $_FILES['banner']['tmp_name'];
        $banner_nome = $_FILES['banner']['name'];

        // Move o arquivo para o diretório de destino
        $destino_banner = "../../inserir/imgs/perturbacoes/" . $banner_nome;
        if (move_uploaded_file($banner_temp, $destino_banner)) {
            // O upload foi bem-sucedido, salva o nome do arquivo no banco de dados
            $banner = $banner_nome;
        } else {
            echo "Erro ao fazer upload do banner.";
            exit();
        }
    }

    // Verifica se há um ID de perturbação para determinar se é uma inserção ou uma atualização
    if (isset($perturbacoes_id)) {
        // ID presente, é uma atualização
        $query = "UPDATE perturbacoes SET nome = '$nome', texto = '$texto', img_perturbacao = '$imagem', banner_perturbacao = '$banner', fonte = '$fonte' WHERE perturbacoes_id = $perturbacoes_id";
    } else {
        // ID não presente, é uma inserção
        $query = "INSERT INTO perturbacoes (nome, texto, img_perturbacao, banner_perturbacao, fonte) VALUES ('$nome', '$texto', '$imagem', '$banner', '$fonte')";
    }

    // Executa a consulta SQL
    $query_run = mysqli_query($conn, $query);

    if ($query_run) {
        $_SESSION['status'] = isset($perturbacoes_id) ? "Ted Talks atualizada com sucesso" : "Ted Talks inserida com sucesso";
        $_SESSION['status_code'] = "success";
        header('Location: .');
    } else {
        $_SESSION['status'] = isset($perturbacoes_id) ? "Erro ao atualizar Ted Talks" : "Erro ao inserir Ted Talks";
        $_SESSION['status_code'] = "error";
        header('Location: .');
    }
} else {
    $_SESSION['status'] = "Não foi inserida qualquer Ted Talks";
    $_SESSION['status_code'] = "warning";
    header('Location: .');
}
?>
