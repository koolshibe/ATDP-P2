<?php
require_once "config.php";
require_once "header.php";
addHeader();
try {
    $dbh = new PDO(DB_DSN, DB_USER, DB_PASSWORD);
} catch (PDOException $e) {
    echo "<p>Error: {$e->getMessage()}</p>";
}
echo '<link rel="stylesheet" href="styles.css">';
if (isset($_POST["username"]) && isset($_POST["password"])) { //if the user has put in a password and username in signin.php
    $sth = $dbh -> prepare("SELECT * FROM customers WHERE username=:uname"); //select the users where the username = the given username
    $sth -> bindValue(":uname", $_POST["username"]);
    $sth -> execute();
    $pass = $sth -> fetch();
    if ($pass && password_verify($_POST["password"], $pass["pass_hash"])) { //if the password given checks out w/ the username, take them to game.php
        $_SESSION["sid"] = $pass["id"];
        header("Location:game.php");
    } else { //if either are wrong, take the user back to signin
        header("refresh:5;url=signin.php");
                echo 'You\'ll be redirected in about 5 secs, as you\'re username/password is wrong. To bypass the delay, click <a href="signin.php">here</a>.';
                exit;
    }
} else if (isset($_SESSION["sid"])) { //if session sid is set(meaning the user already logged in)
    if (isset($_GET["redirect"])) {
        header("url=".$_GET["redirect"]); //redirect them to get redirect(if it is set)
    } else {
        header("url=game.php"); //if get redirect isnt set, take them to game.php
    }
} else {
    header('url=signin.php'); //if the username/password arent set, take user to signin
    echo "Sign in failed.";
}

?>
<!DOCTYPE html>
<html>
    <head>
        Redirect failed.<a href="game.php">dashboard</a>
        <script src="script.js"></script>
    </head>
</html>