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
                            <div class="relative">
                                <input type="text" placeholder="Tìm kiếm tin tức..."
                                    class="w-64 pl-10 pr-4 py-2 border rounded-lg focus:outline-none focus:border-primary">
                                <i class="ri-search-line absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
                            </div>
                            <div class="flex gap-2 overflow-x-auto pb-2">
                                <button
                                    class="px-4 py-2 rounded-full bg-primary text-white hover:bg-primary/90 transition-colors whitespace-nowrap">Tất
                                    cả</button>
                                <button
                                    class="px-4 py-2 rounded-full bg-gray-100 text-gray-600 hover:bg-gray-200 transition-colors whitespace-nowrap">Tin
                                    tức mới nhất</button>
                                <button
                                    class="px-4 py-2 rounded-full bg-gray-100 text-gray-600 hover:bg-gray-200 transition-colors whitespace-nowrap">Cẩm
                                    nang du lịch</button>
                                <button
                                    class="px-4 py-2 rounded-full bg-gray-100 text-gray-600 hover:bg-gray-200 transition-colors whitespace-nowrap">Khuyến
                                    mãi tour</button>
                                <button
                                    class="px-4 py-2 rounded-full bg-gray-100 text-gray-600 hover:bg-gray-200 transition-colors whitespace-nowrap">Tin
                                    ngành</button>
                            </div>
                        </div>
                        <div class="grid gap-8">
                            <a href="./detail_new.php" class="block">
                                <article
                                    class="bg-white rounded-lg shadow-sm overflow-hidden hover:shadow-md transition-shadow flex flex-col md:flex-row">
                                    <img src="https://readdy.ai/api/search-image?query=Luxury%20resort%20pool%20with%20ocean%20view%2C%20tropical%20paradise%2C%20palm%20trees%2C%20sunset%20lighting%2C%20professional%20hotel%20photography%2C%20high-end%20vacation%20destination&width=400&height=300&seq=news1&orientation=landscape"
                                        alt="Resort mới" class="w-full md:w-64 h-auto object-cover">
                                    <div class="p-6 flex-1">
                                        <span class="text-sm text-primary mb-2 inline-block">Tin tức mới nhất</span>
                                        <h3 class="text-xl font-semibold mb-3">Khai trương khu nghỉ dưỡng 5 sao mới tại
                                            Phú
                                            Quốc</h3>
                                        <p class="text-gray-600 mb-4">Thêm một điểm đến sang trọng mới tại đảo ngọc Phú
                                            Quốc, hứa hẹn mang đến trải nghiệm độc đáo cho du khách với nhiều tiện ích
                                            đẳng
                                            cấp quốc tế.</p>
                                        <div class="flex items-center gap-6 text-sm text-gray-500">
                                            <span class="flex items-center gap-2">
                                                <i class="ri-time-line"></i>
                                                21/07/2025
                                            </span>
                                            <span class="flex items-center gap-2">
                                                <i class="ri-eye-line"></i>
                                                2.5K lượt xem
                                            </span>
                                        </div>
                                    </div>
                                </article>
                            </a>
                            <a href="./detail_new.php" class="block">
                                <article
                                    class="bg-white rounded-lg shadow-sm overflow-hidden hover:shadow-md transition-shadow flex flex-col md:flex-row">
                                    <img src="https://readdy.ai/api/search-image?query=Travel%20guide%20book%20with%20map%2C%20passport%2C%20camera%2C%20and%20travel%20accessories%2C%20flat%20lay%20photography%2C%20travel%20planning%20concept&width=400&height=300&seq=news2&orientation=landscape"
                                        alt="Cẩm nang du lịch" class="w-full md:w-64 h-auto object-cover">
                                    <div class="p-6 flex-1">
                                        <span class="text-sm text-primary mb-2 inline-block">Cẩm nang du lịch</span>
                                        <h3 class="text-xl font-semibold mb-3">Top 10 điểm đến không thể bỏ qua khi du
                                            lịch
                                            Nhật Bản mùa thu</h3>
                                        <p class="text-gray-600 mb-4">Khám phá những địa điểm tuyệt đẹp với lá phong đỏ,
                                            những lễ hội truyền thống và ẩm thực đặc sắc của xứ sở hoa anh đào trong mùa
                                            thu.</p>
                                        <div class="flex items-center gap-6 text-sm text-gray-500">
                                            <span class="flex items-center gap-2">
                                                <i class="ri-time-line"></i>
                                                20/07/2025
                                            </span>
                                            <span class="flex items-center gap-2">
                                                <i class="ri-eye-line"></i>
                                                1.8K lượt xem
                                            </span>
                                        </div>
                                    </div>
                                </article>
                            </a>
                            <a href="./detail_new.php" class="block">
                                <article
                                    class="bg-white rounded-lg shadow-sm overflow-hidden hover:shadow-md transition-shadow flex flex-col md:flex-row">
                                    <img src="https://readdy.ai/api/search-image?query=Special%20travel%20deal%20promotion%2C%20discount%20offer%20banner%2C%20summer%20vacation%20sale%2C%20marketing%20campaign%20visual&width=400&height=300&seq=news3&orientation=landscape"
                                        alt="Khuyến mãi tour" class="w-full md:w-64 h-auto object-cover">
                                    <div class="p-6 flex-1">
                                        <span class="text-sm text-primary mb-2 inline-block">Khuyến mãi tour</span>
                                        <h3 class="text-xl font-semibold mb-3">Ưu đãi đặc biệt: Giảm 30% tour châu Âu
                                            mùa
                                            thu</h3>
                                        <p class="text-gray-600 mb-4">Cơ hội đặc biệt để khám phá châu Âu với chi phí
                                            tiết
                                            kiệm. Áp dụng cho các tour khởi hành từ tháng 9 đến tháng 11/2025.</p>
                                        <div class="flex items-center gap-6 text-sm text-gray-500">
                                            <span class="flex items-center gap-2">
                                                <i class="ri-time-line"></i>
                                                19/07/2025
                                            </span>
                                            <span class="flex items-center gap-2">
                                                <i class="ri-eye-line"></i>
                                                3.2K lượt xem
                                            </span>
                                        </div>
                                    </div>
                                </article>
                            </a>
                            <a href="./detail_new.php" class="block">
                                <article
                                    class="bg-white rounded-lg shadow-sm overflow-hidden hover:shadow-md transition-shadow flex flex-col md:flex-row">
                                    <img src="https://readdy.ai/api/search-image?query=International%20tourism%20conference%2C%20business%20meeting%20room%2C%20professional%20event%20photography%2C%20travel%20industry%20gathering&width=400&height=300&seq=news4&orientation=landscape"
                                        alt="Tin ngành" class="w-full md:w-64 h-auto object-cover">
                                    <div class="p-6 flex-1">
                                        <span class="text-sm text-primary mb-2 inline-block">Tin ngành</span>
                                        <h3 class="text-xl font-semibold mb-3">Hội nghị Du lịch Quốc tế 2025 tại Việt
                                            Nam
                                        </h3>
                                        <p class="text-gray-600 mb-4">Sự kiện quy tụ các chuyên gia hàng đầu trong ngành
                                            du
                                            lịch, thảo luận về xu hướng và giải pháp phát triển du lịch bền vững.</p>
                                        <div class="flex items-center gap-6 text-sm text-gray-500">
                                            <span class="flex items-center gap-2">
                                                <i class="ri-time-line"></i>
                                                18/07/2025
                                            </span>
                                            <span class="flex items-center gap-2">
                                                <i class="ri-eye-line"></i>
                                                1.5K lượt xem
                                            </span>
                                        </div>
                                    </div>
                                </article>
                            </a>
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
                        <div class="space-y-4">
                            <a href="#" class="flex gap-4 group">
                                <img src="https://readdy.ai/api/search-image?query=Beautiful%20cherry%20blossom%20season%20in%20Japan%2C%20spring%20travel%2C%20pink%20sakura%20trees%2C%20cultural%20destination&width=100&height=100&seq=feat1&orientation=squarish"
                                    alt="Du lịch Nhật Bản" class="w-20 h-20 rounded object-cover">
                                <div class="flex-1">
                                    <h4 class="font-medium group-hover:text-black transition-colors">Mùa hoa anh đào
                                        2025 tại Nhật Bản</h4>
                                    <p class="text-sm text-gray-500 mt-1">15/07/2025</p>
                                </div>
                            </a>
                            <a href="#" class="flex gap-4 group">
                                <img src="https://readdy.ai/api/search-image?query=European%20christmas%20market%2C%20winter%20travel%2C%20festive%20decorations%2C%20holiday%20atmosphere&width=100&height=100&seq=feat2&orientation=squarish"
                                    alt="Du lịch châu Âu" class="w-20 h-20 rounded object-cover">
                                <div class="flex-1">
                                    <h4 class="font-medium group-hover:text-primary transition-colors">Khám phá chợ
                                        Giáng sinh châu Âu</h4>
                                    <p class="text-sm text-gray-500 mt-1">14/07/2025</p>
                                </div>
                            </a>
                            <a href="#" class="flex gap-4 group">
                                <img src="https://readdy.ai/api/search-image?query=Luxury%20cruise%20ship%20at%20sunset%2C%20ocean%20travel%2C%20vacation%20lifestyle%2C%20maritime%20tourism&width=100&height=100&seq=feat3&orientation=squarish"
                                    alt="Du thuyền" class="w-20 h-20 rounded object-cover">
                                <div class="flex-1">
                                    <h4 class="font-medium group-hover:text-primary transition-colors">Trải nghiệm du
                                        thuyền 5 sao</h4>
                                    <p class="text-sm text-gray-500 mt-1">13/07/2025</p>
                                </div>
                            </a>
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
</body>

</html>