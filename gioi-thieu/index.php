<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giới thiệu - Du Lịch Việt</title>
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
    </style>
</head>

<body>
    <?php
        include ("../includes/header_child.php");
    ?>
    <div class="relative h-[400px]">
        <img src="https://readdy.ai/api/search-image?query=Modern%20luxury%20office%20interior%20with%20glass%20walls%2C%20contemporary%20furniture%2C%20open%20workspace%2C%20natural%20light%2C%20professional%20corporate%20environment%2C%20clean%20minimal%20design&width=1920&height=400&seq=office&orientation=landscape"
            alt="Office" class="w-full h-full object-cover">
        <div class="absolute inset-0 bg-black/50"></div>
        <div class="absolute inset-0 flex items-center justify-center">
            <h1 class="text-4xl md:text-5xl font-bold text-white">GIỚI THIỆU</h1>
        </div>
    </div>
    <div class="bg-gray-50 py-4">
        <div class="max-w-6xl mx-auto px-4">
            <div class="flex items-center gap-2 text-sm text-gray-600">
                <a href="../index.php" class="hover:text-primary">Trang chủ</a>
                <i class="ri-arrow-right-s-line"></i>
                <a href="./index.php" class="hover:text-primary">Giới thiệu</a>
            </div>
        </div>
    </div>
    <section id="history" class="py-16">
        <div class="max-w-6xl mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-12">Lịch sử phát triển</h2>
            <div class="grid lg:grid-cols-2 gap-8 items-center">
                <img src="https://readdy.ai/api/search-image?query=Professional%20travel%20agency%20office%20with%20modern%20design%2C%20travel%20posters%2C%20world%20map%2C%20clean%20workspace%2C%20corporate%20environment&width=600&height=400&seq=history&orientation=landscape"
                    alt="History" class="rounded-lg shadow-lg">
                <div class="space-y-8">
                    <div class="flex gap-4">
                        <div
                            class="w-16 h-16 flex-shrink-0 bg-primary text-white rounded-full flex items-center justify-center font-bold">
                            2010</div>
                        <div>
                            <h3 class="font-semibold mb-2">Thành lập công ty</h3>
                            <p class="text-gray-600">Khởi đầu với văn phòng đầu tiên tại TP.HCM, chuyên cung cấp dịch vụ
                                du lịch trong nước.</p>
                        </div>
                    </div>
                    <div class="flex gap-4">
                        <div
                            class="w-16 h-16 flex-shrink-0 bg-primary text-white rounded-full flex items-center justify-center font-bold">
                            2015</div>
                        <div>
                            <h3 class="font-semibold mb-2">Mở rộng thị trường</h3>
                            <p class="text-gray-600">Phát triển mạng lưới chi nhánh toàn quốc và bắt đầu cung cấp dịch
                                vụ du lịch quốc tế.</p>
                        </div>
                    </div>
                    <div class="flex gap-4">
                        <div
                            class="w-16 h-16 flex-shrink-0 bg-primary text-white rounded-full flex items-center justify-center font-bold">
                            2020</div>
                        <div>
                            <h3 class="font-semibold mb-2">Chuyển đổi số</h3>
                            <p class="text-gray-600">Đầu tư mạnh mẽ vào công nghệ, ra mắt nền tảng đặt tour trực tuyến.
                            </p>
                        </div>
                    </div>
                    <div class="flex gap-4">
                        <div
                            class="w-16 h-16 flex-shrink-0 bg-primary text-white rounded-full flex items-center justify-center font-bold">
                            2025</div>
                        <div>
                            <h3 class="font-semibold mb-2">Phát triển bền vững</h3>
                            <p class="text-gray-600">Trở thành một trong những công ty du lịch hàng đầu Việt Nam với hơn
                                50 chi nhánh.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="vision" class="py-16 bg-gray-50">
        <div class="max-w-6xl mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-12">Tầm nhìn & Sứ mệnh</h2>
            <div class="grid md:grid-cols-2 gap-8">
                <div class="bg-white p-8 rounded-lg shadow-lg">
                    <div class="w-16 h-16 bg-primary/10 rounded-full flex items-center justify-center mb-6 mx-auto">
                        <i class="ri-eye-line text-primary text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-center mb-4">Tầm nhìn</h3>
                    <p class="text-gray-600 text-center">Trở thành công ty du lịch hàng đầu Đông Nam Á, mang đến những
                        trải nghiệm du lịch độc đáo và chất lượng cho khách hàng trong và ngoài nước.</p>
                </div>
                <div class="bg-white p-8 rounded-lg shadow-lg">
                    <div class="w-16 h-16 bg-primary/10 rounded-full flex items-center justify-center mb-6 mx-auto">
                        <i class="ri-flag-line text-primary text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-center mb-4">Sứ mệnh</h3>
                    <p class="text-gray-600 text-center">Không ngừng sáng tạo và phát triển để mang đến những dịch vụ du
                        lịch chất lượng cao, góp phần quảng bá hình ảnh du lịch Việt Nam ra thế giới.</p>
                </div>
            </div>
        </div>
    </section>
    <section id="values" class="py-16">
        <div class="max-w-6xl mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-12">Giá trị cốt lõi</h2>
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
                <div
                    class="bg-white p-6 rounded-lg shadow-lg text-center group hover:bg-primary transition-colors duration-300">
                    <div
                        class="w-16 h-16 bg-primary/10 rounded-full flex items-center justify-center mb-6 mx-auto group-hover:bg-white/10">
                        <i class="ri-heart-line text-primary text-2xl group-hover:text-white"></i>
                    </div>
                    <h3 class="font-bold mb-4 group-hover:text-white">Tận tâm</h3>
                    <p class="text-gray-600 group-hover:text-white/90">Luôn đặt lợi ích và trải nghiệm của khách hàng
                        lên hàng đầu</p>
                </div>
                <div
                    class="bg-white p-6 rounded-lg shadow-lg text-center group hover:bg-primary transition-colors duration-300">
                    <div
                        class="w-16 h-16 bg-primary/10 rounded-full flex items-center justify-center mb-6 mx-auto group-hover:bg-white/10">
                        <i class="ri-shield-check-line text-primary text-2xl group-hover:text-white"></i>
                    </div>
                    <h3 class="font-bold mb-4 group-hover:text-white">Uy tín</h3>
                    <p class="text-gray-600 group-hover:text-white/90">Cam kết chất lượng dịch vụ và giữ vững niềm tin
                        của khách hàng</p>
                </div>
                <div
                    class="bg-white p-6 rounded-lg shadow-lg text-center group hover:bg-primary transition-colors duration-300">
                    <div
                        class="w-16 h-16 bg-primary/10 rounded-full flex items-center justify-center mb-6 mx-auto group-hover:bg-white/10">
                        <i class="ri-lightbulb-line text-primary text-2xl group-hover:text-white"></i>
                    </div>
                    <h3 class="font-bold mb-4 group-hover:text-white">Sáng tạo</h3>
                    <p class="text-gray-600 group-hover:text-white/90">Không ngừng đổi mới và phát triển sản phẩm dịch
                        vụ</p>
                </div>
                <div
                    class="bg-white p-6 rounded-lg shadow-lg text-center group hover:bg-primary transition-colors duration-300">
                    <div
                        class="w-16 h-16 bg-primary/10 rounded-full flex items-center justify-center mb-6 mx-auto group-hover:bg-white/10">
                        <i class="ri-team-line text-primary text-2xl group-hover:text-white"></i>
                    </div>
                    <h3 class="font-bold mb-4 group-hover:text-white">Đồng đội</h3>
                    <p class="text-gray-600 group-hover:text-white/90">Xây dựng môi trường làm việc chuyên nghiệp và gắn
                        kết</p>
                </div>
            </div>
        </div>
    </section>

    <section id="achievements" class="py-16">
        <div class="max-w-6xl mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-12">Thành tựu đạt được</h2>
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
                <div class="bg-white p-6 rounded-lg shadow-lg text-center">
                    <div class="text-4xl font-bold text-primary mb-2" id="counter1">500,000+</div>
                    <p class="text-gray-600">Khách hàng tin tưởng</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-lg text-center">
                    <div class="text-4xl font-bold text-primary mb-2" id="counter2">1,000+</div>
                    <p class="text-gray-600">Tour du lịch đã tổ chức</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-lg text-center">
                    <div class="text-4xl font-bold text-primary mb-2" id="counter3">50+</div>
                    <p class="text-gray-600">Chi nhánh toàn quốc</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-lg text-center">
                    <div class="text-4xl font-bold text-primary mb-2" id="counter4">98%</div>
                    <p class="text-gray-600">Khách hàng hài lòng</p>
                </div>
            </div>
        </div>
    </section>
    <section id="certificates" class="py-16 bg-gray-50">
        <div class="max-w-6xl mx-auto px-4">
            <h2 class="text-3xl font-bold text-center mb-12">Chứng nhận & Giải thưởng</h2>
            <div class="grid md:grid-cols-3 gap-8">
                <div class="bg-white p-6 rounded-lg shadow-lg text-center">
                    <div class="w-20 h-20 bg-primary/10 rounded-full flex items-center justify-center mb-6 mx-auto">
                        <i class="ri-award-line text-primary text-3xl"></i>
                    </div>
                    <h3 class="font-bold text-lg mb-2">Top 10 Công ty Du lịch</h3>
                    <p class="text-gray-600">Được bình chọn bởi Hiệp hội Du lịch Việt Nam năm 2025</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-lg text-center">
                    <div class="w-20 h-20 bg-primary/10 rounded-full flex items-center justify-center mb-6 mx-auto">
                        <i class="ri-medal-line text-primary text-3xl"></i>
                    </div>
                    <h3 class="font-bold text-lg mb-2">Chứng nhận ISO 9001:2015</h3>
                    <p class="text-gray-600">Hệ thống quản lý chất lượng đạt chuẩn quốc tế</p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-lg text-center">
                    <div class="w-20 h-20 bg-primary/10 rounded-full flex items-center justify-center mb-6 mx-auto">
                        <i class="ri-trophy-line text-primary text-3xl"></i>
                    </div>
                    <h3 class="font-bold text-lg mb-2">Thương hiệu uy tín</h3>
                    <p class="text-gray-600">Top 3 công ty lữ hành được yêu thích nhất 2024</p>
                </div>
            </div>
        </div>
    </section>
    <?php
    include ("../includes/footer_child.php");
    include ("../includes/cta.php");
    ?>
    <script id="navigation">
        document.addEventListener('DOMContentLoaded', function () {
            const sections = document.querySelectorAll('section[id]');
            const navLinks = document.querySelectorAll('nav a[href^="#"]');
            function highlightNavigation() {
                const scrollPos = window.scrollY + 100;
                sections.forEach(section => {
                    const sectionTop = section.offsetTop;
                    const sectionHeight = section.offsetHeight;
                    const sectionId = section.getAttribute('id');
                    if (scrollPos >= sectionTop && scrollPos < sectionTop + sectionHeight) {
                        navLinks.forEach(link => {
                            link.classList.remove('text-primary');
                            if (link.getAttribute('href') === '#' + sectionId) {
                                link.classList.add('text-primary');
                            }
                        });
                    }
                });
            }
            window.addEventListener('scroll', highlightNavigation);
            highlightNavigation();
            navLinks.forEach(link => {
                link.addEventListener('click', function (e) {
                    e.preventDefault();
                    const targetId = this.getAttribute('href');
                    const targetSection = document.querySelector(targetId);
                    targetSection.scrollIntoView({ behavior: 'smooth' });
                });
            });
        });
    </script>
    <script id="scrollAnimation">
        document.addEventListener('DOMContentLoaded', function () {
            const counters = document.querySelectorAll('[id^="counter"]');
            let hasAnimated = false;
            function animateCounters() {
                counters.forEach(counter => {
                    const target = counter.textContent;
                    const targetNum = parseInt(target.replace(/\D/g, ''));
                    let count = 0;
                    const duration = 2000;
                    const increment = targetNum / (duration / 16);
                    function updateCount() {
                        count += increment;
                        if (count < targetNum) {
                            counter.textContent = Math.round(count).toLocaleString() + (target.includes('+') ? '+' : '%');
                            requestAnimationFrame(updateCount);
                        } else {
                            counter.textContent = target;
                        }
                    }
                    updateCount();
                });
            }
            function checkScroll() {
                const triggerBottom = window.innerHeight * 0.8;
                const achievementsSection = document.getElementById('achievements');
                const sectionTop = achievementsSection.getBoundingClientRect().top;
                if (sectionTop < triggerBottom && !hasAnimated) {
                    hasAnimated = true;
                    animateCounters();
                }
            }
            window.addEventListener('scroll', checkScroll);
            checkScroll();
        });
    </script>
</body>

</html>