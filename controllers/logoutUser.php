<?php
include_once '..//includes/arf_config.php';

$arf->log_out_user();

// redirect back to home page
header('Location: ../index.php');