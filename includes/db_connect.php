<?php

/**
 * Include this file in order to access the $db object directly.
 */

include_once 'db_config.php';
$db = new PDO("mysql:host=" . HOST .";dbname=" . DATABASE, USER, PASSWORD);

$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
