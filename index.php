<?php
/**
 * index.php
 * Halaman login utama. Semua role (mahasiswa, petugas, admin) login dari sini.
 */
require_once __DIR__ . '/includes/functions.php';

// Kalau sudah login, langsung lempar ke dashboard sesuai role
if (isLoggedIn()) {
    redirectByRole();
}

$pageTitle = 'Login';
$base = baseUrl();
require_once __DIR__ . '/includes/header_auth.php';
?>

<main class="grid min-h-screen grid-cols-1 gap-0 p-4 sm:p-6 md:grid-cols-2 md:gap-8 md:p-8">

    <!-- Panel gradient kiri -->
    <section class="relative hidden min-h-[500px] overflow-hidden rounded-lg bg-[#06123f] md:block" aria-label="Visual TitikTemu">
        <div class="absolute -top-16 left-[15%] h-80 w-80 rounded-full bg-amber-400/95 blur-3xl"></div>
        <div class="absolute -top-10 right-[-5rem] h-80 w-80 rounded-full bg-rose-500/90 blur-3xl"></div>
        <div class="absolute left-[-5rem] top-[30%] h-96 w-96 rounded-full bg-slate-300/90 blur-3xl"></div>
        <div class="absolute bottom-[-7rem] right-[10%] h-96 w-96 rounded-full bg-[#101a4b] blur-3xl"></div>
        <div class="absolute inset-0 bg-gradient-to-br from-transparent via-transparent to-[#06123f]/50"></div>
    </section>

    <!-- Form login -->
    <section class="flex min-h-[calc(100vh-2rem)] items-center justify-center px-2 py-10 sm:px-6 md:min-h-0 md:px-4 md:py-8">
        <div class="w-full max-w-[440px]">

            <header class="mb-12 text-center sm:mb-16 md:mb-16">
                <h1 class="mb-3 text-4xl font-extrabold tracking-tight sm:text-[44px]">TitikTemu.</h1>
                <p class="text-sm leading-relaxed text-[#999bad] sm:text-base">Platform Lost &amp; Found Polinema</p>
            </header>

            <?php if (!empty($_SESSION['error'])): ?>
                <div class="mb-5 rounded-lg border border-red-300 bg-red-50 p-4 text-sm text-red-700">
                    <?= e($_SESSION['error']) ?>
                </div>
                <?php unset($_SESSION['error']); ?>
            <?php endif; ?>

            <?php if (!empty($_SESSION['success'])): ?>
                <div class="mb-5 rounded-lg border border-green-300 bg-green-50 p-4 text-sm text-green-700">
                    <?= e($_SESSION['success']) ?>
                </div>
                <?php unset($_SESSION['success']); ?>
            <?php endif; ?>

            <form action="<?= $base ?>/proses/login.php" method="POST" class="w-full">

                <div class="mb-7 flex flex-col gap-3">
                    <label for="username" class="text-[13px] font-bold">Username</label>
                    <input type="text" id="username" name="username" autocomplete="username" required
                           class="h-[41px] w-full rounded-lg border border-[#b8bdce] bg-transparent px-4 text-sm outline-none placeholder:text-[#a7aabd] focus:border-[#06123f] focus:ring-2 focus:ring-[#06123f]/10" />
                </div>

                <div class="mb-7 flex flex-col gap-3">
                    <label for="password" class="text-[13px] font-bold">Password</label>
                    <input type="password" id="password" name="password" autocomplete="current-password" required
                           class="h-[41px] w-full rounded-lg border border-[#b8bdce] bg-transparent px-4 text-sm outline-none placeholder:text-[#a7aabd] focus:border-[#06123f] focus:ring-2 focus:ring-[#06123f]/10" />
                </div>

                <div class="mb-9 flex justify-end">
                    <a href="#" class="text-sm font-bold text-[#74758b] hover:text-[#06123f] hover:underline">Forgot Password?</a>
                </div>

                <button type="submit" class="h-[52px] w-full rounded-lg bg-[#06123f] text-sm font-bold text-white transition-colors hover:bg-[#10245e] active:scale-[0.99]">
                    Sign in
                </button>

            </form>

        </div>
    </section>
</main>

<?php require_once __DIR__ . '/includes/footer_auth.php'; ?>