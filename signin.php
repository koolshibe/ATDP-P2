<html>
<head>
    <title>Sign In to Free Games</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <?php
    require_once "header.php";
    addHeader();
    if (isset($_GET["msg"])) {
        echo $_GET["msg"];
    }
    ?>
    <form action="handler.php" method="post">
        <br><br>
        <input type="text" name="username" required></input>
        <input type="password" name="password" required></input>
        <input type="submit" value="login"/>
    </form>
</body>
</html>