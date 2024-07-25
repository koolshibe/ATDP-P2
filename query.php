<?php
require_once "config.php";

try {
    $dbh = new PDO(DB_DSN, DB_USER, DB_PASSWORD);
} catch (PDOException $e) {
    echo "<p>Error: {$e->getMessage()}</p>";
}
session_start();

if (isset($_GET["table"])) {
    if ($_GET["table"] == "purchases") {
        if ($_POST["id"]) {
            if ($_POST["game_id"] || $_POST["store_id"]) {
                $sth = $dbh -> prepare("UPDATE purchases SET game_id=:gid, store_id=:sid WHERE id=:id AND customer_id IS NULL");
                $sth -> bindValue(":gid", $_POST["game_id"]); 
                $sth -> bindValue(":id", $_POST["id"]); 
                $sth -> bindValue(":sid", $_POST["store_id"]); 
                $sth -> execute();
            }
        } else {
            $sth = $dbh -> prepare("INSERT INTO purchases (store_id, customer_id, game_id) VALUES (:gid, NULL, :sid)");
            $sth -> bindValue(":gid", $_POST["game_id"]); 
            $sth -> bindValue(":sid", $_POST["store_id"]); 
            $sth -> execute();
        }
    } elseif ($_GET["table"] == "games") {
        if ($_POST["id"]) {
            if ($_POST["game_name"] || $_POST["price"] || $_POST["img"]) {
                $sth = $dbh -> prepare("UPDATE games SET game_name=:gname, price=:price, img=:img WHERE id=:id");
                $sth -> bindValue(":gname", $_POST["game_name"]); 
                $sth -> bindValue(":id", $_POST["id"]);
                $sth -> bindValue(":price", $_POST["price"]); 
                $sth -> bindValue(":img", $_POST["img"]); 
                $sth -> execute();
            } else {
                $sth = $dbh -> prepare("DELETE FROM games WHERE id=:id");
                $sth -> bindValue(":id", $_POST["id"]);
                $sth -> execute();
            }
        } else {
            $sth = $dbh -> prepare("INSERT INTO games (game_name, price, img) VALUES (:gname, :price,:img)");
            $sth -> bindValue(":gname", $_POST["game_name"]); 
            $sth -> bindValue(":id", $_POST["id"]);
            $sth -> bindValue(":price", $_POST["price"]); 
            $sth -> bindValue(":img", $_POST["img"]); 
            $sth -> execute();
        }
    } elseif ($_GET["table"] == "stores") {
        if ($_POST["id"]) {
            if ($_POST["store_name"] || $_POST["telephone"] || $_POST["country"] || $_POST["whereabouts"]) {
                $sth = $dbh -> prepare("UPDATE stores SET store_name=:sname, telephone=:tphone, country=:country, whereabouts=:wabouts WHERE id=:id");
                $sth -> bindValue(":sname", $_POST["store_name"]); 
                $sth -> bindValue(":id", $_POST["id"]);
                $sth -> bindValue(":tphone", $_POST["telephone"]); 
                $sth -> bindValue(":country", $_POST["country"]); 
                $sth -> bindValue(":wabouts", $_POST["whereabouts"]); 
                $sth -> execute();
            } else {
                $sth = $dbh -> prepare("DELETE FROM stores WHERE id=:id");
                $sth -> bindValue(":id", $_POST["id"]);
                $sth -> execute();
            }
        } else {
            $sth = $dbh -> prepare("INSERT INTO stores (store_name, telephone, country, whereabouts) VALUES (:sname, :tphone,:country,:wabouts)");
            $sth -> bindValue(":sname", $_POST["store_name"]); 
            $sth -> bindValue(":tphone", $_POST["telephone"]); 
            $sth -> bindValue(":country", $_POST["country"]); 
            $sth -> bindValue(":wabouts", $_POST["whereabouts"]); 
            $sth -> execute();
        }
    } elseif ($_GET["table"] == "administrators") {
        if ($_SESSION["aid"] == 1 && is_null($_POST["id"])) {
            $sth = $dbh -> prepare("INSERT INTO administrators (admin_username, pass_hash) VALUES (:uname, :phash)");
            $sth -> bindValue(":uname", $_POST["username"]);
            $sth -> bindValue(":phash", password_hash($_POST["password"], PASSWORD_DEFAULT));
            $sth -> execute();
        } else if ($_SESSION["aid"] == $_POST["id"]) {
            $sth = $dbh -> prepare("UPDATE administrators SET admin_username=:uname pass_hash=:phash WHERE id=:id");
            $sth -> bindValue(":uname", $_POST["username"]);
            $sth -> bindValue(":id", $_POST["id"]);
            $sth -> bindValue(":phash", password_hash($_POST["password"], PASSWORD_DEFAULT));
            $sth -> execute();
        }
    }
    $sth = $dbh -> prepare("INSERT INTO updates (admin_id, changelog) VALUES (:aid, :msg)"); 
    $sth -> bindValue(":aid", $_SESSION["aid"]);
    $sth -> bindValue(":msg", $_POST["msg"]);
} else {
    header("Location:admindashboard.php");
}
?>