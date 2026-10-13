<?php
/**
 * test-db.php — HAPUS setelah selesai testing!
 */
require_once __DIR__ . '/includes/functions.php';
require_once __DIR__ . '/config/database.php';

echo "<pre style='background:#f0fdf4;padding:20px;font-family:monospace;font-size:14px;border:2px solid #16a34a'>";
echo "✅ <b>Koneksi PostgreSQL BERHASIL!</b>\n\n";

// Info server
$row = $pdo->query("SELECT version() AS v")->fetch();
echo "Server   : " . $row['v'] . "\n";

// Info database
$row = $pdo->query("SELECT current_database() AS db, current_user AS usr")->fetch();
echo "Database : " . $row['db'] . "\n";
echo "User     : " . $row['usr'] . "\n";

// Cek tabel yang ada
$stmt = $pdo->query("SELECT tablename FROM pg_tables WHERE schemaname = 'public'");
$tables = $stmt->fetchAll();
echo "\nTabel yang ada di database:\n";
if (empty($tables)) {
    echo "  (belum ada tabel — wajar, kita belum buat)\n";
} else {
    foreach ($tables as $t) echo "  - " . $t['tablename'] . "\n";
}

echo "</pre>";