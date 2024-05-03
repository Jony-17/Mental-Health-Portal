<?php
session_start();
require_once ("../../../conn/conn.php");

if(isset($_POST['inserirbtn']))
{
    $perturbacao = $_POST['perturbacao'];
    $numero = $_POST['numero'];
    $factos = $_POST['factos'];
    $explicacao = $_POST['explicacao'];

    $nome_query = "SELECT * FROM factos_10 WHERE perturbacoes_id='$perturbacao' AND nº='$numero' AND factos='$facto' AND descricao='$explicacao' ";
    $nome_query_run = mysqli_query($conn, $nome_query);
    if(mysqli_num_rows($nome_query_run) > 0)
    {
        $_SESSION['status'] = "Facto já existente.";
        $_SESSION['status_code'] = "error";
        header('Location: .');  
    }
    else
    {
    if($perturbacao && $numero && $factos && $explicacao)
    {
        $query = "INSERT INTO factos_10 (perturbacoes_id,nº,factos,descricao) VALUES ('$perturbacao','$numero','$factos','$explicacao')";
        $query_run = mysqli_query($conn, $query);
    
        if($query_run)
            {
                // echo "Saved";
                $_SESSION['status'] = "Facto inserido com sucesso";
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
            $_SESSION['status'] = "Não foi inserida qualquer facto";
            $_SESSION['status_code'] = "warning";
            header('Location: .');  
        }
    }
}

?>