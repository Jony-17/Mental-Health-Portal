<?php
session_start();
require_once ("../../../conn/conn.php");

if (isset($_POST['inserirbtn'])) {
    $titulo = $_POST['titulo'];
    $descricao = $_POST['descricao'];
    $data_publicacao = $_POST['data_publicacao'];
    $autor = $_POST['autor'];
    $conteudo = $_POST['conteudo'];
    $nome_perturbacao = $_POST['perturbacao'];
    $nome_grupo = $_POST['grupo_perturbacao'];
    $pontos = $_POST['ponto'];
    $texto = $_POST['texto'];
    $imagem = '';

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

    // Verifica se um novo arquivo de imagem foi enviado
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

    // Verifica se há um ID de artigo para determinar se é uma inserção ou uma atualização
    if (isset($artigo_id)) {
        $query_perturbacao = "SELECT perturbacoes_id FROM perturbacoes WHERE nome='$nome_perturbacao_bd'";
        $query_grupo = "SELECT grupos_perturbacoes_id FROM grupos_perturbacoes WHERE nome='$nome_grupo_bd'";

        $query_perturbacao_run = mysqli_query($conn, $query_perturbacao);
        $query_grupo_run = mysqli_query($conn, $query_grupo);

        if ($query_perturbacao_run && $query_grupo_run && mysqli_num_rows($query_perturbacao_run) > 0 && mysqli_num_rows($query_grupo_run) > 0) {
            $perturbacao_id = mysqli_fetch_assoc($query_perturbacao_run)['perturbacoes_id'];
            $grupo_id = mysqli_fetch_assoc($query_grupo_run)['grupos_perturbacoes_id'];

            // Atualizar o artigo com os novos IDs da perturbação e do grupo
            $query = "UPDATE artigos SET titulo = '$titulo', descricao = '$descricao', data_publicacao = '$data_publicacao', autor = '$autor', img_artigo = '$imagem', conteudo_texto = '$conteudo',
                      juncao_perturbacoes_id = (SELECT juncao_perturbacoes_id
                                                FROM juncao_perturbacoes
                                                WHERE perturbacoes_id='$perturbacao_id' AND grupos_perturbacoes_id='$grupo_id') 
                      WHERE artigo_id = $artigo_id";
        } else {
            // Não foi possível encontrar IDs para perturbação e grupo, não execute a atualização
            echo "Não foi possível encontrar IDs para perturbação e grupo.";
            exit();
        }
    } else {
        // ID não presente, é uma inserção
        $query = "INSERT INTO artigos (titulo, descricao, data_publicacao, autor, img_artigo, conteudo_texto, juncao_perturbacoes_id) VALUES ('$titulo', '$descricao', '$data_publicacao', '$autor', '$imagem', '$conteudo', $juncao_perturbacoes_id)";
    }

    // Executa a consulta SQL
    $query_run = mysqli_query($conn, $query);

    if ($query_run) {
        // Se for uma atualização, também atualiza a tabela quiz_questoes
        if (isset($artigo_id)) {
            // Verifica se a questão já existe para o quiz_nome_id
            $query_questao = "SELECT * FROM conteudo_artigo WHERE artigo_id = $artigo_id";
            $result_questao = mysqli_query($conn, $query_questao);

            if ($result_questao && mysqli_num_rows($result_questao) > 0) {
                // Questão existe, atualiza a questão
                $query_update_questao = "UPDATE conteudo_artigo SET ponto = '$pontos', texto = '$texto' WHERE artigo_id = $artigo_id";
                mysqli_query($conn, $query_update_questao);
            } else {
                // Questão não existe, insere uma nova questão
                $query_insert_questao = "INSERT INTO conteudo_artigo (artigo_id, ponto, texto) VALUES ($artigo_id, '$pontos', '$texto')";
                mysqli_query($conn, $query_insert_questao);
            }
        } else {
            // Se for uma nova inserção, pega o último ID inserido na tabela quiz_nome
            $ultimo_id = mysqli_insert_id($conn);

            // Insere a nova questão na tabela quiz_questoes
            $query_insert_questao = "INSERT INTO conteudo_artigo (artigo_id, ponto, texto) VALUES ($artigo_id, '$pontos', '$texto')";
            mysqli_query($conn, $query_insert_questao);
        }

        $_SESSION['status'] = isset($artigo_id) ? "Quiz atualizado com sucesso" : "Quiz inserido com sucesso";
        $_SESSION['status_code'] = "success";
        header('Location: .');
    } else {
        $_SESSION['status'] = isset($artigo_id) ? "Erro ao atualizar Quiz" : "Erro ao inserir Quiz";
        $_SESSION['status_code'] = "error";
        header('Location: .');
    }
} else {
    $_SESSION['status'] = "Não foi inserido qualquer Quiz";
    $_SESSION['status_code'] = "warning";
    header('Location: .');
}
?>