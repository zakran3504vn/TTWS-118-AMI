<!DOCTYPE html>
<html lang="vi">
<!-- hello again-->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liên Hệ - Du Lịch Việt</title>
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

<body class="bg-white">
    <?php
        include ("../includes/header_child.php");
    ?>
    <div class="bg-gradient-to-r from-primary/90 to-primary text-white py-16">
        <div class="max-w-6xl mx-auto px-4 text-center">
            <h1 class="text-4xl font-bold mb-4">Liên Hệ Với Chúng Tôi</h1>
            <p class="text-xl opacity-90">Để Được Tư Vấn Miễn Phí</p>
        </div>
    </div>
    <div class="bg-gray-50 py-4">
        <div class="max-w-6xl mx-auto px-4">
            <div class="flex items-center gap-2 text-sm text-gray-600">
                <a href="../index.php" class="hover:text-primary">Trang chủ</a>
                <i class="ri-arrow-right-s-line"></i>
                <span class="text-primary">Liên hệ</span>
            </div>
        </div>
    </div>
    <section class="py-12">
        <div class="max-w-6xl mx-auto px-4">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
                <div>
                    <h1 class="text-3xl font-bold mb-8">Thông Tin Liên Hệ</h1>
                    <div class="space-y-8">
                        <div>
                            <h3 class="font-semibold text-lg mb-4">Văn phòng tại Việt Nam</h3>
                            <div class="space-y-3">
                                <div class="flex items-start gap-3">
                                    <div class="w-5 h-5 flex-shrink-0 flex items-center justify-center mt-1">
                                        <i class="ri-map-pin-line text-primary"></i>
                                    </div>
                                    <p class="text-gray-600">Số 2 Ngõ 1 Phố Phùng Chí Kiên, Phường Nghĩa Đô, TP Hà Nội</p>
                                </div>
                                <div class="flex items-start gap-3">
                                    <div class="w-5 h-5 flex-shrink-0 flex items-center justify-center mt-1">
                                        <i class="ri-phone-line text-primary"></i>
                                    </div>
                                    <div>
                                        <p class="text-gray-600">Hotline: 1900 1177</p>
                                    </div>
                                </div>
                                <div class="flex items-start gap-3">
                                    <div class="w-5 h-5 flex-shrink-0 flex items-center justify-center mt-1">
                                        <i class="ri-mail-line text-primary"></i>
                                    </div>
                                    <p class="text-gray-600">Email: amitravels589@gmail.com</p>
                                </div>
                            </div>
                        </div>
                        <div>
                            <h3 class="font-semibold text-lg mb-4">Văn phòng tại Australia</h3>
                            <div class="space-y-3">
                                <div class="flex items-start gap-3">
                                    <div class="w-5 h-5 flex-shrink-0 flex items-center justify-center mt-1">
                                        <i class="ri-map-pin-line text-primary"></i>
                                    </div>
                                    <p class="text-gray-600"> 4 Meredith St, Broadmeadows VIC 3047/p>
                                </div>
                                <div class="flex items-start gap-3">
                                    <div class="w-5 h-5 flex-shrink-0 flex items-center justify-center mt-1">
                                        <i class="ri-phone-line text-primary"></i>
                                    </div>
                                    <div>
                                        <p class="text-gray-600">Hotline: </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <h3 class="font-semibold text-lg mb-4">Giờ làm việc</h3>
                            <div class="space-y-3">
                                <div class="flex items-start gap-3">
                                    <div class="w-5 h-5 flex-shrink-0 flex items-center justify-center mt-1">
                                        <i class="ri-time-line text-primary"></i>
                                    </div>
                                    <div>
                                        <p class="text-gray-600">Thứ 2 - Thứ 6: 8:00 - 17:30</p>
                                        <p class="text-gray-600">Thứ 7: 8:00 - 12:00</p>
                                        <p class="text-gray-600">Chủ nhật: Nghỉ</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <h3 class="font-semibold text-lg mb-4">Kết nối với chúng tôi</h3>
                            <div class="flex gap-4">
                                <a href="#"
                                    class="w-10 h-10 flex items-center justify-center bg-[#1877f2] text-white rounded-full hover:opacity-90 transition-opacity">
                                    <i class="ri-facebook-fill"></i>
                                </a>
                                <a href="#"
                                    class="w-10 h-10 flex items-center justify-center bg-[#1da1f2] text-white rounded-full hover:opacity-90 transition-opacity">
                                    <i class="ri-twitter-fill"></i>
                                </a>
                                <a href="#"
                                    class="w-10 h-10 flex items-center justify-center bg-[#ff0000] text-white rounded-full hover:opacity-90 transition-opacity">
                                    <i class="ri-youtube-fill"></i>
                                </a>
                                <a href="#"
                                    class="w-10 h-10 flex items-center justify-center bg-[#c32aa3] text-white rounded-full hover:opacity-90 transition-opacity">
                                    <i class="ri-instagram-line"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="bg-white rounded-xl shadow-lg p-8 relative overflow-hidden">
                        <div class="absolute top-0 right-0 w-40 h-40 bg-primary/5 rounded-full -mr-20 -mt-20"></div>
                        <div class="absolute bottom-0 left-0 w-32 h-32 bg-primary/5 rounded-full -ml-16 -mb-16"></div>
                        <h2 class="text-2xl font-bold mb-2">Gửi Tin Nhắn</h2>
                        <p class="text-gray-500 mb-8">Hãy để lại thông tin, chúng tôi sẽ liên hệ với bạn sớm nhất</p>
                        <form class="space-y-6 relative" id="contactForm">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div class="relative">
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Họ và tên *</label>
                                    <div class="relative">
                                        <i class="ri-user-line absolute left-4 top-1/2 -translate-y-1/2 text-gray-400"></i>
                                        <input type="text" name="full_name" placeholder="Nhập họ và tên của bạn"
                                            class="w-full pl-11 pr-4 py-3 bg-gray-50 border-none rounded-lg focus:outline-none focus:ring-2 focus:ring-primary/20 transition-all"
                                            required>
                                    </div>
                                </div>
                                <div class="relative">
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Số điện thoại *</label>
                                    <div class="relative">
                                        <i class="ri-phone-line absolute left-4 top-1/2 -translate-y-1/2 text-gray-400"></i>
                                        <input type="tel" name="phone" placeholder="Nhập số điện thoại của bạn"
                                            class="w-full pl-11 pr-4 py-3 bg-gray-50 border-none rounded-lg focus:outline-none focus:ring-2 focus:ring-primary/20 transition-all"
                                            required>
                                    </div>
                                </div>
                            </div>
                            <div class="relative">
                                <label class="block text-sm font-medium text-gray-700 mb-2">Email *</label>
                                <div class="relative">
                                    <i class="ri-mail-line absolute left-4 top-1/2 -translate-y-1/2 text-gray-400"></i>
                                    <input type="email" name="email" placeholder="Nhập địa chỉ email của bạn"
                                        class="w-full pl-11 pr-4 py-3 bg-gray-50 border-none rounded-lg focus:outline-none focus:ring-2 focus:ring-primary/20 transition-all"
                                        required>
                                </div>
                            </div>
                            <div class="relative">
                                <label class="block text-sm font-medium text-gray-700 mb-2">Chủ đề</label>
                                <div class="relative">
                                    <i class="ri-chat-1-line absolute left-4 top-1/2 -translate-y-1/2 text-gray-400"></i>
                                    <select name="subject"
                                        class="w-full pl-11 pr-4 py-3 bg-gray-50 border-none rounded-lg focus:outline-none focus:ring-2 focus:ring-primary/20 transition-all appearance-none">
                                        <option>Tư vấn tour du lịch</option>
                                        <option>Đặt vé máy bay</option>
                                        <option>Đặt phòng khách sạn</option>
                                        <option>Dịch vụ visa</option>
                                        <option>Khác</option>
                                    </select>
                                    <i class="ri-arrow-down-s-line absolute right-4 top-1/2 -translate-y-1/2 text-gray-400"></i>
                                </div>
                            </div>
                            <div class="relative">
                                <label class="block text-sm font-medium text-gray-700 mb-2">Nội dung tin nhắn *</label>
                                <div class="relative">
                                    <i class="ri-message-2-line absolute left-4 top-4 text-gray-400"></i>
                                    <textarea name="message" rows="4" placeholder="Nhập nội dung tin nhắn của bạn"
                                        class="w-full pl-11 pr-4 py-3 bg-gray-50 border-none rounded-lg focus:outline-none focus:ring-2 focus:ring-primary/20 transition-all resize-none"
                                        required></textarea>
                                </div>
                            </div>
                            <button type="submit"
                                class="w-full bg-primary text-white py-4 !rounded-button font-semibold hover:bg-primary/90 transition-all duration-300 transform hover:scale-[1.02] active:scale-[0.98] flex items-center justify-center gap-2 whitespace-nowrap">
                                <span>Gửi Tin Nhắn</span>
                                <i class="ri-send-plane-line"></i>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="py-12 bg-gray-50">
        <div class="max-w-6xl mx-auto px-4">
            <h2 class="text-2xl font-bold mb-8">Vị Trí Của Chúng Tôi</h2>
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <div>
                    <h3 class="text-xl font-semibold mb-4">Văn Phòng Tại Việt Nam</h3>
                    <div class="w-full h-[400px] rounded-xl overflow-hidden bg-center bg-cover">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3723.725507613172!2d105.80063857597719!3d21.04366638726503!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ab3da85a1f15%3A0x54cbd13eb6171cd8!2zMiBOZy4gMSBQaOG7kSBQaMO5bmcgQ2jDrSBLacOqbiwgTmdoxKlhIMSQw7QsIEPhuqd1IEdp4bqleSwgSMOgIE7hu5lpLCBWaeG7h3QgTmFt!5e0!3m2!1svi!2s!4v1756256428633!5m2!1svi!2s" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                    <div class="mt-4">
                        <p class="text-gray-600"><i class="ri-map-pin-line text-primary"></i> Số 2 Ngõ 1 Phố Phùng Chí Kiên, Phường Nghĩa Đô, TP Hà Nội</p>
                    </div>
                </div>
                <div>
                    <h3 class="text-xl font-semibold mb-4">Văn Phòng Tại Australia</h3>
                    <div class="w-full h-[400px] rounded-xl overflow-hidden bg-center bg-cover">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3157.213414128355!2d144.92225567671122!3d-37.69118672704392!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6ad65af3cf3353bb%3A0xeb7a564ee996fe27!2s4%20Meredith%20St%2C%20Broadmeadows%20VIC%203047%2C%20%C3%9Ac!5e0!3m2!1svi!2s!4v1756256488834!5m2!1svi!2s" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                    <div class="mt-4">
                        <p class="text-gray-600"><i class="ri-map-pin-line text-primary"></i>  4 Meredith St, Broadmeadows VIC 3047</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php
    include ("../includes/footer_child.php");
    include ("../includes/cta.php");
    ?>
