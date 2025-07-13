<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paris Plastik | Toko Plastik Modern</title>
    <meta name="description" content="Supplier produk plastik berkualitas, harga grosir, pelayanan ramah, dan pengiriman cepat.">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/@preline/preline@2.0.0/dist/preline.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        .nav-link-underline {
            position: relative;
        }
        .nav-link-underline::after {
            content: '';
            position: absolute;
            left: 50%;
            bottom: 0;
            transform: translateX(-50%) scaleX(0);
            transform-origin: center;
            width: 100%;
            height: 2px;
            background-color: #0ea5e9;
            transition: transform 0.3s ease-out;
        }
        .nav-link-underline:hover::after {
            transform: translateX(-50%) scaleX(1);
        }
        .hero-bg {
            background-image: linear-gradient(rgba(2,132,199,0.7),rgba(2,132,199,0.7)), url('https://raw.githubusercontent.com/saripudin14/img/refs/heads/main/Paris%20plastik%20(2).jpeg');
            background-size: cover;
            background-position: center;
        }
        .glass {
            background: rgba(255,255,255,0.7);
            backdrop-filter: blur(6px);
            border-radius: 1rem;
            box-shadow: 0 8px 32px 0 rgba(31,38,135,0.15);
        }
        .feature-icon {
            background: linear-gradient(135deg, #0ea5e9 60%, #38bdf8 100%);
        }
        .cta-btn {
            box-shadow: 0 4px 14px 0 rgba(14,165,233,0.15);
        }
        .cta-btn:hover {
            box-shadow: 0 8px 24px 0 rgba(14,165,233,0.25);
        }
    </style>
</head>

<body class="bg-gradient-to-br from-sky-50 to-white dark:from-gray-900 dark:to-gray-950 min-h-screen font-sans">
    <!-- Navigation -->
    <nav class="bg-white/90 dark:bg-gray-800/90 shadow-sm sticky top-0 z-50 backdrop-blur-md border-b border-sky-100 dark:border-gray-700">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16 items-center">
                <!-- Logo -->
                <div class="flex-shrink-0 flex items-center gap-2">
                    <a href="#" class="text-2xl font-extrabold text-sky-600 dark:text-sky-300 tracking-tight flex items-center gap-2">
                        Paris Plastik
                    </a>
                </div>
                <!-- Menu tengah desktop -->
                <div class="hidden sm:flex sm:space-x-8 absolute left-1/2 transform -translate-x-1/2">
                    <a href="#" class="nav-link-underline text-sky-700 dark:text-white px-3 py-2 text-base font-semibold">Home</a>
                    <a href="#about" class="nav-link-underline text-gray-500 dark:text-gray-300 hover:text-sky-600 dark:hover:text-sky-300 px-3 py-2 text-base font-semibold transition-colors duration-300">Tentang</a>
                    <a href="?url=katalog" class="nav-link-underline text-gray-500 dark:text-gray-300 hover:text-sky-600 dark:hover:text-sky-300 px-3 py-2 text-base font-semibold transition-colors duration-300">Produk</a>
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
        <div id="mobile-menu" class="sm:hidden hidden px-4 pb-4 bg-white/95 dark:bg-gray-800/95 rounded-b-lg shadow animate-fade-in">
            <a href="#" class="block text-base font-semibold text-sky-700 dark:text-white hover:text-sky-600 dark:hover:text-sky-300 py-2">Home</a>
            <a href="#about" class="nav-link-underline block text-base font-semibold text-gray-700 dark:text-gray-200 hover:text-sky-600 dark:hover:text-sky-300 py-2 transition-colors duration-300">Tentang</a>
            <a href="?url=katalog" class="nav-link-underline block text-base font-semibold text-gray-700 dark:text-gray-200 hover:text-sky-600 dark:hover:text-sky-300 py-2 transition-colors duration-300">Produk</a>
        </div>
    </nav>
    <!-- Hero Section -->
    <section class="hero-bg min-h-[55vh] flex items-center justify-center py-12 md:py-20">
        <div class="container mx-auto px-4 text-center">
            <div class="glass p-10 md:p-20 inline-block shadow-2xl animate-fade-in">
                <h1 class="text-5xl md:text-6xl font-extrabold tracking-tight text-white drop-shadow-2xl mb-6 animate-fade-in" style="text-shadow: 0 6px 24px rgba(0,0,0,0.45);">
                    Supplier Produk Plastik<br>
                    <span class="text-sky-200 dark:text-sky-300 text-4xl md:text-5xl block mt-4 font-black tracking-wide drop-shadow-[0_6px_24px_rgba(0,0,0,0.55)]" style="letter-spacing:2px;">Berkualitas & Terpercaya</span>
                </h1>
                <p class="text-xl md:text-2xl text-white mb-10 animate-fade-in delay-100 max-w-2xl mx-auto font-semibold drop-shadow-xl" style="color:#fff; text-shadow: 0 2px 12px rgba(0,0,0,0.35);">
                    Menyediakan berbagai macam produk plastik untuk kebutuhan rumah tangga, industri, dan usaha Anda dengan kualitas terbaik dan harga bersaing.
                </p>
                <div class="flex flex-wrap justify-center gap-4 animate-fade-in delay-200">
                    <a href="#about" class="cta-btn inline-flex items-center gap-2 bg-sky-600 hover:bg-sky-700 text-white font-semibold py-3 px-8 rounded-lg transition duration-300 shadow-lg text-lg">
                        Tentang Kami <i class="fas fa-arrow-right"></i>
                    </a>
                    <a href="?url=katalog" class="cta-btn inline-flex items-center gap-2 border border-sky-600 text-sky-600 hover:bg-sky-50 font-semibold py-3 px-8 rounded-lg transition duration-300 bg-white/80 text-lg">
                        Lihat Produk <i class="fas fa-shopping-cart"></i>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <!-- About Section -->
    <section id="about" class="py-24 bg-gradient-to-br from-white via-sky-50 to-emerald-50 dark:from-gray-900 dark:via-gray-900 dark:to-sky-950">
        <div class="container mx-auto px-4">
            <div class="text-center mb-10">
                <h2 class="text-3xl md:text-4xl font-extrabold text-sky-700 dark:text-sky-300 mb-2">Tentang Kami</h2>
                <p class="text-gray-600 dark:text-gray-300 max-w-2xl mx-auto">Paris Plastik adalah toko plastik modern yang menyediakan produk plastik berkualitas untuk kebutuhan rumah tangga, industri, dan usaha Anda. Kami berkomitmen memberikan pelayanan terbaik, harga bersaing, dan pengiriman cepat.</p>
            </div>
            <div class="flex flex-col md:flex-row items-center justify-between gap-10">
                <div class="w-full md:w-1/2 mb-8 md:mb-0 animate-fade-in delay-100">
                    <div class="relative rounded-xl overflow-hidden shadow-xl">
                        <img src="https://raw.githubusercontent.com/saripudin14/img/refs/heads/main/Paris%20plastik%20(1).jpeg" alt="Toko Plastik" class="w-full h-72 object-cover object-center">
                        <div class="absolute inset-0 bg-gradient-to-t from-sky-900/40 to-transparent"></div>
                    </div>
                </div>
                <div class="w-full md:w-1/2 md:pl-12 animate-fade-in delay-200">
                    <h3 class="text-2xl font-bold text-sky-700 dark:text-sky-300 mb-4">Pilihan Tepat di Tengah Pasar Tradisional</h3>
                    <ul class="space-y-3 text-gray-700 dark:text-gray-200 text-lg">
                        <li><i class="fas fa-check-circle text-sky-600 mr-2"></i>Produk plastik lengkap & berkualitas</li>
                        <li><i class="fas fa-check-circle text-sky-600 mr-2"></i>Harga grosir & eceran bersaing</li>
                        <li><i class="fas fa-check-circle text-sky-600 mr-2"></i>Pelayanan ramah & profesional</li>
                        <li><i class="fas fa-check-circle text-sky-600 mr-2"></i>Pengiriman cepat & fleksibel</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section class="py-20 bg-gradient-to-b from-sky-50 via-white to-emerald-100 dark:from-gray-900 dark:via-slate-900 dark:to-sky-950 relative overflow-hidden">
        <div class="absolute inset-0 pointer-events-none select-none opacity-50 dark:opacity-40">
            <svg class="absolute top-0 left-0 w-80 h-80 text-sky-100 dark:text-gray-800 blur-3xl" fill="currentColor" viewBox="0 0 400 400">
                <circle cx="200" cy="200" r="200" />
            </svg>
            <svg class="absolute bottom-0 right-0 w-96 h-96 text-emerald-100 dark:text-gray-800 blur-3xl" fill="currentColor" viewBox="0 0 400 400">
                <circle cx="200" cy="200" r="200" />
            </svg>
        </div>
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="text-center mb-16">
                <h2 class="text-3xl font-extrabold tracking-tight text-slate-800 dark:text-sky-300 sm:text-4xl animate-fade-in drop-shadow-lg">Mengapa Memilih Kami?</h2>
                <p class="max-w-2xl mx-auto text-lg text-gray-600 dark:text-gray-400 mt-4">Kami berkomitmen untuk memberikan pengalaman belanja yang nyaman, menyenangkan, dan memuaskan bagi setiap pelanggan.</p>
            </div>

            <div class="grid gap-x-8 gap-y-12 md:grid-cols-2 lg:grid-cols-3">
                
                <div class="flex items-start gap-5 animate-fade-in delay-100 group">
                    <div class="flex-shrink-0">
                        <span class="flex items-center justify-center h-16 w-16 rounded-2xl text-white shadow-lg text-3xl transition-all duration-300 ring-4 ring-white/50 dark:ring-gray-800/50 bg-gradient-to-br from-sky-500 to-sky-600 group-hover:scale-110 group-hover:-rotate-6">
                            <i class="fas fa-check"></i>
                        </span>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold text-slate-800 dark:text-sky-300 mb-1 transition group-hover:text-emerald-600 dark:group-hover:text-emerald-400">Produk Berkualitas</h3>
                        <p class="text-base text-gray-500 dark:text-gray-400">Plastik pilihan dengan daya tahan tinggi, cocok untuk kebutuhan rumah tangga hingga usaha.</p>
                    </div>
                </div>

                <div class="flex items-start gap-5 animate-fade-in delay-200 group">
                    <div class="flex-shrink-0">
                        <span class="flex items-center justify-center h-16 w-16 rounded-2xl text-white shadow-lg text-3xl transition-all duration-300 ring-4 ring-white/50 dark:ring-gray-800/50 bg-gradient-to-br from-sky-500 to-sky-600 group-hover:scale-110 group-hover:-rotate-6">
                            <i class="fas fa-tags"></i>
                        </span>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold text-slate-800 dark:text-sky-300 mb-1 transition group-hover:text-emerald-600 dark:group-hover:text-emerald-400">Harga Terjangkau</h3>
                        <p class="text-base text-gray-500 dark:text-gray-400">Harga langsung dari pusat grosir pasar, lebih hemat untuk pembelian besar maupun kecil.</p>
                    </div>
                </div>

                <div class="flex items-start gap-5 animate-fade-in delay-300 group">
                    <div class="flex-shrink-0">
                        <span class="flex items-center justify-center h-16 w-16 rounded-2xl text-white shadow-lg text-3xl transition-all duration-300 ring-4 ring-white/50 dark:ring-gray-800/50 bg-gradient-to-br from-sky-500 to-sky-600 group-hover:scale-110 group-hover:-rotate-6">
                            <i class="fas fa-truck"></i>
                        </span>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold text-slate-800 dark:text-sky-300 mb-1 transition group-hover:text-emerald-600 dark:group-hover:text-emerald-400">Pengiriman Cepat & Fleksibel</h3>
                        <p class="text-base text-gray-500 dark:text-gray-400">Siap antar ke rumah, toko, atau kios Anda di area sekitar pasar, termasuk pesanan besar.</p>
                    </div>
                </div>

                <div class="flex items-start gap-5 animate-fade-in delay-400 group">
                    <div class="flex-shrink-0">
                        <span class="flex items-center justify-center h-16 w-16 rounded-2xl text-white shadow-lg text-3xl transition-all duration-300 ring-4 ring-white/50 dark:ring-gray-800/50 bg-gradient-to-br from-sky-500 to-sky-600 group-hover:scale-110 group-hover:-rotate-6">
                            <i class="fas fa-undo"></i>
                        </span>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold text-slate-800 dark:text-sky-300 mb-1 transition group-hover:text-emerald-600 dark:group-hover:text-emerald-400">Penukaran Mudah</h3>
                        <p class="text-base text-gray-500 dark:text-gray-400">Tidak cocok? Proses penukaran bisa langsung di toko tanpa ribet.</p>
                    </div>
                </div>

                <div class="flex items-start gap-5 animate-fade-in delay-500 group">
                    <div class="flex-shrink-0">
                        <span class="flex items-center justify-center h-16 w-16 rounded-2xl text-white shadow-lg text-3xl transition-all duration-300 ring-4 ring-white/50 dark:ring-gray-800/50 bg-gradient-to-br from-sky-500 to-sky-600 group-hover:scale-110 group-hover:-rotate-6">
                            <i class="fas fa-lock"></i>
                        </span>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold text-slate-800 dark:text-sky-300 mb-1 transition group-hover:text-emerald-600 dark:group-hover:text-emerald-400">Transaksi Aman & Nyaman</h3>
                        <p class="text-base text-gray-500 dark:text-gray-400">Mendukung pembayaran tunai, transfer bank, dan selalu menyediakan bukti transaksi resmi.</p>
                    </div>
                </div>

                <div class="flex items-start gap-5 animate-fade-in delay-600 group">
                    <div class="flex-shrink-0">
                        <span class="flex items-center justify-center h-16 w-16 rounded-2xl text-white shadow-lg text-3xl transition-all duration-300 ring-4 ring-white/50 dark:ring-gray-800/50 bg-gradient-to-br from-sky-500 to-sky-600 group-hover:scale-110 group-hover:-rotate-6">
                            <i class="fas fa-headset"></i>
                        </span>
                    </div>
                    <div>
                        <h3 class="text-xl font-bold text-slate-800 dark:text-sky-300 mb-1 transition group-hover:text-emerald-600 dark:group-hover:text-emerald-400">Pelayanan Ramah</h3>
                        <p class="text-base text-gray-500 dark:text-gray-400">Staf kami siap membantu Anda memilih produk plastik terbaik sesuai kebutuhan.</p>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <footer class="bg-sky-800 text-white">
        <div class="container mx-auto px-4 py-12">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-start">
                <div>
                    <h3 class="text-xl font-bold mb-3">Lokasi Kami</h3>
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.4977418860835!2d106.88535447440961!3d-6.197870460716725!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f5045d4c5cc5%3A0x3e9a9ec26746ed3d!2sParis%20Plastik!5e0!3m2!1sen!2sid!4v1751128962289!5m2!1sen!2sid" width="100%" height="180" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" class="rounded-md shadow-md max-w-md"></iframe>
                </div>
                <div>
                    <h3 class="text-xl font-bold mb-3">Hubungi Kami</h3>
                    <div class="space-y-3">
                        <div class="flex items-start space-x-3">
                            <i class="fas fa-map-marker-alt text-sky-300 mt-1"></i>
                            <p class="text-gray-200 text-sm">Jl. Pinang Raya No.23, RT.9/RW.8, Rawamangun, Kec. Pulo Gadung, Kota Jakarta Timur, Daerah Khusus Ibukota Jakarta 13220</p>
                        </div>
                        <div class="flex items-center space-x-3">
                            <i class="fas fa-phone-alt text-sky-300"></i>
                            <p class="text-gray-200">0822-6074-7187</p>
                        </div>
                        <div class="flex items-center space-x-3">
                            <i class="fas fa-envelope text-sky-300"></i>
                            <p class="text-gray-200">farisplastik@gmail.com</p>
                        </div>
                    </div>
                    <h3 class="text-lg font-semibold mt-5 mb-2">Ikuti Kami</h3>
                    <div class="flex space-x-4 mt-1">
                        <a href="#" class="w-10 h-10 bg-slate-700/50 hover:bg-sky-500 rounded-full flex items-center justify-center text-sky-300 hover:text-white transition-colors"><i class="fab fa-facebook-f text-lg"></i></a>
                        <a href="#" class="w-10 h-10 bg-slate-700/50 hover:bg-pink-500 rounded-full flex items-center justify-center text-sky-300 hover:text-white transition-colors"><i class="fab fa-instagram text-lg"></i></a>
                        <a href="#" class="w-10 h-10 bg-slate-700/50 hover:bg-green-500 rounded-full flex items-center justify-center text-sky-300 hover:text-white transition-colors"><i class="fab fa-whatsapp text-lg"></i></a>
                        <a href="#" class="w-10 h-10 bg-slate-700/50 hover:bg-black rounded-full flex items-center justify-center text-sky-300 hover:text-white transition-colors"><i class="fab fa-tiktok text-lg"></i></a>
                    </div>
                </div>
            </div>
            <div class="border-t border-sky-700 mt-8 pt-6 flex flex-col md:flex-row md:justify-between md:items-center gap-4">
                <div class="text-sm text-gray-200">&copy; 2025 Paris Plastik. Hak Cipta Dilindungi.</div>
                <div class="flex flex-wrap gap-4 text-sm">
                    <a href="#" class="text-gray-200 hover:text-white transition">Syarat & Ketentuan</a>
                    <a href="#" class="text-gray-200 hover:text-white transition">Kebijakan Privasi</a>
                </div>
            </div>
        </div>
    </footer>

    <script>
        const html = document.documentElement;
        const menuToggle = document.getElementById('mobile-menu-toggle');
        const mobileMenu = document.getElementById('mobile-menu');
        const menuIcon = document.getElementById('menu-icon');
        const themeToggles = document.querySelectorAll('#theme-toggle, #theme-toggle-mobile');
        let isOpen = false;
        menuToggle.addEventListener('click', () => {
            if (!isOpen) {
                mobileMenu.classList.remove('hidden');
                mobileMenu.classList.remove('animate-slide-up');
                mobileMenu.classList.add('animate-slide-down');
                menuIcon.classList.replace('fa-bars', 'fa-times');
                isOpen = true;
            } else {
                mobileMenu.classList.remove('animate-slide-down');
                mobileMenu.classList.add('animate-slide-up');
                setTimeout(() => {
                    mobileMenu.classList.add('hidden');
                }, 200);
                menuIcon.classList.replace('fa-times', 'fa-bars');
                isOpen = false;
            }
        });
        themeToggles.forEach(btn => {
            btn.addEventListener('click', () => {
                html.classList.toggle('dark');
            });
        });
    </script>
    <style>
        @keyframes slideDown {
            0% { opacity: 0; transform: translateY(-10px); }
            100% { opacity: 1; transform: translateY(0); }
        }
        @keyframes slideUp {
            0% { opacity: 1; transform: translateY(0); }
            100% { opacity: 0; transform: translateY(-10px); }
        }
        .animate-slide-down { animation: slideDown 0.3s ease-out forwards; }
        .animate-slide-up { animation: slideUp 0.2s ease-in forwards; }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .animate-fade-in { animation: fadeIn 0.8s ease-out forwards; }
        .delay-100 { animation-delay: 0.1s; }
        .delay-200 { animation-delay: 0.2s; }
        .delay-300 { animation-delay: 0.3s; }
        .delay-400 { animation-delay: 0.4s; }
        .delay-500 { animation-delay: 0.5s; }
        .delay-600 { animation-delay: 0.6s; }
    </style>
</body>

</html>
