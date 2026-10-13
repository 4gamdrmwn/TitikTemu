<?php
/**
 * includes/navbar.php
 * Navbar adaptif berdasarkan role user.
 */
if (!function_exists('baseUrl')) {
    require_once __DIR__ . '/functions.php';
}
$base = baseUrl();
$role = currentRole();

// Menu default (kalau user belum login)
$menus = [
    ['label' => 'Login', 'url' => $base . '/index.php'],
];

// Menu berbeda untuk setiap role
if ($role === 'mahasiswa') {
    $menus = [
        ['label' => 'Beranda',        'url' => $base . '/mahasiswa/dashboard.php'],
        ['label' => 'Barang Temuan',  'url' => $base . '/mahasiswa/barang-temuan.php'],
        ['label' => 'Lapor Hilang',   'url' => $base . '/mahasiswa/lapor-hilang.php'],
        ['label' => 'Lapor Temuan',   'url' => $base . '/mahasiswa/lapor-temuan.php'],
        ['label' => 'Aktivitas Saya', 'url' => $base . '/mahasiswa/aktivitas.php'],
    ];
} elseif ($role === 'petugas') {
    $menus = [
        ['label' => 'Beranda',    'url' => $base . '/petugas/dashboard.php'],
        ['label' => 'Verifikasi', 'url' => $base . '/petugas/verifikasi.php'],
        ['label' => 'Riwayat',    'url' => $base . '/petugas/riwayat.php'],
    ];
} elseif ($role === 'admin') {
    $menus = [
        ['label' => 'Beranda',     'url' => $base . '/admin/dashboard.php'],
        ['label' => 'Kelola User', 'url' => $base . '/admin/kelola-user.php'],
        ['label' => 'Laporan',     'url' => $base . '/admin/laporan.php'],
    ];
}

// Deteksi halaman aktif
$currentPath = $_SERVER['REQUEST_URI'];
?>

<header class="sticky top-0 z-50 bg-primary">
    <nav class="flex items-center justify-between px-4 py-[23px] sm:px-8 lg:px-[79px]">
        <a href="<?= $base ?>/<?= $role ? $role . '/dashboard.php' : 'index.php' ?>"
            class="font-heading text-[28px] font-bold leading-none text-navy">
            TitikTemu
        </a>

        <!-- Menu desktop -->
        <div class="hidden items-center gap-6 md:flex lg:gap-10">
            <?php foreach ($menus as $menu):
                $isActive = str_contains($currentPath, basename($menu['url']));
            ?>
                <a href="<?= e($menu['url']) ?>"
                    class="rounded-full px-5 py-[12px] text-sm font-semibold leading-none transition
                          <?= $isActive ? 'bg-accent' : 'hover:bg-accent/30' ?>">
                    <?= e($menu['label']) ?>
                </a>
            <?php endforeach; ?>

            <?php if (isLoggedIn()): ?>
                <a href="<?= $base ?>/proses/logout.php"
                    class="rounded-full px-4 py-[12px] text-sm font-semibold leading-none text-red-600 transition hover:bg-red-50">
                    Logout
                </a>
            <?php endif; ?>
        </div>

        <!-- Tombol menu mobile -->
        <button id="menuBtn" type="button" aria-label="Buka menu" aria-expanded="false"
            class="rounded-lg p-2 md:hidden">
            <svg class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
        </button>
    </nav>

    <!-- Menu mobile -->
    <div id="mobileMenu" class="hidden flex-col gap-2 px-4 pb-4 md:hidden">
        <?php foreach ($menus as $menu): ?>
            <a href="<?= e($menu['url']) ?>"
                class="rounded-full px-6 py-3 text-center text-sm font-semibold
                      <?= str_contains($currentPath, basename($menu['url'])) ? 'bg-accent' : '' ?>">
                <?= e($menu['label']) ?>
            </a>
        <?php endforeach; ?>
        <?php if (isLoggedIn()): ?>
            <a href="<?= $base ?>/proses/logout.php"
                class="rounded-full px-6 py-3 text-center text-sm font-semibold text-red-600">
                Logout
            </a>
        <?php endif; ?>
    </div>
</header>