document.addEventListener('DOMContentLoaded', () => {
    const steps = document.querySelectorAll('.step');
    const contactForm = document.querySelector('.contact-form');

    // Animate steps and contact form on scroll using IntersectionObserver
    const observerOptions = {
        threshold: 0.5,
        rootMargin: '0px 0px -100px 0px'
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = 1;
                entry.target.style.transform = 'translateY(0)';
            }
        });
    }, observerOptions);

    // Initialize steps animation with hidden state and observe each step
    steps.forEach((step, index) => {
        step.style.opacity = 0;
        step.style.transform = 'translateY(50px)';
        step.style.transition = `all 0.5s ease ${index * 0.2}s`;
        observer.observe(step);
    });

    // Initialize contact form animation and observe it
    if (contactForm) {
        contactForm.style.opacity = 0;
        contactForm.style.transform = 'translateY(50px)';
        contactForm.style.transition = 'all 0.5s ease';
        observer.observe(contactForm);

        // Handle form submission
        contactForm.addEventListener('submit', (e) => {
            e.preventDefault();

            // Add loading state to button
            const submitButton = contactForm.querySelector('button[type="submit"]');
            submitButton.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Sending...';
            submitButton.disabled = true;

            // Simulate form submission (replace this with actual form submission logic)
            setTimeout(() => {
                submitButton.innerHTML = '<i class="fas fa-check"></i> Sent!';
                submitButton.classList.remove('btn-primary');
                submitButton.classList.add('btn-success');

                // Reset form after success message
                setTimeout(() => {
                    contactForm.reset();
                    submitButton.innerHTML = 'Send Message';
                    submitButton.disabled = false;
                    submitButton.classList.remove('btn-success');
                    submitButton.classList.add('btn-primary');
                }, 3000);
            }, 2000);
        });
    }
});
