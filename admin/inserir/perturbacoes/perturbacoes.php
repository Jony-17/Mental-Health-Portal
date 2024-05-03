<?php
session_start();
require_once ("../../../conn/conn.php");

if(isset($_POST['inserirbtn']))
{
    $nome = $_POST['nome'];
    $texto = $_POST['texto'];
    $imagem = $_POST['imagem'];
    $banner = $_POST['banner'];

    $nome_query = "SELECT * FROM perturbacoes WHERE nome='$nome' AND texto='$texto' AND img_perturbacao='$imagem' AND banner_perturbacao='$banner' ";
    $nome_query_run = mysqli_query($conn, $nome_query);
    if(mysqli_num_rows($nome_query_run) > 0)
    {
        $_SESSION['status'] = "Perturbação já existente.";
        $_SESSION['status_code'] = "error";
        header('Location: .');  
    }
    else
    {
    if($nome && $texto && $imagem && $banner)
    {
        $query = "INSERT INTO perturbacoes (nome,texto,img_perturbacao,banner_perturbacao) VALUES ('$nome','$texto','$imagem','$banner')";
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