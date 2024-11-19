document.addEventListener('DOMContentLoaded', () => {
    const categories = document.querySelectorAll('.category');

    // إعداد الأنيميشن باستخدام IntersectionObserver
    const observerOptions = {
        threshold: 0.2,  // تفعيل الأنيميشن عند ظهور 20% من القسم
        rootMargin: '0px 0px -100px 0px'  // ضبط الحدود لتفعيل الأنيميشن
    };

    const categoryObserver = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                // تفعيل الأنيميشن لكل div في قسم Categories
                entry.target.style.opacity = 1;
                entry.target.style.transform = 'translateY(0)';
                entry.target.style.transition = 'opacity 1s ease, transform 1s ease';
                
                // إيقاف المراقبة بعد أن يظهر العنصر
                observer.unobserve(entry.target);
            }
        });
    }, observerOptions);

    // مراقبة جميع divs في قسم Categories
    categories.forEach(category => {
        category.style.opacity = 0;
        category.style.transform = 'translateY(50px)';  // تحريك العنصر للأسفل عند البداية
        categoryObserver.observe(category);  // مراقبة العنصر باستخدام IntersectionObserver
    });
});
