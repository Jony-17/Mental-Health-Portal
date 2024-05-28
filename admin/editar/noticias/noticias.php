<?php
session_start();
require_once ("../../../conn/conn.php");

if (isset($_POST['inserirbtn'])) {
    $noticias_id = $_POST['noticias_id'];

    $titulo = $_POST['titulo'];
    $data_publicacao = $_POST['data_publicacao'];
    $autor = $_POST['autor'];
    $conteudo = $_POST['conteudo'];
    $pontos = $_POST['ponto'];
    $texto = $_POST['texto'];
    $fonte = $_POST['fonte'];
    $imagem = '';

    if (isset($_POST['noticias_id'])) {
        $noticias_id = $_POST['noticias_id'];

        // Consulta a imagem atual do banco de dados
        $query_imagem = "SELECT img_noticia FROM noticias WHERE noticias_id = $noticias_id";
        $result_imagem = mysqli_query($conn, $query_imagem);

        if ($result_imagem && mysqli_num_rows($result_imagem) > 0) {
            $row_imagem = mysqli_fetch_assoc($result_imagem);
            $imagem_atual = $row_imagem['img_noticia'];
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
        $destino = "../../inserir/imgs/noticias/" . $imagem_nome;
        if (move_uploaded_file($imagem_temp, $destino)) {
            // O upload foi bem-sucedido, salva o nome do arquivo no banco de dados
            $imagem = $imagem_nome;
        } else {
            echo "Erro ao fazer upload da imagem.";
            exit();
        }
    }

    // Verifica se há um ID de artigo para determinar se é uma inserção ou uma atualização
    if (isset($noticias_id)) {
        // Atualizar o artigo com os novos IDs da perturbação e do grupo
        $query = "UPDATE noticias SET titulo = '$titulo', data_publicacao = '$data_publicacao', autor = '$autor', img_noticia = '$imagem', conteudo_texto = '$conteudo', fonte = '$fonte'
                  WHERE noticias_id = $noticias_id";
        $query_run = mysqli_query($conn, $query);


        if ($query_run) {
            // Atualização do conteúdo do artigo
            foreach ($pontos as $index => $ponto) {
                $texto_atual = $textos[$index]; // Use o índice do loop para acessar o texto correspondente

                // Verifica se o conteúdo já existe para o ponto atual
                $query_check_conteudo = "SELECT * FROM conteudo_noticia WHERE noticias_id='$noticias_id' AND ponto='$ponto' AND texto='$texto_atual'";
                $result_check_conteudo = mysqli_query($conn, $query_check_conteudo);

                if ($result_check_conteudo) {
                    if (mysqli_num_rows($result_check_conteudo) > 0) {
                        // Se o conteúdo existir, atualiza-o
                        $texto_atual_escaped = mysqli_real_escape_string($conn, $texto_atual);
                        $query_update_conteudo = "UPDATE conteudo_noticia SET texto = '$texto_atual_escaped' WHERE noticias_id = $noticias_id AND ponto = '$ponto'";
                        mysqli_query($conn, $query_update_conteudo);
                    }
                } else {
                    echo "Erro ao verificar conteúdo do artigo: " . mysqli_error($conn);
                }
            }

            echo "Artigo e conteúdo atualizados com sucesso";
            header('Location: .');
        } else {
            echo "Erro ao atualizar artigo: " . mysqli_error($conn);
        }
    } else {
        // Não foi possível encontrar IDs para perturbação e grupo, não execute a atualização
        echo "Não foi possível encontrar IDs para perturbação e grupo.";
        exit();
    }
}
?>