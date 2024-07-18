<?php
session_start();
require_once "config.php";
try {
    $dbh = new PDO(DB_DSN, DB_USER, DB_PASSWORD);
} catch (PDOException $e) {
    echo "<p>Error: {$e->getMessage()}</p>";
}
?>
<!DOCTYPE html>
<html>
    <head>
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
                //Ishaan's code here
            }
        ?>
    </body>
</html>