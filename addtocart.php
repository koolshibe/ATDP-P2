<?php
session_start();
echo '<link rel="stylesheet" href="styles.css">';
require_once "header.php";
addHeader();
if (isset($_GET["gameid"])) {
    array_push($_SESSION["games"], (int)$_GET["gameid"]);
    header("Location:game.php");
} else {
    header("Location:game.php");
}

?>