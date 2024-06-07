<?php 
    session_start();
    if(isset($_SESSION['unique_id'])){
        require_once("../../../conn/conn.php");
        $outgoing_id = $_SESSION['unique_id'];
        $incoming_id = mysqli_real_escape_string($conn, $_POST['incoming_id']);
        $output = "";
        $sql = "SELECT * FROM mensagens LEFT JOIN utilizadores ON utilizadores.unique_id = mensagens.outgoing_msg_id
                WHERE (outgoing_msg_id = {$outgoing_id} AND incoming_msg_id = {$incoming_id})
                OR (outgoing_msg_id = {$incoming_id} AND incoming_msg_id = {$outgoing_id}) ORDER BY msg_id";
        $query = mysqli_query($conn, $sql);
        if(mysqli_num_rows($query) > 0){
            while($row = mysqli_fetch_assoc($query)){
                $img_perfil = !empty($row['img_perfil']) ? $row['img_perfil'] : 'teste.jpeg';

                if($row['outgoing_msg_id'] === $outgoing_id){
                    $output .= '<div class="chat outgoing">
                                <div class="details">
                                    <p>'. $row['msg'] .'</p>
                                </div>
                                </div>';
                }else{
                    $output .= '<div class="chat incoming">
                            <img src="../../areacliente/registo/imgs/' . $img_perfil . '" alt="">

                                <div class="details">
                                    <p>'. $row['msg'] .'</p>
                                </div>
                                </div>';
                }
            }
        }else{
            $output .= '<div class="text">Não há mensagens disponíveis. Assim que uma mensagem for enviada, irá aparecer aqui.</div>';
        }
        echo $output;
    }else{
        header("location: ../login.php");
    }

?>