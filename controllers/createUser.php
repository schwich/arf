<?php
include_once '../includes/db_connect.php';
include_once '../includes/arf_config.php';

// values received from newUser form
$username = $_POST['username'];
$user_email = $_POST['user_email'];
$user_firstname = $_POST['user_firstname'];
$user_lastname = $_POST['user_lastname'];
$user_password = $_POST['user_password'];

// random salt
$random_salt = hash('sha512', uniqid(mt_rand(1, mt_getrandmax()), true));

// create salted password
$salted_password_digest = hash('sha512', $user_password . $random_salt);

// insert new user into the db
$sql = "INSERT INTO users (username, firstname, lastname, email, password_digest, salt) "
        . "VALUES ('$username', '$user_firstname', '$user_lastname', '$user_email', '$salted_password_digest', '$random_salt' )";


$db->exec($sql);

$new_user_id = $db->lastInsertId();

// login user
session_start();
$_SESSION['firstname'] = $_POST['user_firstname'];
$_SESSION['user_id'] = $new_user_id;
$_SESSION['email'] = $_POST['user_email'];

// redirect
header('Location: ../index.php');