<?php

// Ini adalah entry point utama untuk Vercel.
// Untuk portofolio satu halaman ini, kita hanya perlu memuat file konten utama.
// __DIR__ adalah direktori saat ini ('/api'), jadi kita perlu kembali satu level ('/../')
// untuk menemukan portfolio.php di root.

require __DIR__ . '/../portfolio.php';

?>