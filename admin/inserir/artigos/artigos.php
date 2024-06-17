<?php
session_start();
require_once ("../../../conn/conn.php");

if (isset($_POST['inserirbtn'])) {
    $titulo = $_POST['titulo'];
    $data_publicacao = $_POST['data_publicacao'];
    $autor = $_POST['autor'];
    $nome_perturbacao = $_POST['perturbacao'];
    $nome_grupo = $_POST['grupo_perturbacao'];
    $pontos = $_POST['ponto'];
    $texto = $_POST['texto'];
    $fonte = $_POST['fonte'];

    // Separar os nomes das perturbações e grupos
    $nome_perturbacao_array = explode(' - ', $nome_perturbacao);
    $nome_perturbacao_bd = $nome_perturbacao_array[0];
    $nome_grupo_array = explode(' - ', $nome_grupo);
    $nome_grupo_bd = $nome_grupo_array[0];

    /*echo "Conteúdo do array nome_perturbacao_array: ";
    var_dump($nome_perturbacao_array);
    echo "<br>Grupo: " . $nome_perturbacao . "";

    echo "<br>Conteúdo do array nome_grupo_array: ";
    var_dump($nome_grupo_array);
    echo "<br>Grupo: " . $nome_grupo . "<br>";

    echo "-------";

    echo "<br>Conteúdo do array nome_perturbacao_array: ";
    var_dump($nome_perturbacao_array);
    echo "Grupo: " . $nome_perturbacao_bd . "<br>";

    echo "Conteúdo do array nome_grupo_array: ";
    var_dump($nome_grupo_array);
    echo "Grupo: " . $nome_grupo_bd . "<br>";*/

    // Verifica se um arquivo de imagem foi enviado
    if ($_FILES['img_artigo']['error'] == UPLOAD_ERR_OK && !empty($_FILES['img_artigo']['tmp_name'])) {
        $img_artigo_temp = $_FILES['img_artigo']['tmp_name'];
        $img_artigo_nome = $_FILES['img_artigo']['name'];
        
        // Move o arquivo para o diretório de destino
        $destino = "../imgs/artigos/" . $img_artigo_nome;
        if (move_uploaded_file($img_artigo_temp, $destino)) {
            // O upload foi bem-sucedido, salve o nome do arquivo no banco de dados
            $img_artigo = $img_artigo_nome;
        } else {
            // Ocorreu um erro ao mover o arquivo
            echo "Erro ao fazer upload da imagem.";
            exit();
        }
    } else {
        // Nenhum arquivo de imagem foi enviado, use um valor padrão ou deixe-o em branco
        $img_artigo = ""; // Ou defina um valor padrão, se desejar
    }



    // Buscar IDs da perturbação e do grupo
    $query_perturbacao = "SELECT perturbacoes_id FROM perturbacoes WHERE nome='$nome_perturbacao_bd'";
    $query_grupo = "SELECT grupos_perturbacoes_id FROM grupos_perturbacoes WHERE nome='$nome_grupo_bd'";

    echo "<br>Grupo: " . $query_perturbacao . "<br>";
    echo "Grupo: " . $query_grupo . "<br>";

    $query_perturbacao_run = mysqli_query($conn, $query_perturbacao);
    $query_grupo_run = mysqli_query($conn, $query_grupo);

    echo "<br>Resultado query_perturbacao_run: ";
    var_dump($query_perturbacao_run);

    if (mysqli_num_rows($query_perturbacao_run) > 0 && mysqli_num_rows($query_grupo_run) > 0) {
        $perturbacao_id = mysqli_fetch_assoc($query_perturbacao_run)['perturbacoes_id'];
        $grupo_id = mysqli_fetch_assoc($query_grupo_run)['grupos_perturbacoes_id'];

        $query_juncao = "SELECT juncao_perturbacoes_id FROM juncao_perturbacoes WHERE perturbacoes_id='$perturbacao_id' AND grupos_perturbacoes_id='$grupo_id'";
        $query_juncao_run = mysqli_query($conn, $query_juncao);

        if (mysqli_num_rows($query_juncao_run) > 0) {
            $juncao_perturbacoes_id = mysqli_fetch_assoc($query_juncao_run)['juncao_perturbacoes_id'];

            // Inserir na base de dados
            $query_artigo = "INSERT INTO artigos (titulo, data_publicacao, autor, img_artigo, fonte, juncao_perturbacoes_id) 
            VALUES ('$titulo','$data_publicacao','$autor','$img_artigo', '$fonte', '$juncao_perturbacoes_id')";
            $query_artigo_run = mysqli_query($conn, $query_artigo);

            if ($query_artigo_run) {
                $artigo_id = mysqli_insert_id($conn); // Obtém o ID do artigo inserido

                foreach ($pontos as $index => $ponto) {
                    $texto_atual = $texto[$index]; // Use o índice do loop para acessar o texto correspondente
                    $query_conteudo = "INSERT INTO conteudo_artigo (artigo_id, ponto, texto) 
                                       VALUES ('$artigo_id','$ponto','$texto_atual')";
                    mysqli_query($conn, $query_conteudo);
                }

                echo "Artigo e conteúdo inseridos com sucesso";
                header('Location: .');
            } else {
                echo "Erro ao inserir artigo: " . mysqli_error($conn);
                echo "Artigo: " . $artigo_id . "<br>";
                echo "Ponto: " . $ponto_atual . "<br>";
                echo "Texto: " . $texto_atual . "<br>";
            }
        } else {
            echo "Não foi possível encontrar IDs para perturbação e grupo";
            echo "Perturbação: " . $nome_perturbacao_bd . "<br>";
            echo "Grupo: " . $nome_grupo_bd . "<br>";
        }
    }
}
?>