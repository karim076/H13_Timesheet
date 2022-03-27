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
    $query="INSERT INTO logs(user,attractie,type_,capaciteit) 
            VALUES(:user_ids:dating,:duration,:department)";
    //3. Prepare
    $statement=$conn->prepare($query);
    //4. Execute
    $statement->execute
    ([
        ":attractie" => $attractie,
        ":type_" => $type_,
        ":capaciteit" => $capaciteit,
        ":melder" => $melder,
        ":overigemelder" => $overigemelder,
        ":prioriteit" => $prioriteit
    ]);
     //  
     //      5. Haal de gegevens op (tip: je verwacht één resultaat, niet een lijst)
     $user = $statement->fetch(PDO::FETCH_ASSOC);
         //2. Check of je een resultaat krijgt (anders: account bestaat niet)
    //   If-statement, check of "$statement->rowCount()" kleiner is dan 1
    if ( $statement->rowCount() < 1)
    {
        die("Error:accountbestaatniet");
    }

    //3. Check of het ingevulde wachtwoord klopt met die uit de DB
    //   Gebruik hiervoor password_verify(), zie evt. http://php.net/password_verify
    if ( !password_verify($password,$user['password']))
    {
        die("Error:wacht woord niet juist!");
    }

    //4. Alles alles klopt: stop gebruikersgegevens in de session
    $_SESSION['user_ids'] = $user['id'];
    $_SESSION['user_name'] = $user["username"];
    $voorwaarden = true;
    header("location: http://localhost/Tweede%20Periode/H11_StoringApp/index.php");
    exit;
}

if($action == "update")
{

}

if($action == "delete")
{

}
