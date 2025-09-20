<?php

// ===================================================================
// == FILE PUSAT DATA PORTOFOLIO ==
// Ubah semua informasi Anda di file ini.
// Cukup ganti teks di antara tanda kutip (' ').
// ===================================================================

return [
    // Informasi Pribadi untuk bagian Hero
    'personal_info' => [
        'name' => 'Steven Sander',
        'profile_picture_url' => 'https://cdn.momoi.cc/uploads/2025-09-19_b55b0153a6/2025-09-19_b7f981b454.jpg',
        'description' => 'I am an active student in the Business Information Technology program at BINUS University with a strong interest in Data analysis, Business Analysis, System Analysis, AI, Machine Learning, UI/UX Design, and System Architecture Design. I have a solid understanding of System Architecture Design or Data Analysis and actively participate in academic projects on Information Systems. I am highly adaptable, eager to learn, and capable of collaborating effectively in a team to achieve common goals.',
        'cv_url' => 'https://docs.google.com/document/d/1example/edit?usp=sharing', // Ganti dengan link CV Anda
        'contact_me_url' => '#contact'
    ],

    // Teks untuk bagian header di seksi Proyek
    'projects_section' => [
        'title' => 'Portfolio',
        'description' => 'Explore my projects, education, certifications, and activities.',
    ],

    // Daftar Item Portfolio (Proyek, Pendidikan, Sertifikat, Aktivitas)
    'portfolio_items' => [
        [
            'title' => 'Management KingsHCut',
            'type' => 'project',
            'description' => 'Aplikasi web berbasis java dan MySQL untuk mengelola stok, penjualan, dan laporan keuangan barbershop.',
            'image_url' => '', // Kosongkan jika tidak ada gambar
            'link_text' => 'Link not available',
            'item_url' => '#'
        ],
        [
            'title' => 'Aplikasi Sewa Alat Berat',
            'type' => 'project',
            'description' => 'Membuat aplikasi sederhana untuk manajemen penyewaan alat berat yang efisien dan terintegrasi.',
            'image_url' => '', // Kosongkan jika tidak ada gambar
            'link_text' => 'View Details',
            'item_url' => '#'
        ],
        [
            'title' => 'Unity Senior High School',
            'type' => 'education',
            'description' => 'Graduated with the 7th highest diploma score.',
            'image_url' => '', // Kosongkan jika tidak ada gambar
            'link_text' => 'Link not available',
            'item_url' => '#'
        ],
        // Tambahkan item lain di sini
    ],
    
    // Teks untuk bagian header di seksi Skills
    'skills_section' => [
        'title' => 'Tools & Skills',
        'description' => 'Here are my core skills and the primary tools I use in my projects.'
    ],

    // Daftar Skill Anda
    'skills' => [
        ['name' => 'Figma', 'image_url' => 'https://upload.wikimedia.org/wikipedia/commons/3/33/Figma-logo.svg'],
        ['name' => 'Canva', 'image_url' => 'https://upload.wikimedia.org/wikipedia/commons/0/08/Canva_icon_2021.svg'],
        ['name' => 'Visual Paradigm', 'image_url' => ''], // Ganti dengan URL logo jika ada
        ['name' => 'Ms. Word', 'image_url' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/f/fd/Microsoft_Office_Word_%282019%E2%80%93present%29.svg/1200px-Microsoft_Office_Word_%282019%E2%80%93present%29.svg.png'],
        ['name' => 'MySql', 'image_url' => 'https://www.vectorlogo.zone/logos/mysql/mysql-ar21.svg'], // Contoh URL logo MySQL
        ['name' => 'Eclipse', 'image_url' => 'https://www.vectorlogo.zone/logos/eclipse/eclipse-ar21.svg'] // Contoh URL logo Eclipse
    ],

    // Informasi Kontak di Footer
    'contact_info' => [
        'phone' => '0812-3456-7890', // Ganti dengan nomor telepon Anda
        'email' => 'steven.sander@example.com', // Ganti dengan email Anda
        'social_links' => [
            'LinkedIn' => 'https://www.linkedin.com/in/steven-sander-121b90328/',
            'Instagram' => 'https://instagram.com/stvns_sander',
            'GitHub' => 'https://github.com/stevensandersie'
        ]
    ]
];