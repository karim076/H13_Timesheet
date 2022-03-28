<?php
session_start();
if(!isset($_SESSION['user_id']))
{
    $msg="Je moet eerst inloggen!"; 
    header("Location: ../login.php?msg=$msg");
    exit;
}
?>
<!doctype html>
<html lang="nl">
<head>
    <title>TimeSheet / Logs / Nieuw</title>
    <?php require_once '../head.php'; ?>
</head>

<body>

    <?php require_once '../header.php'; ?>
    <div class="container">

        <h1>TimeSheet / Logs / Nieuw</h1>

        <form action="../backend/logsController.php" method="POST">
            <input type="hidden" name="action" value="create">
        
            <div class="form-group">
                <label for="date">Datum:</label>
                <input type="date" name="date" id="date" class="form-input" value="<?php echo date("d-m-Y"); ?>">
            </div>
            <div class="form-group">
                <label for="duration">Duur (uren):</label>
                <input type="number" name="duration" id="duration" class="form-input">
            </div>
            <div class="form-group">
                <label for="department">Afdeling:</label>
                <select id="cars" name="department">
                    <option value="">> - Filter op afdeling -</option>
                    <option value="attracties">Attracties (gastheer/vrouw)</option>
                    <option value="horeca">Restaurant en cafés</option>
                    <option value="techniek">Technische dienst</option>
                    <option value="groen">Groenbeheer</option>
                    <option value="klantenservice">Klantenservice</option>
                    <option value="personeel">Personeel en HR</option>
                    <option value="inkoop">Inkoop</option>
                </select>
            </div>

            <input type="submit" value="Log opslaan">


    </div>

</body>

</html>
