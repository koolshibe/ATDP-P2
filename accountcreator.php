<?php
require_once "config.php";
require_once "header.php";

?>
<!DOCTYPE html>
<html>
    <head><script src="script.js"></script></head>
    <body><?php addHeader(); ?></body>
</html>

<?php
try {
    $dbh = new PDO(DB_DSN, DB_USER, DB_PASSWORD);
} catch (PDOException $e) {
    echo "<p>Error: {$e->getMessage()}</p>";
}

echo '<link rel="stylesheet" href="styles.css">';
if (isset($_POST["password"]) && isset($_POST["username"]) && isset($_POST["country"]) && isset($_POST["telephone"]) && filter_var($_POST['telephone'], FILTER_VALIDATE_INT)) { //if the creation form has been filled
    $sth = $dbh-> prepare("INSERT INTO customers (username, country, telephone, pass_hash) VALUES (:uname, :country, :tphone, :phash);"); //set all values equal to the following vars
    $sth -> bindValue(":uname", $_POST["username"]);
    $sth -> bindValue(":country", intval($_POST["country"]));
    $sth -> bindValue(":tphone", $_POST["telephone"]);
    $sth -> bindValue(":phash", password_hash($_POST["password"], PASSWORD_DEFAULT));
    $sth -> execute();
    header("Location:signin.php"); //redirect user to signin webpage
} else {
    header("Location:create.php"); //if the user hasnt made an account, redirect them to acc creation  
}
?>