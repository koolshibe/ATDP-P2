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
if (isset($_POST["password"]) && isset($_POST["username"]) && isset($_POST["country"]) && isset($_POST["telephone"])) {
    $sth = $dbh-> prepare("INSERT INTO customers (username, country, telephone, pass_hash) VALUES (:uname, :country, :tphone, :phash);");
    $sth -> bindValue(":uname", $_POST["username"]);
    $sth -> bindValue(":country", intval($_POST["country"]));
    $sth -> bindValue(":tphone", $_POST["telephone"]);
    $sth -> bindValue(":phash", password_hash($_POST["password"], PASSWORD_DEFAULT));
    $sth -> execute();
    header("Location:signin.php");
} else {
    header("Location:create.php");
}
?>