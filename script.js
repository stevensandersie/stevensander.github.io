document.addEventListener("DOMContentLoaded", function() {

    // Temukan semua elemen yang ingin dianimasikan saat scroll
    const animatedElements = document.querySelectorAll('.animate-on-scroll');

    // Buat Intersection Observer
    // Ini adalah cara modern & efisien untuk mendeteksi kapan elemen terlihat di layar
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            // Jika elemen masuk ke dalam viewport
            if (entry.isIntersecting) {
                entry.target.classList.add('is-visible');
                // (Opsional) Hentikan observasi setelah animasi berjalan sekali
                observer.unobserve(entry.target);
            }
        });
    }, {
        threshold: 0.1 // Animasi akan berjalan saat 10% elemen terlihat
    });

    // Terapkan observer ke setiap elemen
    animatedElements.forEach(element => {
        observer.observe(element);
    });

});