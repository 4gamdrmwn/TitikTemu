<?php
/**
 * mahasiswa/dashboard.php
 * Halaman utama untuk role mahasiswa.
 */
require_once __DIR__ . '/../includes/functions.php';

// 🔐 Proteksi: hanya mahasiswa yang login boleh akses
requireLogin(['mahasiswa']);

$pageTitle = 'Beranda';
$base = baseUrl();

require_once __DIR__ . '/../includes/header.php';
require_once __DIR__ . '/../includes/navbar.php';
?>

<!-- ============ HERO ============ -->
<section class="relative flex min-h-[420px] items-center overflow-hidden rounded-xl bg-white p-6 sm:p-10 lg:h-[468px]">
    <img src="<?= $base ?>/assets/img/hero.png" alt="" aria-hidden="true" class="pointer-events-none absolute inset-0 h-full w-full object-cover object-right" />
    <div class="absolute inset-0 bg-gradient-to-r from-white/90 via-white/60 to-transparent lg:hidden"></div>

    <div class="relative flex h-full max-w-[479px] flex-col justify-start gap-8">
        <div class="flex flex-col gap-2">
            <h1 class="font-heading text-[36px] font-extrabold leading-[1] sm:text-[48px]">
                Barang Hilang?<br />
                Temukan di <span class="text-accent">TitikTemu.</span>
            </h1>
            <p class="max-w-[446px] text-base text-body">
                Platform lost &amp; found untuk membantu warga Polinema melaporkan, mencari, dan menemukan kembali barang yang hilang.
            </p>
        </div>
        <div class="flex flex-wrap gap-4">
            <a href="<?= $base ?>/mahasiswa/lapor-hilang.php" class="rounded-lg bg-navy px-6 py-[14px] text-sm font-semibold leading-none text-white shadow-[0_1px_2px_rgba(0,0,0,0.05)] transition hover:bg-navy/90">
                + Lapor Kehilangan
            </a>
            <a href="<?= $base ?>/mahasiswa/lapor-temuan.php" class="rounded-lg border border-navy bg-white/60 px-6 py-[14px] text-sm font-semibold leading-none shadow-[0_1px_2px_rgba(0,0,0,0.05)] transition hover:bg-white">
                + Lapor Temuan
            </a>
        </div>
    </div>
</section>

<!-- ============ BARANG TEMUAN ============ -->
<section class="flex flex-col gap-8">
    <div class="flex items-center justify-between gap-4">
        <h2 class="font-heading text-[24px] font-bold sm:text-[28px]">Barang Temuan</h2>
        <a href="<?= $base ?>/mahasiswa/lapor-temuan.php" class="flex h-[54px] shrink-0 items-center gap-2 rounded-lg border border-navy px-6 text-sm font-semibold transition hover:bg-white">
            Lihat Semua
            <img src="<?= $base ?>/assets/img/arrow.svg" alt="" width="24" height="24" class="h-6 w-6 rotate-180" />
        </a>
    </div>

    <div class="grid grid-cols-1 justify-items-center gap-x-8 gap-y-6 p-0 sm:grid-cols-2 sm:p-8 lg:grid-cols-4">
        <!-- Kartu 1 -->
        <article class="flex w-full max-w-[254px] flex-col gap-4">
            <img src="<?= $base ?>/assets/img/earphone.png" alt="Earphone" class="aspect-square w-full rounded-xl object-cover" />
            <div class="flex flex-col gap-4">
                <div class="flex flex-col gap-2 text-sm">
                    <div class="flex flex-col gap-1">
                        <h3 class="font-semibold">Earphone</h3>
                        <p>📍 Lobby Lt 7</p>
                    </div>
                    <p>📅 24 September 2026</p>
                </div>
                <a href="#" class="self-end text-sm font-semibold text-muted underline decoration-2 underline-offset-[5px] transition hover:text-navy">Lihat Detail</a>
            </div>
        </article>

        <!-- Kartu 2 -->
        <article class="flex w-full max-w-[254px] flex-col gap-4">
            <img src="<?= $base ?>/assets/img/charger-laptop.png" alt="Charger Laptop" class="aspect-square w-full rounded-xl object-cover" />
            <div class="flex flex-col gap-4">
                <div class="flex flex-col gap-2 text-sm">
                    <div class="flex flex-col gap-1">
                        <h3 class="font-semibold">Charger Laptop</h3>
                        <p>📍 RT02</p>
                    </div>
                    <p>📅 24 September 2026</p>
                </div>
                <a href="#" class="self-end text-sm font-semibold text-muted underline decoration-2 underline-offset-[5px] transition hover:text-navy">Lihat Detail</a>
            </div>
        </article>

        <!-- Kartu 3 -->
        <article class="flex w-full max-w-[254px] flex-col gap-4">
            <img src="<?= $base ?>/assets/img/kunci-motor.png" alt="Kunci Motor" class="aspect-square w-full rounded-xl object-cover" />
            <div class="flex flex-col gap-4">
                <div class="flex flex-col gap-2 text-sm">
                    <div class="flex flex-col gap-1">
                        <h3 class="font-semibold">Kunci Motor</h3>
                        <p>📍 Parkiran</p>
                    </div>
                    <p>📅 24 September 2026</p>
                </div>
                <a href="#" class="self-end text-sm font-semibold text-muted underline decoration-2 underline-offset-[5px] transition hover:text-navy">Lihat Detail</a>
            </div>
        </article>

        <!-- Kartu 4 -->
        <article class="flex w-full max-w-[254px] flex-col gap-4">
            <img src="<?= $base ?>/assets/img/charger-typec.png" alt="Charger Type C" class="aspect-square w-full rounded-xl object-cover" />
            <div class="flex flex-col gap-4">
                <div class="flex flex-col gap-2 text-sm">
                    <div class="flex flex-col gap-1">
                        <h3 class="font-semibold">Charger Type C</h3>
                        <p>📍 LKJ 2</p>
                    </div>
                    <p>📅 24 September 2026</p>
                </div>
                <a href="#" class="self-end text-sm font-semibold text-muted underline decoration-2 underline-offset-[5px] transition hover:text-navy">Lihat Detail</a>
            </div>
        </article>
    </div>
