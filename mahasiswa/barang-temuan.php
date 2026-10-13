<?php
require_once __DIR__ . '/../includes/functions.php';
requireLogin(['mahasiswa']);

$pageTitle = 'Barang Temuan';
$base = baseUrl();
require_once __DIR__ . '/../includes/header.php';
require_once __DIR__ . '/../includes/navbar.php';
?>

<div class="mx-auto w-full max-w-[1100px] px-5">

    <!-- Kategori -->
    <div class="flex justify-between my-10 px-2.5 flex-wrap gap-4">
        <button class="flex items-center gap-2.5 rounded-full bg-accent px-8 py-2.5 text-sm font-semibold text-navy">
            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M3 3h8v8H3zM13 3h8v8h-8zM3 13h8v8H3zM13 13h8v8h-8z"/></svg>
            Semua
        </button>
        <button class="flex items-center gap-2.5 rounded-full px-8 py-2.5 text-sm font-semibold text-muted transition hover:bg-slate-200 hover:text-navy">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><rect x="6" y="2" width="12" height="20" rx="2"/></svg>
            Elektronik
        </button>
        <button class="flex items-center gap-2.5 rounded-full px-8 py-2.5 text-sm font-semibold text-muted transition hover:bg-slate-200 hover:text-navy">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path d="M3 18v-6a9 9 0 0118 0v6"/><path d="M21 19a2 2 0 01-2 2h-1v-6h3v4zM3 19a2 2 0 002 2h1v-6H3v4z"/></svg>
            Aksesoris
        </button>
        <button class="flex items-center gap-2.5 rounded-full px-8 py-2.5 text-sm font-semibold text-muted transition hover:bg-slate-200 hover:text-navy">
            <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><rect x="3" y="4" width="18" height="16" rx="2"/><path d="M7 8h10M7 12h10M7 16h6"/></svg>
            Kartu Identitas
        </button>
    </div>

    <!-- Search & Sort -->
    <div class="flex justify-between items-center mb-8 gap-4 flex-wrap">
        <div class="relative w-full sm:w-1/2">
            <svg class="absolute left-4 top-1/2 -translate-y-1/2 w-4 h-4 text-slate-400" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><circle cx="11" cy="11" r="7"/><path d="M21 21l-4.35-4.35"/></svg>
            <input type="text" placeholder="Cari Barang"
                   class="w-full rounded-full bg-slate-100 py-3 pl-11 pr-3 text-sm outline-none focus:bg-slate-200" />
        </div>
        <div class="flex items-center gap-3">
            <span class="text-sm font-semibold">Sort by:</span>
            <div class="relative">
                <select class="appearance-none rounded-full bg-slate-100 py-2.5 pl-5 pr-10 text-sm font-medium outline-none hover:bg-slate-200">
                    <option>Terbaru</option>
                    <option>Terlama</option>
                    <option>A - Z</option>
                </select>
                <svg class="pointer-events-none absolute right-4 top-1/2 -translate-y-1/2 w-3 h-3 text-slate-400" fill="none" stroke="currentColor" stroke-width="3" viewBox="0 0 24 24"><path d="M6 9l6 6 6-6"/></svg>
            </div>
        </div>
    </div>

    <!-- Grid Item -->
    <div class="rounded-2xl bg-white p-8 mb-12">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5 gap-y-9">
            <?php
            // Data dummy — nanti diambil dari database
            $items = [
                ['nama' => 'Earphone',      'lokasi' => 'Lobby Lt 7', 'tanggal' => '24 September 2026', 'img' => 'earphone.png'],
                ['nama' => 'Charger Laptop','lokasi' => 'RT02',       'tanggal' => '24 September 2026', 'img' => 'charger-laptop.png'],
                ['nama' => 'Kunci Motor',   'lokasi' => 'Parkiran',   'tanggal' => '24 September 2026', 'img' => 'kunci-motor.png'],
                ['nama' => 'Charger Type C','lokasi' => 'LKJ 2',      'tanggal' => '24 September 2026', 'img' => 'charger-typec.png'],
                ['nama' => 'Charger Laptop','lokasi' => 'RT02',       'tanggal' => '24 September 2026', 'img' => 'charger-laptop.png'],
                ['nama' => 'Kunci Motor',   'lokasi' => 'Parkiran',   'tanggal' => '24 September 2026', 'img' => 'kunci-motor.png'],
                ['nama' => 'Charger Type C','lokasi' => 'LKJ 2',      'tanggal' => '24 September 2026', 'img' => 'charger-typec.png'],
                ['nama' => 'Earphone',      'lokasi' => 'Lobby Lt 7', 'tanggal' => '24 September 2026', 'img' => 'earphone.png'],
            ];
            foreach ($items as $item): ?>
                <div class="flex flex-col">
                    <img src="<?= $base ?>/assets/img/<?= e($item['img']) ?>"
                         alt="<?= e($item['nama']) ?>"
                         class="w-full h-[200px] object-cover rounded-xl mb-3 transition hover:scale-[1.02] cursor-pointer" />
                    <h3 class="text-sm font-semibold mb-1.5"><?= e($item['nama']) ?></h3>
                    <div class="flex items-center gap-1.5 text-xs text-navy font-medium mb-1">
                        <svg class="w-3 h-3 text-red-500" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2C8 2 5 5 5 9c0 5 7 13 7 13s7-8 7-13c0-4-3-7-7-7zm0 9.5A2.5 2.5 0 1112 6.5a2.5 2.5 0 010 5z"/></svg>
                        <span><?= e($item['lokasi']) ?></span>
                    </div>
                    <div class="flex items-center gap-1.5 text-xs text-navy font-medium mb-2">
                        <svg class="w-3 h-3 text-red-500" fill="currentColor" viewBox="0 0 24 24"><path d="M19 4h-1V2h-2v2H8V2H6v2H5a2 2 0 00-2 2v14a2 2 0 002 2h14a2 2 0 002-2V6a2 2 0 00-2-2zm0 16H5V10h14v10z"/></svg>
                        <span><?= e($item['tanggal']) ?></span>
                    </div>
                    <div class="text-right mt-2">
                        <a href="<?= $base ?>/mahasiswa/detail-temuan.php?id=<?= $loop_id ?? 0 ?>"
                           class="text-xs text-muted underline font-semibold hover:text-navy">Lihat Detail</a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

</div>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>