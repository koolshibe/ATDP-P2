<?php
session_start();
require_once "config.php";
require_once "header.php";
try {
    $dbh = new PDO(DB_DSN, DB_USER, DB_PASSWORD);
} catch (PDOException $e) {
    echo "<p>Error: {$e->getMessage()}</p>";
}
if (isset($_POST["admin_username"]) && isset($_POST["admin_password"])) {
    $sth = $dbh -> prepare("SELECT * FROM administrators WHERE username=:uname");
    $sth -> bindValue(":uname", $_POST["admin_username"]);
    $sth -> execute();
    $info = $sth -> fetch();
    if (!($info && password_verify($_POST["admin_password"], $info["pass_hash"]))) {
        header("Location:adminsign.php");
        die();
    } else {
        $_SESSION["aid"] = $info["id"];
    }
} else {
    header("Location:adminsign.php");
    die();
}
?>
<!DOCTYPE html>
<html>
    <form action="query.php?table=stores" method="post">
        <input type="text" name="id"/>
        <input type="text" name="store_name"/>
        <input type="text" name="telephone"/>
        <input type="text" name="country"/>
        <input type="text" name="whereabouts"/>
        <input type="text" name="msg"/>
        <input type="submit" value="query"/>
    </form>
    <form action="query.php?table=games" method="post">
        <input type="text" name="id"/>
        <input type="text" name="game_name"/>
        <input type="text" name="price"/>
        <input type="text" name="img"/>
        <input type="text" name="msg"/>
        <input type="submit" value="query"/>
    </form>
    <form action="query.php?table=purchases" method="post">
        <input type="text" name="id"/>
        <input type="text" name="game_id"/>
        <input type="text" name="customer_id"/>
        <input type="text" name="store_id"/>
        <input type="text" name="msg"/>
        <input type="submit" value="query"/>
    </form>
    <form action="query.php?table=administrators" method="post">
        <input type="text" name="id"/>
        <input type="text" name="username"/>
        <input type="text" name="password"/>
        <input type="text" name="msg"/>
        <input type="submit" value="query"/>
    </form>
</html>