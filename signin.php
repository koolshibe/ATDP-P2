<<<<<<< HEAD
<html>
<head>
    <title>Sign In to Free Games</title>
</head>
<body>
    <?php
    if (isset($_GET["msg"])) {
        echo $_GET["msg"];
    }
    ?>
    <form action="handler.php" method="post">
        <input type="text" name="username" required></input>
        <input type="text" name="password" required></input>
        <input type="submit" value="login"/>
    </form>
</body>
=======
<html>
<head>
    <title>Install Chalkboard Manifesto DB</title>
</head>
<body>
    <?php
    if (isset($_GET["msg"])) {
        echo $_GET["msg"];
    }
    ?>
    <form action="handler.php" method="post">
        <input type="text" name="username" required></input>
        <input type="text" name="password" required></input>
        <input type="submit" value="login"/>
    </form>
</body>
>>>>>>> 29b0709 (Made purchasing system)
</html>