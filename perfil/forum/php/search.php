<?php
    session_start();
    require_once("../../../conn/conn.php");

    $outgoing_id = $_SESSION['unique_id'];
    $searchTerm = mysqli_real_escape_string($conn, $_POST['searchTerm']);

    $sql = "SELECT * FROM utilizadores WHERE NOT unique_id = {$outgoing_id} AND (nome LIKE '%{$searchTerm}%') ";
    $output = "";
    $query = mysqli_query($conn, $sql);
    if(mysqli_num_rows($query) > 0){
        include_once "data.php";
    }else{
        $output .= 'Não existe nenhum utilizador com esse nome.';
    }
    echo $output;
?>