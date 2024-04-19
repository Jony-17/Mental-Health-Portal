<?php
session_start();
require_once('../../conn/conn.php');

if (isset($_SESSION['id_utilizador'])) {
    $utilizador_id = $_SESSION['id_utilizador'];

    // Verifica se o ID do registro a ser editado foi passado através do URL
    if (isset($_GET['registos_id'])) {
        $registos_id = $_GET['registos_id'];

        // Aqui você deve obter os dados do registro a ser editado do banco de dados
        $query = "SELECT * FROM registos WHERE registos_id = $registos_id";
        $result = mysqli_query($conn, $query);

        if ($result && mysqli_num_rows($result) > 0) {
            $registro = mysqli_fetch_assoc($result);
            // Agora você tem os dados do registro para preencher o formulário de edição
        } else {
            echo "Registro não encontrado.";
            exit;
        }
    } else {
        echo "ID do registro não especificado.";
        exit;
    }

    if (isset($_POST['inserirbtn_edicao'])) {
        $Nota = $_POST['Nota'];

        // Aqui você deve atualizar os dados do registro existente no banco de dados
        $query = "UPDATE registos SET nota = '$Nota' WHERE registos_id = $registos_id";
        $query_run = mysqli_query($conn, $query);

        if ($query_run) {
            $_SESSION['status'] = "Dados atualizados com sucesso";
            $_SESSION['status_code'] = "success";
            header('Location: .');
            exit;
        } else {
            $_SESSION['status'] = "Erro ao atualizar os dados";
            $_SESSION['status_code'] = "error";
            header('Location: .');
            exit;
        }
    }
} else {
    echo "Sessão do utilizador não está definida.";
    exit;
}
?>
