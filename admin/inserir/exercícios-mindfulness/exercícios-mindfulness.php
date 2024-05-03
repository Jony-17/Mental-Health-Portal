<?php
session_start();
require_once ("../../../conn/conn.php");

if(isset($_POST['inserirbtn']))
{
    $autor = $_POST['autor'];
    $titulo = $_POST['titulo'];
    $data = $_POST['data'];
    $tempo = $_POST['tempo'];
    $imagem = $_POST['imagem'];
    $link = $_POST['link'];

    $nome_query = "SELECT * FROM ted_talks WHERE autor='$autor' AND titulo='$titulo' AND data='$data' AND tempo='$tempo' AND img_ted_talks='$imagem' AND link='$link'";
    $nome_query_run = mysqli_query($conn, $nome_query);
    if(mysqli_num_rows($nome_query_run) > 0)
    {
        $_SESSION['status'] = "Ted Talks já existente.";
        $_SESSION['status_code'] = "error";
        header('Location: .');  
    }
    else
    {
    if($autor && $titulo && $data && $tempo && $imagem && $link)
    {
        $query = "INSERT INTO ted_talks (autor, titulo, data, tempo, img_ted_talks, link) VALUES ('$autor','$titulo','$data','$tempo','$imagem','$link')";
        $query_run = mysqli_query($conn, $query);
    
        if($query_run)
            {
                // echo "Saved";
                $_SESSION['status'] = "Ted Talks inserida com sucesso";
                $_SESSION['status_code'] = "success";
                header('Location: .');
            }
            else 
            {
                $_SESSION['status'] = "Admin Profile Not Added";
                $_SESSION['status_code'] = "error";
                header('Location: .');  
            }
        }
        else 
        {
            $_SESSION['status'] = "Não foi inserida qualquer Ted Talks";
            $_SESSION['status_code'] = "warning";
            header('Location: .');  
        }
    }
}

?>