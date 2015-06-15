<?php

include_once '../includes/arf_config.php';

session_start();

// delete all images associatied with the user
$model_images->delete_user_images($_GET['id']);

// delete all posts associated with the user
$model_animal_posts->delete_user_posts($_GET['id']);

// delete all messages associated with the user
$model_messages->delete_user_messages($_GET['id']);

// finally delete user and then redirect
if ($_GET['admin'] == 'true') {
    $user_id_to_delete = $_GET['id'];
    $model_users->delete_user($user_id_to_delete);
    // redirect back to admin page
    header('Location: ../views/showAdmin.php');
} else {
    // if user hit delete account from their account page
    $model_users->delete_user($_SESSION['user_id']);
    // redirect to logout page
    header('Location: logoutUser.php');
}



