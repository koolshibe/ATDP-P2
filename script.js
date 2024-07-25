// script.js
document.addEventListener('DOMContentLoaded', function() {
    const checkoutButton = document.getElementById('addToCart');

    if (checkoutButton) { //alert for when a user adds to cart
        checkoutButton.onclick = () => {
            alert('Item added to cart!');
        }
    }

    document.addEventListener('mousemove', function(e) { //SPARKLES!
        const sparkle = document.createElement('div');
        sparkle.className = 'sparkle';
        document.body.appendChild(sparkle);
        
        sparkle.style.left = `${e.clientX}px`;
        sparkle.style.top = `${e.clientY}px`;
      
        setTimeout(() => {
            sparkle.remove();
        }, 500);
    });
});
