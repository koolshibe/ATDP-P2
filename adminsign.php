<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="styles.css"/>
        <script src="script.js"></script>
    </head>
    <body>
        <form action="admindashboard.php" method="post"> <!-- Just form for the admin to sign in-->
            <br><br>
            <input type="text" name="admin_username" required></input>
            <input type="password" name="admin_password" required></input>
            <input type="submit" value="login"/>
        </form>
    </body>
</html>