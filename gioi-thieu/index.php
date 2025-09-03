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
    <section id="about" class="py-16 bg-gray-50">
  <div class="max-w-6xl mx-auto px-4 grid lg:grid-cols-2 gap-12 items-center">
    
    <!-- Ảnh minh họa -->
    <div>
      <img src="https://readdy.ai/api/search-image?query=Professional%20travel%20agency%20office%20with%20modern%20design%2C%20travel%20posters%2C%20world%20map%2C%20clean%20workspace%2C%20corporate%20environment&width=600&height=400&seq=history&orientation=landscape"
           alt="Ami Travels" 
           class="rounded-lg shadow-lg w-full h-auto object-cover">
    </div>

    <!-- Nội dung giới thiệu -->
    <div class="text-gray-700 space-y-6">
      <h2 class="text-3xl font-bold text-gray-900">Giới thiệu về Ami Travels</h2>
      <p class="text-lg leading-relaxed">
        <span class="font-semibold text-primary">Ami Travels</span> là công ty du lịch uy tín tại Việt Nam, 
        chuyên cung cấp các dịch vụ du lịch trong nước và quốc tế. Với đội ngũ nhân viên chuyên nghiệp, 
        tận tâm và am hiểu, chúng tôi mang đến cho khách hàng những hành trình trọn vẹn, an toàn và đáng nhớ.
      </p>
      <p class="text-lg leading-relaxed">
        Chúng tôi cung cấp đa dạng các chương trình du lịch từ nghỉ dưỡng, khám phá, 
        đến du lịch kết hợp hội nghị – sự kiện. Ami Travels luôn chú trọng cá nhân hóa trải nghiệm, 
        để mỗi chuyến đi đều trở thành một kỷ niệm khó quên.
      </p>
      <p class="text-lg leading-relaxed">
        Với khát vọng phát triển bền vững, Ami Travels không ngừng mở rộng mạng lưới đối tác trong và ngoài nước, 
        ứng dụng công nghệ hiện đại để nâng cao chất lượng dịch vụ, trở thành người bạn đồng hành tin cậy 
        của hàng triệu du khách.
      </p>
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