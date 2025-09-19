document.addEventListener("DOMContentLoaded", function() {

    // Temukan semua elemen yang ingin dianimasikan saat di-scroll
    const animatedElements = document.querySelectorAll('.animate-on-scroll');

    // Buat Intersection Observer untuk mendeteksi saat elemen terlihat di layar
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
        threshold: 0.1 // Animasi akan berjalan saat 10% dari elemen terlihat
    });

    // Terapkan observer ke setiap elemen yang dipilih
    animatedElements.forEach(element => {
        observer.observe(element);
    });

});