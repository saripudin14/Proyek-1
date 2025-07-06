<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$cart = $_SESSION['cart'] ?? [];
?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keranjang Belanja</title>
    <script src="https://cdn.tailwindcss.com"></script>
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
            background-image: linear-gradient(rgba(2,132,199,0.7),rgba(2,132,199,0.7)), url('https://images.unsplash.com/photo-1584308666744-24d5c474f2ae?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80');
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

<body class="bg-gray-50 dark:bg-gray-900 min-h-screen font-sans">

    <nav
        class="bg-white/90 dark:bg-gray-800/90 shadow-sm sticky top-0 z-50 backdrop-blur-md border-b border-sky-100 dark:border-gray-700">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16 items-center">
                <!-- Logo -->
                <div class="flex-shrink-0 flex items-center gap-2">
                    <a href="#"
                        class="text-2xl font-extrabold text-sky-600 dark:text-sky-300 tracking-tight flex items-center gap-2">
                        Paris Plastik
                    </a>
                </div>
                <!-- Menu tengah desktop -->
                <div class="hidden sm:flex sm:space-x-8 absolute left-1/2 transform -translate-x-1/2">
                    <a href="#"
                        class="nav-link-underline text-sky-700 dark:text-white px-3 py-2 text-base font-semibold">Home</a>
                    <a href="#about"
                        class="nav-link-underline text-gray-500 dark:text-gray-300 hover:text-sky-600 dark:hover:text-sky-300 px-3 py-2 text-base font-semibold transition-colors duration-300">Tentang</a>
                    <a href="?url=katalog"
                        class="nav-link-underline text-gray-500 dark:text-gray-300 hover:text-sky-600 dark:hover:text-sky-300 px-3 py-2 text-base font-semibold transition-colors duration-300">Produk</a>
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
        <div id="mobile-menu"
            class="sm:hidden hidden px-4 pb-4 bg-white/95 dark:bg-gray-800/95 rounded-b-lg shadow animate-fade-in">
            <a href="#"
                class="block text-base font-semibold text-sky-700 dark:text-white hover:text-sky-600 dark:hover:text-sky-300 py-2">Home</a>
            <a href="#about"
                class="nav-link-underline block text-base font-semibold text-gray-700 dark:text-gray-200 hover:text-sky-600 dark:hover:text-sky-300 py-2 transition-colors duration-300">Tentang</a>
            <a href="?url=katalog"
                class="nav-link-underline block text-base font-semibold text-gray-700 dark:text-gray-200 hover:text-sky-600 dark:hover:text-sky-300 py-2 transition-colors duration-300">Produk</a>
        </div>
    </nav>
    <main class="max-w-4xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
        <h2 class="text-3xl font-extrabold mb-8 text-center text-sky-700 dark:text-sky-300">Keranjang Belanja</h2>

        <div id="cart-content">

            <div id="empty-cart-message"
                class="<?= empty($cart) ? '' : 'hidden' ?> bg-yellow-100/80 text-yellow-900 px-6 py-8 rounded-2xl text-center shadow-lg animate-fade-in flex flex-col items-center gap-4">
                <i class="fas fa-shopping-cart text-5xl text-yellow-500"></i>
                <div>
                    <h3 class="font-bold text-lg">Keranjang Anda masih kosong</h3>
                    <p class="text-sm text-yellow-800">Ayo jelajahi katalog kami untuk menemukan produk menarik!</p>
                </div>
                <a href="?url=katalog"
                    class="mt-4 inline-flex items-center gap-2 bg-sky-600 hover:bg-sky-700 text-white px-5 py-2 rounded-lg font-bold shadow-lg transition-transform hover:scale-105">
                    <i class="fas fa-store"></i> Kembali ke Katalog
                </a>
            </div>

            <div id="cart-container" class="<?= empty($cart) ? 'hidden' : '' ?>">
                <div id="cart-body" class="space-y-4">
                    <?php $total = 0;
                    if (!empty($cart)): ?>
                        <?php foreach ($cart as $item):
                            $subtotal = $item['price'] * $item['qty'];
                            $total += $subtotal; ?>
                            <div id="cart-row-<?= $item['id'] ?>"
                                class="bg-white dark:bg-gray-800/50 p-4 rounded-2xl shadow-lg border border-sky-100 dark:border-gray-700 flex flex-col md:flex-row md:items-center gap-4 transition-opacity duration-300">
                                <div class="flex-grow-[4] flex items-center gap-4">
                                    <img src="<?= htmlspecialchars($item['image'] ?? '/proyek-1/public/images/placeholder.png') ?>"
                                        alt="<?= htmlspecialchars($item['name']) ?>"
                                        class="w-20 h-20 object-cover rounded-xl shadow-md border border-gray-200 dark:border-gray-700">
                                    <div class="flex-1">
                                        <span
                                            class="font-bold text-slate-800 dark:text-sky-100 text-base line-clamp-2"><?= htmlspecialchars($item['name']) ?></span>
                                        <div class="md:hidden text-gray-500 dark:text-gray-400 font-medium text-sm mt-1">Rp
                                            <?= number_format($item['price'], 0, ',', '.') ?></div>
                                    </div>
                                </div>
                                <div
                                    class="hidden md:block flex-grow-[2] text-sky-700 dark:text-sky-300 font-semibold text-center">
                                    Rp <?= number_format($item['price'], 0, ',', '.') ?></div>
                                <div
                                    class="flex-grow-[2] flex items-center justify-between md:justify-center border-t md:border-none pt-4 md:pt-0">
                                    <span class="md:hidden font-semibold text-gray-600 dark:text-gray-300">Jumlah:</span>
                                    <div class="flex items-center gap-2 bg-gray-100 dark:bg-gray-700 p-1 rounded-full">
                                        <button type="button"
                                            class="cart-update-btn bg-white dark:bg-gray-600 text-sky-600 dark:text-sky-300 rounded-full w-8 h-8 flex items-center justify-center hover:bg-sky-100 transition text-lg font-bold"
                                            data-id="<?= $item['id'] ?>" data-action="decrement">-</button>
                                        <span id="quantity-<?= $item['id'] ?>"
                                            class="w-10 text-center text-base font-bold text-slate-800 dark:text-sky-100"><?= $item['qty'] ?></span>
                                        <button type="button"
                                            class="cart-update-btn bg-white dark:bg-gray-600 text-sky-600 dark:text-sky-300 rounded-full w-8 h-8 flex items-center justify-center hover:bg-sky-100 transition text-lg font-bold"
                                            data-id="<?= $item['id'] ?>" data-action="increment">+</button>
                                    </div>
                                </div>
                                <div
                                    class="flex-grow-[2] flex items-center justify-between border-t md:border-none pt-4 md:pt-0">
                                    <span class="md:hidden font-semibold text-gray-600 dark:text-gray-300">Subtotal:</span>
                                    <span id="subtotal-<?= $item['id'] ?>"
                                        class="font-bold text-sky-800 dark:text-sky-200 text-lg">Rp
                                        <?= number_format($subtotal, 0, ',', '.') ?></span>
                                </div>
                                <button type="button"
                                    class="cart-update-btn self-end md:self-center text-red-500/80 dark:text-red-400/80 hover:text-red-600 dark:hover:text-red-500 text-xs font-semibold flex items-center gap-1"
                                    data-id="<?= $item['id'] ?>" data-action="remove">
                                    <i class="fas fa-trash-alt"></i> Hapus
                                </button>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>

                <div
                    class="flex flex-col md:flex-row justify-between items-center mt-8 gap-4 pt-4 border-t-2 border-sky-100 dark:border-gray-700">
                    <div class="text-xl font-bold text-sky-700 dark:text-sky-300 order-1 md:order-2 text-right">
                        <span>Total Belanja:</span>
                        <span id="grand-total" class="text-2xl ml-2">Rp
                            <?= number_format($total ?? 0, 0, ',', '.') ?></span>
                    </div>
                    <div class="w-full md:w-auto order-2 md:order-1 flex gap-3">
                        <a href="?url=cart-clear"
                            class="w-full text-center inline-flex items-center justify-center gap-2 bg-gray-200 dark:bg-gray-700 hover:bg-gray-300 dark:hover:bg-gray-600 text-gray-800 dark:text-gray-200 px-5 py-2 rounded-lg font-semibold shadow transition"><i
                                class="fas fa-trash"></i> Kosongkan</a>
                        <a href="?url=order"
                            class="w-full text-center inline-flex items-center justify-center gap-2 bg-sky-600 hover:bg-sky-700 text-white px-6 py-2 rounded-lg font-bold shadow-lg transition-transform hover:scale-105"><i
                                class="fas fa-credit-card"></i> Checkout</a>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <footer class="bg-sky-800 text-white">
        <div class="container mx-auto px-4 py-12">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 items-start">
                <div>
                    <h3 class="text-xl font-bold mb-3">Lokasi Kami</h3>
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.4977418860835!2d106.88535447440961!3d-6.197870460716725!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f5045d4c5cc5%3A0x3e9a9ec26746ed3d!2sParis%20Plastik!5e0!3m2!1sen!2sid!4v1751128962289!5m2!1sen!2sid"
                        width="100%" height="180" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade" class="rounded-md shadow-md max-w-md"></iframe>
                </div>
                <div>
                    <h3 class="text-xl font-bold mb-3">Hubungi Kami</h3>
                    <div class="space-y-3">
                        <div class="flex items-start space-x-3">
                            <i class="fas fa-map-marker-alt text-sky-300 mt-1"></i>
                            <p class="text-gray-200 text-sm">Jl. Pinang Raya No.23, RT.9/RW.8, Rawamangun, Kec. Pulo
                                Gadung, Kota Jakarta Timur, Daerah Khusus Ibukota Jakarta 13220</p>
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
                        <a href="#"
                            class="w-10 h-10 bg-slate-700/50 hover:bg-sky-500 rounded-full flex items-center justify-center text-sky-300 hover:text-white transition-colors"><i
                                class="fab fa-facebook-f text-lg"></i></a>
                        <a href="#"
                            class="w-10 h-10 bg-slate-700/50 hover:bg-pink-500 rounded-full flex items-center justify-center text-sky-300 hover:text-white transition-colors"><i
                                class="fab fa-instagram text-lg"></i></a>
                        <a href="#"
                            class="w-10 h-10 bg-slate-700/50 hover:bg-green-500 rounded-full flex items-center justify-center text-sky-300 hover:text-white transition-colors"><i
                                class="fab fa-whatsapp text-lg"></i></a>
                        <a href="#"
                            class="w-10 h-10 bg-slate-700/50 hover:bg-black rounded-full flex items-center justify-center text-sky-300 hover:text-white transition-colors"><i
                                class="fab fa-tiktok text-lg"></i></a>
                    </div>
                </div>
            </div>
            <div
                class="border-t border-sky-700 mt-8 pt-6 flex flex-col md:flex-row md:justify-between md:items-center gap-4">
                <div class="text-sm text-gray-200">&copy; 2025 Paris Plastik. Hak Cipta Dilindungi.</div>
                <div class="flex flex-wrap gap-4 text-sm">
                    <a href="#" class="text-gray-200 hover:text-white transition">Syarat & Ketentuan</a>
                    <a href="#" class="text-gray-200 hover:text-white transition">Kebijakan Privasi</a>
                </div>
            </div>
        </div>
    </footer>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const cartContent = document.getElementById('cart-content');
            if (!cartContent) return;

            const formatRupiah = (number) => {
                return new Intl.NumberFormat('id-ID', {
                    style: 'currency', currency: 'IDR', minimumFractionDigits: 0
                }).format(number).replace(/\s?IDR/g, 'Rp ').trim();
            };

            cartContent.addEventListener('click', function (e) {
                const button = e.target.closest('.cart-update-btn');
                if (!button) return;

                const productId = button.dataset.id;
                const action = button.dataset.action;
                button.disabled = true;
                updateCart(productId, action, button);
            });

            async function updateCart(productId, action, button) {
                try {
                    const response = await fetch('?url=cart-ajax-update', {
                        method: 'POST',
                        headers: { 'Content-Type': 'application/json', 'Accept': 'application/json' },
                        body: JSON.stringify({ product_id: productId, action: action })
                    });

                    if (!response.ok) throw new Error(`HTTP error! status: ${response.status}`);

                    const data = await response.json();
                    if (data.success) {
                        updateCartUI(data);
                    } else {
                        alert(data.message || 'Gagal memperbarui keranjang.');
                    }
                } catch (error) {
                    console.error('Error updating cart:', error);
                    alert('Terjadi kesalahan koneksi.');
                } finally {
                    if (button) button.disabled = false;
                }
            }

            function updateCartUI(data) {
                // Jika item dihapus, animasikan dan hapus dari DOM
                if (data.item_removed) {
                    const row = document.getElementById(`cart-row-${data.product_id}`);
                    if (row) {
                        row.style.transition = 'opacity 0.3s ease';
                        row.style.opacity = '0';
                        setTimeout(() => {
                            row.remove();
                            // SETELAH item dihapus, baru periksa apakah totalnya nol
                            if (data.new_total === 0) {
                                showEmptyCartView();
                            }
                        }, 300);
                    }
                } else {
                    // Jika hanya update jumlah, perbarui angkanya
                    const quantityEl = document.getElementById(`quantity-${data.product_id}`);
                    const subtotalEl = document.getElementById(`subtotal-${data.product_id}`);
                    if (quantityEl) quantityEl.textContent = data.new_qty;
                    if (subtotalEl) subtotalEl.textContent = formatRupiah(data.new_subtotal);
                }

                // Selalu update total keseluruhan
                const grandTotalEl = document.getElementById('grand-total');
                if (grandTotalEl) grandTotalEl.textContent = formatRupiah(data.new_total);
            }

            function showEmptyCartView() {
                const cartContainer = document.getElementById('cart-container');
                const emptyMessage = document.getElementById('empty-cart-message');

                if (cartContainer) {
                    cartContainer.style.transition = 'opacity 0.5s ease';
                    cartContainer.style.opacity = '0';
                    setTimeout(() => {
                        cartContainer.classList.add('hidden');
                        if (emptyMessage) emptyMessage.classList.remove('hidden');
                    }, 500); // Jeda agar transisi terlihat
                }
            }
        });

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
</body>

</html>