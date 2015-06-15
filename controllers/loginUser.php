<?php
include_once '../includes/db_connect.php';
include_once '../includes/arf_config.php';

// get email and password from loginForm.php
$user_email = $_POST['user_email'];
$user_password = $_POST['user_password'];

$sql = $db->prepare("SELECT id, firstname, email, password_digest, salt FROM users"
        . " WHERE email='$user_email'");
$sql->execute();

// specify that the returned array is an associative array
$result = $sql->setFetchMode(PDO::FETCH_ASSOC);

// get the user
$row = $sql->fetch();
if ($row['password_digest'] == "") {
    // redirect back to form
    header('Location: ../views/loginForm.php');
} 

$returned_digest = $row['password_digest'];
$returned_salt = $row['salt'];

$login_password_digest = hash('sha512', $user_password . $returned_salt);

if ($returned_digest == $login_password_digest) {
    // get user id
    $user_id = $row['id'];
    
    // create session
    session_start();
    $_SESSION['firstname'] = $row['firstname'];
    $_SESSION['user_id'] = $row['id'];
    //$_SESSION['user_id'] = $user_id;
    $_SESSION['email'] = $row['email'];
    
    // redirect
    header('Location: ../index.php');
} else {
    // redirect
    header('Location: ../views/loginForm.php');
}