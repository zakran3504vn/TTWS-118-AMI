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
                        primary: '#1e1b5e',
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
                            <div class="relative"> <input type="text" placeholder="Tìm kiếm tin tức..." class="w-64 pl-10 pr-4 py-2 border rounded-lg focus:outline-none focus:border-primary"> <i class="ri-search-line absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></i> </div> <div class="flex gap-2 overflow-x-auto pb-2" id="filter-buttons"> <button class="px-4 py-2 rounded-full bg-primary text-white hover:bg-primary/90 transition-colors whitespace-nowrap" data-filter="all">Tất cả</button> <button class="px-4 py-2 rounded-full bg-gray-100 text-gray-600 hover:bg-gray-200 transition-colors whitespace-nowrap" data-filter="Tin tức mới nhất">Tin tức mới nhất</button> <button class="px-4 py-2 rounded-full bg-gray-100 text-gray-600 hover:bg-gray-200 transition-colors whitespace-nowrap" data-filter="Cẩm nang du lịch">Cẩm nang du lịch</button> <button class="px-4 py-2 rounded-full bg-gray-100 text-gray-600 hover:bg-gray-200 transition-colors whitespace-nowrap" data-filter="Khuyến mãi tour">Khuyến mãi tour</button> <button class="px-4 py-2 rounded-full bg-gray-100 text-gray-600 hover:bg-gray-200 transition-colors whitespace-nowrap" data-filter="Tin ngành">Tin ngành</button> </div>
                        </div>

                        <!-- display articles -->
                        <div id="news-container" class="grid gap-8">
                            <?php include "get_news.php"; ?>
                        </div>

                        <div class="mt-8 flex justify-center">
                            <nav class="flex items-center gap-2">
                                <button
                                    class="w-10 h-10 flex items-center justify-center rounded-full border hover:bg-gray-50 transition-colors">
                                    <i class="ri-arrow-left-s-line"></i>
                                </button>
                                <button
                                    class="w-10 h-10 flex items-center justify-center rounded-full bg-primary text-white">1</button>
                                <button
                                    class="w-10 h-10 flex items-center justify-center rounded-full border hover:bg-gray-50 transition-colors">2</button>
                                <button
                                    class="w-10 h-10 flex items-center justify-center rounded-full border hover:bg-gray-50 transition-colors">3</button>
                                <button
                                    class="w-10 h-10 flex items-center justify-center rounded-full border hover:bg-gray-50 transition-colors">
                                    <i class="ri-arrow-right-s-line"></i>
                                </button>
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
                            <a href="#"
                                class="flex items-center justify-between py-2 hover:text-primary transition-colors">
                                <span>Tin tức mới nhất</span>
                                <span class="text-sm text-gray-500">25</span>
                            </a>
                            <a href="#"
                                class="flex items-center justify-between py-2 hover:text-primary transition-colors">
                                <span>Cẩm nang du lịch</span>
                                <span class="text-sm text-gray-500">18</span>
                            </a>
                            <a href="#"
                                class="flex items-center justify-between py-2 hover:text-primary transition-colors">
                                <span>Khuyến mãi tour</span>
                                <span class="text-sm text-gray-500">12</span>
                            </a>
                            <a href="#"
                                class="flex items-center justify-between py-2 hover:text-primary transition-colors">
                                <span>Tin ngành</span>
                                <span class="text-sm text-gray-500">8</span>
                            </a>
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

        buttons.forEach(button => {
            button.addEventListener("click", () => {
            const filter = button.getAttribute("data-filter");

            // update active button style
            buttons.forEach(btn => btn.classList.remove("bg-primary", "text-white"));
            buttons.forEach(btn => btn.classList.add("bg-gray-100", "text-gray-600"));
            button.classList.remove("bg-gray-100", "text-gray-600");
            button.classList.add("bg-primary", "text-white");

            // fetch filtered news
            fetch("get_news.php?filter=" + encodeURIComponent(filter))
                .then(res => res.text())
                .then(html => {
                container.innerHTML = html;
                })
                .catch(err => {
                container.innerHTML = "<p class='text-center text-red-500'>Lỗi tải dữ liệu.</p>";
                console.error(err);
                });
            });
        });
        });
    </script>
</body>

</html>