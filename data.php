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
        'description' => 'Saya adalah mahasiswa Business Information Technology di BINUS dengan passion kuat di bidang UI/UX design, business analysis, dan project management. Saya aktif dalam berbagai organisasi dan kompetisi untuk terus mengembangkan skill dan kontribusi pada proyek yang berdampak.',
        'cv_url' => 'https://docs.google.com/document/d/1example/edit?usp=sharing', // Ganti dengan link CV Anda
        'contact_me_url' => '#contact'
    ],

    // Teks untuk bagian header di seksi Proyek
    'projects_section' => [
        'title' => 'Portfolio', // Diubah menjadi 'Portfolio'
        'description' => 'Lihatlah berbagai proyek, pendidikan, sertifikat, dan aktivitas yang telah saya lakukan.', // Deskripsi umum
        'see_all_url' => '#' // Link ini mungkin tidak lagi relevan dengan adanya filter
    ],

    // Daftar Item Portfolio (Proyek, Pendidikan, Sertifikat, Aktivitas)
    'portfolio_items' => [ // Diubah namanya menjadi portfolio_items untuk fleksibilitas
        [
            'title' => 'Management KingsHCut',
            'type' => 'project', // Kategori baru
            'description' => 'Aplikasi web berbasis java dan MySQL untuk mengelola stok, penjualan, dan laporan keuangan barbershop.',
            'image_url' => 'https://via.placeholder.com/300x200.png?text=KingsHCut', // Placeholder image
            'link_text' => 'Link not available',
            'item_url' => '#' // Jika ada link ke detail proyek
        ],
        [
            'title' => 'Aplikasi Sewa Alat Berat',
            'type' => 'project',
            'description' => 'Membuat aplikasi sederhana untuk manajemen penyewaan alat berat yang efisien dan terintegrasi.',
            'image_url' => 'https://via.placeholder.com/200x400.png?text=Mobile+App', // Placeholder image
            'link_text' => 'View Details',
            'item_url' => '#'
        ],
        [
            'title' => 'SMAK Penabur Harapan Indah',
            'type' => 'education', // Kategori baru
            'description' => 'Lulus dari jurusan IPS di SMAK Penabur Harapan Indah.',
            'image_url' => 'https://via.placeholder.com/300x200.png?text=School+Building', // Placeholder image
            'link_text' => 'Link not available',
            'item_url' => '#'
        ],
        // Tambahkan item lain di sini sesuai kebutuhan
        [
            'title' => 'UI/UX Design Course',
            'type' => 'certificate',
            'description' => 'Sertifikasi dalam dasar-dasar desain UI/UX dari platform online terkemuka.',
            'image_url' => 'https://via.placeholder.com/300x200.png?text=Certificate',
            'link_text' => 'View Certificate',
            'item_url' => '#'
        ],
        [
            'title' => 'Volunteer at Tech Charity',
            'type' => 'activity',
            'description' => 'Berpartisipasi dalam program pengabdian masyarakat untuk memperkenalkan teknologi kepada anak-anak.',
            'image_url' => 'https://via.placeholder.com/300x200.png?text=Volunteer',
            'link_text' => 'Learn More',
            'item_url' => '#'
        ],
    ],
    
    // Teks untuk bagian header di seksi Skills
    'skills_section' => [
        'title' => 'Tools & Skills',
        'description' => 'Berikut adalah beberapa tools dan keahlian yang saya kuasai dan sering gunakan dalam proyek-proyek saya.'
    ],

    // Daftar Skill Anda
    'skills' => [
        ['name' => 'Figma', 'image_url' => 'https://upload.wikimedia.org/wikipedia/commons/3/33/Figma-logo.svg'],
        ['name' => 'Canva', 'image_url' => 'https://upload.wikimedia.org/wikipedia/commons/0/08/Canva_icon_2021.svg'],
        ['name' => 'Python', 'image_url' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/c/c3/Python-logo-notext.svg/1200px-Python-logo-notext.svg.png'],
        ['name' => 'Ms. Word', 'image_url' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/f/fd/Microsoft_Office_Word_%282019%E2%80%93present%29.svg/1200px-Microsoft_Office_Word_%282019%E2%80%93present%29.svg.png'],
        ['name' => 'Ms. Excel', 'image_url' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/3/34/Microsoft_Office_Excel_%282019%E2%80%93present%29.svg/1200px-Microsoft_Office_Excel_%282019%E2%80%93present%29.svg.png'],
        ['name' => 'Ms. PowerPoint', 'image_url' => 'https://upload.wikimedia.org/wikipedia/commons/thumb/0/0d/Microsoft_Office_PowerPoint_%282019%E2%80%93present%29.svg/1200px-Microsoft_Office_PowerPoint_%282019%E2%80%93present%29.svg.png']
    ],

    // Informasi Kontak di Footer
    'contact_info' => [
        'phone' => '0812-3456-7890', // Ganti dengan nomor telepon Anda
        'email' => 'steven.sander@example.com', // Ganti dengan email Anda
        'social_links' => [
            'LinkedIn' => 'https://linkedin.com/in/yourprofile', // Ganti dengan link LinkedIn Anda
            'Instagram' => 'https://instagram.com/yourprofile', // Ganti dengan link Instagram Anda
            'GitHub' => 'https://github.com/yourusername' // Ganti dengan link GitHub Anda
        ]
    ]
];