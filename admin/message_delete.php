<?php
    require_once'../db.php';
    $id = $_GET['msg_id'];

    $delete_msg = "DELETE FROM guest_messages WHERE id = $id";
    mysqli_query($db_conect,$delete_msg);
    header('location: guest_message_show.php');

?>