<?php

    session_start();
    require_once "config.php";
    try {
        $dbh = new PDO(DB_DSN, DB_USER, DB_PASSWORD);
    } catch (PDOException $e) {
        echo "<p>Error: {$e->getMessage()}</p>";
    }

    foreach($_SESSION["games"] as $s) {
        $sth = $dbh -> prepare("INSERT INTO purchases (game_id, customer_id, store_id) VALUES (:gid, :cid, :stid)");
        $sth -> bindValue(":gid", (int)$s);
        $sth -> bindValue(":cid", (int)$_SESSION["sid"]);
        $sth -> bindValue(":stid", (int)$_POST[$s]);
        $sth -> execute();
    }
    $_SESSION["games"] = [];
    header("Location:game.php");
?>