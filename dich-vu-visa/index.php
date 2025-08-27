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
            <h1 class="text-4xl font-bold mb-4">Dịch Vụ Visa</h1>
            <p class="text-xl opacity-90">Khám Phá Thế Giới Không Lo Visa – Dịch Vụ Visa Uy Tín Từ Ami Travels!</p>
        </div>
    </div>
    <div class="bg-gray-50 py-4">
        <div class="max-w-6xl mx-auto px-4">
            <div class="flex items-center gap-2 text-sm text-gray-600">
                <a href="../index.php" class="hover:text-primary">Trang chủ</a>
                <i class="ri-arrow-right-s-line"></i>
                <span class="text-primary">Dịch vụ Visa</span>
            </div>
        </div>
    </div>
    <main class="py-8">
        <div class="max-w-6xl mx-auto px-4">
            <div class="flex flex-col gap-8">
                <div class="w-full">
                    <div class="mb-8">
                        <div class="flex flex-wrap gap-4 mb-6">
                            <div class="relative">
                                <input type="text" placeholder="Tìm kiếm dịch vụ về visa..."
                                    class="w-64 pl-10 pr-4 py-2 border rounded-lg focus:outline-none focus:border-primary">
                                <i class="ri-search-line absolute left-3 top-1/2 -translate-y-1/2 text-gray-400"></i>
                            </div>
                        </div>
                        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                            <article
                                class="bg-white rounded-lg shadow-sm overflow-hidden hover:shadow-md transition-shadow flex flex-col">
                                <img src="https://readdy.ai/api/search-image?query=Luxury%20resort%20pool%20with%20ocean%20view%2C%20tropical%20paradise%2C%20palm%20trees%2C%20sunset%20lighting%2C%20professional%20hotel%20photography%2C%20high-end%20vacation%20destination&width=400&height=300&seq=news1&orientation=landscape"
                                    alt="Resort mới" class="w-full h-48 object-cover">
                                <div class="p-4 flex-1 flex flex-col">
                                    <span class="text-primary rounded text-l mb-3 inline-block w-fit">Ngày đăng: 21/07/2025</span>
                                    <h3 class="text-lg font-semibold mb-2">Khai trương khu nghỉ dưỡng 5 sao mới tại
                                        Phú
                                        Quốc</h3>
                                    <p class="text-gray-600 mb-4 text-sm">Thêm một điểm đến sang trọng mới tại đảo ngọc Phú
                                        Quốc, hứa hẹn mang đến trải nghiệm độc đáo cho du khách với nhiều tiện ích
                                        đẳng
                                        cấp quốc tế.</p>
                                    <a href="./detail_visa.php" class="mt-1 bg-primary text-white px-3 py-1 rounded text-sm hover:bg-secondary transition-colors self-start">Đọc thêm</a>
                                </div>
                            </article>
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
                                <span class="w-10 h-10 flex items-center justify-center text-gray-500">...</span>
                                <button
                                    class="w-10 h-10 flex items-center justify-center rounded-full border hover:bg-gray-50 transition-colors">10</button>
                                <button
                                    class="w-10 h-10 flex items-center justify-center rounded-full border hover:bg-gray-50 transition-colors">
                                    <i class="ri-arrow-right-s-line"></i>
                                </button>
                            </nav>
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