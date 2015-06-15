<?php
include_once '../includes/arf_config.php';

session_start();
$sender_id = $_SESSION['user_id'];

if (isset($_POST['recipient_id']) && isset($_POST['message'])) {
    $recipient_id = $_POST['recipient_id'];
    //$message = $_POST['message'];
    $message = $arf->escape_string($_POST['message']);
    $is_read = "unread";

    $fields = array(
        'sender_id' => $sender_id,
        'recipient_id' => $recipient_id,
        'message' => $message,
        'is_read' => $is_read
    );

    $last_id = $model_messages->insert_message($fields);
} else if (isset($_GET['recipient_id'])) {
    
}

// redirect
header('Location: ../index.php');