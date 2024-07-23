<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="styles.css">
        <script src="script.js"></script>
    </head>
    <body>
    <?php require_once "header.php" addHeader(); ?>
    <form method="post" action="purchase.php">
        <?php

            require_once "config.php";
            try {
                $dbh = new PDO(DB_DSN, DB_USER, DB_PASSWORD);
            } catch (PDOException $e) {
                echo "<p>Error: {$e->getMessage()}</p>";
            }
            $purchases= array();

            foreach ($_SESSION["games"] as $g) {
                $sth = $dbh -> prepare("SELECT * FROM games WHERE id=:game");
                $sth -> bindValue(":game", $g);
                $sth -> execute();
                array_push($sth -> fetch());
            }


            foreach ($purchases as $p) {
                echo "<h2>".$p["game_name"]."</h2><br>";
                $sth = $dbh -> prepare("SELECT stores.store_name, stores.id FROM stores JOIN stock ON stock.store_id=stores.id AND stock.game_id=:games");
                $sth -> bindValue(":games", $p["id"]);
                $sth -> execute();
                $stores = $sth -> fetchAll();

                echo "<select name='".$p["id"]."' required>";
                foreach ($stores as $s) {
                    echo "<option value=".$s["id"].">".$s["store_name"]."</option>";
                }
                echo "</select>";
            }
        ?>
        <input type="submit" value="purchase"/>
    </form>
    </body>
</html>
