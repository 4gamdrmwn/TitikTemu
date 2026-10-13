<?php
/**
 * proses/login.php
 * Memproses form login dari index.php
 */
require_once __DIR__ . '/../includes/functions.php';
require_once __DIR__ . '/../config/database.php';

// Hanya izinkan POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    redirect(baseUrl() . '/index.php');
}

$username = trim($_POST['username'] ?? '');
$password = $_POST['password'] ?? '';

// Validasi input kosong
if ($username === '' || $password === '') {
    $_SESSION['error'] = 'Username dan password wajib diisi.';
    redirect(baseUrl() . '/index.php');
}

// 🚧 SIMULASI dulu (belum connect ke tabel users)
// Nanti diganti dengan query PDO + password_verify()
$dummyUsers = [
    'mahasiswa1' => ['id' => 1, 'nama' => 'Budi',   'pass' => 'mahasiswa1', 'role' => 'mahasiswa'],
    'satpam1'    => ['id' => 2, 'nama' => 'Joko',   'pass' => 'satpam1',    'role' => 'petugas'],
    'admin'      => ['id' => 3, 'nama' => 'Admin',  'pass' => 'admin',      'role' => 'admin'],
];

if (!isset($dummyUsers[$username]) || $dummyUsers[$username]['pass'] !== $password) {
    $_SESSION['error'] = 'Username atau password salah.';
    redirect(baseUrl() . '/index.php');
}

// ✅ Login berhasil
$user = $dummyUsers[$username];
$_SESSION['user_id']  = $user['id'];
$_SESSION['username'] = $username;
$_SESSION['nama']     = $user['nama'];
$_SESSION['role']     = $user['role'];

// 🎯 Arahkan sesuai role
redirectByRole();