<?php
session_start();
require_once ("../../../conn/conn.php");

if(isset($_POST['inserirbtn']))
{
    $nome = $_POST['nome'];
    $imagem = $_POST['imagem'];
    $explicacao = $_POST['explicacao'];
    $texto = $_POST['texto'];

    $nome_query = "SELECT * FROM quiz_nome WHERE nome='$nome' AND img_quiz='$imagem' AND explicacao_quiz='$explicacao' AND texto_informacao='$texto' ";
    $nome_query_run = mysqli_query($conn, $nome_query);
    if(mysqli_num_rows($nome_query_run) > 0)
    {
        $_SESSION['status'] = "Quizz já existente.";
        $_SESSION['status_code'] = "error";
        header('Location: .');  
    }
    else
    {
    if($nome && $imagem && $explicacao && $texto)
    {
        $query = "INSERT INTO quiz_nome (nome,img_quiz,explicacao_quiz,texto_informacao) VALUES ('$nome','$imagem','$explicacao','$texto')";
        $query_run = mysqli_query($conn, $query);
    
        if($query_run)
            {
                // echo "Saved";
                $_SESSION['status'] = "Quizz inserido com sucesso";
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
            $_SESSION['status'] = "Não foi inserida qualquer quizz";
            $_SESSION['status_code'] = "warning";
            header('Location: .');  
        }
    }
}

?>