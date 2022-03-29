<?php session_start(); ?>

<!doctype html>
<html lang="nl">

<head>
    <title>TimeSheet</title>
    <?php require_once 'head.php'; ?>
</head>

<body>

    <?php require_once 'header.php'; ?>
    
    <div class="container">

        <h1>TimeSheet / Registere</h1>
        <?php
        if(isset($_GET['msg']))
        {
            echo "<div class='msg'>" . $_GET['msg'] . "</div>";
        }
        ?>

        <form action="backend/registerController.php" method="POST">
            <div class="form-group">
                <label for="username">Gebruikersnaam:</label>
                <input type="text" name="username" id="username" placeholder="gebruikers naam">
            </div>
            <div class="form-group">
                <label for="username">Naam:</label>
                <input type="text" name="username" id="username" placeholder="Gebruik je naam">
            </div>
            <div class="form-group">
                <label for="password">Wachtwoord:</label>
                <input type="password" name="password" id="password" placeholder="password">
            </div>
            <div class="form-group">
                <label for="passwordRetry">Wachtwoord opnieuw:</label>
                <input type="password" name="passwordRetry" id="passwordRetry" placeholder="password opnieuw">
            </div>
            <input type="submit" value="Registreer">
        </form>
    </div>

</body>

</html>