<?php
require_once __DIR__ . '/../includes/functions.php';
requireLogin(['mahasiswa']);

$pageTitle = 'Lapor Kehilangan';
$base = baseUrl();
require_once __DIR__ . '/../includes/header.php';
require_once __DIR__ . '/../includes/navbar.php';
?>

<main class="mx-auto w-full max-w-[1600px] px-4 pb-10 pt-2 sm:px-6 md:px-[5.5%] md:pb-14">
    <section class="rounded-xl bg-white px-5 py-8 shadow-sm sm:px-8 sm:py-10 md:px-[6%] md:py-12">

        <header class="mb-8 sm:mb-10">
            <h1 class="mb-1 text-base font-bold text-[#111111] sm:text-[17px]">Form Kehilangan Barang</h1>
            <p class="text-xs leading-relaxed text-[#777f92] sm:text-[13px]">
                Isi form di bawah ini dengan detail lengkap untuk mempermudah pencarian
            </p>
        </header>

        <?php if (!empty($_SESSION['error'])): ?>
            <div class="mb-5 rounded-lg border border-red-300 bg-red-50 p-4 text-sm text-red-700">
                <?= e($_SESSION['error']) ?>
            </div>
            <?php unset($_SESSION['error']); ?>
        <?php endif; ?>

        <form action="<?= $base ?>/proses/lapor-hilang.php" method="POST" class="flex flex-col gap-5">

            <div class="flex min-w-0 flex-col gap-2">
                <label for="kategori" class="text-xs font-bold">Kategori Barang</label>
                <select id="kategori" name="kategori" required class="h-[39px] w-full rounded-lg border border-[#b9bfd0] bg-white px-3 text-sm outline-none focus:border-[#06123f] focus:ring-2 focus:ring-[#06123f]/10">
                    <option value="" selected disabled>Pilih Kategori</option>
                    <option value="elektronik">Elektronik</option>
                    <option value="aksesoris">Aksesoris</option>
                    <option value="kartu-identitas">Kartu Identitas</option>
                    <option value="buku">Buku</option>
                    <option value="lainnya">Lainnya</option>
                </select>
            </div>

            <div class="flex min-w-0 flex-col gap-2">
                <label for="nama-barang" class="text-xs font-bold">Nama Barang</label>
                <input type="text" id="nama-barang" name="nama_barang" placeholder="Contoh: Earbuds, Tumbler, Charger Laptop" required
                       class="h-[39px] w-full rounded-lg border border-[#b9bfd0] px-3 text-sm outline-none placeholder:text-[#a7adbf] focus:border-[#06123f] focus:ring-2 focus:ring-[#06123f]/10" />
            </div>

            <div class="flex min-w-0 flex-col gap-2">
                <label for="deskripsi" class="text-xs font-bold">Deskripsi Barang</label>
                <textarea id="deskripsi" name="deskripsi" rows="4" placeholder="Tuliskan detail/ciri-ciri umum barang" required
                          class="min-h-[106px] w-full resize-y rounded-lg border border-[#b9bfd0] px-3 py-3 text-sm outline-none placeholder:text-[#a7adbf] focus:border-[#06123f] focus:ring-2 focus:ring-[#06123f]/10"></textarea>
                <small class="text-xs text-[#777f92]">* Semakin detail informasi yang diberikan, semakin mudah barang ditemukan.</small>
            </div>

            <div class="grid grid-cols-1 gap-5 lg:grid-cols-[1.4fr_1fr_1fr]">
                <div class="flex min-w-0 flex-col gap-2">
                    <label for="lokasi" class="text-xs font-bold">Lokasi Terakhir Dilihat</label>
                    <input type="text" id="lokasi" name="lokasi" placeholder="Contoh: Kantin Gedung A, Parkiran motor B" required
                           class="h-[39px] w-full rounded-lg border border-[#b9bfd0] px-3 text-sm outline-none placeholder:text-[#a7adbf] focus:border-[#06123f] focus:ring-2 focus:ring-[#06123f]/10" />
                </div>
                <div class="flex min-w-0 flex-col gap-2">
                    <label for="tanggal" class="text-xs font-bold">Tanggal</label>
                    <input type="date" id="tanggal" name="tanggal" required
                           class="h-[39px] w-full rounded-lg border border-[#b9bfd0] px-3 text-sm outline-none focus:border-[#06123f] focus:ring-2 focus:ring-[#06123f]/10" />
                </div>
                <div class="flex min-w-0 flex-col gap-2">
                    <label for="waktu" class="text-xs font-bold">Waktu</label>
                    <input type="time" id="waktu" name="waktu" required
                           class="h-[39px] w-full rounded-lg border border-[#b9bfd0] px-3 text-sm outline-none focus:border-[#06123f] focus:ring-2 focus:ring-[#06123f]/10" />
                </div>
            </div>

            <div class="mt-5 flex flex-col-reverse justify-end gap-3 sm:flex-row sm:gap-4">
                <a href="<?= $base ?>/mahasiswa/dashboard.php" class="inline-flex min-h-[44px] min-w-[120px] items-center justify-center rounded-lg border border-black bg-white px-6 py-2 text-[13px] font-semibold text-[#06123f] transition hover:bg-[#f1f2f8]">
                    Batal
                </a>
                <button type="submit" class="inline-flex min-h-[44px] min-w-[120px] items-center justify-center rounded-lg bg-[#06123f] px-6 py-2 text-[13px] font-semibold text-white transition hover:bg-[#13245d] active:scale-[0.98]">
                    Submit
                </button>
            </div>

        </form>
    </section>
</main>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>