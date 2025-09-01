<!-- File: news_detail.php -->
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
    include("../includes/header_child.php");

    // Get news ID from URL
    $newsId = isset($_GET['id']) ? (int)$_GET['id'] : 0;

    // Fetch data from get_news_detail.php
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "http://$_SERVER[HTTP_HOST]" . dirname($_SERVER['PHP_SELF']) . "/get_news_detail.php?id=$newsId");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);

    $data = json_decode($response, true);

    // Check for errors
    if (isset($data['error'])) {
        echo '<div class="max-w-6xl mx-auto px-4 py-8 text-center text-red-500">'
            . htmlspecialchars($data['error']) . '</div>';
        include("../includes/footer_child.php");
        include("../includes/cta.php");
        echo '</body></html>';
        exit;
    }

    $news = $data['news'];
    $relatedNews = $data['related_news'];
    ?>

    <div class="bg-gradient-to-r from-primary/90 to-primary text-white py-16">
        <div class="max-w-6xl mx-auto px-4 text-center">
            <h1 class="text-4xl font-bold mb-4"><?php echo htmlspecialchars($news['title']); ?></h1>
            <p class="text-xl opacity-90"><?php echo htmlspecialchars($news['category']); ?></p>
        </div>
    </div>
    <div class="bg-gray-50 py-4">
        <div class="max-w-6xl mx-auto px-4">
            <div class="flex items-center gap-2 text-sm text-gray-600">
                <a href="../index.php" class="hover:text-primary">Trang chủ</a>
                <i class="ri-arrow-right-s-line"></i>
                <a href="./index.php" class="hover:text-primary">Tin tức</a>
                <i class="ri-arrow-right-s-line"></i>
                <span class="text-primary"><?php echo htmlspecialchars($news['title']); ?></span>
            </div>
        </div>
    </div>
    <main class="py-8">
        <div class="max-w-6xl mx-auto px-4">
            <div class="flex flex-col lg:flex-row gap-8">
                <div class="lg:w-3/4">
                    <article class="bg-white rounded-lg shadow-sm overflow-hidden p-6">
                        <img src="<?php echo htmlspecialchars($news['image']); ?>"
                            alt="<?php echo htmlspecialchars($news['title']); ?>"
                            class="h-auto object-cover rounded-lg mb-6">
                        <div class="flex items-center gap-6 text-sm text-gray-500 mb-6">
                            <span class="flex items-center gap-2">
                                <i class="ri-time-line"></i>
                                <?php echo $news['formatted_date']; ?>
                            </span>
                            <span class="flex items-center gap-2">
                                <i class="ri-eye-line"></i>
                                <?php echo $news['formatted_views']; ?>
                            </span>
                        </div>
                        <div class="w-full text-2xl text-black mb-8 mx-auto">
                            <h3 class="text-2xl font-semibold mb-3"><?php echo htmlspecialchars($news['title']); ?></h3>
                            <p class="text-justify"><?php echo htmlspecialchars($news['summary']); ?></p>
                            <h3 class="text-primary font-bold">Giới thiệu chi tiết</h3>
                            <p class="text-justify"><?php echo htmlspecialchars($news['summary']); ?></p>
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
                            <?php
                            if (!empty($relatedNews)) {
                                foreach ($relatedNews as $related) {
                                    echo '
                                    <a href="news_detail.php?id=' . $related['id'] . '" class="block">
                                        <img src="' . htmlspecialchars($related['image']) . '"
                                            alt="' . htmlspecialchars($related['title']) . '"
                                            class="w-full h-40 object-cover rounded-lg mb-4">
                                        <h4 class="font-semibold mb-2">' . htmlspecialchars($related['title']) . '</h4>
                                        <p class="text-sm text-gray-500">' . $related['formatted_date'] . '</p>
                                    </a>';
                                }
                            } else {
                                echo '<p class="text-gray-500">Không có bài viết liên quan.</p>';
                            }
                            ?>
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
    include("../includes/footer_child.php");
    include("../includes/cta.php");
    ?>
</body>

</html>