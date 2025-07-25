<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DEGREY – DEGREY VIETNAM</title>
    <link rel="stylesheet" href="public/assets/css/output.css">
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
                        <img src="public/assets/images/HomeSlider1.png" class="w-full object-contain" alt="Slide 1">
                    </div>

                    <!-- Slide 2 -->
                    <div class="absolute inset-0 transition-opacity duration-1000 opacity-0 flex items-start justify-center" data-slide="1">
                        <img src="public/assets/images/HomeSlider2.png" class="w-full object-contain" alt="Slide 2">
                    </div>

                    <!-- Slide 3 -->
                    <div class="absolute inset-0 transition-opacity duration-1000 opacity-0" data-slide="2">
                        <img src="public/assets/images/HomeSlider3.png"
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

                <!-- List products -->
                <div class="grid-cols-5 gap-2 lg:grid hidden">
                    <?php
                    for ($i = 0; $i < 5; $i++) {
                        echo '
                <a href="index.php?pg=products&id=1" class="group space-y-2 hover:shadow-xs">
                    <div class="relative w-full aspect-square overflow-hidden">
                        <img src="public/assets/images/products/T-shirtFemale1-1.jpg"
                            alt=""
                            class="absolute inset-0 w-[362px] h-[362px] lg:w-[220px] lg:h-[220px] object-cover transition-opacity duration-300 group-hover:opacity-0" />
                        <img src="public/assets/images/products/T-shirtFemale1-2.jpg"
                            alt=""
                            class="absolute inset-0 w-[362px] h-[362px] lg:w-[220px] lg:h-[220px] object-cover transition-opacity duration-300 opacity-0 group-hover:opacity-100" />
                    </div>
                    <div class="px-2 pb-3 space-y-2">
                        <p class="text-sm leading-snug line-clamp-2">
                            Áo thun tay dài màu CAM TIGER Degrey Jersey long sleeve cổ tim thời trang thể thao
                        </p>
                        <div class="flex justify-start items-center gap-3 text-sm">
                            <span class="font-semibold text-black">400,000đ</span>
                            <span class="line-through text-gray-400">450,000đ</span>
                        </div>
                    </div>
                </a>
            ';
                    }
                    ?>
                </div>
                <div class="grid grid-cols-2 gap-3 lg:hidden">
                    <?php
                    for ($i = 0; $i < 6; $i++) {
                        echo '
                <a href="index.php?pg=products&id=1" class="group space-y-2 hover:shadow-xs">
                    <div class="relative w-full aspect-square overflow-hidden">
                        <img src="public/assets/images/products/T-shirtFemale1-1.jpg"
                            alt=""
                            class="absolute inset-0 w-[362px] h-[362px] lg:w-[220px] lg:h-[220px] object-cover transition-opacity duration-300 group-hover:opacity-0" />
                        <img src="public/assets/images/products/T-shirtFemale1-2.jpg"
                            alt=""
                            class="absolute inset-0 w-[362px] h-[362px] lg:w-[220px] lg:h-[220px] object-cover transition-opacity duration-300 opacity-0 group-hover:opacity-100" />
                    </div>
                    <div class="px-2 pb-3 space-y-2">
                        <p class="text-sm leading-snug line-clamp-2">
                            Áo thun tay dài màu CAM TIGER Degrey Jersey long sleeve cổ tim thời trang thể thao
                        </p>
                        <div class="flex justify-start items-center gap-3 text-sm">
                            <span class="font-semibold text-black">400,000đ</span>
                            <span class="line-through text-gray-400">450,000đ</span>
                        </div>
                    </div>
                </a>
            ';
                    }
                    ?>
                </div>

                <a class="mt-7 py-3 px-6 text-[13px] text-center bg-[#2c2c2c] w-[249px] text-white rounded-xs" href="index.php?pg=products&gender=female">XEM THÊM SẢN PHẨM <strong>NỮ</strong></a>

            </section>

            <!-- Male products -->
            <section class="mt-10 flex flex-col justify-center items-center">
                <div class="flex justify-between items-center mb-4 w-full">
                    <a class="xl:text-2xl sm:text-lg font-semibold" href="index.php?pg=products&gender=male">Nam</a>
                    <a class="xl:text-sm text-gray-600 hover:text-black" href="index.php?pg=products&gender=male">Xem tất cả</a>
                </div>

                <!-- List products -->
                <div class="grid-cols-5 gap-2 lg:grid hidden">
                    <?php
                    for ($i = 0; $i < 5; $i++) {
                        echo '
                <a href="index.php?pg=products&id=1" class="group space-y-2 hover:shadow-xs">
                    <div class="relative w-full aspect-square overflow-hidden">
                        <img src="public/assets/images/products/T-shirtMale1-1.jpg"
                            alt=""
                            class="absolute inset-0 w-[362px] h-[362px] lg:w-[220px] lg:h-[220px] object-cover transition-opacity duration-300 group-hover:opacity-0" />
                        <img src="public/assets/images/products/T-shirtMale1-2.jpg"
                            alt=""
                            class="absolute inset-0 w-[362px] h-[362px] lg:w-[220px] lg:h-[220px] object-cover transition-opacity duration-300 opacity-0 group-hover:opacity-100" />
                    </div>
                    <div class="px-2 pb-3 space-y-2">
                        <p class="text-sm leading-snug line-clamp-2">
                            Áo thun tay dài màu trắng Degrey Jersey long sleeve cổ tim thời trang thể thao REDLINE - LONGRELI
                        </p>
                        <div class="flex justify-start items-center gap-3 text-sm">
                            <span class="font-semibold text-black">400,000đ</span>
                            <span class="line-through text-gray-400">450,000đ</span>
                        </div>
                    </div>
                </a>
            ';
                    }
                    ?>
                </div>
                <div class="grid grid-cols-2 gap-3 lg:hidden">
                    <?php
                    for ($i = 0; $i < 6; $i++) {
                        echo '
                <a href="index.php?pg=products&id=1" class="group space-y-2 hover:shadow-xs">
                    <div class="relative w-full aspect-square overflow-hidden">
                        <img src="public/assets/images/products/T-shirtMale1-1.jpg"
                            alt=""
                            class="absolute inset-0 w-[362px] h-[362px] lg:w-[220px] lg:h-[220px] object-cover transition-opacity duration-300 group-hover:opacity-0" />
                        <img src="public/assets/images/products/T-shirtMale1-2.jpg"
                            alt=""
                            class="absolute inset-0 w-[362px] h-[362px] lg:w-[220px] lg:h-[220px] object-cover transition-opacity duration-300 opacity-0 group-hover:opacity-100" />
                    </div>
                    <div class="px-2 pb-3 space-y-2">
                        <p class="text-sm leading-snug line-clamp-2">
                            Áo thun tay dài màu trắng Degrey Jersey long sleeve cổ tim thời trang thể thao REDLINE - LONGRELI
                        </p>
                        <div class="flex justify-start items-center gap-3 text-sm">
                            <span class="font-semibold text-black">400,000đ</span>
                            <span class="line-through text-gray-400">450,000đ</span>
                        </div>
                    </div>
                </a>
            ';
                    }
                    ?>
                </div>

                <a class="mt-7 py-3 px-6 text-[13px] text-center bg-[#2c2c2c] w-[249px] text-white rounded-xs" href="index.php?pg=products&gender=male">XEM THÊM SẢN PHẨM <strong>NAM</strong></a>

            </section>

            <!-- Backpacks -->
            <section class="mt-10 flex flex-col justify-center items-center">
                <div class="flex justify-between items-center mb-4 w-full">
                    <a class="xl:text-2xl sm:text-lg font-semibold" href="index.php?pg=products&category=backpack">Balo</a>
                    <a class="xl:text-sm text-gray-600 hover:text-black" href="index.php?pg=products&category=backpack">Xem tất cả</a>
                </div>

                <!-- List products -->
                <div class="grid-cols-5 gap-2 lg:grid hidden">
                    <?php
                    for ($i = 0; $i < 5; $i++) {
                        echo '
                <a href="index.php?pg=products&id=1" class="group space-y-2 hover:shadow-xs">
                    <div class="relative w-full aspect-square overflow-hidden">
                        <img src="public/assets/images/products/Backpack1-1.jpg"
                            alt=""
                            class="absolute inset-0 w-[362px] h-[362px] lg:w-[220px] lg:h-[220px] object-cover transition-opacity duration-300 group-hover:opacity-0" />
                        <img src="public/assets/images/products/Backpack1-2.jpg"
                            alt=""
                            class="absolute inset-0 w-[362px] h-[362px] lg:w-[220px] lg:h-[220px] object-cover transition-opacity duration-300 opacity-0 group-hover:opacity-100" />
                    </div>
                    <div class="px-2 pb-3 space-y-2">
                        <p class="text-sm leading-snug line-clamp-2">
                            Degrey Small Size Simili màu nâu jean Basic Balo 1 Ngăn - LBBMNAU
                        </p>
                        <div class="flex justify-start items-center gap-3 text-sm">
                            <span class="font-semibold text-black">390,000đ</span>
                            <span class="line-through text-gray-400">430,000đ</span>
                        </div>
                    </div>
                </a>
            ';
                    }
                    for ($i = 0; $i < 5; $i++) {
                        echo '
                <a href="" class="relative group space-y-2 hover:shadow-xs opacity-35 cursor-default" onClick="return false;">
                    <div class="relative w-full aspect-square overflow-hidden">
                        <img src="public/assets/images/products/Backpack2-1.jpg"
                            alt=""
                            class="absolute inset-0 w-[362px] h-[362px] lg:w-[220px] lg:h-[220px] object-cover transition-opacity duration-300 group-hover:opacity-0" />
                        <img src="public/assets/images/products/Backpack2-2.jpg"
                            alt=""
                            class="absolute inset-0 w-[362px] h-[362px] lg:w-[220px] lg:h-[220px] object-cover transition-opacity duration-300 opacity-0 group-hover:opacity-100" />
                    </div>
                    <div class="px-2 pb-3 space-y-2">
                        <p class="text-sm leading-snug line-clamp-2">
                            Degrey Double Leather Basic Balo Kem - LBBDK
                        </p>
                        <div class="flex justify-start items-center gap-3 text-sm">
                            <span class="font-semibold text-black">480,000đ</span>
                            <span class="line-through text-gray-400">550,000đ</span>
                        </div>
                    </div>
                    <span class="px-1 py-[2px] absolute top-0 left-0 text-[11px] text-white bg-[#565656]">Tạm hết hàng</span>
                </a>
            ';
                    }
                    ?>
                </div>

                <div class="grid grid-cols-2 gap-3 lg:hidden">
                    <?php
                    for ($i = 0; $i < 6; $i++) {
                        echo '
                <a href="index.php?pg=products&id=1" class="group space-y-2 hover:shadow-xs">
                    <div class="relative w-full aspect-square overflow-hidden">
                        <img src="public/assets/images/products/Backpack1-1.jpg"
                            alt=""
                            class="absolute inset-0 w-[362px] h-[362px] lg:w-[220px] lg:h-[220px] object-cover transition-opacity duration-300 group-hover:opacity-0" />
                        <img src="public/assets/images/products/Backpack1-2.jpg"
                            alt=""
                            class="absolute inset-0 w-[362px] h-[362px] lg:w-[220px] lg:h-[220px] object-cover transition-opacity duration-300 opacity-0 group-hover:opacity-100" />
                    </div>
                    <div class="px-2 pb-3 space-y-2">
                        <p class="text-sm leading-snug line-clamp-2">
                            Degrey Small Size Simili màu nâu jean Basic Balo 1 Ngăn - LBBMNAU
                        </p>
                        <div class="flex justify-start items-center gap-3 text-sm">
                            <span class="font-semibold text-black">390,000đ</span>
                            <span class="line-through text-gray-400">430,000đ</span>
                        </div>
                    </div>
                </a>
            ';
                    }
                    ?>
                </div>

                <a class="mt-7 py-3 px-6 text-[13px] text-center bg-[#2c2c2c] w-[249px] text-white rounded-xs" href="index.php?pg=products&category=backpack">XEM THÊM SẢN PHẨM <strong>BALO</strong></a>

            </section>

            <!-- Handbags -->
            <section class="mt-10 flex flex-col justify-center items-center">
                <div class="flex justify-between items-center mb-4 w-full">
                    <a class="xl:text-2xl sm:text-lg font-semibold" href="index.php?pg=products&category=handbag">Túi xách, cặp</a>
                    <a class="xl:text-sm text-gray-600 hover:text-black" href="index.php?pg=products&category=handbag">Xem tất cả</a>
                </div>

                <!-- List products -->
                <div class="grid-cols-5 gap-2 lg:grid hidden">
                    <?php
                    for ($i = 0; $i < 5; $i++) {
                        echo '
                <a href="index.php?pg=products&id=1" class="group space-y-2 hover:shadow-xs">
                    <div class="relative w-full aspect-square overflow-hidden">
                        <img src="public/assets/images/products/Handbag1-1.jpg"
                            alt=""
                            class="absolute inset-0 w-[362px] h-[362px] lg:w-[220px] lg:h-[220px] object-cover transition-opacity duration-300 group-hover:opacity-0" />
                        <img src="public/assets/images/products/Handbag1-2.jpg"
                            alt=""
                            class="absolute inset-0 w-[362px] h-[362px] lg:w-[220px] lg:h-[220px] object-cover transition-opacity duration-300 opacity-0 group-hover:opacity-100" />
                    </div>
                    <div class="px-2 pb-3 space-y-2">
                        <p class="text-sm leading-snug line-clamp-2">
                            Degrey Small Size Simili màu nâu jean Basic Balo 1 Ngăn - LBBMNAU
                        </p>
                        <div class="flex justify-start items-center gap-3 text-sm">
                            <span class="font-semibold text-black">390,000đ</span>
                            <span class="line-through text-gray-400">430,000đ</span>
                        </div>
                    </div>
                </a>
            ';
                    }
                    for ($i = 0; $i < 5; $i++) {
                        echo '
                <a href="" class="relative group space-y-2 hover:shadow-xs opacity-35 cursor-default" onClick="return false;">
                    <div class="relative w-full aspect-square overflow-hidden">
                        <img src="public/assets/images/products/Handbag2-1.jpg"
                            alt=""
                            class="absolute inset-0 w-[362px] h-[362px] lg:w-[220px] lg:h-[220px] object-cover transition-opacity duration-300 group-hover:opacity-0" />
                        <img src="public/assets/images/products/Handbag2-2.jpg"
                            alt=""
                            class="absolute inset-0 w-[362px] h-[362px] lg:w-[220px] lg:h-[220px] object-cover transition-opacity duration-300 opacity-0 group-hover:opacity-100" />
                    </div>
                    <div class="px-2 pb-3 space-y-2">
                        <p class="text-sm leading-snug line-clamp-2">
                            Túi da simili Degrey đeo chéo crossbody bag màu kem thiết kế thời trang nam nữ - CROSSK
                        </p>
                        <div class="flex justify-start items-center gap-3 text-sm">
                            <span class="font-semibold text-black">250,000đ</span>
                            <span class="line-through text-gray-400">300,000đ</span>
                        </div>
                    </div>
                    <span class="px-1 py-[2px] absolute top-0 left-0 text-[11px] text-white bg-[#565656]">Tạm hết hàng</span>
                </a>
            ';
                    }
                    ?>
                </div>

                <div class="grid grid-cols-2 gap-3 lg:hidden">
                    <?php
                    for ($i = 0; $i < 6; $i++) {
                        echo '
                <a href="index.php?pg=products&id=1" class="group space-y-2 hover:shadow-xs">
                    <div class="relative w-full aspect-square overflow-hidden">
                        <img src="public/assets/images/products/Handbag2-1.jpg"
                            alt=""
                            class="absolute inset-0 w-[362px] h-[362px] lg:w-[220px] lg:h-[220px] object-cover transition-opacity duration-300 group-hover:opacity-0" />
                        <img src="public/assets/images/products/Handbag2-2.jpg"
                            alt=""
                            class="absolute inset-0 w-[362px] h-[362px] lg:w-[220px] lg:h-[220px] object-cover transition-opacity duration-300 opacity-0 group-hover:opacity-100" />
                    </div>
                    <div class="px-2 pb-3 space-y-2">
                        <p class="text-sm leading-snug line-clamp-2">
                            Túi da simili Degrey đeo chéo crossbody bag màu kem thiết kế thời trang nam nữ - CROSSK
                        </p>
                        <div class="flex justify-start items-center gap-3 text-sm">
                            <span class="font-semibold text-black">250,000đ</span>
                            <span class="line-through text-gray-400">300,000đ</span>
                        </div>
                    </div>
                </a>
            ';
                    }
                    ?>
                </div>

                <a class="mt-7 py-3 px-6 text-[13px] text-center bg-[#2c2c2c] w-[249px] text-white rounded-xs" href="index.php?pg=products&category=handbag">XEM THÊM SẢN PHẨM <strong>BALO</strong></a>

            </section>

            <!-- Caps -->
            <section class="mt-10 flex flex-col justify-center items-center">
                <div class="flex justify-between items-center mb-4 w-full">
                    <a class="xl:text-2xl sm:text-lg font-semibold" href="index.php?pg=products&category=cap">Nón</a>
                    <a class="xl:text-sm text-gray-600 hover:text-black" href="index.php?pg=products&category=cap">Xem tất cả</a>
                </div>

                <!-- List products -->
                <div class="grid-cols-5 gap-2 lg:grid hidden">
                    <?php
                    for ($i = 0; $i < 5; $i++) {
                        echo '
                <a href="index.php?pg=products&id=1" class="group space-y-2 hover:shadow-xs">
                    <div class="relative w-full aspect-square overflow-hidden">
                        <img src="public/assets/images/products/Cap1-1.jpg"
                            alt=""
                            class="absolute inset-0 w-[362px] h-[362px] lg:w-[220px] lg:h-[220px] object-cover transition-opacity duration-300 group-hover:opacity-0" />
                        <img src="public/assets/images/products/Cap1-2.jpg"
                            alt=""
                            class="absolute inset-0 w-[362px] h-[362px] lg:w-[220px] lg:h-[220px] object-cover transition-opacity duration-300 opacity-0 group-hover:opacity-100" />
                    </div>
                    <div class="px-2 pb-3 space-y-2">
                        <p class="text-sm leading-snug line-clamp-2">
                            Mũ/Nón Degrey màu trắng phối đen lưỡi trai cap thêu logo thiết kế thời trang - CAPDT
                        </p>
                        <div class="flex justify-start items-center gap-3 text-sm">
                            <span class="font-semibold text-black">230,000đ</span>
                            <span class="line-through text-gray-400">330,000đ</span>
                        </div>
                    </div>
                </a>
            ';
                    }
                    ?>
                </div>
                <div class="grid grid-cols-2 gap-3 lg:hidden">
                    <?php
                    for ($i = 0; $i < 6; $i++) {
                        echo '
                <a href="index.php?pg=products&id=1" class="group space-y-2 hover:shadow-xs">
                    <div class="relative w-full aspect-square overflow-hidden">
                        <img src="public/assets/images/products/Cap1-1.jpg"
                            alt=""
                            class="absolute inset-0 w-[362px] h-[362px] lg:w-[220px] lg:h-[220px] object-cover transition-opacity duration-300 group-hover:opacity-0" />
                        <img src="public/assets/images/products/Cap1-2.jpg"
                            alt=""
                            class="absolute inset-0 w-[362px] h-[362px] lg:w-[220px] lg:h-[220px] object-cover transition-opacity duration-300 opacity-0 group-hover:opacity-100" />
                    </div>
                    <div class="px-2 pb-3 space-y-2">
                        <p class="text-sm leading-snug line-clamp-2">
                            Mũ/Nón Degrey màu trắng phối đen lưỡi trai cap thêu logo thiết kế thời trang - CAPDT
                        </p>
                        <div class="flex justify-start items-center gap-3 text-sm">
                            <span class="font-semibold text-black">230,000đ</span>
                            <span class="line-through text-gray-400">330,000đ</span>
                        </div>
                    </div>
                </a>
            ';
                    }
                    ?>
                </div>

                <a class="mt-7 py-3 px-6 text-[13px] text-center bg-[#2c2c2c] w-[249px] text-white rounded-xs" href="index.php?pg=products&category=cap">XEM THÊM SẢN PHẨM <strong>NÓN</strong></a>

            </section>

            <!-- Shoes, Sandals -->
            <section class="mt-10 flex flex-col justify-center items-center">
                <div class="flex justify-between items-center mb-4 w-full">
                    <a class="xl:text-2xl sm:text-lg font-semibold" href="index.php?pg=products&category=shoes_sandal">Shoes, Sandals</a>
                    <a class="xl:text-sm text-gray-600 hover:text-black" href="index.php?pg=products&category=shoes_sandal">Xem tất cả</a>
                </div>

                <!-- List products -->
                <div class="grid-cols-5 gap-2 lg:grid hidden">
                    <?php
                    for ($i = 0; $i < 3; $i++) {
                        echo '
                <a href="index.php?pg=products&id=1" class="group space-y-2 hover:shadow-xs">
                    <div class="relative w-full aspect-square overflow-hidden">
                        <img src="public/assets/images/products/ShoseSandal1-1.jpg"
                            alt=""
                            class="absolute inset-0 w-[362px] h-[362px] lg:w-[220px] lg:h-[220px] object-cover transition-opacity duration-300 group-hover:opacity-0" />
                        <img src="public/assets/images/products/ShoseSandal1-2.jpg"
                            alt=""
                            class="absolute inset-0 w-[362px] h-[362px] lg:w-[220px] lg:h-[220px] object-cover transition-opacity duration-300 opacity-0 group-hover:opacity-100" />
                    </div>
                    <div class="px-2 pb-3 space-y-2">
                        <p class="text-sm leading-snug line-clamp-2">
                            Dép da Degrey quai ngang đế cao su thời trang unisex - DEP
                        </p>
                        <div class="flex justify-start items-center gap-3 text-sm">
                            <span class="font-semibold text-black">550,000đ</span>
                            <span class="line-through text-gray-400">700,000đ</span>
                        </div>
                    </div>
                </a>
            ';
                    }
                    ?>
                </div>
                <div class="grid grid-cols-2 gap-3 lg:hidden">
                    <?php
                    for ($i = 0; $i < 3; $i++) {
                        echo '
                <a href="index.php?pg=products&id=1" class="group space-y-2 hover:shadow-xs">
                    <div class="relative w-full aspect-square overflow-hidden">
                        <img src="public/assets/images/products/ShoseSandal1-1.jpg"
                            alt=""
                            class="absolute inset-0 w-[362px] h-[362px] lg:w-[220px] lg:h-[220px] object-cover transition-opacity duration-300 group-hover:opacity-0" />
                        <img src="public/assets/images/products/ShoseSandal1-2.jpg"
                            alt=""
                            class="absolute inset-0 w-[362px] h-[362px] lg:w-[220px] lg:h-[220px] object-cover transition-opacity duration-300 opacity-0 group-hover:opacity-100" />
                    </div>
                    <div class="px-2 pb-3 space-y-2">
                        <p class="text-sm leading-snug line-clamp-2">
                            Dép da Degrey quai ngang đế cao su thời trang unisex - DEP
                        </p>
                        <div class="flex justify-start items-center gap-3 text-sm">
                            <span class="font-semibold text-black">550,000đ</span>
                            <span class="line-through text-gray-400">700,000đ</span>
                        </div>
                    </div>
                </a>
            ';
                    }
                    ?>
                </div>

                <a class="mt-7 py-3 px-6 text-[13px] text-center bg-[#2c2c2c] w-[249px] text-white rounded-xs" href="index.php?pg=products&category=shoes_sandal">XEM THÊM SẢN PHẨM <strong>SHOSES, SANDALS</strong></a>

            </section>
        </main>
        <?php include_once 'views/partials/footer.php' ?>
    </div>

    <script src=" public/assets/js/home.js"></script>
</body>

</html>