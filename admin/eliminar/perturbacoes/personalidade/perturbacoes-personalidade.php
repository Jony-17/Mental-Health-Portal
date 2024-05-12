<?php
session_start();
require_once ("../../../../conn/conn.php");

if(isset($_POST['delete_btn']))
{
    $perturbacoes_pers = $_POST['delete_id'];

    $query = "DELETE FROM perturbacoes_personalidade WHERE perturbacoes_personalidade_id ='$perturbacoes_pers' ";
    $query_run = mysqli_query($conn, $query);

    if($query_run)
    {
        $_SESSION['status'] = "Peça eliminada";
        $_SESSION['status_code'] = "success";
        header('Location: .'); 
    }
    else
    {
        $_SESSION['status'] = "Peça não foi eliminada";       
        $_SESSION['status_code'] = "error";
        header('Location: .'); 
    }    
}
?>