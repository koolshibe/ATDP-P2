<?php

session_start();
require_once "config.php";
require_once "header.php";
            addHeader();
try {
    $dbh = new PDO(DB_DSN, DB_USER, DB_PASSWORD);
} catch (PDOException $e) {
    echo "<p>Error: {$e->getMessage()}</p>";
}
echo '<link rel="stylesheet" href="styles.css">';
if (isset($_POST["username"]) && isset($_POST["password"])) {
    $sth = $dbh -> prepare("SELECT * FROM customers WHERE username=:uname");
    $sth -> bindValue(":uname", $_POST["username"]);
    $sth -> execute();
    $pass = $sth -> fetch();
    if ($pass && password_verify($_POST["password"], $pass["pass_hash"])) {
        $_SESSION["sid"] = $pass["id"];
        header("Location:game.php");
    } else {
        header('Location:signin.phpmsg="Signin failed. Check your username and password.');
    }
} else if (isset($_SESSION["sid"])) {
    if (isset($_GET["redirect"])) {
        header("Location:".$_GET["redirect"]);
    } else {
        header("Location:game.php");
    }
} else {
    header('Location:signin.php?msg="Signin failed."');
}

?>
<!DOCTYPE html>
<html>
    <head>
        Redirect failed.<a href="game.php">dashboard</a>
    </head>
</html>