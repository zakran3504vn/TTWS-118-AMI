<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Du Lịch Việt - Tư Vấn Du Lịch Chuyên Nghiệp</title>
        <link rel="icon" href="./assets/uploads/logo-ami-ico.ico" type="image/x-icon">
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
                        primary: '#ea1f63',
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

        html {
            scroll-behavior: smooth;
        }
    </style>
</head>

<body class="bg-white">
    <?php
        include ("./includes/header.php");
    ?>
    <!-- Hero Banner -->
    <section class="relative h-[600px] overflow-hidden">
        <div class="hero-slider relative h-full">
            <div class="hero-slide absolute inset-0 opacity-0 transition-opacity duration-500"
                style="background-image: url('https://readdy.ai/api/search-image?query=Beautiful%20tropical%20travel%20destination%20with%20family%20enjoying%20vacation%2C%20blue%20sky%20with%20clouds%2C%20palm%20trees%2C%20famous%20landmarks%20in%20background%2C%20vibrant%20colors%2C%20professional%20travel%20photography%20style%2C%20bright%20and%20cheerful%20atmosphere&width=1920&height=600&seq=hero1&orientation=landscape'); background-size: cover; background-position: center;">
                <div class="absolute inset-0 bg-gradient-to-r from-primary/20 to-transparent"></div>
                <div class="relative h-full flex items-center px-4">
                    <div class="w-full max-w-6xl mx-auto">
                        <div class="text-white max-w-2xl">
                            <h1 class="text-5xl font-bold mb-4 text-primary drop-shadow-lg">Giữ Trọn Hè Vui</h1>
                            <p class="text-xl mb-6">Khám phá thế giới cùng những tour du lịch tuyệt vời nhất</p>
                            <div class="flex gap-4">
                                <button
                                    class="bg-primary text-white px-8 py-3 !rounded-button font-semibold hover:bg-primary/90 transition-colors whitespace-nowrap">
                                    Tư Vấn Ngay
                                </button>
                                <button
                                    class="bg-white text-primary px-8 py-3 !rounded-button font-semibold hover:bg-gray-50 transition-colors whitespace-nowrap">
                                    Xem Tour
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="hero-slide absolute inset-0 opacity-0 transition-opacity duration-500"
                style="background-image: url('https://readdy.ai/api/search-image?query=Luxury%20beach%20resort%20with%20overwater%20bungalows%2C%20crystal%20clear%20turquoise%20water%2C%20tropical%20paradise%2C%20Maldives%20style%20vacation%20destination%2C%20professional%20travel%20photography&width=1200&height=400&seq=hero2&orientation=landscape'); background-size: cover; background-position: center;">
                <div class="absolute inset-0 bg-gradient-to-r from-primary/20 to-transparent"></div>
                <div class="relative h-full flex items-center px-4">
                    <div class="w-full max-w-6xl mx-auto">
                        <div class="text-white max-w-2xl">
                            <h1 class="text-5xl font-bold mb-4 text-primary drop-shadow-lg">Thiên Đường Nghỉ Dưỡng</h1>
                            <p class="text-xl mb-6">Trải nghiệm kỳ nghỉ tuyệt vời tại những resort đẳng cấp</p>
                            <div class="flex gap-4">
                                <button
                                    class="bg-primary text-white px-8 py-3 !rounded-button font-semibold hover:bg-primary/90 transition-colors whitespace-nowrap">
                                    Tư Vấn Ngay
                                </button>
                                <button
                                    class="bg-white text-primary px-8 py-3 !rounded-button font-semibold hover:bg-gray-50 transition-colors whitespace-nowrap">
                                    Xem Tour
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="hero-slide absolute inset-0 opacity-0 transition-opacity duration-500"
                style="background-image: url('https://readdy.ai/api/search-image?query=Ancient%20European%20city%20with%20historic%20architecture%2C%20cobblestone%20streets%2C%20charming%20cafes%2C%20cultural%20landmarks%2C%20romantic%20travel%20destination%2C%20professional%20cityscape%20photography&width=1920&height=600&seq=hero3&orientation=landscape'); background-size: cover; background-position: center;">
                <div class="absolute inset-0 bg-gradient-to-r from-primary/20 to-transparent"></div>
                <div class="relative h-full flex items-center px-4">
                    <div class="w-full max-w-6xl mx-auto">
                        <div class="text-white max-w-2xl">
                            <h1 class="text-5xl font-bold mb-4 text-primary drop-shadow-lg">Khám Phá Australia</h1>
                            <p class="text-xl mb-6">Hành trình trải nghiệm văn hóa và lịch sử Australia</p>
                            <div class="flex gap-4">
                                <button
                                    class="bg-primary text-white px-8 py-3 !rounded-button font-semibold hover:bg-primary/90 transition-colors whitespace-nowrap">
                                    Tư Vấn Ngay
                                </button>
                                <button
                                    class="bg-white text-primary px-8 py-3 !rounded-button font-semibold hover:bg-gray-50 transition-colors whitespace-nowrap">
                                    Xem Tour
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="absolute bottom-4 left-1/2 transform -translate-x-1/2 flex gap-2 z-10">
                <button class="w-3 h-3 rounded-full bg-white/50 slider-dot" data-index="0"></button>
                <button class="w-3 h-3 rounded-full bg-white/50 slider-dot" data-index="1"></button>
                <button class="w-3 h-3 rounded-full bg-white/50 slider-dot" data-index="2"></button>
            </div>
        </div>
    </section>
    <!-- Quick Access Menu -->
    <section class="py-8 bg-gray-50">
        <div class="max-w-[1440px] mx-auto px-4">
            <!-- Grid cho màn hình lớn (lg trở lên): 4 cột để căn giữa với 4 item, ẩn trên màn hình nhỏ -->
            <div class="hidden lg:grid lg:grid-cols-4 gap-8 justify-items-center">
                <a href="#"
                    class="bg-white rounded-lg p-4 flex flex-col items-center gap-3 shadow-sm hover:shadow-md transition-shadow">
                    <div class="w-16 h-16 flex items-center justify-center bg-primary text-white rounded-full">
                        <i class="ri-map-line ri-2x"></i>
                    </div>
                    <span class="text-sm font-medium text-center">TOUR AUTRALIA</span>
                </a>
                <a href="#"
                    class="bg-white rounded-lg p-4 flex flex-col items-center gap-3 shadow-sm hover:shadow-md transition-shadow">
                    <div class="w-16 h-16 flex items-center justify-center bg-blue-500 text-white rounded-full">
                        <i class="ri-earth-line ri-2x"></i>
                    </div>
                    <span class="text-sm font-medium text-center">TOUR NƯỚC NGOÀI</span>
                </a>
                <a href="#"
                    class="bg-white rounded-lg p-4 flex flex-col items-center gap-3 shadow-sm hover:shadow-md transition-shadow">
                    <div class="w-16 h-16 flex items-center justify-center bg-red-500 text-white rounded-full">
                        <i class="ri-passport-line ri-2x"></i>
                    </div>
                    <span class="text-sm font-medium text-center">Dịch vụ làm VISA</span>
                </a>
                <a href="#"
                    class="bg-white rounded-lg p-4 flex flex-col items-center gap-3 shadow-sm hover:shadow-md transition-shadow">
                    <div class="w-16 h-16 flex items-center justify-center bg-green-500 text-white rounded-full">
                        <i class="ri-plane-line ri-2x"></i>
                    </div>
                    <span class="text-sm font-medium text-center">VÉ MÁY BAY GIÁ RẺ</span>
                </a>
            </div>

            <!-- Slider cho màn hình nhỏ (dưới lg): flex ngang, chiếm toàn width, ẩn scrollbar -->
            <div class="lg:hidden">
                <div
                    class="flex flex-col gap-4 pb-4 [-ms-overflow-style:none] [scrollbar-width:none] [&::-webkit-scrollbar]:hidden">
                    <a href="#"
                        class="w-full bg-white rounded-lg p-4 flex flex-col items-center gap-3 shadow-sm hover:shadow-md transition-shadow">
                        <div class="w-12 h-12 flex items-center justify-center bg-gray-800 text-white rounded-full">
                            <i class="ri-map-line ri-2x"></i>
                        </div>
                        <span class="text-sm font-medium text-center">Tour TRONG NƯỚC</span>
                    </a>
                    <a href="#"
                        class="w-full bg-white rounded-lg p-4 flex flex-col items-center gap-3 shadow-sm hover:shadow-md transition-shadow">
                        <div class="w-12 h-12 flex items-center justify-center bg-blue-500 text-white rounded-full">
                            <i class="ri-earth-line ri-2x"></i>
                        </div>
                        <span class="text-sm font-medium text-center">Tour NƯỚC NGOÀI</span>
                    </a>
                    <a href="#"
                        class="w-full bg-white rounded-lg p-4 flex flex-col items-center gap-3 shadow-sm hover:shadow-md transition-shadow">
                        <div class="w-12 h-12 flex items-center justify-center bg-red-500 text-white rounded-full">
                            <i class="ri-passport-line ri-2x"></i>
                        </div>
                        <span class="text-sm font-medium text-center">Dịch vụ làm VISA</span>
                    </a>
                    <a href="#"
                        class="w-full bg-white rounded-lg p-4 flex flex-col items-center gap-3 shadow-sm hover:shadow-md transition-shadow">
                        <div class="w-12 h-12 flex items-center justify-center bg-green-500 text-white rounded-full">
                            <i class="ri-plane-line ri-2x"></i>
                        </div>
                        <span class="text-sm font-medium text-center">VÉ MÁY BAY GIÁ RẺ</span>
                    </a>
                </div>
            </div>
        </div>
    </section>
    <!-- Tour Categories -->
    <section class="py-12">
        <div class="max-w-6xl mx-auto px-4">
            <div class="hidden md:grid md:grid-cols-3 lg:flex lg:justify-center gap-8 lg:gap-12 mb-12">
                <div class="text-center">
                    <img src="https://readdy.ai/api/search-image?query=Professional%20business%20team%20travel%20tour%20icon%2C%20modern%20corporate%20style%2C%20clean%20background%2C%20business%20people%20silhouettes&width=80&height=80&seq=cat1&orientation=squarish"
                        alt="Tour Doanh Nghiệp" class="w-24 h-24 mx-auto mb-3 rounded-lg object-cover lg:w-32 lg:h-32"">
                    <p class=" text-sm font-medium">Tour Doanh Nghiệp</p>
                </div>
                <div class="text-center">
                    <img src="https://readdy.ai/api/search-image?query=Relaxing%20beach%20resort%20vacation%20icon%2C%20tropical%20paradise%2C%20palm%20trees%20and%20beach%2C%20leisure%20travel%20concept&width=80&height=80&seq=cat2&orientation=squarish"
                        alt="Du lịch Nghỉ Dưỡng" class="w-24 h-24 mx-auto mb-3 rounded-lg object-cover lg:w-32 lg:h-32"">
                    <p class=" text-sm font-medium">Du lịch Nghỉ Dưỡng</p>
                </div>
                <div class="text-center">
                    <img src="https://readdy.ai/api/search-image?query=Unique%20adventure%20travel%20icon%2C%20mountain%20climbing%2C%20extreme%20sports%2C%20adventure%20tourism%20concept&width=80&height=80&seq=cat3&orientation=squarish"
                        alt="Tour Độc Lạ" class="w-24 h-24 mx-auto mb-3 rounded-lg object-cover lg:w-32 lg:h-32"">
                    <p class=" text-sm font-medium">Tour Theo Mùa</p>
                </div>
                <div class="text-center">
                    <img src="https://readdy.ai/api/search-image?query=Happy%20family%20vacation%20travel%20icon%2C%20parents%20with%20children%2C%20family%20bonding%20activities%2C%20joyful%20family%20moments&width=80&height=80&seq=cat6&orientation=squarish"
                        alt="Tour Gia Đình" class="w-24 h-24 mx-auto mb-3 rounded-lg object-cover lg:w-32 lg:h-32"">
                    <p class=" text-sm font-medium">Tour Gia Đình</p>
                </div>
            </div>
            <div class="md:hidden overflow-x-auto pb-4 hide-scrollbar">
                <div class="flex gap-6 touch-pan-x" style="min-width: max-content">
                    <div class="text-center w-24">
                        <img src="https://readdy.ai/api/search-image?query=Professional%20business%20team%20travel%20tour%20icon%2C%20modern%20corporate%20style%2C%20clean%20background%2C%20business%20people%20silhouettes&width=80&height=80&seq=cat1&orientation=squarish"
                            alt="Tour Doanh Nghiệp"
                            class="w-24 h-24 mx-auto mb-3 rounded-lg object-cover lg:w-32 lg:h-32"">
                        <p class=" text-sm font-medium">Tour Doanh Nghiệp</p>
                    </div>
                    <div class="text-center w-24">
                        <img src="https://readdy.ai/api/search-image?query=Relaxing%20beach%20resort%20vacation%20icon%2C%20tropical%20paradise%2C%20palm%20trees%20and%20beach%2C%20leisure%20travel%20concept&width=80&height=80&seq=cat2&orientation=squarish"
                            alt="Du lịch Nghỉ Dưỡng"
                            class="w-24 h-24 mx-auto mb-3 rounded-lg object-cover lg:w-32 lg:h-32"">
                        <p class=" text-sm font-medium">Du lịch Nghỉ Dưỡng</p>
                    </div>
                    <div class="text-center w-24">
                        <img src="https://readdy.ai/api/search-image?query=Unique%20adventure%20travel%20icon%2C%20mountain%20climbing%2C%20extreme%20sports%2C%20adventure%20tourism%20concept&width=80&height=80&seq=cat3&orientation=squarish"
                            alt="Tour Độc Lạ" class="w-24 h-24 mx-auto mb-3 rounded-lg object-cover lg:w-32 lg:h-32"">
                        <p class=" text-sm font-medium">Tour Theo Mùa</p>
                    </div>
                    <div class="text-center w-24">
                        <img src="https://readdy.ai/api/search-image?query=Happy%20family%20vacation%20travel%20icon%2C%20parents%20with%20children%2C%20family%20bonding%20activities%2C%20joyful%20family%20moments&width=80&height=80&seq=cat6&orientation=squarish"
                            alt="Tour Gia Đình" class="w-24 h-24 mx-auto mb-3 rounded-lg object-cover lg:w-32 lg:h-32"">
                        <p class=" text-sm font-medium">Tour Gia Đình</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Featured Tours -->
    <section class="py-12 bg-gray-50">
        <style>
            .hide-scrollbar::-webkit-scrollbar {
                display: none;
            }

            .hide-scrollbar {
                -ms-overflow-style: none;
                scrollbar-width: none;
            }

            .tour-card {
                width: 300px;
                flex-shrink: 0;
            }

            @media (max-width: 768px) {
                .tour-card {
                    width: 280px;
                }
            }

            .touch-pan-x {
                touch-action: pan-x;
                -webkit-overflow-scrolling: touch;
                scroll-snap-type: x mandatory;
            }

            .touch-pan-x>* {
                scroll-snap-align: center;
            }
        </style>
        <div class="max-w-[1440px] mx-auto px-4">
            <h2 class="text-4xl text-[#3c9fd8] font-bold text-center mb-8">TOUR NỔI BẬT</h2>
            <div class="overflow-x-auto pb-4 hide-scrollbar lg:overflow-visible">
                <div class="flex gap-6 justify-center" style="min-width: max-content">
                    <div
                        class="tour-card bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow">
                        <div class="relative">
                            <img src="https://readdy.ai/api/search-image?query=Beautiful%20Russian%20architecture%20Saint%20Petersburg%2C%20colorful%20historic%20buildings%2C%20church%20domes%2C%20European%20travel%20destination%2C%20professional%20travel%20photography&width=300&height=200&seq=tour1&orientation=landscape"
                                alt="Nga - Phần Lan" class="w-full h-62 object-cover">
                        </div>
                        <div class="p-4">
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
                                <a href="./du-lich/tour_detail.php"
                                    class="bg-primary text-white px-6 py-4 !rounded-button text-md hover:bg-primary/90 transition-colors whitespace-nowrap">
                                    XEM TOUR
                                </a>
                            </div>
                        </div>
                    </div>
                    <div
                        class="tour-card bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow">
                        <div class="relative">
                            <img src="https://readdy.ai/api/search-image?query=Modern%20Shanghai%20skyline%20with%20Oriental%20Pearl%20Tower%2C%20futuristic%20cityscape%2C%20China%20travel%20destination%2C%20urban%20architecture%20photography&width=300&height=200&seq=tour2&orientation=landscape"
                                alt="Trung Quốc" class="w-full h-62 object-cover">
                        </div>
                        <div class="p-4">
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
                                <a href="./du-lich/tour_detail.php"
                                    class="bg-primary text-white px-6 py-4 !rounded-button text-md hover:bg-primary/90 transition-colors whitespace-nowrap">
                                    XEM TOUR
                                </a>
                            </div>
                        </div>
                    </div>
                    <div
                        class="tour-card bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow">
                        <div class="relative">
                            <img src="https://readdy.ai/api/search-image?query=European%20travel%20adventure%2C%20young%20woman%20with%20backpack%20exploring%20historic%20European%20city%2C%20cobblestone%20streets%2C%20traditional%20architecture&width=300&height=200&seq=tour3&orientation=landscape"
                                alt="Châu Âu" class="w-full h-62 object-cover">
                        </div>
                        <div class="p-4">
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
                                <a href="./du-lich/tour_detail.php"
                                    class="bg-primary text-white px-6 py-4 !rounded-button text-md hover:bg-primary/90 transition-colors whitespace-nowrap">
                                    XEM TOUR
                                </a>
                            </div>
                        </div>
                    </div>
                    <div
                        class="tour-card bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow">
                        <div class="relative">
                            <img src="https://readdy.ai/api/search-image?query=Beautiful%20Japanese%20landscape%20with%20Mount%20Fuji%2C%20cherry%20blossoms%2C%20traditional%20Japanese%20architecture%2C%20serene%20travel%20destination%20photography&width=300&height=200&seq=tour4&orientation=landscape"
                                alt="Nhật Bản" class="w-full h-62 object-cover">
                        </div>
                        <div class="p-4">
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
                                <a href="./du-lich/tour_detail.php"
                                    class="bg-primary text-white px-6 py-4 !rounded-button text-md hover:bg-primary/90 transition-colors whitespace-nowrap">
                                    XEM TOUR
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- International Tours -->
    <section class="py-12 bg-gray-100">
        <div class="max-w-[1440px] mx-auto px-4">
            <div class="flex justify-between items-center mb-8">
                <h2 class="text-4xl font-bold text-primary">TOUR DU LỊCH ÂU-ÚC-MỸ-PHI</h2>
                <a href="#" class="bg-primary text-white px-4 py-2 rounded-md hover:bg-primary/90 transition-colors">Xem
                    tất cả</a>
            </div>
            <div class="overflow-x-auto pb-4 hide-scrollbar lg:overflow-visible">
                <div class="flex gap-6 justify-center" style="min-width: max-content">
                    <div
                        class="tour-card bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow">
                        <div class="relative">
                            <img src="./assets/images/a72c6f606bb0a7753ce66e72182737eb.jpg" alt="Pháp"
                                class="w-full h-62 object-cover">
                        </div>
                        <div class="p-4">
                            <h3 class="font-semibold mb-2 text-xl">Pháp - Đức - Ý - Thụy Sĩ</h3>
                            <div class="flex items-center gap-2 text-sm text-gray-600 mb-2">
                                <i class="ri-map-pin-line"></i>
                                <span>Nơi khởi hành: [Địa điểm]</span>
                            </div>
                            <div class="flex items-center gap-2 text-sm text-gray-600 mb-2">
                                <i class="ri-map-pin-2-line"></i>
                                <span>Nơi đến: [Địa điểm]</span>
                            </div>
                            <div class="flex items-center gap-2 text-sm text-gray-600 mb-3">
                                <i class="ri-time-line"></i>
                                <span>Thời gian: 12 ngày 11 đêm</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <div class="flex flex-col">
                                    <span class="text-gray-500 line-through text-lg">129.999.000 đ</span>
                                    <span class="text-primary font-bold text-xl">119.999.000 đ</span>
                                </div>
                                <button
                                    class="bg-primary text-white px-6 py-4 !rounded-button text-md hover:bg-primary/90 transition-colors whitespace-nowrap">
                                    XEM TOUR
                                </button>
                            </div>
                        </div>
                    </div>
                    <div
                        class="tour-card bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow">
                        <div class="relative">
                            <img src="./assets/images/bdbd3a9ccdcda08fad1dcc3e3c319ccd.jpg" alt="Úc"
                                class="w-full h-62 object-cover">
                        </div>
                        <div class="p-4">
                            <h3 class="font-semibold mb-2 text-xl">Úc - Sydney - Melbourne - Gold Coast</h3>
                            <div class="flex items-center gap-2 text-sm text-gray-600 mb-2">
                                <i class="ri-map-pin-line"></i>
                                <span>Nơi khởi hành: [Địa điểm]</span>
                            </div>
                            <div class="flex items-center gap-2 text-sm text-gray-600 mb-2">
                                <i class="ri-map-pin-2-line"></i>
                                <span>Nơi đến: [Địa điểm]</span>
                            </div>
                            <div class="flex items-center gap-2 text-sm text-gray-600 mb-3">
                                <i class="ri-time-line"></i>
                                <span>Thời gian: 7 ngày 6 đêm</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <div class="flex flex-col">
                                    <span class="text-gray-500 line-through text-lg">129.999.000 đ</span>
                                    <span class="text-primary font-bold text-xl">119.999.000 đ</span>
                                </div>
                                <button
                                    class="bg-primary text-white px-6 py-4 !rounded-button text-md hover:bg-primary/90 transition-colors whitespace-nowrap">
                                    XEM TOUR
                                </button>
                            </div>
                        </div>
                    </div>
                    <div
                        class="tour-card bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow">
                        <div class="relative">
                            <img src="./assets/images/5fbd6daecd55caed98bc5ceb5dbec8e1.jpg" alt="Mỹ"
                                class="w-full h-62 object-cover">
                        </div>
                        <div class="p-4">
                            <h3 class="font-semibold mb-2 text-xl">Mỹ - New York - Las Vegas - Los Angeles</h3>
                            <div class="flex items-center gap-2 text-sm text-gray-600 mb-2">
                                <i class="ri-map-pin-line"></i>
                                <span>Nơi khởi hành: [Địa điểm]</span>
                            </div>
                            <div class="flex items-center gap-2 text-sm text-gray-600 mb-2">
                                <i class="ri-map-pin-2-line"></i>
                                <span>Nơi đến: [Địa điểm]</span>
                            </div>
                            <div class="flex items-center gap-2 text-sm text-gray-600 mb-3">
                                <i class="ri-time-line"></i>
                                <span>Thời gian: 11 ngày 10 đêm</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <div class="flex flex-col">
                                    <span class="text-gray-500 line-through text-lg">129.999.000 đ</span>
                                    <span class="text-primary font-bold text-xl">119.999.000 đ</span>
                                </div>
                                <button
                                    class="bg-primary text-white px-6 py-4 !rounded-button text-md hover:bg-primary/90 transition-colors whitespace-nowrap">
                                    XEM TOUR
                                </button>
                            </div>
                        </div>
                    </div>
                    <div
                        class="tour-card bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow">
                        <div class="relative">
                            <img src="./assets/images/a2ef391b87b1df9fd13b44f1f2e99e3f.jpg" alt="Ai Cập"
                                class="w-full h-62 object-cover">
                        </div>
                        <div class="p-4">
                            <h3 class="font-semibold mb-2 text-xl">Ai Cập - Cairo - Luxor - Alexandria</h3>
                            <div class="flex items-center gap-2 text-sm text-gray-600 mb-2">
                                <i class="ri-map-pin-line"></i>
                                <span>Nơi khởi hành: [Địa điểm]</span>
                            </div>
                            <div class="flex items-center gap-2 text-sm text-gray-600 mb-2">
                                <i class="ri-map-pin-2-line"></i>
                                <span>Nơi đến: [Địa điểm]</span>
                            </div>
                            <div class="flex items-center gap-2 text-sm text-gray-600 mb-3">
                                <i class="ri-time-line"></i>
                                <span>Thời gian: 8 ngày 7 đêm</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <div class="flex flex-col">
                                    <span class="text-gray-500 line-through text-lg">129.999.000 đ</span>
                                    <span class="text-primary font-bold text-xl">119.999.000 đ</span>
                                </div>
                                <button
                                    class="bg-primary text-white px-6 py-4 !rounded-button text-md hover:bg-primary/90 transition-colors whitespace-nowrap">
                                    XEM TOUR
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Asia Tours -->
    <section class="py-12 bg-white">
        <div class="max-w-[1440px] mx-auto px-4">
            <div class="flex justify-between items-center mb-8">
                <h2 class="text-4xl font-bold text-primary">TOUR CHÂU Á</h2>
                <a href="#" class="bg-primary text-white px-4 py-2 rounded-md hover:bg-primary/90 transition-colors">Xem
                    tất cả</a>
            </div>
            <div class="overflow-x-auto pb-4 hide-scrollbar lg:overflow-visible">
                <div class="flex gap-6 justify-center" style="min-width: max-content">
                    <div
                        class="tour-card bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow">
                        <div class="relative">
                            <img src="./assets/images/aa919670e9622732cc6683414f41112a.jpg" alt="Nhật Bản"
                                class="w-full h-62 object-cover">
                        </div>
                        <div class="p-4">
                            <h3 class="font-semibold mb-2 text-xl">Nhật Bản - Tokyo - Phú Sĩ - Osaka</h3>
                            <div class="flex items-center gap-2 text-sm text-gray-600 mb-2">
                                <i class="ri-map-pin-line"></i>
                                <span>Nơi khởi hành: [Địa điểm]</span>
                            </div>
                            <div class="flex items-center gap-2 text-sm text-gray-600 mb-2">
                                <i class="ri-map-pin-2-line"></i>
                                <span>Nơi đến: [Địa điểm]</span>
                            </div>
                            <div class="flex items-center gap-2 text-sm text-gray-600 mb-3">
                                <i class="ri-time-line"></i>
                                <span>Thời gian: 5 ngày 4 đêm</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <div class="flex flex-col">
                                    <span class="text-gray-500 line-through text-lg">35.999.000 đ</span>
                                    <span class="text-primary font-bold text-xl">29.999.000 đ</span>
                                </div>
                                <button
                                    class="bg-primary text-white px-6 py-4 !rounded-button text-md hover:bg-primary/90 transition-colors whitespace-nowrap">
                                    XEM TOUR
                                </button>
                            </div>
                        </div>
                    </div>
                    <div
                        class="tour-card bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow">
                        <div class="relative">
                            <img src="./assets/images/77d3d8b693cac67c2cffe2c79a72def3.jpg" alt="Hàn Quốc"
                                class="w-full h-62 object-cover">
                        </div>
                        <div class="p-4">
                            <h3 class="font-semibold mb-2 text-xl">Hàn Quốc - Seoul - Nami - Everland</h3>
                            <div class="flex items-center gap-2 text-sm text-gray-600 mb-2">
                                <i class="ri-map-pin-line"></i>
                                <span>Nơi khởi hành: [Địa điểm]</span>
                            </div>
                            <div class="flex items-center gap-2 text-sm text-gray-600 mb-2">
                                <i class="ri-map-pin-2-line"></i>
                                <span>Nơi đến: [Địa điểm]</span>
                            </div>
                            <div class="flex items-center gap-2 text-sm text-gray-600 mb-3">
                                <i class="ri-time-line"></i>
                                <span>Thời gian: 5 ngày 4 đêm</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <div class="flex flex-col">
                                    <span class="text-gray-500 line-through text-lg">35.999.000 đ</span>
                                    <span class="text-primary font-bold text-xl">29.999.000 đ</span>
                                </div>
                                <button
                                    class="bg-primary text-white px-6 py-4 !rounded-button text-md hover:bg-primary/90 transition-colors whitespace-nowrap">
                                    XEM TOUR
                                </button>
                            </div>
                        </div>
                    </div>
                    <div
                        class="tour-card bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow">
                        <div class="relative">
                            <img src="./assets/images/22c0ec8143129200c5a3dd1b2252fb15.jpg" alt="Singapore"
                                class="w-full h-62 object-cover">
                        </div>
                        <div class="p-4">
                            <h3 class="font-semibold mb-2 text-xl">Singapore - Malaysia - Indonesia</h3>
                            <div class="flex items-center gap-2 text-sm text-gray-600 mb-2">
                                <i class="ri-map-pin-line"></i>
                                <span>Nơi khởi hành: [Địa điểm]</span>
                            </div>
                            <div class="flex items-center gap-2 text-sm text-gray-600 mb-2">
                                <i class="ri-map-pin-2-line"></i>
                                <span>Nơi đến: [Địa điểm]</span>
                            </div>
                            <div class="flex items-center gap-2 text-sm text-gray-600 mb-3">
                                <i class="ri-time-line"></i>
                                <span>Thời gian: 5 ngày 4 đêm</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <div class="flex flex-col">
                                    <span class="text-gray-500 line-through text-lg">35.999.000 đ</span>
                                    <span class="text-primary font-bold text-xl">29.999.000 đ</span>
                                </div>
                                <button
                                    class="bg-primary text-white px-6 py-4 !rounded-button text-md hover:bg-primary/90 transition-colors whitespace-nowrap">
                                    XEM TOUR
                                </button>
                            </div>
                        </div>
                    </div>
                    <div
                        class="tour-card bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow">
                        <div class="relative">
                            <img src="./assets/images/22c0ec8143129200c5a3dd1b2252fb15.jpg" alt="Thái Lan"
                                class="w-full h-62 object-cover">
                        </div>
                        <div class="p-4">
                            <h3 class="font-semibold mb-2 text-xl">Thái Lan - Bangkok - Pattaya</h3>
                            <div class="flex items-center gap-2 text-sm text-gray-600 mb-2">
                                <i class="ri-map-pin-line"></i>
                                <span>Nơi khởi hành: [Địa điểm]</span>
                            </div>
                            <div class="flex items-center gap-2 text-sm text-gray-600 mb-2">
                                <i class="ri-map-pin-2-line"></i>
                                <span>Nơi đến: [Địa điểm]</span>
                            </div>
                            <div class="flex items-center gap-2 text-sm text-gray-600 mb-3">
                                <i class="ri-time-line"></i>
                                <span>Thời gian: 5 ngày 4 đêm</span>
                            </div>
                            <div class="flex justify-between items-center">
                                <div class="flex flex-col">
                                    <span class="text-gray-500 line-through text-lg">35.999.000 đ</span>
                                    <span class="text-primary font-bold text-xl">29.999.000 đ</span>
                                </div>
                                <button
                                    class="bg-primary text-white px-6 py-4 !rounded-button text-md hover:bg-primary/90 transition-colors whitespace-nowrap">
                                    XEM TOUR
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Travel Tips -->
    <section class="py-12 bg-gray-100">
        <div class="max-w-[1440px] mx-auto px-4">
            <div class="flex justify-between items-center mb-8">
                <h2 class="text-4xl font-bold text-primary">DỊCH VỤ VISA</h2>
                <a href="#" class="bg-primary text-white px-4 py-2 rounded-md hover:bg-primary/90 transition-colors">Xem
                    tất cả</a>
            </div>
            <div class="overflow-x-auto pb-4 hide-scrollbar lg:overflow-visible">
                <div class="flex gap-6 justify-center" style="min-width: max-content">
                    <article
                        class="tour-card bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow">
                        <img src="./assets/images/a0f6790b60226fe848e8179dc5350858.jpg" alt="Kinh nghiệm du lịch"
                            class="w-full h-62 object-cover">
                        <div class="p-4">
                            <h3 class="font-semibold mb-2 text-xl">10 Bí quyết xếp hành lý thông minh cho chuyến du lịch
                            </h3>
                            <p class="text-gray-600 text-sm mb-3 line-clamp-2">Những mẹo hữu ích giúp bạn tối ưu không
                                gian vali, mang theo đầy đủ vật dụng cần thiết mà vẫn gọn nhẹ.</p>
                            <div class="flex items-center gap-4 text-sm text-gray-500">
                                <span class="flex items-center gap-1">
                                    <i class="ri-eye-line"></i>
                                    2.5K
                                </span>
                                <span class="flex items-center gap-1">
                                    <i class="ri-time-line"></i>
                                    25/07/2025
                                </span>
                            </div>
                        </div>
                    </article>
                    <article
                        class="tour-card bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow">
                        <img src="./assets/images/536da977e66be0cfbfd253db60d89811.jpg" alt="Thủ tục visa"
                            class="w-full h-62 object-cover">
                        <div class="p-4">
                            <h3 class="font-semibold mb-2 text-xl">Hướng dẫn thủ tục xin visa du lịch các nước châu Âu
                            </h3>
                            <p class="text-gray-600 text-sm mb-3 line-clamp-2">Quy trình, hồ sơ và những lưu ý quan
                                trọng khi xin visa Schengen cho chuyến du lịch châu Âu.</p>
                            <div class="flex items-center gap-4 text-sm text-gray-500">
                                <span class="flex items-center gap-1">
                                    <i class="ri-eye-line"></i>
                                    3.2K
                                </span>
                                <span class="flex items-center gap-1">
                                    <i class="ri-time-line"></i>
                                    20/07/2025
                                </span>
                            </div>
                        </div>
                    </article>
                    <article
                        class="tour-card bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow">
                        <img src="./assets/images/fbdaa843d783747bec334b6986e63cf6.jpg" alt="Tiết kiệm chi phí"
                            class="w-full h-62 object-cover">
                        <div class="p-4">
                            <h3 class="font-semibold mb-2 text-xl">Cách tiết kiệm chi phí khi du lịch nước ngoài</h3>
                            <p class="text-gray-600 text-sm mb-3 line-clamp-2">Những bí quyết giúp bạn du lịch tiết kiệm
                                nhưng vẫn đảm bảo trải nghiệm tuyệt vời.</p>
                            <div class="flex items-center gap-4 text-sm text-gray-500">
                                <span class="flex items-center gap-1">
                                    <i class="ri-eye-line"></i>
                                    4.1K
                                </span>
                                <span class="flex items-center gap-1">
                                    <i class="ri-time-line"></i>
                                    15/07/2025
                                </span>
                            </div>
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </section>
    <!-- News -->
    <section class="py-12 bg-gray-50">
        <div class="max-w-[1440px] mx-auto px-4">
            <div class="flex justify-between items-center mb-8">
                <h2 class="text-4xl font-bold text-primary">Tin tức</h2>
                <a href="#" class="bg-primary text-white px-4 py-2 rounded-md hover:bg-primary/90 transition-colors">Xem
                    tất cả</a>
            </div>
            <div class="overflow-x-auto pb-4 hide-scrollbar lg:overflow-visible">
                <div class="flex gap-6 justify-center" style="min-width: max-content">
                    <article
                        class="tour-card bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow">
                        <img src="./assets/images/3bb02405b1d9cfa44114e887bbae1e03.jpg" alt="Tin tức du lịch"
                            class="w-full h-62 object-cover">
                        <div class="p-4">
                            <h3 class="font-semibold mb-2 text-xl line-clamp-2">Khai trương khu nghỉ dưỡng 5 sao tại Phú
                                Quốc</h3>
                            <p class="text-gray-600 text-sm mb-3 line-clamp-2">Thêm một điểm đến sang trọng mới tại đảo
                                ngọc Phú Quốc, hứa hẹn mang đến trải nghiệm độc đáo.</p>
                            <div class="flex items-center gap-4 text-sm text-gray-500">
                                <span class="flex items-center gap-1">
                                    <i class="ri-time-line"></i>
                                    21/07/2025
                                </span>
                            </div>
                        </div>
                    </article>
                    <article
                        class="tour-card bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow">
                        <img src="./assets/images/04dd907cab6e4eeadacfbfc6cf83c167.jpg" alt="Khuyến mãi"
                            class="w-full h-62 object-cover">
                        <div class="p-4">
                            <h3 class="font-semibold mb-2 text-xl line-clamp-2">Chương trình ưu đãi vé máy bay đi châu
                                Âu</h3>
                            <p class="text-gray-600 text-sm mb-3 line-clamp-2">Cơ hội săn vé máy bay giá rẻ đi châu Âu
                                trong mùa thu này với nhiều ưu đãi hấp dẫn.</p>
                            <div class="flex items-center gap-4 text-sm text-gray-500">
                                <span class="flex items-center gap-1">
                                    <i class="ri-time-line"></i>
                                    19/07/2025
                                </span>
                            </div>
                        </div>
                    </article>
                    <article
                        class="tour-card bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow">
                        <img src="./assets/images/c89e63b6bdaa4afa68049bbcce7ca468.jpg" alt="Chính sách mới"
                            class="w-full h-62 object-cover">
                        <div class="p-4">
                            <h3 class="font-semibold mb-2 text-xl line-clamp-2">Chính sách mới về visa du lịch Nhật Bản
                            </h3>
                            <p class="text-gray-600 text-sm mb-3 line-clamp-2">Những thay đổi trong quy định xin visa du
                                lịch Nhật Bản, áp dụng từ tháng 8/2025.</p>
                            <div class="flex items-center gap-4 text-sm text-gray-500">
                                <span class="flex items-center gap-1">
                                    <i class="ri-time-line"></i>
                                    18/07/2025
                                </span>
                            </div>
                        </div>
                    </article>
                    <article
                        class="tour-card bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow">
                        <img src="./assets/images/5131ff0f653c8c481108144baa79ce6b.jpg" alt="Giải thưởng"
                            class="w-full h-62 object-cover">
                        <div class="p-4">
                            <h3 class="font-semibold mb-2 text-xl line-clamp-2">Du lịch Việt đạt giải thưởng quốc tế
                            </h3>
                            <p class="text-gray-600 text-sm mb-3 line-clamp-2">Vinh dự nhận giải thưởng "Đơn vị lữ hành
                                tốt nhất châu Á" năm 2025.</p>
                            <div class="flex items-center gap-4 text-sm text-gray-500">
                                <span class="flex items-center gap-1">
                                    <i class="ri-time-line"></i>
                                    15/07/2025
                                </span>
                            </div>
                        </div>
                    </article>
                </div>
            </div>
        </div>
    </section>
    <!-- Consultation Form -->
    <section class="py-16 bg-gradient-to-r from-primary to-secondary">
        <div class="max-w-[1440px] mx-auto px-4 text-center">
            <h2 class="text-3xl font-bold text-white mb-4">Đăng Ký Tư Vấn Miễn Phí</h2>
            <p class="text-white/90 mb-8">Để lại thông tin để nhận tư vấn chi tiết về các tour du lịch phù hợp nhất</p>
            <div class="bg-white rounded-xl p-8 max-w-2xl mx-auto">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                    <input type="text" placeholder="Họ và tên *"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-primary">
                    <input type="tel" placeholder="Số điện thoại *"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-primary">
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                    <input type="email" placeholder="Email"
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-primary">
                    <select
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-primary pr-8">
                        <option>Chọn dịch vụ quan tâm</option>
                        <option>Tour du lịch</option>
                        <option>Đặt khách sạn</option>
                        <option>Vé máy bay</option>
                        <option>Dịch vụ visa</option>
                        <option>Thuê xe</option>
                    </select>
                </div>
                <textarea placeholder="Ghi chú thêm..."
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:border-primary mb-6"
                    rows="3"></textarea>
                <button
                    class="w-full bg-primary text-white py-4 !rounded-button font-semibold hover:bg-primary/90 transition-colors whitespace-nowrap">
                    Đăng Ký Tư Vấn Ngay
                </button>
            </div>
        </div>
    </section>
    
    <?php
    include ("./includes/footer.php");
    include ("./includes/cta.php");
    ?>
    
    <script id="consultationForm">
        document.addEventListener('DOMContentLoaded', function () {
            const consultationForm = document.querySelector('section form');
            if (consultationForm) {
                consultationForm.addEventListener('submit', function (e) {
                    e.preventDefault();
                    alert('Cảm ơn bạn đã đăng ký! Chúng tôi sẽ liên hệ với bạn trong thời gian sớm nhất.');
                });
            }
        });
    </script>
    
    <script id="touchSlider">
        document.addEventListener('DOMContentLoaded', function () {
            const sliders = document.querySelectorAll('.quick-access-slider');
            sliders.forEach(slider => {
                let isDragging = false;
                let startPosition = 0;
                let currentTranslate = 0;
                let prevTranslate = 0;
                function touchStart(event) {
                    isDragging = true;
                    startPosition = getPositionX(event);
                    slider.style.cursor = 'grabbing';
                }
                function touchMove(event) {
                    if (isDragging) {
                        const currentPosition = getPositionX(event);
                        currentTranslate = prevTranslate + currentPosition - startPosition;
                    }
                }
                function touchEnd() {
                    isDragging = false;
                    prevTranslate = currentTranslate;
                    slider.style.cursor = 'grab';
                }
                function getPositionX(event) {
                    return event.type.includes('mouse') ? event.pageX : event.touches[0].clientX;
                }
                slider.addEventListener('mousedown', touchStart);
                slider.addEventListener('mousemove', touchMove);
                slider.addEventListener('mouseup', touchEnd);
                slider.addEventListener('mouseleave', touchEnd);
                slider.addEventListener('touchstart', touchStart);
                slider.addEventListener('touchmove', touchMove);
                slider.addEventListener('touchend', touchEnd);
            });
            const heroSlider = {
                slides: document.querySelectorAll('.hero-slide'),
                dots: document.querySelectorAll('.slider-dot'),
                currentSlide: 0,
                slideInterval: null,
                init() {
                    if (this.slides.length === 0) return;
                    this.slides[0].style.opacity = '1';
                    this.dots[0].style.backgroundColor = 'rgb(255 255 255)';
                    this.autoPlay();
                    this.setupDotControls();
                },
                showSlide(index) {
                    this.slides[this.currentSlide].style.opacity = '0';
                    this.dots[this.currentSlide].style.backgroundColor = 'rgb(255 255 255 / 0.5)';
                    this.currentSlide = index;
                    this.slides[this.currentSlide].style.opacity = '1';
                    this.dots[this.currentSlide].style.backgroundColor = 'rgb(255 255 255)';
                },
                nextSlide() {
                    const next = (this.currentSlide + 1) % this.slides.length;
                    this.showSlide(next);
                },
                autoPlay() {
                    this.slideInterval = setInterval(() => this.nextSlide(), 5000);
                },
                setupDotControls() {
                    this.dots.forEach((dot, index) => {
                        dot.addEventListener('click', () => {
                            clearInterval(this.slideInterval);
                            this.showSlide(index);
                            this.autoPlay();
                        });
                    });
                }
            };
            heroSlider.init();
        });
    </script>
</body>

</html>