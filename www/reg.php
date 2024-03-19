<?php
session_start();
error_reporting(E_ALL);
error_reporting(-1);
ini_set('error_reporting', E_ALL);

if (isset($_POST["username"]) && $_POST["username"] != "")
    $username = $_POST['username'];
if (isset($_POST["fname"]) && $_POST["fname"] != "")
    $fname = $_POST['fname'];
if (isset($_POST["lname"]) && $_POST["lname"] != "")
    $lname = $_POST['lname'];
if (isset($_POST["email"]) && $_POST["email"] != "")
    $email = $_POST['email'];
if (isset($_POST["pass"]) && $_POST["pass"] != "")
    $pass = md5($_POST['pass']);

$host = 'localhost';
$db = 'phptest';
$dbuser = 'phptest';
$dbpass = 'testphp';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
];
$pdo = new PDO($dsn, $dbuser, $dbpass, $options);

$stmt = $pdo->prepare('INSERT INTO `users` (`username`, `fname`, `lname`, `email`, `pass`, `status`) VALUES (?, ?, ?, ?, ?, ?)');
$stmt->execute([$username, $fname, $lname, $email, $pass, 1]);

if ((isset($username)) && ($username != "")) {
    echo "Welcome, " . $fname . " " . $lname . "<br>";
    $_SESSION['fname'] = $fname;
    $_SESSION['lname'] = $lname;
    echo '<a href="index.php">Home</a>.';
} else {
    header('Location: register.php?bad=1');
}
?>
