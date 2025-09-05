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
    <?php include "../includes/header_child.php"; ?>
    <!-- Breadcrumb -->
    <div class="bg-gray-50 px-4 py-3">
        <div class="max-w-6xl mx-auto flex items-center justify-between">
            <nav class="flex items-center gap-2 text-sm">
                <a href="../index.php" class="text-gray-600 hover:text-primary">Trang chủ</a>
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
                <p class="text-sm sm:text-base text-gray-600">Khám phá thế giới với những tour du lịch quốc tế chất lượng cao</p>
            </div>
            <div class="bg-white rounded-xl shadow-lg p-4 sm:p-6 mb-6 sm:mb-8">
                <div class="flex flex-col lg:flex-row gap-3">
                    <div class="flex-1">
                        <div class="relative">
                            <input type="text" id="searchInput" placeholder="Tìm kiếm tour, điểm đến..."
                                class="w-full px-4 py-2.5 sm:py-3 pl-12 border border-gray-300 rounded-lg focus:outline-none focus:border-primary text-sm">
                            <i class="ri-search-line absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                        </div>
                    </div>
                    <div class="flex flex-col sm:flex-row gap-3">
                        <select id="durationFilter" class="px-4 py-2.5 sm:py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-primary text-sm pr-8 min-w-[140px]">
                            <option value="all">Thời gian tour</option>
                            <option value="1-3 ngày">1-3 ngày</option>
                            <option value="4-7 ngày">4-7 ngày</option>
                            <option value="8-15 ngày">8-15 ngày</option>
                            <option value="Trên 15 ngày">Trên 15 ngày</option>
                        </select>
                        <select id="priceFilter" class="px-4 py-2.5 sm:py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-primary text-sm pr-8 min-w-[140px]">
                            <option value="all">Khoảng giá</option>
                            <option value="Dưới 10 triệu">Dưới 10 triệu</option>
                            <option value="10-30 triệu">10-30 triệu</option>
                            <option value="30-50 triệu">30-50 triệu</option>
                            <option value="Trên 50 triệu">Trên 50 triệu</option>
                        </select>
                        <button id="searchButton" class="bg-primary text-white px-6 py-3 !rounded-button hover:bg-primary/90 transition-colors whitespace-nowrap">
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
            <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-3 sm:gap-4 mb-3 sm:mb-4">
                <div class="flex items-center gap-2 overflow-x-auto hide-scrollbar w-full sm:w-auto pb-2 sm:pb-0">
                    <button class="continent-tab active px-3 sm:px-6 py-1.5 sm:py-2 rounded-full bg-primary text-white text-sm font-medium whitespace-nowrap" data-continent="all">Tất cả</button>
                    <button class="continent-tab px-6 py-2 rounded-full bg-white text-gray-600 hover:bg-gray-100 font-medium whitespace-nowrap" data-continent="asia">Châu Á</button>
                    <button class="continent-tab px-6 py-2 rounded-full bg-white text-gray-600 hover:bg-gray-100 font-medium whitespace-nowrap" data-continent="europe">Châu Âu</button>
                    <button class="continent-tab px-6 py-2 rounded-full bg-white text-gray-600 hover:bg-gray-100 font-medium whitespace-nowrap" data-continent="africa">Châu Phi</button>
                    <button class="continent-tab px-6 py-2 rounded-full bg-white text-gray-600 hover:bg-gray-100 font-medium whitespace-nowrap" data-continent="oceania">Châu Úc</button>
                    <button class="continent-tab px-6 py-2 rounded-full bg-white text-gray-600 hover:bg-gray-100 font-medium whitespace-nowrap" data-continent="america">Châu Mỹ</button>
                </div>
                <div class="flex items-center gap-4">
                    <span class="text-sm text-gray-600">Sắp xếp:</span>
                    <select id="sortSelect" class="px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-primary text-sm pr-8">
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
                <?php include "./get_tour.php"; ?>
            </div>
            <div class="mt-8 flex justify-center">
                <nav id="pagination-nav" class="flex items-center gap-2">
                    <!-- Pagination buttons will be generated by JavaScript -->
                </nav>
            </div>
        </div>
    </section>
    <!-- Why Choose Us -->
    <section class="py-8 sm:py-12 bg-gray-50">
        <div class="max-w-6xl mx-auto px-4">
            <div class="text-center mb-8 sm:mb-12">
                <h2 class="text-2xl sm:text-3xl font-bold text-gray-900 mb-3 sm:mb-4">Tại Sao Chọn Du Lịch Việt?</h2>
                <p class="text-sm sm:text-base text-gray-600">Những lý do khiến chúng tôi trở thành lựa chọn hàng đầu của khách hàng</p>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 sm:gap-8">
                <div class="text-center">
                    <div class="w-16 h-16 bg-primary/10 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="ri-shield-check-line text-2xl text-primary"></i>
                    </div>
                    <h3 class="font-semibold text-lg mb-2">Uy Tín Hàng Đầu</h3>
                    <p class="text-gray-600 text-sm">15 năm kinh nghiệm trong ngành du lịch với hàng nghìn khách hàng hài lòng</p>
                </div>
                <div class="text-center">
                    <div class="w-16 h-16 bg-secondary/10 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="ri-customer-service-2-line text-2xl text-secondary"></i>
                    </div>
                    <h3 class="font-semibold text-lg mb-2">Hỗ Trợ 24/7</h3>
                    <p class="text-gray-600 text-sm">Đội ngũ tư vấn chuyên nghiệp luôn sẵn sàng hỗ trợ bạn mọi lúc mọi nơi</p>
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
    <?php include "../includes/footer_child.php"; ?>
    <?php include "../includes/cta.php"; ?>
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const continentTabs = document.querySelectorAll('.continent-tab');
            const container = document.getElementById("toursGrid");
            const pagNav = document.getElementById("pagination-nav");
            const searchInput = document.getElementById('searchInput');
            const sortSelect = document.getElementById('sortSelect');
            const durationFilter = document.getElementById('durationFilter');
            const priceFilter = document.getElementById('priceFilter');
            const searchButton = document.getElementById('searchButton');

            // Initialize from URL parameters
            const urlParams = new URLSearchParams(window.location.search);
            let currentContinent = urlParams.get('continent')?.toLowerCase() || 'all';
            let currentPage = parseInt(urlParams.get('page')) || 1;
            
            // Populate search input from URL parameter
            const searchParam = urlParams.get('search');
            if (searchParam) {
                searchInput.value = decodeURIComponent(searchParam);
            }
            
            // Populate filter dropdowns from URL parameters
            const durationParam = urlParams.get('duration');
            if (durationParam && durationParam !== 'all') {
                durationFilter.value = durationParam;
            }
            
            const priceParam = urlParams.get('price');
            if (priceParam && priceParam !== 'all') {
                priceFilter.value = priceParam;
            }
            
            const sortParam = urlParams.get('sort');
            if (sortParam && sortParam !== 'default') {
                sortSelect.value = sortParam;
            }

            // Set active continent tab
            const activeTab = document.querySelector(`.continent-tab[data-continent="${currentContinent}"]`);
            if (activeTab) {
                continentTabs.forEach(t => {
                    t.classList.remove("active", "bg-primary", "text-white");
                    t.classList.add("bg-white", "text-gray-600");
                });
                activeTab.classList.add("active", "bg-primary", "text-white");
                activeTab.classList.remove("bg-white", "text-gray-600");
            } else {
                // Fallback to 'all' if continent is invalid
                currentContinent = 'all';
                const allTab = document.querySelector('.continent-tab[data-continent="all"]');
                allTab.classList.add("active", "bg-primary", "text-white");
                allTab.classList.remove("bg-white", "text-gray-600");
            }

            // Initial fetch
            fetchTours();

            // Function to handle search (both button click and Enter key)
            function handleSearch() {
                // Reset continent to "All" when searching
                currentContinent = 'all';
                
                // Update continent tab UI
                continentTabs.forEach(t => {
                    t.classList.remove("active", "bg-primary", "text-white");
                    t.classList.add("bg-white", "text-gray-600");
                });
                const allTab = document.querySelector('.continent-tab[data-continent="all"]');
                allTab.classList.add("active", "bg-primary", "text-white");
                allTab.classList.remove("bg-white", "text-gray-600");
                
                // Reset to first page
                currentPage = 1;
                
                // Update URL and fetch tours
                updateUrl();
                fetchTours();
            }

            // Event listeners
            continentTabs.forEach(tab => {
                tab.addEventListener("click", () => {
                    currentContinent = tab.getAttribute("data-continent");
                    continentTabs.forEach(t => {
                        t.classList.remove("active", "bg-primary", "text-white");
                        t.classList.add("bg-white", "text-gray-600");
                    });
                    tab.classList.add("active", "bg-primary", "text-white");
                    tab.classList.remove("bg-white", "text-gray-600");
                    currentPage = 1;
                    updateUrl();
                    fetchTours();
                });
            });

            // Search button click event
            searchButton.addEventListener('click', handleSearch);

            // Enter key event for search input
            searchInput.addEventListener('keypress', (e) => {
                if (e.key === 'Enter') {
                    e.preventDefault();
                    handleSearch();
                }
            });

            // Enter key events for filter dropdowns
            durationFilter.addEventListener('keypress', (e) => {
                if (e.key === 'Enter') {
                    e.preventDefault();
                    handleSearch();
                }
            });

            priceFilter.addEventListener('keypress', (e) => {
                if (e.key === 'Enter') {
                    e.preventDefault();
                    handleSearch();
                }
            });

            sortSelect.addEventListener('change', () => {
                currentPage = 1;
                updateUrl();
                fetchTours();
            });

            function fetchTours() {
                const searchTerm = searchInput.value.trim();
                const sort = sortSelect.value;
                const duration = durationFilter.value;
                const price = priceFilter.value;

                const url = `./get_tour.php?continent=${encodeURIComponent(currentContinent)}&page=${currentPage}&search=${encodeURIComponent(searchTerm)}&sort=${encodeURIComponent(sort)}&duration=${encodeURIComponent(duration)}&price=${encodeURIComponent(price)}`;
                
                console.log("Fetching URL:", url);

                fetch(url)
                    .then(res => {
                        if (!res.ok) throw new Error(`HTTP error! status: ${res.status}`);
                        return res.text();
                    })
                    .then(html => {
                        console.log("Raw HTML response:", html);
                        const debugMatch = html.match(/<!-- Debug Info:[^>]+-->/);
                        if (debugMatch) {
                            console.log("Server Debug Info:", debugMatch[0]);
                        }
                        
                        container.innerHTML = html;
                        
                        const paginationData = document.getElementById('pagination-data');
                        if (paginationData) {
                            console.log("Pagination Data:", {
                                totalPages: paginationData.dataset.totalPages,
                                currentPage: currentPage
                            });
                            updatePagination(parseInt(paginationData.dataset.totalPages) || 1);
                        } else {
                            console.warn("No pagination data found!");
                            container.innerHTML = "<p class='text-center text-red-500'>Không tìm thấy tour nào.</p>";
                        }
                    })
                    .catch(err => {
                        console.error('Fetch error:', err);
                        container.innerHTML = "<p class='text-center text-red-500'>Lỗi tải dữ liệu.</p>";
                    });
            }

            function updatePagination(totalPages) {
                pagNav.innerHTML = '';

                // Previous button
                const prevButton = createPagButton(
                    '<i class="ri-arrow-left-s-line"></i>',
                    currentPage > 1 ? currentPage - 1 : null
                );
                pagNav.appendChild(prevButton);

                // Page numbers
                if (totalPages <= 5) {
                    for (let i = 1; i <= totalPages; i++) {
                        addPageButton(i);
                    }
                } else {
                    addPageButton(1);
                    if (currentPage > 3) {
                        pagNav.appendChild(createEllipsis());
                    }
                    for (let i = Math.max(2, currentPage - 1); i <= Math.min(totalPages - 1, currentPage + 1); i++) {
                        addPageButton(i);
                    }
                    if (currentPage < totalPages - 2) {
                        pagNav.appendChild(createEllipsis());
                    }
                    if (totalPages > 1) {
                        addPageButton(totalPages);
                    }
                }

                // Next button
                const nextButton = createPagButton(
                    '<i class="ri-arrow-right-s-line"></i>',
                    currentPage < totalPages ? currentPage + 1 : null
                );
                pagNav.appendChild(nextButton);
            }

            function createPagButton(content, page) {
                const button = document.createElement('button');
                button.innerHTML = content;
                button.classList.add('px-3', 'py-2', 'rounded-lg', 'border', 'border-gray-300', 'hover:bg-gray-50', 'transition-colors');
                if (page === currentPage) {
                    button.classList.add('bg-primary', 'text-white');
                    button.classList.remove('border-gray-300', 'hover:bg-gray-50');
                }
                if (page) {
                    button.addEventListener('click', () => {
                        currentPage = page;
                        console.log("Navigating to page:", currentPage);
                        updateUrl();
                        fetchTours();
                    });
                } else {
                    button.classList.add('opacity-50');
                    button.disabled = true;
                }
                return button;
            }

            function createEllipsis() {
                const span = document.createElement('span');
                span.textContent = '...';
                span.classList.add('px-3', 'py-2');
                return span;
            }

            function addPageButton(pageNum) {
                const button = createPagButton(pageNum, pageNum);
                pagNav.appendChild(button);
            }

            function updateUrl() {
                const searchTerm = searchInput.value.trim();
                const sort = sortSelect.value;
                const duration = durationFilter.value;
                const price = priceFilter.value;
                const newUrl = new URL(window.location);
                newUrl.searchParams.set('continent', currentContinent);
                newUrl.searchParams.set('page', currentPage);
                newUrl.searchParams.set('search', searchTerm);
                newUrl.searchParams.set('sort', sort);
                newUrl.searchParams.set('duration', duration);
                newUrl.searchParams.set('price', price);
                window.history.pushState({}, '', newUrl);
            }
        });
    </script>
</body>
</html>