document.addEventListener('DOMContentLoaded', () => {
    const aboutText = document.querySelector('.text-section');
    const aboutImage = document.querySelector('.image-section');

    // إعداد الأنيميشن باستخدام IntersectionObserver
    const observerOptions = {
        threshold: 0.2,  // تفعيل الأنيميشن عند ظهور 20% من القسم
        rootMargin: '0px 0px -100px 0px'  // تحديد الحدود
    };

    const aboutObserver = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                // تطبيق الأنيميشن للنص: Fade-In و Slide-Up
                aboutText.style.opacity = 1;
                aboutText.style.transform = 'translateY(0)';
                aboutText.style.transition = 'opacity 1s ease, transform 1s ease';

                // تطبيق الأنيميشن للصورة: Fade-In و Slide-Up مع تأخير بسيط
                aboutImage.style.opacity = 1;
                aboutImage.style.transform = 'translateY(0) scale(1)';
                aboutImage.style.transition = 'opacity 1.2s ease 0.2s, transform 1.2s ease 0.2s';

                // إيقاف مراقبة العنصر بعد أن يظهر لضمان بقاء الأنيميشن ثابت
                observer.unobserve(entry.target);
            }
        });
    }, observerOptions);

    // مراقبة النص والصورة في قسم About Us
    aboutObserver.observe(aboutText);
    aboutObserver.observe(aboutImage);
});
