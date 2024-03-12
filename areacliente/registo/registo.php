<?php
session_start();
require_once("../../conn/conn.php");

// Define o fuso horário para Lisboa
date_default_timezone_set('Europe/Lisbon');

// Verifica se o método de requisição é POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifica se todos os campos do formulário foram enviados
    if (!empty($_POST['nome']) && !empty($_POST['emaill']) && !empty($_POST['passwordd']) && !empty($_POST['cpasswordd']) && !empty($_POST['genero'])) {
        // Recupera os dados do formulário e realiza a limpeza (para evitar ataques de SQL Injection)
        $nome = mysqli_real_escape_string($conn, $_POST['nome']);
        $email = mysqli_real_escape_string($conn, $_POST['emaill']);
        $password = mysqli_real_escape_string($conn, $_POST['passwordd']);
        $cpassword = mysqli_real_escape_string($conn, $_POST['cpasswordd']);
        $genero = mysqli_real_escape_string($conn, $_POST['genero']);

        // Verifica se o email já existe no banco de dados
        $sql_verificar = "SELECT * FROM utilizadores WHERE email='$email'";
        $result = $conn->query($sql_verificar);
        if ($result->num_rows > 0) {
            header("Location: index.php?error=Email já em uso");
        } else if ($_POST['passwordd'] != $_POST['cpasswordd']) { //se as palavras passes nao coincidirem
            header('Location: index.php?error=Passwords não coincidem');
        } else {
             // Gerar um unique_id único
             $ran_id = rand(time(), 100000000);

             // Hash da senha para armazenamento seguro no banco de dados
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            // Obtém a data e hora atuais
            $data_criacao = date("Y-m-d H:i:s");

            // Verifica se um arquivo de imagem foi enviado
            if ($_FILES['imagemperfil']['error'] == UPLOAD_ERR_OK && !empty($_FILES['imagemperfil']['tmp_name'])) {
                $imagemperfil_temp = $_FILES['imagemperfil']['tmp_name'];
                $imagemperfil_nome = $_FILES['imagemperfil']['name'];
                
                // Move o arquivo para o diretório de destino
                $destino = "imgs/" . $imagemperfil_nome;
                if (move_uploaded_file($imagemperfil_temp, $destino)) {
                    // O upload foi bem-sucedido, salve o nome do arquivo no banco de dados
                    $imagemperfil = $imagemperfil_nome;
                } else {
                    // Ocorreu um erro ao mover o arquivo
                    echo "Erro ao fazer upload da imagem.";
                    exit();
                }
            } else {
                // Nenhum arquivo de imagem foi enviado, use um valor padrão ou deixe-o em branco
                $imagemperfil = ""; // Ou defina um valor padrão, se desejar
            }

            // Prepara e executa a query SQL para inserir o novo registro
            $sql = "INSERT INTO utilizadores (unique_id, nome, email, password, genero, img_perfil, data_criacao)
            VALUES ('$ran_id', '$nome', '$email', '$hashed_password', '$genero', '$imagemperfil', '$data_criacao')";

            if ($conn->query($sql) === TRUE) {
                header('Location: index.php?success=Registo feito com sucesso');
                //header('Location: ../login/');
                exit();
            } else {
                echo "Erro: " . $sql . "<br>" . $conn->error;
            }
        }
    } else {
        header("Location: index.php?error=Dados insuficientes");
    }
} else {
    echo "Método de requisição inválido.";
}

// Fecha a conexão
$conn->close();
?>
