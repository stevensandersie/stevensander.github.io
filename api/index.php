<?php
// Memuat semua data portfolio dari file data.php
$data = include 'data.php';

// Mendapatkan semua tipe unik dari portfolio items untuk membuat tombol filter secara dinamis
$types = array_unique(array_column($data['portfolio_items'], 'type'));
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Portfolio | <?php echo htmlspecialchars($data['personal_info']['name']); ?></title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <link rel="stylesheet" href="style.css">
</head>
<body>

    <section id="profile" class="container">
        <img src="<?php echo htmlspecialchars($data['personal_info']['profile_picture_url']); ?>" alt="Foto Profil" class="profile-picture" data-aos="zoom-in">
        <h1 data-aos="fade-up"><?php echo htmlspecialchars($data['personal_info']['name']); ?></h1>
        <p class="description" data-aos="fade-up" data-aos-delay="200">
            <?php echo htmlspecialchars($data['personal_info']['description']); ?>
        </p>
        <a href="<?php echo htmlspecialchars($data['personal_info']['cta_button_link']); ?>" class="cta-button" data-aos="fade-up" data-aos-delay="400">
            <?php echo htmlspecialchars($data['personal_info']['cta_button_text']); ?>
        </a>
    </section>

    <section id="portfolio" class="container">
        <h2 data-aos="fade-up">Portfolio</h2>
        <p data-aos="fade-up" data-aos-delay="100" style="color: var(--subtle-text-color); margin-bottom: 20px;">Explore my projects, education, certifications, and activities.</p>

        <div id="filter-buttons" data-aos="fade-up" data-aos-delay="200">
            <button class="filter-btn active" data-filter="all">All</button>
            <?php foreach ($types as $type): ?>
                <button class="filter-btn" data-filter="<?php echo htmlspecialchars($type); ?>"><?php echo htmlspecialchars(ucfirst($type)); ?></button>
            <?php endforeach; ?>
        </div>

        <div class="portfolio-container">
            <?php foreach ($data['portfolio_items'] as $index => $item): ?>
                <div class="portfolio-item" data-type="<?php echo htmlspecialchars($item['type']); ?>" data-aos="zoom-in-up" data-aos-delay="<?php echo ($index % 3) * 100; ?>">
                    <h3><?php echo htmlspecialchars($item['title']); ?></h3>
                    <p><?php echo htmlspecialchars($item['description']); ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </section>

    <footer id="contact" class="container">
        <div class="social-links" data-aos="fade-up">
            <?php foreach ($data['social_links'] as $link): ?>
                <a href="<?php echo htmlspecialchars($link['url']); ?>" target="_blank" title="<?php echo htmlspecialchars($link['title']); ?>">
                    <i class="<?php echo htmlspecialchars($link['icon_class']); ?>"></i>
                </a>
            <?php endforeach; ?>
        </div>
    </footer>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <script src="script.js"></script>

</body>
</html>