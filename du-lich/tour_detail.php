<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đặt Tour Du Lịch - <?php echo htmlspecialchars($tour['title']); ?></title>
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

        .gallery-item {
            border: 2px solid transparent;
            transition: all 0.3s ease;
        }

        .gallery-item.active {
            border-color: #e91e63;
        }
    </style>
</head>

<body class="bg-white">
    <?php
        include ("../includes/header_child.php");
        include('../config/db_connection.php');
        include('../truongthanhwebkit/webkit.php');
        // Get tour ID from query parameter (e.g., ?id=1)
        $tour_id = isset($_GET['id']) ? intval($_GET['id']) : 1;
        // Fetch tour details
        $tourDetails = getTourDetails($conn, $tour_id);
        $tour = $tourDetails['tour'];
        $hotels = $tourDetails['hotels'];
        $main_image = $tourDetails['main_image'];
        $gallery_images = $tourDetails['gallery_images'];
        $itinerary_items = $tourDetails['itinerary_items'];
        $duration = $tourDetails['duration'];
        $related_tours = $tourDetails['related_tours'];
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
                <span class="text-primary font-medium"><?php echo htmlspecialchars($tour['title']); ?></span>
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
                                <img src="<?php echo htmlspecialchars($main_image); ?>" alt="<?php echo htmlspecialchars($tour['title']); ?>" class="w-full h-full object-cover object-top main-image">
                            </div>
                            <?php if (!empty($gallery_images)): ?>
                            <div class="grid grid-cols-5 gap-2 mt-2">
                                <?php foreach ($gallery_images as $index => $img): ?>
                                <div class="h-20 cursor-pointer overflow-hidden rounded-lg gallery-item<?php echo $index === 0 ? ' active' : ''; ?>">
                                    <img src="<?php echo htmlspecialchars(trim($img)); ?>" alt="Gallery <?php echo $index + 1; ?>" class="w-full h-full object-cover">
                                </div>
                                <?php endforeach; ?>
                            </div>
                            <?php endif; ?>
                        </div>
                        <div class="p-6">
                            <h2 class="text-2xl font-semibold mb-4"><?php echo htmlspecialchars($tour['title']); ?></h2>
                            <div class="flex flex-wrap gap-6 text-gray-600 mb-6">
                                <div class="flex items-center gap-2">
                                    <i class="ri-map-pin-line text-primary"></i>
                                    <span>Điểm khởi hành: <?php echo htmlspecialchars($tour['departure_location']); ?></span>
                                </div>
                                <div class="flex items-center gap-2">
                                    <i class="ri-time-line text-primary"></i>
                                    <span>Thời gian: <?php echo htmlspecialchars($duration); ?></span>
                                </div>
                                <div class="flex items-center gap-2">
                                    <i class="ri-bus-line text-primary"></i>
                                    <span>Phương tiện: <?php echo htmlspecialchars($tour['transportation']); ?></span>
                                </div>
                            </div>
                            <div class="border-t pt-6">
                                <div class="flex items-center justify-between mb-4">
                                    <h3 class="text-lg font-medium">Lịch trình tour</h3>
                                </div>
                                <div class="bg-gray-50 p-4 rounded-lg mb-6">
                                    <h4 class="font-medium mb-3">Tổng quan hành trình</h4>
                                    <div class="text-sm text-gray-600 space-y-2">
                                        <?php echo nl2br(htmlspecialchars($tour['description'])); ?>
                                    </div>
                                </div>
                                <div class="space-y-4">
                                    <?php for ($i = 0; $i < count($itinerary_items); $i += 2): ?>
                                        <div class="flex gap-4 mb-6 mx-auto">
                                            <div class="w-24 flex-shrink-0">
                                                <div class="w-8 h-8 rounded-full bg-primary/10 text-primary flex items-center justify-center font-medium">
                                                    <?php echo ($i / 2) + 1; ?>
                                                </div>
                                            </div>
                                            <div>
                                                <div class="font-medium mb-2">
                                                    <?php echo trim($itinerary_items[$i]); ?>
                                                </div>
                                                <div class="text-gray-600 text-sm">
                                                    <?php echo trim($itinerary_items[$i + 1]); ?>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endfor; ?>
                                </div>
                            </div>
                            <div class="border-t pt-6">
                                <div class="flex items-center justify-between mb-4">
                                    <h3 class="text-lg font-medium">Khách sạn tương ứng</h3>
                                </div>
                                <div class="grid grid-cols-1 gap-4 hotel-list">
                                    <?php foreach ($hotels as $hotel): ?>
                                        <div class="border rounded-lg overflow-hidden cursor-pointer hotel-option" data-hotel-id="<?php echo htmlspecialchars($hotel['hotel_id']); ?>">
                                            <div class="flex items-center p-4">
                                                <div class="w-24 h-24 rounded-lg overflow-hidden flex-shrink-0">
                                                    <img src="<?php echo htmlspecialchars($hotel['hotel_img'] ?? 'https://readdy.ai/api/search-image?query=hotel&width=400&height=400'); ?>" alt="<?php echo htmlspecialchars($hotel['hotel_name']); ?>" class="w-full h-full object-cover">
                                                </div>
                                                <div class="ml-4 flex-grow">
                                                    <div>
                                                        <h4 class="font-medium mb-2"><?php echo htmlspecialchars($hotel['hotel_name']); ?></h4>
                                                        <div class="flex items-center gap-2 text-sm text-gray-600">
                                                            <i class="ri-map-pin-line"></i>
                                                            <span><?php echo htmlspecialchars($hotel['hotel_location']); ?></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="lg:w-1/3">
                    <div class="bg-white rounded-lg shadow-sm border p-6 sticky top-4">
                        <h3 class="text-lg font-medium mb-6">Thông tin đặt tour</h3>
                        <form id="bookingForm" class="space-y-6">
                            <input type="hidden" name="hotel_id" id="hotel_id" value="">
                            <div>
                                <label class="block text-sm font-medium mb-2">Họ và tên</label>
                                <input type="text" name="full_name" required
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-primary text-sm"
                                    placeholder="Nhập họ và tên">
                            </div>
                            <div>
                                <label class="block text-sm font-medium mb-2">Số điện thoại</label>
                                <input type="tel" name="phone" required
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-primary text-sm"
                                    placeholder="Nhập số điện thoại">
                            </div>
                            <div>
                                <label class="block text-sm font-medium mb-2">Email</label>
                                <input type="email" name="email" required
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-primary text-sm"
                                    placeholder="Nhập địa chỉ email">
                            </div>
                            <div>
                                <label class="block text-sm font-medium mb-2">Ngày khởi hành</label>
                                <div class="relative">
                                    <input type="date" name="departure_date" required
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
                                            <input type="number" name="adult_quantity" value="1" min="1"
                                                class="w-12 h-8 border-y border-gray-300 text-center text-sm focus:outline-none adult-count"
                                                readonly>
                                            <button type="button"
                                                class="w-8 h-8 border border-gray-300 rounded-r-lg flex items-center justify-center hover:bg-gray-50 transition-colors increase-adult">
                                                <i class="ri-add-line"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="flex items-center justify-between">
                                        <span class="text-sm">Trẻ em (<=6 tuổi)</span>
                                        <div class="flex items-center">
                                            <button type="button"
                                                class="w-8 h-8 border border-gray-300 rounded-l-lg flex items-center justify-center hover:bg-gray-50 transition-colors decrease-child">
                                                <i class="ri-subtract-line"></i>
                                            </button>
                                            <input type="number" name="child_quantity" value="0" min="0"
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
                                <textarea name="notes"
                                    class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-primary text-sm h-24 resize-none"
                                    placeholder="Nhập yêu cầu đặc biệt (nếu có)"></textarea>
                            </div>
                            <div class="border-t pt-6">
                                <div class="flex items-center justify-between mb-2">
                                    <span class="text-sm">Người lớn (4.999.000đ x <span class="adult-count-text">1</span>)</span>
                                    <span class="font-medium adult-total">4.999.000đ</span>
                                </div>
                                <div class="flex items-center justify-between mb-2">
                                    <span class="text-sm">Trẻ em (2.499.000đ x <span class="child-count-text">0</span>)</span>
                                    <span class="font-medium child-total">0đ</span>
                                </div>
                                <div class="flex items-center justify-between border-t pt-4">
                                    <span class="font-medium">Tổng tiền</span>
                                    <span class="text-xl font-bold text-primary total-amount">4.999.000đ</span>
                                </div>
                            </div>
                            <div class="space-y-4">
                                <button type="submit"
                                    class="w-full bg-primary text-white py-3 rounded-button font-medium hover:bg-primary/90 transition-colors whitespace-nowrap">
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
                <?php foreach ($related_tours as $index => $related_tour): ?>
                    <div class="bg-white rounded-lg shadow-sm overflow-hidden">
                        <div class="relative h-48">
                            <img src="https://readdy.ai/api/search-image?query=<?php echo urlencode($related_tour['title']); ?>&width=600&height=400&seq=related<?php echo $index + 1; ?>&orientation=landscape"
                                alt="<?php echo htmlspecialchars($related_tour['title']); ?>" class="w-full h-full object-cover">
                            <div class="absolute top-4 right-4 bg-black/50 text-white px-3 py-1 rounded-full text-sm">
                                <?php echo htmlspecialchars($related_tour['duration_days'] . 'N' . $related_tour['duration_nights'] . 'Đ'); ?>
                            </div>
                        </div>
                        <div class="p-4">
                            <h3 class="font-medium mb-2"><?php echo htmlspecialchars($related_tour['title']); ?></h3>
                            <div class="flex items-center gap-2 text-sm text-gray-600 mb-3">
                                <i class="ri-map-pin-line"></i>
                                <span>Khởi hành từ <?php echo htmlspecialchars($related_tour['departure_location']); ?></span>
                            </div>
                            <div class="flex items-center justify-between">
                                <span class="text-primary font-bold"><?php echo number_format($related_tour['sale_price'], 0, ',', '.') . 'đ'; ?></span>
                                <a href="tour_detail.php?id=<?php echo htmlspecialchars($related_tour['tour_id']); ?>"
                                    class="px-4 py-2 bg-primary/10 text-primary rounded-button hover:bg-primary/20 transition-colors whitespace-nowrap">Xem chi tiết</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
                <?php if (empty($related_tours)): ?>
                    <p class="text-gray-600">Không có tour liên quan nào trong cùng khu vực.</p>
                <?php endif; ?>
            </div>
        </div>
    </section>
    <?php
    include ("../includes/footer_child.php");
    include ("../includes/cta.php");
    ?>
    <script id="formControls">
        document.addEventListener('DOMContentLoaded', function() {
            // Form handling
            const form = document.getElementById('bookingForm');
            if (!form) {
                console.error('Form with id "bookingForm" not found');
                return;
            }
            const adultCountInput = form.querySelector('.adult-count');
            const childCountInput = form.querySelector('.child-count');
            const adultCountText = form.querySelector('.adult-count-text');
            const childCountText = form.querySelector('.child-count-text');
            const adultTotal = form.querySelector('.adult-total');
            const childTotal = form.querySelector('.child-total');
            const totalAmount = form.querySelector('.total-amount');
            const departureDate = form.querySelector('.departure-date');
            const hotelIdInput = form.querySelector('#hotel_id');

            if (!adultCountInput || !childCountInput || !adultCountText || !childCountText || !adultTotal || !childTotal || !totalAmount || !departureDate || !hotelIdInput) {
                console.error('One or more form elements not found');
                return;
            }

            const adultPrice = 4999000;
            const childPrice = 2499000;

            // Set minimum date to today
            const today = new Date();
            departureDate.setAttribute('min', today.toISOString().split('T')[0]);

            function updateTotals() {
                const adults = parseInt(adultCountInput.value) || 1;
                const children = parseInt(childCountInput.value) || 0;
                const adultTotalPrice = adults * adultPrice;
                const childTotalPrice = children * childPrice;
                const total = adultTotalPrice + childTotalPrice;

                adultCountText.textContent = adults;
                childCountText.textContent = children;
                adultTotal.textContent = adultTotalPrice.toLocaleString('vi-VN') + 'đ';
                childTotal.textContent = childTotalPrice.toLocaleString('vi-VN') + 'đ';
                totalAmount.textContent = total.toLocaleString('vi-VN') + 'đ';
            }

            // Remove existing event listeners by cloning buttons
            const buttons = form.querySelectorAll('.increase-adult, .decrease-adult, .increase-child, .decrease-child');
            buttons.forEach(button => {
                const newButton = button.cloneNode(true);
                button.parentNode.replaceChild(newButton, button);
            });

            // Add event listeners for adult/child quantity buttons
            form.querySelector('.increase-adult').addEventListener('click', () => {
                const value = parseInt(adultCountInput.value) || 1;
                if (value < 10) {
                    adultCountInput.value = value + 1;
                    updateTotals();
                }
            });

            form.querySelector('.decrease-adult').addEventListener('click', () => {
                const value = parseInt(adultCountInput.value) || 1;
                if (value > 1) {
                    adultCountInput.value = value - 1;
                    updateTotals();
                }
            });

            form.querySelector('.increase-child').addEventListener('click', () => {
                const value = parseInt(childCountInput.value) || 0;
                if (value < 10) {
                    childCountInput.value = value + 1;
                    updateTotals();
                }
            });

            form.querySelector('.decrease-child').addEventListener('click', () => {
                const value = parseInt(childCountInput.value) || 0;
                if (value > 0) {
                    childCountInput.value = value - 1;
                    updateTotals();
                }
            });

            // Hotel selection
            document.querySelectorAll('.hotel-option').forEach(hotel => {
                hotel.addEventListener('click', function() {
                    document.querySelectorAll('.hotel-option').forEach(h => h.classList.remove('border-primary'));
                    this.classList.add('border-primary');
                    hotelIdInput.value = this.dataset.hotelId || '';
                    console.log('Hotel selected, ID:', hotelIdInput.value);
                    updateTotals();
                });
            });

            // Form submission
            form.addEventListener('submit', function(e) {
                e.preventDefault();
                console.log('Form submission triggered');
                console.log('FormData:', Object.fromEntries(new FormData(form)));
                if (!hotelIdInput.value) {
                    alert('Vui lòng chọn một khách sạn.');
                    console.log('No hotel selected');
                    return;
                }
                const formData = new FormData(form);
                formData.append('tour_id', <?php echo json_encode($tour_id); ?>);
                formData.append('total_amount', parseInt(adultCountInput.value) * adultPrice + parseInt(childCountInput.value) * childPrice);
                console.log('Sending FormData:', Object.fromEntries(formData));

                fetch('insert_bookings.php', {
                    method: 'POST',
                    body: formData
                })
                .then(response => {
                    console.log('Fetch response status:', response.status);
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(data => {
                    console.log('Server response:', data);
                    const formContainer = form.closest('.space-y-6');
                    const notification = document.createElement('div');
                    notification.className = `absolute bottom-4 right-4 px-6 py-3 rounded-lg shadow-lg z-50 flex items-center gap-2 ${
                        data.status === 'success' ? 'bg-green-500 text-white' : 'bg-red-500 text-white'
                    }`;
                    notification.style.transform = 'translateY(-100%)';
                    notification.style.transition = 'transform 0.3s';
                    notification.innerHTML = `
                        <i class="ri-${data.status === 'success' ? 'check-line' : 'error-warning-line'}"></i>
                        <span>${data.message}</span>
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
                    if (data.status === 'success') {
                        form.reset();
                        adultCountInput.value = 1;
                        childCountInput.value = 0;
                        hotelIdInput.value = '';
                        document.querySelectorAll('.hotel-option').forEach(h => h.classList.remove('border-primary'));
                        updateTotals();
                    }
                })
                .catch(error => {
                    console.error('Fetch error:', error);
                    const formContainer = form.closest('.space-y-6');
                    const notification = document.createElement('div');
                    notification.className = 'absolute bottom-4 right-4 bg-red-500 text-white px-6 py-3 rounded-lg shadow-lg z-50 flex items-center gap-2';
                    notification.style.transform = 'translateY(-100%)';
                    notification.style.transition = 'transform 0.3s';
                    notification.innerHTML = `
                        <i class="ri-error-warning-line"></i>
                        <span>Lỗi khi gửi yêu cầu. Vui lòng thử lại.</span>
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
                });
            });

            // Image gallery handling
            const mainImage = document.querySelector('.main-image');
            const galleryItems = document.querySelectorAll('.gallery-item');
            if (mainImage && galleryItems.length) {
                galleryItems.forEach(item => {
                    item.addEventListener('click', function() {
                        mainImage.src = this.querySelector('img').src;
                        galleryItems.forEach(i => i.classList.remove('active'));
                        this.classList.add('active');
                    });
                });
            } else {
                console.warn('Image gallery elements not found');
            }

            updateTotals();
        });
    </script>
</body>

</html>