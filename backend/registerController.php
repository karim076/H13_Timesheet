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
        die("Voer het zelfde wachtwoord in!");
    }

    if(isset($errors))
    {
        var_dump($errors);
        die();
    }
    
    $hash = password_hash($password, PASSWORD_DEFAULT);
    //1. Verbinding
    require_once 'conn.php';
    
    //2. Query
    $query = "INSERT INTO users(name,username,password) VALUES(:name,:username,:password)";
    
    //3. Prepare
    $statement=$conn->prepare($query);
    //4. Execute
    $statement->execute
    ([
        ":name" => $name,
        ":username" => $username,
        ":password" => $hash
    ]);
    $msg = "Uw acount is Succesvol aangemaakt log nu in!";
    header("location: $base_url/login.php?msg=$msg");
    exit;
?>