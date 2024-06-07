<?php
    while($row = mysqli_fetch_assoc($query)){
        $sql2 = "SELECT * FROM mensagens WHERE (incoming_msg_id = {$row['unique_id']}
                OR outgoing_msg_id = {$row['unique_id']}) AND (outgoing_msg_id = {$outgoing_id} 
                OR incoming_msg_id = {$outgoing_id}) ORDER BY msg_id DESC LIMIT 1";
        $query2 = mysqli_query($conn, $sql2);
        $row2 = mysqli_fetch_assoc($query2);
        (mysqli_num_rows($query2) > 0) ? $result = $row2['msg'] : $result ="Sem mensagens";
        (strlen($result) > 28) ? $msg =  substr($result, 0, 28) . '...' : $msg = $result;

        $img_perfil = !empty($row['img_perfil']) ? $row['img_perfil'] : 'teste.jpeg';

        if(isset($row2['outgoing_msg_id'])){
            ($outgoing_id == $row2['outgoing_msg_id']) ? $you = "Tu: " : $you = "";
        }else{
            $you = "";
        }
        ($outgoing_id == $row['unique_id']) ? $hid_me = "hide" : $hid_me = "";
/*chat.php*/
        $output .= '<a href="chat.php?utilizador_id='. $row['unique_id'] .'">
                    <div class="content">
                    <img src="../../areacliente/registo/imgs/' . $img_perfil . '" alt="">
                    <div class="details">
                        <span>'. $row['nome']. '</span>
                        <p>'. $you . $msg .'</p>
                    </div>
                    </div>
                </a>';
    }
?>