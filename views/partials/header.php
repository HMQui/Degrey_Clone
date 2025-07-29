<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= isset($pageTitle) ? $pageTitle : 'Degrey Vietnam' ?></title>
    <link rel="stylesheet" href="public/assets/css/output.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>

<body>
    <header class="fixed top-0 left-0 min-w-screen z-[99]">
        <!-- For bigger divice -->
        <div class="xl:relative px-50 xl:flex xl:justify-center xl:items-center xl:min-h-[90px] hidden shadow-md bg-white">
            <a href="index.php?pg=home" class="mr-10">
                <img src="public/assets/images/MainLogo.png" alt="Main Logo" class="max-h-[70px] max-w-full">
            </a>
            <nav class="w-1/2 flex items-center justify-center">
                <ul class="flex items-center justify-center m-0 p-0 list-none h-full">
                    <li class="group h-full flex items-center justify-center text-base cursor-pointer">
                        <a href="index.php?pg=products&page=1&gender=female" class="h-full flex items-center justify-center px-[15px]">Nữ | Women</a>

                        <!-- Sub menu -->
                        <div class="absolute left-0 top-[80px] w-full bg-white py-4 z-[999] invisible group-hover:visible transition-all duration-300 opacity-0 group-hover:opacity-100 shadow-xl">
                            <ul class="max-w-[1280px] mx-auto flex justify-center flex-wrap">
                                <li class="px-[15px] w-2/12">
                                    <a class="text-black text-base mb-[10px] block"
                                        href="index.php?pg=products&page=1&gender=female">Tất cả | All</a>
                                </li>
                                <li class="px-[15px] w-2/12">
                                    <a class="text-black text-base mb-[10px] block"
                                        href="index.php?pg=products&page=1&category=tshirt&gender=female">Áo thun | Tshirt</a>
                                </li>
                                <li class="px-[15px] w-2/12">
                                    <a class="text-black text-base mb-[10px] block"
                                        href="index.php?pg=products&page=1&category=jacket&gender=female">Áo khoác | Jackets</a>
                                </li>
                                <li class="px-[15px] w-2/12">
                                    <a class="text-black text-base mb-[10px] block"
                                        href="index.php?pg=products&page=1&category=long-sleeves&gender=female">Áo tay dài | Long sleeves</a>
                                </li>
                                <li class="px-[15px] w-2/12">
                                    <a class="text-black text-base mb-[10px] block"
                                        href="index.php?pg=products&page=1&category=tanktop&gender=female">Áo ba lỗ | Tank tops</a>
                                </li>
                                <li class="px-[15px] w-2/12">
                                    <a class="text-black text-base mb-[10px] block"
                                        href="index.php?pg=products&page=1&category=pants-shorts&gender=female">Quần | Pants & Shorts</a>
                                </li>
                            </ul>
                        </div>

                    </li>
                    <li class="group h-full flex items-center justify-center text-base cursor-pointer">
                        <a href="index.php?pg=products&page=1&gender=male" class="h-full flex items-center justify-center px-[15px]">Nam | Men</a>

                        <!-- Sub menu -->
                        <div class="absolute left-0 top-[80px] w-full bg-white py-4 z-[999] invisible group-hover:visible transition-all duration-300 opacity-0 group-hover:opacity-100  shadow-xl">
                            <ul class="max-w-[1280px] mx-auto flex justify-center flex-wrap">
                                <li class="px-[15px] w-2/12">
                                    <a class="text-black text-base mb-[10px] block"
                                        href="index.php?pg=products&page=1&category=all&gender=male">Tất cả | All</a>
                                </li>
                                <li class="px-[15px] w-2/12">
                                    <a class="text-black text-base mb-[10px] block"
                                        href="index.php?pg=products&page=1&category=tshirt&gender=male">Áo thun | Tshirt</a>
                                </li>
                                <li class="px-[15px] w-2/12">
                                    <a class="text-black text-base mb-[10px] block"
                                        href="index.php?pg=products&page=1&category=tanktop&gender=male">Áo ba lỗ | Tank tops</a>
                                </li>
                                <li class="px-[15px] w-2/12">
                                    <a class="text-black text-base mb-[10px] block"
                                        href="index.php?pg=products&page=1&category=jacket&gender=male">Áo khoác | Jackets</a>
                                </li>
                                <li class="px-[15px] w-2/12">
                                    <a class="text-black text-base mb-[10px] block"
                                        href="index.php?pg=products&page=1&category=long-sleeves&gender=male">Áo tay dài | Long sleeves</a>
                                </li>
                                <li class="px-[15px] w-2/12">
                                    <a class="text-black text-base mb-[10px] block"
                                        href="index.php?pg=products&page=1&category=pants-shorts&gender=male">Quần | Pants & Shorts</a>
                                </li>
                            </ul>
                        </div>

                    </li>
                    <li class="group h-full flex items-center justify-center text-base cursor-pointer">
                        <a href="#" class="h-full flex items-center justify-center px-[15px]">Phụ kiện | Accessories</a>

                        <!-- Sub menu -->
                        <div class="absolute left-0 top-[80px] w-full bg-white py-4 z-[999] invisible group-hover:visible transition-all duration-300 opacity-0 group-hover:opacity-100  shadow-xl">
                            <ul class="max-w-[1280px] mx-auto flex justify-center flex-wrap">
                                <li class="px-[15px] w-2/12">
                                    <a class="text-black text-base mb-[10px] block" href="index.php?pg=products&page=1&category=backpack">Balo | Backpacks</a>
                                </li>
                                <li class="px-[15px] w-2/12">
                                    <a class="text-black text-base mb-[10px] block" href="index.php?pg=products&page=1&category=handbag">Túi xách | Handbags</a>
                                </li>
                                <li class="px-[15px] w-2/12">
                                    <a class="text-black text-base mb-[10px] block" href="index.php?pg=products&page=1&category=cap">Nón | Caps</a>
                                </li>
                                <li class="px-[15px] w-2/12">
                                    <a class="text-black text-base mb-[10px] block" href="index.php?pg=products&page=1&category=shoes-sandal">Giày &amp; Dép | Shoes &amp; Sandals</a>
                                </li>
                            </ul>

                        </div>
                    </li>
                    <li class="group h-full flex items-center justify-center text-base cursor-pointer">
                        <a href="index.php?pg=stores" class="h-full flex items-center justify-center px-[15px]">Cửa hàng | Stores</a>

                        <!-- Sub menu -->
                        <div class="absolute left-0 top-[80px] w-full bg-white py-4 z-[999] invisible group-hover:visible transition-all duration-300 opacity-0 group-hover:opacity-100  shadow-xl">
                            <a class="text-center text-black text-base mb-[10px] block" href="index.php?pg=stores">69 đường D10 P.Tây Thạnh Q.Tân Phú</a>
                        </div>
                    </li>
                    <li class="h-full flex items-center justify-center text-base cursor-pointer">
                        <a href="index.php?pg=check-orders" class="h-full flex items-center justify-center px-[15px]">Kiểm tra đơn hàng | Check Order</a>
                    </li>
                </ul>
            </nav>
            <button onclick="openSearchDialog()" class="px-2 py-[6px] rounded-3xl border-gray-100 border-[2px] flex justify-center items-center gap-2 cursor-pointer">
                <i class="fa-solid fa-magnifying-glass text-[#c5cee0]"></i>
                <p class="text-gray-500">Tìm kiếm sản phẩm...</p>
            </button>
            <a class="relative" href="index.php?pg=cart">
                <button class="ml-5 cursor-pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#1f1f1f">
                        <path d="M280-80q-33 0-56.5-23.5T200-160q0-33 23.5-56.5T280-240q33 0 56.5 23.5T360-160q0 33-23.5 56.5T280-80Zm400 0q-33 0-56.5-23.5T600-160q0-33 23.5-56.5T680-240q33 0 56.5 23.5T760-160q0 33-23.5 56.5T680-80ZM246-720l96 200h280l110-200H246Zm-38-80h590q23 0 35 20.5t1 41.5L692-482q-11 20-29.5 31T622-440H324l-44 80h480v80H280q-45 0-68-39.5t-2-78.5l54-98-144-304H40v-80h130l38 80Zm134 280h280-280Z" />
                    </svg>
                    <div class="absolute top-[-10px] right-[-10px] w-5 h-5 bg-red-600 text-white text-xs rounded-full flex justify-center items-center cartItemQuantity">0</div>
                </button>
                <!-- Cart menu -->
                <!-- <div id="cart-menu" class="hidden cursor-default p-5 absolute bottom-[-300px] right-[-50px] min-w-[420px] h-fit bg-white flex-col justify-start items-center z-[990] rounded-sm text-[#677279] shadow-[0_1px_5px_2px_rgba(0,0,0,0.1)]">
                    <p class="text-[18px] text-black uppercase tracking-[0.5px] m-0 font-medium">Giỏ hàng</p>
                    <hr class="w-full my-1 border-gray-300">
                    <div class="mt-2 flex flex-col justify-start items-center">
                        <div class="my-5 flex flex-col justify-center items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" height="48px" viewBox="0 -960 960 960" width="48px" fill="#1f1f1f">
                                <path d="M286.79-81Q257-81 236-102.21t-21-51Q215-183 236.21-204t51-21Q317-225 338-203.79t21 51Q359-123 337.79-102t-51 21Zm400 0Q657-81 636-102.21t-21-51Q615-183 636.21-204t51-21Q717-225 738-203.79t21 51Q759-123 737.79-102t-51 21ZM235-741l110 228h288l125-228H235Zm-30-60h589.07q22.97 0 34.95 21 11.98 21-.02 42L694-495q-11 19-28.56 30.5T627-453H324l-56 104h491v60H277q-42 0-60.5-28t.5-63l64-118-152-322H51v-60h117l37 79Zm140 288h288-288Z" />
                            </svg>
                            <p>Hiện chưa có sản phẩm</p>
                        </div>
                    </div>
                    <hr class="w-full my-1 border-gray-300">
                    <div class="mt-2 flex justify-between items-center w-full">
                        <p class="text-base text-black m-0">Tổng tiền:</p>
                        <p class="text-base text-red-500 font-bold m-0">0đ</p>
                    </div>
                    <a href="index.php?pg=cart" class="group relative block w-full my-[5px] mb-[10px] text-[14px] px-[10px] py-[10px] bg-[#ff0000] text-white border border-[#ff0000] overflow-hidden z-10">

                        <span class="relative z-20 group-hover:text-[#ff0000] transition-colors duration-500">
                            Xem giỏ hàng
                        </span>

                        <span class="absolute left-0 top-0 h-full w-0 bg-white z-10 transition-all duration-500 ease-in-out group-hover:w-full"></span>
                    </a>
                </div> -->
            </a>
            <a class="ml-5" href="<?php echo isset($_SESSION['user']) ? 'index.php?pg=sign-out' : 'index.php?pg=sign-in'; ?>">
                <?php echo isset($_SESSION['user']) ? 'Đăng xuất' : 'Đăng nhập'; ?>
            </a>
        </div>

        <!-- For smaller divice -->
        <div class="xl:hidden flex justify-between items-center px-5 py-3 lg:px-20 h-[70px] lg:h-[90px] bg-white shadow-md">
            <div class="flex justify-between items-center gap-2">
                <i class="fa-solid fa-bars lg:text-2xl text-xl cursor-pointer" onclick="openNavbarMobile()"></i>
                <a href="index.php?pg=home" class="lg:hidden">
                    <img src="public/assets/images/MainLogo.png" alt="Main Logo" class="max-h-[50px] max-w-full">
                </a>
            </div>
            <a href="index.php?pg=home" class="mr-10 hidden lg:block">
                <img src="public/assets/images/MainLogo.png" alt="Main Logo" class="max-h-[70px] max-w-full">
            </a>
            <button onclick="openSearchDialog()" class="hidden px-2 py-[6px] rounded-3xl border-gray-100 border-[2px] lg:flex justify-center items-center gap-2 cursor-pointer">
                <i class="fa-solid fa-magnifying-glass text-[#c5cee0]"></i>
                <p class="text-gray-500">Tìm kiếm sản phẩm...</p>
            </button>
            <a class="relative lg:block hidden" href="index.php?pg=cart">
                <button class="ml-5 cursor-pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#1f1f1f">
                        <path d="M280-80q-33 0-56.5-23.5T200-160q0-33 23.5-56.5T280-240q33 0 56.5 23.5T360-160q0 33-23.5 56.5T280-80Zm400 0q-33 0-56.5-23.5T600-160q0-33 23.5-56.5T680-240q33 0 56.5 23.5T760-160q0 33-23.5 56.5T680-80ZM246-720l96 200h280l110-200H246Zm-38-80h590q23 0 35 20.5t1 41.5L692-482q-11 20-29.5 31T622-440H324l-44 80h480v80H280q-45 0-68-39.5t-2-78.5l54-98-144-304H40v-80h130l38 80Zm134 280h280-280Z" />
                    </svg>
                    <div class="absolute top-[-10px] right-[-10px] w-5 h-5 bg-red-600 text-white text-xs rounded-full flex justify-center items-center cartItemQuantity">0</div>
                </button>
                <!-- Cart menu -->
                <!-- <div id="cart-menu-lg" class="hidden cursor-default p-5 absolute bottom-[-300px] right-[-50px] min-w-[420px] h-fit bg-white flex-col justify-start items-center z-[990] rounded-sm text-[#677279] shadow-[0_1px_5px_2px_rgba(0,0,0,0.1)]">
                    <p class="text-[18px] text-black uppercase tracking-[0.5px] m-0 font-medium">Giỏ hàng</p>
                    <hr class="w-full my-1 border-gray-300">
                    <div class="mt-2 flex flex-col justify-start items-center">
                        <div class="my-5 flex flex-col justify-center items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" height="48px" viewBox="0 -960 960 960" width="48px" fill="#1f1f1f">
                                <path d="M286.79-81Q257-81 236-102.21t-21-51Q215-183 236.21-204t51-21Q317-225 338-203.79t21 51Q359-123 337.79-102t-51 21Zm400 0Q657-81 636-102.21t-21-51Q615-183 636.21-204t51-21Q717-225 738-203.79t21 51Q759-123 737.79-102t-51 21ZM235-741l110 228h288l125-228H235Zm-30-60h589.07q22.97 0 34.95 21 11.98 21-.02 42L694-495q-11 19-28.56 30.5T627-453H324l-56 104h491v60H277q-42 0-60.5-28t.5-63l64-118-152-322H51v-60h117l37 79Zm140 288h288-288Z" />
                            </svg>
                            <p>Hiện chưa có sản phẩm</p>
                        </div>
                    </div>
                    <hr class="w-full my-1 border-gray-300">
                    <div class="mt-2 flex justify-between items-center w-full">
                        <p class="text-base text-black m-0">Tổng tiền:</p>
                        <p class="text-base text-red-500 font-bold m-0">0đ</p>
                    </div>
                    <a href="index.php?pg=cart" class="group relative block w-full my-[5px] mb-[10px] text-[14px] px-[10px] py-[10px] bg-[#ff0000] text-white border border-[#ff0000] overflow-hidden z-10">

                        <span class="relative z-20 group-hover:text-[#ff0000] transition-colors duration-500">
                            Xem giỏ hàng
                        </span>

                        <span class="absolute left-0 top-0 h-full w-0 bg-white z-10 transition-all duration-500 ease-in-out group-hover:w-full"></span>
                    </a>
                </div> -->
            </a>
            <a class="ml-5 lg:block hidden" href="<?php echo isset($_SESSION['user']) ? 'index.php?pg=sign-out' : 'index.php?pg=sign-in'; ?>">
                <?php echo isset($_SESSION['user']) ? 'Đăng xuất' : 'Đăng nhập'; ?>
            </a>

            <a class="lg:hidden flex justify-end items-center gap-4" href="index.php?pg=cart">
                <button class="cursor-pointer"><i class="fa-solid fa-magnifying-glass"></i></button>
                <div class="relative">
                    <button class="cursor-pointer">
                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="24px" fill="#1f1f1f">
                            <path d="M280-80q-33 0-56.5-23.5T200-160q0-33 23.5-56.5T280-240q33 0 56.5 23.5T360-160q0 33-23.5 56.5T280-80Zm400 0q-33 0-56.5-23.5T600-160q0-33 23.5-56.5T680-240q33 0 56.5 23.5T760-160q0 33-23.5 56.5T680-80ZM246-720l96 200h280l110-200H246Zm-38-80h590q23 0 35 20.5t1 41.5L692-482q-11 20-29.5 31T622-440H324l-44 80h480v80H280q-45 0-68-39.5t-2-78.5l54-98-144-304H40v-80h130l38 80Zm134 280h280-280Z" />
                        </svg>
                        <div class="absolute top-[-5px] right-[-7px] w-4 h-4 bg-red-600 text-white text-[10px] rounded-full flex justify-center items-center cartItemQuantity">0</div>
                    </button>
                </div>
                <a class="lg:hidden" href="<?php echo isset($_SESSION['user']) ? 'index.php?pg=sign-out' : 'index.php?pg=sign-in'; ?>">
                    <?php echo isset($_SESSION['user']) ? 'Đăng xuất' : 'Đăng nhập'; ?>
                </a>
            </a>
        </div>
    </header>

    <!-- Search Dialog -->
    <div id="searchDialog" class="fixed inset-0 z-[999] hidden">
        <!-- Blur background -->
        <div onclick="closeSearchDialog()" class="absolute inset-0 bg-black/40 backdrop-blur-sm"></div>

        <!-- Search content -->
        <div class="relative top-0 left-0 right-0 w-full min-h-1/2 bg-white shadow-md z-[999]">
            <div class="flex flex-col justify-start items-center p-4">
                <div class="flex items-start justify-between w-full xl:w-3/4">
                    <a href="index.php?pg=home" class="mr-6 hidden xl:block">
                        <img src="public/assets/images/MainLogo.png" alt="Main Logo" class="h-14 max-w-full">
                    </a>

                    <!-- Input + icon -->
                    <div class="flex flex-col justify-start items-center w-full xl:*:w-2/3">
                        <div class="flex-grow relative w-full">
                            <i class="fa-solid fa-magnifying-glass text-gray-400 absolute left-3 top-1/2 transform -translate-y-1/2"></i>
                            <input
                                type="text"
                                placeholder="Tìm kiếm sản phẩm..."
                                class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-full focus:outline-none focus:ring-[1px] focus:ring-black">
                        </div>
                        <div class="mt-4 hidden w-full">
                            <p class="text-base mb-2">Gợi ý cho bạn:</p>
                            <a class="ml-5 text-black text-lg block" href="index.php?pg=products&page=1&category=tshirt&gender=male">Nam | T-shirt</a>
                            <a class="ml-5 text-black text-lg block" href="index.php?pg=products&page=1&category=tshirt&gender=female">Nữ | T-shirt</a>
                        </div>

                        <!-- List product -->
                        <div class="product-list max-h-[500px] overflow-y-auto">

                        </div>
                    </div>

                    <button onclick="closeSearchDialog()" class="ml-4 text-2xl text-gray-500 transition rounded-full bg-gray-100 h-10 w-12 cursor-pointer">
                        <i class="fa-solid fa-xmark"></i>
                    </button>
                </div>
            </div>
        </div>

    </div>

    <!-- Cart Dialog Mobile -->
    <!-- <div id="cartDialogMobile" class="fixed inset-0 z-[999] hidden">
        <div onclick="closeCartDialogMobile()" class="absolute inset-0 bg-black/30 backdrop-blur-sm"></div>

        <div class="absolute bottom-0 left-0 right-0 w-full max-h-3/2 flex flex-col justify-start items-center gap-3">
            <div class="h-[10px] w-[100px] bg-white rounded-2xl"></div>
            <div class="w-screen h-fit rounded-t-2xl flex flex-col justify-start items-center bg-white">
                <div class="relative px-5 py-5 bg-black flex justify-between items-center w-full max-h-[20px] rounded-t-2xl text-white">
                    <p>0 sản phẩm</p>

                    <u class="absolute left-1/2 -translate-x-1/2 font-semibold">0đ</u>

                    <p class="cursor-pointer" onclick="closeCartDialogMobile()">Đóng</p>
                </div>
                <div class="max-h-[250px] overflow-y-scroll w-full flex justify-center items-center bg-white">
                    <div class="my-5 flex flex-col justify-center items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" height="48px" viewBox="0 -960 960 960" width="48px" fill="#1f1f1f">
                            <path d="M286.79-81Q257-81 236-102.21t-21-51Q215-183 236.21-204t51-21Q317-225 338-203.79t21 51Q359-123 337.79-102t-51 21Zm400 0Q657-81 636-102.21t-21-51Q615-183 636.21-204t51-21Q717-225 738-203.79t21 51Q759-123 737.79-102t-51 21ZM235-741l110 228h288l125-228H235Zm-30-60h589.07q22.97 0 34.95 21 11.98 21-.02 42L694-495q-11 19-28.56 30.5T627-453H324l-56 104h491v60H277q-42 0-60.5-28t.5-63l64-118-152-322H51v-60h117l37 79Zm140 288h288-288Z" />
                        </svg>
                        <p>hiện chưa có sản phẩm</p>
                    </div>

                    <div class="hidden"></div>
                </div>
                <hr class="w-full my-1 border-gray-300">
                <div class="px-5 w-full flex flex-col justify-start items-center bg-white">
                    <div class="mt-2 flex justify-between items-center w-full">
                        <p class="text-lg text-black m-0">Tổng tiền:</p>
                        <p class="text-lg text-red-500 font-bold m-0">0đ</p>
                    </div>
                    <a href="index.php?pg=cart" class="mt-2 w-full my-[5px] mb-[10px] text-[14px] px-[10px] py-[10px] bg-black text-white  z-10 rounded-sm tracking-[1.5px] text-center">
                        Xem giỏ hàng
                    </a>
                </div>
            </div>
        </div>
    </div> -->

    <!-- Navbar mobile -->
    <div id="navbarMobile" class="fixed inset-0 z-[999] hidden">
        <div onclick="closeNavbarMobile()" class="absolute inset-0 bg-black/30 backdrop-blur-sm"></div>

        <div class="absolute top-0 left-0 min-w-[400px] max-w-[480px] bg-white flex flex-col justify-start items-center h-screen">
            <ul class="flex justify-between items-center w-full px-0 text-gray-700">
                <li id="navbarMobileMale" class="cursor-pointer py-5 border-b border-gray-300 w-full text-center font-semibold text-lg text-gray-500">Nam </li>
                <li><span class="text-gray-400 text-center">|</span></li>
                <li id="navbarMobileFemale" class="cursor-pointer py-5 border-b border-gray-300 w-full text-center font-semibold text-lg text-gray-500">Nữ</li>
                <li><span class="text-gray-400 text-center">|</span></li>
                <li id="navbarMobileAccessory" class="cursor-pointer py-5 border-b border-gray-300 w-full text-center font-semibold text-lg text-gray-500">Phụ kiện</li>
                <li><span class="text-gray-400 text-center">|</span></li>
                <li id="navbarMobileHelp" class="cursor-pointer py-5 border-b border-gray-300 w-full text-center font-semibold text-lg text-gray-500">Help</li>
            </ul>
            <!-- List opions -->
            <ul id="mobileMenuOptions" class="mt-5 flex flex-col justify-start items-start w-full px-5 gap-3 overflow-y-auto">
                <li class="py-10">
                    <a class="text-lg text-black font-semibold" href="">Tất cả nam</a>
                </li>
            </ul>

        </div>

        <button class="absolute top-0 right-0 w-fit h-fit cursor-pointer" onclick="closeNavbarMobile()">
            <i class="px-3 py-2 fa-solid fa-xmark text-4xl text-white bg-[#2d2d2d]"></i>
        </button>
    </div>

    <script src="public/assets/js/header.js"></script>
</body>

</html>