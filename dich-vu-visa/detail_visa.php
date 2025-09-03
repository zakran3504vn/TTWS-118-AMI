<!DOCTYPE html>
<html lang="vi">

<head>
    <meta property="og:title" content="<?php echo htmlspecialchars($news['title']); ?>">
    <meta property="og:description" content="<?php echo htmlspecialchars($news['summary']); ?>">
    <meta property="og:image" content="<?php echo htmlspecialchars($news['image']); ?>">
    <meta property="og:url" content="<?php echo $current_url; ?>">
    <meta property="og:type" content="article">
    <meta property="og:site_name" content="AMI Travels">
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
    <style>
        .news-content h1, 
        .news-content h2, 
        .news-content h3, 
        .news-content h4, 
        .news-content h5, 
        .news-content h6 {
            color: #e91e63 !important; /* Replace with your actual primary color */
            font-weight: 700;
            font-size: 1.25rem;
            margin-bottom: 1rem;
        }
        .news-content p {
        font-size: 1rem; /* 16px - standard body text */
        line-height: 1.6;
        margin-bottom: 1rem;
        }
        .news-content ul, .news-content ol {
            font-size: 1rem;
            margin-bottom: 1rem;
        }
    </style>
</head>

<body class="bg-white">
    <?php
        include ("../includes/header_child.php");
        include ("../config/db_connection.php");
        include ("../truongthanhwebkit/webkit.php");

        // Get news ID from URL
        $news_id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
        
        // Get news details
        $news = getNewsDetails($conn, $news_id);
        
        if (!$news) {
            header("Location: index.php");
            exit();
        }
        
        // Update view count
        updateNewsViews($conn, $news_id);
    ?>

    <div class="bg-gradient-to-r from-primary/90 to-primary text-white py-16">
        <div class="max-w-6xl mx-auto px-4 text-center">
            <h1 class="text-4xl font-bold mb-4"><?php echo htmlspecialchars($news['title']); ?></h1>
            <p class="text-xl opacity-90"><?php echo htmlspecialchars($news['category']); ?></p>
        </div>
    </div>
    <!-- Breadcrumb -->
    <div class="bg-gray-50 py-4">
        <div class="max-w-6xl mx-auto px-4">
            <div class="flex items-center gap-2 text-sm text-gray-600">
                <a href="../index.php" class="hover:text-primary">Trang chủ</a>
                <i class="ri-arrow-right-s-line"></i>
                <a href="./index.php" class="hover:text-primary">Dịch vụ Visa</a>
                <i class="ri-arrow-right-s-line"></i>
                <span class="text-primary"><?php echo htmlspecialchars($news['title']); ?></span>
            </div>
        </div>
    </div>
    <main class="py-8">
        <div class="max-w-6xl mx-auto px-4">
            <div class="flex flex-col lg:flex-row gap-8">
                <div class="lg:w-3/4">
                    <!-- Article content -->
                    <article class="bg-white rounded-lg shadow-sm overflow-hidden p-6">
                        <img src="<?php echo htmlspecialchars($news['image']); ?>"
                            alt="<?php echo htmlspecialchars($news['title']); ?>" 
                            class="h-auto object-cover rounded-lg mb-6">
                        <div class="flex items-center gap-6 text-sm text-gray-500 mb-6">
                            <span class="flex items-center gap-2">
                                <i class="ri-time-line"></i>
                                <?php echo date('d/m/Y', strtotime($news['created_at'])); ?>
                            </span>
                            <span class="flex items-center gap-2">
                                <i class="ri-eye-line"></i>
                                <?php echo number_format($news['views']); ?> lượt xem
                            </span>
                        </div>
                        <div class="w-full text-2xl text-black mb-8 mx-auto">
                            <div class="prose mx-auto news-content">
                                <?php echo $news['content']; ?>
                            </div>
                        </div>
                        <div class="flex items-center gap-4 mb-8">
                            <h3 class="font-semibold">Chia sẻ bài viết:</h3>
                            <?php
                                $current_url = "http" . (isset($_SERVER['HTTPS']) ? "s" : "") . "://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
                                $share_url = urlencode($current_url);
                            ?>
                            <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $share_url; ?>" 
                            target="_blank" 
                            class="w-8 h-8 flex items-center justify-center bg-blue-600 text-white rounded-full hover:bg-blue-700 transition-colors">
                                <i class="ri-facebook-fill"></i>
                            </a>
                            <a href="#" class="w-8 h-8 flex items-center justify-center bg-secondary text-white rounded-full hover:bg-secondary/90">
                                <i class="ri-twitter-fill"></i>
                            </a>
                            <a href="#" class="w-8 h-8 flex items-center justify-center bg-red-500 text-white rounded-full hover:bg-red-600">
                                <i class="ri-youtube-fill"></i>
                            </a>
                        </div>
                    </article>  
                    <div class="mt-12">
                        <h2 class="text-2xl font-bold mb-6">Bài viết liên quan</h2>
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                            <?php
                                $related_news = getRelatedNews($conn, $news['category'], $news_id, 3);
                                foreach($related_news as $related): 
                            ?>
                            <a href="detail_visa.php?id=<?php echo $related['id']; ?>" class="block">
                                <img src="<?php echo htmlspecialchars($related['image']); ?>"
                                        alt="<?php echo htmlspecialchars($related['title']); ?>" 
                                        class="w-full h-40 object-cover rounded-lg mb-4">
                                    <h4 class="font-semibold mb-2"><?php echo htmlspecialchars($related['title']); ?></h4>
                                    <p class="text-sm text-gray-500">
                                        <?php echo date('d/m/Y', strtotime($related['created_at']));?>
                                    </p>
                            </a>
                            <?php endforeach;?>
                        </div>
                    </div>
                </div>
                <div class="lg:w-1/4">
                    <div class="bg-white rounded-lg shadow-sm p-6 mb-6">
                        <h3 class="font-semibold mb-4">Bài viết nổi bật</h3>
                            <div class="flex flex-col gap-4">
                                <?php include "get_top_visa.php"; ?>
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