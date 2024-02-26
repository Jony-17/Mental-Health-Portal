<?php
$servername="localhost";
$username="root";
$password="";
$dbname="portalsaudemental"; 
$conn = mysqli_connect($servername, $username, $password, $dbname);
if(!$conn)
{
	die("Erro ao estabalecer ligação à base de dados, " . mysqli_connect_error());
}
mysqli_set_charset($conn, "utf8");
?>
