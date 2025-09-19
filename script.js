document.addEventListener("DOMContentLoaded", function() {
    
    // --- FUNGSIONALITAS HAMBURGER MENU (Baru) ---
    const navToggle = document.querySelector('.nav-toggle');
    const nav = document.querySelector('.main-nav');

    navToggle.addEventListener('click', () => {
        // Toggle class 'is-visible' pada navigasi
        nav.classList.toggle('is-visible');
        // Toggle class 'is-open' pada tombol untuk animasi (misal: X)
        navToggle.classList.toggle('is-open');
    });

    // Menutup menu saat link di dalamnya diklik (opsional, tapi bagus untuk UX)
    document.querySelectorAll('.main-nav a').forEach(link => {
        link.addEventListener('click', () => {
            nav.classList.remove('is-visible');
            navToggle.classList.remove('is-open');
        });
    });


    // --- Fungsionalitas Filter Portofolio (Tetap sama) ---
    const filterButtons = document.querySelectorAll('.filter-btn');
    // ... (sisa kode filter Anda, tidak perlu diubah) ...

    
    // --- Animasi Saat Scroll (Tetap sama) ---
    const animatedElements = document.querySelectorAll('.animate-on-scroll');
    // ... (sisa kode observer Anda, tidak perlu diubah) ...


    // --- BACKGROUND ANIMASI JARINGAN (Tetap sama) ---
    const canvas = document.getElementById('network-background');
    // ... (sisa kode canvas Anda, tidak perlu diubah) ...
});