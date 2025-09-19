document.addEventListener("DOMContentLoaded", function() {

    // --- Efek Spotlight Mouse ---
    const body = document.body;
    window.addEventListener('mousemove', (e) => {
        body.style.setProperty('--mouse-x', e.clientX + 'px');
        body.style.setProperty('--mouse-y', e.clientY + 'px');
    });

    // --- Animasi Saat Scroll ---
    const animatedElements = document.querySelectorAll('.animate-on-scroll');

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('is-visible');

                // --- Efek Animasi Staggering (muncul satu per satu) ---
                const gridItems = entry.target.querySelectorAll('.project-card, .tool-item');
                if (gridItems.length > 0) {
                    gridItems.forEach((item, index) => {
                        // Memberi delay berdasarkan urutan item
                        item.style.transitionDelay = `${index * 100}ms`;
                        // Menerapkan class visible pada item individual
                        item.classList.add('is-visible');
                    });
                }
                
                observer.unobserve(entry.target);
            }
        });
    }, {
        threshold: 0.1 
    });

    animatedElements.forEach(element => {
        observer.observe(element);
    });

});