<?php
session_start();
require_once ("../../../conn/conn.php");

if(isset($_POST['inserirbtn']))
{
    $pergunta = $_POST['pergunta'];
    $resposta = $_POST['resposta'];

    $nome_query = "SELECT * FROM perguntas WHERE pergunta='$pergunta' AND resposta='$resposta' ";
    $nome_query_run = mysqli_query($conn, $nome_query);
    if(mysqli_num_rows($nome_query_run) > 0)
    {
        $_SESSION['status'] = "Pergunta e resposta já existente.";
        $_SESSION['status_code'] = "error";
        header('Location: .');  
    }
    else
    {
    if($pergunta && $resposta)
    {
        $query = "INSERT INTO perguntas (pergunta,resposta) VALUES ('$pergunta','$resposta')";
        $query_run = mysqli_query($conn, $query);
    
        if($query_run)
            {
                // echo "Saved";
                $_SESSION['status'] = "Pergunta e resposta inserida com sucesso";
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
            $_SESSION['status'] = "Não foi inserida qualquer pergunta e resposta";
            $_SESSION['status_code'] = "warning";
            header('Location: .');  
        }
    }
}

?>