<?php
    session_start();
    if(isset($_SESSION['user_id']))
    {
        die("Kan niet registreren je bent al ingelogd");    
    }
    $username = $_POST['username'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $passwordRetry = $_POST['passwordRetry'];
    # kijkt of het email geldig is
    if(filter_var($email,FILTER_VALIDATE_EMAIL) === false)
    {
        die('Email is ongeldig!');
    }
    # hashing
    if ($password != $passwordRetry)
    {
        die()
    }
    $hash = password_hash($password)
?>