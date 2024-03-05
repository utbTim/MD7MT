<?php
session_start();

if (isset($_SESSION["fname"]) && isset($_SESSION["lname"])){
    echo "Help needed, " .$_SESSION['fname']." ".$_SESSION['lname']. "?";
    echo '<br>';
    echo '<a href="logout.php">Log Out</a>';
    } else
    echo '<a href="login.php">Log In</a>'
?>