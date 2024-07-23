// script.js
document.addEventListener('DOMContentLoaded', function() {
    const checkoutButton = document.getElementById('addToCart');

    if (checkoutButton) {
        checkoutButton.onclick = () => {
            alert('Item added to cart!');
        }
    }

    document.addEventListener('mousemove', function(e) {
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
