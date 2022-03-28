<?php
session_start();
if(!isset($_SESSION['user_id']))
{
    $msg="Je moet eerst inloggen!"; 
    header("Location:login.php?msg=$msg");
    exit;
}
$dates = $_POST['date'];
$duration = $_POST['duration'];
$department = $_POST['department'];
$user = $_SESSION['user_id'];
$action = $_POST["action"];
if($action == 'create') 
{
    //Validatie
    if(empty($dates))
    {
        $errors[] = "Vul een datum in!";
    }

    if(empty($duration))
    {
        $errors[] = "Vul een duur in!";
    }

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
    require_once 'conn.php';

    $query = "UPDATE logs SET date = :date, duration = :duration, department = :department, user = :user WHERE id = :id";

    $statement = $conn->prepare($query);

    $statement->execute([
        ":id" => $id,
        ":user" => $user,
        ":date" => $date,
        ":duration" => $duration,
        ":department" => $department,
    ]);
}

if($action == "delete")
{

}
