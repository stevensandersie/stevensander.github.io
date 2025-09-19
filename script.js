document.addEventListener("DOMContentLoaded", function() {

    // --- Efek Spotlight Mouse ---
    const body = document.body;
    // Cek apakah perangkat adalah desktop sebelum mengaktifkan efek mouse
    if (window.matchMedia("(min-width: 768px)").matches) {
        window.addEventListener('mousemove', (e) => {
            body.style.setProperty('--mouse-x', e.clientX + 'px');
            body.style.setProperty('--mouse-y', e.clientY + 'px');
        });
    }

    // --- Animasi Saat Scroll ---
    const animatedElements = document.querySelectorAll('.animate-on-scroll');

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('is-visible');

                // --- Efek Animasi Staggering (muncul satu per satu) ---
                // Hanya targetkan kartu portfolio dan item tools
                const gridItems = entry.target.querySelectorAll('.portfolio-card, .tool-item');
                if (gridItems.length > 0) {
                    gridItems.forEach((item, index) => {
                        item.style.transitionDelay = `${index * 100}ms`;
                        item.classList.add('is-visible');
                    });
                }
                
                // Hentikan observasi untuk elemen utama setelah terlihat
                // Tetapi tetap biarkan observer untuk item grid individu
                if (!entry.target.classList.contains('project-grid-portfolio') && !entry.target.classList.contains('tools-grid-box')) {
                     observer.unobserve(entry.target);
                }
            }
        });
    }, {
        threshold: 0.1 
    });

    animatedElements.forEach(element => {
        observer.observe(element);
    });

    // --- Fungsionalitas Filter Proyek ---
    const filterButtons = document.querySelectorAll('.filter-btn');
    const portfolioCards = document.querySelectorAll('.portfolio-card');

    filterButtons.forEach(button => {
        button.addEventListener('click', function() {
            // Hapus class 'active' dari semua tombol
            filterButtons.forEach(btn => btn.classList.remove('active'));
            // Tambahkan class 'active' ke tombol yang diklik
            this.classList.add('active');

            const selectedCategory = this.dataset.category;

            portfolioCards.forEach(card => {
                const cardCategory = card.dataset.category;

                if (selectedCategory === 'all' || selectedCategory === cardCategory) {
                    card.classList.remove('hidden');
                    // Reset animation for visible cards to re-trigger if needed
                    card.classList.remove('is-visible');
                    // Add is-visible back after a small delay to re-trigger animation
                    setTimeout(() => card.classList.add('is-visible'), 10);
                } else {
                    card.classList.add('hidden');
                    card.classList.remove('is-visible'); // Pastikan animasi tidak aktif
                }
            });
        });
    });

    // Panggil filter 'all' saat halaman dimuat pertama kali
    document.querySelector('.filter-btn.active')?.click();

});