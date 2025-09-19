document.addEventListener("DOMContentLoaded", function() {

    // Temukan semua elemen yang ingin dianimasikan
    const animatedElements = document.querySelectorAll('.animate-on-scroll');

    // Buat Intersection Observer untuk mendeteksi saat elemen terlihat
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            // Jika elemen masuk ke layar
            if (entry.isIntersecting) {
                entry.target.classList.add('is-visible');
                // Hentikan observasi setelah animasi berjalan sekali
                observer.unobserve(entry.target);
            }
        });
    }, {
        threshold: 0.1 // Animasi berjalan saat 10% elemen terlihat
    });

    // Terapkan observer ke setiap elemen yang dipilih
    animatedElements.forEach(element => {
        observer.observe(element);
    });

});