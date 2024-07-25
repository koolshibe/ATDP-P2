<?php 
session_start();
function addHeader(){ //creat a header function, echoing out name+links depending on sign in state
    echo '<div id="header">
        <a href="index.php"><h1>Free Games</h1></a>
        <nav>
            <a href="game.php">Shop</a>';
            if(isset($_SESSION['sid'])){
                echo "<a href='signout.php'>Sign Out!</a>";
            } else {
                echo "<a href='signin.php'>Sign In!</a>
                <a href='create.php'>Sign Up</a>";
            }
        echo '<a href="checkout.php">Checkout</a>
        </nav>
    </div>';
}
?>
