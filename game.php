<?php
require_once "config.php";
require_once "header.php";
try {
    $dbh = new PDO(DB_DSN, DB_USER, DB_PASSWORD);
} catch (PDOException $e) {
    echo "<p>Error: {$e->getMessage()}</p>";
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Shop | Better Games</title>
    <link rel="stylesheet" href="styles.css">
    <script src="script.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function(){
            $("form").submit(function(event){
                event.preventDefault();
                $.ajax({
                    type: 'POST',
                    url: $(this).attr('action'),
                    data: $(this).serialize()
                });
            });
        });
    </script>
</head>
<body>
    <?php
        addHeader();
        if(isset($_SESSION['sid'])){
            if (isset($_GET["gameid"])) {
                $sth = $dbh->prepare("SELECT * FROM games WHERE id=:gameid");
                $sth->bindValue(":gameid", $_GET["gameid"]);
                $sth->execute();
                $gameinfo = $sth->fetch();
                echo "<h2>".$gameinfo["game_name"]."</h2><h3>".$gameinfo["price"]."</h3>";
                if (isset($all["img"])) {
                    echo "<img src='" . $all["img"] . "' width='200' height='200' /><br>";
                } else {
                    echo "<img src='https://m.media-amazon.com/images/I/71fccwYLGoL._AC_UF894,1000_QL80_.jpg' width='200' height='200'/><br>";
                }
                echo "<form method='post' action='checkout.php'>
                        <input type='hidden' name='productid' value='" . $_GET['gameid'] . "' />
                        <input type='submit' name='addToCart' value='Add to Cart!' id='addToCart'>
                      </form>
                      <br>
                      <a href='game.php'><button>Back</button></a>";
            } else {
                $sth = $dbh->prepare("SELECT * FROM games");
                $sth->execute();
                $allGamesView = $sth->fetchAll();
                echo "<h1>All Games</h1>";
                foreach($allGamesView as $all){
                    echo "<a href=game.php?gameid=". $all["id"]."><h2>".$all["game_name"]."</h2><br></a><h3>Price:<br>".$all["price"]."</h3><br>";
                }
            }
        } else {
            header("refresh:5;url=signin.php");
            echo 'You\'ll be redirected in about 5 secs, as you haven\'t logged in. To bypass the delay, click <a href="signin.php">here</a>.';
            exit;
        }
    ?>
</body>
</html>
