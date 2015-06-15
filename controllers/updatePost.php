<?php

include_once '../includes/arf_config.php';

// values received from the form 
$post_id = $_POST["post_id"];
$pet_name = $_POST["pet_name"];
$species = $_POST["species"];
$breed = $_POST["breed"];
$pet_from = $_POST["pet_from"];
$pet_bio = $_POST["pet_bio"];
$spayed = $_POST['spayed'];
$gender = $_POST['gender'];
$age = intval($_POST['age']);

session_start();
$user_id = $_SESSION["user_id"];

$data = array (
    'pet_name' => $pet_name,
    'species' => $species,
    'breed' => $breed,
    'pet_from' => $pet_from,
    'pet_bio' => $pet_bio,
    'spayed' => $spayed,
    'gender' => $gender,
    'age' => $age,
    'user_id' => $user_id
);

$model_animal_posts->update_post($data, $post_id);

// redirect back to user page
header('Location: ../views/showUser.php');