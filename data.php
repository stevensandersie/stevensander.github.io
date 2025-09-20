<?php

// ===================================================================
// == FILE PUSAT DATA PORTOFOLIO ==
// Ubah semua informasi Anda di file ini.
// ===================================================================

return [
    // Informasi Pribadi untuk bagian Hero/Profile
    'personal_info' => [
        'name' => 'Steven Sander',
        'profile_picture_url' => 'https://cdn.momoi.cc/uploads/2025-09-19_b55b0153a6/2025-09-19_b7f981b454.jpg',
        'description' => 'I am an active student in the Business Information Technology program at BINUS University with a strong interest in Data Analysis, AI, and UI/UX Design. Highly adaptable, eager to learn, and capable of collaborating effectively in a team.',
        'cta_button_text' => 'Contact Me',
        'cta_button_link' => '#contact'
    ],

    // Daftar Item Portfolio (Proyek, Pendidikan, Sertifikat, Aktivitas)
    'portfolio_items' => [
        [
            'type' => 'project',
            'title' => 'Management KingsHCut',
            'description' => 'Aplikasi web berbasis Java dan MySQL untuk mengelola stok, penjualan, dan laporan keuangan barbershop.'
        ],
        [
            'type' => 'project',
            'title' => 'Aplikasi Sewa Alat Berat',
            'description' => 'Membuat aplikasi sederhana untuk manajemen penyewaan alat berat yang efisien dan terintegrasi.'
        ],
        [
            'type' => 'education',
            'title' => 'BINUS University',
            'description' => 'Business Information Technology Program. Actively participating in academic projects on Information Systems.'
        ],
        [
            'type' => 'education',
            'title' => 'Unity Senior High School',
            'description' => 'Graduated with the 7th highest diploma score.'
        ],
        [
            'type' => 'activity',
            'title' => 'Leader of Pancasila Socialization',
            'description' => 'Led a group project to socialize the role of Pancasila in combating corruption at SMA Unity School.'
        ]
    ],

    // Link Sosial Media di Footer
    'social_links' => [
        [
            'url' => 'mailto:steven.sander@example.com',
            'title' => 'Email',
            'icon_class' => 'fas fa-envelope'
        ],
        [
            'url' => 'https://www.linkedin.com/in/steven-sander-121b90328/',
            'title' => 'LinkedIn',
            'icon_class' => 'fab fa-linkedin'
        ],
        [
            'url' => 'https://github.com/stevensandersie',
            'title' => 'GitHub',
            'icon_class' => 'fab fa-github'
        ],
        [
            'url' => 'https://instagram.com/stvns_sander',
            'title' => 'Instagram',
            'icon_class' => 'fab fa-instagram'
        ]
    ]
];