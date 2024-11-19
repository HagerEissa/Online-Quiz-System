document.addEventListener('DOMContentLoaded', () => {
    const loadingScreen = document.getElementById('loading-screen');
    const backgroundVideo = document.getElementById('background-video');
    const content = document.getElementById('content');

    // Simulate loading time with animation
    setTimeout(() => {
        loadingScreen.classList.add('fade-out');
        backgroundVideo.classList.add('fade-out');

        setTimeout(() => {
            loadingScreen.style.display = 'none';
            backgroundVideo.style.display = 'none';
            content.style.display = 'block';
        }, 1000); // fade-out duration
    }, 500);

    // Smooth scrolling for navigation links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            document.querySelector(this.getAttribute('href')).scrollIntoView({
                behavior: 'smooth'
            });
        });
    });
});
