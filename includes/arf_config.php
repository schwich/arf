<?php

/**
 * This file includes all of the model classes and then constructs 
 * objects out of them
 */

require_once 'arf.php';
require_once 'db_connect.php';

require dirname(__DIR__) . "/models/AnimalPosts.php";

require dirname(__DIR__) . "/models/Images.php";

require dirname(__DIR__) . "/models/Messages.php";

require dirname(__DIR__) . "/models/Users.php";

$arf = new Arf($db);
$model_animal_posts = new AnimalPosts($db);
$model_images = new Images($db);
$model_messages = new Messages($db);
$model_users = new Users($db);



