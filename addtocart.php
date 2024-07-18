<?php
session_start();

if (isset($_GET["gameid"])) {
    array_push($_SESSION["games"], (int)$_GET["gameid"]);
    header("Location:game.php");
} else {
    header("Location:game.php");
}

?>