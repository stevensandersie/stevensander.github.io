<?php
// ... (kode PHP Anda di awal, tidak perlu diubah) ...
$data = require __DIR__ . '/../data.php';
$categories = ['All', 'Project', 'Education', 'Certificate', 'Activity'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
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
            </main>

        <footer id="contact" class="main-footer">
            </footer>

    </div>
</body>
</html>