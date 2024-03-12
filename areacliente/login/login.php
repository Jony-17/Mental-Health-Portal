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

    if (empty($email)) {
        header("Location: index.php?error=Email necessário");
        exit();
    } else if (empty($password)) {
        header("Location: index.php?error=Password necessária");
        exit();
    } else {
        // Consulta o banco de dados para o usuário com o email fornecido
        $query = "SELECT * FROM utilizadores WHERE email='$email'";
        $query_run = mysqli_query($conn, $query);

        if (mysqli_num_rows($query_run) === 1) {
            $row = mysqli_fetch_assoc($query_run);

            // Verifica se a senha fornecida corresponde à senha armazenada no banco de dados
            if (password_verify($password, $row['password'])) {
                // Senha correta, inicia a sessão e redireciona para a página de sucesso
                $_SESSION['email'] = $row['email'];
                $_SESSION['nome_user'] = $row['nome'];
                $_SESSION['id_utilizador'] = $row['utilizador_id'];
                $_SESSION['admin'] = $row['admin'];
                $_SESSION['unique_id'] = $row['unique_id'];

                if ($_SESSION['admin'] == "1") {
                    header('Location: ../../admin/index.php');
                    exit();
                } else if ($_SESSION['admin'] == "0") {
                    header('Location: ../../paginainicial/index.php');
                    exit();
                }
            } else {
                // Senha incorreta
                header('Location: index.php?error=Credenciais Incorretas');
                exit();
            }
        } else {
            // Usuário não encontrado
            header('Location: index.php?error=Credenciais Incorretas');
            exit();
        }
    }
}
?>