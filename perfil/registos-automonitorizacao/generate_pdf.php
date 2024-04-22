<?php
require_once ("../../conn/conn.php");
require_once 'tcpdf/tcpdf.php';

// Verifica se a solicitação é para exportar para PDF
if (isset($_POST['export_pdf'])) {
    // Verifica se a sessão do usuário está definida
    session_start();
    if (isset($_SESSION['id_utilizador'])) {
        // Obtém o ID do usuário da sessão
        $utilizador_id = $_SESSION['id_utilizador'];

        // Consulta SQL para buscar o nome do usuário
        $query_nome = "SELECT nome FROM utilizadores WHERE utilizador_id = $utilizador_id";
        $result_nome = mysqli_query($conn, $query_nome);

        if ($result_nome && mysqli_num_rows($result_nome) > 0) {
            $row_nome = mysqli_fetch_assoc($result_nome);
            $nome_utilizador = $row_nome['nome'];
        } else {
            $nome_utilizador = "Utilizador Desconhecido";
        }

        // HTML da tabela
        ob_start(); // Inicia o buffer de saída
        ?>
        <h1>Registos de Automonitorização - <?php echo $nome_utilizador; ?></h1>
        <div style="padding: 20px;">
            <table border="1" align="center">
                <tr>
                    <th>Pensamento</th>
                    <th>Comportamento</th>
                    <th>Sentimentos</th>
                    <th>Quando</th>
                    <th>Pensamento Alternativo</th>
                    <th>Comportamento Alternativo</th>
                </tr>
                <?php
                // Consulta SQL para buscar os registros
                $query = "SELECT * FROM registos WHERE utilizador_id = $utilizador_id";
                $result = mysqli_query($conn, $query);
                if ($result && mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>{$row['pensamento']}</td>";
                        echo "<td>{$row['comportamento']}</td>";
                        echo "<td>{$row['sentimentos']}</td>";
                        echo "<td>{$row['quando']}</td>";
                        echo "<td>{$row['pensamento_alternativo']}</td>";
                        echo "<td>{$row['comportamento_alternativo']}</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='6'>Não há registos para exibir.</td></tr>";
                }

                ?>
            </table>
        </div>
        <?php

        // Obtém o conteúdo do buffer de saída e limpa o buffer
        $html = ob_get_clean();

        // Cria o objeto TCPDF
        $pdf = new TCPDF('L', 'mm', 'A4', true, 'UTF-8', true);

        $pdf->SetTitle('Registos de Automonitorização');

        $pdf->AddPage();

        $pdf->SetFont('helvetica', '', 16);

        // Escreve o conteúdo HTML no PDF, centralizando a tabela
        $pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

        // Define o nome do arquivo de download com base no nome do utilizador
        $nome_arquivo = 'registo_automonitorizacao_' . $nome_utilizador . '.pdf';

        // Gera o PDF no navegador
        $pdf->Output($nome_arquivo, 'D');
    } else {
        echo "Sessão do utilizador não está definida.";
    }
}
?>