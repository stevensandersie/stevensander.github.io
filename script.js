document.addEventListener("DOMContentLoaded", function() {

    // --- KONTROL MENU MOBILE (Baru) ---
    const mobileNavToggle = document.querySelector('.mobile-nav-toggle');
    const mainHeader = document.querySelector('.main-header');
    const body = document.body;
    const navLinks = document.querySelectorAll('.main-nav a');

    mobileNavToggle.addEventListener('click', () => {
        // Toggle class di body untuk efek (misal: mencegah scroll)
        body.classList.toggle('nav-open');
    });

    // Menutup menu saat salah satu link di klik
    navLinks.forEach(link => {
        link.addEventListener('click', () => {
            if (body.classList.contains('nav-open')) {
                body.classList.remove('nav-open');
            }
        });
    });


    // --- Fungsionalitas Filter Portofolio (Tetap sama) ---
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


    // --- BACKGROUND ANIMASI JARINGAN (Tetap sama) ---
    const canvas = document.getElementById('network-background');
    const ctx = canvas.getContext('2d');
    let particles = [];
    const numParticles = 100;
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
            this.x = x; this.y = y;
            this.size = Math.random() * 2 + 0.5;
            this.baseX = this.x; this.baseY = this.y;
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
                if (this.x !== this.baseX) { let dx = this.x - this.baseX; this.x -= dx / 10; }
                if (this.y !== this.baseY) { let dy = this.y - this.baseY; this.y -= dy / 10; }
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
});