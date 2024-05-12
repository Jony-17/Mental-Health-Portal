<?php
session_start();
require_once ("../../../conn/conn.php");

if(isset($_POST['delete_btn']))
{
    $factos_10 = $_POST['delete_id'];

    $query = "DELETE FROM factos_10 WHERE 10_factos_id='$factos_10' ";
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