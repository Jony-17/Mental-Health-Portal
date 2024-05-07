<?php
session_start();
require_once ("../../../conn/conn.php");

if (isset($_POST['inserirbtn'])) {
    $titulo = $_POST['titulo'];
    $data_publicacao = $_POST['data_publicacao'];
    $autor = $_POST['autor'];
    $img_noticia = $_POST['img_noticia'];
    $conteudo_texto = $_POST['conteudo_texto'];
    $pontos = $_POST['ponto'];
    $texto = $_POST['texto'];


    $query = "INSERT INTO noticias (titulo, data_publicacao, autor, img_noticia, conteudo_texto) 
            VALUES ('$titulo','$data_publicacao','$autor','$img_noticia','$conteudo_texto')";
    $query_run = mysqli_query($conn, $query);

    if ($query_run) {
        $noticias_id = mysqli_insert_id($conn); // Obtém o ID do artigo inserido

        foreach ($pontos as $index => $ponto) {
            $texto_atual = $texto[$index]; // Use o índice do loop para acessar o texto correspondente
            $query_conteudo = "INSERT INTO conteudo_noticia (noticias_id, ponto, texto) 
                                       VALUES ('$noticias_id','$ponto','$texto_atual')";
            mysqli_query($conn, $query_conteudo);
        }

        echo "Artigo e conteúdo inseridos com sucesso";
        header('Location: .');
    } else {
        echo "Erro ao inserir artigo: " . mysqli_error($conn);
        echo "Artigo: " . $noticias_id . "<br>";
        echo "Ponto: " . $ponto_atual . "<br>";
        echo "Texto: " . $texto_atual . "<br>";
    }
}
?>