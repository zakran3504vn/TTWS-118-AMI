<!-- Header -->
    <header id="mainHeader" class="bg-white text-primary shadow-sm">
        <div id="bottomHeader" class="border-t bg-white">
            <div class="max-w-[1440px] mx-auto px-4 py-3">
                <div class="flex justify-between items-center">
                    <img src="../assets/uploads/logo-ami.png" alt="AMI Travels" class="h-16">
                    <nav class="hidden lg:flex items-center gap-8">
                        <a href="../index.php"
                            data-readdy="true"
                            class="text-black font-medium text-l hover:text-primary transition-colors">TRANG CHỦ</a>
                        <a href="../gioi-thieu/index.php"
                            data-readdy="true"
                            class="text-black font-medium text-l hover:text-primary transition-colors">GIỚI THIỆU</a>
                        <div class="relative group">
                            <button id="travelMenuBtn"
                                class="text-black font-medium text-l hover:text-primary transition-colors flex items-center gap-1">
                                DU LỊCH
                                <i class="ri-arrow-down-s-line"></i>
                            </button>
                            <div
                                class="absolute top-full left-0 bg-white shadow-lg rounded-lg py-2 w-64 hidden group-hover:block z-50">
                                <div class="relative group/sub hover:bg-gray-50">
                                    <a href="../du-lich/index.php"
                                        data-readdy="true"
                                        class="flex items-center justify-between px-4 py-2 hover:text-primary">
                                        Du lịch nước ngoài
                                        <i class="ri-arrow-right-s-line"></i>
                                    </a>
                                    <div class="absolute left-full top-0 bg-white shadow-lg rounded-lg py-2 w-48 hidden group-hover/sub:block">
                                        <a href="../du-lich/index.php?continent=asia" class="block px-4 py-2 hover:bg-gray-50 hover:text-primary">Châu Á</a>
                                        <a href="../du-lich/index.php?continent=europe" class="block px-4 py-2 hover:bg-gray-50 hover:text-primary">Châu Âu</a>
                                        <a href="../du-lich/index.php?continent=africa" class="block px-4 py-2 hover:bg-gray-50 hover:text-primary">Châu Phi</a>
                                        <a href="../du-lich/index.php?continent=oceania" class="block px-4 py-2 hover:bg-gray-50 hover:text-primary">Châu Úc</a>
                                        <a href="../du-lich/index.php?continent=america" class="block px-4 py-2 hover:bg-gray-50 hover:text-primary">Châu Mỹ</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <a href="../dich-vu-visa/index.php" class="text-black font-medium text-l hover:text-primary transition-colors">DỊCH VỤ
                            VISA</a>
                        <a href="../tin-tuc/index.php"
                            data-readdy="true"
                            class="text-black font-medium text-l hover:text-primary transition-colors">TIN TỨC</a>
                        <a href="../lien-he/index.php"
                            data-readdy="true"
                            class="text-black font-medium text-l hover:text-primary transition-colors">LIÊN HỆ</a>
                        <form action="../du-lich/index.php" method="GET" class="flex items-center bg-gray-100 rounded ml-4">
                            <input type="text" name="search" placeholder="Tìm kiếm tour..."
                                class="px-3 py-1 text-gray-800 text-sm border-none outline-none rounded-l bg-transparent">
                            <button type="submit" class="bg-primary px-3 py-1 rounded-r">
                                <i class="ri-search-line text-white"></i>
                            </button>
                        </form>
                    </nav>
                    <button id="menuToggle" class="lg:hidden w-10 h-10 flex items-center justify-center">
                        <i class="ri-menu-line text-xl"></i>
                    </button>
                    <div id="mobileMenu"
                        class="fixed inset-0 bg-black/50 z-50 hidden opacity-0 transition-opacity duration-300">
                        <div
                            class="bg-white w-[280px] h-full ml-auto overflow-y-auto transform translate-x-full transition-transform duration-300">
                            <div class="p-4 flex justify-between items-center border-b">
                                <img src="../assets/uploads/logo-ami.png" alt="AMI Travels" class="h-12">
                                <button id="menuClose" class="w-10 h-10 flex items-center justify-center text-primary">
                                    <i class="ri-close-line text-xl"></i>
                                </button>
                            </div>
                            <div class="p-4 border-b space-y-4">
                                <div class="flex items-center gap-2 text-black font-medium text-l">
                                    <i class="ri-customer-service-line"></i>
                                    <span>Hotline: <strong></strong></span>
                                </div>
                                <div class="flex items-center bg-gray-100 rounded">
                                    <input type="text" placeholder="Bạn muốn đi đâu? 3 ngày"
                                        class="px-3 py-2 text-gray-800 text-sm border-none outline-none rounded-l bg-transparent w-full">
                                    <button class="bg-primary px-3 py-2 rounded-r">
                                        <i class="ri-search-line text-white"></i>
                                    </button>
                                </div>
                            </div>
                            <nav class="p-4">
                                <a href="../index.php"
                                    data-readdy="true"
                                    class="block py-3 text-black font-medium text-l hover:text-primary transition-colors border-b">TRANG CHỦ</a>
                                <a href="./gioi-thieu/index.php"
                                    data-readdy="true"
                                    class="block py-3 text-black font-medium text-l hover:text-primary transition-colors border-b">GIỚI
                                    THIỆU</a>
                                <div class="border-b">
                                    <button
                                        class="w-full py-3 text-black font-medium text-l hover:text-primary transition-colors flex items-center justify-between"
                                        onclick="this.nextElementSibling.classList.toggle('hidden')">
                                        DU LỊCH
                                        <i class="ri-arrow-down-s-line"></i>
                                    </button>
                                    <div class="hidden pl-4">
                                        <div class="border-l border-gray-200">
                                            <button
                                                class="w-full py-3 text-black font-medium text-l hover:text-primary transition-colors flex items-center justify-between pl-4"
                                                onclick="this.nextElementSibling.classList.toggle('hidden')">
                                                Du lịch nước ngoài
                                                <i class="ri-arrow-down-s-line"></i>
                                            </button>
                                            <div class="absolute left-full top-0 bg-white shadow-lg rounded-lg py-2 w-48 hidden group-hover/sub:block">
                                                <a href="../du-lich/index.php?continent=all" class="block px-4 py-2 hover:bg-gray-50 hover:text-primary">Tất cả</a>
                                                <a href="../du-lich/index.php?continent=asia" class="block px-4 py-2 hover:bg-gray-50 hover:text-primary">Châu Á</a>
                                                <a href="../du-lich/index.php?continent=europe" class="block px-4 py-2 hover:bg-gray-50 hover:text-primary">Châu Âu</a>
                                                <a href="../du-lich/index.php?continent=africa" class="block px-4 py-2 hover:bg-gray-50 hover:text-primary">Châu Phi</a>
                                                <a href="../du-lich/index.php?continent=oceania" class="block px-4 py-2 hover:bg-gray-50 hover:text-primary">Châu Úc</a>
                                                <a href="../du-lich/index.php?continent=america" class="block px-4 py-2 hover:bg-gray-50 hover:text-primary">Châu Mỹ</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <a href="../dich-vu-visa/index.php"
                                    class="block py-3 text-black font-medium text-l hover:text-primary transition-colors border-b">DỊCH
                                    VỤ VISA</a>
                                <a href="../tin-tuc/index.php"
                                    data-readdy="true"
                                    class="block py-3 text-black font-medium text-l hover:text-primary transition-colors border-b">TIN
                                    TỨC</a>
                                <a href="../lien-he/index.php"
                                    data-readdy="true"
                                    class="block py-3 text-black font-medium text-l hover:text-primary transition-colors border-b">LIÊN
                                    HỆ</a>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
    </header>

    <style>
        .header-fixed {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1000;
            background: white;
        }

        .header-hidden {
            transform: translateY(-100%);
        }
    </style>
    <script id="mobileNav">
        document.addEventListener('DOMContentLoaded', function () {
            const mainHeader = document.getElementById('mainHeader');
            const bottomHeader = document.getElementById('bottomHeader');
            const menuToggle = document.getElementById('menuToggle');
            let lastScroll = 0;
            const scrollThreshold = 50;
            window.addEventListener('scroll', () => {
                const currentScroll = window.pageYOffset;
                if (currentScroll > scrollThreshold) {
                    mainHeader.classList.add('header-fixed');
                    document.body.style.paddingTop = mainHeader.offsetHeight + 'px';
                } else {
                    mainHeader.classList.remove('header-fixed');
                    document.body.style.paddingTop = '0';
                }
                lastScroll = currentScroll;
            });
            const mobileMenu = document.getElementById('mobileMenu');
            const menuClose = document.getElementById('menuClose');
            const travelMenuBtn = document.getElementById('travelMenuBtn');
            let currentDropdown = null;
            function closeDropdown(dropdown) {
                if (dropdown) {
                    dropdown.classList.add('hidden');
                }
            }
            document.addEventListener('click', function (e) {
                if (!e.target.closest('.group')) {
                    const dropdowns = document.querySelectorAll('.group > div');
                    dropdowns.forEach(dropdown => {
                        dropdown.classList.add('hidden');
                    });
                }
            });
            if (travelMenuBtn) {
                travelMenuBtn.addEventListener('click', function (e) {
                    e.stopPropagation();
                    const dropdown = this.closest('.group').querySelector('.absolute');
                    if (currentDropdown && currentDropdown !== dropdown) {
                        closeDropdown(currentDropdown);
                    }
                    dropdown.classList.toggle('hidden');
                    currentDropdown = dropdown;
                });
            }
            function toggleMenu() {
                if (mobileMenu.classList.contains('hidden')) {
                    mobileMenu.classList.remove('hidden');
                    setTimeout(() => {
                        mobileMenu.classList.add('opacity-100');
                        mobileMenu.querySelector('.bg-white').classList.remove('translate-x-full');
                    }, 10);
                } else {
                    mobileMenu.classList.remove('opacity-100');
                    mobileMenu.querySelector('.bg-white').classList.add('translate-x-full');
                    setTimeout(() => {
                        mobileMenu.classList.add('hidden');
                    }, 300);
                }
                document.body.classList.toggle('overflow-hidden');
            }
            menuToggle.addEventListener('click', toggleMenu);
            menuClose.addEventListener('click', toggleMenu);
            mobileMenu.addEventListener('click', function (e) {
                if (e.target === this) {
                    toggleMenu();
                }
            });
        });
    </script>