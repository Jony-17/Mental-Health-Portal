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
        // Consulta SQL para o utilizador verificar o email fornecido
        $query = "SELECT * FROM utilizadores WHERE email='$email'";
        $query_run = mysqli_query($conn, $query);

        if (mysqli_num_rows($query_run) === 1) {
            $row = mysqli_fetch_assoc($query_run);

            // Verifica se a senha fornecida corresponde à senha armazenada na base de dados
            if (password_verify($password, $row['password'])) {
                // Se a Senha for correta, inicia a sessão e redireciona para a página de sucesso
                $_SESSION['email'] = $row['email'];
                $_SESSION['nome_user'] = $row['nome'];
                $_SESSION['id_utilizador'] = $row['utilizador_id'];
                $_SESSION['admin'] = $row['admin'];
                $_SESSION['unique_id'] = $row['unique_id'];

                // Redireciona para a URL armazenada na sessão ou para a página padrão
                if (isset($_SESSION['redirect_url'])) {
                    $redirect_url = $_SESSION['redirect_url'];
                    unset($_SESSION['redirect_url']); // Limpa a URL de redirecionamento armazenada na sessão
                    header("Location: $redirect_url");
                } else {
                    if ($_SESSION['admin'] == "1") {
                        header('Location: ../../admin/');
                    } else {
                        header('Location: ../../paginainicial/');
                    }
                }
                exit();
            } else {
                // Senha incorreta
                header('Location: index.php?error=Credenciais Incorretas');
                exit();
            }
        } else {
            // Utilizador não encontrado
            header('Location: index.php?error=Credenciais Incorretas');
            exit();
        }
    }
}
?>
