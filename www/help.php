<?php
session_start();
if ((isset($_SESSION["fname"])) && (isset($_SESSION["lname"]))) {
    echo "Do you need help, " . $_SESSION['fname'] . " " . $_SESSION['lname'] . "?";
    echo "<br>";
    echo '<a href="logout.php">Log out</a>.';
} else {
    echo 'Please log in <a href="login.php">here</a>.';
}






?>