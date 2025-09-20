<?php
// Memuat semua data dari file data.php
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
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700;900&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="/style.css">
    
    <script src="/script.js" defer></script>
</head>
<body>

    <canvas id="network-background"></canvas>
    <div class="animated-background"></div>

    <div class="container">

        <header class="main-header animate-on-scroll">
            <a href="#" class="logo"><?= htmlspecialchars($data['personal_info']['name']) ?></a>
            
            <button class="nav-toggle" aria-label="toggle navigation">
                <span class="hamburger"></span>
            </button>
            
            <nav class="main-nav">
                <a href="#home">Home</a>
                <a href="#projects">Projects</a>
                <a href="#tools">Skills</a>
            </nav>
        </header>

        <main>
            
            <section id="home" class="hero-section-no-box animate-on-scroll">
                <div class="hero-image-box">
                    <img src="<?= htmlspecialchars($data['personal_info']['profile_picture_url']) ?>" alt="Foto Profil <?= htmlspecialchars($data['personal_info']['name']) ?>">
                </div>
                <div class="hero-text-box">
                    <h1 class="heading-primary"><?= htmlspecialchars($data['personal_info']['name']) ?></h1>
                    <p class="hero-description">
                        <?= nl2br(htmlspecialchars($data['personal_info']['description'])) ?>
                    </p>
                    <div class="hero-buttons">
                        <a href="<?= htmlspecialchars($data['personal_info']['cv_url']) ?>" class="btn btn-primary" target="_blank">Download CV</a>
                        <a href="#contact" class="btn btn-secondary">Contact Me</a>
                    </div>
                </div>
            </section>
            
            <section id="projects" class="projects-section animate-on-scroll">
                <div class="section-header-portfolio">
                    <h2 class="heading-secondary"><?= htmlspecialchars($data['projects_section']['title']) ?></h2>
                    <div class="category-filter-buttons">
                        <?php foreach ($categories as $cat): ?>
                            <button class="filter-btn <?= $cat === 'All' ? 'active' : '' ?>" data-category="<?= strtolower($cat) ?>"><?= htmlspecialchars($cat) ?></button>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div class="project-grid-portfolio">
                    <?php foreach ($data['portfolio_items'] as $item): ?>
                    <article class="portfolio-card" data-category="<?= strtolower(htmlspecialchars($item['type'])) ?>">
                        <div class="card-header">
                            <span class="pill pill-<?= strtolower(htmlspecialchars($item['type'])) ?>"><?= htmlspecialchars($item['type']) ?></span>
                            <?php if (!empty($item['status'])): ?>
                                <span class="status-pill"><?= htmlspecialchars($item['status']) ?></span>
                            <?php endif; ?>
                        </div>
                        <div class="card-body">
                            <h3 class="card-title"><?= htmlspecialchars($item['title']) ?></h3>
                            <p class="card-description"><?= htmlspecialchars($item['description']) ?></p>
                        </div>
                        <div class="card-footer">
                            <div class="tags-container">
                                <?php if (!empty($item['tags'])): ?>
                                    <?php foreach ($item['tags'] as $tag): ?>
                                        <span class="tag"><?= htmlspecialchars($tag) ?></span>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </div>
                            <?php $isActionLink = !in_array($item['link_text'], ['Link not available', 'In Progress']); ?>
                            <a href="<?= htmlspecialchars($item['item_url']) ?>" class="card-link <?= !$isActionLink ? 'disabled-link' : '' ?>" <?= $isActionLink ? 'target="_blank"' : '' ?>>
                                <?= htmlspecialchars($item['link_text']) ?>
                                <?php if ($isActionLink): ?>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 13v6a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h6"></path><polyline points="15 3 21 3 21 9"></polyline><line x1="10" y1="14" x2="21" y2="3"></line></svg>
                                <?php endif; ?>
                            </a>
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
                        <div class="tool-item-icon">
                            <?php if (!empty($skill['image_url'])): ?>
                                <img src="<?= htmlspecialchars($skill['image_url']) ?>" alt="<?= htmlspecialchars($skill['name']) ?>">
                            <?php endif; ?>
                        </div>
                        <span class="tool-item-name"><?= htmlspecialchars($skill['name']) ?></span>
                        <?php if (!empty($skill['level'])): ?>
                            <span class="skill-level pill-<?= strtolower(htmlspecialchars($skill['level'])) ?>">
                                <?= htmlspecialchars($skill['level']) ?>
                            </span>
                        <?php endif; ?>
                    </div>
                    <?php endforeach; ?>
                </div>
            </section>
        </main>

        <footer id="contact" class="main-footer">
            <div class="footer-socials">
                <a href="tel:<?= htmlspecialchars($data['contact_info']['phone']) ?>" aria-label="Nomor Telepon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor"><path d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.02.74-.25 1.02l-2.2 2.2z"/></svg>
                </a>
                <a href="mailto:<?= htmlspecialchars($data['contact_info']['email']) ?>" aria-label="Email">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor"><path d="M20 4H4c-1.1 0-1.99.9-1.99 2L2 18c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/></svg>
                </a>
                
                <?php foreach ($data['contact_info']['social_links'] as $name => $url): ?>
                    <a href="<?= htmlspecialchars($url) ?>" target="_blank" aria-label="<?= htmlspecialchars($name) ?>">
                        <?php if ($name === 'LinkedIn'): ?>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor"><path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-11h3v11zm-1.5-12.268c-.966 0-1.75-.79-1.75-1.764s.784-1.764 1.75-1.764 1.75.79 1.75 1.764-.783 1.764-1.75 1.764zm13.5 12.268h-3v-5.604c0-3.368-4-3.113-4 0v5.604h-3v-11h3v1.765c1.396-2.586 7-2.777 7 2.476v6.759z"/></svg>
                        <?php elseif ($name === 'Instagram'): ?>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.85s-.011 3.584-.069 4.85c-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07s-3.584-.012-4.85-.07c-3.252-.148-4.771-1.691-4.919-4.919-.058-1.265-.069-1.645-.069-4.85s.011-3.584.069-4.85c.149-3.225 1.664-4.771 4.919-4.919 1.266-.057 1.644-.069 4.85-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948s.014 3.667.072 4.947c.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072s3.667-.014 4.947-.072c4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.947s-.014-3.667-.072-4.947c-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.689-.073-4.948-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.162 6.162 6.162 6.162-2.759 6.162-6.162-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4s1.791-4 4-4 4 1.79 4 4-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.441 1.441 1.441 1.441-.645 1.441-1.441-.645-1.44-1.441-1.44z"/></svg>
                        <?php elseif ($name === 'GitHub'): ?>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor"><path d="M12 0c-6.626 0-12 5.373-12 12 0 5.302 3.438 9.8 8.207 11.387.599.111.793-.261.793-.577v-2.234c-3.338.726-4.033-1.416-4.033-1.416-.546-1.387-1.333-1.756-1.333-1.756-1.089-.745.083-.729.083-.729 1.205.084 1.839 1.237 1.839 1.237 1.07 1.834 2.807 1.304 3.492.997.107-.775.418-1.305.762-1.604-2.665-.305-5.467-1.334-5.467-5.931 0-1.311.469-2.381 1.236-3.221-.124-.303-.535-1.524.117-3.176 0 0 1.008-.322 3.301 1.23.957-.266 1.983-.399 3.003-.404 1.02.005 2.047.138 3.006.404 2.291-1.552 3.297-1.23 3.297-1.23.653 1.653.242 2.874.118 3.176.77.84 1.235 1.911 1.235 3.221 0 4.609-2.807 5.624-5.479 5.921.43.372.823 1.102.823 2.222v3.293c0 .319.192.694.801.576 4.765-1.589 8.199-6.086 8.199-11.386 0-6.627-5.373-12-12-12z"/></svg>
                        <?php endif; ?>
                    </a>
                <?php endforeach; ?>
            </div>
            <div class="copyright">
                <p>&copy; 2025 by <?= htmlspecialchars($data['personal_info']['name']) ?>. All rights reserved.</p>
            </div>
        </footer>

    </div>
</body>
</html>