<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tin Tức Du Lịch - Ami Travels</title>
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

        .prose {
            max-width: 65ch;
            line-height: 1.75;
        }

        .prose p {
            margin-top: 1.25em;
            margin-bottom: 1.25em;
        }

        .prose h3 {
            margin-top: 1.6em;
            margin-bottom: 0.6em;
            line-height: 1.6;
        }

        .prose ul {
            margin-top: 1.25em;
            margin-bottom: 1.25em;
        }

        .prose li {
            margin-top: 0.5em;
            margin-bottom: 0.5em;
        }
    </style>
</head>

<body class="bg-white">
    <?php
        include ("../includes/header_child.php");
    ?>
    <div class="bg-gradient-to-r from-primary/90 to-primary text-white py-16">
        <div class="max-w-6xl mx-auto px-4 text-center">
            <h1 class="text-4xl font-bold mb-4">TIN TỨC MỚI NHẤT CỦA AMI TRAVELS</h1>
            <p class="text-xl opacity-90">Cập nhật những tin tức nóng hổi nhất về du lịch</p>
        </div>
    </div>
    <div class="bg-gray-50 py-4">
        <div class="max-w-6xl mx-auto px-4">
            <div class="flex items-center gap-2 text-sm text-gray-600">
                <a href="../index.php" class="hover:text-primary">Trang chủ</a>
                <i class="ri-arrow-right-s-line"></i>
                <span class="text-primary">Tin Tức</span>
            </div>
        </div>
    </div>
    <main class="py-8">
        <div class="max-w-6xl mx-auto px-4">
            <div class="flex flex-col lg:flex-row gap-8">
                <div class="lg:w-3/4">
                    <div class="mb-8">
                        <div class="flex flex-wrap gap-4 mb-6">
                            <div class="relative"> 
                                <input type="text" id="searchInput" placeholder="Tìm kiếm tin tức..." class="w-64 pl-10 pr-4 py-2 border rounded-lg focus:outline-none focus:border-primary"> 
                                <i class="ri-search-line absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></i> 
                            </div> 
                            <div class="flex gap-2 overflow-x-auto pb-2" id="filter-buttons"> 
                                <button class="px-4 py-2 rounded-full bg-primary text-white hover:bg-primary/90 transition-colors whitespace-nowrap" data-filter="all">Tất cả</button>
                                <button class="px-4 py-2 rounded-full bg-gray-100 text-gray-600 hover:bg-gray-200 transition-colors whitespace-nowrap" data-filter="Tin tức mới nhất">Tin tức mới nhất</button> 
                                <button class="px-4 py-2 rounded-full bg-gray-100 text-gray-600 hover:bg-gray-200 transition-colors whitespace-nowrap" data-filter="Cẩm nang du lịch">Cẩm nang du lịch</button> 
                                <button class="px-4 py-2 rounded-full bg-gray-100 text-gray-600 hover:bg-gray-200 transition-colors whitespace-nowrap" data-filter="Khuyến mãi tour">Khuyến mãi tour</button> 
                                <button class="px-4 py-2 rounded-full bg-gray-100 text-gray-600 hover:bg-gray-200 transition-colors whitespace-nowrap" data-filter="Tin ngành">Tin ngành</button> 
                            </div>
                        </div>
                        <!-- display articles -->
                        <div id="news-container" class="grid gap-8">
                            <?php include "get_news.php"; ?>
                        </div>

                        <div class="mt-8 flex justify-center">
                            <nav id="pagination-nav" class="flex items-center gap-2">
                                <!-- Pagination buttons will be generated by JavaScript -->
                            </nav>
                        </div>
                    </div>
                </div>
                <div class="lg:w-1/4">
                    <div class="bg-white rounded-lg shadow-sm p-6 mb-6">
                        <h3 class="font-semibold mb-4">Bài viết nổi bật</h3>
                            <div class="flex flex-col gap-4">
                                <?php include "get_top_news.php"; ?>
                            </div>
                    </div>
                    <div class="bg-white rounded-lg shadow-sm p-6 mb-6">
                        <h3 class="font-semibold mb-4">Danh mục</h3>
                        <div class="space-y-2">
                            <?php include "get_categories.php"; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <?php
    include ("../includes/footer_child.php");
    include ("../includes/cta.php");
    ?>
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const buttons = document.querySelectorAll("#filter-buttons button");
            const container = document.getElementById("news-container");
            const pagNav = document.getElementById("pagination-nav");
            const searchInput = document.getElementById('searchInput');
            let currentFilter = 'all';
            let currentPage = 1;
            let searchTimeout;

            // Initial fetch
            fetchNews();

            // Filter button click handlers
            buttons.forEach(button => {
                button.addEventListener("click", () => {
                    const filter = button.getAttribute("data-filter");
                    buttons.forEach(btn => {
                        btn.classList.remove("bg-primary", "text-white");
                        btn.classList.add("bg-gray-100", "text-gray-600");
                    });
                    button.classList.remove("bg-gray-100", "text-gray-600");
                    button.classList.add("bg-primary", "text-white");
                    currentFilter = filter;
                    currentPage = 1;
                    fetchNews();
                });
            });

            searchInput.addEventListener('input', (e) => {
                clearTimeout(searchTimeout);
                searchTimeout = setTimeout(() => {
                    const searchTerm = e.target.value.trim();
                    currentPage = 1;
                    fetchNews(searchTerm);
                }, 300);
            });

            function fetchNews(searchTerm = '') {
                fetch(`get_news.php?filter=${encodeURIComponent(currentFilter)}&page=${currentPage}&search=${encodeURIComponent(searchTerm)}`)
                    .then(res => res.text())
                    .then(html => {
                        container.innerHTML = html;
                        updatePaginationFromData();
                    })
                    .catch(err => {
                        container.innerHTML = "<p class='text-center text-red-500'>Lỗi tải dữ liệu.</p>";
                        console.error(err);
                    });
            }

            function updatePaginationFromData() {
                const paginationData = document.getElementById('pagination-data');
                if (paginationData) {
                    const totalPages = parseInt(paginationData.dataset.totalPages);
                    updatePagination(totalPages);
                }
            }

            function updatePagination(totalPages) {
                pagNav.innerHTML = '';

                // Previous button
                const prevPage = currentPage > 1 ? currentPage - 1 : null;
                const prevButton = createPagButton('<i class="ri-arrow-left-s-line"></i>', prevPage);
                pagNav.appendChild(prevButton);

                // Page number buttons: 1, 2, 3, ..., N layout
                if (totalPages <= 3) {
                    // Show all pages if 3 or fewer
                    for (let i = 1; i <= totalPages; i++) {
                        const button = createPagButton(i, i);
                        if (i === currentPage) {
                            button.classList.add('bg-primary', 'text-white');
                            button.classList.remove('border', 'hover:bg-gray-50');
                        }
                        pagNav.appendChild(button);
                    }
                } else {
                    // Always show page 1
                    const firstButton = createPagButton(1, 1);
                    if (currentPage === 1) {
                        firstButton.classList.add('bg-primary', 'text-white');
                        firstButton.classList.remove('border', 'hover:bg-gray-50');
                    }
                    pagNav.appendChild(firstButton);

                    // Add ellipsis if current page is far from 1
                    if (currentPage > 3) {
                        const ellipsis = createEllipsis();
                        pagNav.appendChild(ellipsis);
                    }

                    // Show current page and one page before/after (if they exist)
                    const startPage = Math.max(2, currentPage - 1);
                    const endPage = Math.min(totalPages - 1, currentPage + 1);
                    for (let i = startPage; i <= endPage; i++) {
                        const button = createPagButton(i, i);
                        if (i === currentPage) {
                            button.classList.add('bg-primary', 'text-white');
                            button.classList.remove('border', 'hover:bg-gray-50');
                        }
                        pagNav.appendChild(button);
                    }

                    // Add ellipsis if current page is far from last page
                    if (currentPage < totalPages - 2) {
                        const ellipsis = createEllipsis();
                        pagNav.appendChild(ellipsis);
                    }

                    // Always show last page (N)
                    if (totalPages > 1) {
                        const lastButton = createPagButton(totalPages, totalPages);
                        if (currentPage === totalPages) {
                            lastButton.classList.add('bg-primary', 'text-white');
                            lastButton.classList.remove('border', 'hover:bg-gray-50');
                        }
                        pagNav.appendChild(lastButton);
                    }
                }

                // Next button
                const nextPage = currentPage < totalPages ? currentPage + 1 : null;
                const nextButton = createPagButton('<i class="ri-arrow-right-s-line"></i>', nextPage);
                pagNav.appendChild(nextButton);
            }

            function createPagButton(content, page) {
                const button = document.createElement('button');
                button.innerHTML = content;
                button.classList.add('w-10', 'h-10', 'flex', 'items-center', 'justify-center', 'rounded-full', 'transition-colors');
                if (page) {
                    button.classList.add('border', 'hover:bg-gray-50');
                    button.addEventListener('click', () => {
                        currentPage = page;
                        fetchNews();
                    });
                } else {
                    button.classList.add('border', 'text-gray-300');
                    button.disabled = true;
                }
                return button;
            }

            function createEllipsis() {
                const span = document.createElement('span');
                span.textContent = '...';
                span.classList.add('w-10', 'h-10', 'flex', 'items-center', 'justify-center', 'text-gray-500');
                return span;
            }
        });
    </script>
</body>

</html>