<?php
session_start();
if(!isset($_SESSION['user_id']))
{
    $msg = "Je moet eerst inloggen!";
    header("Location: $base_url/login.php?msg=$msg");
    exit;
}
if($action == 'create')
{
    //Validatie
    $dating = $_POST['date'];
    if(empty($date))
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

    //2. Query
    $query="INSERT INTO logs(user,dates,duration,department) 
            VALUES(:user_ids:dating,:duration,:department)";
    //3. Prepare
    $statement=$conn->prepare($query);
    //4. Execute
    $statement->execute
    ([
        ":user" => $user_ids,
        ":dates" => $dating,
        ":duration" => $duration,
        ":melder" => $melder,
        ":department" => $department
    ]);
     //  

    header("location: http://localhost/Tweede%20Periode/H13_Timesheed/index.php");
    exit;
}

if($action == "update")
{

}

if($action == "delete")
{

}
