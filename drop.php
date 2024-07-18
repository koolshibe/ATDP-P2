<?php
require 'config.php';

try {
    $dbh = new PDO(DB_DSN, DB_USER, DB_PASSWORD);

    $dropper = file_get_contents('drop.sql');

    $dbh->exec($dropper);

    echo "Nice";
}
catch (PDOException $e) {
    echo "<p>Error: {$e->getMessage()}</p>";
}

?>