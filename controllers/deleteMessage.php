<?php

include_once '../includes/arf_config.php';

$model_messages->delete_message($_GET['id']);

// redirect
header('Location: ../views/showUser.php');

