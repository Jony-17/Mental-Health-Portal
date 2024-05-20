<?php
session_start();
require_once ("../../../conn/conn.php");

if (isset($_POST['inserirbtn'])) {
    $titulo = $_POST['titulo'];
    $data_publicacao = $_POST['data_publicacao'];
    $autor = $_POST['autor'];
    $conteudo_texto = $_POST['conteudo_texto'];
    $pontos = $_POST['ponto'];
    $texto = $_POST['texto'];

    // Verifica se um arquivo de imagem foi enviado
    if ($_FILES['img_noticia']['error'] == UPLOAD_ERR_OK && !empty($_FILES['img_noticia']['tmp_name'])) {
        $img_noticia_temp = $_FILES['img_noticia']['tmp_name'];
        $img_noticia_nome = $_FILES['img_noticia']['name'];
        
        // Move o arquivo para o diretório de destino
        $destino = "../imgs/noticias/" . $img_noticia_nome;
        if (move_uploaded_file($img_noticia_temp, $destino)) {
            // O upload foi bem-sucedido, salve o nome do arquivo no banco de dados
            $img_noticia = $img_noticia_nome;
        } else {
            // Ocorreu um erro ao mover o arquivo
            echo "Erro ao fazer upload da imagem.";
            exit();
        }
    } else {
        // Nenhum arquivo de imagem foi enviado, use um valor padrão ou deixe-o em branco
        $img_noticia = ""; // Ou defina um valor padrão, se desejar
    }



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