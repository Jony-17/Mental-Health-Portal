<?php
session_start();
require_once("../../../conn/conn.php");

if (isset($_POST['inserirbtn'])) {
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
    } else {
        // ID não presente, é uma inserção
        $query = "INSERT INTO noticias (titulo, data_publicacao, autor, img_noticia, conteudo_texto, fonte) VALUES ('$titulo', '$data_publicacao', '$autor', '$imagem', '$conteudo', '$fonte')";
    }

    // Executa a consulta SQL
    $query_run = mysqli_query($conn, $query);

    if ($query_run) {
        // Se for uma atualização, também atualiza a tabela conteudo_noticia
        if (isset($noticias_id)) {
            if ($pontos === '---') {
                // Insere um novo registro na tabela conteudo_noticia
                $query_insert_conteudo = "INSERT INTO conteudo_noticia (noticias_id, ponto, texto) VALUES ($noticias_id, '$pontos', '$texto')";
                mysqli_query($conn, $query_insert_conteudo);
            } else {
                // Verifica se a questão já existe para o noticias_id
                $query_questao = "SELECT * FROM conteudo_noticia WHERE noticias_id = $noticias_id";
                $result_questao = mysqli_query($conn, $query_questao);

                if ($result_questao && mysqli_num_rows($result_questao) > 0) {
                    // Questão existe, atualiza a questão
                    $query_update_questao = "UPDATE conteudo_noticia SET ponto = '$pontos', texto = '$texto' WHERE noticias_id = $noticias_id";
                    mysqli_query($conn, $query_update_questao);
                } else {
                    // Questão não existe, insere uma nova questão
                    $query_insert_questao = "INSERT INTO conteudo_noticia (noticias_id, ponto, texto) VALUES ($noticias_id, '$pontos', '$texto')";
                    mysqli_query($conn, $query_insert_questao);
                }
            }
        } else {
            // Se for uma nova inserção, pega o último ID inserido na tabela noticias
            $ultimo_id = mysqli_insert_id($conn);

            // Insere a nova questão na tabela conteudo_noticia
            $query_insert_questao = "INSERT INTO conteudo_noticia (noticias_id, ponto, texto) VALUES ($ultimo_id, '$pontos', '$texto')";
            mysqli_query($conn, $query_insert_questao);
        }

        $_SESSION['status'] = isset($noticias_id) ? "Notícia atualizada com sucesso" : "Notícia inserida com sucesso";
        $_SESSION['status_code'] = "success";
        header('Location: .');
    } else {
        $_SESSION['status'] = isset($noticias_id) ? "Erro ao atualizar Notícia" : "Erro ao inserir Notícia";
        $_SESSION['status_code'] = "error";
        header('Location: .');
    }
} else {
    $_SESSION['status'] = "Não foi inserida qualquer Notícia";
    $_SESSION['status_code'] = "warning";
    header('Location: .');
}
?>
