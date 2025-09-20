// 1. Inisialisasi AOS (Animate on Scroll)
AOS.init({
    duration: 800, // Durasi animasi dalam milidetik
    once: true,    // Animasi hanya berjalan sekali
});

// 2. Logika untuk Filter Portfolio
document.addEventListener('DOMContentLoaded', function() {
    const filterButtons = document.querySelectorAll('.filter-btn');
    const portfolioItems = document.querySelectorAll('.portfolio-item');

    filterButtons.forEach(button => {
        button.addEventListener('click', function() {
            // Hapus kelas 'active' dari semua tombol
            filterButtons.forEach(btn => btn.classList.remove('active'));
            // Tambahkan kelas 'active' ke tombol yang diklik
            this.classList.add('active');

            const filter = this.getAttribute('data-filter');

            portfolioItems.forEach(item => {
                // Atur ulang animasi dan sembunyikan item
                item.style.display = 'none';
                
                // Jika item cocok dengan filter atau filternya 'all', tampilkan
                if (filter === 'all' || item.getAttribute('data-type') === filter) {
                    item.style.display = 'block';
                }
            });
        });
    });
});