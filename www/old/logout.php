<?php
// error_reporting(E_ALL);
// error_reporting(-1);
session_start();

if(session_status() == 2){
    // unset($_SESSION['fname']);
    // unset($_SESSION['lname']);
    session_destroy();
}

echo 'You have been logged out. <a href="help.php">Help</a>'
?>