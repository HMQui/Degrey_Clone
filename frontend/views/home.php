<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DEGREY – DEGREY VIETNAM</title>
    <link rel="stylesheet" href="../public/assets/css/output.css">
</head>

<body>
    <div class="flex flex-col min-h-screen justify-start items-center overflow-hidden">
        <?php include_once 'views/partials/header.php'; ?>
        <main class="xl:px-56 md:px-22 px-5 pb-5 pt-[90px] h-fit flex-1">
            <!-- Slider -->
            <section class="relative overflow-hidden w-full max-w-screen-lg mx-auto group">
                <!-- Slides wrapper -->
                <div class="relative h-56 sm:h-96 lg:h-[600px] flex items-center justify-center w-full">
                    <!-- Slide 1 -->
                    <div class="absolute inset-0 transition-opacity duration-1000 opacity-0 flex items-start justify-center w-full" data-slide="0">
                        <img src="../public/assets/images/HomeSlider1.png" class="w-full object-contain" alt="Slide 1">
                    </div>

                    <!-- Slide 2 -->
                    <div class="absolute inset-0 transition-opacity duration-1000 opacity-0 flex items-start justify-center" data-slide="1">
                        <img src="../public/assets/images/HomeSlider2.png" class="w-full object-contain" alt="Slide 2">
                    </div>

                    <!-- Slide 3 -->
                    <div class="absolute inset-0 transition-opacity duration-1000 opacity-0" data-slide="2">
                        <img src="../public/assets/images/HomeSlider3.png"
                            class="w-full h-[100vh] sm:h-full object-cover"
                            alt="Slide 3">
                    </div>


                </div>


                <!-- Indicators -->
                <div class="absolute bottom-4 left-1/2 transform -translate-x-1/2 lg:flex space-x-2 z-10 hidden">
                    <button data-dot="0" class="dot w-2 h-2 rounded-full bg-gray-300 hover:bg-gray-500 transition-all duration-300"></button>
                    <button data-dot="1" class="dot w-2 h-2 rounded-full bg-gray-300 hover:bg-gray-500 transition-all duration-300"></button>
                    <button data-dot="2" class="dot w-2 h-2 rounded-full bg-gray-300 hover:bg-gray-500 transition-all duration-300"></button>

                </div>
                <!-- Nút Trái -->
                <button
                    id="prevBtn"
                    class="absolute top-1/2 left-4 transform -translate-y-1/2
         opacity-0 group-hover:opacity-100 transition-all duration-300
         bg-white text-black border border-gray-300 w-10 h-10 rounded-full
         hover:bg-black hover:text-white hover:border-black lg:flex items-center justify-center z-10 cursor-pointer hidden">
                    <i class="fa-solid fa-chevron-left text-sm"></i>
                </button>

                <!-- Nút Phải -->
                <button
                    id="nextBtn"
                    class="absolute top-1/2 right-4 transform -translate-y-1/2
         opacity-0 group-hover:opacity-100 transition-all duration-300
         bg-white text-black border border-gray-300 w-10 h-10 rounded-full
         hover:bg-black hover:text-white hover:border-black lg:flex items-center justify-center z-10 cursor-pointer hidden">
                    <i class="fa-solid fa-chevron-right text-sm"></i>
                </button>


            </section>

            <!-- Female products -->
            <section class="mt-10 flex flex-col justify-center items-center">
                <div class="flex justify-between items-center mb-4 w-full">
                    <a class="xl:text-2xl sm:text-lg font-semibold" href="index.php?pg=products&gender=female">Nữ</a>
                    <a class="xl:text-sm text-gray-600 hover:text-black" href="index.php?pg=products&gender=female">Xem tất cả</a>
                </div>

                <!-- List products (Large screen - 5 items) -->
                <div class="grid-cols-5 gap-2 lg:grid hidden">
                    <?php
                    for ($i = 0; $i < min(5, count($femaleProducts)); $i++) {
                        $product = $femaleProducts[$i];
                        $images = explode(',', $product['images']);
                        $img1 = isset($images[0]) ? $images[0] : '';
                        $img2 = isset($images[1]) ? $images[1] : $images[0];

                        $price = number_format($product['price'], 0, ',', '.');
                        $discountPrice = null;
                        if (!empty($product['discount_percent']) && $product['discount_percent'] > 0) {
                            $discountPrice = number_format($product['price'] * (1 - $product['discount_percent'] / 100), 0, ',', '.');
                        }
                        echo '
            <a href="index.php?pg=products&id=' . $product['id'] . '" class="group space-y-2 hover:shadow-xs">
                <div class="relative w-full aspect-square overflow-hidden">
                    <img src="../public/assets/images/products/' . $img1 . '"
                        alt=""
                        class="absolute inset-0 w-[362px] h-[362px] lg:w-[220px] lg:h-[220px] object-cover transition-opacity duration-300 group-hover:opacity-0" />
                    <img src="../public/assets/images/products/' . $img2 . '"
                        alt=""
                        class="absolute inset-0 w-[362px] h-[362px] lg:w-[220px] lg:h-[220px] object-cover transition-opacity duration-300 opacity-0 group-hover:opacity-100" />
                </div>
                <div class="px-2 pb-3 space-y-2">
                    <p class="text-sm leading-snug line-clamp-2">' . htmlspecialchars($product['name']) . '</p>
                    <div class="flex justify-start items-center gap-3 text-sm">';
                        if ($discountPrice) {
                            echo '<span class="font-semibold text-black">' . $discountPrice . 'đ</span>';
                            echo '<span class="line-through text-gray-400">' . $price . 'đ</span>';
                        } else {
                            echo '<span class="font-semibold text-black">' . $price . 'đ</span>';
                        }
                        echo '</div>
                </div>
            </a>';
                    }
                    ?>
                </div>

                <!-- List products (Small screen - 6 items) -->
                <div class="grid grid-cols-2 gap-3 lg:hidden">
                    <?php
                    for ($i = 0; $i < min(6, count($femaleProducts)); $i++) {
                        $product = $femaleProducts[$i];
                        $images = explode(',', $product['images']);
                        $img1 = isset($images[0]) ? $images[0] : '';
                        $img2 = isset($images[1]) ? $images[1] : $images[0];

                        $price = number_format($product['price'], 0, ',', '.');
                        $discountPrice = null;
                        if (!empty($product['discount_percent']) && $product['discount_percent'] > 0) {
                            $discountPrice = number_format($product['price'] * (1 - $product['discount_percent'] / 100), 0, ',', '.');
                        }
                        echo '
            <a href="index.php?pg=products&id=' . $product['id'] . '" class="group space-y-2 hover:shadow-xs">
                <div class="relative w-full aspect-square overflow-hidden">
                    <img src="../public/assets/images/products/' . $img1 . '"
                        alt=""
                        class="absolute inset-0 w-[362px] h-[362px] lg:w-[220px] lg:h-[220px] object-cover transition-opacity duration-300 group-hover:opacity-0" />
                    <img src="../public/assets/images/products/' . $img2 . '"
                        alt=""
                        class="absolute inset-0 w-[362px] h-[362px] lg:w-[220px] lg:h-[220px] object-cover transition-opacity duration-300 opacity-0 group-hover:opacity-100" />
                </div>
                <div class="px-2 pb-3 space-y-2">
                    <p class="text-sm leading-snug line-clamp-2">' . htmlspecialchars($product['name']) . '</p>
                    <div class="flex justify-start items-center gap-3 text-sm">';
                        if ($discountPrice) {
                            echo '<span class="font-semibold text-black">' . $discountPrice . 'đ</span>';
                            echo '<span class="line-through text-gray-400">' . $price . 'đ</span>';
                        } else {
                            echo '<span class="font-semibold text-black">' . $price . 'đ</span>';
                        }
                        echo '</div>
                </div>
            </a>';
                    }
                    ?>
                </div>

                <a class="mt-7 py-3 px-6 text-[13px] text-center bg-[#2c2c2c] w-[249px] text-white rounded-xs" href="index.php?pg=products&gender=female">
                    XEM THÊM SẢN PHẨM <strong>NỮ</strong>
                </a>
            </section>


            <!-- Male products -->
            <section class="mt-10 flex flex-col justify-center items-center">
                <div class="flex justify-between items-center mb-4 w-full">
                    <a class="xl:text-2xl sm:text-lg font-semibold" href="index.php?pg=products&gender=female">Nam</a>
                    <a class="xl:text-sm text-gray-600 hover:text-black" href="index.php?pg=products&gender=male">Xem tất cả</a>
                </div>

                <!-- List products (Large screen - 5 items) -->
                <div class="grid-cols-5 gap-2 lg:grid hidden">
                    <?php
                    for ($i = 0; $i < min(5, count($maleProducts)); $i++) {
                        $product = $maleProducts[$i];
                        $images = explode(',', $product['images']);
                        $img1 = isset($images[0]) ? $images[0] : '';
                        $img2 = isset($images[1]) ? $images[1] : $images[0];

                        $price = number_format($product['price'], 0, ',', '.');
                        $discountPrice = null;
                        if (!empty($product['discount_percent']) && $product['discount_percent'] > 0) {
                            $discountPrice = number_format($product['price'] * (1 - $product['discount_percent'] / 100), 0, ',', '.');
                        }
                        echo '
            <a href="index.php?pg=products&id=' . $product['id'] . '" class="group space-y-2 hover:shadow-xs">
                <div class="relative w-full aspect-square overflow-hidden">
                    <img src="../public/assets/images/products/' . $img1 . '"
                        alt=""
                        class="absolute inset-0 w-[362px] h-[362px] lg:w-[220px] lg:h-[220px] object-cover transition-opacity duration-300 group-hover:opacity-0" />
                    <img src="../public/assets/images/products/' . $img2 . '"
                        alt=""
                        class="absolute inset-0 w-[362px] h-[362px] lg:w-[220px] lg:h-[220px] object-cover transition-opacity duration-300 opacity-0 group-hover:opacity-100" />
                </div>
                <div class="px-2 pb-3 space-y-2">
                    <p class="text-sm leading-snug line-clamp-2">' . htmlspecialchars($product['name']) . '</p>
                    <div class="flex justify-start items-center gap-3 text-sm">';
                        if ($discountPrice) {
                            echo '<span class="font-semibold text-black">' . $discountPrice . 'đ</span>';
                            echo '<span class="line-through text-gray-400">' . $price . 'đ</span>';
                        } else {
                            echo '<span class="font-semibold text-black">' . $price . 'đ</span>';
                        }
                        echo '</div>
                </div>
            </a>';
                    }
                    ?>
                </div>

                <!-- List products (Small screen - 6 items) -->
                <div class="grid grid-cols-2 gap-3 lg:hidden">
                    <?php
                    for ($i = 0; $i < min(6, count($maleProducts)); $i++) {
                        $product = $maleProducts[$i];
                        $images = explode(',', $product['images']);
                        $img1 = isset($images[0]) ? $images[0] : '';
                        $img2 = isset($images[1]) ? $images[1] : $images[0];

                        $price = number_format($product['price'], 0, ',', '.');
                        $discountPrice = null;
                        if (!empty($product['discount_percent']) && $product['discount_percent'] > 0) {
                            $discountPrice = number_format($product['price'] * (1 - $product['discount_percent'] / 100), 0, ',', '.');
                        }
                        echo '
            <a href="index.php?pg=products&id=' . $product['id'] . '" class="group space-y-2 hover:shadow-xs">
                <div class="relative w-full aspect-square overflow-hidden">
                    <img src="../public/assets/images/products/' . $img1 . '"
                        alt=""
                        class="absolute inset-0 w-[362px] h-[362px] lg:w-[220px] lg:h-[220px] object-cover transition-opacity duration-300 group-hover:opacity-0" />
                    <img src="../public/assets/images/products/' . $img2 . '"
                        alt=""
                        class="absolute inset-0 w-[362px] h-[362px] lg:w-[220px] lg:h-[220px] object-cover transition-opacity duration-300 opacity-0 group-hover:opacity-100" />
                </div>
                <div class="px-2 pb-3 space-y-2">
                    <p class="text-sm leading-snug line-clamp-2">' . htmlspecialchars($product['name']) . '</p>
                    <div class="flex justify-start items-center gap-3 text-sm">';
                        if ($discountPrice) {
                            echo '<span class="font-semibold text-black">' . $discountPrice . 'đ</span>';
                            echo '<span class="line-through text-gray-400">' . $price . 'đ</span>';
                        } else {
                            echo '<span class="font-semibold text-black">' . $price . 'đ</span>';
                        }
                        echo '</div>
                </div>
            </a>';
                    }
                    ?>
                </div>

                <a class="mt-7 py-3 px-6 text-[13px] text-center bg-[#2c2c2c] w-[249px] text-white rounded-xs" href="index.php?pg=products&gender=male">
                    XEM THÊM SẢN PHẨM <strong>NAM</strong>
                </a>
            </section>

            <!-- Backpacks -->
            <section class="mt-10 flex flex-col justify-center items-center">
                <div class="flex justify-between items-center mb-4 w-full">
                    <a class="xl:text-2xl sm:text-lg font-semibold" href="index.php?pg=products&category=handbag">Balo</a>
                    <a class="xl:text-sm text-gray-600 hover:text-black" href="index.php?pg=products&category=backpack">Xem tất cả</a>
                </div>

                <!-- List products (Large screen - 5 items) -->
                <div class="grid-cols-5 gap-2 lg:grid hidden">
                    <?php
                    for ($i = 0; $i < min(5, count($backpackProducts)); $i++) {
                        $product = $backpackProducts[$i];
                        $images = explode(',', $product['images']);
                        $img1 = isset($images[0]) ? $images[0] : '';
                        $img2 = isset($images[1]) ? $images[1] : $images[0];

                        $price = number_format($product['price'], 0, ',', '.');
                        $discountPrice = null;
                        if (!empty($product['discount_percent']) && $product['discount_percent'] > 0) {
                            $discountPrice = number_format($product['price'] * (1 - $product['discount_percent'] / 100), 0, ',', '.');
                        }
                        echo '
            <a href="index.php?pg=products&id=' . $product['id'] . '" class="group space-y-2 hover:shadow-xs">
                <div class="relative w-full aspect-square overflow-hidden">
                    <img src="../public/assets/images/products/' . $img1 . '"
                        alt=""
                        class="absolute inset-0 w-[362px] h-[362px] lg:w-[220px] lg:h-[220px] object-cover transition-opacity duration-300 group-hover:opacity-0" />
                    <img src="../public/assets/images/products/' . $img2 . '"
                        alt=""
                        class="absolute inset-0 w-[362px] h-[362px] lg:w-[220px] lg:h-[220px] object-cover transition-opacity duration-300 opacity-0 group-hover:opacity-100" />
                </div>
                <div class="px-2 pb-3 space-y-2">
                    <p class="text-sm leading-snug line-clamp-2">' . htmlspecialchars($product['name']) . '</p>
                    <div class="flex justify-start items-center gap-3 text-sm">';
                        if ($discountPrice) {
                            echo '<span class="font-semibold text-black">' . $discountPrice . 'đ</span>';
                            echo '<span class="line-through text-gray-400">' . $price . 'đ</span>';
                        } else {
                            echo '<span class="font-semibold text-black">' . $price . 'đ</span>';
                        }
                        echo '</div>
                </div>
            </a>';
                    }
                    ?>
                </div>

                <!-- List products (Small screen - 6 items) -->
                <div class="grid grid-cols-2 gap-3 lg:hidden">
                    <?php
                    for ($i = 0; $i < min(6, count($backpackProducts)); $i++) {
                        $product = $backpackProducts[$i];
                        $images = explode(',', $product['images']);
                        $img1 = isset($images[0]) ? $images[0] : '';
                        $img2 = isset($images[1]) ? $images[1] : $images[0];

                        $price = number_format($product['price'], 0, ',', '.');
                        $discountPrice = null;
                        if (!empty($product['discount_percent']) && $product['discount_percent'] > 0) {
                            $discountPrice = number_format($product['price'] * (1 - $product['discount_percent'] / 100), 0, ',', '.');
                        }
                        echo '
            <a href="index.php?pg=products&id=' . $product['id'] . '" class="group space-y-2 hover:shadow-xs">
                <div class="relative w-full aspect-square overflow-hidden">
                    <img src="../public/assets/images/products/' . $img1 . '"
                        alt=""
                        class="absolute inset-0 w-[362px] h-[362px] lg:w-[220px] lg:h-[220px] object-cover transition-opacity duration-300 group-hover:opacity-0" />
                    <img src="../public/assets/images/products/' . $img2 . '"
                        alt=""
                        class="absolute inset-0 w-[362px] h-[362px] lg:w-[220px] lg:h-[220px] object-cover transition-opacity duration-300 opacity-0 group-hover:opacity-100" />
                </div>
                <div class="px-2 pb-3 space-y-2">
                    <p class="text-sm leading-snug line-clamp-2">' . htmlspecialchars($product['name']) . '</p>
                    <div class="flex justify-start items-center gap-3 text-sm">';
                        if ($discountPrice) {
                            echo '<span class="font-semibold text-black">' . $discountPrice . 'đ</span>';
                            echo '<span class="line-through text-gray-400">' . $price . 'đ</span>';
                        } else {
                            echo '<span class="font-semibold text-black">' . $price . 'đ</span>';
                        }
                        echo '</div>
                </div>
            </a>';
                    }
                    ?>
                </div>

                <a class="mt-7 py-3 px-6 text-[13px] text-center bg-[#2c2c2c] w-[249px] text-white rounded-xs" href="index.php?pg=products&category=backpack">
                    XEM THÊM SẢN PHẨM <strong>BALO</strong>
                </a>
            </section>

            <!-- Handbags -->
            <section class="mt-10 flex flex-col justify-center items-center">
                <div class="flex justify-between items-center mb-4 w-full">
                    <a class="xl:text-2xl sm:text-lg font-semibold" href="index.php?pg=products&category=handbag">Túi xách, Cặp</a>
                    <a class="xl:text-sm text-gray-600 hover:text-black" href="index.php?pg=products&category=handbag">Xem tất cả</a>
                </div>

                <!-- List products (Large screen - 5 items) -->
                <div class="grid-cols-5 gap-2 lg:grid hidden">
                    <?php
                    for ($i = 0; $i < min(5, count($handbagProducts)); $i++) {
                        $product = $handbagProducts[$i];
                        $images = explode(',', $product['images']);
                        $img1 = isset($images[0]) ? $images[0] : '';
                        $img2 = isset($images[1]) ? $images[1] : $images[0];

                        $price = number_format($product['price'], 0, ',', '.');
                        $discountPrice = null;
                        if (!empty($product['discount_percent']) && $product['discount_percent'] > 0) {
                            $discountPrice = number_format($product['price'] * (1 - $product['discount_percent'] / 100), 0, ',', '.');
                        }
                        echo '
            <a href="index.php?pg=products&id=' . $product['id'] . '" class="group space-y-2 hover:shadow-xs">
                <div class="relative w-full aspect-square overflow-hidden">
                    <img src="../public/assets/images/products/' . $img1 . '"
                        alt=""
                        class="absolute inset-0 w-[362px] h-[362px] lg:w-[220px] lg:h-[220px] object-cover transition-opacity duration-300 group-hover:opacity-0" />
                    <img src="../public/assets/images/products/' . $img2 . '"
                        alt=""
                        class="absolute inset-0 w-[362px] h-[362px] lg:w-[220px] lg:h-[220px] object-cover transition-opacity duration-300 opacity-0 group-hover:opacity-100" />
                </div>
                <div class="px-2 pb-3 space-y-2">
                    <p class="text-sm leading-snug line-clamp-2">' . htmlspecialchars($product['name']) . '</p>
                    <div class="flex justify-start items-center gap-3 text-sm">';
                        if ($discountPrice) {
                            echo '<span class="font-semibold text-black">' . $discountPrice . 'đ</span>';
                            echo '<span class="line-through text-gray-400">' . $price . 'đ</span>';
                        } else {
                            echo '<span class="font-semibold text-black">' . $price . 'đ</span>';
                        }
                        echo '</div>
                </div>
            </a>';
                    }
                    ?>
                </div>

                <!-- List products (Small screen - 6 items) -->
                <div class="grid grid-cols-2 gap-3 lg:hidden">
                    <?php
                    for ($i = 0; $i < min(6, count($handbagProducts)); $i++) {
                        $product = $handbagProducts[$i];
                        $images = explode(',', $product['images']);
                        $img1 = isset($images[0]) ? $images[0] : '';
                        $img2 = isset($images[1]) ? $images[1] : $images[0];

                        $price = number_format($product['price'], 0, ',', '.');
                        $discountPrice = null;
                        if (!empty($product['discount_percent']) && $product['discount_percent'] > 0) {
                            $discountPrice = number_format($product['price'] * (1 - $product['discount_percent'] / 100), 0, ',', '.');
                        }
                        echo '
            <a href="index.php?pg=products&id=' . $product['id'] . '" class="group space-y-2 hover:shadow-xs">
                <div class="relative w-full aspect-square overflow-hidden">
                    <img src="../public/assets/images/products/' . $img1 . '"
                        alt=""
                        class="absolute inset-0 w-[362px] h-[362px] lg:w-[220px] lg:h-[220px] object-cover transition-opacity duration-300 group-hover:opacity-0" />
                    <img src="../public/assets/images/products/' . $img2 . '"
                        alt=""
                        class="absolute inset-0 w-[362px] h-[362px] lg:w-[220px] lg:h-[220px] object-cover transition-opacity duration-300 opacity-0 group-hover:opacity-100" />
                </div>
                <div class="px-2 pb-3 space-y-2">
                    <p class="text-sm leading-snug line-clamp-2">' . htmlspecialchars($product['name']) . '</p>
                    <div class="flex justify-start items-center gap-3 text-sm">';
                        if ($discountPrice) {
                            echo '<span class="font-semibold text-black">' . $discountPrice . 'đ</span>';
                            echo '<span class="line-through text-gray-400">' . $price . 'đ</span>';
                        } else {
                            echo '<span class="font-semibold text-black">' . $price . 'đ</span>';
                        }
                        echo '</div>
                </div>
            </a>';
                    }
                    ?>
                </div>

                <a class="mt-7 py-3 px-6 text-[13px] text-center bg-[#2c2c2c] w-[249px] text-white rounded-xs" href="index.php?pg=products&category=handbag">
                    XEM THÊM SẢN PHẨM <strong>TÚI XÁCH, CẶP</strong>
                </a>
            </section>

            <!-- Caps -->
            <section class="mt-10 flex flex-col justify-center items-center">
                <div class="flex justify-between items-center mb-4 w-full">
                    <a class="xl:text-2xl sm:text-lg font-semibold" href="index.php?pg=products&category=cap">Nón</a>
                    <a class="xl:text-sm text-gray-600 hover:text-black" href="index.php?pg=products&category=cap">Xem tất cả</a>
                </div>

                <!-- List products (Large screen - 5 items) -->
                <div class="grid-cols-5 gap-2 lg:grid hidden">
                    <?php
                    for ($i = 0; $i < min(5, count($capProducts)); $i++) {
                        $product = $capProducts[$i];
                        $images = explode(',', $product['images']);
                        $img1 = isset($images[0]) ? $images[0] : '';
                        $img2 = isset($images[1]) ? $images[1] : $images[0];

                        $price = number_format($product['price'], 0, ',', '.');
                        $discountPrice = null;
                        if (!empty($product['discount_percent']) && $product['discount_percent'] > 0) {
                            $discountPrice = number_format($product['price'] * (1 - $product['discount_percent'] / 100), 0, ',', '.');
                        }
                        echo '
            <a href="index.php?pg=products&id=' . $product['id'] . '" class="group space-y-2 hover:shadow-xs">
                <div class="relative w-full aspect-square overflow-hidden">
                    <img src="../public/assets/images/products/' . $img1 . '"
                        alt=""
                        class="absolute inset-0 w-[362px] h-[362px] lg:w-[220px] lg:h-[220px] object-cover transition-opacity duration-300 group-hover:opacity-0" />
                    <img src="../public/assets/images/products/' . $img2 . '"
                        alt=""
                        class="absolute inset-0 w-[362px] h-[362px] lg:w-[220px] lg:h-[220px] object-cover transition-opacity duration-300 opacity-0 group-hover:opacity-100" />
                </div>
                <div class="px-2 pb-3 space-y-2">
                    <p class="text-sm leading-snug line-clamp-2">' . htmlspecialchars($product['name']) . '</p>
                    <div class="flex justify-start items-center gap-3 text-sm">';
                        if ($discountPrice) {
                            echo '<span class="font-semibold text-black">' . $discountPrice . 'đ</span>';
                            echo '<span class="line-through text-gray-400">' . $price . 'đ</span>';
                        } else {
                            echo '<span class="font-semibold text-black">' . $price . 'đ</span>';
                        }
                        echo '</div>
                </div>
            </a>';
                    }
                    ?>
                </div>

                <!-- List products (Small screen - 6 items) -->
                <div class="grid grid-cols-2 gap-3 lg:hidden">
                    <?php
                    for ($i = 0; $i < min(6, count($capProducts)); $i++) {
                        $product = $capProducts[$i];
                        $images = explode(',', $product['images']);
                        $img1 = isset($images[0]) ? $images[0] : '';
                        $img2 = isset($images[1]) ? $images[1] : $images[0];

                        $price = number_format($product['price'], 0, ',', '.');
                        $discountPrice = null;
                        if (!empty($product['discount_percent']) && $product['discount_percent'] > 0) {
                            $discountPrice = number_format($product['price'] * (1 - $product['discount_percent'] / 100), 0, ',', '.');
                        }
                        echo '
            <a href="index.php?pg=products&id=' . $product['id'] . '" class="group space-y-2 hover:shadow-xs">
                <div class="relative w-full aspect-square overflow-hidden">
                    <img src="../public/assets/images/products/' . $img1 . '"
                        alt=""
                        class="absolute inset-0 w-[362px] h-[362px] lg:w-[220px] lg:h-[220px] object-cover transition-opacity duration-300 group-hover:opacity-0" />
                    <img src="../public/assets/images/products/' . $img2 . '"
                        alt=""
                        class="absolute inset-0 w-[362px] h-[362px] lg:w-[220px] lg:h-[220px] object-cover transition-opacity duration-300 opacity-0 group-hover:opacity-100" />
                </div>
                <div class="px-2 pb-3 space-y-2">
                    <p class="text-sm leading-snug line-clamp-2">' . htmlspecialchars($product['name']) . '</p>
                    <div class="flex justify-start items-center gap-3 text-sm">';
                        if ($discountPrice) {
                            echo '<span class="font-semibold text-black">' . $discountPrice . 'đ</span>';
                            echo '<span class="line-through text-gray-400">' . $price . 'đ</span>';
                        } else {
                            echo '<span class="font-semibold text-black">' . $price . 'đ</span>';
                        }
                        echo '</div>
                </div>
            </a>';
                    }
                    ?>
                </div>

                <a class="mt-7 py-3 px-6 text-[13px] text-center bg-[#2c2c2c] w-[249px] text-white rounded-xs" href="index.php?pg=products&category=cap">
                    XEM THÊM SẢN PHẨM <strong>NÓN</strong>
                </a>
            </section>

            <!-- Shoes, Sandals -->
            <section class="mt-10 flex flex-col justify-center items-center">
                <div class="flex justify-between items-center mb-4 w-full">
                    <a class="xl:text-2xl sm:text-lg font-semibold" href="index.php?pg=products&category=shoes-sandal">Shoes, Sandals</a>
                    <a class="xl:text-sm text-gray-600 hover:text-black" href="index.php?pg=products&category=shoes-sandal">Xem tất cả</a>
                </div>

                <!-- List products (Large screen - 5 items) -->
                <div class="grid-cols-5 gap-2 lg:grid hidden">
                    <?php
                    for ($i = 0; $i < min(5, count($shoesSandalProducts)); $i++) {
                        $product = $shoesSandalProducts[$i];
                        $images = explode(',', $product['images']);
                        $img1 = isset($images[0]) ? $images[0] : '';
                        $img2 = isset($images[1]) ? $images[1] : $images[0];

                        $price = number_format($product['price'], 0, ',', '.');
                        $discountPrice = null;
                        if (!empty($product['discount_percent']) && $product['discount_percent'] > 0) {
                            $discountPrice = number_format($product['price'] * (1 - $product['discount_percent'] / 100), 0, ',', '.');
                        }
                        echo '
            <a href="index.php?pg=products&id=' . $product['id'] . '" class="group space-y-2 hover:shadow-xs">
                <div class="relative w-full aspect-square overflow-hidden">
                    <img src="../public/assets/images/products/' . $img1 . '"
                        alt=""
                        class="absolute inset-0 w-[362px] h-[362px] lg:w-[220px] lg:h-[220px] object-cover transition-opacity duration-300 group-hover:opacity-0" />
                    <img src="../public/assets/images/products/' . $img2 . '"
                        alt=""
                        class="absolute inset-0 w-[362px] h-[362px] lg:w-[220px] lg:h-[220px] object-cover transition-opacity duration-300 opacity-0 group-hover:opacity-100" />
                </div>
                <div class="px-2 pb-3 space-y-2">
                    <p class="text-sm leading-snug line-clamp-2">' . htmlspecialchars($product['name']) . '</p>
                    <div class="flex justify-start items-center gap-3 text-sm">';
                        if ($discountPrice) {
                            echo '<span class="font-semibold text-black">' . $discountPrice . 'đ</span>';
                            echo '<span class="line-through text-gray-400">' . $price . 'đ</span>';
                        } else {
                            echo '<span class="font-semibold text-black">' . $price . 'đ</span>';
                        }
                        echo '</div>
                </div>
            </a>';
                    }
                    ?>
                </div>

                <!-- List products (Small screen - 6 items) -->
                <div class="grid grid-cols-2 gap-3 lg:hidden">
                    <?php
                    for ($i = 0; $i < min(6, count($shoesSandalProducts)); $i++) {
                        $product = $shoesSandalProducts[$i];
                        $images = explode(',', $product['images']);
                        $img1 = isset($images[0]) ? $images[0] : '';
                        $img2 = isset($images[1]) ? $images[1] : $images[0];

                        $price = number_format($product['price'], 0, ',', '.');
                        $discountPrice = null;
                        if (!empty($product['discount_percent']) && $product['discount_percent'] > 0) {
                            $discountPrice = number_format($product['price'] * (1 - $product['discount_percent'] / 100), 0, ',', '.');
                        }
                        echo '
            <a href="index.php?pg=products&id=' . $product['id'] . '" class="group space-y-2 hover:shadow-xs">
                <div class="relative w-full aspect-square overflow-hidden">
                    <img src="../public/assets/images/products/' . $img1 . '"
                        alt=""
                        class="absolute inset-0 w-[362px] h-[362px] lg:w-[220px] lg:h-[220px] object-cover transition-opacity duration-300 group-hover:opacity-0" />
                    <img src="../public/assets/images/products/' . $img2 . '"
                        alt=""
                        class="absolute inset-0 w-[362px] h-[362px] lg:w-[220px] lg:h-[220px] object-cover transition-opacity duration-300 opacity-0 group-hover:opacity-100" />
                </div>
                <div class="px-2 pb-3 space-y-2">
                    <p class="text-sm leading-snug line-clamp-2">' . htmlspecialchars($product['name']) . '</p>
                    <div class="flex justify-start items-center gap-3 text-sm">';
                        if ($discountPrice) {
                            echo '<span class="font-semibold text-black">' . $discountPrice . 'đ</span>';
                            echo '<span class="line-through text-gray-400">' . $price . 'đ</span>';
                        } else {
                            echo '<span class="font-semibold text-black">' . $price . 'đ</span>';
                        }
                        echo '</div>
                </div>
            </a>';
                    }
                    ?>
                </div>

                <a class="mt-7 py-3 px-6 text-[13px] text-center bg-[#2c2c2c] w-[249px] text-white rounded-xs" href="index.php?pg=products&category=shoes-sandal">
                    XEM THÊM SẢN PHẨM <strong>SHOES, SANDAL</strong>
                </a>
            </section>
        </main>
        <?php include_once 'views/partials/footer.php' ?>
    </div>

    <script src=" ../public/assets/js/home.js"></script>
</body>

</html>