<?php require_once 'backend/conn.php';
?>

<header>
    <div class="container">
        <nav>
            <a href="<?php echo $base_url; ?>/index.php">Home</a> |
            <a href="<?php echo $base_url; ?>/logs/index.php">Logs</a>
        </nav>
        <div>
        <div class="space1">
            <?php
            error_reporting(E_ERROR | E_WARNING | E_PARSE);
            session_start(); 
            if(!isset($_SESSION['user_id'])): ?>
                <p><a href="<?php echo $base_url; ?>/login.php">Inloggen</a></p>
                <p>-|-</p>
                <p><a href="<?php echo $base_url; ?>/register.php">Register</a></p>
            <?php else: ?>
                <?php echo "<div class='space'>Welkom, <strong>", $_SESSION['name'], "|</strong></div>"?>
                <p><a href="<?php echo $base_url; ?>/logout.php">Uitloggen</a></p>
            <?php endif; ?>
            </div>
        </div>
    </div>
</header>
