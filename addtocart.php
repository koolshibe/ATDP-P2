<?php
echo '<link rel="stylesheet" href="styles.css">';
require_once "header.php";
?>
<!DOCTYPE html>
<html>
    <head><script src="script.js"></script></head>
    <body><?php addHeader(); ?></body>
</html>

<?php
if (isset($_GET["gameid"])) { //if they have selected a game
    array_push($_SESSION["games"], (int)$_GET["gameid"]); //add the game id to session games
    header("Location:game.php"); //redirect back to game.php
} else {
    header("Location:game.php"); //else, redirect back to game.php
}

?>