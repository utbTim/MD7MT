<?php

error_reporting(E_ALL);
error_reporting(-1);
ini_set("error_reporting", E_ALL);

$host = 'cornplace.com';
$db   = 'phptest';
$dbuser = 'phptest';
$dbpass = 'testphp';
$charset = 'utf8mb4';

if (isset($_POST['username']) && isset($_POST['pass'])) {
    $username = $_POST['username'];
    $pass = md5($_POST['pass']);
}

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";           
$opt = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false
];
$pdo = new PDO($dsn, $dbuser, $dbpass, $opt);

$stmt = $pdo->prepare('SELECT * FROM users WHERE username=:username AND pass=:pass');
$stmt->execute(['username' => $username, 'pass' => $pass]);
$result = $stmt->fetch();
if($result)
    print_r($result); 
else
    print_r("try again"); 

?>