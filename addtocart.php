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
if (isset($_GET["gameid"])) {
    array_push($_SESSION["games"], (int)$_GET["gameid"]);
    header("Location:game.php");
} else {
    header("Location:game.php");
}

?>