<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paris Plastik</title>
    <link href="/proyek-1/public/css/output.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/@preline/preline@2.0.0/dist/preline.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray-50 dark:bg-gray-900 transition-colors duration-300">
    <!-- Navigation -->
    <nav class="bg-white dark:bg-gray-800 shadow-sm sticky top-0 z-50 transition-colors duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16 items-center">
                <!-- Logo -->
                <div class="flex-shrink-0">
                    <a href="/proyek-1/public/" class="flex items-center">
                        <span class="text-2xl font-bold text-blue-600 dark:text-blue-400">Paris Plastik</span>
                    </a>
                </div>
                <!-- Menu tengah desktop -->
                <div class="hidden sm:flex sm:space-x-8 absolute left-1/2 transform -translate-x-1/2">
                    <a href="/proyek-1/public/" class="border-blue-500 text-gray-900 dark:text-white inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">Home</a>
                    <a href="#about" class="nav-link-underline text-gray-500 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-300 inline-flex items-center px-1 pt-1 text-sm font-medium transition-colors duration-300">About Us</a>
                    <a href="/proyek-1/public/?url=produk" class="nav-link-underline text-gray-500 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-300 inline-flex items-center px-1 pt-1 text-sm font-medium transition-colors duration-300">Products</a>
                </div>
                <!-- Icon tombol kanan desktop -->
                <div class="hidden sm:flex sm:items-center space-x-4">
                    <button class="relative p-1 text-gray-400 hover:text-gray-500 dark:hover:text-gray-300">
                        <i class="fas fa-shopping-cart text-lg"></i>
                        <span class="absolute -top-1 -right-1 px-1.5 py-0.5 text-xs font-bold text-white bg-blue-600 rounded-full">0</span>
                    </button>
                    <button id="theme-toggle" class="p-1 text-gray-400 hover:text-gray-500 dark:hover:text-gray-300">
                        <i class="fas fa-moon text-lg dark:hidden"></i>
                        <i class="fas fa-sun text-lg hidden dark:inline"></i>
                    </button>
                </div>
                <!-- Mobile menu button -->
                <div class="sm:hidden">
                    <button id="mobile-menu-toggle" class="p-2 text-2xl text-gray-500 dark:text-gray-300">
                        <i id="menu-icon" class="fas fa-bars"></i>
                    </button>
                </div>
            </div>
        </div>
        <!-- Mobile Menu -->
        <div id="mobile-menu" class="sm:hidden hidden px-4 pb-4">
            <a href="/proyek-1/public/" class="block text-base font-medium text-gray-700 dark:text-gray-200 hover:text-blue-600 dark:hover:text-blue-400">Home</a>
            <a href="#about" class="nav-link-underline block text-base font-medium text-gray-700 dark:text-gray-200 hover:text-blue-600 dark:hover:text-blue-400 transition-colors duration-300">About Us</a>
            <a href="/proyek-1/public/?url=produk" class="nav-link-underline block text-base font-medium text-gray-700 dark:text-gray-200 hover:text-blue-600 dark:hover:text-blue-400 transition-colors duration-300">Products</a>
            <div class="pt-3">
                <button class="relative p-1 text-gray-400 hover:text-gray-500 dark:hover:text-gray-300">
                    <i class="fas fa-shopping-cart text-lg"></i>
                    <span class="absolute -top-1 -right-1 px-1.5 py-0.5 text-xs font-bold text-white bg-blue-600 rounded-full">0</span>
                </button>
                <button id="theme-toggle-mobile" class="p-1 text-gray-400 hover:text-gray-500 dark:hover:text-gray-300">
                    <i class="fas fa-moon text-lg dark:hidden"></i>
                    <i class="fas fa-sun text-lg hidden dark:inline"></i>
                </button>
            </div>
        </div>
    </nav>
    <!-- Hero Section -->
    <section class="hero-bg text-white py-20 md:py-32 flex items-center justify-center min-h-screen bg-gradient-to-br from-blue-600 to-blue-400">
        <div class="container mx-auto px-4 text-center">
            <h1 class="text-4xl tracking-tight font-extrabold sm:text-5xl md:text-6xl animate-fade-in">
                <span class="block">Supplier Produk Plastik</span>
                <span class="block text-blue-200 dark:text-blue-300 delay-100">Berkualitas</span>
            </h1>
            <p class="text-base text-blue-100 dark:text-blue-200 sm:mt-5 sm:text-lg sm:max-w-xl sm:mx-auto md:mt-5 md:text-xl lg:mx-auto delay-200">
                Menyediakan berbagai macam produk plastik untuk kebutuhan rumah tangga, industri, dan usaha Anda dengan kualitas terbaik dan harga bersaing.
            </p>
        </div>
    </section>
    <section id="about" class="py-12 bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-4">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-2">Tentang Kami</h2>
            </div>
            <div class="flex flex-col md:flex-row items-center justify-between">
                <div class="w-full md:w-1/2 mb-8 md:mb-0">
                    <div class="relative">
                        <img src="https://images.unsplash.com/photo-1584308666744-24d5c474f2ae?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80" alt="Toko Plastik" class="rounded-lg shadow-lg relative z-10 w-full h-auto">
                    </div>
                </div>
                <div class="w-full md:w-1/2 md:pl-12">
                    <h3 class="text-2xl font-semibold text-gray-800 mb-4">Pilihan Tepat di Tengah Pasar Tradisional</h3>
                    <p class="text-gray-600 mb-6 text-justify">
                        Kami adalah supplier plastik terpercaya di pasar tradisional, menyediakan produk berkualitas untuk kebutuhan rumah tangga, usaha, dan industri. Dengan pengalaman bertahun-tahun, kami berkomitmen memberikan harga terbaik dan pelayanan ramah.
                    </p>
                    <div class="flex flex-wrap justify-start gap-4">
                        <a href="tel:081234567890" class="inline-flex items-center gap-2 bg-blue-500 hover:bg-blue-600 text-white font-medium py-3 px-6 rounded-lg transition duration-300">
                            Tanya atau Pesan Sekarang
                            <i class="fas fa-phone-alt"></i>
                        </a>
                        <a href="/proyek-1/public/?url=produk" class="inline-flex items-center gap-2 border border-blue-500 text-blue-500 hover:bg-blue-50 font-medium py-3 px-6 rounded-lg transition duration-300">
                            Lihat Katalog Produk
                            <i class="fas fa-shopping-cart"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="py-12 bg-gray-100 dark:bg-gray-800 transition-colors duration-300">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="lg:text-center">
                <h2 class="pt-3 pb-3 text-3xl font-extrabold tracking-tight text-gray-900 dark:text-white sm:text-4xl animate-fade-in">
                    Mengapa Harus Memilih Kami ?
                </h2>
                <p class="max-w-2xl mx-auto text-lg text-gray-600 dark:text-gray-300">
                    Kami berkomitmen untuk memberikan pengalaman belanja yang nyaman, menyenangkan, dan memuaskan bagi setiap pelanggan, mulai dari kualitas produk hingga pelayanan terbaik.
                </p>
            </div>
            <div class="mt-12 grid gap-10 md:grid-cols-2 lg:grid-cols-3">
                <div class="relative animate-fade-in delay-100">
                    <div class="flex items-center justify-center h-12 w-12 rounded-md bg-blue-500 text-white absolute">
                        <i class="fas fa-check text-xl"></i>
                    </div>
                    <div class="ml-16">
                        <p class="text-lg font-medium text-gray-900 dark:text-white">Produk Berkualitas</p>
                        <p class="mt-2 text-base text-gray-500 dark:text-gray-300">
                            Kami menyediakan plastik pilihan dengan daya tahan tinggi, cocok untuk kebutuhan rumah tangga hingga usaha.
                        </p>
                    </div>
                </div>
                <div class="relative animate-fade-in delay-200">
                    <div class="flex items-center justify-center h-12 w-12 rounded-md bg-blue-500 text-white absolute">
                        <i class="fas fa-tags text-xl"></i>
                    </div>
                    <div class="ml-16">
                        <p class="text-lg font-medium text-gray-900 dark:text-white">Harga Terjangkau</p>
                        <p class="mt-2 text-base text-gray-500 dark:text-gray-300">
                            Harga langsung dari pusat grosir pasar, lebih hemat untuk pembelian besar maupun kecil.
                        </p>
                    </div>
                </div>
                <div class="relative animate-fade-in delay-300">
                    <div class="flex items-center justify-center h-12 w-12 rounded-md bg-blue-500 text-white absolute">
                        <i class="fas fa-truck text-xl"></i>
                    </div>
                    <div class="ml-16">
                        <p class="text-lg font-medium text-gray-900 dark:text-white">Pengiriman Cepat & Fleksibel</p>
                        <p class="mt-2 text-base text-gray-500 dark:text-gray-300">
                            Kami siap antar ke rumah, toko, atau kios Anda di area sekitar pasar, termasuk pesanan dalam jumlah besar.
                        </p>
                    </div>
                </div>
                <div class="relative animate-fade-in delay-400">
                    <div class="flex items-center justify-center h-12 w-12 rounded-md bg-blue-500 text-white absolute">
                        <i class="fas fa-undo text-xl"></i>
                    </div>
                    <div class="ml-16">
                        <p class="text-lg font-medium text-gray-900 dark:text-white">Penukaran Mudah</p>
                        <p class="mt-2 text-base text-gray-500 dark:text-gray-300">
                            Tidak cocok? Tenang, proses penukaran bisa langsung dilakukan di toko tanpa ribet.
                        </p>
                    </div>
                </div>
                <div class="relative animate-fade-in delay-500">
                    <div class="flex items-center justify-center h-12 w-12 rounded-md bg-blue-500 text-white absolute">
                        <i class="fas fa-lock text-xl"></i>
                    </div>
                    <div class="ml-16">
                        <p class="text-lg font-medium text-gray-900 dark:text-white">Transaksi Aman & Nyaman</p>
                        <p class="mt-2 text-base text-gray-500 dark:text-gray-300">
                            Kami mendukung pembayaran tunai, transfer bank, dan selalu menyediakan bukti transaksi resmi.
                        </p>
                    </div>
                </div>
                <div class="relative animate-fade-in delay-600">
                    <div class="flex items-center justify-center h-12 w-12 rounded-md bg-blue-500 text-white absolute">
                        <i class="fas fa-headset text-xl"></i>
                    </div>
                    <div class="ml-16">
                        <p class="text-lg font-medium text-gray-900 dark:text-white">Pelayanan Ramah Setiap Hari</p>
                        <p class="mt-2 text-base text-gray-500 dark:text-gray-300">
                            Staf kami akan dengan senang hati membantu Anda memilih produk plastik terbaik sesuai kebutuhan.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Footer Section -->
    <footer class="bg-blue-800 text-white">
        <div class="container mx-auto px-4 py-8">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-start">
                <div class="w-full text-left">
                    <h3 class="text-xl font-bold mb-3">Lokasi Kami</h3>
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.676710799187!2d106.82834531532148!3d-6.176534462244412!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f3f2cfe41989%3A0x4030bfbca7c8a10!2sPasar%20Senin!5e0!3m2!1sen!2sid!4v1618295947309!5m2!1sen!2sid" width="100%" height="180" style="border:0;" allowfullscreen="" loading="lazy" class="rounded-md shadow-md max-w-md"></iframe>
                </div>
                <div class="w-full text-left">
                    <h3 class="text-xl font-bold mb-3">Hubungi Kami</h3>
                    <div class="space-y-3">
                        <div class="flex items-start space-x-3">
                            <svg class="h-5 w-5 mt-1 text-blue-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            <p class="text-gray-300 text-sm">Jl. Pinang Raya No.23, RT.9/RW.8, Rawamangun, Kec. Pulo Gadung, Kota Jakarta Timur, Daerah Khusus Ibukota Jakarta 13220</p>
                        </div>
                        <div class="flex items-center space-x-3">
                            <svg class="h-5 w-5 text-blue-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                            </svg>
                            <p class="text-gray-300">0812-3456-7890</p>
                        </div>
                        <div class="flex items-center space-x-3">
                            <svg class="h-5 w-5 text-blue-300" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                            <p class="text-gray-300">info@plastindo.com</p>
                        </div>
                    </div>
                    <h3 class="text-lg font-semibold mt-5 mb-2">Ikuti Kami</h3>
                    <div class="flex space-x-4">
                        <a href="#" class="text-gray-300 hover:text-white"><i class="fab fa-facebook-f text-xl"></i></a>
                        <a href="#" class="text-gray-300 hover:text-white"><i class="fab fa-instagram text-xl"></i></a>
                        <a href="#" class="text-gray-300 hover:text-white"><i class="fab fa-whatsapp text-xl"></i></a>
                        <a href="#" class="text-gray-300 hover:text-white"><i class="fab fa-tiktok text-xl"></i></a>
                    </div>
                </div>
            </div>
            <div class="border-t border-blue-700 mt-8 pt-6">
                <div class="flex flex-col-reverse md:flex-row md:justify-between md:items-center gap-4">
                    <div class="text-sm text-gray-300">&copy; 2025 PlastikJaya. Hak Cipta Dilindungi.</div>
                    <div class="flex flex-wrap gap-4 text-sm">
                        <a href="#" class="text-gray-300 hover:text-white transition">Syarat & Ketentuan</a>
                        <a href="#" class="text-gray-300 hover:text-white transition">Kebijakan Privasi</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <script src="/proyek-1/public/js/index.js"></script>
</body>
</html>
