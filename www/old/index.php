<?php

session_start();
error_reporting(E_ALL);
error_reporting(-1);


echo $_POST['username']; ?>
<br>
<?php echo $_POST['pass']; ?>

<?php
    $host = '127.0.0.1';
    $db   = 'phptest';
    $dbuser = 'phptest';
    $dbpass = 'testphp';
    $charset = 'utf8mb4';

    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
    $options = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];
    $pdo = new PDO($dsn, $dbuser, $dbpass, $options);

    $stmt = $pdo->prepare('SELECT * FROM users WHERE username=:username AND pass=:pass');
    $stmt->execute(['username' => $username, 'pass' => $pass]);
    $user = $stmt->fetch();

    if(isset($user) && isset($user) != ""){
        echo "Hello, " .$user['fname']."".$user['lname']."<br>";
        $_SESSION['fname'] = $user['fname'];
        $_SESSION['lname'] = $user['lname'];
        echo '<a href="help.php">help</a>';
        echo '<br>';
        echo '<a href="logout.php">Log Out</a>';
    } 
    else 
    {
        header('Location: login.php?error=1');
    }
?>

