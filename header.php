<?php 
// will also have div for sparkles 
function addHeader(){
    echo '<div id="header">
        <a href="index.php"><h1>Free Games</h1></a>
        <nav>
            <a href="game.php">Shop</a>
            <a href="signin.php">Sign In</a>
            <a href="create.php">Sign Up</a>
            <a href="checkout.php">Checkout</a>
        </nav>
    </div>
    <div id="sparkle-container"></div>';
}
?>
