<?php
session_start();
require_once ("../../../conn/conn.php");

if (isset($_POST['inserirbtn'])) {
    $nome = $_POST['nome'];
    $texto = $_POST['texto'];

    // Verifica se um arquivo de imagem foi enviado
    if ($_FILES['imagemperfil']['error'] == UPLOAD_ERR_OK && !empty($_FILES['imagemperfil']['tmp_name'])) {
        $imagemperfil_temp = $_FILES['imagemperfil']['tmp_name'];
        $imagemperfil_nome = $_FILES['imagemperfil']['name'];

        // Move o arquivo para o diretório de destino
        $destino = "../imgs/perturbacoes/" . $imagemperfil_nome;
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

    // Verifica se um arquivo de imagem foi enviado para o campo de banner
    if ($_FILES['banner']['error'] == UPLOAD_ERR_OK && !empty($_FILES['banner']['tmp_name'])) {
        $banner_temp = $_FILES['banner']['tmp_name'];
        $banner_nome = $_FILES['banner']['name'];

        // Move o arquivo para o diretório de destino
        $destino_banner = "../imgs/perturbacoes/banners/" . $banner_nome;
        if (move_uploaded_file($banner_temp, $destino_banner)) {
            // O upload foi bem-sucedido, salve o nome do arquivo
            $banner = $banner_nome;
        } else {
            // Ocorreu um erro ao mover o arquivo
            echo "Erro ao fazer upload do banner.";
            exit();
        }
    } else {
        // Nenhum arquivo de banner foi enviado
        $banner = ""; // Ou defina um valor padrão, se desejar
    }

    $query = "INSERT INTO perturbacoes (nome,texto,img_perturbacao,banner_perturbacao) VALUES ('$nome','$texto','$imagemperfil','$banner')";
    $query_run = mysqli_query($conn, $query);

    if ($query_run) {
        // echo "Saved";
        $_SESSION['status'] = "Perturbação inserida com sucesso";
        $_SESSION['status_code'] = "success";
        header('Location: .');
    } else {
        $_SESSION['status'] = "Admin Profile Not Added";
        $_SESSION['status_code'] = "error";
        header('Location: .');
    }
} else {
    $_SESSION['status'] = "Não foi inserida qualquer perturbação";
    $_SESSION['status_code'] = "warning";
    header('Location: .');
}

?>