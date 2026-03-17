<?php

// 1. Beritahu Laravel untuk memakai folder /tmp untuk menyimpan cache view
// Karena folder asli 'storage' di Vercel tidak bisa ditulis (Read-Only)
putenv('VIEW_COMPILED_PATH=/tmp/views');

// 2. Buat folder tmp-nya jika belum ada
if (!is_dir('/tmp/views')) {
    mkdir('/tmp/views', 0755, true);
}

// 3. Panggil file index asli
require __DIR__ . '/../public/index.php';