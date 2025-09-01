<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chi Tiết Tin Tức - Ami Travels</title>
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
            <h1 class="text-4xl font-bold mb-4">Khai trương khu nghỉ dưỡng 5 sao mới tại Phú Quốc</h1>
            <p class="text-xl opacity-90">Tin tức mới nhất</p>
        </div>
    </div>
    <div class="bg-gray-50 py-4">
        <div class="max-w-6xl mx-auto px-4">
            <div class="flex items-center gap-2 text-sm text-gray-600">
                <a href="../index.php" class="hover:text-primary">Trang chủ</a>
                <i class="ri-arrow-right-s-line"></i>
                <a href="./index.php" class="hover:text-primary">Tin tức</a>
                <i class="ri-arrow-right-s-line"></i>
                <span class="text-primary">Tên bài viết</span>
            </div>
        </div>
    </div>
    <main class="py-8">
        <div class="max-w-6xl mx-auto px-4">
            <div class="flex flex-col lg:flex-row gap-8">
                <div class="lg:w-3/4">
                    <article class="bg-white rounded-lg shadow-sm overflow-hidden p-6">
                        <img src="https://readdy.ai/api/search-image?query=Travel%20guide%20book%20with%20map%2C%20passport%2C%20camera%2C%20and%20travel%20accessories%2C%20flat%20lay%20photography%2C%20travel%20planning%20concept&width=400&height=300&seq=news2&orientation=landscape"
                            alt="Resort mới" class=" h-auto object-cover rounded-lg mb-6">
                        <div class="flex items-center gap-6 text-sm text-gray-500 mb-6">
                            <span class="flex items-center gap-2">
                                <i class="ri-time-line"></i>
                                21/07/2025
                            </span>
                            <span class="flex items-center gap-2">
                                <i class="ri-eye-line"></i>
                                2.5K lượt xem
                            </span>
                        </div>
                        <div class="w-full text-2xl text-black mb-8 mx-auto">
                            <h3 class="text-2xl font-semibold mb-3">Top 10 điểm đến không thể bỏ qua khi du
                                            lịch
                                            Nhật Bản mùa thu</h3>
                            <p class="text-justify">Phú Quốc, hòn đảo ngọc của Việt Nam, vừa chào đón một thành viên mới trong hệ thống nghỉ
                                dưỡng cao cấp: Khu nghỉ dưỡng 5 sao Premier Residences Phú Quốc Emerald Bay. Được khai
                                trương chính thức vào ngày 21/07/2025, resort này hứa hẹn sẽ mang đến những trải nghiệm
                                sang trọng và độc đáo cho du khách trong và ngoài nước.</p>

                            <h3 class="text-primary font-bold">Giới thiệu về khu nghỉ dưỡng</h3>
                            <p class="text-justify">Phú Quốc, hòn đảo ngọc của Việt Nam, vừa chào đón một thành viên mới trong hệ thống nghỉ
                                dưỡng cao cấp: Khu nghỉ dưỡng 5 sao Premier Residences Phú Quốc Emerald Bay. Được khai
                                trương chính thức vào ngày 21/07/2025, resort này hứa hẹn sẽ mang đến những trải nghiệm
                                sang trọng và độc đáo cho du khách trong và ngoài nước.</p>
                        </div>
                        <div class="flex items-center gap-4 mb-8">
                            <h3 class="font-semibold">Chia sẻ bài viết:</h3>
                            <a href="#"
                                class="w-8 h-8 flex items-center justify-center bg-[#3b5998] text-white rounded-full hover:bg-[#3b5998]/90">
                                <i class="ri-facebook-fill"></i>
                            </a>
                            <a href="#"
                                class="w-8 h-8 flex items-center justify-center bg-secondary text-white rounded-full hover:bg-secondary/90">
                                <i class="ri-twitter-fill"></i>
                            </a>
                            <a href="#"
                                class="w-8 h-8 flex items-center justify-center bg-red-500 text-white rounded-full hover:bg-red-600">
                                <i class="ri-youtube-fill"></i>
                            </a>
                        </div>
                    </article>
                    <div class="mt-12">
                        <h2 class="text-2xl font-bold mb-6">Bài viết liên quan</h2>
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                            <a href="#" class="block">
                                <img src="https://readdy.ai/api/search-image?query=Travel%20guide%20book%20with%20map%2C%20passport%2C%20camera%2C%20and%20travel%20accessories%2C%20flat%20lay%20photography%2C%20travel%20planning%20concept&width=400&height=300&seq=news2&orientation=landscape"
                                    alt="Cẩm nang du lịch" class="w-full h-40 object-cover rounded-lg mb-4">
                                <h4 class="font-semibold mb-2">Top 10 điểm đến không thể bỏ qua khi du lịch Nhật Bản mùa
                                    thu</h4>
                                <p class="text-sm text-gray-500">20/07/2025</p>
                            </a>
                            <a href="#" class="block">
                                <img src="https://readdy.ai/api/search-image?query=Special%20travel%20deal%20promotion%2C%20discount%20offer%20banner%2C%20summer%20vacation%20sale%2C%20marketing%20campaign%20visual&width=400&height=300&seq=news3&orientation=landscape"
                                    alt="Khuyến mãi tour" class="w-full h-40 object-cover rounded-lg mb-4">
                                <h4 class="font-semibold mb-2">Ưu đãi đặc biệt: Giảm 30% tour châu Âu mùa thu</h4>
                                <p class="text-sm text-gray-500">19/07/2025</p>
                            </a>
                            <a href="#" class="block">
                                <img src="https://readdy.ai/api/search-image?query=International%20tourism%20conference%2C%20business%20meeting%20room%2C%20professional%20event%20photography%2C%20travel%20industry%20gathering&width=400&height=300&seq=news4&orientation=landscape"
                                    alt="Tin ngành" class="w-full h-40 object-cover rounded-lg mb-4">
                                <h4 class="font-semibold mb-2">Hội nghị Du lịch Quốc tế 2025 tại Việt Nam</h4>
                                <p class="text-sm text-gray-500">18/07/2025</p>
                            </a>
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
</body>

</html>