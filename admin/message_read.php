<?php
    require_once'../db.php';
    $id = $_GET['msg_id'];

    $update_msg = "UPDATE guest_messages SET read_status = 2 WHERE id = $id";
    mysqli_query($db_conect,$update_msg);
    header('location: guest_message_show.php');

?>