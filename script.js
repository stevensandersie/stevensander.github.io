document.addEventListener("DOMContentLoaded", function() {

    // --- Fungsionalitas Filter Portofolio ---
    const filterButtons = document.querySelectorAll('.filter-btn');
    const portfolioCards = document.querySelectorAll('.portfolio-card');

    filterButtons.forEach(button => {
        button.addEventListener('click', function() {
            filterButtons.forEach(btn => btn.classList.remove('active'));
            this.classList.add('active');

            const selectedCategory = this.dataset.category;

            portfolioCards.forEach(card => {
                const cardCategory = card.dataset.category;

                if (selectedCategory === 'all' || selectedCategory === cardCategory) {
                    card.classList.remove('hidden');
                    // Re-trigger animation by removing and re-adding 'is-visible'
                    card.classList.remove('is-visible');
                    setTimeout(() => card.classList.add('is-visible'), 10);
                } else {
                    card.classList.add('hidden');
                    card.classList.remove('is-visible');
                }
            });
        });
    });

    // Panggil filter 'all' saat halaman dimuat pertama kali
    document.querySelector('.filter-btn[data-category="all"]')?.click();


    // --- Animasi Saat Scroll (Tetap sama) ---
    const animatedElements = document.querySelectorAll('.animate-on-scroll');

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('is-visible');

                const gridItems = entry.target.querySelectorAll('.portfolio-card, .tool-item');
                if (gridItems.length > 0) {
                    gridItems.forEach((item, index) => {
                        item.style.transitionDelay = `${index * 100}ms`;
                        item.classList.add('is-visible');
                    });
                }
                
                // Hentikan observasi untuk elemen utama setelah terlihat
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


    // --- BACKGROUND ANIMASI JARINGAN (Baru) ---
    const canvas = document.getElementById('network-background');
    const ctx = canvas.getContext('2d');
    let particles = [];
    const numParticles = 100; // Jumlah titik
    const maxDistance = 120; // Jarak maksimum untuk menggambar garis
    const particleSpeed = 0.3; // Kecepatan gerakan titik

    let mouse = { x: null, y: null, radius: 150 }; // Radius interaksi mouse

    // Fungsi untuk mengubah ukuran canvas saat window diresize
    function resizeCanvas() {
        canvas.width = window.innerWidth;
        canvas.height = window.innerHeight;
        initParticles(); // Re-initialize particles to fit new size
    }

    window.addEventListener('resize', resizeCanvas);
    window.addEventListener('mousemove', (e) => {
        mouse.x = e.x;
        mouse.y = e.y;
    });
    window.addEventListener('mouseout', () => { // Reset mouse pos when leaves window
        mouse.x = null;
        mouse.y = null;
    });

    // Kelas Particle
    class Particle {
        constructor(x, y) {
            this.x = x;
            this.y = y;
            this.size = Math.random() * 2 + 0.5; // Ukuran titik 0.5 - 2.5
            this.baseX = this.x;
            this.baseY = this.y;
            this.density = (Math.random() * 30) + 1; // Untuk variasi kecepatan
            this.directionX = Math.random() < 0.5 ? 1 : -1;
            this.directionY = Math.random() < 0.5 ? 1 : -1;
        }

        draw() {
            ctx.fillStyle = 'rgba(77, 192, 197, 0.8)'; // Warna titik, sedikit transparan
            ctx.beginPath();
            ctx.arc(this.x, this.y, this.size, 0, Math.PI * 2);
            ctx.closePath();
            ctx.fill();
        }

        update() {
            // Gerakan random partikel
            this.x += (Math.random() - 0.5) * particleSpeed * this.directionX;
            this.y += (Math.random() - 0.5) * particleSpeed * this.directionY;

            // Memantul jika mencapai batas
            if (this.x > canvas.width || this.x < 0) this.directionX *= -1;
            if (this.y > canvas.height || this.y < 0) this.directionY *= -1;


            // Interaksi dengan mouse
            let dx = mouse.x - this.x;
            let dy = mouse.y - this.y;
            let distance = Math.sqrt(dx * dx + dy * dy);

            if (distance < mouse.radius) {
                let forceDirectionX = dx / distance;
                let forceDirectionY = dy / distance;
                let maxForce = 50; // Jarak dorong maksimum
                let force = (mouse.radius - distance) / mouse.radius; // Semakin dekat, semakin kuat
                let directionX = forceDirectionX * force * this.density;
                let directionY = forceDirectionY * force * this.density;

                // Mendorong partikel menjauh dari kursor
                this.x -= directionX * 0.5; 
                this.y -= directionY * 0.5;
            } else {
                // Kembali perlahan ke posisi dasar jika jauh dari mouse
                if (this.x !== this.baseX) {
                    let dx = this.x - this.baseX;
                    this.x -= dx / 10;
                }
                if (this.y !== this.baseY) {
                    let dy = this.y - this.baseY;
                    this.y -= dy / 10;
                }
            }
        }
    }

    // Inisialisasi partikel
    function initParticles() {
        particles = [];
        for (let i = 0; i < numParticles; i++) {
            let x = Math.random() * canvas.width;
            let y = Math.random() * canvas.height;
            particles.push(new Particle(x, y));
        }
    }

    // Fungsi animasi utama
    function animate() {
        requestAnimationFrame(animate);
        ctx.clearRect(0, 0, canvas.width, canvas.height); // Bersihkan canvas

        for (let i = 0; i < particles.length; i++) {
            particles[i].update();
            particles[i].draw();

            for (let j = i; j < particles.length; j++) {
                let dx = particles[i].x - particles[j].x;
                let dy = particles[i].y - particles[j].y;
                let distance = Math.sqrt(dx * dx + dy * dy);

                if (distance < maxDistance) {
                    // Semakin jauh, semakin transparan garisnya
                    let opacity = 1 - (distance / maxDistance);
                    ctx.strokeStyle = `rgba(77, 192, 197, ${opacity})`;
                    ctx.lineWidth = 0.5;
                    ctx.beginPath();
                    ctx.moveTo(particles[i].x, particles[i].y);
                    ctx.lineTo(particles[j].x, particles[j].y);
                    ctx.stroke();
                }
            }
        }
    }

    // Mulai
    resizeCanvas(); // Atur ukuran awal canvas
    animate(); // Mulai animasi
});