</section>

<!-- ============ LAPORAN KEHILANGAN ============ -->
<section class="flex flex-col gap-8">
    <div class="flex items-center justify-between gap-4">
        <h2 class="font-heading text-[24px] font-bold sm:text-[28px]">Laporan Kehilangan</h2>
        <a href="<?= $base ?>/mahasiswa/aktivitas.php" class="flex h-[54px] shrink-0 items-center gap-2 rounded-lg border border-navy px-6 text-sm font-semibold transition hover:bg-white">
            Lihat Semua
            <img src="<?= $base ?>/assets/img/arrow.svg" alt="" width="24" height="24" class="h-6 w-6 rotate-180" />
        </a>
    </div>

    <!-- Tabel desktop -->
    <div class="hidden flex-col gap-8 md:flex">
        <div class="grid grid-cols-5 items-center gap-6 rounded-full bg-white px-10 py-[17px] text-sm font-extrabold text-black">
            <span class="flex h-10 items-center">Nama Barang</span>
            <span class="flex h-10 items-center">Tanggal Kehilangan</span>
            <span class="flex h-10 items-center">Kategori Barang</span>
            <span class="flex h-10 items-center">Lokasi Kehilangan</span>
            <span class="flex h-10 items-center">Status</span>
        </div>

        <div class="flex flex-col gap-4 text-sm font-semibold text-black">
            <div class="grid grid-cols-5 items-center gap-6 rounded-xl bg-white px-10 py-[30px]">
                <span>Earphone</span>
                <span>23/09/2026</span>
                <span>Elektronik</span>
                <span>Meja dekat lift Lt2</span>
                <span class="inline-flex w-fit items-center gap-[10px] rounded-full bg-[#e5f3fe] p-[10px] text-xs text-[#008bfb]">
                    <img src="<?= $base ?>/assets/img/tag-diproses.svg" alt="" width="20" height="20" class="h-5 w-5" />Diproses
                </span>
            </div>
            <div class="grid grid-cols-5 items-center gap-6 rounded-xl bg-white px-10 py-[30px]">
                <span>Earphone</span>
                <span>23/09/2026</span>
                <span>Elektronik</span>
                <span>Meja dekat lift Lt2</span>
                <span class="inline-flex w-fit items-center gap-[10px] rounded-full bg-[#e5f3fe] p-[10px] text-xs text-[#008bfb]">
                    <img src="<?= $base ?>/assets/img/tag-diproses.svg" alt="" width="20" height="20" class="h-5 w-5" />Diproses
                </span>
            </div>
            <div class="grid grid-cols-5 items-center gap-6 rounded-xl bg-white px-10 py-[30px]">
                <span>Earphone</span>
                <span>23/09/2026</span>
                <span>Elektronik</span>
                <span>Meja dekat lift Lt2</span>
                <span class="inline-flex w-fit items-center gap-[10px] rounded-full bg-[#e1fae7] p-[10px] text-xs text-[#33bf5e]">
                    <img src="<?= $base ?>/assets/img/tag-selesai.svg" alt="" width="20" height="20" class="h-5 w-5" />Selesai
                </span>
            </div>
        </div>
    </div>

    <!-- Versi kartu untuk mobile -->
    <div class="flex flex-col gap-4 md:hidden">
        <div class="flex flex-col gap-3 rounded-xl bg-white p-5 text-sm">
            <div class="flex items-start justify-between gap-3">
                <h3 class="font-semibold">Earphone</h3>
                <span class="inline-flex items-center gap-2 rounded-full bg-[#e5f3fe] px-3 py-2 text-xs font-semibold text-[#008bfb]">
                    <img src="<?= $base ?>/assets/img/tag-diproses.svg" alt="" width="20" height="20" class="h-4 w-4" />Diproses
                </span>
            </div>
            <dl class="grid grid-cols-[auto_1fr] gap-x-4 gap-y-1 text-body">
                <dt class="text-muted">Tanggal</dt><dd>23/09/2026</dd>
                <dt class="text-muted">Kategori</dt><dd>Elektronik</dd>
                <dt class="text-muted">Lokasi</dt><dd>Meja dekat lift Lt2</dd>
            </dl>
        </div>
    </div>
