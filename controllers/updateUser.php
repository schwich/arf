<?php
include_once '../includes/arf_config.php';

$username = $_POST['username'];
$user_email = $_POST['user_email'];
$user_firstname = $_POST['user_firstname'];
$user_lastname = $_POST['user_lastname'];
$user_password = $_POST['user_password'];

session_start();
$user_id = $_SESSION['user_id'];

// random salt
$random_salt = hash('sha512', uniqid(mt_rand(1, mt_getrandmax()), true));

// create salted password
$salted_password_digest = hash('sha512', $user_password . $random_salt);

$data = array (
        'username' => $username,
        'email' => $user_email,
        'password_digest' => $salted_password_digest,
        'salt' => $random_salt,
        'firstname' => $user_firstname,
        'lastname' => $user_lastname
);

$model_users->update_user($data, $user_id);

// update session variables for user
session_start();
$_SESSION['email'] = $user_email;
$_SESSION['firstname'] = $user_firstname;

// redirect back to user page
header('Location: ../views/showUser.php');
