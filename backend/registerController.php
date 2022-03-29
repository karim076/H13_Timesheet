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
        die("Voer het zelfde wachtwoord in!")
    }
    $hash = password_hash($password)
    if(isset($errors))
    {
        var_dump($errors);
        die();
    }
    //1. Verbinding
    require_once 'conn.php';
    //2. Query
    $query = "INSERT INTO user(user,dates,duration,department) VALUES(:user,:dates,:duration,:department)";
    //3. Prepare
    $statement=$conn->prepare($query);
    //4. Execute
    $statement->execute
    ([
        ":user" => $user,
        ":dates" => $dates,
        ":duration" => $duration,
        ":department" => $department
    ]);

    header("location: http://localhost/Tweede%20Periode/H13_Timesheed/index.php");
    exit;
?>