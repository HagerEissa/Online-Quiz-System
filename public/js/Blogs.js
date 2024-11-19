document.addEventListener('DOMContentLoaded', () => {
    const blogPosts = document.querySelectorAll('.blog-post');

    // إعداد الأنيميشن باستخدام IntersectionObserver
    const observerOptions = {
        threshold: 0.2,  // تفعيل الأنيميشن عند ظهور 20% من القسم
        rootMargin: '0px 0px -100px 0px'
    };

    const blogObserver = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                // إظهار الـ blog-post عند الظهور في الشاشة
                entry.target.style.opacity = 1;
                entry.target.style.transform = 'translateY(0)';
                entry.target.style.transition = 'opacity 1s ease, transform 1s ease';
                
                // إيقاف المراقبة بعد أن يظهر العنصر
                observer.unobserve(entry.target);
            }
        });
    }, observerOptions);

    // مراقبة جميع البطاقات
    blogPosts.forEach(blogPost => {
        blogPost.style.opacity = 0;
        blogPost.style.transform = 'translateY(50px)';  // تحريك العنصر للأسفل عند البداية
        blogObserver.observe(blogPost);  // مراقبة العنصر باستخدام IntersectionObserver
    });
});
