<?php
session_start();
require_once("../../../conn/conn.php");

if (isset($_POST['inserirbtn'])) {
    $artigo_id = $_POST['artigo_id']; // Recebendo o ID do artigo a ser atualizado

    $titulo = $_POST['titulo'];
    $data_publicacao = $_POST['data_publicacao'];
    $autor = $_POST['autor'];
    $nome_perturbacao = $_POST['perturbacao'];
    $nome_grupo = $_POST['grupo_perturbacao'];
    $pontos = $_POST['ponto'];
    $textos = $_POST['texto'];
    $fonte = $_POST['fonte'];
    $imagem = '';

    // Separar os nomes das perturbações e grupos
    $nome_perturbacao_array = explode(' - ', $nome_perturbacao);
    $nome_perturbacao_bd = $nome_perturbacao_array[0];
    $nome_grupo_array = explode(' - ', $nome_grupo);
    $nome_grupo_bd = $nome_grupo_array[0];

    if (isset($_POST['artigo_id'])) {
        $artigo_id = $_POST['artigo_id'];

        // Consulta a imagem atual do banco de dados
        $query_imagem = "SELECT img_artigo FROM artigos WHERE artigo_id = $artigo_id";
        $result_imagem = mysqli_query($conn, $query_imagem);

        if ($result_imagem && mysqli_num_rows($result_imagem) > 0) {
            $row_imagem = mysqli_fetch_assoc($result_imagem);
            $imagem_atual = $row_imagem['img_artigo'];
        } else {
            $imagem_atual = "";
        }

        // Define a variável $imagem com a imagem atual
        $imagem = $imagem_atual;
    }

    // Verifica se um arquivo de imagem foi enviado
    if ($_FILES['imagem']['error'] == UPLOAD_ERR_OK && !empty($_FILES['imagem']['tmp_name'])) {
        $imagem_temp = $_FILES['imagem']['tmp_name'];
        $imagem_nome = $_FILES['imagem']['name'];

        // Move o arquivo para o diretório de destino
        $destino = "../../inserir/imgs/artigos/" . $imagem_nome;
        if (move_uploaded_file($imagem_temp, $destino)) {
            // O upload foi bem-sucedido, salva o nome do arquivo no banco de dados
            $imagem = $imagem_nome;
        } else {
            echo "Erro ao fazer upload da imagem.";
            exit();
        }
    }

    // Obter os IDs da perturbação e do grupo
    $query_perturbacao = "SELECT perturbacoes_id FROM perturbacoes WHERE nome='$nome_perturbacao_bd'";
    $query_grupo = "SELECT grupos_perturbacoes_id FROM grupos_perturbacoes WHERE nome='$nome_grupo_bd'";

    $query_perturbacao_run = mysqli_query($conn, $query_perturbacao);
    $query_grupo_run = mysqli_query($conn, $query_grupo);

    if ($query_perturbacao_run && $query_grupo_run && mysqli_num_rows($query_perturbacao_run) > 0 && mysqli_num_rows($query_grupo_run) > 0) {
        $perturbacao_id = mysqli_fetch_assoc($query_perturbacao_run)['perturbacoes_id'];
        $grupo_id = mysqli_fetch_assoc($query_grupo_run)['grupos_perturbacoes_id'];

        // Atualizar o artigo com os novos IDs da perturbação e do grupo
        $query_update_artigo = "UPDATE artigos SET titulo = '$titulo', data_publicacao = '$data_publicacao', autor = '$autor', img_artigo = '$imagem', fonte = '$fonte',
                                juncao_perturbacoes_id = (SELECT juncao_perturbacoes_id
                                                          FROM juncao_perturbacoes
                                                          WHERE perturbacoes_id='$perturbacao_id' AND grupos_perturbacoes_id='$grupo_id') 
                                WHERE artigo_id = $artigo_id";

        $query_update_artigo_run = mysqli_query($conn, $query_update_artigo);

        if ($query_update_artigo_run) {
            // Atualização do conteúdo do artigo
            foreach ($pontos as $index => $ponto) {
                $texto_atual = $textos[$index]; // Use o índice do loop para acessar o texto correspondente

                // Verifica se o conteúdo já existe para o ponto atual
                $query_check_conteudo = "SELECT * FROM conteudo_artigo WHERE artigo_id='$artigo_id' AND ponto='$ponto' AND texto='$texto_atual'";
                $result_check_conteudo = mysqli_query($conn, $query_check_conteudo);

                if ($result_check_conteudo) {
                    if (mysqli_num_rows($result_check_conteudo) > 0) {
                        // Se o conteúdo existir, atualiza-o
                        $texto_atual_escaped = mysqli_real_escape_string($conn, $texto_atual);
                        $query_update_conteudo = "UPDATE conteudo_artigo SET texto = '$texto_atual_escaped' WHERE artigo_id = $artigo_id AND ponto = '$ponto'";
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