<?php
session_start();
if (session_status() == 2) {
    session_destroy();
}
echo 'You have been logged out. Check session status <a href="help.php">here</a>.';
?>