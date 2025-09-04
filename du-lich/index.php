<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tour Du Lịch Nước Ngoài - Du Lịch Việt</title>
    <link rel="icon" href="../assets/uploads/logo-ami-ico.ico" type="image/x-icon">
    <script src="https://cdn.tailwindcss.com/3.4.16"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.6.0/remixicon.min.css" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#e91e63',
                        secondary: '#57b5e7'
                    },
                    borderRadius: {
                        'none': '0px',
                        'sm': '4px',
                        DEFAULT: '8px',
                        'md': '12px',
                        'lg': '16px',
                        'xl': '20px',
                        '2xl': '24px',
                        '3xl': '32px',
                        'full': '9999px',
                        'button': '8px'
                    }
                }
            }
        }
    </script>
    <style>
        :where([class^="ri-"])::before {
            content: "\f3c2";
        }

        .hide-scrollbar::-webkit-scrollbar {
            display: none;
        }

        .hide-scrollbar {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }

        @media (max-width: 640px) {
            .tour-card {
                box-shadow: none;
                border: 1px solid #e5e7eb;
            }

            .tour-card:hover {
                box-shadow: none;
            }
        }
    </style>
</head>

<body class="bg-white">
    <?php
        include ("../includes/header_child.php");
    ?>
    <!-- Breadcrumb -->
    <div class="bg-gray-50 px-4 py-3">
        <div class="max-w-6xl mx-auto flex items-center justify-between">
            <nav class="flex items-center gap-2 text-sm">
                <a href="../index.php"
                    data-readdy="true" class="text-gray-600 hover:text-primary">Trang chủ</a>
                <i class="ri-arrow-right-s-line text-gray-400"></i>
                <span class="text-primary font-medium">Du lịch nước ngoài</span>
            </nav>
        </div>
    </div>
    <!-- Search Section -->
    <section class="py-6 sm:py-8 bg-white">
        <div class="max-w-6xl mx-auto px-4">
            <div class="text-center mb-6 sm:mb-8">
                <h1 class="text-2xl sm:text-3xl font-bold text-gray-900 mb-3 sm:mb-4">Tour Du Lịch Nước Ngoài</h1>
                <p class="text-sm sm:text-base text-gray-600">Khám phá thế giới với những tour du lịch quốc tế chất
                    lượng cao</p>
            </div>
            <div class="bg-white rounded-xl shadow-lg p-4 sm:p-6 mb-6 sm:mb-8">
                <div class="flex flex-col lg:flex-row gap-3">
                    <div class="flex-1">
                        <div class="relative">
                            <input type="text" id="searchInput" placeholder="Tìm kiếm tour, điểm đến..."
                                class="w-full px-4 py-2.5 sm:py-3 pl-12 border border-gray-300 rounded-lg focus:outline-none focus:border-primary text-sm">
                            <i
                                class="ri-search-line absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                        </div>
                    </div>
                    <div class="flex flex-col sm:flex-row gap-3">
                        <select id="durationFilter"
                            class="px-4 py-2.5 sm:py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-primary text-sm pr-8 min-w-[140px]">
                            <option>Thời gian tour</option>
                            <option>1-3 ngày</option>
                            <option>4-7 ngày</option>
                            <option>8-15 ngày</option>
                            <option>Trên 15 ngày</option>
                        </select>
                        <select id="priceFilter"
                            class="px-4 py-2.5 sm:py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-primary text-sm pr-8 min-w-[140px]">
                            <option>Khoảng giá</option>
                            <option>Dưới 10 triệu</option>
                            <option>10-30 triệu</option>
                            <option>30-50 triệu</option>
                            <option>Trên 50 triệu</option>
                        </select>
                        <button id="searchButton"
                            class="bg-primary text-white px-6 py-3 !rounded-button hover:bg-primary/90 transition-colors whitespace-nowrap">
                            Tìm kiếm
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Filter Tabs -->
    <section class="py-3 sm:py-4 bg-gray-50 sticky top-0 z-40">
        <div class="max-w-6xl mx-auto px-4">
            <div
                class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-3 sm:gap-4 mb-3 sm:mb-4">
                <div class="flex items-center gap-2 overflow-x-auto hide-scrollbar w-full sm:w-auto pb-2 sm:pb-0">
                    <button
                        class="continent-tab active px-3 sm:px-6 py-1.5 sm:py-2 rounded-full bg-primary text-white text-sm font-medium whitespace-nowrap"
                        data-continent="all">
                        Tất cả
                    </button>
                    <button
                        class="continent-tab px-6 py-2 rounded-full bg-white text-gray-600 hover:bg-gray-100 font-medium whitespace-nowrap"
                        data-continent="asia">
                        Châu Á
                    </button>
                    <button
                        class="continent-tab px-6 py-2 rounded-full bg-white text-gray-600 hover:bg-gray-100 font-medium whitespace-nowrap"
                        data-continent="europe">
                        Châu Âu
                    </button>
                    <button
                        class="continent-tab px-6 py-2 rounded-full bg-white text-gray-600 hover:bg-gray-100 font-medium whitespace-nowrap"
                        data-continent="africa">
                        Châu Phi
                    </button>
                    <button
                        class="continent-tab px-6 py-2 rounded-full bg-white text-gray-600 hover:bg-gray-100 font-medium whitespace-nowrap"
                        data-continent="oceania">
                        Châu Úc
                    </button>
                    <button
                        class="continent-tab px-6 py-2 rounded-full bg-white text-gray-600 hover:bg-gray-100 font-medium whitespace-nowrap"
                        data-continent="america">
                        Châu Mỹ
                    </button>
                </div>
                <div class="flex items-center gap-4">
                    <span class="text-sm text-gray-600">Sắp xếp:</span>
                    <select id="sortSelect"
                        class="px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-primary text-sm pr-8">
                        <option value="default">Mặc định</option>
                        <option value="price-asc">Giá thấp đến cao</option>
                        <option value="price-desc">Giá cao đến thấp</option>
                        <option value="duration-asc">Thời gian ngắn đến dài</option>
                        <option value="duration-desc">Thời gian dài đến ngắn</option>
                    </select>
                </div>
            </div>
        </div>
    </section>
    <!-- Tours Grid -->
    <section class="py-4 sm:py-8">
        <div class="max-w-6xl mx-auto px-4">    
            <div id="toursGrid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 sm:gap-6">
                <!-- Tour Card 1 - Asia -->
                <!-- <div class="tour-card bg-white rounded-xl shadow-md overflow-hidden hover:shadow-lg transition-shadow"
                    data-continent="asia" data-price="29999000" data-duration="6">
                    <div class="relative">
                        <img src="https://readdy.ai/api/search-image?query=Beautiful%20Japanese%20temple%20with%20cherry%20blossoms%20and%20Mount%20Fuji%20in%20background%2C%20traditional%20architecture%2C%20spring%20season%2C%20professional%20travel%20photography%20with%20vibrant%20colors&width=400&height=250&seq=japan1&orientation=landscape"
                            alt="Nhật Bản" class="w-full h-54 object-cover object-top">
                    </div>
                    <div class="p-5">
                            <h3 class="text-xl font-semibold mb-2">Thượng Hải - Vô Tích - Ô Trấn - Hàng Châu</h3>
                            <div class="flex items-center gap-2 text-sm text-black mb-2">
                                <i class="ri-map-pin-line"></i>
                                <span>Nơi khởi hành: [Địa điểm]</span>
                            </div>
                            <div class="flex items-center gap-2 text-sm text-black mb-2">
                                <i class="ri-map-pin-2-line"></i>
                                <span>Nơi đến: [Địa điểm]</span>
                            </div>
                            <div class="flex items-center gap-2 text-sm text-black mb-3">
                                <i class="ri-time-line"></i>
                                <span>Thời gian: 5 ngày 4 đêm</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <div class="flex flex-col">
                                    <span class="text-gray-500 line-through text-lg">19.999.000 đ</span>
                                    <span class="text-primary font-bold text-xl">16.999.000 đ</span>
                                </div>
                                <a href="./detail_tour.php"
                                    class="bg-primary text-white px-6 py-4 !rounded-button text-md hover:bg-primary/90 transition-colors whitespace-nowrap">
                                    XEM TOUR    
                                </a>
                            </div>
                        </div> -->
                    <?php include "./get_tour.php"; ?>
                </div>
            <!-- Pagination -->
            <div class="flex justify-center items-center gap-2 mt-8">
                <button class="px-3 py-2 rounded-lg border border-gray-300 hover:bg-gray-50 disabled:opacity-50"
                    disabled>
                    <i class="ri-arrow-left-s-line"></i>
                </button>
                <button class="px-3 py-2 rounded-lg bg-primary text-white">1</button>
                <button class="px-3 py-2 rounded-lg border border-gray-300 hover:bg-gray-50">2</button>
                <button class="px-3 py-2 rounded-lg border border-gray-300 hover:bg-gray-50">3</button>
                <span class="px-3 py-2">...</span>
                <button class="px-3 py-2 rounded-lg border border-gray-300 hover:bg-gray-50">8</button>
                <button class="px-3 py-2 rounded-lg border border-gray-300 hover:bg-gray-50">
                    <i class="ri-arrow-right-s-line"></i>
                </button>
            </div>
        </div>
    </section>
    <!-- Why Choose Us -->
    <section class="py-8 sm:py-12 bg-gray-50">
        <div class="max-w-6xl mx-auto px-4">
            <div class="text-center mb-8 sm:mb-12">
                <h2 class="text-2xl sm:text-3xl font-bold text-gray-900 mb-3 sm:mb-4">Tại Sao Chọn Du Lịch Việt?</h2>
                <p class="text-sm sm:text-base text-gray-600">Những lý do khiến chúng tôi trở thành lựa chọn hàng đầu
                    của khách hàng</p>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 sm:gap-8">
                <div class="text-center">
                    <div class="w-16 h-16 bg-primary/10 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="ri-shield-check-line text-2xl text-primary"></i>
                    </div>
                    <h3 class="font-semibold text-lg mb-2">Uy Tín Hàng Đầu</h3>
                    <p class="text-gray-600 text-sm">15 năm kinh nghiệm trong ngành du lịch với hàng nghìn khách hàng
                        hài lòng</p>
                </div>
                <div class="text-center">
                    <div class="w-16 h-16 bg-secondary/10 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="ri-customer-service-2-line text-2xl text-secondary"></i>
                    </div>
                    <h3 class="font-semibold text-lg mb-2">Hỗ Trợ 24/7</h3>
                    <p class="text-gray-600 text-sm">Đội ngũ tư vấn chuyên nghiệp luôn sẵn sàng hỗ trợ bạn mọi lúc mọi
                        nơi</p>
                </div>
                <div class="text-center">
                    <div class="w-16 h-16 bg-green-500/10 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="ri-price-tag-3-line text-2xl text-green-500"></i>
                    </div>
                    <h3 class="font-semibold text-lg mb-2">Giá Cả Cạnh Tranh</h3>
                    <p class="text-gray-600 text-sm">Cam kết giá tốt nhất thị trường với nhiều ưu đãi hấp dẫn</p>
                </div>
                <div class="text-center">
                    <div class="w-16 h-16 bg-orange-500/10 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="ri-star-line text-2xl text-orange-500"></i>
                    </div>
                    <h3 class="font-semibold text-lg mb-2">Chất Lượng Đảm Bảo</h3>
                    <p class="text-gray-600 text-sm">Dịch vụ chất lượng cao với đội ngũ hướng dẫn viên chuyên nghiệp</p>
                </div>
            </div>
        </div>
    </section>
    <?php
    include ("../includes/footer_child.php");
    include ("../includes/cta.php");
    ?>
     <!--Continent Filter Logic -->
    <script id="continentFilter">
        document.addEventListener('DOMContentLoaded', function () {
            const continentTabs = document.querySelectorAll('.continent-tab');
            const tourCards = document.querySelectorAll('.tour-card');
            const sortSelect = document.getElementById('sortSelect');

            // Check URL parameters first
            const urlParams = new URLSearchParams(window.location.search);
            const continentParam = urlParams.get('continent');

            // Function to activate tab and filter tours
            function activateTab(continent) {
                // Remove active class from all tabs
                continentTabs.forEach(t => {
                    t.classList.remove('active', 'bg-primary', 'text-white');
                    t.classList.add('bg-white', 'text-gray-600');
                });

                // Find and activate the correct tab
                const targetTab = document.querySelector(`.continent-tab[data-continent="${continent}"]`);
                if (targetTab) {
                    targetTab.classList.add('active', 'bg-primary', 'text-white');
                    targetTab.classList.remove('bg-white', 'text-gray-600');
                    
                    // Scroll tab into view if needed
                    targetTab.scrollIntoView({ behavior: 'smooth', block: 'nearest', inline: 'center' });
                }

                // Filter the tours
                filterTours(continent);
            }

            // Initialize with URL parameter or default to 'all'
            if (continentParam) {
                activateTab(continentParam);
            }

            // Add click handlers to tabs
            continentTabs.forEach(tab => {
                tab.addEventListener('click', function () {
                    const selectedContinent = this.dataset.continent;
                    
                    // Update URL without refreshing page
                    const newUrl = new URL(window.location.href);
                    newUrl.searchParams.set('continent', selectedContinent);
                    window.history.pushState({}, '', newUrl);
                    
                    activateTab(selectedContinent);
                });
            });

            function filterTours(continent) {
                tourCards.forEach(card => {
                    if (continent === 'all' || card.dataset.continent === continent) {
                        card.style.display = 'block';
                    } else {
                        card.style.display = 'none';
                    }
                });
            }

            sortSelect.addEventListener('change', function () {
                const sortValue = this.value;
                const visibleCards = Array.from(tourCards).filter(card => card.style.display !== 'none');
                const grid = document.getElementById('toursGrid');
                visibleCards.sort((a, b) => {
                    const priceA = parseInt(a.dataset.price);
                    const priceB = parseInt(b.dataset.price);
                    const durationA = parseInt(a.dataset.duration);
                    const durationB = parseInt(b.dataset.duration);
                    switch (sortValue) {
                        case 'price-asc':
                            return priceA - priceB;
                        case 'price-desc':
                            return priceB - priceA;
                        case 'duration-asc':
                            return durationA - durationB;
                        case 'duration-desc':
                            return durationB - durationA;
                        default:
                            return 0;
                    }
                });
                visibleCards.forEach(card => {
                    grid.appendChild(card);
                });
            });
        });
    </script>
     <!--Search and Filter Logic -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const searchInput = document.getElementById('searchInput');
            const durationFilter = document.getElementById('durationFilter');
            const priceFilter = document.getElementById('priceFilter');
            const searchButton = document.getElementById('searchButton');
            const tourCards = document.querySelectorAll('.tour-card');
            const continentTabs = document.querySelectorAll('.continent-tab');
            let currentContinent = 'all';

            function filterTours() {
                const searchTerm = searchInput.value.toLowerCase();
                const duration = durationFilter.value;
                const price = priceFilter.value;

                tourCards.forEach(card => {
                    const title = card.querySelector('h3').textContent.toLowerCase();
                    const destination = card.querySelector('.ri-map-pin-2-line + span').textContent.toLowerCase();
                    const cardDuration = parseInt(card.dataset.duration);
                    const cardPrice = parseInt(card.dataset.price);
                    const cardContinent = card.dataset.continent;

                    let showCard = true;

                    // Check continent
                    if (currentContinent !== 'all' && cardContinent !== currentContinent) {
                        showCard = false;
                    }

                    // Check search term
                    if (searchTerm && !title.includes(searchTerm) && !destination.includes(searchTerm)) {
                        showCard = false;
                    }

                    // Check duration
                    if (duration !== 'all') {
                        const [min, max] = duration.split('-').map(Number);
                        if (max) {
                            if (cardDuration < min || cardDuration > max) showCard = false;
                        } else {
                            // For "15+" option
                            if (cardDuration < min) showCard = false;
                        }
                    }

                    // Check price
                    if (price !== 'all') {
                        const [min, max] = price.split('-').map(n => n === '+' ? Infinity : Number(n) * 1000000);
                        if (cardPrice < min || cardPrice > max) showCard = false;
                    }

                    card.style.display = showCard ? 'block' : 'none';
                });
            }

            // Event Listeners
            searchButton.addEventListener('click', filterTours);
            
            searchInput.addEventListener('keyup', (e) => {
                if (e.key === 'Enter') filterTours();
            });

            durationFilter.addEventListener('change', filterTours);
            priceFilter.addEventListener('change', filterTours);

            // Continent tab handling
            continentTabs.forEach(tab => {
                tab.addEventListener('click', function() {
                    currentContinent = this.dataset.continent;
                    
                    // Update tab styles
                    continentTabs.forEach(t => {
                        t.classList.remove('active', 'bg-primary', 'text-white');
                        t.classList.add('bg-white', 'text-gray-600');
                    });
                    
                    this.classList.add('active', 'bg-primary', 'text-white');
                    this.classList.remove('bg-white', 'text-gray-600');
                    
                    filterTours();
                });
            });

            // Initialize filters if URL has parameters
            const urlParams = new URLSearchParams(window.location.search);
            if (urlParams.has('continent')) {
                const continent = urlParams.get('continent');
                const tab = document.querySelector(`.continent-tab[data-continent="${continent}"]`);
                if (tab) tab.click();
            }
        });
    </script>
    <script>
document.getElementById('sortSelect').addEventListener('change', function() {
    const sort = this.value;
    const container = document.getElementById('toursGrid');
    
    fetch(`get_tour.php?sort=${sort}`)
        .then(response => response.text())
        .then(html => {
            container.innerHTML = html;
        })
        .catch(error => {
            console.error('Error:', error);
            container.innerHTML = '<p class="text-center text-red-500">Đã xảy ra lỗi khi tải dữ liệu.</p>';
        });
});
</script>
</body>

</html>