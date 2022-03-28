<!doctype html>
<html lang="nl">

<head>
    <title>TimeSheet / Logs / Nieuw</title>
    <?php require_once '../head.php'; ?>
</head>

<body>

    <?php require_once '../header.php'; 
    if(!isset($_SESSION['user_id']))
    {
        $msg = "Je moet eerst inloggen!";
        header("Location: $base_url/login.php?msg=$msg");
        exit;
    }
    require_once '../backend/conn.php';
    $id = $_GET['id'];

    $query = "SELECT * FROM logs WHERE id = :id";

    $statement = $conn->prepare($query);

    $statement->execute([":id" => $id]);
    
    $edit = $statement->fetch(PDO::FETCH_ASSOC);
     ?>
    <div class="container">

        <h1>TimeSheet / Logs / Nieuw</h1>

        <form action="../backend/logsController.php" method="POST">
            <input type="hidden" name="action" value="update">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
        
            <div class="form-group">
                <label for="dates">Datum:</label>
                <?php echo "<input type='date' name='dates' id='dates' class='form-input' value='{$edit['dates']}'>"?>
            </div>
            <div class="form-group">
                <label for="duration">Duur (uren):</label>
                <?php echo "<input type='number' name='duration' id='duration' class='form-input' value='{$edit['duration']}'>"?>
            </div>
            <div class="form-group">
                <label for="department">Afdeling:</label>
                <select name="department" id= "department">
                    <option value="" > - Kies afdeling - </option>
                    <option value="attacties" <?= ($edit['department'] == "attacties")? "selected" : "attacties";?>>Attracties (gastheer/vrouw)</option>
                    <option value="horeca" <?= ($edit['department'] == "horeca")? "selected" : "horeca";?>>Restaurant en cafés</option>
                    <option value="techniek" <?= ($edit['department'] == "techniek")? "selected" : "techniek";?>>Technische dienst</option>
                    <option value="groen" <?= ($edit['department' ]== "groen")? "selected" : "groen";?>>Groenbeheer</option>
                    <option value="klantenservice" <?= ($edit['department'] == "klantenservice")? "selected" : "klantenservice";?>>Klantenservice</option>
                    <option value="personeel" <?= ($edit['department'] == "personeel")? "selected" : "personeel";?>>Personeel en HR</option>
                    <option value="inkoop" <?= ($edit['department'] == "inkoop")? "selected" : "inkoop";?>>inkoop</option>
                </select>
            </div>


            <input type="submit" value="Log opslaan">


    </div>

</body>

</html>