<script id="contactForm">
    document.addEventListener('DOMContentLoaded', function () {
        const form = document.getElementById('contactForm');
        form.addEventListener('submit', function (e) {
            e.preventDefault();
            const formData = new FormData(form);
            fetch('insert_contact.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.text())
            .then(data => {
                // Find the closest container with relative positioning
                const formContainer = form.closest('.bg-white.rounded-xl.shadow-lg.p-8.relative');
                const notification = document.createElement('div');
                notification.className = 'absolute bottom-4 right-4 bg-green-500 text-white px-6 py-3 rounded-lg shadow-lg z-50 flex items-center gap-2';
                notification.style.transform = 'translateY(-100%)';
                notification.style.transition = 'transform 0.3s';
                notification.innerHTML = `
                    <i class="ri-checkbox-circle-line"></i>
                    <span>Cảm ơn bạn đã gửi tin nhắn! Chúng tôi sẽ phản hồi trong thời gian sớm nhất.</span>
                `;
                formContainer.appendChild(notification);
                setTimeout(() => {
                    notification.style.transform = 'translateY(0)';
                }, 100);
                setTimeout(() => {
                    notification.style.transform = 'translateY(-100%)';
                    setTimeout(() => {
                        notification.remove();
                    }, 300);
                }, 3000);
                form.reset();
            });
        });
    });
</script>
</body>

</html>