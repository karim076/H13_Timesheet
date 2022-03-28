<?php 
session_start();
session_destroy();
require_once "backend/conn.php";
header("location: $base_url");

?>