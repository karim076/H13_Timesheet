<?php
session_start();
if(!isset($_SESSION['user_id']))
{
    $msg="Je moet eerst inloggen!"; 
    header("Location:login.php?msg=$msg");
    exit;
}

$action = $_POST["action"];
if($action == 'create') 
{
    //Validatie
    $dates = $_POST['date'];
    if(empty($dates))
    {
        $errors[] = "Vul een datum in!";
    }

    $duration = $_POST['duration'];
    if(empty($duration))
    {
        $errors[] = "Vul een duur in!";
    }

    $department = $_POST['department'];
    if(empty($department))
    {
        $errors[] = "Vul een afdeling in!";
    }

    //Evt. errors dumpen
    if(isset($errors))
    {
        var_dump($errors);
        die();
    }
    //1. Verbinding
    require_once 'conn.php';
    $user = $_SESSION['user_id'];
    //2. Query
    $query = "INSERT INTO logs(user,dates,duration,department) VALUES(:user,:dates,:duration,:department)";
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
}

if($action == "update")
{

}

if($action == "delete")
{

}
