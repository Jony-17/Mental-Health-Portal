<?php
session_start();
require_once("../../conn/conn.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $email = validate($_POST['emaill']);
    $password = validate($_POST['passwordd']);
    $cpassword = validate($_POST['cpasswordd']);

    if (empty($email)) {
        header("Location: index.php?error=Email necessário");
        exit();
    } else if (empty($password) || empty($cpassword)) {
        header("Location: index.php?error=As novas senhas são necessárias");
        exit();
    } else if ($password !== $cpassword) {
        header("Location: index.php?error=As novas senhas não coincidem");
        exit();
    } else {
        // Hash da nova senha para armazenamento seguro no banco de dados
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Atualiza a senha na tabela do banco de dados
        $update_query = "UPDATE utilizadores SET password='$hashed_password' WHERE email='$email'";
        $update_result = mysqli_query($conn, $update_query);
        
        if ($update_result) {
            // Redireciona para a página de sucesso ou para a página inicial
            header('Location: index.php?success=Senha atualizada com sucesso');
            exit();
        } else {
            // Se houver algum erro na atualização da senha
            header('Location: index.php?error=Erro ao atualizar a senha');
            exit();
        }
    }
}
?>