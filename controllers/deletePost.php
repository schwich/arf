<?php

include_once '../includes/arf_config.php';

$model_images->delete_images($_GET['id']);

$model_animal_posts->delete_post($_GET['id']);

if ($_GET['admin'] == 'true') {
    // redirect to show admin page if you are admin
    header('Location: ../views/showAdmin.php');
} else {
    // redirect to show user page
    header('Location: ../views/showUser.php');
}