</section>

<!-- ============ CARA MELAPOR ============ -->
<section class="flex flex-col items-center gap-8">
    <h2 class="text-center font-heading text-[24px] font-bold sm:text-[28px]">Bagaimana Cara Melapor di TitikTemu?</h2>
    <div class="flex w-full flex-wrap justify-center gap-x-20 gap-y-8">
        <!-- Kehilangan Barang -->
        <div class="flex w-full max-w-[434px] justify-center rounded-xl bg-white px-6 py-16 sm:min-h-[479px]">
            <div class="flex w-[242px] flex-col items-center gap-10">
                <div class="flex flex-col items-center gap-6">
                    <span class="flex h-[50px] w-[50px] items-center justify-center rounded-full bg-navy">
                        <img src="<?= $base ?>/assets/img/icon-search.svg" alt="" class="h-[19.4px] w-[18.2px]" />
                    </span>
                    <h3 class="font-heading text-xl font-semibold text-black">Kehilangan Barang</h3>
                </div>
                <ol class="flex w-full flex-col gap-6 text-black">
                    <li><p class="text-base font-semibold">01 — Laporkan</p><p class="mt-2 pl-[45px] text-sm">Isi detail barang yang hilang.</p></li>
                    <li><p class="text-base font-semibold">02 — Pantau</p><p class="mt-2 pl-[45px] text-sm">Cek perkembangan laporanmu.</p></li>
                    <li><p class="text-base font-semibold">03 — Temukan</p><p class="mt-2 pl-[45px] text-sm">Hubungi pihak terkait jika barang ditemukan</p></li>
                </ol>
            </div>
        </div>
        <!-- Menemukan Barang -->
        <div class="flex w-full max-w-[434px] justify-center rounded-xl bg-white px-6 py-16 sm:min-h-[479px]">
            <div class="flex w-[242px] flex-col items-center gap-10">
                <div class="flex flex-col items-center gap-6">
                    <span class="flex h-[54.5px] w-[54.5px] items-center justify-center rounded-full bg-navy">
                        <img src="<?= $base ?>/assets/img/icon-box.svg" alt="" class="h-[24.1px] w-[22.5px]" />
                    </span>
                    <h3 class="font-heading text-xl font-semibold text-black">Menemukan Barang</h3>
                </div>
                <ol class="flex w-full flex-col gap-6 text-black">
                    <li><p class="text-base font-semibold">01 — Laporkan</p><p class="mt-2 pl-[45px] text-sm">Isi detail barang yang hilang.</p></li>
                    <li><p class="text-base font-semibold">02 — Serahkan</p><p class="mt-2 pl-[45px] text-sm">Bawa barang ke titik penyerahan.</p></li>
                    <li><p class="text-base font-semibold">03 — Verivikasi</p><p class="mt-2 pl-[45px] text-sm">Petugas memeriksa dan memproses barang.</p></li>
                </ol>
            </div>
        </div>
    </div>
</section>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>