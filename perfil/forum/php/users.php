<?php
    session_start();
    require_once("../../../conn/conn.php");
    $outgoing_id = $_SESSION['unique_id'];
    $sql = "SELECT * FROM utilizadores WHERE NOT unique_id = {$outgoing_id} AND admin != 1 ORDER BY utilizador_id DESC";
    $query = mysqli_query($conn, $sql);
    $output = "";
    if(mysqli_num_rows($query) == 0){
        $output .= "Não há utilizadores registados no chat";
    }elseif(mysqli_num_rows($query) > 0){
        include_once "data.php";
    }
    echo $output;
?>