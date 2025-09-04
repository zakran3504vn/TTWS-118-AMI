<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đặt Tour Du Lịch - Đà Nẵng - Hội An</title>
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

        input[type="number"]::-webkit-inner-spin-button,
        input[type="number"]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        input[type="number"] {
            -moz-appearance: textfield;
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
                <a href="./index.php"
                    data-readdy="true" class="text-gray-600 hover:text-primary">Du lịch nước ngoài</a>
                <i class="ri-arrow-right-s-line text-gray-400"></i>
                <span class="text-primary font-medium">Tên tour du lịch</span>
            </nav>
        </div>
    </div>
    <main class="py-8">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex flex-col lg:flex-row gap-8">
                <div class="lg:w-2/3">
                    <div class="bg-white rounded-lg shadow-sm border mb-6">
                        <div>
                            <div class="relative h-[400px] overflow-hidden rounded-t-lg">
                                <img src="https://readdy.ai/api/search-image?query=Serene%20mountain%20landscape%20at%20dawn%2C%20rolling%20green%20hills%20with%20morning%20mist%2C%20soft%20sunlight%20casting%20gentle%20shadows%2C%20minimal%20composition%2C%20peaceful%20atmosphere%2C%20natural%20scenery%2C%20clean%20simple%20vista%2C%20high%20resolution%20landscape%20photography&width=1200&height=800&seq=hero3&orientation=landscape"
                                    alt="Đà Nẵng - Hội An" class="w-full h-full object-cover object-top main-image">
                            </div>
                            <div class="grid grid-cols-5 gap-2 mt-2">
                                <div class="h-20 cursor-pointer overflow-hidden rounded-lg gallery-item active">
                                    <img src="https://readdy.ai/api/search-image?query=Serene%20mountain%20landscape%20at%20dawn%2C%20rolling%20green%20hills%20with%20morning%20mist%2C%20soft%20sunlight%20casting%20gentle%20shadows%2C%20minimal%20composition%2C%20peaceful%20atmosphere%2C%20natural%20scenery%2C%20clean%20simple%20vista%2C%20high%20resolution%20landscape%20photography&width=400&height=300&seq=hero3&orientation=landscape"
                                        alt="Gallery 1" class="w-full h-full object-cover">
                                </div>
                                <div class="h-20 cursor-pointer overflow-hidden rounded-lg gallery-item">
                                    <img src="https://readdy.ai/api/search-image?query=Golden%20lantern-lit%20ancient%20streets%20of%20Hoi%20An%20at%20dusk%2C%20traditional%20Vietnamese%20architecture%2C%20warm%20ambient%20lighting%2C%20cultural%20heritage%20site%2C%20atmospheric%20evening%20scene&width=400&height=300&seq=gallery2&orientation=landscape"
                                        alt="Gallery 2" class="w-full h-full object-cover">
                                </div>
                                <div class="h-20 cursor-pointer overflow-hidden rounded-lg gallery-item">
                                    <img src="https://readdy.ai/api/search-image?query=Iconic%20Golden%20Bridge%20at%20Ba%20Na%20Hills%20surrounded%20by%20misty%20mountains%2C%20giant%20stone%20hands%2C%20architectural%20marvel%2C%20dramatic%20cloudy%20sky%2C%20tourist%20destination&width=400&height=300&seq=gallery3&orientation=landscape"
                                        alt="Gallery 3" class="w-full h-full object-cover">
                                </div>
                                <div class="h-20 cursor-pointer overflow-hidden rounded-lg gallery-item">
                                    <img src="https://readdy.ai/api/search-image?query=Traditional%20pottery%20making%20in%20Thanh%20Ha%20Village%2C%20artisan%20crafting%20ceramic%2C%20authentic%20Vietnamese%20culture%2C%20rustic%20workshop%20setting%2C%20natural%20lighting&width=400&height=300&seq=gallery4&orientation=landscape"
                                        alt="Gallery 4" class="w-full h-full object-cover">
                                </div>
                                <div class="h-20 cursor-pointer overflow-hidden rounded-lg gallery-item">
                                    <img src="https://readdy.ai/api/search-image?query=Pristine%20My%20Khe%20Beach%20at%20sunset%2C%20palm%20trees%2C%20crystal%20clear%20water%2C%20white%20sand%2C%20luxury%20resorts%20in%20background%2C%20tropical%20paradise&width=400&height=300&seq=gallery5&orientation=landscape"
                                        alt="Gallery 5" class="w-full h-full object-cover">
                                </div>
                            </div>
                            <div class="grid grid-cols-5 gap-2 mt-2">
                                <div class="h-20 cursor-pointer overflow-hidden rounded-lg gallery-item">
                                    <img src="https://readdy.ai/api/search-image?query=Marble%20Mountains%20Da%20Nang%20Vietnam%2C%20ancient%20Buddhist%20temples%2C%20stone%20stairs%2C%20lush%20greenery%2C%20mystical%20caves%2C%20spiritual%20atmosphere%2C%20cultural%20heritage&width=400&height=300&seq=gallery6&orientation=landscape"
                                        alt="Gallery 6" class="w-full h-full object-cover">
                                </div>
                                <div class="h-20 cursor-pointer overflow-hidden rounded-lg gallery-item">
                                    <img src="https://readdy.ai/api/search-image?query=Son%20Tra%20Peninsula%20panoramic%20view%2C%20luxury%20resort%20architecture%2C%20pristine%20beaches%2C%20dense%20rainforest%2C%20natural%20landscape%2C%20aerial%20photography&width=400&height=300&seq=gallery7&orientation=landscape"
                                        alt="Gallery 7" class="w-full h-full object-cover">
                                </div>
                                <div class="h-20 cursor-pointer overflow-hidden rounded-lg gallery-item">
                                    <img src="https://readdy.ai/api/search-image?query=Traditional%20Vietnamese%20lantern%20making%20workshop%2C%20artisan%20crafting%20colorful%20silk%20lanterns%2C%20authentic%20cultural%20experience%2C%20warm%20lighting%2C%20detailed%20handwork&width=400&height=300&seq=gallery8&orientation=landscape"
                                        alt="Gallery 8" class="w-full h-full object-cover">
                                </div>
                                <div class="h-20 cursor-pointer overflow-hidden rounded-lg gallery-item">
                                    <img src="https://readdy.ai/api/search-image?query=Dragon%20Bridge%20Da%20Nang%20at%20night%2C%20illuminated%20steel%20dragon%2C%20colorful%20LED%20lights%2C%20modern%20architecture%2C%20city%20skyline%2C%20reflection%20in%20river&width=400&height=300&seq=gallery9&orientation=landscape"
                                        alt="Gallery 9" class="w-full h-full object-cover">
                                </div>
                                <div class="h-20 cursor-pointer overflow-hidden rounded-lg gallery-item">
                                    <img src="https://readdy.ai/api/search-image?query=Local%20food%20market%20in%20Hoi%20An%2C%20fresh%20Vietnamese%20ingredients%2C%20colorful%20produce%20display%2C%20traditional%20food%20stalls%2C%20authentic%20street%20food%20scene&width=400&height=300&seq=gallery10&orientation=landscape"
                                        alt="Gallery 10" class="w-full h-full object-cover">
                                </div>
                            </div>
                        </div>
                        <div class="p-6">
                            <h2 class="text-2xl font-semibold mb-4">Đà Nẵng - Hội An - Phố Cổ - Làng Gốm Thanh Hà - Cầu
                                Vàng</h2>
                            <div class="flex flex-wrap gap-6 text-gray-600 mb-6">
                                <div class="flex items-center gap-2">
                                    <i class="ri-map-pin-line text-primary"></i>
                                    <span>Điểm khởi hành: TP. Hồ Chí Minh</span>
                                </div>
                                <div class="flex items-center gap-2">
                                    <i class="ri-time-line text-primary"></i>
                                    <span>Thời gian: 3 ngày 2 đêm</span>
                                </div>
                                <div class="flex items-center gap-2">
                                    <i class="ri-bus-line text-primary"></i>
                                    <span>Phương tiện: Máy bay & Xe du lịch</span>
                                </div>
                            </div>
                            <div class="border-t pt-6">
                                <div class="flex items-center justify-between mb-4">
                                    <h3 class="text-lg font-medium">Lịch trình tour</h3>
                                    <button
                                        class="text-primary hover:text-primary/80 transition-colors text-sm font-medium">
                                        Xem chi tiết
                                    </button>
                                </div>
                                <div class="bg-gray-50 p-4 rounded-lg mb-6">
                                    <h4 class="font-medium mb-3">Tổng quan hành trình</h4>
                                    <div class="text-sm text-gray-600 space-y-2">
                                        <p>• Khám phá Bà Nà Hills với Cầu Vàng nổi tiếng thế giới</p>
                                        <p>• Tham quan Phố Cổ Hội An - Di sản văn hóa thế giới UNESCO</p>
                                        <p>• Trải nghiệm làng nghề truyền thống tại Làng Gốm Thanh Hà</p>
                                        <p>• Thưởng thức ẩm thực đặc sắc của miền Trung</p>
                                        <p>• Di chuyển thuận tiện bằng máy bay khứ hồi và xe du lịch đời mới</p>
                                    </div>
                                </div>
                                <div class="space-y-4">
                                    <div class="flex gap-4">
                                        <div class="w-24 flex-shrink-0">
                                            <div
                                                class="w-8 h-8 rounded-full bg-primary/10 text-primary flex items-center justify-center font-medium">
                                                1</div>
                                        </div>
                                        <div>
                                            <h4 class="font-medium mb-2">Ngày 1: TP.HCM - Đà Nẵng - Bà Nà Hills</h4>
                                            <p class="text-gray-600 text-sm">Khởi hành từ sân bay Tân Sơn Nhất, tham
                                                quan Bà Nà Hills và trải nghiệm Cầu Vàng.</p>
                                        </div>
                                    </div>
                                    <div class="flex gap-4">
                                        <div class="w-24 flex-shrink-0">
                                            <div
                                                class="w-8 h-8 rounded-full bg-primary/10 text-primary flex items-center justify-center font-medium">
                                                2</div>
                                        </div>
                                        <div>
                                            <h4 class="font-medium mb-2">Ngày 2: Hội An - Phố Cổ - Làng Gốm</h4>
                                            <p class="text-gray-600 text-sm">Khám phá Phố Cổ Hội An, tham quan Làng Gốm
                                                Thanh Hà và thưởng thức ẩm thực địa phương.</p>
                                        </div>
                                    </div>
                                    <div class="flex gap-4">
                                        <div class="w-24 flex-shrink-0">
                                            <div
                                                class="w-8 h-8 rounded-full bg-primary/10 text-primary flex items-center justify-center font-medium">
                                                3</div>
                                        </div>
                                        <div>
                                            <h4 class="font-medium mb-2">Ngày 3: Đà Nẵng - TP.HCM</h4>
                                            <p class="text-gray-600 text-sm">Tham quan Ngũ Hành Sơn, mua sắm tại chợ Hàn
                                                và trở về TP.HCM.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="border-t pt-6">
                                <div class="flex items-center justify-between mb-4">
                                    <h3 class="text-lg font-medium">Khách sạn tương ứng</h3>
                                </div>
                                <div class="grid grid-cols-1 gap-4 hotel-list">
                                    <div class="border rounded-lg overflow-hidden cursor-pointer hotel-option"
                                        data-price="0">
                                        <div class="flex items-center p-4">
                                            <div class="w-24 h-24 rounded-lg overflow-hidden flex-shrink-0">
                                                <img src="https://readdy.ai/api/search-image?query=Modern%20luxury%20hotel%20room%20with%20city%20view%2C%20elegant%20interior%20design%2C%20king%20size%20bed%2C%20warm%20lighting%2C%20contemporary%20furniture%2C%20floor%20to%20ceiling%20windows%2C%204k%20photography&width=400&height=400&seq=hotel1&orientation=squarish"
                                                    alt="Khách sạn Mường Thanh Luxury"
                                                    class="w-full h-full object-cover">
                                            </div>
                                            <div class="ml-4 flex-grow">
                                                <div>
                                                    <h4 class="font-medium mb-2">Mường Thanh Luxury Đà Nẵng</h4>
                                                    <div class="flex items-center gap-2 text-sm text-gray-600">
                                                        <i class="ri-map-pin-line"></i>
                                                        <span>Bãi biển Mỹ Khê, Đà Nẵng</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="border rounded-lg overflow-hidden cursor-pointer hotel-option"
                                        data-price="500000">
                                        <div class="flex items-center p-4">
                                            <div class="w-24 h-24 rounded-lg overflow-hidden flex-shrink-0">
                                                <img src="https://readdy.ai/api/search-image?query=Luxurious%20resort%20room%20with%20beach%20view%2C%20balcony%2C%20premium%20amenities%2C%20modern%20design%2C%20bright%20and%20airy%2C%20high%20end%20finishes%2C%20professional%20hotel%20photography&width=400&height=400&seq=hotel2&orientation=squarish"
                                                    alt="Vinpearl Resort & Spa" class="w-full h-full object-cover">
                                            </div>
                                            <div class="ml-4 flex-grow">
                                                <div>
                                                    <h4 class="font-medium mb-2">Vinpearl Resort & Spa Đà Nẵng</h4>
                                                    <div class="flex items-center gap-2 text-sm text-gray-600">
                                                        <i class="ri-map-pin-line"></i>
                                                        <span>Ngũ Hành Sơn, Đà Nẵng</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="border rounded-lg overflow-hidden cursor-pointer hotel-option"
                                        data-price="1000000">
                                        <div class="flex items-center p-4">
                                            <div class="w-24 h-24 rounded-lg overflow-hidden flex-shrink-0">
                                                <img src="https://readdy.ai/api/search-image?query=Ultra%20luxury%20hotel%20suite%20with%20panoramic%20ocean%20view%2C%20premium%20decor%2C%20marble%20bathroom%2C%20exclusive%20amenities%2C%20sophisticated%20design%2C%205%20star%20hotel%20room%2C%20professional%20photography&width=400&height=400&seq=hotel3&orientation=squarish"
                                                    alt="InterContinental Danang" class="w-full h-full object-cover">
                                            </div>
                                            <div class="ml-4 flex-grow">
                                                <div>
                                                    <h4 class="font-medium mb-2">InterContinental Danang Sun Peninsula
                                                    </h4>
                                                    <div class="flex items-center gap-2 text-sm text-gray-600">
                                                        <i class="ri-map-pin-line"></i>
                                                        <span>Bán đảo Sơn Trà, Đà Nẵng</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="lg:w-1/3">
                    <div class="bg-white rounded-lg shadow-sm border p-6 sticky top-4">
                        <h3 class="text-lg font-medium mb-6">Thông tin đặt tour</h3>
                        <form id="bookingForm" class="space-y-6">
                            <div>
                                <label class="block text-sm font-medium mb-2">Họ và tên</label>
                                <input type="text" required
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-primary text-sm"
                                    placeholder="Nhập họ và tên">
                            </div>
                            <div>
                                <label class="block text-sm font-medium mb-2">Số điện thoại</label>
                                <input type="tel" required
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-primary text-sm"
                                    placeholder="Nhập số điện thoại">
                            </div>
                            <div>
                                <label class="block text-sm font-medium mb-2">Email</label>
                                <input type="email" required
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-primary text-sm"
                                    placeholder="Nhập địa chỉ email">
                            </div>
                            <div>
                                <label class="block text-sm font-medium mb-2">Ngày khởi hành</label>
                                <div class="relative">
                                    <input type="date" required min=""
                                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-primary text-sm appearance-none departure-date">
                                </div>
                            </div>
                            <div>
                                <label class="block text-sm font-medium mb-2">Số lượng khách</label>
                                <div class="space-y-4">
                                    <div class="flex items-center justify-between">
                                        <span class="text-sm">Người lớn (>6 tuổi)</span>
                                        <div class="flex items-center">
                                            <button type="button"
                                                class="w-8 h-8 border border-gray-300 rounded-l-lg flex items-center justify-center hover:bg-gray-50 transition-colors decrease-adult">
                                                <i class="ri-subtract-line"></i>
                                            </button>
                                            <input type="number" value="1" min="1"
                                                class="w-12 h-8 border-y border-gray-300 text-center text-sm focus:outline-none adult-count"
                                                readonly>
                                            <button type="button"
                                                class="w-8 h-8 border border-gray-300 rounded-r-lg flex items-center justify-center hover:bg-gray-50 transition-colors increase-adult">
                                                <i class="ri-add-line"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="flex items-center justify-between">
                                        <span class="text-sm">Trẻ em (6)</span>
                                        <div class="flex items-center">
                                            <button type="button"
                                                class="w-8 h-8 border border-gray-300 rounded-l-lg flex items-center justify-center hover:bg-gray-50 transition-colors decrease-child">
                                                <i class="ri-subtract-line"></i>
                                            </button>
                                            <input type="number" value="0" min="0"
                                                class="w-12 h-8 border-y border-gray-300 text-center text-sm focus:outline-none child-count"
                                                readonly>
                                            <button type="button"
                                                class="w-8 h-8 border border-gray-300 rounded-r-lg flex items-center justify-center hover:bg-gray-50 transition-colors increase-child">
                                                <i class="ri-add-line"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <label class="block text-sm font-medium mb-2">Ghi chú</label>
                                <textarea
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-primary text-sm h-24 resize-none"
                                    placeholder="Nhập yêu cầu đặc biệt (nếu có)"></textarea>
                            </div>
                            <div class="border-t pt-6">
                                <div class="flex items-center justify-between mb-2">
                                    <span class="text-sm">Người lớn (4.999.000đ x 1)</span>
                                    <span class="font-medium">4.999.000đ</span>
                                </div>
                                <div class="flex items-center justify-between mb-2">
                                    <span class="text-sm">Trẻ em (2.499.000đ x 0)</span>
                                    <span class="font-medium">0đ</span>
                                </div>
                                <div class="flex items-center justify-between border-t pt-4">
                                    <span class="font-medium">Tổng tiền</span>
                                    <span class="text-xl font-bold text-primary">4.999.000đ</span>
                                </div>
                            </div>
                            <div class="space-y-4">
                                <label class="flex items-center gap-3 cursor-pointer">
                                    <div class="relative">
                                        <input type="checkbox" required class="sr-only terms-checkbox">
                                        <div
                                            class="w-4 h-4 border-2 border-gray-300 rounded flex items-center justify-center">
                                            <i class="ri-check-line text-primary text-xs hidden"></i>
                                        </div>
                                    </div>
                                    <span class="text-sm">Tôi đồng ý với <a href="#"
                                            class="text-primary hover:underline">điều khoản</a> và <a href="#"
                                            class="text-primary hover:underline">điều kiện</a> đặt tour</span>
                                </label>
                                <button type="submit"
                                    class="w-full bg-primary text-white py-3 !rounded-button font-medium hover:bg-primary/90 transition-colors whitespace-nowrap">
                                    Xác nhận đặt tour
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <section class="py-8 bg-gray-50">
        <div class="max-w-7xl mx-auto px-4">
            <h2 class="text-2xl font-semibold mb-8">Tour liên quan</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <div class="bg-white rounded-lg shadow-sm overflow-hidden">
                    <div class="relative h-48">
                        <img src="https://readdy.ai/api/search-image?query=Stunning%20Ha%20Long%20Bay%20at%20sunset%2C%20limestone%20karsts%20rising%20from%20emerald%20waters%2C%20traditional%20wooden%20boats%2C%20dramatic%20sky%2C%20UNESCO%20world%20heritage%20site%2C%20professional%20travel%20photography&width=600&height=400&seq=related1&orientation=landscape"
                            alt="Tour Hạ Long" class="w-full h-full object-cover">
                        <div class="absolute top-4 right-4 bg-black/50 text-white px-3 py-1 rounded-full text-sm">2N1Đ
                        </div>
                    </div>
                    <div class="p-4">
                        <h3 class="font-medium mb-2">Tour Vịnh Hạ Long - Hang Sửng Sốt</h3>
                        <div class="flex items-center gap-2 text-sm text-gray-600 mb-3">
                            <i class="ri-map-pin-line"></i>
                            <span>Khởi hành từ Hà Nội</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="text-primary font-bold">2.499.000đ</span>
                            <button
                                class="px-4 py-2 bg-primary/10 text-primary !rounded-button hover:bg-primary/20 transition-colors whitespace-nowrap">Xem
                                chi tiết</button>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-lg shadow-sm overflow-hidden">
                    <div class="relative h-48">
                        <img src="https://readdy.ai/api/search-image?query=Majestic%20Sapa%20rice%20terraces%20in%20golden%20light%2C%20ethnic%20minority%20villages%2C%20misty%20mountains%2C%20lush%20green%20landscape%2C%20northern%20Vietnam%20highlands%2C%20travel%20destination&width=600&height=400&seq=related2&orientation=landscape"
                            alt="Tour Sapa" class="w-full h-full object-cover">
                        <div class="absolute top-4 right-4 bg-black/50 text-white px-3 py-1 rounded-full text-sm">3N2Đ
                        </div>
                    </div>
                    <div class="p-4">
                        <h3 class="font-medium mb-2">Tour Sapa - Fansipan - Bản Cát Cát</h3>
                        <div class="flex items-center gap-2 text-sm text-gray-600 mb-3">
                            <i class="ri-map-pin-line"></i>
                            <span>Khởi hành từ Hà Nội</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="text-primary font-bold">3.999.000đ</span>
                            <button
                                class="px-4 py-2 bg-primary/10 text-primary !rounded-button hover:bg-primary/20 transition-colors whitespace-nowrap">Xem
                                chi tiết</button>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-lg shadow-sm overflow-hidden">
                    <div class="relative h-48">
                        <img src="https://readdy.ai/api/search-image?query=Mekong%20Delta%20scenic%20waterway%2C%20traditional%20floating%20market%2C%20fruit%20orchards%2C%20local%20life%2C%20vibrant%20culture%2C%20authentic%20Vietnamese%20scene%2C%20professional%20photography&width=600&height=400&seq=related3&orientation=landscape"
                            alt="Tour Miền Tây" class="w-full h-full object-cover">
                        <div class="absolute top-4 right-4 bg-black/50 text-white px-3 py-1 rounded-full text-sm">2N1Đ
                        </div>
                    </div>
                    <div class="p-4">
                        <h3 class="font-medium mb-2">Tour Miền Tây - Cần Thơ - Chợ Nổi</h3>
                        <div class="flex items-center gap-2 text-sm text-gray-600 mb-3">
                            <i class="ri-map-pin-line"></i>
                            <span>Khởi hành từ TP. HCM</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="text-primary font-bold">1.999.000đ</span>
                            <button
                                class="px-4 py-2 bg-primary/10 text-primary !rounded-button hover:bg-primary/20 transition-colors whitespace-nowrap">Xem
                                chi tiết</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php
    include ("../includes/footer_child.php");
    include ("../includes/cta.php");
    ?>
    <style>
        .gallery-item {
            border: 2px solid transparent;
            transition: all 0.3s ease;
        }

        .gallery-item.active {
            border-color: #e91e63;
        }
    </style>
    <script id="formControls">
        document.addEventListener('DOMContentLoaded', function () {
            const mainImage = document.querySelector('.main-image');
            const galleryItems = document.querySelectorAll('.gallery-item');
            const departureDate = document.querySelector('.departure-date');
            const today = new Date();
            const formattedDate = today.toISOString().split('T')[0];
            departureDate.setAttribute('min', formattedDate);
            galleryItems.forEach(item => {
                item.addEventListener('click', function () {
                    const newSrc = this.querySelector('img').src;
                    mainImage.src = newSrc;
                    galleryItems.forEach(item => item.classList.remove('active'));
                    this.classList.add('active');
                });
            });
            const form = document.getElementById('bookingForm');
            const adultCount = document.querySelector('.adult-count');
            const childCount = document.querySelector('.child-count');
            let selectedHotelPrice = 0;
            document.querySelectorAll('.hotel-option').forEach(hotel => {
                hotel.addEventListener('click', function () {
                    document.querySelectorAll('.hotel-option').forEach(h => h.classList.remove('border-primary'));
                    this.classList.add('border-primary');
                    selectedHotelPrice = parseInt(this.dataset.price);
                    updateTotal();
                });
            });
            document.querySelector('.decrease-adult').addEventListener('click', () => {
                const value = parseInt(adultCount.value);
                if (value > 1) {
                    adultCount.value = value - 1;
                    updateTotal();
                }
            });
            document.querySelector('.increase-adult').addEventListener('click', () => {
                const value = parseInt(adultCount.value);
                if (value < 10) {
                    adultCount.value = value + 1;
                    updateTotal();
                }
            });
            document.querySelector('.decrease-child').addEventListener('click', () => {
                const value = parseInt(childCount.value);
                if (value > 0) {
                    childCount.value = value - 1;
                    updateTotal();
                }
            });
            document.querySelector('.increase-child').addEventListener('click', () => {
                const value = parseInt(childCount.value);
                if (value < 10) {
                    childCount.value = value + 1;
                    updateTotal();
                }
            });
            function updateTotal() {
                const adultPrice = 4999000;
                const childPrice = 2499000;
                const total = (parseInt(adultCount.value) * adultPrice) + (parseInt(childCount.value) * childPrice);
                const formattedTotal = new Intl.NumberFormat('vi-VN').format(total) + 'đ';
                document.querySelector('.text-xl.font-bold.text-primary').textContent = formattedTotal;
            }
            const termsCheckbox = document.querySelector('.terms-checkbox');
            termsCheckbox.addEventListener('change', function () {
                const checkmark = this.closest('label').querySelector('i');
                if (this.checked) {
                    checkmark.classList.remove('hidden');
                } else {
                    checkmark.classList.add('hidden');
                }
            });
            form.addEventListener('submit', function (e) {
                e.preventDefault();
                alert('Đặt tour thành công! Chúng tôi sẽ liên hệ với bạn sớm nhất.');
            });
        });
    </script>
</body>

</html>