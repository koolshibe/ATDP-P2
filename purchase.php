<!DOCTYPE html>
<html>
    <head><script src="script.js"></script></head>
    <body></body>
</html>



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
    foreach($_SESSION["games"] as $s ) {
        $sth = $dbh -> prepare("UPDATE purchases SET customer_id = :cid WHERE id=:pid");
        $sth -> bindValue(":pid", (int)$s);
        $sth -> bindValue(":cid", (int)$_SESSION["sid"]);
        $sth -> execute();
    }
    $_SESSION["games"] = array();
    $_SESSION["purchases"] = array();
    header("Location:game.php");
?>