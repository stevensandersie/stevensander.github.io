<?php
// Memuat semua data dari file data.php ke dalam variabel $data
$data = require __DIR__ . '/../data.php';
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
    
    <link rel="stylesheet" href="/../style.css">
    
    <script src="/../script.js" defer></script>
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
                        <a href="<?= htmlspecialchars($data['personal_info']['contact_me_url']) ?>" class="btn btn-secondary">Contact Me</a>
                    </div>
                </div>
            </section>

            <section id="projects" class="projects-section animate-on-scroll">
                <div class="section-header">
                    <h2 class="heading-secondary"><?= htmlspecialchars($data['projects_section']['title']) ?></h2>
                    <p><?= htmlspecialchars($data['projects_section']['description']) ?></p>
                    <a href="<?= htmlspecialchars($data['projects_section']['see_all_url']) ?>" class="btn btn-primary" target="_blank">See All Projects</a>
                </div>
                <div class="project-grid">
                    <?php foreach ($data['projects'] as $project): ?>
                    <article class="project-card">
                        <img src="<?= htmlspecialchars($project['image_url']) ?>" alt="<?= htmlspecialchars($project['title']) ?>" class="project-img">
                        <div class="project-content">
                            <span class="project-category"><?= htmlspecialchars($project['category']) ?></span>
                            <h3 class="project-title"><?= htmlspecialchars($project['title']) ?></h3>
                            <a href="<?= htmlspecialchars($project['project_url']) ?>" class="project-link" target="_blank">View Details &rarr;</a>
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