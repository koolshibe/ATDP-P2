<<<<<<< HEAD
<html>
<head>
    <title>Install Chalkboard Manifesto DB</title>
</head>
<body>
<?php
require_once "config.php";
try {
    $dbh = new PDO(DB_DSN, DB_USER, DB_PASSWORD);
    //create comic table
    $query = file_get_contents('admin.sql');
    $dbh->exec($query);
    $query = file_get_contents('game.sql');
    $dbh->exec($query);
    $query = file_get_contents('customer.sql');
    $dbh->exec($query);
    $query = file_get_contents('store.sql');
    $dbh->exec($query);
    echo "<p>Successfully installed databases</p>";
}
catch (PDOException $e) {
    echo "<p>Error: {$e->getMessage()}</p>";
}
?>
</body>
=======
<html>
<head>
    <title>Install Chalkboard Manifesto DB</title>
</head>
<body>
<?php
require_once "config.php";
try {
    $dbh = new PDO(DB_DSN, DB_USER, DB_PASSWORD);
    //create comic table
    $query = file_get_contents('admin.sql');
    $dbh->exec($query);
    $query = file_get_contents('game.sql');
    $dbh->exec($query);
    $query = file_get_contents('customer.sql');
    $dbh->exec($query);
    $query = file_get_contents('store.sql');
    $dbh->exec($query);
    echo "<p>Successfully installed databases</p>";
}
catch (PDOException $e) {
    echo "<p>Error: {$e->getMessage()}</p>";
}
?>
</body>
>>>>>>> 29b0709 (Made purchasing system)
</html>