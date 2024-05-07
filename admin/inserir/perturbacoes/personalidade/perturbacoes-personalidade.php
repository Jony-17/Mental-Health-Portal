<?php
session_start();
require_once ("../../../../conn/conn.php");

if(isset($_POST['inserirbtn']))
{
    $nome = $_POST['nome'];
    $texto = $_POST['texto'];
    $sintomas = $_POST['sintomas'];
    $prevalencias = $_POST['prevalencias'];
    $ajuda = $_POST['ajuda'];

    $nome_query = "SELECT * FROM perturbacoes_personalidade WHERE nome='$nome' AND texto='$texto' AND sintomas_texto='$sintomas' AND prevalencias_texto='$prevalencias' AND ajuda_texto='$ajuda'";
    $nome_query_run = mysqli_query($conn, $nome_query);
    if(mysqli_num_rows($nome_query_run) > 0)
    {
        $_SESSION['status'] = "Perturbação já existente.";
        $_SESSION['status_code'] = "error";
        header('Location: .');  
    }
    else
    {
    if($nome && $texto && $sintomas && $prevalencias && $ajuda)
    {
        $query = "INSERT INTO perturbacoes_personalidade (nome,texto,sintomas_texto,prevalencias_texto,ajuda_texto) VALUES ('$nome','$texto','$sintomas','$prevalencias','$ajuda')";
        $query_run = mysqli_query($conn, $query);
    
        if($query_run)
            {
                // echo "Saved";
                $_SESSION['status'] = "Perturbação inserida com sucesso";
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
            $_SESSION['status'] = "Não foi inserida qualquer perturbação";
            $_SESSION['status_code'] = "warning";
            header('Location: .');  
        }
    }
}

?>