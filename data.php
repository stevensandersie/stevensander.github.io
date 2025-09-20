<?php

// ===================================================================
// == FILE PUSAT DATA PORTOFOLIO ==
// ===================================================================

return [
    // Informasi Pribadi untuk bagian Hero
    'personal_info' => [
        'name' => 'Steven Sander',
        'profile_picture_url' => 'https://cdn.momoi.cc/uploads/2025-09-19_b55b0153a6/2025-09-19_b7f981b454.jpg',
        'description' => 'I am an active student in the Business Information Technology program at BINUS University with a strong interest in Data analysis, Business Analysis, System Analysis, AI, Machine Learning, UI/UX Design, and System Architecture Design. I have a solid understanding of System Architecture Design or Data Analysis and actively participate in academic projects on Information Systems. I am highly adaptable, eager to learn, and capable of collaborating effectively in a team to achieve common goals.',
        'cv_url' => 'https://docs.google.com/document/d/1example/edit?usp=sharing',
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
            'type' => 'Project',
            'status' => '', // Kosongkan jika tidak ada status
            'description' => 'Aplikasi web berbasis Java dan MySQL untuk mengelola stok, penjualan, dan laporan keuangan barbershop.',
            'tags' => ['Java', 'MySQL', 'Web Development'],
            'link_text' => 'Link not available',
            'item_url' => '#'
        ],
        [
            'title' => 'Aplikasi Sewa Alat Berat',
            'type' => 'Project',
            'status' => '',
            'description' => 'Membuat aplikasi sederhana untuk manajemen penyewaan alat berat yang efisien dan terintegrasi.',
            'tags' => ['Application Development', 'Database Management'],
            'link_text' => 'View Details',
            'item_url' => '#'
        ],
        [
            'title' => 'Unity Senior High School',
            'type' => 'Education',
            'status' => 'Academic Achievement',
            'description' => 'Graduated with the 7th highest diploma score.',
            'tags' => [], // Kosongkan jika tidak ada tags
            'link_text' => 'Link not available',
            'item_url' => '#'
        ],
        [
            'title' => 'Business Information Technology',
            'type' => 'Education',
            'status' => 'Ongoing',
            'description' => 'Currently studying at BINUS University with focus on system analysis and data analysis.',
            'tags' => ['System Analysis', 'Data Analysis', 'AI', 'Machine Learning'],
            'link_text' => 'In Progress',
            'item_url' => '#'
        ],
        [
            'title' => 'System Architecture Certification',
            'type' => 'Certificate',
            'status' => '',
            'description' => 'Certified in system architecture design and implementation best practices.',
            'tags' => ['System Architecture', 'Design Patterns'],
            'link_text' => 'View Certificate',
            'item_url' => '#'
        ],
        [
            'title' => 'Academic Research Project',
            'type' => 'Activity',
            'status' => 'Ongoing',
            'description' => 'Leading research on Information Systems optimization and AI integration in business processes.',
            'tags' => ['Research', 'AI Integration', 'Business Process'],
            'link_text' => 'View Research',
            'item_url' => '#'
        ],
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
        ['name' => 'Visual Paradigm', 'image_url' => ''],
        ['name' => 'Ms. Word', 'image_url' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/f/fd/Microsoft_Office_Word_%282019%E2%80%93present%29.svg/1200px-Microsoft_Office_Word_%282019%E2%80%93present%29.svg.png'],
        ['name' => 'MySQL', 'image_url' => 'https://www.vectorlogo.zone/logos/mysql/mysql-ar21.svg'],
        ['name' => 'Eclipse', 'image_url' => 'https://www.vectorlogo.zone/logos/eclipse/eclipse-ar21.svg']
    ],

    // Informasi Kontak di Footer
    'contact_info' => [
        'phone' => '0812-3456-7890',
        'email' => 'steven.sander@example.com',
        'social_links' => [
            'LinkedIn' => 'https://www.linkedin.com/in/steven-sander-121b90328/',
            'Instagram' => 'https://instagram.com/stvns_sander',
            'GitHub' => 'https://github.com/stevensandersie'
        ]
    ]
];