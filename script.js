document.addEventListener("DOMContentLoaded", function() {

    // --- Fungsionalitas Hamburger Menu ---
    const navToggle = document.querySelector('.nav-toggle');
    const nav = document.querySelector('.main-nav');

    navToggle.addEventListener('click', () => {
        nav.classList.toggle('is-visible');
        navToggle.classList.toggle('is-open');
    });

    // --- [MODIFIKASI] Logika Klik Link Navigasi ---
    document.querySelectorAll('.main-nav a').forEach(link => {
        link.addEventListener('click', (event) => {
            
            // Hanya jalankan logika ini di layar mobile
            if (window.innerWidth < 768) {
                const targetId = link.getAttribute('href'); // Contoh: "#projects"
                const targetSection = document.querySelector(targetId);
                
                // Jika link merujuk ke section projects atau tools
                if (targetSection && (targetId === '#projects' || targetId === '#tools')) {
                    event.preventDefault(); // Mencegah lompatan langsung
                    
                    // Tampilkan section yang tadinya tersembunyi
                    targetSection.style.display = 'block';
                    
                    // Scroll ke section tersebut secara halus
                    // Diberi sedikit timeout agar 'display: block' selesai dieksekusi
                    setTimeout(() => {
                        targetSection.scrollIntoView({ behavior: 'smooth' });
                    }, 100);
                }
            }
            
            // Selalu tutup menu setelah link di-klik (di semua ukuran layar)
            nav.classList.remove('is-visible');
            navToggle.classList.remove('is-open');
        });
    });

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
                    card.classList.remove('is-visible');
                    setTimeout(() => card.classList.add('is-visible'), 10);
                } else {
                    card.classList.add('hidden');
                    card.classList.remove('is-visible');
                }
            });
        });
    });

    if (document.querySelector('.filter-btn[data-category="all"]')) {
        document.querySelector('.filter-btn[data-category="all"]').click();
    }

    // --- Animasi Saat Scroll ---
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
                observer.unobserve(entry.target);
            }
        });
    }, {
        threshold: 0.1 
    });
    animatedElements.forEach(element => observer.observe(element));

    // --- BACKGROUND ANIMASI JARINGAN ---
    // (Kode ini tidak berubah, tetap sama seperti sebelumnya)
    const canvas = document.getElementById('network-background');
    if (canvas) {
        const ctx = canvas.getContext('2d');
        let particles = [];
        const numParticles = window.innerWidth < 768 ? 50 : 100;
        const maxDistance = 120;
        const particleSpeed = 0.3;
        let mouse = { x: null, y: null, radius: 150 };

        function resizeCanvas() {
            canvas.width = window.innerWidth;
            canvas.height = window.innerHeight;
            initParticles();
        }

        window.addEventListener('resize', resizeCanvas);
        window.addEventListener('mousemove', (e) => {
            mouse.x = e.x;
            mouse.y = e.y;
        });
        window.addEventListener('mouseout', () => {
            mouse.x = null;
            mouse.y = null;
        });

        class Particle {
            constructor(x, y) {
                this.x = x;
                this.y = y;
                this.size = Math.random() * 2 + 0.5;
                this.baseX = this.x;
                this.baseY = this.y;
                this.density = (Math.random() * 30) + 1;
                this.directionX = Math.random() < 0.5 ? 1 : -1;
                this.directionY = Math.random() < 0.5 ? 1 : -1;
            }

            draw() {
                ctx.fillStyle = 'rgba(77, 192, 197, 0.8)';
                ctx.beginPath();
                ctx.arc(this.x, this.y, this.size, 0, Math.PI * 2);
                ctx.closePath();
                ctx.fill();
            }

            update() {
                this.x += (Math.random() - 0.5) * particleSpeed * this.directionX;
                this.y += (Math.random() - 0.5) * particleSpeed * this.directionY;

                if (this.x > canvas.width || this.x < 0) this.directionX *= -1;
                if (this.y > canvas.height || this.y < 0) this.directionY *= -1;

                let dx = mouse.x - this.x;
                let dy = mouse.y - this.y;
                let distance = Math.sqrt(dx * dx + dy * dy);

                if (distance < mouse.radius) {
                    let forceDirectionX = dx / distance;
                    let forceDirectionY = dy / distance;
                    let force = (mouse.radius - distance) / mouse.radius;
                    let directionX = forceDirectionX * force * this.density;
                    let directionY = forceDirectionY * force * this.density;
                    this.x -= directionX * 0.5;
                    this.y -= directionY * 0.5;
                } else {
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

        function initParticles() {
            particles = [];
            for (let i = 0; i < numParticles; i++) {
                let x = Math.random() * canvas.width;
                let y = Math.random() * canvas.height;
                particles.push(new Particle(x, y));
            }
        }

        function animate() {
            requestAnimationFrame(animate);
            ctx.clearRect(0, 0, canvas.width, canvas.height);

            for (let i = 0; i < particles.length; i++) {
                particles[i].update();
                particles[i].draw();

                for (let j = i; j < particles.length; j++) {
                    let dx = particles[i].x - particles[j].x;
                    let dy = particles[i].y - particles[j].y;
                    let distance = Math.sqrt(dx * dx + dy * dy);
                    if (distance < maxDistance) {
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
        resizeCanvas();
        animate();
    }
});