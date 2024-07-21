<?php
session_start();
// Unset all of the session variables.
$_SESSION = array();
require_once "header.php";
            addHeader();
// If it's desired to kill the session, also delete the session cookie.
// Note: This will destroy the session, and not just the session data!
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}
echo '<link rel="stylesheet" href="styles.css">';

// Finally, destroy the session.
session_destroy();


if (isset($_GET["msg"])) {
    header("location:signin.php?msg=".$_GET["msg"]);
} else {
    header("location:signin.php");
}


?>