document.addEventListener("DOMContentLoaded", function() {
    // Smooth scrolling when clicking on navigation links with hash
    var scroll = new SmoothScroll('a[href*="#"]', {
        speed: 800,
        speedAsDuration: true
    });
});