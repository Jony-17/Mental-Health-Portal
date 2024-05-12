<?php
session_start();
require_once ("../../../conn/conn.php");

if(isset($_POST['delete_btn']))
{
    $ted_talks_id = $_POST['delete_id'];

    $query = "DELETE FROM ted_talks WHERE ted_talks_id='$ted_talks_id' ";
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