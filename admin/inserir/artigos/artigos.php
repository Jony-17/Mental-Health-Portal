<?php
session_start();
require_once ("../../../conn/conn.php");

if (isset($_POST['inserirbtn'])) {
    $titulo = $_POST['titulo'];
    $descricao = $_POST['descricao'];
    $data_publicacao = $_POST['data_publicacao'];
    $autor = $_POST['autor'];
    $img_artigo = $_POST['img_artigo'];
    $conteudo_texto = $_POST['conteudo_texto'];
    $nome_perturbacao = $_POST['perturbacao'];
    $nome_grupo = $_POST['grupo_perturbacao'];
    $pontos = $_POST['ponto'];
    $texto = $_POST['texto'];

    // Separar os nomes das perturbações e grupos
    $nome_perturbacao_array = explode(' - ', $nome_perturbacao);
    $nome_grupo_array = explode(' - ', $nome_grupo);
    $nome_perturbacao_bd = $nome_perturbacao_array[0];
    $nome_grupo_bd = $nome_grupo_array[0];

    // Buscar IDs da perturbação e do grupo
    $query_perturbacao = "SELECT perturbacoes_id FROM perturbacoes WHERE nome='$nome_perturbacao_bd'";
    $query_grupo = "SELECT grupos_perturbacoes_id FROM grupos_perturbacoes WHERE nome='$nome_grupo_bd'";

    $query_perturbacao_run = mysqli_query($conn, $query_perturbacao);
    $query_grupo_run = mysqli_query($conn, $query_grupo);

    if (mysqli_num_rows($query_perturbacao_run) > 0 && mysqli_num_rows($query_grupo_run) > 0) {
        $perturbacao_id = mysqli_fetch_assoc($query_perturbacao_run)['perturbacoes_id'];
        $grupo_id = mysqli_fetch_assoc($query_grupo_run)['grupos_perturbacoes_id'];

        // Inserir na base de dados
        $query_artigo = "INSERT INTO artigos (titulo, descricao, data_publicacao, autor, img_artigo, conteudo_texto, juncao_perturbacoes_id) 
            VALUES ('$titulo','$descricao','$data_publicacao','$autor','$img_artigo','$conteudo_texto','$juncao_perturbacoes_id')";
        $query_artigo_run = mysqli_query($conn, $query_artigo);

        if ($query_artigo_run) {
            $artigo_id = mysqli_insert_id($conn); // Obtém o ID do artigo inserido

            // Inserir na tabela conteudo_artigo
            foreach ($pontos as $index => $ponto) {
                $ponto_atual = $pontos[$index]; // Use the loop index
                $texto_atual = $texto[$index]; // Use the loop index
            
                $query_conteudo = "INSERT INTO conteudo_artigo (artigo_id, ponto, texto) 
                                   VALUES ('$artigo_id','$ponto_atual','$texto_atual')";
                mysqli_query($conn, $query_conteudo);
            }
            

            echo "Artigo e conteúdo inseridos com sucesso";
            header('Location: ../..');
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
?>