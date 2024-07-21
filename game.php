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
?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="styles.css">
    </head>
    <body>
        <?php
            if (isset($_GET["gameid"])) {
                $sth = $dbh -> prepare("SELECT * FROM games WHERE id=:gameid");
                $sth -> bindValue(":gameid", $_GET["gameid"]);
                $sth -> execute();
                $gameinfo = $sth -> fetch();
                echo "<h2>".$gameinfo["game_name"]."</h2><h3>".$gameinfo["price"]."</h3>";
            } else {
                $sth = $dbh->prepare("SELECT * FROM games");
                $sth->execute();
                $allGamesView = $sth->fetchAll();
                echo "<h1>All Games<h1>";
                foreach($allGamesView as $all){
                    echo "<a href=game.php?gameid=". $all["id"]."><h2>".$all["game_name"]."</h2><br></a><h3>Price:<br>".$all["price"]."</h3><br>";
                }
            }
        ?>
    </body>
</html>