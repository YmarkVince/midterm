<?php
session_start(); 


function getUsers() {
    return [
        ['email' => 'user1@email.com', 'password' => '1111'],
        ['email' => 'user2@email.com', 'password' => '1111'],
        ['email' => 'user3@email.com', 'password' => '1111'],
        ['email' => 'user4@email.com', 'password' => '1111'],
        ['email' => 'user5@email.com', 'password' => '1111'],
    ];
}


function validateLoginCredentials($email, $password) {
    $errors = [];
    if (empty($email)) {
        $errors[] = "Email is required."; 
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email format.";
    }
    if (empty($password)) {
        $errors[] = "Password is required.";
    }
    return $errors;
}


function checkLoginCredentials($email, $password, $users) {
    foreach ($users as $user) {
        if ($user['email'] === $email && $user['password'] === $password) {
            return true;
        }
    }
    return false;
}


function checkUserSessionIsActive() {
    if (isset($_SESSION['email']) && isset($_SESSION['current_page'])) {
        header('Location: ' . $_SESSION['current_page']);
        exit();
    }
}

?>
