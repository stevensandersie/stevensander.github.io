<?php
// Memuat semua data dari file data.php
// __DIR__ akan menunjuk ke direktori /api, jadi kita perlu keluar satu level (../)
$data = require __DIR__ . '/../data.php';

// Daftar kategori yang tersedia, disesuaikan dengan data.php
$categories = ['All', 'Project', 'Education', 'Certificate', 'Activity'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($data['personal_info']['name']) ?> | Portfolio</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700;900&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="/style.css">
    
    <script src="/script.js" defer></script>
</head>
<body>

    <div class="animated-background"></div> 

    <div class="container">

        <header class="main-header animate-on-scroll">
            <a href="#" class="logo"><?= htmlspecialchars($data['personal_info']['name']) ?></a>
            <nav class="main-nav">
                <a href="#home">Home</a>
                <a href="#projects">Projects</a>
                <a href="#tools">Skills</a>
            </nav>
        </header>

        <main>
            <section id="home" class="hero-section-centered animate-on-scroll">
                <div class="hero-image-box">
                    <img src="<?= htmlspecialchars($data['personal_info']['profile_picture_url']) ?>" alt="Foto Profil <?= htmlspecialchars($data['personal_info']['name']) ?>">
                </div>
                <div class="hero-text-box">
                    <h1 class="heading-primary"><?= htmlspecialchars($data['personal_info']['name']) ?></h1>
                    <p class="hero-description">
                        <?= htmlspecialchars($data['personal_info']['description']) ?>
                    </p>
                    <div class="hero-buttons">
                        <a href="<?= htmlspecialchars($data['personal_info']['cv_url']) ?>" class="btn btn-primary" target="_blank">Download CV</a>
                        <a href="#contact" class="btn btn-secondary">Contact Me</a>
                    </div>
                </div>
            </section>

            <section id="projects" class="projects-section animate-on-scroll">
                <div class="section-header-portfolio"> <h2 class="heading-secondary"><?= htmlspecialchars($data['projects_section']['title']) ?></h2>
                    <div class="category-filter-buttons">
                        <?php foreach ($categories as $cat): ?>
                            <button class="filter-btn <?= $cat === 'All' ? 'active' : '' ?>" data-category="<?= strtolower($cat) ?>"><?= htmlspecialchars($cat) ?></button>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div class="project-grid-portfolio"> <?php foreach ($data['portfolio_items'] as $item): ?>
                    <article class="portfolio-card" data-category="<?= htmlspecialchars($item['type']) ?>">
                        <div class="card-content">
                            <?php if (!empty($item['image_url']) && !str_contains($item['image_url'], 'placeholder.com/200x400')): // Check if image exists and is not the mobile one ?>
                                <img src="<?= htmlspecialchars($item['image_url']) ?>" alt="<?= htmlspecialchars($item['title']) ?>" class="card-img-left">
                            <?php endif; ?>
                            
                            <div class="text-block">
                                <h3 class="card-title"><?= htmlspecialchars($item['title']) ?></h3>
                                <p class="card-description"><?= htmlspecialchars($item['description']) ?></p>
                                <a href="<?= htmlspecialchars($item['item_url']) ?>" class="card-link <?= ($item['link_text'] === 'Link not available') ? 'disabled-link' : '' ?>" target="_blank">
                                    <?= htmlspecialchars($item['link_text']) ?>
                                    <?php if ($item['link_text'] !== 'Link not available'): ?>&rarr;<?php endif; ?>
                                </a>
                            </div>

                            <?php if (!empty($item['image_url']) && str_contains($item['image_url'], 'placeholder.com/200x400')): // Only display if it's the mobile image ?>
                                <img src="<?= htmlspecialchars($item['image_url']) ?>" alt="<?= htmlspecialchars($item['title']) ?>" class="card-img-right-mobile">
                            <?php endif; ?>
                        </div>
                    </article>
                    <?php endforeach; ?>
                </div>
            </section>

            <section id="tools" class="tools-section animate-on-scroll">
               <div class="section-header">
                    <h2 class="heading-secondary"><?= htmlspecialchars($data['skills_section']['title']) ?></h2>
                    <p><?= htmlspecialchars($data['skills_section']['description']) ?></p>
                </div>
                <div class="tools-grid-box">
                    <?php foreach ($data['skills'] as $skill): ?>
                    <div class="tool-item">
                        <img src="<?= htmlspecialchars($skill['image_url']) ?>" alt="<?= htmlspecialchars($skill['name']) ?>">
                        <span><?= htmlspecialchars($skill['name']) ?></span>
                    </div>
                    <?php endforeach; ?>
                </div>
            </section>
        </main>

        <footer id="contact" class="main-footer">
            <div class="footer-grid">
                <div class="footer-col">
                    <h4>Phone</h4>
                    <p><?= htmlspecialchars($data['contact_info']['phone']) ?></p>
                </div>
                <div class="footer-col">
                    <h4>Email</h4>
                    <a href="mailto:<?= htmlspecialchars($data['contact_info']['email']) ?>"><?= htmlspecialchars($data['contact_info']['email']) ?></a>
                </div>
                <div class="footer-col">
                    <h4>Social Media</h4>
                    <div class="social-links">
                        <?php foreach ($data['contact_info']['social_links'] as $name => $url): ?>
                        <a href="<?= htmlspecialchars($url) ?>" target="_blank"><?= htmlspecialchars($name) ?></a>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
            <div class="copyright">
                <p>&copy; 2025 by <?= htmlspecialchars($data['personal_info']['name']) ?>. All rights reserved.</p>
            </div>
        </footer>

    </div>
</body>
</html>